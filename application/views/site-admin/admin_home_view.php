 <!-- Page statistics and control buttons area -->
 
    <div class="statsRow">
        <div class="wrapper">
            <div class="controlB">
			<?php 
 if(isset($_GET['msg']))
 {?>
	 <h3><?php echo $_GET['msg'];?></h3>
 <?php } ?>
                <ul>
                    <?php 
                        $ca_account = $this->account_model->get_account_cookie("admin");
                        $user_id = $ca_account['id'];
                        $query = $this->db->query('SELECT * FROM ws_team where account_id = '.$user_id);
                        
                        if($query->num_rows() > 0) // This is for team members 
                        {

                    ?>
                    
                    <?php 
					$time = $this->db->query("select * from ws_team t where account_id = $user_id")->row();
                    $this->db->query("SET time_zone='+5:30'");
                                        $query = $this->db->query("SELECT *  FROM ws_inout where account_id = $user_id  and DATE(inout_date) =  CURDATE() and out_time is null ");
                        if($query->num_rows() == 0) {
                        // $time = $this->db->query("SELECT HOUR(CURTIME()) time;")->row()->time;
                        // $time = $time*1;
                        
                        $date = date('H:i:s');
                        //if($time->lockout_time > $date) {
						if(true) {
                       ?>    
                    <li><a href="<?php echo site_url(); ?>hr/site-admin/hr/inout" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/control/32/plus.png" alt="" /><span>
                        Start new session</span></a></li>
                    <?php } 
                        else { ?> 
                    <li><a href="#" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/control/32/busy.png" alt="" /><span>Checkin Barred (<?php echo date('h:i A', strtotime($time->lockout_time)); ?>)</span></a></li>
                        <?php }
                    } else {
                        
                    $this->load->library('session');
                    $this->session->set_userdata('ses_id', $query->row()->inout_id);                        
                        ?>
                    <li><a href="<?php echo site_url(); ?>hr/site-admin/hr/close" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/control/32/busy.png" alt="" /><span>Close Session</span></a></li>
                    <?php }?>
                    <!--<li><a href="<?php echo site_url(); ?>projects/site-admin/projects/check_list" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/control/32/order-149.png" alt="" /><span>Tasks</span></a></li>
					-->
                                        
                    <li><a href="<?php echo site_url(); ?>hr/site-admin/hr/leave_request" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/control/32/hire-me.png" alt="" /><span>Leave Request</span></a></li>
                    
                    <?php 
                        }
                    ?>
                </ul>
				<p><strong> Allowed Check-In Time : <?php echo $time->lockout_time;?> </strong></p>
				
                <div class="clear"></div>
            </div>
        </div>
    </div>
    
    <div class="line"></div>
    
    <!-- Main content wrapper -->
    <div class="wrapper">
	
    

</div>        
