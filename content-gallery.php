<?php
/**
 * Gallery Content Template
 *
 * Template used to show posts with the 'gallery' post format.
 *
 * @package Seamless
 * @subpackage Template
 * @since 0.1.0
 * @author Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2011 - 2012, Justin Tadlock
 * @link http://themehybrid.com/themes/seamless
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

do_atomic( 'before_entry' ); // seamless_before_entry ?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // seamless_open_entry ?>

	<?php if ( is_singular() ) { ?>

		<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

		<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[post-format-link] published on [entry-published] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'seamless' ) . '</div>' ); ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'seamless' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="Tagged "]', 'seamless' ) . '</div>' ); ?>

	<?php } else { ?>

		<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'thumbnail' ) ); ?>

		<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

		<div class="entry-summary">
		<?php the_excerpt(); ?>
		
		<?php $count = seamless_get_image_attachment_count(); ?>
			
			<p class="image-count">
			
			<?php $count = apply_filters( 'seamless_gallery_count', sprintf( _n( 'This gallery contains %s image. ', 'This gallery contains %s images. ', $count, 'happy' ), $count ) ); 

				$date = apply_filters( 'seamless_gallery_more', sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
					    esc_url( get_permalink() ),
					    esc_attr( get_the_title() ),
					    __( 'View All Images &raquo; ', 'happy' )
					)
				);

				echo $count;
				echo $date; ?>
				
			</p>
		</div><!-- .entry-summary -->

		<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[post-format-link] published on [entry-published] [entry-permalink before="| "] [entry-comments-link before="| "] [entry-edit-link before="| "]', 'seamless' ) . '</div>' ); ?>

	<?php } ?>

	<?php do_atomic( 'close_entry' ); // seamless_close_entry ?>

</article><!-- .hentry -->

<?php do_atomic( 'after_entry' ); // seamless_after_entry ?>