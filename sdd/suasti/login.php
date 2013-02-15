<?php 
// Include WordPress
define('WP_USE_THEMES', false);
require('../../../wp-blog-header.php'); 
header("HTTP/1.1 200 OK");
global $wpdb;
	

//login

if($_POST['name'] != '' && $_POST['password'] != '')
{
		$name = $_REQUEST['name'];
		$results = $wpdb->get_row("SELECT user_login,user_pass FROM wp_users",ARRAY_N);
		if ( $results[0]==$name && wp_check_password( $_REQUEST['password'],$results[1]))
		{
			echo "Successfully login";
			
		} else {
		   echo "Username or Password Incorrect.";
		}
}
		
?>