<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php print base_path() . path_to_theme() .'/default.css' ?>" type="text/css" rel="stylesheet" />
<!--[if lt IE 10]>
<style>
.navigation ul li ul{
	margin:23px 0 0 -110px;
	z-index:10;
}
</style>
<![endif]--> 
</head>
<body  onLoad="initialize()">
 <!--wrapper-->
 <div class="wrapper">
	<!--container-->
	<div class="container">
    	<!--header-->
        <div class="header">
        	<div class="logo">
				<?php if ($logo): ?>
              		<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                    	<img src="<?php  print $logo; ?>" alt="<?php print t('Home'); ?>" /> 
                    </a>
              	<?php endif; ?>
            </div>
			<div class="right-sidebar">
				<div class="tag-line-1">
                   
                    <?php $path = $GLOBALS['base_url']; ?>
                    <a href="<?php echo $path.'/contact-us/'; ?>" title="<?php print t('Contact Us'); ?>" rel="contact us" > 
                        <?php print '<img src="'.base_path() . path_to_theme() .'/images/email.png" alt="img" />'; ?> 
                    </a> 
                     <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" > 
                        <?php print '<img src="'.base_path() . path_to_theme() .'/images/home_ico.png" alt="img"/>'; ?> 
                    </a>
                </div>
                <div style="clear:both;"></div>
				<div class="tag-line"> <?php  echo $tagline = views_embed_view('tag_line_images');  ?> </div>
			</div>
		</div>
        <!--header-->
    </div>
    <!--container-->        
	<!--contain-->
	<div class="contain">
 			<?php if($is_front) { ?>
            	<div class="banner">
    	        <div class="metal-left-corner"> <?php print '<img src="'.base_path() . path_to_theme() .'/images/left-matel.png" alt="img" />'; ?> </div>
	            <div class="metal-right-corner"> <?php print '<img src="'.base_path() . path_to_theme() .'/images/right-metal.png" alt="img" />'; ?> </div>
  				<div class="banner-img"> <?php  echo $slider = views_embed_view('home_slider');  
			} else { ?>
            	<div class="banner-1">
    	        <div class="metal-left-corner"> <?php print '<img src="'.base_path() . path_to_theme() .'/images/left-matel.png" alt="img" />'; ?> </div>
	            <div class="metal-right-corner"> <?php print '<img src="'.base_path() . path_to_theme() .'/images/right-metal.png" alt="img" />'; ?> </div>
    			<div class="banner-img"> <?php // print '<img src="'.base_path() . path_to_theme() .'/images/banner-1.jpg">';  
				echo $img = views_embed_view('inner_page_slider'); 
			}  ?>
    		</div>
        </div>
    		<!--navigation-main-->
		<div class="navigation">
      		<?php $menu = theme('nice_menus', array('id' => 0, 'direction' => 'down', 'depth' => 3, 'menu_name' => 'main-menu', 'menu' => NULL));
            print $menu['content']; ?>
    	</div>        	
            <!--navigation-main-->

		<div class="content-wrapper"> 
			<!--contian-left-->
            <div style="display:none;" id="caption_storage"></div>
			<div class="contian-left">
				<?php if ($messages): ?>
                <div id="messages"><div class="section clearfix">
                  <?php print $messages; ?>
                </div></div> <!-- /.section, /#messages -->
                <?php endif; ?>

               <?php if($is_front) { } else { ?>
				<div class="contain-head">
					<h1><?php print $title; ?></h1>
				</div>
                <?php } ?>
                <div class="con-left-text">
            	<?php if ($title == 'Testimonial')
					{ $test = views_embed_view('testimonial'); print $test;
					} else if($title == 'Rehabilitation')
					{ $rehab = views_embed_view('rehabilitation'); print $rehab;	
					} else if($title == 'Announcements')
					{ $announcements = views_embed_view('announcements_page'); print $announcements;	
					}else if($title == 'Image Gallery')
					{ ?>

                    <script src="<?php  print base_path() . path_to_theme() .'/js/jquery-cycle.js' ?>"></script>
					<script>
					jQuery(document).ready(function(){
						var src= [];
						jQuery(".field-name-field-image-gallery .field-item").each(function(){
							src.push(jQuery(this).find('img').attr('src'));
						});
						var i=0;
						jQuery('.field-name-field-image-gallery .field-items').after('<div id="prev2"></div><div id="next2"></div><div class="caption"></div><ul id="nav">').cycle({ 
							fx:     'fade', 
							pause:  1,
							speed:  'fast', 
							timeout: 0, 
							prev:   '#prev2',
							next:   '#next2', 
							pager:  '#nav', 
							after:  function() {
								//var temp = jQuery(this).attr('title');
								jQuery('#caption_storage').html(this.innerHTML);
								var temp = jQuery('#caption_storage img').attr('title');
								//alert(temp);
								jQuery('.caption').html(temp);
							},
							pagerAnchorBuilder: function(idx, slide) { 
								while(i <= src.length){
									i++;									 
									return '<li><a href="#" class="image_gallery_thumb">'+slide.innerHTML+'</a></li>'; 
								}
							} 
						});
					});
					</script>
					<?php
					$photo = views_embed_view('photo_tour'); print $photo;	
					} else if($title == 'Direction')
							{
								$rehab = views_embed_view('direction'); print $rehab; ?>
								<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
                                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
                                <script>
                                      var directionDisplay;
                                      var directionsService = new google.maps.DirectionsService();
                                      var map;
                                
                                      function initialize() {
                                        directionsDisplay = new google.maps.DirectionsRenderer();
                                        var chicago = new google.maps.LatLng(41.850033, -87.6500523);
                                        var mapOptions = {
                                          zoom:7,
                                          mapTypeId: google.maps.MapTypeId.ROADMAP,
                                          center: chicago
                                        }
                                        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                                        directionsDisplay.setMap(map);
                                        
                                        
                                		// autocomplete starts here		
                                        var input = document.getElementById('start');
                                        var autocomplete = new google.maps.places.Autocomplete(input);
                                        autocomplete.bindTo('bounds', map);
                                        google.maps.event.addListener(autocomplete, 'place_changed', function() {
                                          var place = autocomplete.getPlace();
                                          if (!place.geometry) {
                                            // Inform the user that the place was not found and return.
                                            input.className = 'notfound';
                                            return;
                                          }
                                        });
                                        
                                        var input1 = document.getElementById('end');
                                        var autocomplete1 = new google.maps.places.Autocomplete(input1);
                                        autocomplete1.bindTo('bounds', map);
                                        google.maps.event.addListener(autocomplete1, 'place_changed', function() {
                                          var place1 = autocomplete1.getPlace();
                                          if (!place1.geometry) {
                                            // Inform the user that the place was not found and return.
                                            input.className = 'notfound';
                                            return;
                                          }
                                        });
                                        
                                
                                        // Sets a listener on a radio button to change the filter type on Places
                                
                                        // Autocomplete.
                                        function setupClickListener(id, types) {
                                          var radioButton = document.getElementById(id);
                                          google.maps.event.addDomListener(radioButton, 'click', function() {
                                            autocomplete.setTypes(types);
                                          });
                                        }
                                
                                        setupClickListener('changetype-all', []);
                                        setupClickListener('changetype-establishment', ['establishment']);
                                        setupClickListener('changetype-geocode', ['geocode']);
                                      
                                //autocomplete ends here      
                                        var control = document.getElementById('control');
                                        control.style.display = 'block';
                                        map.controls[google.maps.ControlPosition.TOP].push(control);
                                      }
                                      google.maps.event.addDomListener(window, 'load', initialize);
                                      
                                      function calcRoute() {
                                        jQuery("#map-canvas").css('visibility','visible');
                                        var start = document.getElementById('start').value;
                                        var end = document.getElementById('end').value;
                                        var request = {
                                            origin:start,
                                            destination:end,
                                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                                        };
                                        directionsDisplay.setPanel(document.getElementById('directions-panel'));
                                        directionsService.route(request, function(response, status) {
                                          if (status == google.maps.DirectionsStatus.OK) {
                                            directionsDisplay.setDirections(response);
                                          }
                                        });
                                      }
                                      </script>
    
                                      <h2 style="text-align:center"> Get your Direction </h2>
                                      <br><hr />
                                      <table width="100%" border="0">
                                      	<tr>
                                              <td><h2>Start:</h2>
                                              </td><td><h2>End: </h2>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td> <input type="text" id="start" class="form-text1" ></td>
                                              <td> <input type="text"  id="end" class="form-text1"></td>
                                          </tr>
                                          <tr>
                                          	<td><input type="button" onclick="calcRoute();" value="Submit" class="submit-map" /></td>
                                      		<td></td>
                                      	</tr>
                                      </table>                
                                <div id="map-canvas" style="top:30px; margin-bottom:50px; visibility:hidden;"></div>
                                <div id="directions-panel"></div>
                                <?php } else { print render($page['content']); } ?>
						</div>
				</div>
                <!--contian-left-->
                <!--contian-right-->
                <div class="contian-right">
                    <div class="right-head">
                        <h2> <a href="<?php echo $path.'/announcements/'; ?>" title="<?php print t('Announcements'); ?>" rel="announcements"  style="color: #076324 !important; font-family: BookAntiqua-BoldItalic; line-height: 22px; font-size:18px;"> 
                        Announcements
                        </a>
                        </h2>
                    </div>
                    <div class="right-detail-main">
                    <?php $var_mn_news = views_embed_view('latest_news'); 	print $var_mn_news; ?>
                    </div>
                </div>
			<!--contian-right-->
		</div>    
 	</div>
	<!--contain-->
    <div class="steel-wrapper">
        <div class="bottom-left-metal"> <?php print '<img src="'.base_path() . path_to_theme() .'/images/bottom-left-metal.png" alt="img" />'; ?> </div>
        <div class="bottom-right-metal"> <?php print '<img src="'.base_path() . path_to_theme() .'/images/bottom-right-metal.png" alt="img" />'; ?> </div>
    </div>
    <div class="container">
        <div class="footer"> <?php print render($page['footer']); ?> </div>
    </div>
 </div>
 <!--wrapper-->
</body>
</html>
