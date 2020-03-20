<div class="wrapper">
<div class="widget">
            <div class="title"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>My Project / Milestone List</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
                         <td class="sortCol"><div>Sr. No.</div></td>
                        <td class="sortCol"><div>Project Name<span></span></div></td>
                        <td class="sortCol"><div>Milestone Name<span></span></div></td>
                        <td class="sortCol"><div>Total Hours<span></span></div></td>
                        
                        <td class="sortCol"><div>Delivery Date<span></span></div></td>
                        <td class="sortCol"><div>Client<span></span></div></td>
                                                                <td class="sortCol"><div>Days left<span></span></div></td>
                        <td class="sortCol"><div><span></span></div></td>
                        
                    </tr>
                </thead>
                <tbody>



<?php 
$no=0;
foreach ($data as $d)
{ 
$no++;    
    ?>
        <?php 
            
            $now = date("yn your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'GROUP BY team_name' at line 4

-m-d"); 
            $date=$d->milestone_enddate;
            $days = (strtotime($date) - strtotime(date("Y-m-d"))) / (60 * 60 * 24);
            //round($days,0);
            if ((($days*1) < 0) && ($d->milestone_status !=4)) {echo '<tr bgcolor="pink" font color="FFFFFF">';}
            else {echo '<tr>'; $days=0;  
            }
        ?>
    

                    <td><?php echo $no; ?></td>
                    <td><?php echo $d->project_name; ?></td>
        <td><?php echo $d->milestone_name; ?></td>
        
<?php 
$query4 =  $this->db->query("SELECT team_name, SUM(hrs) s,milestone_id FROM ws_timesheet
                                                                                                            INNER JOIN ws_team ON ws_timesheet.account_id = ws_team.account_id
                                                                                                            INNER JOIN ws_inout ON ws_timesheet.inout_id = ws_inout.inout_id
                                                                                                            WHERE milestone_id=".$d->mid." GROUP BY team_name" );

$sum1=$a=0; 
foreach($query4->result() as $row2){
$sum=$row2->s;
$a=0; $a=($sum)/60;
$sum1+=$a;

    }
?>            
        
        
        <td><?php echo $a1=round($sum1,2); ?></td>
       
        <td><?php echo $d->milestone_enddate; ?></td>
        <td><?php echo $d->client_name; ?></td>
        <td><?php echo round($days,0);  ?></td>
        <td><a href="<?php echo site_url();?>projects/site-admin/projects/project_details/?id=<?php echo $d->mid; ?>">View Details</a></td>
        
    </tr>
<?php } ?>


</tbody>
</table>
</div>
<a href="<?php echo site_url();?>projects/site-admin/projects/project_list/?status=4">Closed</a>
</div>
