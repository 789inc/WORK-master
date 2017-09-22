<?php
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);

  /**
  Do stuff like connect to WP database and grab user set values
  */

  header('Content-type: text/css');
  header('Cache-control: must-revalidate');
  
  function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb; // returns an array with the rgb values
}
  
  
  global $tc_options;
  
  $main_color= $tc_options['theme_color'];
  $menu_color = $tc_options['menu_color'];
  $menu_item_color = $tc_options['menu_item_color'];
  $menu_item_hover_color = $tc_options['menu_item_hover_color'];
  
  $overlay = hex2rgb($tc_options['theme_color']);

  
  
  
  ?>
  
  


.owl-theme .owl-controls .owl-page span {
	background:<?php echo esc_attr($main_color); ?>;
}


.navbar-custom .navbar-nav > li > a:hover,
.navbar-custom-blog .navbar-nav > li > a:hover {
	color:<?php echo esc_attr($menu_item_hover_color); ?>;
}

.navbar-custom .navbar-nav > li > a:active,
.navbar-custom .navbar-nav > li > a:focus,
.navbar-custom-blog .navbar-nav > li > a:active,
.navbar-custom-blog .navbar-nav > li > a:focus, {
	color:<?php echo esc_attr($main_color); ?>;
}

.navbar-custom .icon-bar,
.navbar-custom-blog .icon-bar {
	background:<?php echo esc_attr($main_color); ?>;
}




.is-sticky .navbar-custom {
	background:<?php echo esc_attr($menu_color); ?>;
}


.sticky-wrapper a,
.is-sticky a {
	color:<?php echo esc_attr($menu_item_color); ?>;
}

.sticky-wrapper a:hover,
.is-sticky a:hover {
	color:<?php echo esc_attr($menu_item_hover_color); ?>;
}


#highlight .right {
	background:<?php echo esc_attr($main_color); ?>;
}


#info i {
	color:<?php echo esc_attr($main_color); ?>;
}

.speaker-thumb h4:after {
 	background-color: <?php echo esc_attr($main_color); ?>;
}

.speaker-thumb .company {
	font-family:<?php echo esc_attr($tc_options['typo_body']['font-family'])?>;
}

#program {
	background:<?php echo esc_attr($main_color); ?>;
}


#download h3:after {
 	background-color: <?php echo esc_attr($main_color); ?>;
}


#venue h2:after {
 	background-color: <?php echo esc_attr($main_color); ?>;
}


#hotels h3:after {
 	background-color: <?php echo esc_attr($main_color); ?>;
}

#venue i {
	color:<?php echo esc_attr($main_color); ?>;
}

#hotels h3:after {
 	background-color: <?php echo esc_attr($main_color); ?>;
}


.price-table {
	background:<?php echo esc_attr($main_color); ?>;
}


#testimonial {
	background:<?php echo esc_attr($main_color); ?>;
}

.sponsor {
	border:2px solid <?php echo esc_attr($main_color); ?>;
}

#sponsors i {
	color:<?php echo esc_attr($main_color); ?>;
}

#footer h4:after {
 	background-color: <?php echo esc_attr($main_color); ?>;
}

#preload {
	background:<?php echo esc_attr($main_color); ?>;
}



.owl-theme .owl-controls .owl-buttons div {
	color: <?php echo esc_attr($main_color); ?>;
}

.owl-theme .owl-controls .owl-page span {
	background:<?php echo esc_attr($main_color); ?>;
}





.wrap .overlay:after {
	background: none repeat scroll 0 0 rgba(<?php echo esc_attr($overlay[0]); ?>,<?php echo esc_attr($overlay[1]); ?>, <?php echo esc_attr($overlay[2]); ?>, 0.7);
}
	

.wrap .overlay:before {
	background: none repeat scroll 0 0 rgba(<?php echo esc_attr($overlay[0]); ?>,<?php echo esc_attr($overlay[1]); ?>, <?php echo esc_attr($overlay[2]); ?>, 0.7);
}

