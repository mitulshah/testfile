<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/style.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post();  $post = get_post(); ?>
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <a rel="example_group_<?php echo $post->ID; ?>"  class="example1" href='<?php echo $image[0]; ?>'>
	        	<?php the_post_thumbnail(); ?>
                </a>
                  <?php $post_meta = get_post_custom($post->ID);
				  		
				  		$i = 0;
						while($i < count($post_meta['images']))
						{ 
							if(isset($post_meta['images']) && $post_meta['images'] != '')
							{  
						?>
                            <a rel="example_group_<?php echo $post->ID; ?>"  class="example1" href='<?php  echo $post_meta['images'][$i]; ?>'></a>
                        <?php }  
						$i++;
					}  endif; endwhile; endif ;?>
		</div><!-- #content -->
	</div><!-- #primary -->

<script type="text/javascript">
  $(document).ready(function() {
  $(".example1").fancybox();
});
</script>

<?php // echo get_post_field('post_content', '55'); ?>
<?php get_footer(); ?>