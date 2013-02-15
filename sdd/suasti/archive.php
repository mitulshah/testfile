<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

         <div class="content">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'twentyeleven' ); ?>
						<?php endif; ?>
					</h1>
				</header>
				<br />

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                    <div class="post-title"><?php the_title(); ?></div>
                    <div class="blog_content">
                    <?php 
                        echo the_content();
                    ?>
                    </div>

				<?php endwhile; ?>


			<?php else : ?>
	
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>

			<?php endif; ?>

			</div><!-- #content -->

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