<div class="wrapper">
<div class="widget">
                <div class="title"><img class="titleIcon" alt="" src="<?php echo site_url();?>/client/themes/crown/images/icons/dark/frames.png"></img>
        <h6>Close Project</h6>
   </div>
   
     <table cellpadding="0" cellspacing="0" width="100%" class="sTable sk">
                <thead>
                    <tr>
                        <td class="sortCol"><div>Sr<span></span></div></td>
                        <td class="sortCol"><div>Client Name<span></span></div></td>
                        <td class="sortCol"><div>Project Name<span></span></div></td>
                        <td class="sortCol"><div>Open Milestones<span></span></div></td>                        
                        <td class="sortCol"><div>Project Close<span></span></div></td>
                        
                        <td class="sortCol"><div>Total Hours<span></span></div></td>
                        <td class="sortCol"><div>Budget<span></span></div></td>
                        <td class="sortCol"><div>Approx Cost<span></span></div></td>  
                        <td class="sortCol"><div>Paid<span></span></div></td>  
                        
                        

                    </tr>
                    
                </thead>
                <tbody>
                
<?php $sr = 1; 
$tpaid = 0;
$spent = 0;
$budget = 0;
foreach($data5 AS $row) { ?>                 
                <tr>
                 <td><?php echo $sr; $sr = $sr+1; ?></td>          
                <td><a href="<?php echo site_url()?>/finance/site-admin/finance/close/?cid=<?php echo $row->client_id?>"><?php echo $row->client_name; ?></a></td>
                <td><a href="<?php echo site_url()?>/finance/site-admin/finance/projects/edit/<?php echo $row->project_id;?>"><?php echo $row->project_name; ?></a></td>
                
                <?php
                $no1=0;
                 
                $query4 = $this->db->query(" SELECT * FROM ws_milestones mt where milestone_status=3 and milestone_project= ".$row->milestone_project )->result();     
                
                foreach($query4 AS $row1) { }
                ?>
                <td><a href="#" class=" inout_lnk1" milestone_project="<?php echo $row->milestone_project; ?>" ><input type="submit" onclick="location.href='<?php echo site_url();?>finance/site-admin/finance/close1/?milestone_project=<?php echo $row->milestone_project;?>'"> [<?php echo count($query4); ?>]</a></td>
                <td><a href="#" class=" inout_lnk2"  project_id="<?php echo $row->project_id; ?>" ><input type="submit" onclick="location.href='<?php echo site_url();?>finance/site-admin/finance/close1/?project_id=<?php echo $row->project_id;?>'"  ></a></td>
                
                
             <?php  $sum2=0;
                    $query4 = $this->db->query("SELECT mid FROM `ws_milestones` WHERE milestone_project=".$row->milestone_project);
                    foreach($query4->result() AS $row2) {
                       $query3 = $this->db->query("SELECT SUM(hrs) s FROM ws_timesheet t
                                            INNER JOIN ws_milestones m ON t.milestone_id= m.mid
                                            where milestone_id=".$row2->mid); 
                    $data3 = $query3->row();
                    $sum2+=$data3->s;    
                    }
                    $a=0; $a=($sum2)/60;  $sum2+=$a;
                    
                    
             ?> 
             
                <td><?php echo round($a,2); ?></td>   
                
				<td><?php echo $row->project_cost; $budget = $budget + $row->project_cost; ?></td>
                
                
                <?php  $sum3=0;
                   $query5 = $this->db->query("SELECT mid FROM `ws_milestones` WHERE milestone_project=".$row->milestone_project);
                   foreach($query5->result() AS $row3) {   
                  // if($row3->mid == 4){echo "hi";} 
                   $sql = $this->db->query("SELECT rate,SUM(hrs) s1 FROM ws_timesheet t
                                            INNER JOIN ws_milestones m ON t.milestone_id= m.mid
                                            INNER JOIN ws_team t1 ON t.account_id = t1.account_id                                            
                                            where milestone_id= ".$row3->mid." GROUP BY team_name "); 
                    
                    
                    $f=0;
                   
                   foreach($sql->row() AS $data4) {
                   $f++;
                   }
                    if($f==1){   
                    $a=$mul=0; 
                    $a=($data4->s1)/60;  
                    if($data4->rate == null) {$mul=0;}
                    else{ $mul=$a * $data4->rate; }
                    
                    $sum3+=$mul;   
                    }
                     if($f > 1){   
                       foreach($sql->result() AS $row5) { 
                       
                       $a=$mul=0; $a=($row5->s1)/60;
                       if($row5->rate == null) {$mul=0;}
                       else{ $mul=$a * $row5->rate; }  
                       
                       $sum3+=$mul;
                   }  
                   }
                     
                   }
                  
                  $paid = $this->db->query("Select ifnull(sum(ifnull(milestone_rate,0)),0) total from ws_milestones 
                  where milestone_rate > 0 and milestone_project = ".$row->milestone_project)->row()->total; 
                ?>
                
				<td><a href="<?php echo site_url();?>finance/site-admin/finance/close/?id=<?php echo $row->milestone_project; ?>">$<?php echo round($sum3/49,2); $spent = $spent + round($sum3/49,2);  ?> / <?php echo round($sum3,2);   ?></a></td>
				<td><?php if($paid > 0) {echo $paid; $tpaid = $tpaid + $paid; }?></td>
                </tr>
<?php } ?>
               
			   <tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><?php echo $budget; ?></td>
				<td>$<?php echo $spent; ?></td>
				<td><?php echo $tpaid; ?></td>
			   </tr>
                </tbody>
				
                </table>
                
   
</div>
<div id="dialog-message">    
</div>
</div>
<script type="text/javascript">

$(document).ready(function(){
    
    $lasturl = "<?php echo site_url();?>finance/site-admin/finance/close";
     $(".inout_lnk3").click(function(){     
        $.get('<?php echo site_url()?>projects/site-admin/projects/cledit/?cid='+$cid, function(data) {
            $('#dialog-message').html(data);
            $("#dialog-message").dialog( "option", "width", 420 );
            $( "#dialog-message" ).dialog( "open" );
        });
        
    return false;    
    });
    
});    




</script>