<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class projects extends admin_controller {
	
	
	function __construct() {
		parent::__construct();
		// load model
		//$this->load->model(array("aboutus_model"));
		// load helper
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
	
    function quein()
        {
        
        if ( $this->account_model->check_admin_permission("", "projects", "enable") == false ) {redirect($this->uri->segment(1));} // Check Permission
            
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        
        $crud = new grocery_CRUD();
 
        $crud->set_relation_n_n('team', 'ws_milestones_team', 'ws_team', 'mid', 'account_id', 'team_name','priority');
        
        $crud->unset_delete();
        $crud->unset_add();
        
        $crud->set_table('ws_milestones')
            ->set_subject('Project Milestones','ws_projects')
            ->columns('milestone_project','milestone_name','milestone_type','milestone_desc','milestone_status','milestone_days','milestone_enddate')
            ->fields('team','milestone_stdate','milestone_enddate');
        
        $crud->set_relation('milestone_project','ws_projects','project_name',array("project_status"=>"3"));  
        
        $crud->where('project_manager',$user_id);
        $crud->where('milestone_stdate','0000-00-00');
                    
        $crud->display_as('milestone_name','Name');
        $crud->display_as('milestone_project','Project');
        $crud->display_as('milestone_type','Type');
        $crud->display_as('milestone_desc','Description');
        $crud->display_as('milestone_rate','Rate/Price');
        $crud->display_as('milestone_days','Days');
        $crud->display_as('milestone_status','Status');
        $crud->display_as('milestone_enddate','Deadline');
        $crud->display_as('milestone_stdate','Start Date');
        
        
        $crud->set_relation('milestone_type','ws_staticdata','val',array("gid"=>"3"));  
        $crud->set_relation('milestone_status','ws_staticdata','val',array("gid"=>"2"));  
        
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }// milestone
    
    function editms()
        {
        
        if ( $this->account_model->check_admin_permission("", "projects", "enable") == false ) {redirect($this->uri->segment(1));} // Check Permission
            
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        
        $crud = new grocery_CRUD();
 
        $crud->set_relation_n_n('team', 'ws_milestones_team', 'ws_team', 'mid', 'account_id', 'team_name','priority');
        
        $crud->unset_delete();
        $crud->unset_add();
        
        $crud->set_table('ws_milestones')
            ->set_subject('Project Milestones','ws_projects')
            ->columns('milestone_project','milestone_name','milestone_type','milestone_desc','milestone_status','milestone_days','milestone_enddate')
            ->fields('team','milestone_stdate','milestone_enddate');
        
        $crud->set_relation('milestone_project','ws_projects','project_name',array("project_status"=>"3"));  
        
        if($user_id > 1) {
        $crud->where('project_manager',$user_id);
        }
        
        $crud->where('milestone_status','3');
        
        //$crud->where('milestone_stdate','0000-00-00');
                    
        $crud->display_as('milestone_name','Name');
        $crud->display_as('milestone_project','Project');
        $crud->display_as('milestone_type','Type');
        $crud->display_as('milestone_desc','Description');
        $crud->display_as('milestone_rate','Rate/Price');
        $crud->display_as('milestone_days','Days');
        $crud->display_as('milestone_status','Status');
        $crud->display_as('milestone_enddate','Deadline');
        $crud->display_as('milestone_stdate','Start Date');
        
        
        $crud->set_relation('milestone_type','ws_staticdata','val',array("gid"=>"3"));  
        $crud->set_relation('milestone_status','ws_staticdata','val',array("gid"=>"2"));  
        
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }// milestone (PM)
	
function project_list()
    {		
		 if ( $this->account_model->check_admin_permission("", "projects", "enable") == false ) { redirect($this->uri->segment(1));} // Check Permission
         
		 $ca_account = $this->account_model->get_account_cookie("user");
		 $user_id = $ca_account['id'];
         $where = " 1 = 1";
         if($user_id != 1)
         {
               $where = " mid in (select mid from ws_milestones_team where account_id = $user_id )";
         }
         $status = 3;
         if(isset($_GET['status'])) {$status = $_GET['status'] ; }
         $query = $this->db->query("Select * from ws_projects p 
                                        inner join ws_milestones m on m.milestone_project = p.project_id 
                                        inner join ws_clients c on p.project_client = c.client_id
                                        where  milestone_status = $status and milestone_stdate > '01-01-1990' and $where");
                                        
        
         $output['data'] = $query->result();
		 $output['admin_content'] = $this->load->view("my_projects", $output, true);
         $this->load->view("site-admin/index_view", $output);

		 
		 
	}
   
function project_details()
    {
          if ( $this->account_model->check_admin_permission("", "projects", "enable") == false ) { redirect($this->uri->segment(1));} // Check Permission
        $ca_account = $this->account_model->get_account_cookie("admin");
        $user_id = $ca_account['id'];
        $mid = $_GET['id'];
        $milestone_id = $_GET['id'];
//$query = $this->db->query(" ");
        
      $query = $this->db->query("Select * from ws_projects p 
                                        inner join ws_milestones m on m.milestone_project = p.project_id 
                                        inner join ws_clients c on p.project_client = c.client_id
                                        where mid = ".$_GET['id']);
                                     
    $query1 = $this->db->query("SELECT * FROM ws_milestones_team
     inner join   ws_team on ws_milestones_team.account_id = ws_team.account_id      
    where mid  = ".$_GET['id']);


$query3 =  $this->db->query("SELECT * FROM `ws_timesheet`
INNER JOIN ws_team ON ws_timesheet.account_id = ws_team.account_id
INNER JOIN ws_inout ON ws_timesheet.inout_id = ws_inout.inout_id
 WHERE milestone_id=".$_GET['id']);
$query5 = $this->db->query("SELECT * FROM ws_trending tn 
INNER JOIN ws_milestones p ON tn.project_id = p.milestone_project where mid=".$_GET['id']);
                                        

$query4 =  $this->db->query("SELECT team_name, SUM(hrs) s,milestone_id FROM ws_timesheet
INNER JOIN ws_team ON ws_timesheet.account_id = ws_team.account_id
INNER JOIN ws_inout ON ws_timesheet.inout_id = ws_inout.inout_id
WHERE milestone_id=".$_GET['id']." GROUP BY team_name" );


$query2 = $this->db->query("SELECT * FROM ws_timesheet
INNER JOIN ws_inout ON ws_timesheet.account_id = ws_inout.account_id
INNER JOIN ws_team ON ws_timesheet.account_id = ws_team.account_id
WHERE ws_timesheet.milestone_id = ".$_GET['id']);
         $output['data'] = $query->row();
         $output['data1'] = $query1->result();
         $output['data2'] = $query2->result();
         $output['data3'] = $query3->result();
          $output['data4'] = $query4->result();
           $output['data5'] = $query5->result();
         $output['admin_content'] = $this->load->view("project_view", $output, true);
         $this->load->view("site-admin/index_view", $output);
        
    }    

function check_list()
{
    $output = array();
    
    $ca_account = $this->account_model->get_account_cookie("user");
    $user_id = $ca_account['id'];
    $sql=$this->db->query(" select project_name,count(*) cnt from ws_check_list cl 
                        inner join ws_milestones m on m.mid = cl.mid
                        inner join ws_projects p on p.project_id = m.milestone_project    
                        where m.mid in (select mid from ws_milestones_team where account_id = $user_id ) and milestone_status = 3 and status <> 'close'
                        group by project_name");
                        
                
    $output['data'] = $sql->result();
    
    $man_sql=$this->db->query(" select ifnull(team_name,'No Man') team_name,man_on ,count(*) cnt from ws_check_list cl 
                        inner join ws_milestones m on m.mid = cl.mid
                        left join ws_team t on t.account_id = cl.man_on
                        where m.mid in (select mid from ws_milestones_team where account_id = $user_id ) and milestone_status = 3 and status <> 'close'
                        group by team_name");
                        
                
    $output['man_on'] = $man_sql->result();
         
    $output['admin_content'] = $this->load->view("checklistcontainer", $output, true);
         
    $this->load->view("site-admin/index_view", $output);

}

function getChecklist()
{
        //if ( $this->account_model->check_admin_permission("", "projects", "enable") == false ) { redirect($this->uri->segment(1));} // Check Permission
        
         $ca_account = $this->account_model->get_account_cookie("user");
         $user_id = $ca_account['id'];
            
         $where = "";
         $limit = "";
         if(isset($_GET['sts'])) {$where = $where . " and status = '".$_GET['sts']."'"; if($_GET['sts']=='close'){ $limit = " Limit 0,100";}
		 } else {$where = $where . " and status <> 'close'";}
         
         
         if(isset($_GET['p_name'])) {$where = $where . " and project_name = '".$_GET['p_name']."'";}
         if(isset($_GET['m_name'])) {$where = $where . " and milestone_name = '".$_GET['m_name']."'";}         
         if(isset($_GET['cdate'])) {$where = $where . " and cr_date = '".$_GET['cdate']."'";}
         if(isset($_GET['prt'])) {$where = $where . " and priority = '".$_GET['prt']."'";}
         if(isset($_GET['typ'])) {$where = $where . " and state = '".$_GET['typ']."'";}
         if(isset($_GET['man_on'])) {$where = $where . " and man_on = '".$_GET['man_on']."'";}
                             
         $sql=$this->db->query("
                        select * from ws_check_list cl 
                        inner join ws_milestones m on m.mid = cl.mid
                        inner join ws_projects p on p.project_id = m.milestone_project    
                        where m.mid in (select mid from ws_milestones_team where account_id = $user_id ) 
						and milestone_status = 3 $where Order by cid desc $limit ");
         
         if ( $this->account_model->check_admin_permission("", "projects", "enable") == false )
         {
             $sql=$this->db->query("
                        select * from ws_check_list cl 
                        inner join ws_milestones m on m.mid = cl.mid
                        inner join ws_projects p on p.project_id = m.milestone_project    
                        inner join ws_clients c on c.client_id = p.project_client
                        where c.linked_account = $user_id
                        and milestone_status = 3 $where Order by cid desc");
         }               
                
         $output['data2'] = $sql->result();
         
         $team_rec = $this->db->query("Select a.account_id,COALESCE(team_name,account_username) team_name from ws_accounts a left join ws_team w on w.account_id = a.account_id")->result();
         $team = array();
         foreach($team_rec as $r)
         {
            $team[$r->account_id] = $r->team_name;
         }
         $output['team'] = $team;
          
         //$output['admin_content'] = $this->load->view("newCL.php", $output, true);
         $this->load->view("newCL.php", $output);
         //$this->load->view("site-admin/index_view", $output);
    
}

function closeCL() {
    
        $ca_account = $this->account_model->get_account_cookie("user");
        $user_id = $ca_account['id'];
        $date = date('Y-m-d');
        
        $data5 = array('ch_cls_user'=>$user_id ,'status'=>'close','cls_date'=>$date);                
        $this->db->where('cid', $_GET['cid']);
        $this->db->update('ws_check_list', $data5);
        $this->_sendTaskUpdate($_GET['cid'],true);
        echo "Saved";
    
}

function man_on() {
    
        $ca_account = $this->account_model->get_account_cookie("user");
        $user_id = $ca_account['id'];
        if(isset($_GET['rmv'])){ $user_id = 0; }                
        $data5 = array('man_on'=>$user_id);                
        $this->db->where('cid', $_GET['cid']);
        $this->db->update('ws_check_list', $data5);
        $this->_sendTaskUpdate($_GET['cid'],false);
        echo "Saved";
    
}

function cledit() {

    //if ( $this->account_model->check_admin_permission("", "projects", "enable") == false ) { redirect($this->uri->segment(1));} // Check Permission
        
         $output = array();
         
         $ca_account = $this->account_model->get_account_cookie("user");
         $user_id = $ca_account['id'];
         
         if(isset($_POST['cid']))
         {
            $date = date('Y-m-d');
            $chk_clnt = 0;
            if(isset($_POST['chk_clnt'])){ $chk_clnt = $_POST['chk_clnt']; }
            
            if( $_POST['status'] != "close"){
            $data5 = array('mid'=>$_POST['milestone'], 'description'=>$_POST['Textarea'], 'priority'=>$_POST['priority'], 'state'=>$_POST['Type'], 'cr_date'=>$date, 'cr_user'=>$user_id,'status'=>$_POST['status'],'chk_clnt' => $_POST['chk_clnt'],'man_on' => $_POST['user']);
            }
            else {
                $data5 = array('mid'=>$_POST['milestone'], 'description'=>$_POST['Textarea'], 'priority'=>$_POST['priority'], 'state'=>$_POST['Type'], 'cls_date'=>$date, 'ch_cls_user'=>$user_id ,'status'=>$_POST['status']);                
            }
            if($_POST['cid'] == "0") {
                $this->db->insert('ws_check_list', $data5); 
                $this->_sendTaskUpdate($this->db->insert_id(),true);
            }
            else {  $this->db->where('cid', $_POST['cid']);
                $this->db->update('ws_check_list', $data5);
                
                if( $_POST['status'] == "close"){
                    $this->_sendTaskUpdate($_POST['cid'],true);
                }
                else 
                {
                    //$this->_sendTaskUpdate($_POST['cid'],false);
                }
            }
            
            echo "Saved";
            
         }
         
         else {
         
         $output['mile'] = $this->db->query("Select * from ws_projects p 
                                        inner join ws_milestones m on m.milestone_project = p.project_id 
                                        INNER JOIN ws_staticdata sd ON m.milestone_status=sd.id
                                        inner join ws_clients c on p.project_client = c.client_id
                                        where mid in (select mid from ws_milestones_team where account_id = $user_id ) and milestone_status = 3 ")->result();
          
          if ( $this->account_model->check_admin_permission("","projects", "enable") == false )
         {
             $output['mile'] = $this->db->query("Select * from ws_projects p 
                                        inner join ws_milestones m on m.milestone_project = p.project_id 
                                        INNER JOIN ws_staticdata sd ON m.milestone_status=sd.id
                                        inner join ws_clients c on p.project_client = c.client_id
                                        where c.linked_account = $user_id and milestone_status = 3 ")->result();
         
          }               
                          
          if($_GET['cid']) {
              $cid = $_GET['cid'];
              $data =  $this->db->query("select cl.*,milestone_name,project_name,val,id from ws_check_list cl
                                                  inner join ws_milestones m on m.mid = cl.mid
                                                  INNER JOIN ws_staticdata sd ON m.milestone_status=sd.id
                                                  inner join ws_projects p on p.project_id = m.milestone_project    
                                                  where cl.cid =".$cid);
              $output['data'] = $data->result();
              
          }
         
         $this->load->view("cleditadd", $output);
         }

    }

function _sendTaskUpdate($cid,$client)
{
    $output = array();
    $data =  $this->db->query("select cl.*,milestone_name,project_name,val,id,project_manager,client_email from ws_check_list cl
                                                  inner join ws_milestones m on m.mid = cl.mid
                                                  INNER JOIN ws_staticdata sd ON m.milestone_status=sd.id
                                                  inner join ws_projects p on p.project_id = m.milestone_project    
                                                  inner join ws_clients c on c.client_id = p.project_client    
                                                  where cl.cid =".$cid)->row();
   $output['data'] = $data;
   
   $team_rec = $this->db->query("Select a.* from ws_milestones_team t inner join ws_accounts a on a.account_id = t.account_id where mid = ".$data->mid)->result();
   $team = array();
         foreach($team_rec as $r)
         {
            $team[$r->account_id] = array($r->account_username,$r->account_email);
         }
   $output['team'] = $team;
   
   $out = $this->load->view("task_email", $output, true);    
        
   $this->load->library('email');
   $this->email->from('apes@archisys.biz', 'APES');
   $to = array();
   foreach($team_rec as $r)
         {
             array_push($to,$r->account_email);
         }
   if($client && $data->chk_clnt == "1")
   {   
       $client = explode(",",$data->client_email);
       foreach($client as $c)
       {
        array_push($to,$c);    
       }
       
   }
   
   $subject = 'T:'.$data->cid.' | '.$data->project_name;
   if($data->man_on > 0)
   {
       $subject = $subject.' | '.$team[$data->man_on][0];
   }
   $subject = $subject.' | '.$data->status;
   $this->email->to($to);  
   //$this->email->to("chintan@archisys.in");  
   $this->email->subject($subject);
   $this->email->message($out);    
   $this->email->send();
        
}
 
 function trends()
 {
 
    if ( $this->account_model->check_admin_permission("", "projects", "enable") == false ) {redirect($this->uri->segment(1));} // Check Permission
            
                  
        $crud = new grocery_CRUD();
              
        $crud->set_table('ws_trending')
            ->set_subject('Trending')
            ->columns('project_id','description','keyword','dt')
            ->fields('project_id','description','keyword','dt');
        
        $crud->set_relation('project_id','ws_projects','project_name',array("project_status"=>"3"));  
        
                    
        $crud->display_as('project_id','Project Name');
        $crud->display_as('description','Description');
        $crud->display_as('keyword','Keyword');
        $crud->display_as('dt','Date');
                     
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
             
 }
 
function getUserList()
{
    $milestone = $_GET['mid'];
    $user_list = $this->db->query("select m.account_id,t.team_name from ws_milestones_team m 
    inner join ws_team t on t.account_id = m.account_id where mid = $milestone")->result();
    echo "<option value='0'>-- None --</option>";
    foreach ($user_list as $u)
    {
        echo "<option value='{$u->account_id}'>{$u->team_name}</option>";
    }
}

}

