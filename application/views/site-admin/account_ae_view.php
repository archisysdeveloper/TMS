
<div class="wrapper">
<?php echo form_open(current_url().($this->uri->segment(3) == "edit" ? "?id=$id" : "")); ?>

    <?php if(isset($form_status)) {?>
    <div class="nNote nInformation hideit">
        <?php echo $form_status;?>
    </div>
    <?php }?>
    
   <fieldset>
    <div class="widget">
      <div class="title"><img src="<?php echo site_url()?>/client/themes/crown/images/icons/dark/list.png" alt="" class="titleIcon" /><h6><?php echo lang("account_account"); ?> : <?php echo ($this->uri->segment(3) == "add" ? lang("account_add") : lang("account_edit")); ?></h6></div>    
	    
         <div class="formRow">
            <label><?php echo lang("account_username"); ?>:</label>
            <div class="formRight"><input type="text" name="account_username" value="<?php echo (isset($account_username) ? $account_username : ""); ?>" maxlength="255"<?php if ( $this->uri->segment(3) == "edit" ): ?> disabled="disabled"<?php endif; ?> /></div>
            <div class="clear"></div>
        </div>
        
		 <div class="formRow">
            <label><?php echo lang("account_email"); ?>:</label>
            <div class="formRight"><input type="text" name="account_email" value="<?php echo (isset($account_email) ? $account_email : ""); ?>" maxlength="255" /></div>
            <div class="clear"></div>
        </div>
        
         <div class="formRow">
            <label><?php echo lang("account_password"); ?>:</label>
            <div class="formRight"><input type="password" name="account_password" value="" maxlength="255" />
            <span class="formNote">
            <?php if ( $this->uri->segment(3) == "add" ): ?><span class="txt_require">*</span><?php endif; ?><?php if ( $this->uri->segment(3) == "edit" ): ?> <?php echo lang("account_enter_current_if_change_password"); ?><?php endif; ?>
            </span>
            </div>
            <div class="clear"></div>
        </div>
				
		<?php if ( $this->uri->segment(3) == "edit" ): ?>
         <div class="formRow">
            <label><?php echo lang("account_new_password"); ?>:</label>
            <div class="formRight"><input type="password" name="account_new_password" value="" maxlength="255" />
            <span class="formNote">
            <?php echo lang("account_enter_if_change_password"); ?>
            </span>
            </div>
            <div class="clear"></div>
        </div>
		<?php endif; ?>
		
		
         <div class="formRow">
            <label><?php echo lang("account_fullname"); ?>:</label>
            <div class="formRight"><?php echo form_input("account_fullname", (isset($account_fullname) ? $account_fullname : "")); ?>
            <span class="formNote">
            </span>
            </div>
            <div class="clear"></div>
        </div>
        
		 <div class="formRow">
            <label><?php echo lang("account_birthdate"); ?>:</label>
            <div class="formRight">
                <?php echo form_input( array("name" => "account_birthdate","value" => (isset($account_birthdate) ? $account_birthdate : ""),"class"=>"maskDate")); ?>
            <span class="formNote">
                MM/DD/YYYY
            </span>
            </div>
            <div class="clear"></div>
        </div>
				
		 <div class="formRow">
            <label><?php echo lang("account_signature"); ?>:</label>
            <div class="formRight"><?php echo form_textarea("account_signature", (isset($account_signature) ? $account_signature : "")); ?>
            <span class="formNote">
                
            </span>
            </div>
            <div class="clear"></div>
        </div>
        
         <div class="formRow">
            <label><?php echo lang("account_level"); ?>:</label>
            <div class="formRight">
            <select name="level_group_id">
                <option></option>
                <?php if ( isset($list_level) && is_array($list_level) ): ?>
                <?php foreach ( $list_level as $id => $item ): ?>
                <option value="<?php echo $id; ?>"<?php if( isset($level_group_id) && $level_group_id == $id ): ?> selected="selected"<?php endif; ?>><?php echo $item['level_name']; ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
            </select>
            </div>
            <div class="clear"></div>
        </div>
        
		
		<div class="formRow">
            <label><?php echo lang("account_status"); ?>:</label>
            <div class="formRight">
            <select name="account_status" id="account_status">
                <option value="1"<?php if ( isset($account_status) && $account_status == '1' ): ?> selected="selected"<?php endif; ?>><?php echo lang("account_enable"); ?></option>
                <option value="0"<?php if ( isset($account_status) && $account_status == '0' ): ?> selected="selected"<?php endif; ?>><?php echo lang("account_disable"); ?></option>
            </select>
            </div>
            <div class="clear"></div>
        </div>
        
		<?php if ( $this->uri->segment(3) == "edit" ): ?>
        <div class="formRow">
            <label><?php echo lang("account_status_reason"); ?>:</label>
            <div class="formRight"> <input type="text" name="account_status_text" value="<?php echo (isset($account_status_text) ? $account_status_text : ""); ?>" />
            </div>
            <div class="clear"></div>
        </div>
        
		<?php endif; ?>
		
		<?php echo form_submit("btn", lang("account_save")); ?>
		
	</div>
    </fieldset>

<?php echo form_close("\n"); ?>

<script type="text/javascript">
$(document).ready(function() {
	$("input[name=account_birthdate]").datepicker({ 
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: '1900:'+(new Date).getFullYear()
	});
	$("#account_status").change(function() {
		if ( $(this).val() == '0' ) {
			$(".account_status_text").show();
		} else {
			$(".account_status_text").hide();
		}
	});
	if ( $("#account_status").val() == '0' ) {
		$(".account_status_text").show();
	}
});// jquery document ready
</script>
</div>