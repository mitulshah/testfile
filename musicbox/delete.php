<?php
define('WP_USE_THEMES', false);
require('../../../wp-blog-header.php'); 
global $wpdb;

if (isset($_POST['data']))
{
	$deleteId =  $_POST['data'];
	$table_name = $wpdb->prefix . "musicbox_master";
	$querystr = "Delete from $table_name where id = $deleteId";
	if($wpdb->query($querystr)){
		echo "Lyrics deleted Successfully.";
	}
}


?>