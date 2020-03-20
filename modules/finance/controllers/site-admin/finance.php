<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class finance extends admin_controller {
    
    
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
    
    function clients() {
        
        if ( $this->account_model->check_admin_permission("", "finance", "enable") == false ) {redirect($this->uri->segment(1));} // Check Permission
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_clients')
            ->set_subject('Client')
            ->fields('client_name','client_company','client_address','client_country','client_email','client_skype','client_im','client_number','client_ref','client_notes','linked_account')
            ->columns('client_name','client_company','client_country','client_email','client_skype','client_im');
            
        $crud->display_as('client_name','Name');
        $crud->display_as('client_address','Address');
        $crud->display_as('client_company','Company');
        $crud->display_as('client_email','Email');
        $crud->display_as('client_country','Country');
        $crud->display_as('client_skype','Skype');
        $crud->display_as('client_im','IM');
        $crud->display_as('client_number','Number');
        $crud->display_as('client_ref','Refrence');
        $crud->display_as('client_notes','Notes');
        
        $crud->set_relation('linked_account','ws_accounts','account_username');  
        
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }// clients
	
	function proposal() {
        
        if ( $this->account_model->check_admin_permission("", "finance", "enable") == false ) {redirect($this->uri->segment(1));} // Check Permission
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_proposal')
            ->set_subject('Client')
            ->fields('pro_name','pro_client','pro_rate','pro_desc','pro_estimate','pro_deadline','pro_fullCompnay','pro_deadline_content')
            ->columns('pro_name','pro_client','pro_rate','pro_estimate','pro_deadline','pro_fullCompnay','pro_deadline_content');
        
        
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }// clients
    
    function projects() {
        
        if ( $this->account_model->check_admin_permission("", "finance", "enable") == false ) {redirect($this->uri->segment(1));} // Check Permission
        
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_projects')
            ->set_subject('Projects')
            ->columns('project_name','project_jira_key','project_client','project_cat','project_sale' ,'project_date','project_weeks','project_status','project_manager','project_close_date')
            ->fields('project_name','project_jira_key','project_client','project_cat','project_date','project_weeks','project_desc' ,'project_files' ,'project_status','project_manager','project_cost' ,'project_advance','project_sale','project_notes','project_close_date');
            
        $crud->display_as('project_name','Project Name');
        $crud->display_as('project_client','Client');
        $crud->display_as('project_cat','Skills');
        $crud->display_as('project_desc','Description');
        $crud->display_as('project_cost','Budget');
        $crud->display_as('project_advance','Advance');
        $crud->display_as('project_sale','Sale Ref');
        $crud->display_as('project_date','Date');
        $crud->display_as('project_weeks','Weeks');
        $crud->display_as('project_files','Files');
        $crud->display_as('project_status','Status');
        $crud->display_as('project_manager','PM');
        $crud->display_as('project_notes','Notes');
        $crud->display_as('project_close_date','Close Date');
        
        $crud->set_relation('project_client','ws_clients','client_name');  
        $crud->set_relation('project_cat','ws_project_cat','category');  
        
        $crud->set_relation('project_sale','ws_accounts','account_username');  
        $crud->set_relation('project_manager','ws_accounts','account_username');  
        $crud->set_relation('project_status','ws_staticdata','val',array("gid"=>"2"));  

        
        $crud->field_type('project_cost', 'integer', 3);
        $crud->field_type('project_cost', 'integer', 3);
        $crud->set_field_upload('project_files','uploads/proj_root/');
        
        
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }// projects
    
 function milestones()
        {
        
        if ( $this->account_model->check_admin_permission("", "finance", "enable") == false ) {redirect($this->uri->segment(1));} // Check Permission
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_milestones')
            ->set_subject('Project Milestones')
            ->columns('milestone_name','milestone_project','milestone_status','milestone_jira_managed')
            ->fields('milestone_name','milestone_project','milestone_type','milestone_desc','milestone_status','milestone_jira_managed','milestone_stdate','team' );
		
		$crud->set_relation_n_n('team', 'ws_milestones_team', 'ws_team', 'mid', 'account_id', 'team_name','priority');
		
        $crud->display_as('milestone_name','Name');
        $crud->display_as('milestone_project','Project');
        $crud->display_as('milestone_type','Type');
        $crud->display_as('milestone_desc','Description');
        $crud->display_as('milestone_rate','Rate/Price');
        $crud->display_as('milestone_days','Days');
        $crud->display_as('milestone_status','Status');
        $crud->display_as('milestone_enddate','Deadline');
		$crud->display_as('milestone_stdate','Start Date');
        $crud->display_as('milestone_jira_managed','JIRA Managed');
        
        $crud->where('project_status','3');
        $crud->set_relation('milestone_project','ws_projects','project_name',array("project_status"=>"3"));  

        $crud->set_relation('milestone_type','ws_staticdata','val',array("gid"=>"3"));  
        $crud->set_relation('milestone_status','ws_staticdata','val',array("gid"=>"2"));
        

        $crud->change_field_type('milestone_jira_managed','dropdown',array(1=>"Yes",0=> "No"));

        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }// milestone
    
    function currency()
        {
        
        if ( $this->account_model->check_admin_permission("", "finance", "billing") == false ) {redirect($this->uri->segment(1));} // Check Permission
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_currency')
            ->set_subject('Currency Master')
            ->columns('curr_name','curr_symbol','curr_rate')
            ->fields('curr_name','curr_symbol','curr_rate');
            
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }// milestone
    
    function invoice()
    {
        
        if ( $this->account_model->check_admin_permission("", "finance", "billing") == false ) {redirect($this->uri->segment(1));} // Check Permission
        $crud = new grocery_CRUD();
        //$crud->unset_delete(); 
        $crud->set_table('ws_invoices')
            ->set_subject('Invoices')
            ->columns('inv_type','inv_client','inv_project' , 'inv_subject' , 'inv_date','inv_total','inv_currency','receipt_amount','inv_status')
            ->fields('inv_type','inv_client' ,'inv_project', 'inv_subject' , 'inv_description' , 'inv_date','inv_total','inv_currency');
            
        $crud->display_as('inv_client','Name');        
        $crud->display_as('inv_project','Project');
        $crud->display_as('inv_subject','Subject');
        $crud->display_as('inv_description','Note');
        $crud->display_as('inv_date','Date');
        $crud->display_as('inv_total','Total');
        $crud->display_as('inv_currency','Currency');
        $crud->display_as('inv_type','Type');
        $crud->display_as('receipt_amount','Received');
        
        $crud->set_relation('inv_client','ws_clients','client_name');  
        $crud->set_relation('inv_project','ws_projects','project_name');  
        
        $crud->set_relation('inv_currency','ws_currency','{curr_name}({curr_symbol})');  
        
        $crud->set_relation('inv_type','ws_staticdata','val',array("gid"=>"4"));  
        
        $crud->change_field_type('inv_status','dropdown',array("BAD","Due","Paid"));
        
        $this->load->library('gc_dependent_select');
        
        $fields = array(
        // first field:
        'inv_client' => array( // first dropdown name
        'table_name' => 'ws_clients', // table of country
        'title' => 'client_name', // country title
        'relate' => null // the first dropdown hasn't a relation
        ),
        // second field
        'inv_project' => array( // second dropdown name
        'table_name' => 'ws_projects', // table of state
        'title' => 'project_name', // state title
        'id_field' => 'project_id', // table of state: primary key
        'relate' => 'project_client', // table of state:
        'data-placeholder' => 'select project' //dropdown's data-placeholder:
        )
        
        );
        
        $config = array(
        'main_table' => 'ws_invoices',
        'main_table_primary' => 'inv_id',
        "url" => base_url() . __CLASS__ . '/site-admin/' . __CLASS__.'/'. __FUNCTION__ . '/', 
        'ajax_loader' => base_url() . 'assets/grocery_crud/ajax-loader.gif' // path to ajax-loader image. It's an optional parameter
        );
        $categories = new gc_dependent_select($crud, $fields, $config);
        $js = $categories->get_js();

        $output = $crud->render();
        
        $output->output.= $js;
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }
    
    function receipt()
        {
        
        if ( $this->account_model->check_admin_permission("", "finance", "billing") == false ) {redirect($this->uri->segment(1));} // Check Permission
        $crud = new grocery_CRUD();
 
        $crud->set_table('ws_receipt')
            ->set_subject('Receipts')
            ->columns('inv_id','rec_amount','rec_desc','rec_refno','rec_date','rec_narration','rec_reftxn')
            ->fields('inv_id','rec_amount','rec_desc','rec_refno','rec_date','rec_narration','rec_reftxn');
            
        $crud->display_as('inv_id','Invoice');
        $crud->display_as('rec_amount','Amount');
        $crud->display_as('rec_desc','Desc');
        $crud->display_as('rec_refno','Receipt No');
        $crud->display_as('rec_date','Date');
        $crud->display_as('rec_narration','Narration');
        $crud->display_as('rec_reftxn','Txn No');
        
        $subject = array();
        $res = $this->db->query("Select * from ws_invoices i 
                                 inner join ws_clients c on c.client_id = i.inv_client 
                                 inner join ws_currency r on r.curr_id = inv_currency ")->result();
        foreach($res as $r)
        {
            $subject[$r->inv_id] = $r->client_company.' / '.$r->inv_subject ;
        }
        $crud->change_field_type('inv_id','dropdown',$subject);
        //$crud->set_relation('inv_id','ws_invoices','inv_subject');  
         
        $crud->callback_after_insert(array($this, 'receipt_calculate'));
        $crud->callback_after_update(array($this, 'receipt_calculate'));
    
        $output = $crud->render();
     
        $this->load->view("site-admin/index_crud", $output);
        
        
    }
    
    function receipt_calculate($post_array,$primary_key)
    {
        
        //$inv_id = $this->db->query("Select * from ws_receipt where rec_id = $primary_key")->row()->inv_id;
        
        $qry = "update ws_invoices i inner join 
        (select inv_id,sum(rec_amount) amount from ws_receipt group by inv_id ) r 
        on r.inv_id = i.inv_id set i.receipt_amount = amount where r.inv_id in (Select inv_id from ws_receipt where rec_id = $primary_key )";
        $this->db->query($qry);
        
        $this->db->query("update ws_invoices set inv_status = 1 where receipt_amount <> inv_total");
        $this->db->query("update ws_invoices set inv_status = 2 where receipt_amount = inv_total");
        
    
    
    }
 
 function balance()
    {
         if ( $this->account_model->check_admin_permission("", "finance", "billing") == false ) {redirect($this->uri->segment(1));} // Check Permission
         
         $sql=$this->db->query("
                        select *, SUM(inv_total) from ws_invoices ic 
                        inner join ws_clients c on ic.inv_client = c.client_id
                        where inv_status=1
                        GROUP BY inv_client
                        
                        ");
         $output['data'] = $sql->result();
          $output['admin_content'] = $this->load->view("balance", $output, true);
           $this->load->view("site-admin/index_view", $output);
    }
    
     function close()
     {
        if ( $this->account_model->check_admin_permission("", "finance", "billing") == false ) { redirect($this->uri->segment(1));} // Check Permission
              $ca_account = $this->account_model->get_account_cookie("user");
         $user_id = $ca_account['id'];

      if(isset($_GET['id'])){ 
         
         $query5 = $this->db->query("SELECT * FROM ws_projects p 
         INNER JOIN ws_milestones mt ON p.project_id = mt.milestone_project
         where project_status=3 and project_id=".$_GET['id']); 
          
           $output['data5'] = $query5->result();   
           $output['admin_content'] = $this->load->view("project_view", $output, true);               
      }
      
      else{
          $where = "";
          if(isset($_GET['cid']))
          {
              $where = " and c.client_id = ".$_GET['cid'];
          }
         $query5 = $this->db->query("SELECT * FROM ws_projects p 
         INNER JOIN ws_milestones mt ON p.project_id = mt.milestone_project
         inner join ws_clients c on p.project_client = c.client_id
         where project_status = 3 $where GROUP BY project_id");
          
          $output['data5'] = $query5->result();   
          $output['admin_content'] = $this->load->view("close_project", $output, true);               
          
      }   
      $this->load->view("site-admin/index_view", $output);  
    }
    
    function close1() {
        if(isset($_GET['milestone_project'])){
        
        $data5 = array('milestone_status'=>'4');                
        $this->db->where('milestone_project', $_GET['milestone_project']);
        $this->db->update('ws_milestones', $data5);
        //$this->close();
       // echo "Saved";
        $this->close(); 
        return;
        }
        
        if(isset($_GET['project_id'])){
        
        $data5 = array('project_status'=>'4');    
        $this->db->where('project_id', $_GET['project_id']);
        $this->db->update('ws_projects', $data5);
        //echo "Saved";
        $this->close(); 
        return; 
        }
        }
}
