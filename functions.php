<?php
/**
 * HeyHaus functions and definitions
 */


if ( ! function_exists( 'heyhaus_theme_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function heyhaus_theme_support() {

		// Add support 
		add_theme_support('title-tag');
		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-header' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}

endif;

add_action( 'after_setup_theme', 'heyhaus_theme_support' );

if ( ! function_exists( 'heyhaus_theme_styles' ) ) :

	/*
	* Enqueue styles.
	*/

	function heyhaus_theme_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;

		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );
    	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() .'/assets/css/bootstrap.min.css' );
    	wp_enqueue_style( 'choices-css', get_template_directory_uri() .'/assets/css/choices.min.css' );
    	wp_enqueue_style( 'splide-css', get_template_directory_uri() .'/assets/css/splide.min.css' );
    	wp_enqueue_style( 'fancybox-css', get_template_directory_uri() .'/assets/css/fancybox.min.css' );
    	wp_enqueue_style( 'heyhaus-css', get_template_directory_uri() .'/assets/css/heyhaus_style.css' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'heyhaus_theme_styles' );

/**
 * HeyHaus Custom Post Types
*/

require get_template_directory().'/inc/listing-cpt.php';
require get_template_directory().'/inc/region-cpt.php';
require get_template_directory().'/inc/messages-cpt.php';


/**
 * HeyHaus Custom Functions
*/
function get_list_terms($postID, $taxonomy){
	$terms_list = array_reverse(wp_get_post_terms( $postID, $taxonomy ) );

	$j =1;
	if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
		foreach ( $terms_list as $term ) {
			echo $term->name;
			if( $j < count($terms_list) ){
				echo ', ';
			}
			$j++;
		}
	}
}

function get_property_type($postID, $taxonomy){
        
	$terms_list = array_reverse(wp_get_post_terms( $postID, $taxonomy ) );

	if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
		foreach ( $terms_list as $term ) {
			echo $term->name;
		}
	}
}