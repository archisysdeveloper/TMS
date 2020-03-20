<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class webservice extends admin_controller {
	
	
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
    	
}
