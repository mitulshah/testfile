<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

         <div class="content">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php
						printf( __( 'Category Archives: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
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
