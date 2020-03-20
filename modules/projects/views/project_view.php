<div class="wrapper">
<div class="widget">
		<div class="title"><img class="titleIcon" alt="" src="http://sal/apes2//client/themes/crown/images/icons/dark/frames.png"></img>
		<h6>Milestone Information</h6>
   </div>
   <div class="newOrder">
                        <div class="userRow">
                            
                            <ul class="leftList">
                                <li><a href="#" title=""><strong>
								</strong></a></li>
                                <li><h6><strong><?php echo $data->milestone_name;?></strong></h6></li>
				<?php $query1 = $this->db->query("SELECT project_name AS pname FROM ws_milestones INNER JOIN ws_projects ON ws_milestones.milestone_project=ws_projects.project_id where ws_milestones.milestone_project = ".$data->milestone_project);
				$row1 = $query1->row();
				?>
								<li>Project: <?php echo $row1->pname ; ?></li>
								<li>Start date: <?php echo $data->milestone_stdate; ?></li>
                            </ul>
                            <ul class="rightList">
							<?php $query2 = $this->db->query("SELECT val AS mstatus FROM ws_milestones INNER JOIN ws_staticdata ON ws_milestones.milestone_status=ws_staticdata.id where ws_milestones.milestone_status =".$data->milestone_status);
				$row2 = $query2->row();
				?>
                                <li> <strong>Status: <?php echo $row2->mstatus;?>
							
								</strong></li>
								<li> Days: <?php echo $data->milestone_days;?></li>
                                <li>End date: <?php echo $data->milestone_enddate; ?></li>
                            </ul>
                            <div class="clear"></div>
						</div>
						</div>
</div>
</div>

<div class="wrapper">
<div class="widget">

<?php 
//echo "<pre>";
//var_dump($data);
//var_dump($data1);
//var_dump($data2);
?>
<ul class="tabs">
      <li><a href="#tab1">Client/Project Information</a></li>
				<li><a href="#tab3">Project Description</a></li>
				<li><a href="#tab2">Milestone Description</a></li>
				<li><a href="#tab4">Daily</a></li>
				<li><a href="#tab5">Trending</a></li>
</ul>

<div class="tab_container">
                <div id="tab1" class="tab_content">
				<div class="newOrder">
                        <div class="userRow">
                            <a href="#" title=""><img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $data->client_email ) ) ); ?>.jpg" alt="" class="floatL" /></a>
                            <ul class="leftList">
                                <li><a href="#" title=""><strong>
								</strong></a></li>
                                <li><strong><?php echo $data->client_name;?></strong></li>
								<li><?php echo $data->client_company;?></li>
								<li>Email Id: <?php echo $data->client_email;?></li>
								 <li>Contact No: <?php echo $data->client_number;?></li>
                                <li>Skype: <?php echo $data->client_skype;?></li>
                            </ul>
                            <ul class="rightList">
                                <li> <strong>Address: <?php echo $data->client_address;?></strong></li>
								<li> Country: <?php echo $data->client_country;?></li>
                                
                            </ul>
                         <div class="clear"></div>
                 		 </div>
                    
                  <div class="cLine"></div>
                        
                        <div class="orderRow">
                            <ul class="leftList">
                              <li><h6><strong><?php echo $data->project_name;?></strong></h6></li>  
							  <li></li>
                              <li>Project date: <?php echo $data->project_date; ?></li>
                            </ul>
                            <ul class="rightList">
                                <li><strong></strong> </li>
                                <?php $query4 = $this->db->query("SELECT category AS cat FROM ws_projects INNER JOIN ws_project_cat ON ws_projects.project_cat=ws_project_cat.cat_id where ws_projects.project_cat = ".$data->project_cat);
				$row4 = $query4->row();
				?>
                                <li> <strong>Category: <?php echo $row4->cat;?></strong></li>
								<li> Weeks: <?php echo $data->project_weeks;?></li>
                                <li>Close date: <?php echo $data->project_close_date; ?></li>
                                <li><strong class="orange"></strong></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        
                    <div class="cLine"></div>
                    <div class="totalAmount"><h6 class="floatL blue"></h6><h6 class="floatR blue"></h6><div class="clear"></div>
					</div>
                </div>   
             	</div> 
				
                <div id="tab2" class="tab_content">
                    <div class="newOrder">
					
					<div class="userRow">
						
						<ul class="leftList">
                                <li><a href="#" title=""><strong>
								</strong></a></li>
								<h6><strong>Milestone Description: </strong></h6>
                                <li><?php echo $data->milestone_desc;?></li>
								
                            </ul>
					<div class="clear"></div>
					</div>
                    </div>
					</div>
            	
				<div id="tab3" class="tab_content">
				<div class="newOrder">
                        <div class="userRow">
                           
                            <ul class="leftList">
                                <li><a href="#" title=""><strong>
								</strong></a></li>
                             </ul>
                            <ul class="rightList">
							
                            </ul>
                         <div class="clear"></div>
                  </div>
                        <div class="orderRow">
                            <ul class="leftList">
                                <li><h6><strong>Project Files: <a href="<?php echo base_url(); ?>/uploads/proj_root/<?php echo $data->project_files; ?>"><?php echo $data->project_files; ?></a></strong></h6></li>
                                <br/>
                                <h6><strong>Project Description: </strong></h6>
                                <li><?php echo $data->project_desc;?></li>
                            </ul>
                            <ul class="rightList">
                                <li><strong></strong> </li>
                                <li><strong>Project Notes:<?php echo $data->project_notes;?></strong></li>
                                <li><strong class="orange"></strong></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        
                    <div class="cLine"></div>
                    <div class="totalAmount"><h6 class="floatL blue"></h6><h6 class="floatR blue"></h6><div class="clear"></div>
					</div>
                </div>   
             	</div>
				
				<div id="tab4" class="tab_content">
				<div class="newOrder">
                
				<form >	
    <!-- Dynamic table -->
	<div class="oneTwo">
        <div class="widget">
		
            <div class="title"><h6>Total Hours / Summary</h6></div>          
           
			<div class="orderRow">
										 <?php $sum1=0; ?>  
	                            <?php foreach($data4 as $row2){?>
  										<ul class="leftList">
                                <li><h6><strong><?php echo $row2->team_name; ?></strong></h6></li>
                                <br/>
                            </ul>
                             		
                            <ul class="rightList">
                                <li><strong></strong> </li>
                            
                                   <?php $sum=$row2->s; ?>
                             	
                                <?php $a=0; $a=($sum)/60; ?>
                                <?php $sum1+=$a;?>
                                <li><strong>Total: <?php echo round($a,2);?> hrs</strong></li>
                            </ul>
                            <div class="clear"></div>
                           
                          <?php } ?>     
              </div>
		</div>
    </div> 
    <script type="text/javascript" src="http://archisys.biz/ui/html/js/charts/pie.js"></script>
	<div class="oneTwo">
        <div class="widget">
		
            <div class="title"><h6>Milestone Team</h6></div>          
           
           <div class="body"><div class="pie" id="donut"></div></div>
		
		</div>
	</div>
	<div class="clear"></div>
	<div class="widget">
            <div class="title"><h6>Users</h6></div>                          
            <table  cellpadding="1" cellspacing="0" border="0" class="display dTable">
		<thead>
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Description</th>
				<th>Worked Hours</th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach($data3 as $row){?>
			<tr>

	<td><?php echo $row->team_name;?>  </td>                       
         <td><?php echo $row->inout_date ; ?></td>
		<td><?php echo $row->note;?></td>
        <td><?php echo $row->hrs;?></td>
    </tr>
	<?php } ?>		
	</table>
    </div> 
</form>
</div>
</div>
			<div id="tab5" class="tab_content">
				<div class="widget">
						<table  cellpadding="1" cellspacing="0" border="0" class="display dTable">
						<thead>
							<tr>
							<th>Description</th>
							<th>Name</th>
							<th>Date</th>
							</tr>
						</thead>
					<tbody>
					<?php foreach($data5 as $row){?>
			<tr>

	<td><?php echo $row->description;?>  </td>                       
         <td><?php echo $row->keyword ; ?></td>
		<td><?php echo $row->dt;?></td>
    </tr>
	<?php } ?>		
                            
        </tbody>
        </table>       
      <div class="clear"></div>
    <div class="cLine"></div> 
				</div>
    </div>   
</div>
</div>
</div>