<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package eventr
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	
<?php
	global $tc_options; 
	global $wp_query;
?>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--  SEO -->
<?php if($tc_options['seo_desc']!=""){ ?>
<meta name="description" content="<?php echo esc_attr($tc_options['seo_desc']); ?>">
<?php } ?>

<?php if($tc_options['seo_keywords']!=""){ ?>
<meta name="keywords" content="<?php echo esc_attr($tc_options['seo_keywords']); ?>">
<?php } ?>


<link rel="shortcut icon" href="<?php echo esc_url($tc_options['favicon']['url']); ?>" type="image/png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url($tc_options['ipad_icon']['url']); ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url($tc_options['iphone_retina_icon']['url']); ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url($tc_options['ipad_retina_icon']['url']); ?>">


	
    
    
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="content" class="site-content">

        
        <!-- NAVIGATION -->
		<nav id="" class="navbar-custom-blog" role="navigation">
          <div class="container">
            
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
               <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" class="scroll-to">
				<?php if($tc_options['logo_image']['url']){ ?>
                    <img src="<?php echo esc_url($tc_options['logo_image']['url']); ?>" alt="<?php echo bloginfo('name'); ?>"/>
				<?php } else { ?>	
					<h3><?php echo esc_attr(__('eventr', 'TEXT_DOMAIN')); ?></h3>
				<?php } ?>
                </a>
            </div>
    
             <?php
            wp_nav_menu( array(
                'menu'              => 'Primary',
                'theme_location'    => 'Primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        		'container_id'      => 'nav',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
				);
			?>
            
            
            
          </div>
        </nav>