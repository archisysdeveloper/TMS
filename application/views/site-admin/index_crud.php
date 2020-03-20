<?php $crudview = true ; ?>
<?php include(dirname(__FILE__)."/inc_header_html.php"); ?>
<?php include(dirname(__FILE__)."/inc_header.php"); ?>

<?php 
if(isset($js_files)){
foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; } ?>

<style type="text/css">
.selector {display:none;}
</style>
        
<link href="<?php echo base_url(); ?>/client/themes/crown/css/set_crud.css" rel="stylesheet" type="text/css" />
 

    <div class="wrapper">
        <div class="nNote">
		        <?php echo $output; ?>
        </div>                
    </div>    


<?php include(dirname(__FILE__)."/inc_footer.php"); ?>
<?php include(dirname(__FILE__)."/inc_footer_html.php"); ?>