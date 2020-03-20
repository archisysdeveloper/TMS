<div class="wrapper">
<div class="widget">
                <div class="title"><img class="titleIcon" alt="" src="http://sal/apes2//client/themes/crown/images/icons/dark/frames.png"></img>
        <h6><?php echo $data5[0]->project_name; ?></h6>
   </div>
   
     <table cellpadding="0" cellspacing="0" width="100%" class="sTable sk">
                <thead>
                    <tr>
                        
                        <td class="sortCol"><div>Milestones Name<span></span></div></td>                        
                        <td class="sortCol"><div>Total Hours<span></span></div></td>
                        <td class="sortCol"><div>Approx Cost<span></span></div></td>  
                        <td class="sortCol"><div>Paid<span></span></div></td>  
                        
                    </tr>
                    
                </thead>
                <tbody>
                <?php foreach($data5 AS $row) { ?>                 
                <tr>
                
                <td><a href="<?php echo site_url();?>/projects/site-admin/projects/project_details/?id=<?php echo $row->mid; ?>"><?php echo $row->milestone_name; ?></a></td>
                
                <?php  $sum2=0;
                    
                    
                       $query3 = $this->db->query("SELECT SUM(hrs) s FROM ws_timesheet t
                                            INNER JOIN ws_milestones m ON t.milestone_id= m.mid
                                            where milestone_id=".$row->mid); 
                    $data3 = $query3->row();
                    $sum2+=$data3->s;    
                    
                    $a=0; $a=($sum2)/60;  $sum2+=$a;
             ?> 
             
                <td><?php echo round($a,2); ?></td>   
             
               <?php  $sum3=0;
                   
                 
                  
                   $sql = $this->db->query("SELECT rate,SUM(hrs) s1 FROM ws_timesheet t
                                            INNER JOIN ws_milestones m ON t.milestone_id= m.mid
                                            INNER JOIN ws_team t1 ON t.account_id = t1.account_id                                            
                                            where milestone_id= ".$row->mid." GROUP BY team_name "); 
                    
                    
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
                     
                   
                  
                   
                ?> 
               <td>$<?php echo round($sum3/49,2);   ?> / <?php echo round($sum3,2);   ?></td>   
               <td><?php echo $row->milestone_rate; ?></td>
<?php
                }
?>
                </tbody>
                </table>
                
                
   
  </div>
  <br>
<h5><a href="<?php echo site_url();?>/finance/site-admin/finance/close">BACK</a></h5>
   </div>