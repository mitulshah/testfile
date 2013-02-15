<?php
/**
 * Template Name: In The News Page Template
 */

get_header(); ?>

<div class="content">

<div class="in-the-news">	
	        
            	<div class="menu-title">in the news</div>
        		<?php //dynamic_sidebar('In the news page'); ?>
                <?php while ( have_posts() ) : the_post(); ?>  
					<?php the_content(); ?>
				  	<div class="clr"></div>
				<?php endwhile; ?>
                <div class="year">
				<?php //wp_get_archives('type=yearly'); ?>
                </div>
            	<div class="news-main">
                
                        <div class="news-item">
                                <?php $args = array(
									'numberposts' => 10,
									'category' => 6,
									'orderby' => 'post_date',
									'order' => 'DESC',
									'post_type' => 'post'
									); ?>
                                    
                                <?php $recent_posts = wp_get_recent_posts( $args ); 
                                
                                foreach( $recent_posts as $recent ){	
									$category = get_the_category( $recent['ID'] );
									$cat_name = $category[0]->cat_name;
								?>
                                   <div class="news-main1">
                                    <div class="news1"><a href="<?php echo $recent['guid'] ?>"><?php echo $recent["post_title"] ?></a></div>     
                                    <div class="news-detail"> <?php the_time("F j, Y"); ?> | <?php echo $cat_name; ?> </div>		 
                                    </div>
								<?php 
									}
									//echo"<pre>";
									//print_r($recent);
                                ?>
                        </div>
            
					</div>            
            </div>

  <div class="clr"></div>
  <div class="line"></div>
  
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

<!--content-->

<?php get_footer(); ?>
