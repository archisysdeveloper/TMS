<div class="wrapper">
        
        <div class="nNote nInformation hideit">
            <p><strong>In Time : </strong> <?php echo $in_time?> &nbsp;&nbsp;|&nbsp;&nbsp; <strong>Out Time : </strong> <?php echo $out_time?></p>
        </div>   
        <div class="nNote nSuccess hideit">
            <p><strong>Session Time : <?php echo $ses_time; ?> hrs </strong> &nbsp;&nbsp;||&nbsp;&nbsp; <strong>Booked : <?php echo round($booked/60,0); ?> hrs  || Dayweight : <?php echo $dayWeight; ?> hrs</strong></p>
        </div>  
        
        <a href="<?php echo site_url();?>hr/site-admin/hr/finalclose/?id=<?php echo $id;?>" title="" class="wButton orangewB m10"><span>CLOSE SESSION !</span></a>
        
</div>        
