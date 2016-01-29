<?php

class WP_Nonce_Test extends WP_UnitTestCase {

	public function testCreateNonce() {
		$Wp_Nonce = new Wp_Nonce();
		$nonce = $Wp_Nonce->createNonce('my-nonce');
		$this->assertEquals($Wp_Nonce->verifyNonce($nonce, 'my-nonce'), 1);
	}
	
	public function testNonceField() {
		$Wp_Nonce = new Wp_Nonce();
		$nonce_field = $Wp_Nonce->nonceField('my-nonce', '_wpnonce', true, false);
		$dom = new DOMDocument();
		$dom->loadHTML($nonce_field);
		$input = $dom->getElementsByTagName('input')->item(0);
		if (!empty($input)) {
			$nonce = $input->getAttribute('value');
			$this->assertEquals($Wp_Nonce->verifyNonce($nonce, 'my-nonce'), 1);
		}else{
			$this->assertTrue(false);
		}
	}
	
	public function testNonceURL() {
		$Wp_Nonce = new Wp_Nonce();
		$url = $Wp_Nonce->nonceURL('http://my-url.com', 'my-nonce');
		$parsed_url = parse_url($url);
		$query = $parsed_url['query'];
		$params = explode('=', $query);
		$nonce = $params[1];
		$this->assertEquals($Wp_Nonce->verifyNonce($nonce, 'my-nonce' ), 1);
	}
	
	public function testCheckAdminReferer() {
		$Wp_Nonce = new Wp_Nonce();
		$nonce = $Wp_Nonce->createNonce('my-nonce');
		$_REQUEST['_wpnonce'] = $nonce;
		$this->assertEquals($Wp_Nonce->checkAdminReferer('my-nonce'), 1);
	}

}
