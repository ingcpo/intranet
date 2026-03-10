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

   <style>
       .entry-header {position: relative;}
       .post-thumbnail {display: none;}
       .entry-header h1 {font-size: 50px!important; margin-top: 4rem;}
/*       .entry-meta {color: white!important;}*/
    </style>
	<header class="entry-header">
    <div class="post-thumbnail">
	<?php echo '<img src="' . get_stylesheet_directory_uri() . '/img/header-polinotas.jpg" alt="">'; ?>
	</div>
        <div class="row mb-4">

	    <div class="col-md-6">
	        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
Publicada el <?php echo the_date(); ?>, por <?php echo get_the_author(); ?>
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
