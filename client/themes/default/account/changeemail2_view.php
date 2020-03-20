<?php echo doctype("html5") . "\n"; ?>
<html>
	<head>
		<?php echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); ?>
		<title><?php echo (isset($page_title) ? $page_title : ""); ?></title>
		<?php
		if ( isset($page_metatag) && is_array($page_metatag) ) {
			echo "<!-- additional meta tag -->\n";
			foreach ( $page_metatag as $key => $item ) {
				echo $item;
			}
			echo "<!-- end additional meta tag -->\n";
		}
		?>
		
		<?php
		if ( isset($page_linktag) && is_array($page_linktag) ) {
			echo "<!-- additional link tag -->\n";
			foreach ( $page_linktag as $key => $item ) {
				echo $item . "\n";
			}
			echo "<!-- end additional link tag -->";
		}
		?>
		
		<script src="<?php echo base_url(); ?>client/js/jquery.js" type="text/javascript"></script>
		<?php
		if ( isset($page_scripttag) && is_array($page_scripttag) ) {
			echo "<!-- additional script tag -->\n";
			foreach ( $page_scripttag as $key => $item ) {
				echo $item;
			}
			echo "<!-- end additional script tag -->\n";
		}
		?>
		
	</head>
	
	<body>
		
		
		<div style="background: #eee; margin: 0 auto; width: 960px;">
			<h1><?php echo lang("account_change_email"); ?></h1>
			<p>ตัวอย่างฟอร์มนี้อยู่ใน client/themes/<strong>default</strong>/account/</p>

			<div class="confirmchange_result"><?php echo (isset($form_status) ? $form_status : ""); ?></div>
		</div>
		
		
	</body>
</html>