<div class="wrapper">
<div class="widget">
            <div class="title"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Check List</h6></div>			
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
                        <td class="sortCol"><div>Project Name<span></span></div></td>
                        <td class="sortCol"><div>Milestone Name<span></span></div></td>
                        <td class="sortCol"><div>Description<span></span></div></td>
                        <td class="sortCol"><div>Start Date<span></span></div></td>
                        <td class="sortCol"><div>Delivery Date<span></span></div></td>
                        <td class="sortCol"><div>Status<span></span></div></td>
						<td class="sortCol"><div>Priority<span></span></div></td>
                                                
                    </tr>
                </thead>
                <tbody>

<?php 
foreach ($data as $d)
{ ?>
		
	
<tr>	
    	
		<td><?php echo $d->project_name; ?></td>
        <td><?php echo $d->milestone_name; ?></td>
        <td><?php echo $d->milestone_desc; ?></td>
        <td><?php echo $d->milestone_stdate; ?></td>
        <td><?php echo $d->milestone_enddate; ?></td>
        
<?php $query2 = $this->db->query("SELECT val AS mstatus FROM ws_milestones INNER JOIN ws_staticdata ON 									ws_milestones.milestone_status=ws_staticdata.id where ws_milestones.milestone_status =".$d->milestone_status);
				$row2 = $query2->row();
				?>
		<td> <?php echo $row2->mstatus;?></td>
		
		<td></td>

</tr>	

<?php 

} ?>

</tbody>
</table>
</div>
</div>