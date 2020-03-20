<?php if(isset($data)) {$dr = $data[0];}?>
<form id="frm">
<div class="formRow">
<label>Milestone : </label> 
<div class="formRight" style="width: 50%;">
<div class="selector" id="uniform-undefined">
  <select name='milestone' id="milestone">
    <?php foreach($mile as $row) {?>
    <option value='<?php echo $row->mid;?>' <?php if(isset($dr)){if($dr->mid == $row->mid ) {echo "selected = true";}} ?>><?php echo $row->project_name;?> - <?php echo $row->milestone_name; ?></option>
    <?php }?>
</select>    
</div>  
</div></div>

<div class="clear"></div>
<div class="formRow">
<label>Priority : </label> 
<div class="formRight" style="width: 50%;">

<div class="selector" id="uniform-undefined">
<select name='priority'>
        <?php if(isset($dr)){ ?><option value="<?php echo $dr->priority ;?>"> - <?php echo $dr->priority ;?> - </option> <?php } ?>
        <option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
</select>                           
</div>
</div></div>
<div class="clear"></div>
<div class="formRow">
<label>Type : </label> 
<div class="formRight" style="width: 50%;">
<div class="selector" id="uniform-undefined">
<select name='Type'>
    <?php if(isset($dr)){ ?> <option value="<?php echo $dr->state ;?>">- <?php echo $dr->state ;?> -</option> <?php } ?>
    <option value='Task'>Task</option>
    <option value='Ticket'>Ticket</option>
    <option value='Bug'>Bug</option>
    <option value='Reminder'>Reminder</option>
    </select>    
</div>                        
</div> </div>                       
<div class="clear"></div>
<div class="formRow">
<label>Status : </label> 
<div class="formRight" style="width: 50%;">
<div class="selector" id="uniform-undefined">
<select name='status'>
    <?php if(isset($dr)){ ?> <option value="<?php echo $dr->status ;?>">- <?php echo $dr->status ;?> -</option> <?php } ?>
    <option value='pending'>Pending</option>
    <option value='25%'>25%</option>
    <option value='50%'>50%</option>
    <option value='75%'>75%</option>    
    <option value='Completed delivered'>Completed Delivered</option>
    <option value='close'>Close</option>
    <option value='hold'>Hold</option>
    </select>    
</div>                        
</div> </div>
<br/>
<textarea class='texteditor1' name='Textarea'><?php if(isset($dr)){ echo $dr->description; }?></textarea>
<div class="clear"></div></br>
<input type="hidden" value="<?php if(isset($dr)){echo $dr->cid;} else {echo '0';}?>" name="cid">
<div style="float: left;padding-left: 5px;"><input type="checkbox" name="chk_clnt" value="1" <?php if(isset($dr)){if($dr->chk_clnt == "1"){?> checked="checked" <?php }}?> /> Keep Client In Loop 
&nbsp;&nbsp; User Pin :  <select id="users" name="user">
    <option value="0">-- None --</option>
</select>
</div>
<a href="#" title="" style="float: right;" class="wButton greenwB ml15 m10"><span>Save</span></a>
</form>
<script type="text/javascript">

$(document).ready(function(){
    
    $(".texteditor1").cleditor({
        width:"650px", 
        height:"160px",
        bodyStyle: " cursor:text"
    });
    
    
    
    $(".greenwB").click(function(){
      
      $.ajax({
          type: "POST",
          url: "<?php echo site_url()?>projects/site-admin/projects/cledit", 
          data: $("#frm").serialize(),
          cache: false,
          success: function(response) {
          
              $( "#dialog-message" ).dialog( "close" );
              
              reLoad($lasturl);
              
      }
      });  
        
    });
    
    $("#milestone").change(function(){ getUrs($(this).val()); });
    
    getUrs($("#milestone").val());
    
});

function getUrs($mid)
{
        $.get("<?php echo site_url()?>projects/site-admin/projects/getUserList/?mid="+$mid,function(data){ 
            $("#users").html(data);                
        });    
}
</script>