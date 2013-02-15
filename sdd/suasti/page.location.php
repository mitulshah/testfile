<?php
/**
 * Template Name: location Page Template
 */
get_header(); ?>
<div class="content">
<?php while ( have_posts() ) : the_post(); ?>  
<div class="menu-title"><?php the_title(); ?></div>
<?php // the_content(); ?>

<?php

 
	$results = $wpdb->get_results( $wpdb->prepare("SELECT city FROM wp_connections_address"));
 	foreach ($results as $result) 
	{
       	echo '<div class="city_location"><div class="city">'.$result->city . '</div><br /><div class="clr"></div><div class="line"></div>';
	
	$results1 = $wpdb->get_results( $wpdb->prepare("SELECT wp_connections_address.line_1,wp_connections_address.line_2,wp_connections_address.line_3,wp_connections_address.city,wp_connections_address.zipcode,wp_connections_phone.number From wp_connections_address LEFT JOIN wp_connections_phone ON wp_connections_address.id=wp_connections_address.id where wp_connections_address.city='".$result->city."'"));
		foreach ($results1 as $result2) 
		{
       	 echo	'<div class="address1">';
		 echo 	'<div class="location-head">'.$result2->line_3.'</div>';
		 echo 	'<div class="location-contain">'.$result2->line_1.'<br/>';
         echo 	$result2->line_2.'<br/>';
         echo 	$result2->line_3.'<br/>';
         echo  	$result2->city.'<br/>';
         echo  	'T:'.$result2->number.'<p></p></div>';
		 echo 	'<div class="location-link"><a href="'.get_site_url().'/index.php/navi-mumbai-location/"> more info...</a></div>';
		 echo	'<p></p></div>';
			
	}
	echo '</div><div class="clr"></div><br/><br/><br/>';
	}
?>



<?php endwhile; ?>





  <!--testimonials-->
  <div class="testimonials"> 
    <!-- attach the plug-in to the slider parent element and adjust the settings as required -->
    <div id="slideshow">
      <?php dynamic_sidebar('Footer Testimonial'); 
					 //echo do_shortcode('[testimonialswidget_list]');
				?>
    </div>
  </div>
</div>
<div class="line"></div>

<?php get_footer(); ?>