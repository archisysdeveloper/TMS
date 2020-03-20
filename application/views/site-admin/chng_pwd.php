<?php /*?><div class="mws-panel grid_8">
			<div class="mws-panel-header">
                <span class="mws-i-24 i-list">Change Username</span>
            </div>
			<div class="mws-panel-body">
                <form id="mws-validate"  name="form" method="POST" class="mws-form" action="<?php echo site_url()?>/settings/site-admin/settings/chng_user">
                    <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                    <div class="mws-form-inline">
                        <div class="mws-form-row">
                            <label>Username</label>
                            <div class="mws-form-item large">
							<?php 
							$ca_account = $this->account_model->get_account_cookie("admin");
       						$user_id = $ca_account['id'];  
							$qry = $this->db->query('select * from ws_accounts where account_id = '.$user_id);
							$ros = $qry->row()->account_username;?>
                                <input type="text" name="usernames" value="<?php echo $ros;?>" class="mws-textinput required" />
                            </div>
                        </div>
                       <div class="mws-form-row">
                         <input type="submit" name="submit" value="Submit" class="mws-button red"  />
						 </div>
						</div>

                           
                </form>
				</div>
</div><?php */?>

<div class="wrapper">

   <form id="mws-validate"  name="form" method="POST" class="mws-form" action="<?php echo site_url()?>site-admin/account/change_pwd">
   <fieldset>
                <div class="widget">
                    <div class="title"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Change Password</h6></div>
                    
                    <div class="formRow">
                        <label>Old Password</label>
                        <div class="formRight"><input type="password" name="old_pass" value="" class="mws-textinput required" />
                        
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                        <label>New Password</label>
                        <div class="formRight"><input type="password" name="account_new_password" value="" class="mws-textinput required" />
                        
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                        <label>Retype New Password</label>
                        <div class="formRight"><input type="password" name="conf_pass" value="" class="mws-textinput required" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                    <input type="submit" name="submit" value="Reset" class="red"  />
                    </div>
                    
            </div>
 </fieldset>
                    
</div>

