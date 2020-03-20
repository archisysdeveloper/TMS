<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class hr extends admin_controller {
	
	
	function __construct() {
		parent::__construct();
		// load model
		//$this->load->model(array("aboutus_model"));
		// load helper
        $this->db->query("SET time_zone='+5:30'");
		$this->load->helper(array("form", "url"));
	}// __construct
	
	
	function index() {
        
        /*$crud = new grocery_CRUD();
 
        $crud->set_table('ws_aboutus')
            ->set_subject('aboutus')
            ->columns('id','ab_name','ab_image','ab_desc');
            
        $crud->display_as('id','aboutus Id');
        $crud->display_as('ab_name','aboutus Name');
		$crud->display_as('ab_image','Image');
		$crud->display_as('ab_desc','Description');
        
		$crud->set_field_upload('ab_image','uploads');
		
        $output = $crud->render();
     
		$this->load->view("site-admin/index_crud", $output);
        */
        
	}// index
    
    function emp()
    {
        
        if ( $this->account_model->check_admin_permission("", "hr", "admin") == false ) {redirect($this->uri->segment(1));} // Permission Check 
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_team')
            ->set_subject('Employees')
            ->columns('account_id','team_name','jira_username','team_hours','default_break','paid_leaves','unpaid_leaves','join_date','team_group');
            
        //$crud->unset_jquery_ui();    
        
        $crud->display_as('account_id','Account');
        $crud->display_as('default_break','Daily Break (mins)');
        $crud->display_as('team_name','Team Name');
        $crud->display_as('team_hours','Monthy Hours');
        $crud->display_as('paid_leaves','Paid Leaves');
        $crud->display_as('unpaid_leaves','Unpaid Leaves');
        $crud->display_as('join_date','Join Date');
        $crud->display_as('jira_username','Jira Username');
        $crud->display_as('team_group','Team Group');
        
        
		$crud->change_field_type('team_group','dropdown',array('Developers' => 'Developer', 'S&M' => 'S&M','FinStock' => 'FinStock','Leads' => 'Leads'));
		
        if($this->uri->segment(5) == "add")
        {
            $query = $this->db->query("Select * from ws_accounts where account_id not in (Select account_id from ws_team) ");
            $rows = $query->result_array(); 
            $arr = array();
            foreach($rows as $row) {$arr[$row['account_id']] = $row['account_username'];}
            
            if(count($arr)==0) {redirect($this->uri->segment(0));}
            
            $crud->change_field_type('account_id','dropdown',$arr);          
        }
        else
        {  
         $crud->set_relation('account_id','ws_accounts','account_username'); 
        }
        
        
        
        
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
            
    }
	
	function leave_request()
    {
        //$this->emailme_leaves('',31);exit;
        if ( $this->account_model->check_admin_permission("", "hr", "daily") == false ) {redirect($this->uri->segment(1));} // Permission Check 
        
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_leave')
            ->set_subject('Leave Requests')
            ->columns('leave_type','leave_duration','leave_status','leave_date','leave_reqdate')
            ->fields('leave_type','leave_reason','leave_duration','leave_date','leave_status','leave_reqdate','account_id');
        
        $crud->where('account_id',$user_id);
        $crud->where('leave_status','1');
            
        $crud->display_as('leave_type','Type');
        $crud->display_as('leave_duration','Duration');
        $crud->display_as('leave_reason','Reason');
        $crud->display_as('leave_date','Date of Leave');
                          
        $crud->callback_before_insert(array($this,'cb_leave_req'));
        $crud->callback_before_update(array($this,'cb_leave_req'));
        
        $crud->callback_after_insert(array($this, 'emailme_leaves'));
        $crud->callback_after_update(array($this, 'emailme_leaves'));                
        
        $crud->change_field_type('account_id', 'hidden', '1');
        $crud->change_field_type('leave_reqdate', 'hidden', '1');
        
        
        $crud->change_field_type('leave_type','dropdown',array('1' => 'Medical', '2' => 'Personal','3' => 'Family' , '4' => 'Festival'));
        $crud->change_field_type('leave_status','dropdown',array('1' => 'Request'));
        $crud->change_field_type('leave_duration','dropdown',array('1' => 'Full Day', '2' => 'Half Day'));

        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
            
    }
    
    function cb_leave_req($post_array)
    {
         $ca_account = $this->account_model->get_account_cookie("admin");
         $post_array['account_id'] = $ca_account['id'];   
         $post_array['leave_reqdate'] = date("Y-m-d", time());
         
         return $post_array;   
    }
    
    function leave_approval()
    {
        if ( $this->account_model->check_admin_permission("", "hr", "approver") == false ) {redirect($this->uri->segment(1));} // Permission Check 
        
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_leave')
            ->set_subject('Leaves')
            ->columns('leave_type','leave_reason','leave_duration','leave_date','leave_status','leave_reqdate','account_id')
            ->fields('leave_type','leave_reason','leave_duration','leave_date','leave_status','leave_reqdate','account_id');
        
        //$crud->where('leave_status','1');
                   
            
        $crud->display_as('account_id','Employee');
        $crud->display_as('leave_reqdate','Request Date');
        $crud->display_as('leave_type','Type');
        $crud->display_as('leave_duration','Duration');
        $crud->display_as('leave_reason','Reason');
        $crud->display_as('leave_date','Date of Leave');
          
        $crud->callback_after_insert(array($this, 'emailme_leaves'));
        $crud->callback_after_update(array($this, 'emailme_leaves'));                
        //$crud->change_field_type('account_id', 'hidden', '1');
        //$crud->change_field_type('leave_reqdate', 'hidden', '1');
        
        $crud->set_relation('account_id','ws_accounts','account_username'); 
        
        
        $crud->change_field_type('leave_type','dropdown',array('1' => 'Medical', '2' => 'Personal','3' => 'Family' , '4' => 'Festival','5' => 'Unknown'));
        $crud->change_field_type('leave_status','dropdown',array('1' => 'Request','2'=>'Approve','3'=>'Rejected','4'=>'UnApproved'));
        $crud->change_field_type('leave_duration','dropdown',array('1' => 'Full Day', '2' => 'Half Day'));
        
        $crud->order_by('leave_id', 'desc');
        
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
            
    }
    
    function emailme_leaves($post_array,$primary_key)
    {
        $output = array();
        $data = $this->db->query("SELECT * FROM ws_leave l inner join ws_accounts a on l.account_id = a.account_id where leave_id = $primary_key")->row();
        $output['data'] = $data;
        
        $out = $this->load->view("hr_leave_email", $output, true);    
        
        $this->load->library('email');
        $this->email->from('apes@archisys.biz', 'APES');
		
	$toList = [$data->account_email,'sbparikh99@gmail.com','chitral.jain@archisys.in','aarohi@archisys.in','kapil.bhavsar@archisys.in','accounts@archisys.in','durgesh.t@archisys.in'];
		
        $this->email->to($toList); 
        //added for testing
        //$this->email->cc('ravi.thakkar@archisys.in'); 
        //$this->email->cc('hr@archisys.in');
        $this->email->bcc('chintan@archisys.in'); 
		
		//$this->email->cc(); 
        
        $this->email->subject('APES Leave Alert :'.$data->account_username);
        $this->email->message($out);    
        $this->email->send();

    }
 
    function inout()
    {
        
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        $ip = $_SERVER['REMOTE_ADDR'];
        // check if there is a pending in for today ?
        $this->db->query("SET time_zone='+5:30'");
        $query = $this->db->query("SELECT *  FROM ws_inout where account_id = $user_id and DATE(inout_date) =  CURDATE() and out_time is null ");
		$sameip = $this->db->query("SELECT *  FROM ws_inout where in_ip = '$ip' and DATE(inout_date) =  CURDATE() and out_time is null ");		
        //$hour = $this->db->query("SELECT HOUR(CURTIME()) hour;")->row()->hour;
        //&& $hour < 12
		if($sameip->num_rows() > 0 )
		{
			redirect('/site-admin/?msg=Someone already logged in with this computer today', 'location');
			exit;
		}
        if($query->num_rows() == 0 )
        {
            $time = $this->db->query("SELECT CURTIME() time;")->row()->time;

            $dt = $this->db->query("SELECT CURDATE() dt;")->row()->dt;
        
            $data = array(
            'account_id' => $user_id ,
            'inout_date' => $dt ,
            'in_time' => $time,
             'in_ip' => $_SERVER['REMOTE_ADDR']
            );
            
        $this->db->insert('ws_inout', $data);
            redirect('/site-admin/', 'location');
            
        }
        else 
        {
            redirect('/site-admin/?msg=session is already active', 'location');
        }
            
    }
    
    function close()
    {

        
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        
		$userRec = $this->db->query("SELECT * from ws_team where account_id = $user_id")->row();
		
        $this->db->query("SET time_zone='+5:30'");
        
        $query = $this->db->query("SELECT * FROM ws_inout where account_id = $user_id  and DATE(inout_date) =  CURDATE() and out_time is null ");
        
        if($query->num_rows() == 0) {redirect('/site-admin/', 'location');}
        
        $id = $query->row()->inout_id;
        
        
        $time = $this->db->query("SELECT CURTIME() time;")->row()->time;
        
        $output = array();        

        $output['admin_content'] = $this->load->view("hr_close", $output, true);
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_timesheet')
            ->set_subject('Daily Timesheet')
            ->columns('milestone_id','note','hrs','jira_worklog_id')
            ->fields('milestone_id','hrs','note','account_id','inout_id');
            
        $crud->where('account_id',$user_id);
        $crud->where('inout_id',$id);
            
        $crud->display_as('milestone_id','Milestone');
        $crud->display_as('note','Note (15 Chars)');
        $crud->display_as('hrs','Mins');
		//$crud->display_as('approxTime','Started When ?');
        $crud->display_as('jira_worklog_id','JiraID');
		
		$crud->change_field_type('approxTime','dropdown',
		array("Day Start" => "Day Start",
		"After Standup" => "After Standup",
		"After First Break" => "After First Break",
		"After Second Break" => "After Second Break",
		"After 7" => "After 7"));   
        
        $crud->unset_edit();
		
        
/*old query as on 22-12-2014
 $query = $this->db->query("Select t.mid,project_name,milestone_name from ws_milestones_team t  inner join ws_milestones m on t.mid = m.mid
                                    inner join ws_projects p on p.project_id = m.milestone_project");*/

        $action = $this->uri->segment(5);
        $wherepart= "";
        if($action == "add")
        {
        	$wherepart = " and m.milestone_jira_managed = 0";        	
        }

        $query = $this->db->query("SELECT t.mid, project_name, milestone_name, m.milestone_status, t.account_id
                    FROM ws_milestones_team t
                    INNER JOIN ws_milestones m ON t.mid = m.mid
                    INNER JOIN ws_projects p ON p.project_id = m.milestone_project
                    WHERE m.milestone_status =3
                    AND p.project_status = 3
                    AND t.account_id = $user_id $wherepart");

        $rows = $query->result_array(); 
        $arr = array();
        foreach($rows as $row) {$arr[$row['mid']] = $row['project_name'].' - '.$row['milestone_name'];}
        
        if(count($rows) == 0) { $arr[0] = "Other"; } // Only if no milestone assigned 
        
        $arr[-1] = "Break";
        $crud->change_field_type('milestone_id','dropdown',$arr);          
        
        $inout = $this->db->query("select * from ws_inout where inout_id =".$id)->row();
        $in_time = $inout->in_time;
        
        $crud->change_field_type('account_id', 'hidden', '1');
        $crud->change_field_type('inout_id', 'hidden', '1');
        $crud->callback_before_insert(array($this,'cb_close'));
        $crud->callback_before_update(array($this,'cb_close'));
        
               
        $t1 = '2012-08-17 '.$in_time;
        $t2 = '2012-08-17 '.$time;
        $ses_time = gmdate("H:i:s", strtotime($t2) - strtotime($t1));
        
        
		
        $st = (float)str_replace(":", ".", $ses_time);
        
        $mins = (floor($st)*60) + (($st - floor($st) )*100);
        $bmins = $this->db->query("Select IFNULL(sum(hrs),0) hrs from ws_timesheet where inout_id =".$id)->row()->hrs;
        $break_mins = $this->db->query("Select IFNULL(sum(mins),0) hrs from ws_adlbreak where inout_id =".$id)->row()->hrs;
        $bmins = $bmins + $break_mins;
        $mins = $mins - $bmins; 
              
        $hours = (float)($mins / 60);
        $pending = ($hours - floor($hours))*60;
        
        $hrs = array();                
        
        $cn = 5;
        while($cn < $mins)
        {
           $hrs[$cn] = floor($cn/60) .' hrs '.($cn - (floor($cn/60)*60)).' mins'; 
           
           $cn = $cn + 5;
        }
        
        if($mins > 5) {
        $crud->change_field_type('hrs','dropdown',$hrs);          
        }
        
        $session_canClose = $bmins >= ($userRec->day_weight * 60);
		
        $output = $crud->render();
                
        $output->in_time = $in_time;
        $output->out_time = $time;
        $output->ses_time = $ses_time;
        $output->booked = $bmins;
        $output->break_mins = $break_mins;
        $output->id = $id;
		$output->dayWeight = $userRec->day_weight;
		$output->defaultBreak = $userRec->default_break;
		$output->session_canClose = $session_canClose;
		$output->milestoneBooking = (($userRec->day_weight * 60) - $userRec->default_break)/60;
		
		
		
        if(count($hrs) == 0)
        {			
			if($session_canClose)
			{
				$output->info = $this->load->view("hr_closed", $output, true);
				$output->output = "";
			}
			else
			{
				$output->info = $this->load->view("hr_close", $output, true);
				$output->output = "";
			}
        }
        else
        {
            $output->info = $this->load->view("hr_close", $output, true);
            
        }
        
     
        $this->load->view("site-admin/index_crud_msg", $output);
        
    
    }   // Close
    
    

    
    function cb_close($post_array)
    {
         $ca_account = $this->account_model->get_account_cookie("admin");
         $post_array['account_id'] = $ca_account['id'];   
         
         $query = $this->db->query("SELECT * FROM ws_inout where account_id = ".$ca_account['id']."  and DATE(inout_date) =  CURDATE() and out_time is null ");
         $id = $query->row()->inout_id;
         
		 if(strlen($post_array['note']) < 15)
		 {
			 $message = 'Description too short';
			 $this->form_validation->set_message('description_unique', $message);
			 echo $message;
             $crud->set_echo_and_die();
		 }
         $post_array['inout_id'] = $id;
         
         return $post_array;   
    }   
    
    function additional()
    {
        $ca_account = $this->account_model->get_account_cookie("admin");
         
        $query = $this->db->query("SELECT * FROM ws_inout w inner join ws_team t on t.account_id = w.account_id where total_hr is null ");
        
        $crud2 = new grocery_CRUD();
 
        $crud2->set_table('ws_adlbreak')
            ->set_subject('Additional Breaks')
            ->columns('inout_id','mins','reason')
            ->fields('inout_id','mins','reason','account_id');
        
        $rows = $query->result_array(); 
        $arr = array();
        foreach($rows as $row) {$arr[$row['inout_id']] = $row['team_name'].' - '.$row['inout_date'].' - '.$row['in_time'];}
        
        $crud2->change_field_type('inout_id','dropdown',$arr);          
        
        $crud2->set_relation('inout_id','ws_inout','inout_id');    
        $crud2->where('total_hr',null);
        
        $crud2->change_field_type('account_id', 'hidden', '1');
        
        $crud2->callback_before_insert(array($this,'cb_close'));
        $crud2->callback_before_update(array($this,'cb_close'));
            
        $crud2->display_as('mins','Mins');
        $crud2->display_as('reason','Reason for Break');
        
        $output = $crud2->render();
        
        $output->info = $this->load->view("hr_back", $output, true);
        
        $this->load->view("site-admin/index_crud_msg", $output);
        
        
    }
    function finalclose() 
    {
         $id = $_GET['id'];
         $this->db->query("SET time_zone='+5:30'");
         $query = $this->db->query("SELECT *  FROM ws_inout where inout_id = $id and DATE(inout_date) =  CURDATE() and out_time is null ");
        
        if($query->num_rows() == 1)
        {
            $time = $this->db->query("SELECT CURTIME() time;")->row()->time;
            
            $data = array(
            'out_time' => $time,
             'out_ip' => $_SERVER['REMOTE_ADDR']
            );
        $this->db->where('inout_id', $id);    
        $this->db->update('ws_inout', $data);
            redirect('/site-admin/', 'location');
            
        }
        else {
            
            redirect('/hr/site-admin/hr/close', 'location');
            
        }
        
    }
    
    function process_daily()
    {
        
        if ( $this->account_model->check_admin_permission("", "hr", "approver") == false ) {redirect($this->uri->segment(1));} // Permission Check 
		
		$ca_account = $this->account_model->get_account_cookie("admin");
		$userid = $ca_account['id'];   
		
		$userRec = $this->db->query("select * from ws_team where account_id = $userid")->row();
		$group = $userRec->team_group;
		
        if(isset($_POST['inout_id']))
        {
            $team = $this->db->query("SELECT * FROM ws_team where account_id = ".$_POST['account_id'])->row();
            
            $total_hr = $_POST['hrs'] - $_POST['break'];
            //$note = $_POST['note'];
            $id = $_POST['inout_id'];
            
            
            $this->db->query("SET time_zone='+5:30'");
            $dt = $this->db->query("SELECT CURDATE() dt;")->row()->dt;
            
            $data = array(
                'total_hr' => $total_hr,
                 //'internal_note' => $note,
                 'approve_id' => $userid,
                 'approve_date' => $dt,
                 'pay' => floor($total_hr * ($team->rate/60))
                 
                );
            $this->db->where('inout_id', $id);    
            $this->db->update('ws_inout', $data);
        }
        $where = "";
        if(isset($_GET['filterUser']) && $_GET['filterUser'] > 0)
        {
            $where = " and t.account_id = ".$_GET['filterUser'];
        }
		if($userid != 1) // Not Admin
		{
			$where = $where." and team_group = '$group'";
		}
        $query = $this->db->query("SELECT * FROM `ws_inout` i inner join ws_team t on t.account_id = i.account_id where total_hr is null $where order by inout_id desc");
        
        $output = array();
        $output['data'] = $query;
        
        $output['team'] = $this->db->query("SELECT * from ws_team ")->result();

        $output['admin_content'] = $this->load->view("hr_ts_process", $output, true);
        
        $this->load->view("site-admin/index_view", $output);
        
    }
    function del_daily()
    {
            if ( $this->account_model->check_admin_permission("", "hr", "admin") == false ) {redirect($this->uri->segment(1));} // Permission Check 
            $id = $_GET['id'];
            
            $ca_account = $this->account_model->get_account_cookie("admin");
            $userid = $ca_account['id'];   
            
            $this->db->query("SET time_zone='+5:30'");
            $dt = $this->db->query("SELECT CURDATE() dt;")->row()->dt;
            
            $data = array(
                'total_hr' => "0",
                 'internal_note' => "DELETED",
                 'approve_id' => $userid,
                 'approve_date' => $dt,
                 'pay' => "0.0"
                );
                
            $this->db->where('inout_id', $id);    
            $this->db->update('ws_inout', $data);
			
			$inout = $this->db->query("SELECT * FROM ws_inout w inner join ws_accounts t on t.account_id = w.account_id where inout_id = $id")->row();
			
			$this->load->library('email');
            $this->email->from('apes@archisys.biz', 'APES');        
            $this->email->reply_to('chitral.jain@archisys.in', 'Chitral Jain');        			
            $this->email->to($inout->account_email);         
            //$this->email->to("chintan@archisys.in");         
            $this->email->subject($inout->account_username.' : Deleted Timesheet for '.$inout->inout_date.' /'.$id);
            $this->email->message("This timesheet has been removed");    
            $this->email->send();
			echo json_encode(["status"=>"ok"]);
            //redirect('/hr/site-admin/hr/process_daily', 'location');
                
    }
   function add_daily()
    {
        if ( $this->account_model->check_admin_permission("", "hr", "approver") == false ) {redirect($this->uri->segment(1));} // Permission Check 
        $ca_account = $this->account_model->get_account_cookie("admin");
 
        $crud2 = new grocery_CRUD();
 
        $crud2->set_table('ws_inout')
            ->set_subject('Manual Inout')
            ->columns('account_id','inout_date','in_time','out_time','in_ip')
            ->fields('account_id','inout_date','in_time','out_time','in_ip');
            
        $crud2->where('total_hr',null);
                    
        $crud2->display_as('account_id','Team');
        $crud2->display_as('inout_date','Date');
        $crud2->display_as('in_time','In Time');
        $crud2->display_as('out_time','Out Time');
        
        $crud2->set_relation('account_id','ws_team','team_name'); 
        
        $output = $crud2->render();
        
        $this->load->view("site-admin/index_crud_msg", $output);
                        
    }
	
	function add_daily_new()
    {
        if ( $this->account_model->check_admin_permission("", "hr", "admin") == false ) {redirect($this->uri->segment(1));} // Permission Check 
        $ca_account = $this->account_model->get_account_cookie("admin");
 
        $crud2 = new grocery_CRUD();
 
        $crud2->set_table('ws_inout')
            ->set_subject('Manual Inout')
            ->columns('account_id','inout_date','in_time','out_time','total_hr','pay')
            ->fields('account_id','inout_date','in_time','out_time','total_hr','pay');
            
        //$crud2->where('total_hr',null);
                    
        $crud2->display_as('account_id','Team');
        $crud2->display_as('inout_date','Date');
        $crud2->display_as('in_time','In Time');
        $crud2->display_as('out_time','Out Time');
        
        $crud2->set_relation('account_id','ws_team','team_name'); 
        
        $output = $crud2->render();
        
        $this->load->view("site-admin/index_crud_msg", $output);
                        
    }
    
    function view_ts()
    {
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        
        if(isset($_POST['account_id'])) { $user_id = $_POST['account_id']; }
        $output = array();
        
        // $output['data'] = $this->db->query("SELECT sum(total_hr) total_hr ,inout_date FROM ws_inout where account_id = ".$user_id." and total_hr > 0 group by inout_date");
        
        $output['data'] = $this->db->query("SELECT cast(time_to_sec(timediff(out_time ,in_time)) / (60 * 60) as decimal(10, 1)) as total_time, inout_date,in_time,t.day_weight,t.lockout_time FROM ws_inout i  INNER JOIN ws_team t ON t.account_id = i.account_id where i.account_id = $user_id and total_hr > 0");
        $output['leaves'] = $this->db->query("SELECT * FROM ws_leave where account_id = ".$user_id." and leave_status = 2")->result();
        $output['unapp_leaves'] = $this->db->query("SELECT * FROM ws_leave where account_id = ".$user_id." and leave_status = 4")->result();
        
        if(isset($_POST['account_id'])) { 
                $output['team_name'] = $this->db->query("SELECT * from ws_team where account_id = $user_id")->row()->team_name;    
        }
        else {
            $output['team_name'] = "";
        }
        
        
        $output['user_id'] = $user_id;
        
        
        
        if ( $this->account_model->check_admin_permission("", "hr", "admin") ) 
        {
            $team = $this->db->query("SELECT * from ws_team ")->result();
            $output['team'] = $team;
        }
        
        
        
        $output['admin_content'] = $this->load->view("hr_ts_view", $output, true);
        
        $this->load->view("site-admin/index_view", $output);        
    }
    
    function view_leaves()
    {
        
        $output = array();
        
        $output['leaves'] = $this->db->query("SELECT team_name,w.* FROM ws_leave w inner join ws_team t on t.account_id = w.account_id where leave_status in (1,2,4)
		and leave_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 3 MONTH)), INTERVAL 1 DAY) ")->result();
        
        $output['admin_content'] = $this->load->view("hr_leave_view", $output, true);
        
        $this->load->view("site-admin/index_view", $output);        
    }
    
    function my_rpt()
    {
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        
        $output = array();
        if(isset($_POST['startDt']))
        {
            $startDt = $_POST['startDt'];
            $endDt = $_POST['endDt'];
            
            $output['startDt'] = $startDt;
            $output['endDt'] = $endDt;
            
            $data = $this->db->query("
            SELECT t.account_id,team_hours,rate,team_name,sum(total_hr)/60 hrs , sum(pay) pay  FROM `ws_inout` w inner join ws_team t on t.account_id = w.account_id
            where t.account_id = $user_id and inout_date >= STR_TO_DATE('$startDt','%d-%m-%Y') and inout_date <= STR_TO_DATE('$endDt','%d-%m-%Y') and pay > 0
            group by t.account_id,team_name,team_hours,rate
            ")->result();    
            
            $up_leave = $this->db->query("
            SELECT account_id,count(*) count  FROM `ws_leave` 
            where account_id = $user_id and leave_date >= STR_TO_DATE('$startDt','%d-%m-%Y') and leave_date <= STR_TO_DATE('$endDt','%d-%m-%Y') 
            and leave_status = 4 group by account_id ")->result();    
            
                        
            $penelty = array();
            foreach($up_leave as $l) { $penelty[$l->account_id] = $l->count;}
            
            $output['penelty'] = $penelty;
            $output['data'] = $data;
            
        }
    $output['admin_content'] = $this->load->view("hr_mreport", $output, true);    
    $this->load->view("site-admin/index_view", $output);        
            
    }
    
    function month_rpt()
    {
        if ( $this->account_model->check_admin_permission("", "hr", "admin") == false ) {redirect($this->uri->segment(1));} // Permission Check 
        $output = array();
        if(isset($_POST['startDt']))
        {
            $startDt = $_POST['startDt'];
            $endDt = $_POST['endDt'];
            
            $output['startDt'] = $startDt;
            $output['endDt'] = $endDt;
            
            $data = $this->db->query("
            SELECT t.account_id,team_hours,rate,team_name,sum(total_hr)/60 hrs , sum(pay) pay  FROM `ws_inout` w inner join ws_team t on t.account_id = w.account_id
            where inout_date >= STR_TO_DATE('$startDt','%d-%m-%Y') and inout_date <= STR_TO_DATE('$endDt','%d-%m-%Y') and pay > 0
            group by t.account_id,team_name,team_hours,rate
            ")->result();    
            
            $up_leave = $this->db->query("
            SELECT account_id,count(*) count  FROM `ws_leave` 
            where leave_date >= STR_TO_DATE('$startDt','%d-%m-%Y') and leave_date <= STR_TO_DATE('$endDt','%d-%m-%Y') 
            and leave_status = 4 group by account_id ")->result();    
            
                        
            $penelty = array();
            foreach($up_leave as $l) { $penelty[$l->account_id] = $l->count;}
            
            $output['penelty'] = $penelty;
            $output['data'] = $data;
            
        }
    $output['admin_content'] = $this->load->view("hr_mreport", $output, true);    
    $this->load->view("site-admin/index_view", $output);        
            
    }
	
    function view_ts_detail()
    {
        $output = array();
        $startDt = $_GET['dt'];
        $up_leave = $this->db->query("  SELECT *  FROM `ws_timesheet`  w
        	left JOIN ws_milestones m on m.mid = w.milestone_id
			left join ws_projects p ON p.project_id = m.milestone_project
        	where w.account_id = ".$_GET['user_id']." and inout_id in 
            (Select inout_id from ws_inout where inout_date = '$startDt') ")->result();    
            
        $output['data'] = $up_leave;
        $output['admin_content'] = $this->load->view("hr_ts_inner", $output, true);    
        $this->load->view("site-admin/index_view", $output);        
    }
    
    function view_ts_detail_id()
    {
        $output = array();
        $id = $_GET['id'];
        $up_leave = $this->db->query("  SELECT *  FROM `ws_timesheet` w
		left JOIN ws_milestones m on m.mid = w.milestone_id
		left join ws_projects p ON p.project_id = m.milestone_project where inout_id = $id ")->result();    
            
        $output['data'] = $up_leave;
        $this->load->view("hr_ts_inner", $output);    
                
    }
    
    function detail_rep()
    {
        $stdt = $_GET['stdt'];
        $enddt = $_GET['enddt'];
        $account_id = $_GET['account_id'];
        $up_leave = $this->db->query(" SELECT * FROM `ws_timesheet` t inner join ws_inout w on w.inout_id = t.inout_id
where t.account_id = $account_id and inout_date >= STR_TO_DATE('$stdt','%d-%m-%Y') and inout_date <= STR_TO_DATE('$enddt','%d-%m-%Y') ")->result();    
            
            
        $output['data'] = $up_leave;
        $output['admin_content'] = $this->load->view("hr_detail_rec", $output, true);    
        $this->load->view("site-admin/index_view", $output);        
            
    }
		
	function _export_fullTS($startDt,$endDt)
	{		
		if ( $this->account_model->check_admin_permission("", "hr", "admin") == false ) {redirect($this->uri->segment(1));} // Permission Check 
		// output headers so that the file is downloaded rather than displayed
		
		header('Content-Type: text/csv; charset=utf-8');
		header("Content-Disposition: attachment; filename=$startDt^to^$endDt.csv");

		// create a file pointer connected to the output stream
		$output = fopen('php://output', 'w');

		// output the column headings
		fputcsv($output, array('Project', 'Milestone', 'Developer','Date','Started','Mins','Hrs','Cost_INR','Note',
		'In IP','OUT IP','IN Time','Out Time'));

		// fetch the data
		$rows = $this->db->query(" SELECT project_name,milestone_name,team_name,inout_date,approxTime,hrs,round(hrs/60,2), 
		round((hrs*(rate/60))*1.5,2) pay ,note , in_ip,out_ip,in_time,out_time

		FROM `ws_timesheet` t 
		inner join ws_team a on a.account_id = t.account_id
		inner join ws_inout i on i.inout_id = t.inout_id
		inner join ws_milestones m on m.mid = t.milestone_id
		inner join ws_projects p on  p.project_id = m.milestone_project
		where inout_date >= STR_TO_DATE('$startDt','%d-%m-%Y') and inout_date <= STR_TO_DATE('$endDt','%d-%m-%Y')
		order by inout_date  ")->result_array();    

		// $rows = $this->db->query("SELECT project_name,milestone_name,team_name,month(inout_date),approxTime,sum(hrs),round(sum(hrs)/60,2), 
		// round((sum(hrs)*(rate/60)),2) pay ,note , in_ip,out_ip,in_time,out_time

		// FROM `ws_timesheet` t 
		// inner join ws_team a on a.account_id = t.account_id
		// inner join ws_inout i on i.inout_id = t.inout_id
		// inner join ws_milestones m on m.mid = t.milestone_id
		// inner join ws_projects p on  p.project_id = m.milestone_project
		// where inout_date >= STR_TO_DATE('01-04-2017','%d-%m-%Y') and inout_date <= STR_TO_DATE('31-03-2018','%d-%m-%Y')
		// group by month(inout_date),project_name,team_name")->result_array();  

		// loop over the rows, outputting them
		foreach($rows as $r)
		{
			$r['note'] = trim(strip_tags($r['note']));
			fputcsv($output, $r);
		}
		exit;
		
	}	
	
	function dailyReport()
    {
        if ( $this->account_model->check_admin_permission("", "hr", "admin") == false ) {redirect($this->uri->segment(1));} // Permission Check 
        $output = array();
        if(isset($_POST['startDt']))
        {
            $startDt = $_POST['startDt'];
            $endDt = $_POST['endDt'];
            
            $this->_export_fullTS($startDt,$endDt);
                                    
        }
		else {
			$output['admin_content'] = $this->load->view("hr_daily", $output, true);    
			//echo $_SERVER['HTTP_USER_AGENT'];
			$this->load->view("site-admin/index_view", $output);        
			
		}
            
    }
    
    public function testmail(){
        
        $out = 'Test mail';    
        
        $this->load->library('email');
        $this->email->from('apes@archisys.biz', 'APES');        
        $this->email->to('ravi.thakkar@archisys.in');         
        $this->email->subject('APES Leave Alert');
        $this->email->message($out);    
        $this->email->send();
        echo $this->email->print_debugger();
        exit;
    }

    public function editTs($inOutid = 0)
    {
    	
        if ( $this->account_model->check_admin_permission("", "hr", "approver") == false ) {redirect($this->uri->segment(1));} // Permission Check 
        $ca_account = $this->account_model->get_account_cookie("admin");
 
 		$account_id = $query = $this->db->query("SELECT * FROM ws_inout where inout_id = $inOutid")->row()->account_id;
        $crud2 = new grocery_CRUD();
 
        $crud2->set_table('ws_timesheet')
            ->set_subject('TimeSheet')
            ->columns('account_id','milestone_id','hrs','note','approxTime','jira_worklog_id')
            ->fields('account_id','inout_id','milestone_id','hrs','note');
            
        $crud2->where('inout_id',$inOutid);
                    
        $crud2->display_as('milestone_id','Milestone');
        $crud2->display_as('hrs','Mins');
        $crud2->display_as('note','Note');      
        
        $query = $this->db->query("SELECT m.mid, project_name, milestone_name, m.milestone_status
                    FROM ws_milestones m                    
                    INNER JOIN ws_projects p ON p.project_id = m.milestone_project
                    WHERE m.milestone_status =3
                    AND p.project_status = 3");

        $rows = $query->result_array(); 
        $arr = array();
        foreach($rows as $row) {$arr[$row['mid']] = $row['project_name'].' - '.$row['milestone_name'];}
        
        if(count($rows) == 0) { $arr[0] = "Other"; } // Only if no milestone assigned 
        
        $arr[-1] = "Break";
        $crud2->change_field_type('milestone_id','dropdown',$arr);          
        

        $query = $this->db->query("Select * from ws_team where account_id = $account_id ");
        $rows = $query->result_array(); 
        $arr_team = array();
        foreach($rows as $row) {$arr_team[$row['account_id']] = $row['team_name'];}                                    
        $crud2->change_field_type('account_id','dropdown',$arr_team);          

        //$crud2->set_relation('account_id','ws_team','team_name'); 
        $crud2->change_field_type('inout_id', 'hidden', '1');

        $crud2->callback_before_insert(array($this,'tsedit'));
		$crud2->callback_before_update(array($this,'tsedit'));

        $output = $crud2->render();
        
        $this->load->view("site-admin/index_crud_msg", $output);
                        
    }

    function tsedit($post_array)
    {
         $post_array['inout_id'] = $this->uri->segment(5);         
         return $post_array;   

    }

    function emailIssue($id)
    {
        if(isset($_POST['message'])) 
        {
            $output = array();
            
            $message = $_POST['message'];
            $up_leave = $this->db->query("  SELECT *  FROM `ws_timesheet` w
            left JOIN ws_milestones m on m.mid = w.milestone_id
            left join ws_projects p ON p.project_id = m.milestone_project where inout_id = $id ")->result();    
                
            $output['data'] = $up_leave;
            $out = $this->load->view("hr_ts_inner", $output,true);    
            $out = "<h2>$message</h2><br/><hr/>".$out;

            $inout = $this->db->query("SELECT * FROM ws_inout w inner join ws_accounts t on t.account_id = w.account_id where inout_id = $id")->row();

            $this->load->library('email');
            $this->email->from('apes@archisys.biz', 'APES');        
            $this->email->reply_to('chitral.jain@archisys.in', 'Chitral Jain');        
            $this->email->to($inout->account_email);         
            //$this->email->to("chintan@archisys.in");         
            $this->email->subject($inout->account_username.' : Issue with Timesheet at '.$inout->inout_date);
            $this->email->message($out);    
            $this->email->send();
            redirect('hr/site-admin/hr/process_daily?filterUser='.$inout->account_id, 'location');
        }
        else 
        {
            $output = array();
            $output['id'] = $id;
            $this->load->view("hr_ts_issue", $output);                
        }
    }
}
