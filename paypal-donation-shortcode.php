<?php

/*
Plugin Name: Paypal Donation Shortcode
Version: 0.1
Plugin URI: http://coenjacobs.net/wordpress/plugins/paypal-donation-shortcode
Description: Makes it easy to display a link to your own Paypal donation page. Includes options to set a fixed amount and select your own currency. You can also add a fixed title in which you can describe what the people are donating for.
Author: Coen Jacobs
Author URI: http://coenjacobs.net/
*/

function paypal_donation_shortcode($atts) {
	extract(shortcode_atts(array(
	    "text" 		=> '',  
		"email" 	=> '',
		"amount"	=> '',
		"currency"	=> 'USD',
		"title"		=> 'Donation'
	), $atts));
	
	$content = "";
	
	if($text != "" && $email != "")
		$content .= "<p><a href=\"https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=".$email."&currency_code=".$currency."&amount=".$amount."&return=&item_name=".$title."\">".$text."</a></p>";
	
	return $content;
}

add_shortcode('paypal', 'paypal_donation_shortcode');

?>