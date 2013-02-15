<?php
/**
 * Template Name: Career Page
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>  
<div class="content">
							
                <div class="menu-title"><?php the_title(); ?></div>
                  
                    <div class="career-left"> 
                    	<div class="news-title">A great opportunity to work in an organised<br /> primary healthcare setup</div>          
                            <div class="career-contain">Suasti Family Medical Centre is looking to recruit passionate people for the following positions:</div>                       			<?php $results1 = $wpdb->get_results("select * from wp_career"); ?>
                            	<?php echo "<select name='location' id='location104'  class='small-box location103' style='width:200px;'>
                                 	<option value=' '>--select location--</option>";
										foreach ($results1 as $result)
										{
											 $location[] = $result->city;											             
										}
										$loc = array_unique($location);									
										foreach($loc as $locality)
										{
											$loc = str_replace(' ','_',$locality);	
											echo "<option value=".$loc.">".$locality."</option>"; 
										}
										echo "</select>";
										?>
                                     <script type="text/javascript">
											//load area select box
											$(document).ready(sport_selectbox_change105);
											   function sport_selectbox_change105(){
												  $('#location104').change(update_player_list105);
											   }
											   function update_player_list105(){ // alert(1);
													var city=$('#location104').attr('value');
													 $('.loader').show();
													$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&p=career-vac', show_doctors105);
											  }
											   function show_doctors105(desc){
												    $('.loader').hide();
													$('.vacancy').html(desc);
											   }
											   
											   
										</script>
													
                    		<div class="vacancy">
							<?php 
                                $results = $wpdb->get_results("select * from wp_career"); 
                                foreach ($results as $result) 
                                {
                                    $vacancy = $result->post_name;
                                //	$require_name[] = $vacancy;
                                    $vacancy_name = str_replace('_', ' ',$vacancy);
                                    $desc = $result->description;
                                    echo ' <div class="career-main"><div class="career-head">'.$vacancy_name.'</div><br/><div class="career-contain">'.$desc.'</div></div>';
                                }
                             ?>
                                
							</div>
				
					
					
					</div>
                
                <div class="career-right">
            			<div class="apply-title">apply now!</div>
						  <div class="form-main">	                                       
                            <div class="apply-form">
                               <?php $results = $wpdb->get_results("select area from wp_career"); ?>
                                     <form name="career_form" method="post" action="" id="career_form">
										<?php echo "<select name='location' id='location103'  class='small-box location103' style='width:200px;'>
                                        	<option value=' '>--select location--</option>";
												foreach ($results as $result)
												{
													 $location1[] = $result->area;											             
												}
												
												$loc = array_unique($location1);	
												
												foreach($loc as $locality)
												{
													$loc1 = str_replace(' ','_',$locality);	
													echo "<option value=".$loc1.">".$locality."</option>"; 
												}
											echo "</select>";
											
										?>
                                          <script type="text/javascript">
											//load area select box
											$(document).ready(sport_selectbox_change104);
											   function sport_selectbox_change104(){
												  $('#location103').change(update_player_list104);
											   }
											   function update_player_list104(){ // alert(1);
													var city=$('#location103').attr('value');
													if($("#theraphy101").val() != " "){
														var myValue = " ";
														var myText = "--therapy area--"; 
														$('#theraphy101').val(myValue);
														$('#theraphy101').siblings('.ui-combobox').find('.ui-autocomplete-input').val(myText);
													}
													 $('.loader').show();
													$.get('<?php echo bloginfo('template_url');?>/get_list.php?location_city='+city+'&p=career', show_doctors104);
											  }
											   function show_doctors104(therapy){
												    $('.loader').hide();
													$('#theraphy101').html(therapy);
											   }
											   
											   
										</script>
                                            <br />
                                           	<select name="therapy_area"  class="small-box therapy" id="theraphy101">
                                                <option value=" ">--therapy area--</option>
                                            </select>
                                            <br />
                                            <input name="name" class="small-box name1" type="text" value="name"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"  /><br />
                                           <!-- <input name="pass_year1" class="small-box yr" type="text" value="year of graduating MBBS" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"  />-->
                                           <select name="yearpicker" class="yearpicker yr">
                                           		<option value=" ">year of graduating MBBS</option>
                                           </select>
                                           
                                           
                                           <br />
                                            <input name="post_grade"class="small-box pgd" type="text" value="post graduate degree" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"  /><br />
                                            <!--<input name="year_post_grade" class="small-box pgdyr" type="text" value="year of post graduating" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"  />-->
                                            <select name="yearpicker2" class="yearpicker pgdyr">
                                            	<option value=" ">year of post graduating</option>
                                            </select>
                                            <br />
                                            <input name="phone" class="small-box phone" type="text" value="mobile no."  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /><br />
                                            <input name="email" class="small-box email" type="text" value="email id"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" /><br />
                                            <textarea class="small-box address" cols="30" rows="4"  name="discription" style="height:72px; margin-left:0;" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >home address</textarea>    
                                           	<input type="hidden" value="career" name="form" />
                                            <input type="submit" class="submit" value="submit" />
                                             
                                    </form>
						
                         <div class="clr"></div>
                         <div class="errormsg"></div>
                            <?php // echo do_shortcode('[contact-form-7 id="108" title="career"]'); ?>
                          </div>
                        
                          </div>  
                    </div>    
            
<?php endwhile; ?>
  <div class="clr"></div>
  <div class="line"></div>
  <!--testimonials-->
  
  <div class="testimonials">
    <div id="slideshow">
      <?php dynamic_sidebar('Footer Testimonial'); ?>
    </div>
  </div>
</div>
<div class="line"></div>

<script>
<!----------------------------------------------------  contact form validation start ------------------------------------->
	$(document).ready(function(){
		for (i = new Date().getFullYear(); i > 1900; i--)
			{
				$('.yearpicker').append($('<option />').val(i).html(i));
			}
		$("#career_form").submit(function() { 
			var a = $(".apply-form .location103").val();
			var b = $('.apply-form #theraphy101').next('.ui-combobox').find('.ui-autocomplete-input').val();
			var c = $(".apply-form .name1").val();
			var d = $(".apply-form .yr").val();
			var e = $(".apply-form .pgd").val();
			var f = $(".apply-form .pgdyr").val();
			var g = $(".apply-form .phone").val();
			var x = $(".apply-form .email").val();
			var i = $(".apply-form .address").val();
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if(a==" ")
			{
				$('.errormsg').html("please select location");
				$(".apply-form .location103").focus();
				return false;
			}
			else if (b=="--therapy area--")
			{
				$('.errormsg').html("please select therapy area");
				$(".apply-form .therapy").focus();
				return false;
			}
			else if (c=="name")
			{
				$('.errormsg').html("please enter your name");
				$(".apply-form .name1").focus();
				return false;
			}
			else if (d==" ")
			{
				$('.errormsg').html("year of graduating MBBS");
				$(".apply-form .yr").focus();
				return false;
			}
			else if (e=="post graduate degree")
			{
				$('.errormsg').html("please enter post graduate degree");
				$(".apply-form .pgd").focus();
				return false;
			}
			else if (f==" ")
			{
				$('.errormsg').html("please enter year of post graduate");
				$(".apply-form .pgdyr").focus();
				return false;
			}
			else if (g=="mobile no.")
			{
				$('.errormsg').html("please enter your mobile number");
				$(".apply-form .phone").focus();
				return false;
			}
			else if((isNaN(g)==true))
			{
				$('.errormsg').html("please enter digits only");
				$(".apply-form .phone").focus();
				return false;
			}
			else if(g.length!=10)
			{
				$('.errormsg').html("please enter 10 digit number ");
				$(".apply-form .phone").focus();
				return false;
			}
			else if (i=="home address")
			{
					$('.errormsg').html("please enter your home address");
					$(".apply-form .address").focus();
					return false;
			}
			else{
			var data = $(this).serializeArray();
			$('.loader').show();
			$.ajax({   
				type: "POST",
				dataType: "html",
				data: data, 
				cache: false,  
				url: "<?php echo bloginfo('template_url');?>/mail.php",   
				success: function(result)
				{
					$(".errormsg").html(result);
					$('.loader').hide();
				},
				error: function (x, y, z) {
					var a = x.responseText;
					$(".errormsg").html(a);
					$('.loader').hide();
				}
			});
			return false;
		}
	});
});
	</script>
<?php get_footer(); ?>
