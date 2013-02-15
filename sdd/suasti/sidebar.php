<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */


if(is_page(11)){
	?>
	<div class="event-right">
    <div class="event-title">events archives </div>
    <div class="event-year"><br/>
		<?php 
				$a = 1;
				$unixtime = strtotime("now");
				$results = $wpdb->get_results("select * from wp_events where theend < $unixtime order by theend desc"); 
				foreach ($results as $result) 
				{
					$event = $result->theend;
					$year = date("Y",$event);
					$year_array[] = $year;
					
				}
				$year_array = array_unique($year_array);
					foreach ($year_array as $result) 
					{
						if($a==1)
						{
							echo '<a href="" id="'.$result.'" class="event_year active">'.$result.'</a><br/>';
						}
						else
						{
							echo '<a href="" id="'.$result.'" class="event_year">'.$result.'</a><br/>';
						}
						$a++;
					}
		?>
                
    </div>
    <div class="event-main">
	<div class="event10">
     	<?php     	
			
				foreach ($results as $result) 
				{
					$event = $result->theend;
					$year = date("Y",$event);
					$current_year = date("Y",$unixtime);
					$datetime = $result->thetime;
					$date = date("d M, Y",$datetime);
					if($year == $current_year)
					{	
						echo '<div class="event1">  <div class="event-head"><a href="'.$result->link.'">'.$result->title.'</a><br><span class="event-date">'.$date.'</span><div class="event-link"><a href="'.$result->link.'">view gallery</a></div></div> </div>'; 
					}
					
				}	
				
		?>
      </div>
    </div>
  </div>
<script>
$(document).ready(event_listing);
			function event_listing(){
				$('.event_year').click(update_list);
			}
			function update_list(){
				if($(this).hasClass('active')){
					
				}else{
					$('.event_year').removeClass('active');
					$(this).addClass('active');
				}
				var year=$(this).attr('id');
				//var data = $(year).serializeArray();
				var Data = "SearchString=" + year + "";
				var URL = "<?php bloginfo('template_url');?>/get_event.php";
			
				$.ajax({
					type: "POST",
					url: URL,
					processData: true,
					data: Data,
					dataType: "html",
					success: function (html) {
							$('.event10').html(html);
					},
					error: function (x, y, z) {
						var a = x.responseText;
					}
				});
				
				return false;
			}

</script>    
<?php
}
?>

