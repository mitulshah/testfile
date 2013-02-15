<?php 
// Include WordPress
define('WP_USE_THEMES', false);
require('../../../wp-blog-header.php'); 
global $wpdb;
	
// find clinic
if (isset($_REQUEST['city']))
	{
		$location_city1 = str_replace('_',' ',$_REQUEST['city']);
		
		$results = $wpdb->get_row("SELECT line_3 FROM wp_connections_address WHERE city='".$location_city1."'",ARRAY_N);
	
	if(!$results[0])
		echo 'please choose a city first';
	else 
		echo '<option>'.$results[0].'</option>';
}
else if (isset($_REQUEST['area']))
{
	$results1 = $wpdb->get_row("SELECT wp_connections_address.line_1,wp_connections_address.line_2,wp_connections_address.line_3,wp_connections_address.city,wp_connections_address.zipcode,wp_connections_phone.number From wp_connections_address LEFT JOIN wp_connections_phone ON wp_connections_address.id=wp_connections_address.id WHERE line_3='".$_REQUEST['area']."'",ARRAY_N);
	echo join(',<br/>',$results1);
}

//doctor name
else if((!isset($_REQUEST['location_city']) || $_REQUEST['location_city'] == ' ') && (isset($_REQUEST['therapy']) && $_REQUEST['therapy'] != '') &&($_REQUEST['p'] == 'abc')){
	$return = "Select Location First";
	echo $return;
}
else if(isset($_REQUEST['location_city']) && $_REQUEST['location_city'] != '' && isset($_REQUEST['therapy']) && $_REQUEST['therapy'] != '' && $_REQUEST['p'] == 'abc'){
	$results = $wpdb->get_results("SELECT doctor_name FROM wp_doctor_master WHERE location_area='".$_REQUEST['location_city']."' AND therapy_area = '".$_REQUEST['therapy']."'");
	$return = '';
	foreach($results as $result){
		$doctor = str_replace(' ', '_',$result->doctor_name);
		$return .="<option value='".$doctor."'>".$result->doctor_name."</option>";
	}
	echo $return;
}

//date time
else if((!isset($_REQUEST['location_city']) || $_REQUEST['location_city'] == ' ') && (isset($_REQUEST['therapy']) && $_REQUEST['therapy'] != '') &&($_REQUEST['p'] == 'sus')){
	$return = "Select Location First";
	echo $return;
}
else if(isset($_REQUEST['location_city']) && $_REQUEST['location_city'] != '' && isset($_REQUEST['therapy']) && $_REQUEST['therapy'] != '' && isset($_REQUEST['date']) && $_REQUEST['date'] != '' && $_REQUEST['p'] == 'sus' ){
	$therapy = str_replace(' ', ' ',$_REQUEST['therapy']);
	$date = explode('/',$_REQUEST['date']);
	echo "SELECT d_time FROM wp_doctor_appointment WHERE location_area='".$_REQUEST['location_city']."' AND therapy_area = '".$therapy."' AND d_month='".$date[0]."' AND d_day='".$date[1]."' AND d_year='".$date[2]."'  ";
	
	$query= $wpdb->get_results("SELECT d_time FROM wp_doctor_appointment WHERE location_area='".$_REQUEST['location_city']."' AND therapy_area = '".$therapy."' AND d_month='".$date[0]."' AND d_day='".$date[1]."' AND d_year='".$date[2]."'  ");
	//print_r($query);
	$return = '';
	$time = explode(',',$query[0]->d_time ); 
	foreach($time as $tm){
		$new_tm = explode('-',$tm);
		$new_tm[0] = $new_tm[0].":00";
		$new_tm[1] = $new_tm[1].":00";
		$return .="<option value='".$tm."'>".$new_tm[0]." to ".$new_tm[1]."</option>";
	}
	echo $return;
}

// career page for application
else if(isset($_REQUEST['location_city']) && $_REQUEST['location_city'] != '' && $_REQUEST['p'] == 'career'){
	$location_city1 = str_replace('_',' ',$_REQUEST['location_city']);
	$results = $wpdb->get_results("SELECT post_name FROM wp_career WHERE area='".$location_city1."'");
	$return = '';
	foreach($results as $result)
	{
		$postname[] =$result->post_name;
	}
	$loc = array_unique($postname);
	foreach($loc as $result1)
	{
		$loc1 = str_replace(' ','_',$result1);
		$loc2 = str_replace('_',' ',$result1);
		$return .="<option value='".$loc1."'>".$loc2."</option>";		
	}
	echo $return;
}



// career page for vacancy view
else if(isset($_REQUEST['location_city']) && $_REQUEST['location_city'] != '' && $_REQUEST['p'] == 'career-vac'){
	$location_city1 = str_replace('_',' ',$_REQUEST['location_city']);
	$results = $wpdb->get_results("SELECT post_name,description FROM wp_career WHERE city='".$location_city1."'");
	$return = '';
	foreach($results as $result)
	{
		// $postname[] =$result->post_name;
		$loc1 = str_replace(' ','_',$result->post_name);
		$loc2 = str_replace('_',' ',$result->post_name);
		$return .='<div class="career-main"><div class="career-head">'.$loc2.'</div><br/><div class="career-contain">'.$result->description.'</div></div>';		
}
//	$loc = array_unique($postname);
	
//	foreach($loc as $result1)
//	{
//	$loc1 = str_replace(' ','_',$result);
//		$loc2 = str_replace('_',' ',$result);
//		$return .="<option value='".$loc1."'>".$loc2."</option>";		
//	}
	echo $return;
}
