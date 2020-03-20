<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class finance_admin extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
	}// __construct
	
	
	 	
	function _define_permission() {
        
		 return array("finance" => array("enable","billing"));
		
	}// _define_permission
	
	
	function admin_nav() {
        $menu = "";
        
        if ( $this->account_model->check_admin_permission("", "finance", "enable") ) 
        {
	    $menu =  "<li class='charts'> <a href='#' class='exp'><span>Client Mgmt</span></a>
		     <ul class='sub'>
                        <li>" . anchor("finance/site-admin/finance/clients", "Clients") ."</li>
					    <li>" . anchor("finance/site-admin/finance/projects", "Projects") ."</li>
					    <li>" . anchor("finance/site-admin/finance/milestones", "Milestone") ."</li>
                    </ul>
			    </li>";
                                                                                		    
	    }
        if($this->account_model->check_admin_permission("", "finance", "billing") ){
            
            $menu = $menu. " <li class='charts'> <a href='#' class='exp'><span>Finance</span></a>
                 <ul class='sub'>
                            <li>" . anchor("finance/site-admin/finance/invoice", "Invoices") ."</li>
                            <li>" . anchor("finance/site-admin/finance/receipt", "Receipt") ."</li>
                            <li>" . anchor("finance/site-admin/finance/balance", "Balance") ."</li>
                            <li>" . anchor("finance/site-admin/finance/close", "Closing ") ."</li>
                            <li><hr/></li>
                        <li>" . anchor("finance/site-admin/finance/currency", "Currency") ."</li>
                        </ul>
                    </li>";
        }
        return $menu;
    }
	
	
}