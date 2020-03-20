  <div class="wrapper">
    
        <!-- Notifications -->
        
        
        <div class="nNote nWarning hideit">
            <p><strong>Session Time : <?php echo $ses_time; ?> hrs </strong> &nbsp;&nbsp;||&nbsp;&nbsp; <strong>Booked : <?php echo round($booked/60,2); ?> hrs &nbsp;&nbsp;||&nbsp;&nbsp; Dayweight : <?php echo $dayWeight; ?> hrs</strong>            
            </p>
			<p><strong>In Time : </strong> <?php echo $in_time?> &nbsp;&nbsp;|&nbsp;&nbsp; <strong>Out Time : </strong> <?php echo $out_time?> ||&nbsp;&nbsp; <strong>Break : <?php echo $break_mins; ?> mins </strong></p>
        </div>  
		
		<div style="line-height: 31px;">
			<br/>
			<h3>Notice.</h3>
			<h5> 1. To Consider a Timesheet for <u>Full Day</u>, Booked time must be minimum <span class="blueBack"> Dayweight (<?php echo $dayWeight; ?> hrs) </span>  including Breaks. </h5>
			<h5> 2. Your allowed break is <span class="redBack"><?php echo $defaultBreak ?> Mins. </span></h5>
			<h5> 3. Your milestone booking (working time) must be higher than <span class="redBack"> <?php echo $milestoneBooking ?> Hrs <span> </h5>
			<h5> 4. Early Checkout is consider at mimimum <span class="blueBack"><?php echo $dayWeight-0.5; ?> hrs. </span> </h5>
			<h5> 5. For Half - Day or Early checkouts, Session does not need to be closed.</h5>			
			<h5> <span class="greenBack">6. Working Saturday Timings : 8:00 AM to 5:00 PM<span></h5>
			
		</div>
                
</div>        
