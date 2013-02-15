<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div class="footer">
    <?php wp_nav_menu(array('menu'=>'footer-menu')); ?>
        <p style="float:right;  font-size:13px; text-align:right; font-family:Arial, Helvetica, sans-serif; color:#999">suasti family medical centre - © 2012 <br />
          <img src="<?php bloginfo('template_url');?>/images/mimansa.png" alt="mimansa" style="float:right; margin-top:10px;"/></p>
  </div>
      <!--footer--> 
    </div>
</div>
<!--wrapper-->

<script type="application/javascript">

$(document).ready(function(){

$('li:last-child').addClass('lastclass');

$(".new-title").click(function() {
	$('.new').show();
	$('.new2').hide();
	$(".new-title1").css('opacity','0.25');
	$(".new-title").css('opacity','1.0');
});



$(".new-title1").click(function() {
	$('.new').hide();
	$('.new2').show();
	$(".new-title").css('opacity','0.25');
	$(".new-title1").css('opacity','1.0');
});



$(".new-title2").click(function() {
  $('.new3').show();
  $('.new4').hide();
	$(".new-title3").css('opacity','0.25');
	$(".new-title2").css('opacity','1.0');
});

$(".new-title3").click(function() {
  $('.new3').hide();
  $('.new4').show();
  $(".new-title2").css('opacity','0.25');
  $(".new-title3").css('opacity','1.0');
  });

});

</script>
    
  


<script type="text/javascript">
	//$('select').selectmenu();

	$(document).ready(function(){
		$("#doctor").change(function(){
			var param = $("#doctor").val();	
			 $('.loader').show();
			$("#divcontent2").hide();
			//$("#divcontent").load("<?php bloginfo('template_url'); ?>/page-get.php/?id="+param);
			$.post("<?php echo bloginfo('template_url');?>/page-get.php",{ id: param}, show_html)
		});
		function show_html(data){
			 $('.loader').hide();
			$("#divcontent").html(data);	
		}
	});

</script>
<script type="text/javascript">
	$(document).ready(function(){
	
	// Homepage login form query
	
		$(".content .login_box1").click(function(){
			var a = $(".content .login_box1").val();
			
			if(a == "please enter your patient id" )
			{
				$(".content .login_box1").val("");
			}	
		});
		$('.content .login_box1').focusout(function(){
			var b = $(".content .login_box1").val();
			if ($.trim(b) == '')
			{
				$(".content .login_box1").val("please enter your patient id");
			}
		});
		
	
	// header login form query
		$(".submenu1 .login_box1").click(function(){
			var a = $(".submenu1 .login_box1").val();
			
			if(a == "please enter your patient id" )
			{
				$(".submenu1 .login_box1").val("");
			}	
		});
		$('.submenu1 .login_box1').focusout(function(){
			var b = $(".submenu1 .login_box1").val();
			if ($.trim(b) == '')
			{
				$(".submenu1 .login_box1").val("please enter your patient id");
			}
		});
		
		// password for header
		$(".submenu1 .login_box").click(function(){
			 var a = $(".submenu1 .login_box").val();
			
			if(a == "password" )
			{		
				$(".submenu1 .login_box").val("");
				
			}	

		});
		$('.submenu1 .login_box').focusout(function(){
			var b = $(".submenu1 .login_box").val();
			if (b == '')
			{
				$(".submenu1 .login_box").val("password");
			}
		});
		
		//password for homepage
		
		$(".content .login_box").click(function(){
			 var a = $(".content .login_box").val();
			
			if(a == "password" )
			{		
				$(".content .login_box").val("");
				
			}	

		});
		$('.content .login_box').focusout(function(){
			var b = $(".content .login_box").val();
			if (b == '')
			{
				$(".content .login_box").val("password");
			}
		});
		
	});
</script>
 <script>
    $(function() {
        $(".datepickb" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1970:2020",
			maxDate: "+0m +0w +0d"
    });		
 });
	
	$(function() {
        $(".datepickp" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "2012:2030",
			minDate:"+0m +0w +0d"			
    	});
		// $('.timepickt').timepicker();
	});
	
	/*$('.datepickp').datetimepicker({
	altField: ".timepickt",
	minDate:"+0m +0w +0d",
	changeMonth: true,
	changeYear: true,
	yearRange: "2012:2030"

});*/
	

 </script>
<!--<script type="text/javascript">
$(document).ready(function(){
	$('#city').change(function(){
		<?php
            $results = $wpdb->get_results("SELECT city FROM wp_connections_address ");
            "<option selected='selected'>Select City</option>";
            foreach ($results as $result) {
            $a = "<option value=".$result->city.">".$result->city."</option>";            	
			}
            ?>
			
	});					  					  
})
</script>--> 	
<script>


$("#old_patient_header").submit( function () {    
		var a = $(".new3 .pid").val();
		var b = $(".new3 .location100").val();
		var c = $(".new3 .date").val();
		var d = $('#h_time').siblings('.ui-combobox').find('.ui-autocomplete-input').val();
		var e = $(".new3 .therapy").val();
		var f = $('#h_doctor_name').siblings('.ui-combobox').find('.ui-autocomplete-input').val();
		if(a=="patient id. no")
		{
			$('.errormsg_header').html("please enter patient id");
			$(".new3 .pid").focus();
			return false;
		}
		else if(b==" ")
		{
			$('.errormsg_header').html("please select location");
			$(".new3 .location100").focus();
			return false;
		}
		else if(e==" ")
		{
			$('.errormsg_header').html("please select therapy area");
			$(".new3 .therapy").focus();
			return false;
		}
		else if(f=="*preferred doctor")
		{
			$('.errormsg_header').html("please select preferred docter");
			$(".new3 .doctor").focus();
			return false;
		}
		else if(c=="preferred_date")
		{
			$('.errormsg_header').html("please select preferred date");
			$(".new3 .date").focus();
			return false;
		}
		else if(d=="--select time--")
		{
			$('.errormsg_header').html("please select preferred time");
			 $(".new3 .time").focus();
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
				var current_date = $("#h_date_time").val();
				var hours = d.getHours();
				var minutes = d.getMinutes();
				if(minutes > 30){
					hours = hours + 1;	
				}
				var time = $("#h_time").val();
				var myTime = time.split('-');
				var myArray = current_date.split('/');
				if(d.getFullYear() >= myArray[2]){
					if(month >= myArray[0]){				
						if(day >= myArray[1]){
							if(hours >= myTime[0]){
								$('.errormsg_header').html("Please select any other time.");
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
				$('.loader').hide();
				$(".errormsg_header").html(result);
				$('#old_patient_header').each(function(){  
					//this.reset();
			}); 
		   }   
		  });
			 
		  return false;  
		}
});

$("#new_patient_header").submit( function () {   
			var a = $(".new4 .fname").val();
			var b = $(".new4 .lname").val();
			var c = $(".new4 .bdate").val();
			var d = $(".new4 .phone").val();
			var j = $(".new4 .location100").val();
			var e = $(".new4 .email").val();
			var f = $(".new4 .date").val();
			var g = $('#h_time1').siblings('.ui-combobox').find('.ui-autocomplete-input').val();
			var h = $(".new4 .therapy").val();
			var i = $('#h_doctor_name1').siblings('.ui-combobox').find('.ui-autocomplete-input').val();
			var x = $(".new4 .email").val();
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if(a=="first name")
			{
				$('.errormsg_header').html("please enter first name");
				$(".new4 .fname").focus();
				return false;
			}
			else if(b=="last name")
			{
				$('.errormsg_header').html("please enter last name");
				$(".new4 .lname").focus();
				return false;
			}
			else if(c=="birthdate")
			{
				$('.errormsg_header').html("please enter birthdate");
				$(".new4 .bdate").focus();
				return false;
			}
			else if(d=="phone no.")
			{
				$('.errormsg_header').html("please enter phone number");
				$(".new4 .phone").focus();
				return false;
			}
			else if((isNaN(d)==true))
			{
				$('.errormsg_header').html("please enter digits only");
				$(".new4 .phone").focus();
				return false;
			}
			else if(d.length!=10)
			{
				$('.errormsg_header').html("please enter 10 digit number ");
				$(".new4 .phone").focus();
				return false;
			}
			else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				$('.errormsg_header').html("please enter valid e-mail address");
				$(".new4 .email").focus();
			  	return false;
			}
			else if(j==" ")
			{
				$('.errormsg_header').html("please select location ");
				$(".new4 .location100").focus();
				return false;
			}
			else if(h==" ")
			{
				$('.errormsg_header').html("please select preferred therapy");
				$(".new4 .therapy").focus();
				return false;
			}
			else if(i=="*preferred doctor")
			{
				$('.errormsg_header').html("please select preferred doctor");
				$(".new4 .doctor").focus();
				return false;
			}
			else if(f=="preferred_date")
			{
				$('.errormsg_header').html("please select preferred date");
				$(".new4 .date").focus();
				return false;
			}
			else if(g=="--select time--")
			{
				$('.errormsg_header').html("please select preferred time");
				$(".new4 .time").focus();
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
					var current_date = $("#h_date_time1").val();
					var hours = d.getHours();
					var minutes = d.getMinutes();
					if(minutes > 30){
						hours = hours + 1;	
					}
					var time = $("#h_time1").val();
					var myTime = time.split('-');
					var myArray = current_date.split('/');
					if(d.getFullYear() >= myArray[2]){
						if(month >= myArray[0]){				
							if(day >= myArray[1]){
								if(hours >= myTime[0]){
								$('.errormsg_header').html("Please select any other time.");
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
					$(".errormsg_header").html(result);
					$('.loader').hide();
					$('#old_patient_header').each(function(){  
						//this.reset();
					}); 
				   }   
				  });
					 
				  return false;  
			}
});
</script>
<script>
$(document).ready(function(){
	setTimeout('$("#request").show().fadeIn("slow")',2000);
	setTimeout('$(".testimonials #slideshow").css("visibility","visible")',2000);
	
});
</script>


<?php wp_footer(); ?>

</body>
</html>