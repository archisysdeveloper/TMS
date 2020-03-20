<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class webservice extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
		
		 $this->load->model(array("account/account_model", "config_model"));
		 $this->load->helper(array("html", "form", "language", "url"));
		 $this->load->library(array("form_validation", "securimage/securimage", "session"));
		 
		 // Allow from any origin
			if (isset($_SERVER['HTTP_ORIGIN'])) {
				header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
				header('Access-Control-Allow-Credentials: true');
				header('Access-Control-Max-Age: 86400');    // cache for 1 day
			}

		// Access-Control headers are received during OPTIONS requests
			if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

				if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
					header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

				if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
					header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

				exit(0);
			}
				 
			}// __construct
			
	
	function index() {
	
		$output = array();
		if(isset($_POST['username']))
		{
			$username = trim(strip_tags($this->input->post("username")));
			$password = trim($this->input->post("password"));
			$this->load->library(array("session"));
			$this->session->set_userdata("slogin","tried");
			$result = $this->account_model->member_login($username, $password);		
			$ca_account = $this->account_model->get_account_cookie("admin");
			$output['data'] = array('status'=>$result,'accd'=>$ca_account,'sec_check'=>$this->session->userdata("slogin"));
		}
		else 
		{
			$output['data'] = array('status'=>'no-data');
		}
		
        $this->load->view('json_view',$output);
		
        
	}// index
	
	function sessionStatus()
	{
		
		$this->load->library(array("session"));
		$ca_account = $this->account_model->get_account_cookie("member");
		$output = array();
		$output['data'] = array("id"=>$ca_account['id'],"username"=>$ca_account['username'],"sec_check"=>$this->session->userdata("slogin"));
        $this->load->view('json_view',$output);
	}
	
	function getCheckList()
	{
             $where = "";
             if(isset($_GET['p'])) { if($_GET['p'] > 0 ) { $where = " and project_id = ".$_GET['p'];} }
	         $ca_account = $this->account_model->get_account_cookie("user");
             $user_id = $ca_account['id'];
             $sql=$this->db->query(" select cl.*,m.milestone_name,project_name,a.account_username from ws_check_list cl 
                        inner join ws_milestones m on m.mid = cl.mid
                        inner join ws_projects p on p.project_id = m.milestone_project
                        left join ws_accounts a on cl.man_on = a.account_id    
                        where m.mid in (select mid from ws_milestones_team where account_id = $user_id ) 
                        and milestone_status = 3 $where and status <> 'close' order by cid desc");
                        
                
    $output['data'] = $sql->result();
    $this->load->view('json_view',$output);
    
	}
	
	function project_list()
	{
		 $output = array();
		 $ca_account = $this->account_model->get_account_cookie("user");
		 $user_id = $ca_account['id'];
         $where = " 1 = 1";
         if($user_id != 1)
         {
               $where = " mid in (select mid from ws_milestones_team where account_id = $user_id )";
         }
         $status = 3;
         if(isset($_GET['status'])) {$status = $_GET['status'] ; }
         $query = $this->db->query("Select p.project_id , project_name ,milestone_name,milestone_enddate,client_email   from ws_projects p 
                                        inner join ws_milestones m on m.milestone_project = p.project_id 
                                        inner join ws_clients c on p.project_client = c.client_id
                                        where  milestone_status = $status and milestone_stdate > '01-01-1990' and $where");
                                        
        
         $output['data'] = $query->result();
		 $this->load->view('json_view',$output);
	}
	function get_Tprojects()
	{
	$ca_account = $this->account_model->get_account_cookie("user");
    $user_id = $ca_account['id'];
    $sql=$this->db->query(" select project_id,project_name,count(*) cnt from ws_check_list cl 
                        inner join ws_milestones m on m.mid = cl.mid
                        inner join ws_projects p on p.project_id = m.milestone_project    
                        where m.mid in (select mid from ws_milestones_team where account_id = $user_id ) and milestone_status = 3 and status <> 'close'
                        group by project_name,project_id");
                        
                
    $output['data'] = $sql->result();
	$this->load->view('json_view',$output);
	}
}