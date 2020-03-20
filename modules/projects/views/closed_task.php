<div class="wrapper">			
   
      <div class="widget">         
			<div class="orderRow">                    
					<table cellpadding="1" cellspacing="0" width="0" class="display sTable">
                        <thead>
                    <tr>
                    	<td><div>Project Name</div></td>
							<td><div>Milestone Name</div></td>	
							<td><div>Status</div></td>
							<td><div>Created Date</div></td>
           				<td><div>Task</div></td>
           				<td><div>Priority</div></td>
           				<td><div>Type</div></td>
           				<td><div>Action</div></td>
                    </tr>
                </thead>
                
               <tbody>
               <?php foreach($data2 as $row) { 
               if($row->status = "close"){
               
               ?> 
               <tr>
               <td ><div><a name="list" href="<?php echo site_url();?>projects/site-admin/projects/closedtask/?p_name=<?php echo $row->project_name; ?>"><?php echo $row->project_name; ?></a></div></td>
               <td ><div><a name="list" href="<?php echo site_url();?>projects/site-admin/projects/closedtask/?m_name=<?php echo $row->milestone_name; ?>"><?php echo $row->milestone_name; ?></a></div></td>
               <td ><div><a name="list" href="<?php echo site_url();?>projects/site-admin/projects/closedtask/?sts=close"><?php echo $row->status; ?></a></div></td>
               <td ><div><a name="list" href="<?php echo site_url();?>projects/site-admin/projects/closedtask/?cdate=<?php echo $row->cr_date; ?>"><?php echo $row->cr_date; ?></a></div></td>
               <td ><div><a name="list" href="<?php echo site_url();?>projects/site-admin/projects/closedtask/?desc=<?php echo $row->description; ?>"><?php echo $row->description; ?></a></div></td>
               <td ><div><a name="list" href="<?php echo site_url();?>projects/site-admin/projects/closedtask/?prt=<?php echo $row->priority; ?>"><?php echo $row->priority; ?></a></div></td>
               <td ><div><a name="list" href="<?php echo site_url();?>projects/site-admin/projects/closedtask/?typ=<?php echo $row->state; ?>"><?php echo $row->state; ?></a></div></td>
               <td ><div> <a href = "#" class="inout_lnk" cid="<?php echo $row->cid ; ?>"> edit </a> </div></td>
               </tr>
               <?php } } ?>
               </tbody>    
                
               </table>
               
               </div>
               </div>
               <div class="clear"></div></br>
               <a href="<?php echo site_url();?>projects/site-admin/projects/check_list" ><span>BACK</span></a>
          
</div>
<div id="dialog-message">

</div>
<script type="text/javascript">

$(document).ready(function(){
            
        $(".inout_lnk").click(function(){
        
        $cid = $(this).attr('cid');
        
        $.get('<?php echo site_url()?>projects/site-admin/projects/cledit/?cid='+$cid, function(data) {
            $('#dialog-message').html(data);
            $("#dialog-message").dialog( "option", "width", 420 );
            $( "#dialog-message" ).dialog( "open" );
        });
        
    return false;
    });
});
</script>