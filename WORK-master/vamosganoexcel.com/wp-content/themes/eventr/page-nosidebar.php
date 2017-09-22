<?php
/**
 * Template Name: Page with no sidebar
 * @package eventr
 */

get_header("blog"); ?>

	<div id="primary" class="container">
		<div class="row">

			<div class="col-lg-12">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</div><!-- #main -->
	<!-- #primary -->


</div>
</div>
<?php get_footer(); ?>
