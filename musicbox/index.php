<?php
/*
Plugin Name: Approve Lyrics
Plugin URI: http://www.example.com
Description: A Plugin to upload music files at users end.
Version: 1.0
Author: Asit Vachhani
License: A "Slug" license name e.g. GPL2
*/?>
<?php
add_action( 'admin_menu', 'my_plugin_menu' );

function my_plugin_menu() {

//	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); 
	add_menu_page( 'Approve Lyrics', 'Approve Lyrics', 'manage_options', 'approve_lyrics', 'musicbox_options');
//	add_submenu_page( 'my-top-level-handle', 'Page title', 'Sub-menu title', 'manage_options', 'my-submenu-handle', 'my_magic_function');
	
}

function musicbox_options(){
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	// create table
	global $wpdb;
	$table_name = $wpdb->prefix . "musicbox_master";
	$table_name2 = $wpdb->prefix . "musicbox_vote";
	$table_name3 = $wpdb->prefix . "musicbox_user";
	
	$sql = " CREATE TABLE IF NOT EXISTS `$table_name` (
		  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		  `name` varchar(100),
		  `user_name` varchar(100),
		  `path` varchar(1000),
		  `fb_link` varchar(1000),
		  `votes` int(100) DEFAULT '0',
		  `voteUp` int(100) DEFAULT '0',
  		  `voteDown` int(100) DEFAULT '0',
		  `approved` enum('0','1'),
		  `shared` enum('0','1'),
		  `token` varchar(1000),
		  `fb_id` varchar(255),
		  `email` varchar(255),
  		  `category` varchar(255),
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ; ";
	$wpdb->query($sql);
	$sql2 = " CREATE TABLE IF NOT EXISTS `$table_name2` (
		  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		  `song_id` int(100) DEFAULT '0',
		  `IP_ADDRESS` varchar(255),
	   	  `vote` int(100) DEFAULT '0',
		  `vote_up` int(100) DEFAULT '0',
  		  `vote_down` int(100) DEFAULT '0',		  
		  `updated_at` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ; ";
	$wpdb->query($sql2);
	$sql3 = " CREATE TABLE IF NOT EXISTS `$table_name3` (
		  `id` bigint(20),
		  `uname` varchar(100) DEFAULT '0',
		  `email` varchar(255),
		  `country` varchar(100)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ; ";
	$wpdb->query($sql3);
	admin_interface();

}
function admin_interface(){
				global $wpdb;
				$table_name = $wpdb->prefix . "musicbox_master";
				$querystr = "SELECT * FROM $table_name order by id desc ";
				$pageposts = $wpdb->get_results($querystr, ARRAY_A);
				echo '<table width="900" class="listing" cellpadding="10px">';
				echo '<tr style="background-color:#ececec">';
					echo '<th>Play Song</th>';
					echo '<th>Song</th>';
					echo '<th>Uploaded By</th>';
					echo '<th>FB LINK</th>';
					echo '<th>Approve</th>';
					echo '<th>Share</th>';
					echo '<th>Delete</th>';
				echo '</tr>';
				foreach($pageposts as $listing){
					echo '<tr align="center">';
					echo '<td class="playSong"><audio controls style="width:300px;"><source src="'.$listing['path'].'"></audio></td>';
					echo '<td class="Songname" style="text-align:left;">'.$listing['name'].'</td>';
					echo '<td class="username1">'.$listing['user_name'].'</td>';
					echo '<td>'.$listing['fb_link'].'</td>';
					if($listing['approved'] == 0){
						echo '<td class="approved"><div class="getEmail" style="display:none">'.$listing['email'].'</div><input type="button" data="'.$listing['id'].'" value=" Approve "  class="approve_link" id="appr_'.$listing['id'].'"/></td>';
					}else{
						echo '<td class="approved">Approved</td>';
					}
					if($listing['shared'] == 0){
						echo '<td class="share"><input type="button" data="'.$listing['id'].'" value=" Share "  class="share_link" id="share_'.$listing['id'].'"/></td>';
					}else{
						echo '<td class="share">Shared</td>';
					}
					echo '<td><input type="button" id="'.$listing['id'].'" value="Delete" class="Delete" ></button></td>';
					echo '</tr>';
				}
				echo '</table><br><br>';
				echo '<div class="StoreVoteID" style="display:none;" ></div>';
?>
<script>
jQuery('.approve_link').click(function() {
		var val = jQuery(this).attr('data');
	 	getId = jQuery(this).attr('id');
		jQuery(".StoreVoteID").html(getId);
		Getmail = jQuery(this).parent().find(".getEmail").html();
		username =  jQuery(this).parent().parent().find(".username1").html();
		Songname =  jQuery(this).parent().parent().find(".Songname").html();
		
		var site_url = "<?php echo get_site_url();?>/vote.php";
		jQuery.ajax({ 
			url: site_url,
			data: {approve: val, email: Getmail, username:username, Songname:Songname},
			type: 'post',
			success: function(output) {
					myID = jQuery(".StoreVoteID").html();
					myhash = '#' + myID;
					jQuery(myhash).parent().html('Approved');
			}
		});
});
jQuery('.share_link').click(function() {
		var val = jQuery(this).attr('data');
	 	getId = jQuery(this).attr('id');
		jQuery(".StoreVoteID").html(getId);
		var site_url = "<?php echo get_site_url();?>/vote.php";
		jQuery.ajax({ 
			url: site_url,
			data: {share: val},
			type: 'post',
			success: function(output) {
 					myID = jQuery(".StoreVoteID").html();
					myhash = '#' + myID;
					jQuery(myhash).parent().html('Shared');

			}
		});
});

jQuery('.Delete').click(function() {

		var del=confirm("Are you sure you want to delete this record?");
    	if (del==true){
			DeleteId = jQuery(this).attr("id");
			var site_url = "<?php echo plugins_url(); ?>/musicbox/delete.php";
			jQuery.ajax({ 
				url: site_url,
				data: {data: DeleteId},
				type: 'post',
				success: function(output) {
					alert(output);
					location.reload();
				}
			});
	}
});
</script>
<?php }