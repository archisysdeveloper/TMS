<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class webservice_admin extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
	}// __construct
	
	
	 	
	function _define_permission() {
        
		 return array("webservice" => array("enable"));
		
	}// _define_permission
	
	
	function admin_nav() {
		/*
        if ( $this->account_model->check_admin_permission("", "finance", "enable") ) 
        {
	    return "<li class='charts'> <a href='#' class='exp'><span>Finance</span></a>
		     <ul class='sub'>
                        <li>" . anchor("finance/site-admin/finance/clients", "Clients") ."</li>
					    <li>" . anchor("finance/site-admin/finance/projects", "Projects") ."</li>
					    <li>" . anchor("finance/site-admin/finance/milestones", "Milestone") ."</li>
					    <li>" . anchor("projects/site-admin/projects", "Invoices") ."</li>
					    <li>" . anchor("projects/site-admin/projects", "Receipt") ."</li>
                    </ul>
			    </li>";
		    
	    }
		*/
    }
	
	
}