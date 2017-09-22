<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package eventr
 */

get_header("blog"); ?>

	<div class="container">
		<div class="row">

			<div class="error-404 not-found col-lg-9">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'eventr' ); ?></h1>
				</header><!-- .page-header -->
				
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'TEXT_DOMAIN' ); ?></p>
				<?php get_search_form(); ?>
                
			</div><!-- .error-404 -->
            
            <div class="page-content col-lg-3">
					

					

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( eventr_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					
                    <div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'TEXT_DOMAIN' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div>
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'TEXT_DOMAIN' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div>

		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
