
 <?php
/**
 * Template Name: Home Page Template
 */

get_header(); ?>

<div class="banner">
  <?php    if (function_exists('get_thethe_image_slider')) {
		print get_thethe_image_slider('Main Slider');
	} ?>
</div>
<div class="clr"></div>
<div class="content"> 
<script type="text/javascript">
			$(document).ready(sport_selectbox_change);
			function sport_selectbox_change(){
				$('#city').change(update_player_list);
			}
			function update_player_list(){
				var city=$('#city').attr('value');
				 $('.loader').show();
				if($("#area").val() != " "){
						var myValue = " "; // value that you want selected
						var myText = "select area"; // text that you want to display
						// You first need to set the value of the (hidden) select list
						$('#area').val(myValue);
						// ...then you need to set the display text of the actual autocomplete box.
						$('#area').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
					}			
				$.get('<?php bloginfo("template_url");?>/get_list.php?city='+city, show_players);
			}
			function show_players(area){
				$('#area').html(area);
				 $('.loader').hide();
			}
			
			$(document).ready(function(){
			 $('#area').change(update_address);			
			});
			
			
			
			function update_address(){
				var area=$('#area').attr('value');	
				var city=$('#city').attr('value');
				 $('.loader').show();
				$.get('<?php bloginfo("template_url");?>/get_list.php?area='+area, show_address);	
			}
			
			
			function show_address(address){
				//alert(address);
				$('.loader').hide();
				$('#address').html(address);
			}
			
       </script>

  <!--find-->
  <div class="find">
    <?php // dynamic_sidebar('find clinic'); ?>
    <h3 class="find-title">find a clinic near you</h3>
        <div class="drop">
			      
			<?php
            $results = $wpdb->get_results("SELECT city FROM wp_connections_address ");
            
			//$results = $wpdb->get_row("SELECT line_3 FROM wp_connections_address WHERE city='NaviMumbai'",ARRAY_N);
			//print_r($results[0]);
			echo "<select class='drop2' name='city' id='city' class='jNiceSelectWrapper'><option selected='selected'>select city</option>";
            foreach ($results as $result) {
				$city = str_replace(' ','_',$result->city);
            	echo "<option value=".$city.">".$result->city."</option>";            	
			}
            ?>
            </select>
            
	    	</div>
        	<div class="drop">
                
                <select class="drop2 jNiceSelectWrapper" name="area" id="area">
				<option>select area </option>
               	</select>
 	     	</div>
    	    <div class="clr"></div>
            	<p style="color:#009bc9; margin:10px; font-family:Arial, Helvetica, sans-serif;">suasti family medical centre near you</p>
         	<div class="address" id="address">
        	19-22 Bhoomi Paradise CHS,<br />
            Plot # 2-3, Next to Millennium Towers,<br/>
            Opposite Juinagar station, Sector 11, <br />
            Sanpada(E), Navi Mumbai 400705 <br />
            <br />
            Tel: 022-41227716 / 7<br />
            </div>
        <a href="'<?php get_site_url()?>/index.php/navi-mumbai-location/" style="color:#009bc9; margin-left:10px;">google map</a>
        	
  </div>
  <!--find--> 
  
  <!--request-->
  <div class="request">
    <div class="request-title">request an appointment</div>
      	<div class="request-title-patient">
    		<div class="new-title" id="new-title" >
            	existing patient
           	</div> 
            <div class="new-title1" id="new-title1">
            	new patient
            </div>
   		</div>
        <!--new-->
        <div class="new">
          <div id="request" class="new11" style="display:none;">
          <?php // echo do_shortcode('[contact-form-7 id="109" title="contact form home old patient"]'); ?>
         		<form name="old_patient" method="post" id="old_patient" >
                <table cellpadding="1" cellspacing="0" class="form1">
                <tr>
                    <td  style="width:147px;"><input type="text" name="p_id"  class="small-box pid" value="patient id. no" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /></td>

                    <td style="width:147px;"><?php
								global $wpdb;
								$results = $wpdb->get_results("SELECT line_3 FROM wp_connections_address ");
								//$results = $wpdb->get_row("SELECT line_3 FROM wp_connections_address WHERE city='NaviMumbai'",ARRAY_N);
								//print_r($results[0]);
								echo "<select name='location' id='location'  class='small-box location100' style='width:200px;'><option value=' '>--select location--</option>";
								foreach ($results as $result) {
									 $city = str_replace(' ','_',$result->line_3);
									 echo "<option value=".$city.">".$result->line_3."</option>";             
								}
								echo "</select>";
					?>
                        	<script>
							$(".location100").change(function() {
								if($("#therapy").val() != " "){
									var myValue = " "; 
									var myText = "--therapy area--";
									$('#therapy').val(myValue);
									$('#therapy').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#doctor_name").val() != " "){
									var myValue = " ";
									var myText = "*preferred doctor"; 
									$('#doctor_name').val(myValue);
									$('#doctor_name').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#date_time").val() != "preferred_date"){
									var myValue = "preferred_date"; 
									var myText = "preferred_date";
									$('#date_time').val(myValue);
									$('#date_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#time").val() != " "){
									var myValue = " ";
									var myText = "--select time--"; 
									$('#time').val(myValue);
									$('#time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
							});
                        	</script>
                    </td>
                </tr>
                
                <tr>
                    <td><select name="therapy_area" id="therapy"  class="small-box therapy">
                                                <option value=" " >--therapy area--</option>
                                                <option value="family_physician"> family physician </option>
                                                <option value="physiotherapist"> physiotherapist </option>
                                                <option value="paediatrician">paediatrician </option>
                                                <option value="gynaecologist"> gynaecologist </option>
                                               </select>
                    </td>
                    <td>
                    <select name="doctor_name" id="doctor_name" class="small-box doctor">
                                                <option value=" " >*preferred doctor</option>
                     </select>
                     
                     <script type="text/javascript">
					//load area select box
				
					$(document).ready(sport_selectbox_change1);
					   function sport_selectbox_change1(){
						   $('#therapy').change(update_player_list1);						   
					   }
					   function update_player_list1(){
						   $('.loader').show();
						    var city=$('#location').attr('value');
							var therapy=$('#therapy').attr('value');
							
							if($("#doctor_name").val() != " "){
								var myValue = " "; // value that you want selected
								var myText = "*preferred doctor"; // text that you want to display
								// You first need to set the value of the (hidden) select list
								$('#doctor_name').val(myValue);
								// ...then you need to set the display text of the actual autocomplete box.
								$('#doctor_name').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}	
							if($("#date_time").val() != "preferred_date"){
								var myValue = "preferred_date"; 
								var myText = "preferred_date";
								$('#date_time').val(myValue);
								$('#date_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}
							if($("#time").val() != " "){
								var myValue = " ";
								var myText = "--select time--"; 
								$('#time').val(myValue);
								$('#time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}
						    //alert('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&p=abc');
							$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&p=abc', show_doctors1);
					   }
					   function show_doctors1(name){
						   	$('#doctor_name').html(name);
							$('.loader').hide();
					   }
 
					</script>
                    
				</td>
                </tr>
                <script>
					$(".doctor").change(function() {
						if($("#date_time").val() != "preferred_date"){
							var myValue = "preferred_date"; 
							var myText = "preferred_date";
							$('#date_time').val(myValue);
							$('#date_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
						if($("#time").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#time').val(myValue);
							$('#time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
					});
                </script>
                <tr>
                    <td><input type="text" name="date" class="small-box datepickp date ex_app_date" id="date_time" value="preferred_date"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
                   	</td>
                    <script>
					$(".ex_app_date").change(function() {
						if($("#time").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#time').val(myValue);
							$('#time').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
					});
                </script>
                    <td><!--<input type="text" class="small-box timepickt time" value="preferred time"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />-->
                    <select name="time" id="time" class="small-box time">
                                                <option value=" " >--select time--</option>
                                               </select>
                    
                    </td>
                </tr>
                <script type="text/javascript">
					//load area select box
					$(document).ready(sport_selectbox_change2);
					   function sport_selectbox_change2(){
						  $('#date_time').change(update_player_list2);
					   }
					   function update_player_list2(){
						    $('.loader').show();
												   
						    var city=$('#location').attr('value');
							var therapy=$('#therapy').attr('value');
							var date_time = $('#date_time').attr('value');
							//alert('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&date='+date_time+'&p=sus');
							$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&date='+date_time+'&p=sus', show_doctors2);
					   }
					   function show_doctors2(time){
						   	$('#time').html(time);
							$('.loader').hide();
					   }

					   
					   
					</script>
                <tr>
                    <td><input type="hidden" name="patient" value="old" /> <input type="submit" class="send" value="send your request" /></td>
                    <td></td>
                </tr>
                </table>
                </form>
                
              <div class="clr"></div>
          <p style="margin:5px 0 0 0; font-family:Arial, Helvetica, sans-serif; font-size:12px;">*appointment is subject to availability</p>   
        </div>
       
        </div>
        <!--new--> 
        
        <!--new-->
        <div class="new2" style="display:none">
         
          <div id="request2" class="new22">
            <?php // echo do_shortcode('[contact-form-7 id="118" title="contact-form 2 for new patient homepage"]'); ?>
            
            
            <form name="new_patient" method="post" action="" id="new_patient">

                <table cellpadding="1" cellspacing="0" class="form1">
                <tr>
                    <td  style="width:147px;"><input type="text" name="fname"  class="small-box fname" value="first name"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"  /></td>
                    <td style="width:147px;"><input type="text" name="lname"  class="small-box lname" value="last name"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
                </tr>
                <tr>
                    <td><input type="text" name="bdate" class="small-box bdate datepickb" value="birthdate"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /></td>
                    <td><input type="text" name="phone" class="small-box phone" value="phone no."  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
                </tr>
                <tr>
	                <td ><input type="text" name="email" class="small-box email" value="email id"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /></td>
                     <td style="width:147px;"><?php
								global $wpdb;
								$results = $wpdb->get_results("SELECT line_3 FROM wp_connections_address ");
								//$results = $wpdb->get_row("SELECT line_3 FROM wp_connections_address WHERE city='NaviMumbai'",ARRAY_N);
								//print_r($results[0]);
								echo "<select name='location' id='location1'  class='small-box location100' style='width:200px;'><option value=' '>--select location--</option>";
								foreach ($results as $result) {
									 $city = str_replace(' ','_',$result->line_3);
									 echo "<option value=".$city.">".$result->line_3."</option>";             
								}
								echo "</select>";
					?>
                     	<script>
							$("#location1").change(function() {
								if($("#therapy1").val() != " "){
									var myValue = " "; 
									var myText = "--therapy area--";
									$('#therapy1').val(myValue);
									$('#therapy1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#doctor_name1").val() != " "){
									var myValue = " ";
									var myText = "*preferred doctor"; 
									$('#doctor_name1').val(myValue);
									$('#doctor_name1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#date_time1").val() != "preferred_date"){
									var myValue = "preferred_date"; 
									var myText = "preferred_date";
									$('#date_time1').val(myValue);
									$('#date_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								if($("#time1").val() != " "){
									var myValue = " ";
									var myText = "--select time--"; 
									$('#time1').val(myValue);
									$('#time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
								}
								
							});
                        </script>
                    </td>
                </tr>
               
                <tr>
                    <td><select name="therapy_area"  id="therapy1" class="small-box therapy">
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
					$(document).ready(sport_selectbox_change3);
					   function sport_selectbox_change3(){
						   $('#therapy1').change(update_player_list3);
					   }
					   function update_player_list3(){
						    $('.loader').show();
						    var city=$('#location1').attr('value');
							var therapy=$('#therapy1').attr('value');
							if($("#doctor_name1").val() != " "){
								var myValue = " "; // value that you want selected
								var myText = "*preferred doctor"; // text that you want to display
								$('#doctor_name1').val(myValue);
								$('#doctor_name1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
							}
							if($("#date_time1").val() != "preferred_date"){
							var myValue = "preferred_date"; 
							var myText = "preferred_date";
							$('#date_time1').val(myValue);
							$('#date_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
						if($("#time1").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#time1').val(myValue);
							$('#time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
							
							//alert('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&p=abc');
							$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&p=abc', show_doctors3);
					   }
					   function show_doctors3(name){
						   	$('#doctor_name1').html(name);
							$('.loader').hide();
					   }
					   
					   
					</script>
                    
                    <select name="doctor_name" id="doctor_name1" class="small-box doctor">
                                                <option value=" " >--preferred doctor--</option>
                     </select>
  					</td>
                </tr>
                 <script>
					$(".doctor").change(function() {
						if($("#date_time1").val() != "preferred_date"){
							var myValue = "preferred_date"; 
							var myText = "preferred_date";
							$('#date_time1').val(myValue);
							$('#date_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
						if($("#time1").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#time1').val(myValue);
							$('#time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
					});
                </script>
                 <tr>
                    <td><input type="text" name="date" class="small-box datepickp date ex_app_date1" value="preferred_date" id="date_time1" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
                   	</td>
                     <script>
					$(".ex_app_date1").change(function() {
						if($("#time1").val() != " "){
							var myValue = " ";
							var myText = "--select time--"; 
							$('#time1').val(myValue);
							$('#time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
						}
					});
                </script>
                    <td><select name="time" id="time1" class="small-box time">
                                                <option value=" " >--select time--</option>
                                               </select>
                    </td>
                </tr>
                <script type="text/javascript">
					//load area select box
					$(document).ready(sport_selectbox_change4);
					   function sport_selectbox_change4(){
						  $('#date_time1').change(update_player_list4);
					   }
					   function update_player_list4(){
						    $('.loader').show();
						    var city=$('#location1').attr('value');
							var therapy=$('#therapy1').attr('value');
							var date_time = $('#date_time1').attr('value');
							//alert('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&date='+date_time+'&p=sus');
							$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&therapy='+therapy+'&date='+date_time+'&p=sus', show_doctors4);
					   }
					   function show_doctors4(time){
						   	$('#time1').html(time);
							$('.loader').hide();
					   }
					   
					   
					</script>
                <tr>
                    <td><input type="hidden" name="patient" value="new" /> <input type="submit" class="send" value="send your request" /></td>
                    <td></td>
                </tr>
                </table>
                </form>
                 <div class="clr"></div>
          <p style="margin:5px 0 0 0; font-family:Arial, Helvetica, sans-serif; font-size:12px;">*appointment is subject to availability</p>
          </div>
         
        </div>
        <!--new-->
    
    	<div class="clr"></div>
    	
        <div class="errormsg"></div>
		
  </div>
  <!--request--> 
  
 	 <div class="login">
    	<div class="login-title">patient login</div>
        <form id='login-form1' action='coming-soon.html'>
            <input type="text" value="please enter your patient id" class="box admin" style="width:280px; height:14px;" name="username" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/> 
            <input type="password" value="password" id="pass11" class="box password" style="width:280px; height:14px;" name="password" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"/>  
      
          <input type="submit" id="adminuser" class="send" name="LoginButton" value="Login"  />   
        </form>
    </div>
  
  <div class="clr"></div>
  <div class="line"></div>
  
  <!--testimonials-->
  <div class="testimonials"> 
    
    <!-- End outer wrapper--> 
    
    <!-- attach the plug-in to the slider parent element and adjust the settings as required-->
    <div id="slideshow" style="visibility:hidden;">
      <?php dynamic_sidebar('Footer Testimonial'); ?>
    </div>
  </div>
</div>
<!--testimonials-->

<div class="line"></div>
<!--content-->

<script>
$("#old_patient").submit( function () {  
			var a = $(".new .pid").val();
			var b = $(".new .location100").val();
			var c = $(".new .date").val();
			var d =  $('#time').siblings('.ui-combobox').find('.ui-autocomplete-input').val();
			var e = $(".new .therapy").val();
			var f = $('#doctor_name').siblings('.ui-combobox').find('.ui-autocomplete-input').val();
			if(a=="patient id. no")
			{
				$('.errormsg').html("please enter patient id");
				$(".new .pid").focus();
				return false;
			}
			else if(b==" ")
			{
				$('.errormsg').html("please select location");
				$(".new .location100").focus();
				return false;
			}
			else if(e==" ")
			{
				$('.errormsg').html("please select therapy area");
				$(".new .therapy").focus();
				return false;
			}
			else if(f=="*preferred doctor")
			{
				$('.errormsg').html("please select preferred docter");
				$(".new .doctor").focus();
				return false;
			}
			else if(c=="preferred_date")
			{
				
				$('.errormsg').html("please select preferred date");
				$(".new .date").focus();
				return false;
			}
			else if(d=="--select time--")
			{
				$('.errormsg').html("please select preferred time");
				 $(".new .time").focus();
				return false;
			}
						
			else 
			{
				var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var output = (month<10 ? '0' : '') + month + '/' +
				(day<10 ? '0' : '') + day  + '/' +  d.getFullYear();
				//alert(output);
				var current_date = $("#date_time").val();
				var hours = d.getHours();
				var minutes = d.getMinutes();
				if(minutes > 30){
					hours = hours + 1;	
				}
				var time = $("#time").val();
				var myTime = time.split('-');
				var myArray = current_date.split('/');
				if(d.getFullYear() >= myArray[2]){
					if(month >= myArray[0]){				
						if(day >= myArray[1]){
							if(hours >= myTime[0]){
								$('.errormsg').html("Please select any other time.");
								return false;
							}
						}
					}
				}
			
				
				var data = $(this).serializeArray();
				$('.loader').show();
				$.ajax({   
					type: "POST",
					dataType: "html",
					data: data, 
					cache: false,  
					url: "<?php echo bloginfo('template_url');?>/mail.php",   
					success: function(result){
						//alert(result);
						$('.loader').hide();
						$(".errormsg").html(result);
						$('#old_patient').each(function(){  
							//this.reset();
						}); 
					}   
				});
				   
				return false;  
			}
});

$("#new_patient").submit( function () {  
		var a = $(".new2 .fname").val();
			var b = $(".new2 .lname").val();
			var c = $(".new2 .bdate").val();
			var d = $(".new2 .phone").val();
			var f = $(".new2 .date").val();
			var g = $('#time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val();
			var h = $(".new2 .therapy").val();
			var i = $('#doctor_name1').siblings('.ui-combobox').find('.ui-autocomplete-input').val();
			var j = $(".new2 .location100").val();
			var x = $(".new2 .email").val();
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			
			if(a=="first name")
			{
				$('.errormsg').html("please enter first name");
				$(".new2.fname").focus();
				return false;
			}
			else if(b=="last name")
			{
				$('.errormsg').html("please enter last name");
				$(".new2 .lname").focus();
				return false;
			}
			else if(c=="birthdate")
			{
				$('.errormsg').html("please enter birthdate");
				$(".new2 .bdate").focus();
				return false;
			}
			else if(d=="phone no.")
			{
				$('.errormsg').html("please enter phone number");
				$(".new2 .phone").focus();
				return false;
			}
			else if((isNaN(d)==true))
			{
				$('.errormsg').html("please enter digits only");
				$(".new2 .phone").focus();
				return false;
			}
			else if(d.length!=10)
			{
				$('.errormsg').html("please enter 10 digit number ");
				$(".new2 .phone").focus();
				return false;
			}
			else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			 {
				$('.errormsg').html("please enter valid e-mail address");
				$(".new2 .email").focus();
			  	return false;
			}
			else if(j==" ")
			{
				
				$('.errormsg').html("please select location ");
				$(".new2 .location100").focus();
				return false;
			}
			else if(h==" ")
			{
				$('.errormsg').html("please select preferred therapy");
				$(".new2 .therapy").focus();
				return false;
			}
			else if(i=="--preferred doctor--")
			{
				$('.errormsg').html("please select preferred doctor");
				$(".new2 .doctor").focus();
				return false;
			}
			else if(f=="preferred_date")
			{
				$('.errormsg').html("please select preferred date");
				$(".new2 .date").focus();
				return false;
			}
			else if(g=="--select time--")
			{
				$('.errormsg').html("please select preferred time");
				$(".new2 .time").focus();
				return false;
			}
			
			else 
			{
				var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var output = (month<10 ? '0' : '') + month + '/' +
				(day<10 ? '0' : '') + day  + '/' +  d.getFullYear();
				//alert(output);
				var current_date = $("#date_time1").val();
				var hours = d.getHours();
				var minutes = d.getMinutes();
				if(minutes > 30){
					hours = hours + 1;	
				}
				var time = $("#time1").val();
				var myTime = time.split('-');
				var myArray = current_date.split('/');
				if(d.getFullYear() >= myArray[2]){
					if(month >= myArray[0]){				
						if(day >= myArray[1]){
							if(hours >= myTime[0]){
								$('.errormsg').html("Please select any other time.");
								return false;
							}
						}
					}
				}
				
				var data = $(this).serializeArray();
				$('.loader').show();
				$.ajax({   
					type: "POST",
					dataType: "html",
					data: data, 
					cache: false,  
					url: "<?php echo bloginfo('template_url');?>/mail.php",   
					success: function(result){
						//alert("<?php echo bloginfo('template_url');?>/mail.php");
						//alert(result);
						$('.loader').hide();
						$(".errormsg").html(result);
						$('#old_patient').each(function(){  
							//this.reset();
						}); 
					}   
				});
				   
				return false;
			}
});
</script>   
<?php get_footer(); ?>
