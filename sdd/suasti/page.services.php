<?php
/**
 * Template Name: Services Page
 */

get_header(); ?>

<div class="content"> 
  <script>
    $(function() {
        $( "#services-tabs" ).tabs();
    });
    </script> 
  <!--what we do-->
  <div id="services-tabs">
    <div class="services-main">
      <ul class="services-menu">
        <li id="service-imgage1" ><a  href="#physician" class="#service-imgage1-active">FAMILY PHYSICIAN</a></li>
        <li id="service-imgage2"><a href="#PHYSIOTHERAPIST">PHYSIOTHERAPIST</a></li>
        <li id="service-imgage4"><a href="#PAEDIATRICIAN">PAEDIATRICIAN</a></li>
        <li id="service-imgage3"><a href="#GYNAECOLOGIST">GYNAECOLOGIST</a></li>
        <li id="service-imgage5"><a href="#BLOOD">BLOOD COLLECTION</a></li>
        <li id="service-imgage6"><a href="#ONLINE">SUASTI ONLINE</a></li>
      </ul>
      <div class="service-des" id="physician">
        <div class="des-image"> 
		<?php if ( has_post_thumbnail(112) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(112), 'single-post-thumbnail' );
				echo '<img src="'.$image[0].'"/>';
		} ?>
        
        </div>
        <div class="services-description">
          <div class="description-head"><?php echo get_the_title('112'); ?></div>
          <div class="description-des"><?php echo get_post_field('post_content', '112'); ?> </div>
        </div>
      </div>
      <?php wp_reset_query(); ?>
      
      <div class="service-des" id="PHYSIOTHERAPIST">
        <div class="des-image"> 
		<?php if ( has_post_thumbnail(115) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(115), 'single-post-thumbnail' );
				echo '<img src="'.$image[0].'"/>';
		} ?>
        </div>
        <div class="services-description">
          <div class="description-head"><?php echo get_the_title('115'); ?></div>
          <div class="description-des"><?php echo get_post_field('post_content', '115'); ?> </div>
        </div>
      </div>
      <?php wp_reset_query(); ?>
      
      <div class="service-des" id="PAEDIATRICIAN">
        <div class="des-image"> 
		<?php if ( has_post_thumbnail(122) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(122), 'single-post-thumbnail' );
				echo '<img src="'.$image[0].'"/>';
		} ?></div>
        <div class="services-description">
          <div class="description-head"><?php echo get_the_title('122'); ?></div>
          <div class="description-des"><?php echo get_post_field('post_content', '122'); ?> </div>
        </div>
      </div>
      <?php wp_reset_query(); ?>
        
      <div class="service-des" id="GYNAECOLOGIST">
        <div class="des-image"> 
		<?php if ( has_post_thumbnail(120) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(120), 'single-post-thumbnail' );
				echo '<img src="'.$image[0].'"/>';
		} ?></div>
        <div class="services-description">
          <div class="description-head"><?php echo get_the_title('120'); ?></div>
          <div class="description-des"><?php echo get_post_field('post_content', '120'); ?> </div>
        </div>
      </div>
      <?php wp_reset_query(); ?>
      
            <div class="service-des" id="BLOOD">
        <div class="des-image"> 
		<?php if ( has_post_thumbnail(124) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(124), 'single-post-thumbnail' );
				echo '<img src="'.$image[0].'"/>';
		} ?></div>
        <div class="services-description">
          <div class="description-head"><?php echo get_the_title('124'); ?></div>
          <div class="description-des"><?php echo get_post_field('post_content', '124'); ?> </div>
        </div>
      </div>
      <?php wp_reset_query(); ?>
        
      <div class="service-des" id="ONLINE">
        <div class="des-image"> 
		<?php if ( has_post_thumbnail(126) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(126), 'single-post-thumbnail' );
				echo '<img src="'.$image[0].'"/>';
		} ?></div>
        <div class="services-description">
          <div class="description-head"><?php echo get_the_title('126'); ?></div>
          <div class="description-des"><?php echo get_post_field('post_content', '126'); ?> </div>
        </div>
      </div>  
      <?php wp_reset_query(); ?>
        
        
      </div>
    </div>

  <div class="clr"></div>
  <div class="line"></div>
  <!--testimonials-->
  <div class="testimonials">
    <div id="slideshow">
      <?php dynamic_sidebar('Footer Testimonial'); ?>
    </div>
  </div>
</div>
<!--testimonials-->
<div class="line"></div>
<!--content-->

<?php get_footer(); ?>
