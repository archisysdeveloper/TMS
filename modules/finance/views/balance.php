<?php //var_dump($data);?>
<div class="wrapper">
<div class="widget">
		<div class="title"><img class="titleIcon" alt="" src="http://sal/apes2//client/themes/crown/images/icons/dark/frames.png"></img>
		<h6>Balance Information</h6>
   </div>
   
 <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
                        <td class="sortCol"><div>Client Name<span></span></div></td>
                        <td class="sortCol"><div>Company Name<span></span></div></td>
                        <td class="sortCol"><div>Contact<span></span></div></td>
                        
                        <td class="sortCol"><div>pending due<span></span></div></td>
                        <td class="sortCol"><div>currency<span></span></div></td>
                         <td class="sortCol"><div><span></span></div></td>
                        
                    </tr>
                </thead>
                <tbody>
<?php
foreach ($data as $d)
{ ?>                
                <tr><span>
                	<td> <?php echo $d->client_name; ?></td>
        						<td><?php echo $d->client_company; ?></td>
        						<td><?php echo $d->client_email; ?><br><?php echo $d->client_number; ?><br><?php echo $d->client_skype; ?></td>
<?php 
$sql1=$this->db->query("
  																	  SELECT SUM(inv_total) s
   																		FROM ws_invoices 
   																		where inv_status=1 and inv_client=".$d->inv_client." 
   																		GROUP BY inv_client 
  ");        						
 ?>       						
        						<td><?php echo $sql1->row()->s; ?></td>
<?php 
$sql2=$this->db->query(" 
																		SELECT curr_name FROM ws_invoices i
  																	 inner join ws_currency c on i.inv_currency= c.curr_id
   																	where inv_status=1 and inv_currency=".$d->inv_currency." 
   																		");        						
 ?>         						
        						<td><?php echo $sql2->row()->curr_name; ?></td>
                                <td><a href="#" class="open" iid="<?php echo $d->inv_client; ?>">+</a></td> 
        						
                </span><span></span></tr>
                
                <tr align="center" style="display: none;" id="d<?php echo $d->inv_client; ?>">
               
                <td colspan="5"> 
                <table cellpadding="0" cellspacing="0" width="90%" class="sTable" >
                <thead>
                 <tr>
                        <td class="sortCol"><div>Subject<span></span></div></td>
                        
                        <td class="sortCol"><div>Date<span></span></div></td>
                        <td class="sortCol"><div>Total Amount<span></span></div></td>
                        <td class="sortCol"><div>Received<span></span></div></td>
                        
                 </tr>
                </thead>
                <tbody>
 <?php
 $sql3=$this->db->query("select * from ws_invoices where inv_status=1 and inv_client=".$d->inv_client);      
 foreach ($sql3->result() as $d1)
{                
 ?>                
 									  	 <tr>
                 				 <td class="sortCol"><div><?php echo $d1->inv_subject; ?><span></span></div></td>
                        
                        <td class="sortCol"><div><?php  echo $d1->inv_date; ?><span></span></div></td>
                        <td class="sortCol"><div><?php echo $d1->inv_total; ?><span></span></div></td>
                        <td class="sortCol"><div><?php  echo $d1->receipt_amount; ?><span></span></div></td>
                 </tr>
                
<?php } ?>
                </tbody>
                </table><hr><hr>
                </td> 
                </tr>

<?php } ?>     
</tbody>
 </table>
</div> 
</div>  
</div>  
<script type="text/javascript">
$(document).ready(function(){
    
    $(".open").click(function(){
        
        iid = $(this).attr("iid");
        $("#d"+iid).toggle();
        
    });
});
</script>