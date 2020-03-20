 <?php 
 $ca_account = $this->account_model->get_account_cookie("user");
 $user_id = $ca_account['id'];
 ?>           
					<table cellpadding="1" cellspacing="0" width="0" class="display sTable">
                        <thead>
                    <tr>
                    	    <td width="20px"><div>Sr.</div></td>
                            <td><div>Project Name</div></td>
							<td><div>Date</div></td>
           				    <td width="50%"><div>Task</div></td>
           				    <td><div class="linksa"><a href="#" link="<?php echo site_url();?>projects/site-admin/projects/getChecklist/?man_on=<?php echo $user_id; ?>" class="" style="margin: 5px;"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/color/user-silhouette-question.png" alt=""></a></div></td>
                            <td>ID</td>
                    </tr>
                </thead>
                
               <tbody>
               <?php 
               $sr = 0;
               foreach($data2 as $row) { 
               $sr = $sr +1;
               ?> 
               <tr class="linksa cl<?php echo $row->cid ; ?> <?php echo $row->status; ?>">
               <td><?php echo $sr; ?></td>
               <td ><div><a name="list" href = "#" link="<?php echo site_url();?>projects/site-admin/projects/getChecklist/?p_name=<?php echo $row->project_name; ?>"><?php echo $row->project_name; ?></a>
               <br/>
               -> <a name="list" href = "#" link="<?php echo site_url();?>projects/site-admin/projects/getChecklist/?m_name=<?php echo $row->milestone_name; ?>"><?php echo $row->milestone_name; ?></a>
               </div></td>
               
               <td ><div>
               <span style="color:red ;"><?php if(isset($team[$row->cr_user])){ echo $team[$row->cr_user]; }?></span><br/>
               <a name="list" href = "#" link="<?php echo site_url();?>projects/site-admin/projects/getChecklist/?cdate=<?php echo $row->cr_date; ?>"><?php echo $row->cr_date; ?></a>
               
               <?php if($row->ch_cls_user > 0) {?><br/> <span style="color:blue ;"><?php echo $team[$row->ch_cls_user];?></span> 
                     (<span style="color:blue ;"><?php echo $row->cls_date;?></span>)
               <?php }?>
               
               </div></td>
               <td ><div><br/><?php echo $row->description; ?></div>
               
               <div style="margin-bottom: 4px;margin-right: 5px;float: right;margin-top: 2px">
               <a name="list" href = "#" link="<?php echo site_url();?>projects/site-admin/projects/getChecklist/?typ=<?php echo $row->state; ?>"><?php echo $row->state; ?></a> / 
               <a name="list" href = "#" link="<?php echo site_url();?>projects/site-admin/projects/getChecklist/?prt=<?php echo $row->priority; ?>"><?php echo $row->priority; ?></a>
               >> <a name="list" href = "#" link="<?php echo site_url();?>projects/site-admin/projects/getChecklist/?sts=<?php echo $row->status; ?>"><?php echo $row->status; ?></a>
               </div>
               
               </td>
               
                             
               <td>
               <a href="#" title="" link = "" class="smallButton inout_lnk" cid="<?php echo $row->cid ; ?>" style="margin: 5px;">
                <img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/pencil.png" alt=""></a> 
               <?php if($row->status != "close"){?>
               
               
               
               <a href="#" link="" title="" class="smallButton taskcl" cid="<?php echo $row->cid ; ?>" style="margin: 5px;"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/check.png" alt=""></a>
               
                <?php if($row->man_on == 0){?>
                    <a href="#" title="" link = "" class="smallButton manon" cid="<?php echo $row->cid ; ?>" style="margin: 5px;">
                    <img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/user.png" alt=""></a>
               <?php } else {?>
                    <a href="#" title="" link = "" class="smallButton manon" cid="<?php echo $row->cid ; ?>" style="margin: 5px;"><?php echo $team[$row->man_on];?></a>
               <?php }?>
               <?php }?>
               </td>
                <td>#<?php echo $row->cid ; ?></td>
               
               </tr>
               <?php }  ?>
               </tbody>    
                
               </table>
                            

<script type="text/javascript">

$(document).ready(function(){
            
    $(".inout_lnk").click(function(){
        
           editme(this);
           return false;
         
    });
    
    $(".taskcl").click(function(){
        
           $cid = $(this).attr("cid");
           $(".cl"+$cid).css("background","#f58989");
           close(this);
           return false;
         
    });
    
    $(".manon").click(function(){
        
           $cid = $(this).attr("cid");
           $(".cl"+$cid).css("background","#E7EDA1");
           man_on(this);
           return false;
         
    });
    
    $(".linksa a").click(function(){
        
        $href= $(this).attr("link");
        if($href != ""){
        reLoad($href);  }
        return false;
    });
});

</script>

