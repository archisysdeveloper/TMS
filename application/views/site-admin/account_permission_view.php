<div class="wrapper">
<h1><?php echo lang("account_permissions"); ?></h1>

<div class="commands">
	[<?php echo anchor(current_url()."/reset", lang("account_clear_settings"), array("id" => "reset_permission")); ?>]
</div><!--.commands-->

<?php echo form_open(current_url()."/save"); ?>
	<?php echo (isset($form_status) ? $form_status : ""); ?>
	<!-- Dynamic table -->
        <div class="widget">
            <div class="title"><img src="<?php echo site_url()?>/client/themes/crown/images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Role Permission</h6></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display sTable">
		<thead>
			<tr>
				<th><?php echo lang("account_permission_page"); ?></th>
				<th><?php echo lang("account_permissions"); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if ( isset($list_permissions) && is_array($list_permissions) ): ?>
			<?php foreach ( $list_permissions as $key => $item ): ?>
			<tr>
				<td><strong><?php echo lang($item['permission_page']); ?></strong> <a href="<?php echo current_url(); ?>/reset_one?perm_page=<?php echo $item['permission_page']; ?>"><img src="<?php echo base_url(); ?>client/images/reset.png" alt="<?php echo lang("account_reset"); ?>" title="<?php echo lang("account_reset"); ?>" /></a></td>
				<td class="no_padding">
					<?php if ( is_array($item['params']) ): ?>
					<table class="list_item">
					<?php foreach ( $item['params'] as $pkey => $pitem ): ?>
						<tr>
							<td style="width:150px;"><?php echo account_show_level_group_info($pkey); ?></td>
							<td>
                            <table><tr>
						<?php foreach ( $pitem as $pactionkey => $pactionitem ): ?>
						<td><label><input type="checkbox" name="param[<?php echo $item['permission_page']; ?>][<?php echo $pkey; ?>][<?php echo $pactionkey; ?>]" value="1"<?php if ( $pactionitem == '1' ): ?> checked="checked"<?php endif; ?> /><?php echo lang($pactionkey); ?></label>
                        </td>
						<?php endforeach; ?>
                        </tr></table>
							</td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="row_break"></td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
			<tr>
				<td colspan="2"><?php echo lang("admin_nodata"); ?></td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
    </div>
	<?php echo form_submit("btn", lang("account_save")); ?>
<?php echo form_close("\n"); ?>

<script type="text/javascript">
$(document).ready(function() {
	$("#reset_permission").click(function() {
		if ( window.confirm('<?php echo lang("account_are_you_sure_to_reset"); ?>') ) {
			var linkto = $(this).attr("href");
			$.ajax({
				url: linkto,
				success: function() {
					alert('<?php echo lang("account_reset_permission_done"); ?>');
					location.reload();
				}
			});
		}
		return false;
	});
});
</script>
</div>