<?php 
$regiones = get_terms( array(
    'taxonomy'          => 'regiones',
    'parent'            => 0,
    'hide_empty'        => false,
) );

$propertiesType = get_terms( array(
    'taxonomy'          => 'property_type',
    'parent'            => 0,
    'hide_empty'        => false,
) );

$featured_listings = get_posts(array(
    'post_type' => 'propiedad-en-venta',
    'numberposts' => -1,
    'meta_query'=> array(
        array(
            'key' => 'featured_listing',
            'compare' => '=',
            'value' => 1,
        )
    ),
));

get_header();?>

<div class="position-relative">
    <img src="<?php echo get_template_directory_uri();?>/assets/images/muelle-puerto-vallarta.webp" alt="Muelle de Puerto Vallarta" class="w-100" style="height:88vh; object-fit:cover;" >
    <div class="fondo-oscuro"></div>

    <div class="row position-absolute top-0 start-0 h-100 z-3 justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7 align-self-center p-4">
            <h1 class="text-center text-white text-uppercase fs-0">Encuentra la casa de tus sueños</h1>
            
            <!-- Formulario de busqueda -->
            <div class="bg-white px-3 py-4 rounded-4">
                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" class="row">

                    <div class="col-12 col-lg-4 mb-3 mb-lg-0" style="border-right: 1px solid #003E6F;">
                        <label for="type_s">Tipo de Propiedad</label>
                        <select class="form-select w-100 rounded-1 py-2 bg-light" aria-label="Seleccione un tipo" id="type_s" name="type_s">
                            <option selected value=""><?php pll_e('Todos los tipos');?></option>
                            <?php foreach($propertiesType as &$type):?>
                                <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12 col-lg-8">
                        <label for="regiones_s"><?php pll_e('Ubicación'); ?></label>
                        <select class="form-select w-100 mb-3" id="regiones_s" name="regiones_s" multiple>
                            <?php foreach($regiones as &$category):
                                $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                                    foreach($childrenTerms as $child) :     
                                        $term = get_term_by( 'id', $child, 'regiones');?>
                                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                                    <?php endforeach; ?>

                            <?php endforeach; ?>
                        </select>
                    </div>

                </form>
            </div>
            

        </div>
    </div>

</div>


<!-- Propiedades destacadas -->
<?php if($featured_listings): ?>
    <div class="position-relative pt-5 mt-5 mb-6">
        <h2 class="text-center gold-text fs-1 fw-light">Propiedades Destacadas</h2>
        <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-0 start-0">


        <section class="splide" aria-label="Propiedades destacadas" id="featured-listings">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php foreach($featured_listings as $listing): ?>
                        <li class="splide__slide">

                            <?php $images = rwmb_meta('listing_gallery', ['size'=>'medium-large', 'limit'=>1], $listing->ID); ?>
                            <div class="position-relative">
                                <img src="<?php echo $images[0]['url']; ?>" alt="<?php echo get_the_title( $listing->ID ); ?>" class="w-100 rounded-4">
                                <div class="fondo-oscuro rounded-4"></div>
                                <div class="position-absolute start-0 bottom-0 w-100 text-white z-3 px-4 py-3">
                                    <h2 class="fs-1 mb-0 lh-1"><?php echo get_the_title( $listing->ID ); ?></h2>
                                    <div class="fs-5"><?php get_list_terms($listing->ID, 'regiones'); ?></div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div></div>

                                <div class="fs-5">$<?php echo number_format($listing->price);?> <?php echo $listing->currency; ?></div>
                            </div>

                        </li>
                    <?php endforeach; ?>
                    
                </ul>
            </div>
        </section>

    </div>
<?php endif; ?>

<?php get_footer(); ?>