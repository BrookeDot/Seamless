<?php
/**
 * Archive Template
 *
 * The archive template is the default template used for archives pages without a more specific template. 
 *
 * @package Seamless
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // seamless_before_content ?>

	<div id="content" role="main">

		<?php do_atomic( 'open_content' ); // seamless_open_content ?>

		<section class="hfeed">

			<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // seamless_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // seamless_open_entry ?>

						<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'thumbnail' ) ); ?>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

						<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', 'seamless' ) . '</div>' ); ?>

						<div class="entry-summary">
							<?php the_excerpt(); ?>
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'seamless' ), 'after' => '</p>' ) ); ?>
						</div><!-- .entry-summary -->

						<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'seamless' ) . '</div>' ); ?>

						<?php do_atomic( 'close_entry' ); // seamless_close_entry ?>

					</div><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // seamless_after_entry ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; ?>

		</section><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // seamless_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // seamless_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>