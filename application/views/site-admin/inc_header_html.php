<?php echo doctype("html5") . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

<title>APES v2.0 </title>

<link href="<?php echo base_url(); ?>/client/themes/crown/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>/client/themes/crown/css/apes.css" rel="stylesheet" type="text/css" />
<?php 
if(isset($css_files)){
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; 
} ?>


<script src="<?php echo base_url(); ?>/client/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){    
       
     $('.sub').hide();
    
    $('.exp').click(function(){
        
        //$('.sub').hide();
        $('.exp').removeClass("active");
        $(this).parent().find("ul").toggle();
        $(this).addClass("active");
        return false;
        
    });
      
   
    
});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/spinner/jquery.mousewheel.js"></script>

 
<?php if(!isset($crudview))
{?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/charts/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/charts/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/charts/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/charts/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/charts/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/charts/jquery.sparkline.min.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/uniform.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/jquery.cleditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/forms/chosen.jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/wizard/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/wizard/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/wizard/jquery.form.wizard.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/tables/datatable.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/client/themes/dcentro/js/jquery.tablednd.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/tables/tablesort.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/tables/resizable.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/ui/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/ui/jquery.progress.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/calendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/plugins/elfinder.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/custom.js"></script>

<?php }?>

<script type="text/javascript" src="<?php echo base_url(); ?>client/themes/crown/js/centro.js"></script>
        
</head>
