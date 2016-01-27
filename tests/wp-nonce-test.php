<?php
class WP_Nonce_Test extends PHPUnit_Framework_TestCase {

	public function testCreateNonce() {
		$Wp_Nonce = new Wp_Nonce();
		$nonce = $Wp_Nonce->createNonce('my-nonce');
		$this->assertEquals($Wp_Nonce->verifyNonce($nonce, 'my-nonce'), 1);
	}
	
	public function testNonceField() {
		$Wp_Nonce = new Wp_Nonce();
		$nonce_field = $Wp_Nonce->nonceField('my-nonce');
		$dom = new DOMDocument();
		$dom->loadHTML($nonce_field);
		$inputs = $dom->getElementsByTagName('input')->item(0);
		if (!empty($inputs)) {
			$nonce = $inputs->getAttribute('value');
			$this->assertEquals($Wp_Nonce->verifyNonce($nonce, 'my-nonce'), 1);
		}
		$this->assertTrue(false);
	}
	
	public function testNonceURL() {
		$Wp_Nonce = new Wp_Nonce();
		$url = $Wp_Nonce->nonceURL('http://my-url.com', 'doing-something', 'my-nonce');
		$parsed_url = parse_url($url);
		$query = $parsed_url['query'];
		$params = array();
		parse_str($query, $params);
		$nonce = $params[0];
		$this->assertEquals($Wp_Nonce->verifyNonce($nonce, 'my-nonce' ), 1);
	}
	
	public function checkAdminReferer() {
		$Wp_Nonce = new Wp_Nonce();
		$nonce = $Wp_Nonce->createNonce('my-nonce');
		$_REQUEST['_wpnonce'] = $nonce;
		$this->assertEquals($Wp_Nonce->checkAdminReferer('my-nonce'), 1);
	}	

}
