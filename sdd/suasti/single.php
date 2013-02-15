<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="content">
<div class="post-title"><?php the_title(); ?></div>
<div class="blog_content">
<?php 
	echo the_content();
?>
</div>
</div><!-- #primary -->
<?php endwhile; ?>

<div class="clr"></div>
<div class="line"></div>

<!--testimonials-->
    <div class="testimonials"> 
          <div id="slideshow">
            	<?php dynamic_sidebar('Footer Testimonial'); ?>
      	  </div>
    </div>
  <!--testimonials-->
  <div class="line"></div>
  
<?php get_footer(); ?>