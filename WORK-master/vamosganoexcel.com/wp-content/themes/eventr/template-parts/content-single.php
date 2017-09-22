<?php
/**
 * Template part for displaying single posts.
 *
 * @package eventr
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="tc_media">
	<?php if(has_post_format('image')){ ?>
		<?php $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id()); ?>
        <img class="img-responsive" src="<?php  echo esc_url($thumbnail_url); ?>" alt="">
    <?php } else if(has_post_format('audio')){ ?>
        <div class="post-format-audio">
            <?php echo wp_oembed_get(get_post_meta(get_the_id(), "_cmb_embed_media", true)); ?>
            <div style="clear:both;"></div>
        </div>
    <?php } else if(has_post_format('video')){ ?>
        <div class="post-format-video">
            <?php echo wp_oembed_get(get_post_meta(get_the_id(), "_cmb_embed_media", true)); ?>
        </div>
    <?php } else if(has_post_format('link')){ ?>
            <?php the_content(); ?>
    <?php } else { ?>	                                   
        <?php $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id()); ?>
        <img class="img-responsive" src="<?php  echo esc_url($thumbnail_url); ?>" alt="">
    <?php } ?>
	</div>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="entry-meta">
			<?php eventr_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eventr' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php eventr_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

