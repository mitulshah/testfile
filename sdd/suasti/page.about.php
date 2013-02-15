<?php
/**
 * Template Name: About Page Template
 */

get_header(); ?>
<div class="content">
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>

            <!--what we do-->
        <div id="tabs">
            <div class="what">
                <div class="what-title">suasti - family medical centre</div>
                
                <ul class="who">
                    <li><a href="#about-text" class="who-active">who we<br  /> are</a></li>
                    <li><a href="#our_doctors" id="our_doctor">our <br  /> doctor's</a></li>
                    <li><a href="#our_team">our<br />team</a></li>
                    <li><a href="#our_adviser">our<br /> advisors</a></li>
                    <li><a href="#our_partner">our partners</a></li>
                </ul>
            </div>
            <!--what we do-->
        
        	<div id="about-text">
            	<?php echo get_post_field('post_content', '55'); ?>
            </div>
            
            <!--   Jquery use in footer for combobox -->
             
            <div id="our_doctors" class="doctor">
            	<?php // echo get_post_field('post_content', '57'); ?>
             
                <div class="combobox-width">
                 <form id="select_doctor">
                    <select id="doctor" name="doctor">
                        <option value="all">All doctors </option>
                        <option value="family">Family Physician</option>
                        <option value="phys">Physiotherapist</option>
                        <option value="paediatricians">Paediatrician (Child Specialists)</option>
                        <option value="gyna">Gynaecologist</option>
                    </select>
                </form>
                </div>
                <div id="divcontent2">
				<?php 
                $args = array('category__in' => array(9,10,11,12));
                query_posts($args); ?>
                <?php	if ( have_posts() )
					{ 
						$a=0;
						while ( have_posts() ) 
						{	
							$mod = $a % 2;
							the_post(); 
				
							if($mod == 0){echo "<div class='doctor-cell-1'>";}
							else{echo "<div class='doctor-cell-2'>";}
					   
					   $a++; 
					   ?>
							<div class="doctor-image">
							<?php if( has_post_thumbnail() ) 
							{ ?>
								<?php the_post_thumbnail();
							} else { ?>
								<img src="<?php bloginfo('template_url'); ?>/images/pic1.png" alt="Photo" />
							<?php } ?>
							</div>
							<div class="doctor-contain"> 
								<div class="doctor-name"><?php the_title(); ?></div>
								<div class="doctor-text"> <?php the_content(); ?> </div>
							</div>
						</div>     
						
				<?php  } } ?>

  
    </div>
    		<div id="divcontent"></div>
            </div>
            
            <div id="our_team" class="team">
            	<?php echo get_post_field('post_content', '59'); ?>	
            </div>
            
            <div id="our_adviser" class="adviser">
            	<?php echo get_post_field('post_content', '61'); ?>
     		</div>
            
            <div id="our_partner" class="partner">
				<?php echo get_post_field('post_content', '63'); ?>
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