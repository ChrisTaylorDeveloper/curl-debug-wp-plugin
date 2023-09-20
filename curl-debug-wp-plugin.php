<?php

/*
 * Plugin Name: PHP Curl debug
 * Author URI:  https://christaylordeveloper.co.uk
 * Author:      Chris Taylor
 * Description: Attempt to debug server PHP Curl config.
 */
function ctd_curl_report($url) {
    $ch = curl_init();
 	curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);

    if(false === $data) {
        echo 'curl_exec failed!', '<br>';
    }

    curl_close($ch);
    echo strlen($data), ' chars from ', $url, '<br>';
}

function ctd_curl_debug() {
    $urls = array(
        'https://www.google.com',
        'https://www.amazon.com',
    );

    foreach($urls as $url){
        ctd_curl_report($url); 
    }
}
add_shortcode('CurlDebug', 'ctd_curl_debug');
