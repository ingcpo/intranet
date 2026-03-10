<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <script>
        var direcciones = new Array("ie:http://srviisbog14:81/Produccion/", "ie:http://srviisbog15:81/Produccion/", "ie:http://srviisbog20:81/Produccion/")
        function enlaceAleatorio(){
        aleat = Math.random() * direcciones.length
        aleat = Math.floor(aleat)
        window.location=direcciones[aleat]
        }
    </script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" class="navbar-wrap">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-light " aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>

		<?php if ( 'container' === $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>

						<?php
					} else {
						the_custom_logo();
					}
					?>
					<!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav mx-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
			<?php if ( 'container' === $container ) : ?>

			</div><!-- .container -->
			<?php endif; ?>
<?php  get_search_form(); ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
	<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap');

a {color: #3C4F81;}
.page-item.active .page-link {
        background-color: #064b92;
    border-color: #064b92;
}
.page-link {

	 color: #064b92;
	 border: 1px solid #064b92;
}
.wp-block-latest-posts li {border: 1px solid lightgray; padding-top: 24px;}
.wp-block-latest-posts .wp-block-latest-posts__post-excerpt p {text-align: center;}
.btn-secondary {border: none;}
        .listado-iconos li {list-style: none; display: inline-block; text-align: center; vertical-align: top;}
        .listado-iconos li a {font-size: .86rem;
    color: gray;
    line-height: 1.4;
    display: inline-block;
    vertical-align: top;}


        button:focus {outline: none;}
        .blog h2.entry-title {margin-top: 1rem;}
        .widget_recent_entries ul, .widget_categories ul, .widget_archive ul {margin-top: 2rem; padding-left: 1rem;}
        aside.widget_calendar {padding-left: 1rem;}
        .widget-area h3{margin-top: 2rem; font-size: 1.25rem;border-color: #eeeeee;    color: white;  background: #1c213d; padding: 12px 8px 12px 2rem; border-radius: 50px;}

        .widget_search #searchform .field.form-control {padding: 1.5rem 2rem; border: 1px solid gray; border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;}
                .widget_search #searchform .submit {
    width: 50px;height: 50px;
    background-color: #81C43B;
    background-size: 60%;
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    border-left: 1px solid gray; background-position: center;
}

        .home .entry-title {display: none;}

        body, * {font-family: 'Roboto', sans-serif; font-weight: 300;}
        .f-azul {background-color: #064b92;}
				.azul {color: #3C4F81;}
        .blanco, .blanco a {color: white;}

        .f-verde {background-color: #81c43b;}

        .col-menu-c {position: relative;}
        .col-menu-principal > .kt-inside-inner-col {margin: 0 auto;}
        .boton-menu {position: relative;}
        .boton-menu figure {position: absolute; top: 0; margin-bottom: 0;}
        .boton-menu p {position: absolute; bottom: 0; width: 100%;line-height: 1;display: table-cell; vertical-align: text-top;height: 22px;}
        .boton-menu .wp-block-image {margin-bottom: 0;}
        .boton-menu:hover .z-hover {opacity: 0;}
        .boton-menu:hover {transform: scale(1.2);}
        .pt-12 {padding-top: 12px;}
        .pt-24 {padding-top: 24px;}
        .boton-menu, .boton-menu .wp-block-image {transition: all ease 0.2s;}
        .boton-menu a {font-weight: 500; color: #3C4F81;}
        .boton-menu a:hover {text-decoration: none;}
        hr.flecha {background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/separador.jpg); background-position: center; background-repeat: no-repeat; height: 12px; border-top: none;margin: 0 0 6px;}
        .escala-3 {font-size: 22px;}
        .gris {color: #828282;}
        .barra:after {content: ""; display: block; width: 35px; height: 6px; background-color: #3C4F81; margin: 5px auto 0;}

        .polinotas .col-polinotas {    max-width: 1100px!important; margin: 0 auto;margin-right: auto!important;width: 1100px;}

        .polinotas .col-polinotas .wp-block-latest-posts__post-excerpt, .polinotas .col-polinotas a:not(.understrap-read-more-link) {margin: 0 7%;}

        .polinotas .col-polinotas a:not(.understrap-read-more-link) {color: #828282; font-size: 1.4rem;}

        .polinotas .col-polinotas .wp-block-latest-posts__post-excerpt {text-align: justify;}


        .polinotas .understrap-read-more-link{ background-color: #81C43B; color: white!important;    padding: .667em 1.333em; border-radius: 1.55em; margin-top: 1rem;}


        .col-menu-2 {max-width: 960px; margin: 0 auto; margin-right: auto!important;}
        .talento-humano-tab .kt-tab-title-active span {font-weight: 500;}
        .col-tab-talento {max-width: 1280px; margin: 0 auto; margin-right: auto!important;}
        .col-tab-talento  .kt-tabs-content-wrap  .wp-block-kadence-tab { border: none!important;padding: 0!important;}
        .w-100 figure img, .w-100 figure {width: 100%;}
        .col-contenido {margin: 0 auto; margin-right: auto!important;}

        .cifra {font-size: 42px!important; color:#3C4F81!important;margin-left: auto!important;margin-right:auto!important;font-weight: 500;}
        .cifras {    background-color: #efefef;}
        .cifras .counter-wrap {margin-bottom: 0;}
        .sombra-superior {box-shadow: inset 1px 4px 9px -6px;}
        .cifras::before {content: ""; width: 100%; height: 30px; display: block; position: absolute; top: 0; left: 0;box-shadow: inset 1px 4px 9px -6px rgba(0,0,0,.3);}

        .rayas .kt-inside-inner-col {position: relative;}
        .rayas .kt-inside-inner-col:not(last-child)::after {content: ""; width: 1px; height: 70px; background-color: #BCBCBC; top: 0; right: 0; display: block; position: absolute;}
        .wrapper {padding: 0;}

        .fullcalendar {margin: 0 auto;}
        table.fullcalendar td {  border: 1px solid #81C43B;}
        .eventful li {font-size: 0.5rem; list-style: none;}
        table.em-calendar td {width: 90px;height: 60px;overflow: hidden;max-width: 90px;max-height: 60px;vertical-align: top;}

        table.em-calendar td ul {padding-left: 0;}
        table.em-calendar td li {list-style: none;font-size: 11px;line-height: normal;}
        #tab-talentohumano {position: relative;}#tab-talentohumano:after {content: ""; display: block; width: 2px; height: 21px; background-color: #81C43B; position: absolute;top: 12px;right: -6px;}
         .month_name{text-align: center!important;    font-weight: 400;    color: #81C43B;    font-size: 1.6rem;    padding-top: 10px!important;}
        table.em-calendar td.eventful a, table.em-calendar td.eventful-today a {color: #81C43B;}

        #searchform .submit {width: 20px; height: 20px; background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/lupa.svg); color: transparent; background-color: transparent; border: none; background-repeat: no-repeat;}
        #searchform .field.form-control {width: 96px;height: 22px; border: none;}
        #searchform .form-control:focus {color: #838383; background-color: #fff; border-color: #81C43B; outline: 0; -webkit-box-shadow: 0 0 0 0.2rem rgba(129,196,59,.25);
    box-shadow: 0 0 0 0.2rem rgba(129,196,59,.25);}
        #main-nav.fixed-top {background-color: white;-moz-box-shadow: 0px 16px 40px -30px rgba(60,79,129,.2);-webkit-box-shadow: 0px 16px 40px -30px rgba(60,79,129,.2); box-shadow: 0px 16px 40px -30px rgba(60,79,129,.2);}
        #main-nav:after {content: ""; display: block; width: 100%; transition: all ease .3s; opacity: 0; height: 0;    position: absolute;top: 76px;    left: 0;}
        #main-nav.fixed-top:after {opacity: 1; height: 10px; background: rgb(67,182,73);
background: -moz-linear-gradient(90deg, rgba(67,182,73,1) 0%, rgba(43,147,209,1) 50%, rgba(0,83,155,1) 100%);
background: -webkit-linear-gradient(90deg, rgba(67,182,73,1) 0%, rgba(43,147,209,1) 50%, rgba(0,83,155,1) 100%);
background: linear-gradient(90deg, rgba(67,182,73,1) 0%, rgba(43,147,209,1) 50%, rgba(0,83,155,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#43b649",endColorstr="#00539b",GradientType=1);}
        #main-nav.fixed-top .navbar-brand img {height: 60px!important; width: auto!important;}
        .cifras .col-md-3 {line-height: 1.2;}
        .cifras .col-md-3:not(:last-child){border-right: 1px solid lightgray;}
        .c-btn-verde a,.btn-verde, .btn-verde:hover {background-color: #81C43B; color: white!important;    padding: .667em 1.333em; border-radius: 1.55em}
				.c-btn-sm-verde a {background-color: #81C43B; color: white!important;    padding: .4rem .6rem; border-radius: 1.55em; font-size: 0.8rem;}

        .page-template-default .entry-title {
    text-align: center;
    color: #064b92;
    margin-bottom: 2rem;
}
        .card-aplicativo {
    border-radius: 24px;
    text-align: center;
    background-color: #F9F9F9;
    padding-top: 24px;
    padding-left: 34px;
    padding-right: 34px;
    box-shadow: 2px 42px 48px -10px rgba(0,0,0,0.2);
    -webkit-box-shadow: 2px 42px 48px -10px rgba(0,0,0,0.2);
    -moz-box-shadow: 2px 42px 48px -10px rgba(0,0,0,0.2);
    transition: all ease 0.3s;
}
.card-aplicativo.no-sombra {padding-top: 24px; background-color: white;
padding-left: 34px;
padding-right: 34px;
box-shadow:none;
-webkit-box-shadow:none;
-moz-box-shadow: none;}

        .card-aplicativo:hover {transform: scale(1.1);}

        .titulo-aplicativo {font-weight: 500;    color: #828282; min-height: 54px;}
        .c-btn-azul a {background-color: #064b92; color: white!important;}
        .card-aplicativo .c-btn-azul a {font-size: .9rem;}
        .politicas .card {border: none;margin-top: 1rem;
    margin-bottom: 1rem;}


        .menu-auxiliar {padding: 0;}
        .menu-auxiliar li {list-style: none; transition: all ease .3s; border-radius:10px;}
        .menu-auxiliar li a {font-weight: 500; color: #828282; font-size: 1rem; transition: all ease .4s; padding-top: 1rem; padding-bottom: 1rem; display: block;}
        .menu-auxiliar li:hover, .menu-auxiliar li.current-menu-item {background-color: #064b92;}
        .menu-auxiliar li:hover a,.menu-auxiliar li a:hover, .menu-auxiliar li.current-menu-item a  {text-decoration: none;color: white;padding-left: 1rem;}
        .menu-auxiliar li:not(:last-child)::after {content: "";display: block;width: 90%; height: 1px; background-color: #064b92;margin-left: 5%;}

				.menu-auxiliar-naranja {padding: 0;}
        .menu-auxiliar-naranja li {list-style: none; transition: all ease .3s; border-radius:10px;}
        .menu-auxiliar-naranja li a {font-weight: 500; color: #eb641c; font-size: 1rem; transition: all ease .4s; padding-top: 1rem; padding-bottom: 1rem; display: block;}
        .menu-auxiliar-naranja li:hover, .menu-auxiliar-naranja li.current-menu-item {background-color: #eb641c;}
        .menu-auxiliar-naranja li:hover a,.menu-auxiliar-naranja li a:hover, .menu-auxiliar-naranja li.current-menu-item a  {text-decoration: none;color: white;padding-left: 1rem; }
        .menu-auxiliar-naranja li:not(:last-child) {border-bottom: 1px solid #eb641c;}

        footer .mapa-sitio {padding: 0;}
        footer .mapa-sitio li {list-style: none; padding-top: .3rem; padding-top: .3rem;}
        footer .mapa-sitio li, footer .mapa-sitio li a {font-size: .8rem;}
        .mapa-sitio .titulo {font-size: 1.2rem; font-weight: 500;}
        footer .cifras {padding-top: 2rem;padding-bottom: 2rem;position: relative;}
        footer .mapa-sitio li hr {border-top-color: rgba(255,255,255,.4); margin: .3rem 0;}
        footer small {font-weight: 300;}
        footer .mapa-sitio a {color: white;}


        .wp-block-kadence-tabs.it-tabs .kt-tabs-id_ee8f9e-35 > .kt-tabs-title-list li .kt-tab-title, .kt-tabs-id_ee8f9e-35.it-tabs > .kt-tabs-content-wrap > .kt-tabs-accordion-title .kt-tab-title {text-align: center;}
        .it-tabs figure {    max-width: 136px;margin: 0 auto; transition: all ease .2s;}
        .it-tabs figcaption {text-align: center;}
        .it-tabs figure:hover {transform: scale(1.1);}


				.tabs-paginados .kt-tabs-wrap {display: flex; flex-direction: column-reverse;}

				.archive .entry-title span:first-child {display: block;} .archive .entry-title span {font-size: 1rem;}

        @media screen and (min-width:768px) {
        	.mobile {display: none!important;}
            .listado-iconos li {width: 19%;}
            .single-post #main {padding-right: 3rem;}
            .kt-tabs-id_d13208-f4 > .kt-tabs-content-wrap > .wp-block-kadence-tab {min-height:360px;}
            .col-menu-principal .boton-menu, .col-menu-2 .boton-menu {height:154px;}

            .boton-menu figure {left: calc(50% - 60px);}
            .col-menu-principal > .kt-inside-inner-col {width: 777px;}
            #main-menu .nav-item {   margin: 0 0.5rem;    border-radius: 9px; padding: 4px 0;}
            #main-menu .nav-item:hover {background: #81C43B;}
            #main-menu .nav-item a {color: #828282;}
            #main-menu .nav-item:hover > a {color: white;}
            .dropdown-item:focus, .dropdown-item:hover {text-decoration: none; background-color: transparent; color: white!important;}
        }

        @media screen and (min-width:1200px) and (max-width:1380px){
            .navbar-brand {max-width: 240px;}
            #main-menu .nav-item a {font-size: .86rem;}
        }

        @media screen and (min-width:1381px) {
            .navbar-brand {max-width: 310px;}
        }
        @media screen and (min-width:768px) and (max-width:1280px) {
            .col-contenido {max-width: 1280px;}
        }
        @media screen and (min-width:1281px) and (max-width:1400px) {
            .col-contenido {max-width: 1400px;}
        }
        @media screen and (min-width:1401px) {
            .col-contenido {max-width: 1800px;}
        }

        @media screen and (max-width:768px) {
        	.desktop {display: none!important;}
/*            .col-menu-principal .inner-column-1 {max-width: 20%;}*/
            .col-menu-principal > .kt-inside-inner-col {width: 100%;}
            .col-menu-principal .wp-block-kadence-column {margin-right: 0!important; max-width: 20%;}
            .boton-menu a {font-size: .8rem;}
            .col-menu-principal .boton-menu {height:112px;}
            .col-menu-2 .boton-menu {height:156px;}

            .col-menu-principal {margin-top: 15%;}
            #primary {padding-left: 0; padding-right: 0;}
        }
</style>
