<div class="wrapper">            
    <a href="#" title="" class="wButton orangewB inout_lnk" cid="0"><span>New Task</span></a>
    <a href="#" title="" class="wButton bluewB ml15 m10" cid="0"><span>Reload</span></a>
    <a href="#" title="" class="wButton purplewB ml15 m10" cid="0"><span>Refresh</span></a>
    
    <div class="sidedd" style="margin-top: 10px; position: absolute; right: 214px; top: 4px;color:white;">
            
            <span class="goUser">Man On</span>
            <ul class="sideDropdown" style="display: none;background-color: black;padding: 10px;">
                
                <?php foreach($man_on as $d)
                {   ?>
                    <li><a href="#" link = "<?php echo site_url();?>projects/site-admin/projects/getChecklist/?man_on=<?php echo $d->man_on;?>" title=""><?php echo $d->team_name;?> (<?php echo $d->cnt;?>)</a></li>    
                <?}?>
            </ul>
        </div>
        
    <div class="sidedd" style="margin-top: 10px; position: absolute; right: 10px; top: 4px;color:white;">
            
            <span class="goUser">Projects</span>
            <ul class="sideDropdown" style="display: none;background-color: black;padding: 10px;">
                
                <?php foreach($data as $d)
                {   ?>
                    <li><a href="#" link = "<?php echo site_url();?>projects/site-admin/projects/getChecklist/?p_name=<?php echo $d->project_name;?>" title=""><?php echo $d->project_name;?> (<?php echo $d->cnt;?>)</a></li>    
                <?}?>
            </ul>
        </div>
        
      <div class="widget">         
            <div class="orderRow">                    
<div id="cltable"></div>

</div>
               </div>
               <div class="clear"></div><br/> 
               <?php if ( $this->account_model->check_admin_permission("", "projects", "enabled") == true )
               {?>
               <div class="linksa">
               <a href="#" class="closed" link="<?php echo site_url();?>projects/site-admin/projects/getChecklist/?sts=close" > Closed lists </a>              
               </div>
               <?php } ?>
</div>
</div>
<div id="dialog-message">

</div>

<script type="text/javascript">

$(document).ready(function(){
    
    $lasturl = "<?php echo site_url()?>projects/site-admin/projects/getChecklist";
<?php $ar = "";  if(isset($_GET['state'])){ $ar = "/?typ=".$_GET['state'];} ?>               
    reLoad('<?php echo site_url()?>projects/site-admin/projects/getChecklist<?php echo $ar; ?>');
         
    $(".bluewB").click(function(){
        reLoad('<?php echo site_url()?>projects/site-admin/projects/getChecklist');
        return false;    
    });
    
    $(".purplewB").click(function(){
        reLoad($lasturl);
        return false;    
    });
    
    $(".sideDropdown a").click(function(){
        $link = $(this).attr("link");
        reLoad($link);
        $(".sideDropdown").hide("fast");
        return false;    
    });
});

function reLoad($href)
{
    //$('#cltable').html("Loading...");
    
    $.get($href, function(data) {        
            $('#cltable').html(data);            
            $lasturl = $href;
            return false;            
        });
    
}

function editme($obj)
{
    $cid = $($obj).attr('cid');
        
        $.get('<?php echo site_url()?>projects/site-admin/projects/cledit/?cid='+$cid, function(data) {
            
            $('#dialog-message').html(data);
            $("#dialog-message").dialog( "option", "width", 670 );
            $( "#dialog-message" ).dialog( "open" );
        });
return false;    
}

function close($obj)
{
    $cid = $($obj).attr('cid');
        
        $.get('<?php echo site_url()?>projects/site-admin/projects/closeCL/?cid='+$cid, function(data) {
            reLoad($lasturl);
            
        });
return false;    
}

function man_on($obj)
{
        $cid = $($obj).attr('cid');        
        $.get('<?php echo site_url()?>projects/site-admin/projects/man_on/?cid='+$cid, function(data) {
            reLoad($lasturl);            
        });
return false;    
}

</script>

<style type="text/css">
.formRow {border:none !important;}
.ui-dialog .ui-dialog-buttonpane {display:none;}
.sTable tbody td { padding: 0px 10px; vertical-align: middle;}
.widget {margin-top: 4px; }
#rightSide {min-height: 500px;}
#cltable {zoom:0.9;}
</style>
