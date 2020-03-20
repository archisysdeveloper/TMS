<?php include(dirname(__FILE__)."/inc_header_html.php"); ?>
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
        <div class="title"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/files.png" alt="" class="titleIcon" /><h6>Login panel</h6></div>
        <?php echo form_open($this->uri->segment(1) . "/login", array("id" => "form_login","class" => "form")); ?>
            <fieldset>
                <div class="formRow">
                    <label for="login">Username:</label>
                    <div class="loginInput"><input type="text" name="username" class="validate[required]" id="login" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label for="pass">Password:</label>
                    <div class="loginInput"><input type="password" name="password" class="validate[required]" id="pass" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="loginControl">
                    <div class="rememberMe"><input type="checkbox" id="remMe" name="remMe" /><label for="remMe">Remember me</label></div>
                    <input type="submit" value="Log me in" class="dredB logMeIn" />
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>    
			
<?php include(dirname(__FILE__)."/inc_footer_html.php"); ?>