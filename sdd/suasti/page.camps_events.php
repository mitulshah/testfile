<?php
/**
 * Template Name: Campus&Events Page
 */

get_header(); ?>

<div class="content">
  <div class="menu-title"><?php the_title(); ?></div>
<?php while ( have_posts() ) : the_post(); ?>  
  <?php the_content(); ?>
<?php endwhile; ?>
  <?php get_sidebar(); ?>

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

<?php get_footer(); ?>
