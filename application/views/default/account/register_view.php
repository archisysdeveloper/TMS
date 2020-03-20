<?php include(dirname(__FILE__)."/../../site-admin/inc_header_html.php"); ?>
<body class="nobg loginPage">
		
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/client/themes/dcentro/css/core/login.css" media="screen" />

                                       <!-- Top fixed navigation -->
<div class="topNav">
    <div class="wrapper">
        <div class="userNav">
            <ul>
                <li><a href="#" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/topnav/mainWebsite.png" alt="" /><span>Main website</span></a></li>
                <li><a href="#" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/topnav/profile.png" alt="" /><span>Contact admin</span></a></li>
                <li><a href="<?php echo site_url();?>account/register" title=""><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/topnav/settings.png" alt="" /><span>Register</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>


<!-- Main content wrapper -->
<div class="loginWrapper">
    <div class="loginLogo"><img src="<?php echo base_url(); ?>/client/themes/crown/images/loginLogo.png" alt="" /></div>
    <div class="widget">
        <div class="title"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/files.png" alt="" class="titleIcon" /><h6>Register</h6></div>
		<?php echo form_open(); ?>
			<div class="form_result"><?php echo (isset($form_status) ? $form_status : ""); ?></div>
			<dl>
				<div class="formRow">
                    <label for="login">Username:</label>
                    <div class="loginInput"><input type="text" name="username" value="<?php echo (isset($username) ? $username : ""); ?>" /></div>
                    <div class="clear"></div>
                </div>
				
                <div class="formRow">
                    <label for="login">Email</label>
                    <div class="loginInput"><input type="text" name="email" value="<?php echo (isset($email) ? $email : ""); ?>" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                 <img src="<?php echo base_url(); ?>client/images/securimage_show.php" alt="securimage" id="captcha" />
                    <a href="#" onclick="document.getElementById('captcha').src = '<?php echo base_url(); ?>client/images/securimage_show.php?' + Math.random(); return false"><img src="<?php echo base_url(); ?>client/images/reload.gif" alt="" /></a>
				    <div class="clear"></div>
                </div>
                
				<div class="formRow">
                    <label for="login">Captcha</label>
                    <div class="loginInput"><?php echo form_input("captcha", (isset($captcha) ? $captcha : "")); ?></div>
                    <div class="clear"></div>
                </div>
                
                <div class="loginControl">
                    <input type="submit" value="Register" class="dredB logMeIn" />
                    <div class="clear"></div>
                </div>
                
			</dl>
		<?php echo form_close("\n"); ?>
		</div>
</div>    		
<style type="text/css">
.loginWrapper .widget {
 height: 410px !important;
}
.loginWrapper {

      top:40%;
}
</style>
<?php include(dirname(__FILE__)."/../../site-admin/inc_footer_html.php"); ?>