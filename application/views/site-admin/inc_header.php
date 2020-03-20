<body>        
<!-- Left side content -->
<div id="leftSide">
    <div class="logo"><a href="<?php echo site_url();?>site-admin/"><img src="<?php echo base_url(); ?>/client/themes/crown/images/logo.png" alt="" /></a></div>
    
    <div class="sidebarSep mt0"></div>
    
    
    <!-- Left navigation -->
    <ul id="menu" class="nav">
                    <?php if ( $this->account_model->check_admin_permission("", "admin_global_config", "admin_website_config") ) { ?>
                    
                    <li class="dash"><?php echo anchor("", "<span>System</span>",array('class' => 'exp active')); ?>
                        <ul class="sub">
                            <li><?php echo anchor("site-admin", lang("admin_dashboard")); ?></li>
                            <li><?php echo anchor("site-admin/config", lang("admin_global_config")); ?></li>
                        </ul>
                        
                    </li>
                    
                    <li class="ui"><?php echo anchor("site-admin/account", "<span>account</span>",array('class' => 'exp')); ?>
                        <ul class="sub">
                            <li><?php echo anchor("site-admin/account", "Account List"); ?></li>
                            <li><?php echo anchor("site-admin/account/add", lang("account_add")); ?></li>
                            <li><?php echo anchor("site-admin/account/edit", lang("account_edit_yours")); ?></li>
                            <li><a class="exp"><span><?php echo lang("account_level_n_permissions"); ?></span></a>
                                <ul class="sub">
                                    <li><?php echo anchor("site-admin/account-level", lang("account_level")); ?></li>
                                    <li><?php echo anchor("site-admin/account-permission", lang("account_permissions")); ?></li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php echo $this->modules_model->load_admin_nav(); ?>
             
    </ul>
</div>


<!-- Right side -->
<div id="rightSide">

    <!-- Top fixed navigation -->
    <div class="topNav">
        <div class="wrapper">
            <div class="welcome"><a href="#" title="">
              <?php 
                        $ca_account = $this->account_model->get_account_cookie("admin");
                        $user_id = $ca_account['id'];
                        $query = $this->db->query('SELECT *  FROM ws_accounts where account_id = '.$user_id);
                        $row = $query->row();?>
            <img src="<?php echo base_url(); ?>/client/themes/crown/images/userPic.png" alt="" /></a>
            <span>Howdy, <?php echo $ca_account['username'] ?> !</span></div>
            <div class="userNav">
                <ul>
                
                <?php 
                        $ca_account = $this->account_model->get_account_cookie("admin");
                        $user_id = $ca_account['id'];
                        $query = $this->db->query('SELECT * FROM ws_check_list cl inner join  ws_milestones_team m on m.mid = cl.mid where status!="close" and account_id = '.$user_id);
                        $row = $query->result();
                        $i=$j=$k=$l=0;
                        foreach($row as $a){
                        if($a->state == 'Reminder') $i++;
                        elseif($a->state == 'Ticket') $j++;
                        elseif($a->state == 'Task') $k++;
                        elseif($a->state == 'Bug') $l++;
                        else continue;
                         }
                         $s=$i+$j+$k+$l;
                ?>
                
                <?php 
                $user_id = $ca_account['id'];
                $query = $this->db->query('SELECT team_name FROM ws_team where account_id = '.$user_id);
                if(count($query->result())>0)
                {
                    $row = $query->row();
                    $name = $row->team_name;
                }
                else 
                {
                    $name = $ca_account['username'];
                }
                ?>
                
                    <li><a href="#" title=""><span><?php $this->db->query("SET time_zone='+5:30'"); echo $this->db->query("SELECT CURTIME() time;")->row()->time; ?></span></a></li>
                    <li><span>Howdy <?php echo $name; ?> !!</span></li>
                    <li><a href="<?php echo site_url();  ?>site-admin/account/change_pwd" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/topnav/profile.png" alt="" /><span>Change Pwd</span></a></li>
                    <!--<li class="dd"><a title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/topnav/tasks.png" alt="" /><span>Tasks</span>&nbsp;<span class="numberTop"><?php echo $s;?></span></a>
                        <ul class="userDropdown">
                            <li><a href="<?php echo site_url(); ?>projects/site-admin/projects/check_list/?state=Reminder" title="" class="sAdd"><span>Reminder (<?php echo $i;?>) </span>&nbsp;</a></li>
                            <li><a href="<?php echo site_url(); ?>projects/site-admin/projects/check_list/?state=Tickets" title="" class="sInbox"><span>Tickets (<?php echo $j;?>)</span>&nbsp;</a></li>
                            <li><a href="<?php echo site_url(); ?>projects/site-admin/projects/check_list/?state=Tasks" title="" class="sOutbox"><span>Tasks (<?php echo $k;?>)</span>&nbsp;</a></li>
                            <li><a href="<?php echo site_url(); ?>projects/site-admin/projects/check_list/?state=Bugs" title="" class="sOutbox"><span>Bugs (<?php echo $l;?>)</span>&nbsp;</a></li>

                        </ul>
                    </li>
					-->
                    <li><a href="<?php echo site_url();  ?>site-admin/logout" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/topnav/logout.png" alt="" /><span>Logout</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <!-- Responsive header -->
    <div class="resp">
        <div class="respHead">
            <a href="index.html" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/loginLogo.png" alt="" /></a>
        </div>
        
        <div class="cLine"></div>
        <div class="smalldd">
            <span class="goTo"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/light/home.png" alt="" />Dashboard</span>
            <ul class="smallDropdown">
                <li><a href="<?php echo site_url()?>site-admin>" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/light/home.png" alt="" />Home</a></li>
                
                <?php if ( $this->account_model->check_admin_permission("", "admin_global_config", "admin_website_config") ) { ?>
                <li><?php echo anchor("site-admin/account", "account",array('class' => 'exp')); ?>
                        <ul class="sub">
                            <li><?php echo anchor("site-admin/account", "Account List"); ?></li>
                            <li><?php echo anchor("site-admin/account/add", lang("account_add")); ?></li>
                            <li><?php echo anchor("site-admin/account/edit", lang("account_edit_yours")); ?></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php echo $this->modules_model->load_admin_nav(); ?>
            </ul>
        </div>
        <div class="cLine"></div>
    </div>
    
    <br/><br/>
	<div class="clear"></div>
    
    <div class="line"></div>