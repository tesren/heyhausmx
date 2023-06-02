<?php
/**
 * HeyHaus functions and definitions
 */


if ( ! function_exists( 'heyhaus_theme_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
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

//ENABLE CUSTOM MENU

function custom_nav_menus()
{    
    $locations = array(
        'primary' => __( 'Menu principal' ),
    );
    
    register_nav_menus( $locations );
}

add_action('init', 'custom_nav_menus');



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
    	//wp_enqueue_style( 'choices-css', get_template_directory_uri() .'/assets/css/choices.min.css' );
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
require get_template_directory().'/inc/developments-cpt.php';
require get_template_directory().'/inc/region-cpt.php';
require get_template_directory().'/inc/messages-cpt.php';


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


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

function heyhaus_set_strings_transtaltion(){
        
	$strings = array(
		array(
			'name'     =>'all_listings_sale',
			'string'   =>'Todas las propiedades en venta',
			'group'    =>'Archives',
			'multiline'=>false,
		),
		array(
			'name'     =>'last_update',
			'string'   =>'Última actualización',
			'group'    =>'Archives',
			'multiline'=>false,
		),
		array(
			'name'     =>'regions_to_find_dream_listing',
			'string'   =>'Regiones para comprar la propiedad de tus sueños',
			'group'    =>'Archives',
			'multiline'=>false,
		),
		array(
			'name'     =>'prices',
			'string'   =>'Precios',
			'group'    =>'Archives',
			'multiline'=>false,
		),
		array(
			'name'     =>'know_more',
			'string'   =>'Conocer Más',
			'group'    =>'Archives',
			'multiline'=>false,
		),
		array(
			'name'     =>'contact',
			'string'   =>'Contacto',
			'group'    =>'Footer',
			'multiline'=>false,
		),
		array(
			'name'     =>'follow_us',
			'string'   =>'Síguenos',
			'group'    =>'Footer',
			'multiline'=>false,
		),
		array(
			'name'     =>'privacy_policy',
			'string'   =>'Políticas de Privacidad',
			'group'    =>'Footer',
			'multiline'=>false,
		),
		array(
			'name'     =>'find_your_dream_home',
			'string'   =>'Encuentra la casa de tus sueños',
			'group'    =>'Footer',
			'multiline'=>false,
		),
		array(
			'name'     =>'property_type',
			'string'   =>'Tipo de Propiedad',
			'group'    =>'Footer',
			'multiline'=>false,
		),
		array(
			'name'     =>'all_types',
			'string'   =>'Todos los tipos',
			'group'    =>'Footer',
			'multiline'=>false,
		),
		array(
			'name'     =>'location',
			'string'   =>'Ubicación',
			'group'    =>'Footer',
			'multiline'=>false,
		),
		array(
			'name'     =>'search',
			'string'   =>'Buscar',
			'group'    =>'Footer',
			'multiline'=>false,
		),
		array(
			'name'     =>'about_us',
			'string'   =>'Nosotros',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'who_are_we',
			'string'   =>'¿Quienes somos?',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'desc_1',
			'string'   =>'HeyHaus es una plataforma de venta de propiedades en Puerto Vallarta y Bahía de Banderas, México. Ofrecemos una amplia selección de propiedades exclusivas, que van desde apartamentos y casas de playa hasta terrenos y lotes residenciales. Nuestro equipo de expertos inmobiliarios altamente capacitados ofrece asesoramiento personalizado a compradores y vendedores interesados en el mercado inmobiliario de la zona.',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'desc_2',
			'string'   =>'En HeyHaus, nos enfocamos en la calidad y la transparencia para brindar la mejor experiencia de compra y venta de propiedades. Encuentra tu hogar ideal hoy con HeyHaus.',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'featured_properties',
			'string'   =>'Propiedades Destacadas',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'featured_regions',
			'string'   =>'Regiones Populares',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'recent_posts',
			'string'   =>'Artículos Recientes',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'view_all',
			'string'   =>'Ver Todos',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'meta_description',
			'string'   =>'HeyHaus MX es una plataforma de venta de propiedades en Puerto Vallarta y Bahía de Banderas, México. Ofrecemos una amplia selección de propiedades exclusivas, que van desde apartamentos y casas de playa hasta terrenos y lotes residenciales. Nuestro equipo de expertos inmobiliarios altamente capacitados ofrece asesoramiento personalizado a compradores y vendedores interesados en el mercado inmobiliario de la zona. En HeyHaus, nos enfocamos en la calidad y la transparencia para brindar la mejor experiencia de compra y venta de propiedades. Encuentra tu hogar ideal hoy con HeyHaus.',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'front_title',
			'string'   =>'Descubre tu hogar ideal con HeyHaus MX - Propiedades exclusivas en Puerto Vallarta y Bahía de Banderas',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'contact_title',
			'string'   =>'¡Contáctanos para obtener respuestas a tus preguntas!',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'contact_desc_1',
			'string'   =>'Si estás interesado en una de nuestras propiedades o si tienes alguna pregunta acerca de nuestros servicios, por favor no dudes en contactarnos.',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'contact_desc_2',
			'string'   =>'Puedes utilizar nuestro formulario de contacto o enviarnos un correo electrónico y uno de nuestros expertos en ventas te responderá lo antes posible.',
			'group'    =>'Home',
			'multiline'=>false,
		),
		array(
			'name'     =>'search_results',
			'string'   =>'Resultados de la Busqueda',
			'group'    =>'Search',
			'multiline'=>false,
		),
		array(
			'name'     =>'search_results',
			'string'   =>'Lo sentimos, no hay resultados',
			'group'    =>'Search',
			'multiline'=>false,
		),
		array(
			'name'     =>'search_results',
			'string'   =>'Pero estas propiedades podrían interesarte',
			'group'    =>'Search',
			'multiline'=>false,
		),
		array(
			'name'     =>'bedrooms',
			'string'   =>'Recámaras',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'     =>'baths',
			'string'   =>'Baños',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'     =>'total_const',
			'string'   =>'Conts. Total',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'     =>'lot_area',
			'string'   =>'Lote',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'     =>'description_listing',
			'string'   =>'Descripción',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'     =>'amenities',
			'string'   =>'Amenidades',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'     =>'the_region_of',
			'string'   =>'La región de',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'     =>'gallery_of',
			'string'   =>'Galería de',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'     =>'properties_in',
			'string'   =>'Propiedades en',
			'group'    =>'Listing',
			'multiline'=>false,
		),
		array(
			'name'   => 'developments',
			'string' => 'Desarrollos Inmobiliarios',
			'group'  => 'Desarrollos',
			'multiline'=> false,
		),
		array(
			'name'   => 'prices from',
			'string' => 'Precios desde',
			'group'  => 'Desarrollos',
			'multiline'=> false,
		),
		array(
			'name'   => 'in_single_dev',
			'string' => 'en',
			'group'  => 'Desarrollos',
			'multiline'=> false,
		),
		array(
			'name'   => 'about',
			'string' => 'Sobre',
			'group'  => 'Desarrollos',
			'multiline'=> false,
		),
		array(
			'name'   => 'gallery',
			'string' => 'Galería',
			'group'  => 'Desarrollos',
			'multiline'=> false,
		),
		array(
			'name'   => 'location',
			'string' => 'Ubicación',
			'group'  => 'Desarrollos',
			'multiline'=> false,
		),
		array(
			'name'   => 'available_models',
			'string' => 'Modelos Disponibles',
			'group'  => 'Desarrollos',
			'multiline'=> false,
		),
		array(
			'name' => 'devs_in_region',
			'string' => 'Desarrollos en la Región',
			'group'  => 'Desarrollos',
			'multiline'=> false,
		),
	);

foreach ($strings as $string ) {
		
	pll_register_string( $string['name'], $string['string'], $string['group'], $string['multiline'] );
};

}

add_action('init', 'heyhaus_set_strings_transtaltion');