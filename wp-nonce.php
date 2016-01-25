<?php
/*
Plugin Name: WP Nonce
Plugin URI: https://github.com/kamalyon/wp-nonces
Description: This plugins enables the wordpress nonce function in an object-oriented environment. Composer package ready.
Author: Kamalyon.com
Version: 1.0
Author URI: http://kamalyon.com/
*/

if (!class_exists('WpNonce')) {
	
class WpNonce {
	
	var $nonce;
	
	function WpNonce() {
	}
	
	function explainNonce($action) {
		return wp_explain_nonce($action);
	}
	
	function nonceAys($action) {
		return wp_nonce_ays($action);
	}
	
	function nonceField($action = -1, $name = '_wpnonce', $referer = true, $echo = true) {
		wp_nonce_field($action, $name, $referer, $echo);
		return true;
	}
	
	function nonceURL($action_url, $action = -1, $name = '_wpnonce') {
		return wp_nonce_url($actionurl, $action, $name);
	}
	
	function verifyNonce($nonce, $action = -1) {
		return wp_verify_nonce($nonce, $action);
	}
	
	function createNonce($action = -1) {
		$this->nonce = wp_create_nonce($action);
		return $this->nonce;
	}
	
	function adminReferer($action = -1, $query_arg = '_wpnonce') {
		return check_admin_referer($action, $query_arg);
	}
	
	function checkAjaxReferer($action = -1, $query_arg = false, $die = true) {
		return check_ajax_referer($action, $query_arg, $die);
	}
	
	function refererField($echo = true) {
		return wp_referer_field($echo);
	}

	
}

}