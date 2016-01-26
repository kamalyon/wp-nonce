<?php
/*
Plugin Name: WP Nonce
Plugin URI: https://github.com/kamalyon/wp-nonce
Description: This plugins enables the wordpress nonce function in an object-oriented environment. Composer package ready.
Author: Kamalyon.com
Version: 1.0.0
Author URI: http://kamalyon.com/
*/

if (!class_exists('Wp_Nonce')) {
	
	class Wp_Nonce {
		
		/**
		 * Wp_Nonce constructor
		 */
		protected function __construct() {
		}
	
		/**
		 * Display 'Are you sure you want to do this?' message to confirm the action being taken. 
		 * If the action has the nonce explain message, then it will be displayed along with the 'Are you sure?' message.
		 *
		 * @param string $action Required. The nonce action.
		 */
		public function nonceAys($action) {
			return wp_nonce_ays($action);
		}
		
		/**
		 * Retrieves or displays the nonce hidden form field.
		 * 
		 * @param string $action Required. Action name. Should give the context to what is taking place. Optional but recommended.
		 * @param string $name Optional. Nonce name. This is the name of the nonce hidden form field to be created. Once the form is submitted, you can access the generated nonce via $_POST[$name]. Default: '_wpnonce'
		 * @param boolean $referer Optional. Whether also the referer hidden form field should be created with the wp_referer_field() function. Default: true
		 * @param boolean $echo Optional. Whether to display or return the nonce hidden form field, and also the referer hidden form field if the $referer argument is set to true. Default: true
		 */
		public function nonceField($action = -1, $name = '_wpnonce', $referer = true, $echo = true) {
			wp_nonce_field($action, $name, $referer, $echo);
			return true;
		}
		
		/**
		 * Retrieve URL with nonce added to URL query.
		 * 
		 * @param string $action_url Required. URL to add nonce action.
		 * @param string $action Optional. Nonce action name. Default: -1
		 * @param string $name Optional. Nonce name Default: _wpnonce
		 */
		public function nonceURL($action_url, $action = -1, $name = '_wpnonce') {
			return wp_nonce_url($actionurl, $action, $name);
		}
		
		/**
		 * Verify that a nonce is correct and unexpired with the respect to a specified action. 
		 * The function is used to verify the nonce sent in the current request usually accessed by the $_REQUEST PHP variable.
		 * 
		 * @param string $nonce Required. Nonce to verify.
		 * @param string $action Optional. Action name. Should give the context to what is taking place and be the same when the nonce was created. Default: -1
		 */
		public function verifyNonce($nonce, $action = -1) {
			return wp_verify_nonce($nonce, $action);
		}
		
		/**
		 * Generates and returns a nonce. The nonce is generated based on the current time, the $action argument, and the current user ID.
		 * 
		 * @param string $action Optional. Action name. Should give the context to what is taking place. Optional but recommended. Default: -1
		 */
		public function createNonce($action = -1) {
			return wp_create_nonce($action);
		}
		
		/**
		 * Tests either if the current request carries a valid nonce, or if the current request was referred from an administration screen; depending on whether the $action argument is given (which is prefered), or not, respectively. 
		 * On failure, the function dies after calling the wp_nonce_ays() function.
		 * 
		 * @param string $action Optional. Action name. Should give the context to what is taking place. (Since 2.0.1). Default: -1
		 * @param string $query_arg Optional. Where to look for nonce in the $_REQUEST PHP variable. (Since 2.5). Default: '_wpnonce'
		 */
		public function checkAdminReferer($action = -1, $query_arg = '_wpnonce') {
			return check_admin_referer($action, $query_arg);
		}
		
		/**
		 * Verifies the AJAX request to prevent processing requests external of the blog.
		 * 
		 * @param string $action Optional. Action nonce. Default: -1
		 * @param string $query_arg Optional. where to look for nonce in $_REQUEST (since 2.5) Default: false
		 * @param string $die Optional. Whether to die if the nonce is invalid. Default: true
		 */
		public function checkAjaxReferer($action = -1, $query_arg = false, $die = true) {
			return check_ajax_referer($action, $query_arg, $die);
		}
		
		/**
		 * Retrieves or displays the referer hidden form field.
		 * 
		 * @param string $echo Whether to display or return the referer hidden form field. Default: true
		 */
		public function refererField($echo = true) {
			return wp_referer_field($echo);
		}
	
	}

}