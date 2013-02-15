<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- jQuery cycle
	<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="http://malsup.github.com/jquery.easing.1.3.js"></script>
	<script>
		$(document).ready(function() {
			$('.testimonialswidget_testimonials').cycle({ 
				fx: 'scrollRight', 
				height: 'auto',
				delay:-1000 
			});
        });
	</script>
-->
 	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery-ui.css" />

    <style>
.ui-combobox {
	position: relative;
	display: inline-block;
	width:100%;
	margin:5px 5px 5px 0;
}
.ui-combobox-toggle {
	position: absolute;
	top: 0;
	bottom: 0;
	padding: 0;
	right:15px;
        /* adjust styles for IE 6/7 */
    *height: 1.7em;
 	*top: 0.1em;
}
.ui-combobox-input {
	margin: 0;
	padding:4px 0 4px 8px;
	width:98%;
}
</style>


<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.8.2.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
    

</head>

<body <?php body_class(); ?>>
<!--wrapper-->
<div class="loader" style="display:none;"></div>
<div class="wrapper"> 
      <!--header-->
      <div class="header"> 
    <!--logo-->
    <div class="logo"> <a href="<?php echo home_url();?>"> <img src="<?php bloginfo('template_url'); ?>/images/logo-s.png" alt="logo" /> </a> </div>
    <!--logo--> 
 <script>
 function show2()
{
 if($(".submenu2").is(":hidden"))
 {
  $(".submenu2").show();
 } 
 else
 {
  $(".submenu2").hide();
 }
 
 if($(".submenu1").is(":hidden"))
 {
  
 } 
 else
 {
  $(".submenu1").hide();
 }
 if($(".submenu3").is(":hidden"))
 {
  
 } 
 else
 {
  $(".submenu3").hide();
 }
}

function show1()
{
 if($(".submenu1").is(":hidden"))
 {
  $(".submenu1").show();
 } 
 else
 {
  $(".submenu1").hide();
 }
 
 if($(".submenu2").is(":hidden"))
 {
  
 } 
 else
 {
  $(".submenu2").hide();
 }
  if($(".submenu3").is(":hidden"))
 {
  
 } 
 else
 {
  $(".submenu3").hide();
 }
}
function show3()
{
 if($(".submenu3").is(":hidden"))
 {
  $(".submenu3").show();
 } 
 else
 {
  $(".submenu3").hide();
 }
 
 if($(".submenu2").is(":hidden"))
 {
  
 } 
 else
 {
  $(".submenu2").hide();
 }
  if($(".submenu1").is(":hidden"))
 {
  
 } 
 else
 {
  $(".submenu1").hide();
 }
}


$(document).ready(function()
{
	$(document).mouseup(function (e)
	{
		var container = $(".submenu2");
		var container2 = $(".submenu1");
	
		if (container.has(e.target).length === 0 && $(e.target).parent().hasClass("ui-menu-item") == false && $(e.target).hasClass("ui-state-default") == false )
		{
			container.hide();
		}
		if (container2.has(e.target).length === 0 )
		{
			container2.hide();
		}
	});
});


 </script>
    <!--buttons-->
<div class="buttons">
	<div class="dropdown">
        <a class="account1" >
            <span class="location1" onClick="show1()">patient login</span>
        </a>
        <div class="submenu1" style="display: none; ">
              <!--login-->
   			<div class="login">
    <?php // dynamic_sidebar('Login'); ?>
                <div class="login-title">patient login</div>
              		<form id='login-form1' action='coming-soon.html' >
                    	<input type="text" value="please enter your patient id" class="box admin" style="width:280px; height:14px;" name="username" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"/> 
                    	<input type="password" value="password" id="pass11" class="box password" style="width:280px; height:14px;" name="password" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"/>  
                  
                      	<input type="submit" id="adminuser" class="send" name="LoginButton" value="Login"  />   
                	</form>
            
            </div>
        </div>
	</div>

    <div class="dropdown">
        <a class="account2" >
            <span class="location2" onClick="show2()">request an appointment</span>
        </a>
        <div class="submenu2" style="display: none; ">
        <!--request-->
             <div class="request">
    <div class="request-title">request an appointment</div>
    <div class="request-title-patient">
        <div class="new-title2" id="new-title2" >
            existing patient 
        </div> 

        <div class="new-title3" id="new-title3">
        new patient
        </div>
   	</div>
    <!--new-->
    <div class="new3">
      <div id="request3" class="new11">
      <?php // echo do_shortcode('[contact-form-7 id="245" title="old patient header"]'); ?>
      <form name="old_patient_header" method="post" id="old_patient_header" >
                <table cellpadding="1" cellspacing="0" class="form1">
                <tr>
                    <td  style="width:147px;"><input type="text" name="p_id" class="small-box pid" value="patient id. no" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" /></td>
                    <td style="width:147px;"><?php
								global $wpdb;
								$results = $wpdb->get_results("SELECT line_3 FROM wp_connections_address ");
								//$results = $wpdb->get_row("SELECT line_3 FROM wp_connections_address WHERE city='NaviMumbai'",ARRAY_N);
								//print_r($results[0]);
								echo "<select name='location' id='h_location'  class='small-box location100' style='width:200px;'><option value=' '>--select location--</option>";
								foreach ($results as $result) {
									 $city = str_replace(' ','_',$result->line_3);
									 echo "<option value=".$city.">".$result->line_3."</option>";             
								}
								echo "</select>";
					?>
                    </td>
                    <script>
							$(".location100").change(function() {
								if($("#h_therapy").val() != " "){
									var myValue = " "; 
									var myText = "--therapy area--";
									$('#h_therapy').val(myValue);
									$('#h_therapy').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#h_doctor_name").val() != " "){
									var myValue = " ";
									var myText = "*preferred doctor"; 
									$('#h_doctor_name').val(myValue);
									$('#h_doctor_name').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#h_date_time").val() != "preferred_date"){
									var myValue = "preferred_date"; 
									var myText = "preferred_date";
									$('#h_date_time').val(myValue);
									$('#h_date_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#h_time").val() != " "){
									var myValue = " ";
									var myText = "--select time--"; 
									$('#h_time').val(myValue);
									$('#h_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
							});
                        	</script>
                </tr>
                
                <tr>
                    <td><select name="therapy_area" id="h_therapy"  class="small-box therapy">
                                                <option value=" " >--therapy area--</option>
                                                <option value="family_physician"> family physician </option>
                                                <option value="physiotherapist"> physiotherapist </option>
                                                <option value="paediatrician">paediatrician </option>
                                                <option value="gynaecologist"> gynaecologist </option>
                                               </select>
                    </td>
                    <td>
                    <select name="doctor_name" id="h_doctor_name" class="small-box doctor">
                                                <option value=" ">*preferred doctor</option>
                     </select>
                     
                     <script type="text/javascript">
					//load area select box
					$(document).ready(sport_selectbox_change11);
					   function sport_selectbox_change11(){
						   $('#h_therapy').change(update_player_list11);
					   }
					   function update_player_list11(){
						    $('.loader').show();
						    var city=$('#h_location').attr('value');
							var therapy=$('#h_therapy').attr('value');
							if($("#h_doctor_name").val() != " "){
								var myValue = " "; // value that you want selected
								var myText = "*preferred doctor"; // text that you want to display
								// You first need to set the value of the (hidden) select list
								$('#h_doctor_name').val(myValue);
								// ...then you need to set the display text of the actual autocomplete box.
								$('#h_doctor_name').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}
							if($("#h_date_time").val() != "preferred_date"){
								var myValue = "preferred_date"; 
								var myText = "preferred_date";
								$('#h_date_time').val(myValue);
								$('#h_date_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}
							if($("#h_time").val() != " "){
								var myValue = " ";
								var myText = "--select time--"; 
								$('#h_time').val(myValue);
								$('#h_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}
							//alert('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&p=abc');
							$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&p=abc', show_doctors11);
					   }
					   function show_doctors11(name){
						   	$('#h_doctor_name').html(name);
							$('.loader').hide();
					   }
					   
					   
					</script>
                    
				</td>
                </tr>
                    <script>
					$(".doctor").change(function() {
						if($("#h_date_time").val() != "preferred_date"){
							var myValue = "preferred_date"; 
							var myText = "preferred_date";
							$('#h_date_time').val(myValue);
							$('#h_date_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
						if($("#h_time").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#h_time').val(myValue);
							$('#h_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
					});
                </script>

                
                <tr>
                    <td><input type="text" name="date" class="small-box datepickp date ex_app_date" id="h_date_time" value="preferred_date"  onfocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" />
                   	</td>
                    <td>
                      <script>
					$(".ex_app_date").change(function() {
						if($("#h_time").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#h_time').val(myValue);
							$('#h_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
					});
                </script>
                    <select name="time" id="h_time" class="small-box time">
                                                <option value=" " >--select time--</option>
                                               </select>
                    
                    </td>
                </tr>
                <script type="text/javascript">
					//load area select box
					$(document).ready(sport_selectbox_change12);
					   function sport_selectbox_change12(){
						  $('#h_date_time').change(update_player_list12);
					   }
					   function update_player_list12(){
						    $('.loader').show();
						    var city=$('#h_location').attr('value');
							var therapy=$('#h_therapy').attr('value');
							var date_time = $('#h_date_time').attr('value');
							//alert('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&date='+date_time+'&p=sus');
							$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&date='+date_time+'&p=sus', show_doctors12);
					   }
					   function show_doctors12(time){
						   	$('#h_time').html(time);
							$('.loader').hide();
					   }
					   
					   
					</script>
                <tr>
                    <td><input type="hidden" name="patient" value="old" />  <input type="submit" class="send" value="send your request" /></td>
                    <td></td>
                </tr>
                </table>
                </form>
    </div>
    </div>
    <!--new--> 
    
    <!--new-->
    <div class="new4" style="display:none">
     
      <div id="request4"  class="new22">
 		<?php // echo do_shortcode('[contact-form-7 id="246" title="header new patient"]'); ?>
         <form name="new_patient_header" method="post" action="" id="new_patient_header">

                <table cellpadding="1" cellspacing="0" class="form1">
                <tr>
                    <td  style="width:147px;"><input type="text" name="fname" class="small-box fname" value="first name"  onfocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"  /></td>
                    <td style="width:147px;"><input type="text" name="lname"  class="small-box lname" value="last name"  onfocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" />
                </tr>
                <tr>
                    <td><input type="text"  class="small-box bdate datepickb" name="bdate"  value="birthdate"  onfocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" /></td>
                    <td><input type="text"  class="small-box phone" value="phone no."  name="phone"  onfocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" />
                </tr>
                <tr>
	                <td ><input type="text" name="email" class="small-box email" value="email id"  onfocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" /></td>
                     <td style="width:147px;"><?php
								global $wpdb;
								$results = $wpdb->get_results("SELECT line_3 FROM wp_connections_address ");
								//$results = $wpdb->get_row("SELECT line_3 FROM wp_connections_address WHERE city='NaviMumbai'",ARRAY_N);
								//print_r($results[0]);
								echo "<select name='location' id='h_location1'  class='small-box location100' style='width:200px;'><option value=' '>--select location--</option>";
								foreach ($results as $result) {
									 $city = str_replace(' ','_',$result->line_3);
									 echo "<option value=".$city.">".$result->line_3."</option>";             
								}
								echo "</select>";
					?>
                    
                    </td>
                    
                    <script>
							$(".location100").change(function() {
								if($("#h_therapy1").val() != " "){
									var myValue = " "; 
									var myText = "--therapy area--";
									$('#h_therapy1').val(myValue);
									$('#h_therapy1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#h_doctor_name1").val() != " "){
									var myValue = " ";
									var myText = "*preferred doctor"; 
									$('#h_doctor_name1').val(myValue);
									$('#h_doctor_name1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#h_date_time1").val() != "preferred_date"){
									var myValue = "preferred_date"; 
									var myText = "preferred_date";
									$('#h_date_time1').val(myValue);
									$('#h_date_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#h_time1").val() != " "){
									var myValue = " ";
									var myText = "--select time--"; 
									$('#h_time1').val(myValue);
									$('#h_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
							});
                      </script>
                </tr>
               
                <tr>
                    <td><select name="therapy_area"  id="h_therapy1" class="small-box therapy">
                                                <option value=" " > therapy area</option>
                                                <option value="family_physician"> family physician </option>
                                                <option value="physiotherapist"> physiotherapist </option>
                                                <option value="paediatrician">paediatrician </option>
                                                <option value="gynaecologist"> gynaecologist </option>
                                               </select>
                    </td>
                    <td>
                    
                     <script type="text/javascript">
					//load area select box
					$(document).ready(sport_selectbox_change13);
					   function sport_selectbox_change13(){
						   $('#h_therapy1').change(update_player_list13);
					   }
					   function update_player_list13(){
						    $('.loader').show();
						    var city=$('#h_location1').attr('value');
							var therapy=$('#h_therapy1').attr('value');
							if($("#h_doctor_name1").val() != " "){
								var myValue = " "; // value that you want selected
								var myText = "*preferred doctor"; // text that you want to display
								// You first need to set the value of the (hidden) select list
								$('#h_doctor_name1').val(myValue);
								// ...then you need to set the display text of the actual autocomplete box.
								$('#h_doctor_name1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}	
							if($("#h_date_time1").val() != "preferred_date"){
								var myValue = "preferred_date"; 
								var myText = "preferred_date";
								$('#h_date_time1').val(myValue);
								$('#h_date_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}
							if($("#h_time1").val() != " "){
								var myValue = " ";
								var myText = "--select time--"; 
								$('#h_time1').val(myValue);
								$('#h_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}
							//alert('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&p=abc');
							$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&p=abc', show_doctors13);
					   }
					   function show_doctors13(name){
						   	$('#h_doctor_name1').html(name);
							$('.loader').hide();
					   }
					   
					   
					</script>
                    
                    <select name="doctor_name" id="h_doctor_name1" class="small-box doctor">
                                                <option value=" " >*preferred doctor</option>
                     </select>
  					</td>
                </tr>
                
                  <script>
					$(".doctor").change(function() {
						if($("#h_date_time1").val() != "preferred_date"){
							var myValue = "preferred_date"; 
							var myText = "preferred_date";
							$('#h_date_time1').val(myValue);
							$('#h_date_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
						if($("#h_time1").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#h_time1').val(myValue);
							$('#h_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
					});
                </script>
                 <tr>
                    <td><input type="text" name="date" class="small-box datepickp date ex_app_date" value="preferred_date" id="h_date_time1" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;" />
                   	</td>
                      <script>
					$(".ex_app_date").change(function() {
						if($("#h_time1").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#h_time1').val(myValue);
							$('#h_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
					});
                </script>
                    <td><select name="time" id="h_time1" class="small-box time">
                                                <option value=" " >--select time--</option>
                                               </select>
                    </td>
                </tr>
                <script type="text/javascript">
					//load area select box
					$(document).ready(sport_selectbox_change14);
					   function sport_selectbox_change14(){
						  $('#h_date_time1').change(update_player_list14);
					   }
					   function update_player_list14(){
						    $('.loader').show();
						    var city=$('#h_location1').attr('value');
							var therapy=$('#h_therapy1').attr('value');
							var date_time = $('#h_date_time1').attr('value');
							//alert('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&date='+date_time+'&p=sus');
							$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&date='+date_time+'&p=sus', show_doctors14);
					   }
					   function show_doctors14(time){
						   	$('#h_time1').html(time);
							$('.loader').hide();
					   }
					   
					   
					</script>
                <tr>
                    <td><input type="hidden" name="patient" value="new" /> <input type="submit" class="send" value="send your request" /></td>
                    <td></td>
                </tr>
                </table>
              </form>
      </div>
    </div>
    <!--new-->
    
    <div class="clr"></div>
   	
    <div class="errormsg_header"></div>
    <p style="margin:5px 0 0 0; font-family:Arial, Helvetica, sans-serif; font-size:12px;">*appointment is subject to availability</p>
   
  </div>
    	<!--request-->
		</div>
     </div>

	    <div class="location"><a href="<?php get_site_url(); ?>/index.php/location/">locations</a></div>
</div>               
            <!--buttons--> 
   
    <div class="clr"></div>
    
    <!--navigation-->
    <div class="nav">
    	<?php wp_nav_menu(array('menu' => 'main-menu')); ?>
    </div>
    <!--navigation--> 
  </div>
      <!--header-->
      
<div class="clr"></div>