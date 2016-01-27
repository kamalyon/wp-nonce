<?php
if ( file_exists( __DIR__ . '/wp-nonce.php' ) ) {
	require_once __DIR__ . '/wp-nonce.php';
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}
