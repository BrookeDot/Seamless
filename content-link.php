<?php
/**
 * Content Template for the "Quote" post format
 *
 * Displays the "Quote" post format content to be called by get_template_part() in the various templates
 *
 * @package Seamless
 * @subpackage Template
 */
?>
<?php do_atomic( 'before_entry' ); // Before loop hook ?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // Open loop hook ?>

	<?php if ( get_the_title() ) { ?>
	
				<h2 class="post-title entry-title"><a href="<?php echo esc_url( seamless_url_grabber() ); ?>" title="<?php the_title_attribute(); ?>"><?php printf( '%s <span class="meta-nav">&rarr;</span>', the_title( '', '', false ) ); ?></a></h2>
	
	<?php } ?>

	<div class="entry-summary">
		<?php the_content(); ?>
	</div><!-- .entry-summary -->

	<?php get_template_part( 'loop', 'entry-meta' ); ?>

    <?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[post-format-link] published on [entry-published] [entry-permalink before="| "] [entry-comments-link before="| "] [entry-edit-link before="| "]', 'my-life' ) . '</div>' ); ?>

	<?php do_atomic( 'close_entry' ); // Close loop hook ?>

</article><!-- .hentry -->

<?php do_atomic( 'after_entry' ); // After loop hook ?>