<?php
/**
 * The template for displaying search results pages
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row justify-content-center">

			<!-- Do the left sidebar check and opens the primary div -->
		<div class="col-md-10">


			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">

							<h1 class="page-title text-center azul">
								<?php
								printf(
									/* translators: %s: query term */
									esc_html__( 'Search Results for: %s', 'understrap' ),
									'<span>' . get_search_query() . '</span>'
								);
								?>
							</h1>

					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>


					<?php
					while ( have_posts() ) :


						the_post();

						get_template_part( 'loop-templates/content', 'search' );
					endwhile;
					 ?>


					<?php





					?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
		</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #search-wrapper -->

<style>
	article {display: inline-block;width: 49%; min-height: 200px;}
	.page-content #searchform .input-group  {    border: 1px solid gray;    padding: 0.5rem;    border-radius: 60px;}
	.page-content #searchform { width: 90%;  margin-left: 5%;}
.entry-title, .entry-title a {color:#3C4F81; }
.entry-summary .understrap-read-more-link {background-color: #81C43B;
    color: white!important;
    padding: .667em 1.333em;
    border-radius: 1.55em;
    margin-top: 1rem;}
</style>

<?php
get_footer();
