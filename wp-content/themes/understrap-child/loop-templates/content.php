<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
   
    <div class="post-thumbnail">
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	</div>
	<header class="entry-header">
        <div class="row mt-4">
    <div class="col-md-1">
	        <?php get_template_part('template', 'sharing-box'); ?>
	    </div>
	    
	    <div class="col-md-11 pl-4">
	        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->
	    </div>
	    
	</div>

		

	</header><!-- .entry-header -->

	

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->
	
	

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
