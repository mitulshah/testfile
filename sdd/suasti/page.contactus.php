<?php
/**
 * Template Name: Contact Us Template
 */

// Enqueue showcase script for the slider
wp_enqueue_script( 'twentyeleven-showcase', get_template_directory_uri() . '/js/showcase.js', array( 'jquery' ), '2011-04-28' );

get_header(); ?>
<div class="content">
<?php while ( have_posts() ) : the_post(); ?>  
<div class="menu-title"><?php the_title(); ?></div>
<div class="contact-left"> 
<?php the_content(); ?>
	<div class="contact-form">                          
        <form name="contact_us" action="" method="post" id="contact_us" >
        	<input type="text" name="name" value="name" class="contact-box name"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
            <input type="text" name="email" value="email" class="contact-box email"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
            <input type="text" name="phone" value="phone no." class="contact-box phone"  onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
            
            <textarea  name="query" class="add-box query" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" >enter your query</textarea>
            <input type="hidden" value="contactus" class="cntctus" name="contactus" />
            <input type="submit" class="send-query" value="submit" />
		</form>
        <br /><br /><br />
         <div class="errormsg"></div>
         
	</div>        
</div>
  <div class="clr"></div>
  <div class="line"></div>
<?php endwhile; ?>
  <!--testimonials-->
  <div class="testimonials"> 
    <!-- attach the plug-in to the slider parent element and adjust the settings as required -->
    <div id="slideshow">
      <?php dynamic_sidebar('Footer Testimonial'); ?>
    </div>
  </div>
</div>
<div class="line"></div>
<script>
$("#contact_us").submit( function () {   
	var a = $(".contact-form .name").val();
	var c = $(".contact-form .phone").val();
	var d = $(".contact-form .query").val();
	if(a=="name")
	{
		$('.errormsg').html("please enter your name");
		$(".contact-form .name").focus();
		return false;
	}
	else if(c=="phone no.")
	{
		$('.errormsg').html("please enter phone no.");
		$(".contact-form .phone").focus();
		return false;
	}
	else if(isNaN(c)==true)
	{
		$('.errormsg').html("please enter digit only");
		$(".contact-form .phone").focus();
		return false;
	}
  else if(c.length!=10)
	{
		$('.errormsg').html("please enter 10 digit");
		$(".contact-form .phone").focus();
		return false;
	}
	else if(d=="enter your query")
	{
		$('.errormsg').html("please enter your query");
		$(".contact-form .query").focus();
		return false;
	}
	else 
	{
		var Data = $(this).serializeArray(); //"name=" + a+ "&email="+b+"&phone="+c+"&query="+d+"&contactus="+e;
		var URL = "<?php echo bloginfo('template_url');?>/mail.php";
		$('.loader').show();
		$.ajax({
			type: "POST",
			url: URL,
			processData: true,
			data: Data,
			dataType: "html",
			success: function (html) {
				$('.loader').hide();
				$(".errormsg").html(result);
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

</script>
<?php get_footer(); ?>