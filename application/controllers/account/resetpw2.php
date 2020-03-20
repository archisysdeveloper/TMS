<?php
/**
 * @author mr.v
 * @copyright http://okvee.net
 */

class resetpw2 extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model(array("account/account_model", "config_model"));
		// load helper
		$this->load->helper(array("html", "language", "url"));
		// load langauge
		$this->lang->load("account");
	}// __construct
	
	
	function _remap($attr1 = '', $attr2 = '') {
		$this->index($attr1, $attr2);
	}// _remap
	
	
	function index($account_id = '', $confirm_code = '') {
		$this->load->database();
		$confirm_code = (isset($confirm_code[0]) ? $confirm_code[0] : "");
		if ( is_numeric($account_id) && $confirm_code != null ) {
			if ( $confirm_code == '0' ) {
				// cancel, delete confirm code and new password from db
				$this->db->set("account_new_password", "NULL");
				$this->db->set("account_confirm_code", "NULL");
				$this->db->where("account_id", $account_id);
				$this->db->update($this->db->dbprefix("accounts"));
				$output['form_status'] = "<div class=\"txt_success\">" . $this->lang->line("account_cancel_change_password") . "</div>";
			} else {
				$this->db->where("account_id", $account_id);
				$this->db->where("account_confirm_code", $confirm_code);
				$query = $this->db->get($this->db->dbprefix("accounts"));
				if ( $query->num_rows() > 0 ) {
					$row = $query->row();
					// confirm, delete confirm code and update new password
					$this->db->set("account_password", $row->account_new_password);
					$this->db->set("account_new_password", "NULL");
					$this->db->set("account_confirm_code", "NULL");
					$this->db->where("account_id", $account_id);
					$this->db->update($this->db->dbprefix("accounts"));
					$output['form_status'] = "<div class=\"txt_success\">" . $this->lang->line("account_confirm_change_password") . "</div>";
				} else {
					$output['form_status'] = "<div class=\"txt_error\">" . $this->lang->line("account_forgetpw_invalid_url") . "</div>";
				}
				$query->free_result();
			}
		} else {
			$output['form_status'] = "<div class=\"txt_error\">" . $this->lang->line("account_forgetpw_invalid_url") . "</div>";
		}
		// headr tags output###########################################
		$output['page_title'] = $this->config_model->load("site_name") . $this->config_model->load("page_title_separator") . $this->lang->line("account_reset_password");
		// meta tag
		//$output['page_metatag'][] = meta("Cache-Control", "no-cache", "http-equiv");
		//$output['page_metatag'][] = meta("Pragma", "no-cache", "http-equiv");
		// link tag
		//$output['page_linktag'][] = link_tag("favicon.ico", "shortcut icon", "image/ico");
		//$output['page_linktag'][] = link_tag("favicon2.ico", "shortcut icon2", "image/ico");
		// script tag
		//$output['page_scripttag'][] = "<script type=\"text/javascript\" href=\"tinymcs.js\"></script>\n";
		//$output['page_scripttag'][] = "<script type=\"text/javascript\" href=\"fckkeditor.js\"></script>\n";
		// end headr tags output###########################################
		// output
		$this->load->view("account/resetpw2_view", $output);
	}// index
	
	
}