<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class projects_admin extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
	}// __construct
	
	
	 	
	function _define_permission() {
        
		 return array("projects" => array("enable","client"));
		
	}// _define_permission
	
	
	function admin_nav() {
        if ( $this->account_model->check_admin_permission("", "projects", "enable") ) 
        {
        
	    return "<li class='charts'> <a href='#' class='exp'><span>Projects</span></a>
		     <ul class='sub'>
                        <li>" . anchor("projects/site-admin/projects/project_list", "Project/Milestone") ."</li>					                            
					    <li>" . anchor("projects/site-admin/projects/check_list", "Check List") ."</li>
                        <li>" . anchor("projects/site-admin/projects/trends", "Trends") ."</li>                        
                    </ul>
			    </li>";
        }
        if ( $this->account_model->check_admin_permission("", "projects", "client") ) 
        {
        
        return "<li class='charts'> <a href='#' class='exp'><span>Projects</span></a>
             <ul class='sub'>
                        <li>" . anchor("projects/site-admin/projects/check_list", "Check List") ."</li>                        
                    </ul>
                </li>";
        }
		
	}// admin_nav
	
	
}
