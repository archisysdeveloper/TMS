<?php 
foreach($data as $d)
{
//var_dump($d);
?>
	<div data-role="collapsible" data-theme="a" data-content-theme="a" class="drop" >
	 <h3><div class="date"><font><?php echo $d->pub_date;?></font><br><span>May</span></div>
	 <div class="s_text"><?php echo $d->title;?></div></h3>
		<p><?php echo $d->description;?></p>
	</div>
<?php
}
?>