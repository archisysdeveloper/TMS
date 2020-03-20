<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class projects extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
	}// __construct
	
	
	function index() {
        
        $this->load->view('index_view');
        
	}// index
	
	
	
	
}