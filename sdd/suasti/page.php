<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div class="content">
<?php while ( have_posts() ) : the_post(); ?>  
<div class="menu-title"><?php the_title(); ?></div>
<?php the_content(); ?>

  <div class="clr"></div>
  <div class="line"></div>
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