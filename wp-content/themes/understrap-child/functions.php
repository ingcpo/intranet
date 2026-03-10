<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

//CONTADOR
// function that runs when shortcode is called
function zapata_shortcode() { 
// Things that you want to do. 
$hoy = '55'; 
// Output needs to be return
return $hoy;
} 
// register shortcode
add_shortcode('hoy', 'zapata_shortcode');

function zapatasemana_shortcode() { $semana = "3"; return $semana;} 
add_shortcode('semana', 'zapatasemana_shortcode');

function zapatames_shortcode() { $mes = '1540'; return $mes;} 
add_shortcode('mes', 'zapatames_shortcode');

function zapatatotal_shortcode() { $ztotal = '1980'; return $ztotal;} 
add_shortcode('total', 'zapatatotal_shortcode');

function get_the_user_ip() {
if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $ip = $_SERVER['REMOTE_ADDR'];
    }
return apply_filters( 'wpb_get_ip', $ip );
}
add_shortcode('direccion_ip', 'get_the_user_ip');


function cetweb_print_custom_menu_shortcode($atts)
  {
      // Normalize 
      $atts = array_change_key_case((array)$atts, CASE_LOWER);
      $atts = array_map('sanitize_text_field', $atts);
      // Attributes
      $menu_name = $atts['name'];
      $menu_class = $atts['class'];
      return wp_nav_menu(array(
          'menu' => esc_attr($menu_name),
          'menu_class' => 'menu ' . esc_attr($menu_class),
          'echo' => false));
  }
  add_shortcode('print-menu', 'cetweb_print_custom_menu_shortcode');
