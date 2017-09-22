<?php global $tc_options
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package eventr
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer footer-blog">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-3 col-md-3 col-sm-6">
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('first-footer-widget-area') ) ?>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6">
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('second-footer-widget-area') ) ?>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                	<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('third-footer-widget-area') ) ?>
                </div>
            </div>
        </div>	
    
    	
		
	</footer><!-- #colophon -->
    
    <div class="subfooter">
        	<div class="container">
                <div class="row">
                    
                    <div class="col-lg-12">
						<?php
							wp_nav_menu( array(
								'menu'              => 'Footer',
								'theme_location'    => 'Footer',
								'depth'             => 1,
								'container'         => 'ul',
								'container_class'   => '',
								'container_id'      => 'nav',
								'menu_class'        => 'list-unstyled list-inline pull-right uppercase',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker())
								);
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
    


<?php wp_footer(); ?>

</body>
</html>

