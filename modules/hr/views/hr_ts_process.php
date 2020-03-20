<div class="wrapper">
<div class="widget">

            
            <div class="title"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>

            <?php if(isset($_GET['filterUser']) && $_GET['filterUser'] > 0) {?>
                <a href="<?php echo site_url('hr/site-admin/hr/process_daily');?>" class="button"> << Back </a>
            <?php } ?>

            Pending Approvals</h6></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
                        <td class="sortCol"><div>Sr<span></span></div></td>
                        <td class="sortCol"><div>Resource<span></span></div></td>
                        <td class="sortCol"><div>Date<span></span></div></td>
                        <td class="sortCol"><div>In-Out<span></span></div></td>
                        <td class="sortCol"><div>In-Out (IP)<span></span></div></td>
                        
                        <td class="sortCol"><div>Final<span></span></div></td>                        
                        <td class="sortCol"><div><span></span></div></td>
                        <td class="sortCol"><div><span></span></div></td>                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $rows = $data->result();
                    $cnt = 1;
                    foreach($rows as $r)
                    {
                        $mins = $this->db->query("SELECT IFNULL(sum(hrs),0) mins FROM `ws_timesheet` where IFNULL(milestone_id,0) > -1 and inout_id = ".$r->inout_id)->row()->mins;
                        $mins_break = $this->db->query("SELECT  IFNULL(sum(mins),0) mins from ws_adlbreak where inout_id = ".$r->inout_id)->row()->mins;
                        
                        $ac_mins = 0;
                        if($r->out_time <> '') {
                            $t1 = '2012-08-17 '.$r->in_time;
                            $t2 = '2012-08-17 '.$r->out_time;
                            $ses_time = gmdate("H:i:s", strtotime($t2) - strtotime($t1));
                            $st = (float)str_replace(":", ".", $ses_time);
                            $ac_mins = (floor($st)*60) + (($st - floor($st) )*100);
                        }
                        $cl = ""; 
                ?>
					<?php 
					$allowedTS = true;
					if($ac_mins > 0 && $ac_mins < $mins ) { $allowedTS = false; } 
					if($mins == 0) {$allowedTS = false;} // No Timesheet
					?>
					
                    <form method="post">
                    <tr <?php if(!$allowedTS) {?> style="background: pink;" <?php }?> id="ts<?php echo $r->inout_id ;?>">
                        <td><?php echo $cnt; $cnt = $cnt+1;?></td>
                        <td><a href = "<?php echo site_url('hr/site-admin/hr/process_daily'); ?>?filterUser=<?php echo $r->account_id ?>" class="" tsid=<?php echo $r->inout_id ; ?>><strong><?php echo $r->team_name ;?></strong></a></td>
                        <td><a href = "#" class="inout_lnk" tsid=<?php echo $r->inout_id ; ?>><strong><?php echo $r->inout_date ;?></strong></a></td>
                        <td><span class="green"><?php echo $r->in_time; ?></span> <hr/> <span class="red"><?php echo $r->out_time;?></span></td>
                        <td><?php echo '<span class="green '.$cl.'">'.$r->in_ip.'<span> <hr/> <span class="red">'.$r->out_ip.'</span>' ;?></td>                        
                        
                        <td><?php echo round(($mins/60),2) . ' / ' . round(($ac_mins/60),2);?> <br/>
                        <input type="hidden" value="<?php echo $mins?>" name="hrs"></td>
                        <input type="hidden" value="<?php echo $r->default_break + $mins_break ?>" name="break"> </td>
                        <td>    
                            <input type="hidden" value="<?php echo $r->inout_id ;?>" name="inout_id">
                            <input type="hidden" value="<?php echo $r->account_id ;?>" name="account_id">
							<?php if($allowedTS) {?>
								<input type="submit" class="button blueB" value="Approve">
							<?php } ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url()?>hr/site-admin/hr/editTs/<?php echo $r->inout_id ;?>" target=_blank class="button greenB">
                            <span>TS</span></a>
							<?php if($r->out_time == "") {?>
								<a href="<?php echo site_url()?>hr/site-admin/hr/add_daily/edit/<?php echo $r->inout_id ;?>" target=_blank class="button blackB">
                            <span>Punch</span></a>
							<?php } ?>
							<a href="#" class="email_lnk button blueB" tsid=<?php echo $r->inout_id ; ?>>
                            <span>Email ?</span></a>
							
							<a href="#" tsid="<?php echo $r->inout_id ; ?>"
							desc = "<?php echo $r->team_name ;?> : <?php echo $r->inout_date ;?> with Hrs : <?php echo round(($mins/60),2)?>"
							target=_blank class="deleteTS button redB">
							<span>Remove</span></a>
							
							
                        </td>
                    </tr>
                    </form>
                <?php 
                   }
                ?>
                </tbody>
            </table>
        </div>
</div>        
<div id="dialog-message">
<p>this is test</p>
</div>
<script type="text/javascript">
$(document).ready(function(){
    
    $( "#dialog-message" ).dialog( {
                modal: true,
                minWidth: 900,                
            } );

    $(".inout_lnk").click(function(){
        
		
        $id = $(this).attr('tsid');
                
        $.get('<?php echo site_url()?>hr/site-admin/hr/view_ts_detail_id/?id='+$id, function(data) {
            $('#dialog-message').html(data);
            $('#dialog-message').dialog('open');
        });
        
    return false;
    });
	
	$(".deleteTS").click(function(){
        
        $id = $(this).attr('tsid');
		var doDelete = confirm("Delete TS " + $(this).attr("desc"));
		console.log(doDelete);
        if(doDelete) {
			$.get('<?php echo site_url()?>hr/site-admin/hr/del_daily/?id='+$id, function(data) {
				
				$("#ts"+$id).remove();
				
			});
		
		}
        
    return false;
    });

    $(".email_lnk").click(function(){
        
        $id = $(this).attr('tsid');
                
        $.get('<?php echo site_url()?>hr/site-admin/hr/emailIssue/'+$id, function(data) {
            $('#dialog-message').html(data);
            $('#dialog-message').dialog('open');
        });
        
    return false;
    });

});
</script>
<style type="text/css">
.ext {font-weight: bold;}
</style>