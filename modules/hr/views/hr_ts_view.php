<div class="wrapper">

<?php if ( $this->account_model->check_admin_permission("", "hr", "admin") ) {?>
<br/>
<form method="post">
<select name="account_id" style="margin-right:10px" tabindex="-1" id="selRKL">        
            <?php 
            //var_dump($team);
            foreach($team as $t){?>
                  <option value="<?php echo $t->account_id;?>" <?php if( $t->account_id == $user_id) {echo "Selected";}?> ><?php echo $t->team_name;?></option>
                
            <?php }?>
        </select>
<input type="submit" value="Go">        
</form>
                        

<?php } ?>

        <div class="widget">
            <div class="title"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/monthCalendar.png" alt="" class="titleIcon" />
            <h6><?php echo $team_name ;?></h6></div>
            <div class="calendar"></div>
        </div>
</div>        

<script type="text/javascript">
//===== Calendar =====//
    
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    
    $('.calendar').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        editable: true,
        events: [
        <?php 
        $rows = $data->result();
        $minimum_day = $this->config->item('minimum_day');
        foreach($rows as $row)
            {
                $color = '#596772';
            	$half_day = $row->day_weight/2;
            	if($row->total_time >= ($row->day_weight*.985)){
            		$day = 'Full Day';
            	}else if($row->total_time >= ($row->day_weight*$minimum_day)/100){
            		$day = 'Full Day | Early Checkout';
                    $color = '#FFB917';
            	}else if($row->total_time >= ($row->day_weight/2)){
            		$day = 'Half Day';
            	}else{
            		$day = 'Leave';
            	}
            	$d =  $row->inout_date;
				/*
                if($row->in_time > $row->lockout_time && $day != 'Half Day'){
                    $day .= ' | Late checkin';
                    $color = '#F85214';
                    if($row->total_time < $row->day_weight){
                        $color = '#C22408';
                    }
                }
				*/
                ?>
            {
                title: '<?php echo $day . ' | IN-Time :'.$row->in_time.' | '.$row->total_time.' Hrs' ;?>',
                start: new Date(<?php echo date("Y",strtotime($d)); ?>,<?php echo (date("m",strtotime($d)) -1);?>,<?php echo date("d",strtotime($d))?>),
                url : '<?php site_url();?>/hr/site-admin/hr/view_ts_detail?dt=<?php echo $d ?>&user_id=<?php echo $user_id;?>',
                color: '<?php echo $color;?>'
            },
            
            <?php }
            
            foreach($leaves as $l)
            {$d =  $l->leave_date;
            $reason = "";
            if($l->leave_type == 1) {$reason = "Medical";}
            if($l->leave_type == 2) {$reason = "Personal";}
            if($l->leave_type == 3) {$reason = "Family";}
            if($l->leave_type == 4) {$reason = "Festival";}
            ?>
            {
                title: 'Approved Leave -<?php echo $reason; ?>',
                start: new Date(<?php echo date("Y",strtotime($d)); ?>,<?php echo (date("m",strtotime($d)) -1);?>,<?php echo date("d",strtotime($d))?>),
                color: '#5c90b5'
            },
            
            <?php }
            
            foreach($unapp_leaves as $l)
            {$d =  $l->leave_date;
            
            ?>
            {
                title: 'UnApproved Approved Leave ',
                start: new Date(<?php echo date("Y",strtotime($d)); ?>,<?php echo (date("m",strtotime($d)) -1);?>,<?php echo date("d",strtotime($d))?>),
                color: 'red'
            },
            
        <?php }
        
        ?>

        ]
    });
    
</script>