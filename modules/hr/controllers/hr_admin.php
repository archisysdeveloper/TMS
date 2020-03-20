<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class hr_admin extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
	}// __construct
	
	
	 	
	function _define_permission() {
        
		 return array("hr" => array("admin","daily","approver"));
		
	}// _define_permission
	
	
	function admin_nav() {
        
        $str = "";
        
        if ( $this->account_model->check_admin_permission("", "hr", "admin") ) 
        {
            $str = "<li class='charts'> <a href='#' class='exp'><span>HR-Admin</span></a>
            <ul class='sub'>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/emp", "Employee Master") ."</li>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/leave_approval", "Leave Approval") ."</li>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/view_leaves", "Leave View") ."</li>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/process_daily", "Approve Timesheet") ."</li>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/add_daily", "Add Timesheet") ."</li>";
			$str = $str."<li>" . anchor("hr/site-admin/hr/dailyReport", "Daily Report") ."</li>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/month_rpt", "Monthly Report") ."</li>";
            $str = $str."</ul> </li>";
        }
        if ( $this->account_model->check_admin_permission("", "hr", "approver") ) 
        {
            $str = $str."<li class='charts'> <a href='#' class='exp'><span>HR</span></a>
            <ul class='sub'>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/leave_request", "Leave Request") ."</li>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/view_ts", "Timesheets") ."</li>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/process_daily", "Approve Timesheet") ."</li>";			
			$str = $str."<li>" . anchor("hr/site-admin/hr/view_leaves", "Leave View") ."</li>";
            $str = $str."</ul> </li>";
        }
        else if ( $this->account_model->check_admin_permission("", "hr", "daily") ) 
        {
            $str = $str."<li class='charts'> <a href='#' class='exp'><span>HR</span></a>
            <ul class='sub'>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/leave_request", "Leave Request") ."</li>";
            $str = $str."<li>" . anchor("hr/site-admin/hr/view_ts", "Timesheets") ."</li>";
            //$str = $str."<li>" . anchor("hr/site-admin/hr/leave_approval", "Requissions") ."</li>";
            $str = $str."</ul> </li>";
        }
		
		
        
        
	
    return $str;
                                    
		
	}// admin_nav
	
	
}