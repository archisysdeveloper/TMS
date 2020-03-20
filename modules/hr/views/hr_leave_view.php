<div class="wrapper">


        <div class="widget">
            <div class="title"><img src="<?php echo base_url(); ?>/client/themes/crown/images/icons/dark/monthCalendar.png" alt="" class="titleIcon" />
            <h6>Leave View</h6></div>
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
        
        
            
            foreach($leaves as $l)
            {$d =  $l->leave_date;
            $reason = "";
            $color = "#5c90b5";
            if($l->leave_type == 1) {$reason = "Medical";}
            if($l->leave_type == 2) {$reason = "Personal";}
            if($l->leave_type == 3) {$reason = "Family";}
            if($l->leave_type == 4) {$reason = "Festival";}
            if($l->leave_status == 4) {$color = "red";}
            if($l->leave_status == 1) {$color = "#999999";}
            
            ?>
            {
                title: '<?php echo $l->team_name;?> - <?php echo $reason; ?>',
                start: new Date(<?php echo date("Y",strtotime($d)); ?>,<?php echo (date("m",strtotime($d)) -1);?>,<?php echo date("d",strtotime($d))?>),
                color: '<?php echo $color;?>',
                url : '<?php echo site_url();?>hr/site-admin/hr/leave_approval/edit/<?php echo $l->leave_id?>'
            },
            
            <?php }
        
        ?>

        ]
    });
    
</script>