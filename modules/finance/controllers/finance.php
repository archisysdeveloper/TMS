<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class finance extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
	}// __construct
	
	
	function index() {
        
        $this->load->view('index_view');
        
	}// index
	
	function contract($name = "")
	{
		$output = array();
		$output['row'] = $this->db->query("select * from ws_proposal where pro_name = '$name'")->row();		
		$this->load->view("proposal", $output);
	}
	
	
	
}