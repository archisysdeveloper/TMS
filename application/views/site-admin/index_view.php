<?php include(dirname(__FILE__)."/inc_header_html.php"); ?>
<?php include(dirname(__FILE__)."/inc_header.php"); ?>

<style>

@media print
  {
    #leftSide , .titleArea , .topNav , .button {display: none;}
  }

</style>			
				<?php echo (isset($admin_content) ? $admin_content : ""); ?>

<?php include(dirname(__FILE__)."/inc_footer.php"); ?>
<?php include(dirname(__FILE__)."/inc_footer_html.php"); ?>