<?php
/**
 * Template part for displaying posts.
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
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php eventr_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'eventr' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

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
