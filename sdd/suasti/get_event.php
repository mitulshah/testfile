<?php 
// Include WordPress
define('WP_USE_THEMES', false);
require('../../../wp-blog-header.php'); 
global $wpdb;
//echo $_REQUEST['SearchString'];
//exit;
//evnet listing
	$return = '';
	$unixtime = strtotime("now");
	
	$results = $wpdb->get_results("select * from wp_events where theend < $unixtime order by theend desc"); 
	foreach ($results as $result) 
	{
		$event = $result->theend;
		$year = date("Y",$event);
		$year_array[] = $year;
		$datetime = $result->thetime;
		$date = date("d M, Y",$datetime);
		if($year == $_REQUEST['SearchString']){
			$return .= '<div class="event1">  <div class="event-head"><a href="'.$result->link.'">'.$result->title.'</a><br/><span class="event-date">'.$date.'</span><div class="event-link"><a href="'.$result->link.'">view gallery</a></div></div> </div>';
		}
		
	}
	echo $return;
	
	//print_r($year_array);
