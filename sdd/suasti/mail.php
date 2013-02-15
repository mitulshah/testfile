<?php
include('../../../wp-blog-header.php');
error_reporting(0);
global $wpdb;

if($_POST['p_id'] != '' && $_POST['location'] != '' && $_POST['therapy_area'] != '' && $_POST['doctor_name'] != '' && $_POST['date'] != '' && $_POST['time'] != ''  && $_POST['patient'] == 'old'){
	
	$location = str_replace('_',' ',$_POST['location']);
	$doctorname = str_replace('_',' ',$_POST['doctor_name']);
	$therapy = str_replace('_',' ',$_POST['therapy_area']);
	
	$to      = 'hello@suasti.in';
	$subject = 'Appoitntment';
	$message = 'Patient ID : '.$_POST['p_id']. "\r\n";
	$message .= 'Location : '.$location. "\r\n";
	$message .= 'Therapy Area : '.$therapy. "\r\n";
	$message .= 'Doctor Name : '.$doctorname. "\r\n";
	$message .= 'Time : '.$_POST['time']. "\r\n";

	$headers = 'From: suasti@suasti.in' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	if(mail($to, $subject, $message, $headers)){
		echo "<h1 class='mail-succ'>Mail successfully sent.</h1>";	
	}else{
		echo "<h1 class='mail-fail'>Your Appointment can not be fixed at this time, plz try again later.</h1>";	
	}
	
}else if($_POST['patient'] != 'new' && $_POST['form'] != 'career' && $_POST['contactus'] != 'contactus'){
	echo $result = "<h1 class='mail-field'>Please Enter all the fields</h1>";
}


// new patient

if($_POST['fname'] != '' && $_POST['lname'] != '' && $_POST['bdate'] != '' && $_POST['phone'] != '' && $_POST['email'] != ''  && $_POST['location'] != '' && $_POST['therapy_area'] != '' && $_POST['doctor_name'] != '' && $_POST['date'] != '' && $_POST['time'] != ''  && $_POST['patient'] == 'new'){

	$location = str_replace('_',' ',$_POST['location']);
	$doctorname = str_replace('_',' ',$_POST['doctor_name']);
	$therapy = str_replace('_',' ',$_POST['therapy_area']);
	
	
	
	$to      = 'hello@suasti.in';
	$subject = 'New patient';
	$message = 'Name : '.$_POST['fname'].' '.$_POST['lname'] ."\r\n";
	$message .= 'BOD : '.$_POST['bdate']. "\r\n";
	$message .= 'Phone : '.$_POST['phone']. "\r\n";
	$message .= 'Email : '.$_POST['email']. "\r\n";
	$message .= 'Location : '.$location. "\r\n";
	$message .= 'Therapy Area : '.therapy. "\r\n";
	$message .= 'Doctor Name : '.$doctorname. "\r\n";
	$message .= 'Date : '.$_POST['date']. "\r\n";
	$message .= 'Time : '.$_POST['time']. "\r\n";

	$headers = 'From: suasti@suasti.in' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	if(mail($to, $subject, $message, $headers)){
		echo "<h1 class='mail-succ'>Mail successfully sent.</h1>";	
	}else{
		echo "<h1 class='mail-fail'>Your Appointment can not be fixed at this time, plz try again later.</h1>";	
	}
	
}else  if($_POST['patient'] != 'old' && $_POST['form'] != 'career'  && $_POST['contactus'] != 'contactus'){
	$result = "";
	echo $result = "<h1 class='mail-field'>Please Enter all the fields..</h3>";
}

//career
if($_POST['location'] != '' && $_POST['therapy_area'] != '' && $_POST['name'] != '' && $_POST['yearpicker'] != '' && $_POST['email'] != ''  && $_POST['phone'] != '' && $_POST['discription'] != '' && $_POST['form'] == 'career'){
	
	$location = str_replace('_',' ',$_POST['location']);
	$therapy = str_replace('_',' ',$_POST['therapy_area']);
	if($_POST['post_grade'] != ''){$post_grade = $_POST['post_grade'];}else{$post_grade = 'Not Done';}
	if($_POST['yearpicker2'] != ''){$post_grade_year = $_POST['yearpicker2'];}else{$post_grade_year = 'Not Done';}
	
	$to      = 'hello@suasti.in';
	$subject = 'Application for job request';
	$message = 'Location : '.$location."\r\n";
	$message .= 'Name : '.$_POST['name']. "\r\n";
	$message .= 'Degree :'.$therapy. "\r\n";
	$message .= 'Pass Year : '.$_POST['pass_year1']. "\r\n";
	$message .= 'Degree :'.$post_grade. "\r\n";
	$message .= 'Pass Year : '.$post_grade_year. "\r\n";
	$message .= 'Email : '.$_POST['email']. "\r\n";
	$message .= 'Phone : '.$_POST['phone']. "\r\n";
	$message .= 'Description : '.$_POST['discription']. "\r\n";


	$headers = 'From: suasti@suasti.in' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	if(mail($to, $subject, $message, $headers)){
		echo "<h1 class='mail-succ'>Mail successfully sent.</h1>";	
	}else{
		echo "<h1 class='mail-fail'>Your Application can not sent. please try later.</h1>";	
	}
	
}else  if($_POST['patient'] != 'old' && $_POST['patient'] != 'new' && $_POST['contactus'] != 'contactus'){
	echo $result = "<h1 class='mail-field'>Please Enter all the fields</h1>";
}

// contact us

if($_POST['name'] != '' && $_POST['email'] != '' && $_POST['phone'] != '' && $_POST['contactus'] == 'contactus'){
	
	$to      = 'hello@suasti.in';
	$subject = 'contact request';
	$message = 'Name : '.$_POST['name']."\r\n";
	$message .= 'Email : '.$_POST['email']. "\r\n";
	$message .= 'phone :'.$_POST['phone']. "\r\n";
	$message .= 'query : '.$_POST['query']. "\r\n";


	$headers = 'From: suasti@suasti.in' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	if(mail($to, $subject, $message, $headers)){
		echo "<h1 class='mail-succ'>Mail successfully sent.</h1>";	
	}else{
		echo "<h1 class='mail-fail'>Your request can not sent. please try later.</h1>";	
	}
	
}else  if($_POST['patient'] != 'old' && $_POST['patient'] != 'new' && $_POST['form'] != 'career'){
	echo $result = "<h1 class='mail-field'>please enter all the fields</h1>";
}
?>