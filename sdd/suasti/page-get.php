<?php 
// Include WordPress
define('WP_USE_THEMES', false);
require('../../../wp-blog-header.php'); 
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

if($_POST['id']== 'all') 
{
$args = array('category__in' => array(9,10,11,12));
$query = query_posts($args); 
} else if($_POST['id']== 'family') {
$query = query_posts("category_name=familyphysicians"); 
} else if($_POST['id']== 'phys') {
$query = query_posts("category_name=Physiotherapist"); 
} else if($_POST['id']== 'gyna') {
$query = query_posts("category_name=Gynaecologists"); 
} else if($_POST['id']== 'paediatricians') {
$query = query_posts("category_name=Paediatricians"); 
} 

		$a=0;
		 foreach( $query as $recent ){
			 //echo'<pre>';print_r($recent);
				$mod = $a % 2;
				//the_post(); 
				if($mod == 0){ $return = "<div class='doctor-cell-1'>";}
				else{ $return = "<div class='doctor-cell-2'>";}
       
	   $a++; 
				$return .=  '<div class="doctor-image">';
				$img_url = wp_get_attachment_url( get_post_thumbnail_id($recent->ID) );
				if( $img_url != '') 
				{ 
					$return .= '<img src="'.$img_url.'" alt="photo" />';
				} else { 
					$return .=   '<img src="'.get_template_directory_uri().'/images/pic1.png" alt="Photo" />';
				} 
				$return .= '</div>';
				$return .= '<div class="doctor-contain"> ';
				$return .= '<div class="doctor-name">'.$recent->post_title.'</div>';
				$return .= '<div class="doctor-text">'.$recent->post_content.'</div></div></div>';
     
	 echo $return;
} 
?>