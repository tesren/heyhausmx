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

    $last_posts = get_posts(array(
        'post_type' => 'post',
        'numberposts' => 3,
    ));

    $featured_regions = get_posts(array(
        'post_type' => 'region',
        'numberposts' => -1,
        'meta_query'=> array(
            array(
                'key' => 'featured_region',
                'compare' => '=',
                'value' => 1,
            )
        ),
    ));

    get_header();
?>

<div class="position-relative">
    <img src="<?php echo get_template_directory_uri();?>/assets/images/muelle-puerto-vallarta.webp" alt="Muelle de Puerto Vallarta" class="w-100" style="height:88vh; object-fit:cover;" >
    <div class="fondo-oscuro"></div>

    <div class="row position-absolute top-0 start-0 h-100 z-3 justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7 align-self-center p-4">
            <h1 class="text-center text-white text-uppercase fs-0 mb-4"><?php pll_e('Encuentra la casa de tus sueños');?></h1>
            
            <!-- Formulario de busqueda -->
            <?php echo get_search_form();?>
            
        </div>
    </div>

</div>


<!-- Sobre Nosotros -->
<div class="row position-relative justify-content-evenly my-6">
    <div class="col-12 col-lg-5">
        <div class="fw-light gold-text"><?php pll_e('Nosotros');?></div>
        <h2 class="fw-bold blue-text fs-1 mb-5"><?php pll_e('¿Quienes somos?');?></h2>
        <p class="fs-5">
            <?php pll_e('HeyHaus es una plataforma de venta de propiedades en Puerto Vallarta y Bahía de Banderas, México. Ofrecemos una amplia selección de propiedades exclusivas, que van desde apartamentos y casas de playa hasta terrenos y lotes residenciales. Nuestro equipo de expertos inmobiliarios altamente capacitados ofrece asesoramiento personalizado a compradores y vendedores interesados en el mercado inmobiliario de la zona.');?> <br>
            <?php pll_e('En HeyHaus, nos enfocamos en la calidad y la transparencia para brindar la mejor experiencia de compra y venta de propiedades. Encuentra tu hogar ideal hoy con HeyHaus.');?>
        </p>                     
    </div>

    <div class="col-12 col-lg-4">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/about-pic.webp" alt="Heyhaus sobre nosotros" class="w-100">
    </div>

</div>


<!-- Propiedades destacadas -->
<?php if($featured_listings): ?>
    <div class="position-relative pt-5 mb-6">
        <h2 class="text-center gold-text fs-1 fw-light mb-5"><?php pll_e('Propiedades Destacadas');?></h2>
        <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-0 start-0 z-1">


        <section class="splide position-relative z-2" aria-label="Propiedades destacadas" id="featured-listings">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php foreach($featured_listings as $listing): ?>
                        <li class="splide__slide">

                            <a href="<?php echo get_the_permalink($listing->ID); ?>" class="text-decoration-none">
                                <?php $images = rwmb_meta('listing_gallery', ['size'=>'medium-large', 'limit'=>1], $listing->ID); ?>
                                <div class="position-relative">
                                    <img src="<?php echo $images[0]['url']; ?>" alt="<?php echo get_the_title( $listing->ID ); ?>" class="w-100 rounded-4">
                                    <div class="fondo-oscuro rounded-4"></div>
                                    <div class="position-absolute start-0 bottom-0 w-100 text-white z-3 px-4 py-3">
                                        <h2 class="fs-1 mb-0 lh-1"><?php echo get_the_title( $listing->ID ); ?></h2>
                                        <div class="fs-5"><?php get_list_terms($listing->ID, 'regiones'); ?></div>
                                    </div>

                                    <div class="badge bg-blue position-absolute top-0 end-0 me-3 mt-3 z-3">
                                        <?php get_property_type($listing->ID, 'property_type') ?>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between px-4 py-2">
                                    <div class="fs-5 fw-bold gold-text">
                                        <img width="24px" src="<?php echo get_template_directory_uri();?>/assets/icons/bed-blue.svg" alt="">
                                        <?php echo $listing->bedrooms; ?>
                                        <img width="24px" src="<?php echo get_template_directory_uri();?>/assets/icons/bathtub-blue.svg" alt="" class="ms-2">
                                        <?php echo $listing->bathrooms; ?>
                                    </div>

                                    <div class="fs-4 blue-text">
                                        $<?php echo number_format($listing->price);?> 
                                        <span class="fs-6"><?php echo $listing->currency; ?></span>
                                    </div>
                                    
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    
                </ul>
            </div>
        </section>

    </div>
<?php endif; ?>

<!-- Regiones destacadas -->
<?php if($featured_regions): ?>
    <div class="position-relative mb-6">
        <h3 class="text-center gold-text fs-1 fw-light mb-5"><?php pll_e('Regiones Populares');?></h3>
        <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-50 end-0 z-1" style="transform: rotate(180deg);">

        <?php foreach($featured_regions as $region): ?>

            <div class="row justify-content-center mb-5 position-relative z-2">

                <div class="col-12 col-lg-4">
                    <?php $url = get_the_post_thumbnail_url( $region->ID, 'medium_large' );?>
                    <img src="<?= $url ?>" alt="<?= get_the_title($region->ID); ?>" class="w-100 rounded-3" loading="lazy">
                </div>

                <div class="col-12 col-lg-5">
                    <h3 class="fs-1 blue-text mt-2 mt-lg-0"><?= get_the_title($region->ID); ?></h3>
                    <p class="fs-5 mb-5"><?= get_the_excerpt( $region->ID ); ?></p>

                    <div class="row">
                        <div class="col-12 col-lg-6 px-0 fs-4 mb-4 mb-lg-0">
                            <div class="blue-text"><?php pll_e('Precios');?></div>
                            <?= $region->prices ?>
                        </div>

                        <div class="col-12 col-lg-6 px-0 align-self-center">
                            <a href="<?= get_the_permalink( $region->ID ); ?>" class="btn btn-yellow w-100">
                                <?php pll_e('Conocer Más');?>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        <?php endforeach;?>

    </div>
<?php endif; ?>

<!-- Ultimas entradas -->
<?php if ( $last_posts ): ?>

    <h3 class="text-center gold-text fs-1 fw-light mb-5"><?php pll_e('Artículos Recientes');?></h3>

    <div class="col-12 col-lg-10 mx-auto mb-5">
        <div class="row">
            <?php foreach( $last_posts as $blog ):?>

                <div class="col-12 col-lg-4 p-2 mb-4">

                    <article class="card rounded-0 w-100 shadow-4 blog-card">
                        <a href="<?= get_the_permalink($blog->ID); ?>" class="text-decoration-none">
                            <img src="<?= get_the_post_thumbnail_url( $blog->ID, 'medium_large')?>" alt="<?= get_the_title($blog->ID); ?>" class="w-100" style="height:270px; object-fit:cover;">
                            
                            <div class="bg-light card-body">
                                <h3 class="fw-bold blue-text"><?= get_the_title($blog->ID); ?></h3>
                                <p class="text-dark fw-light"><?= get_the_excerpt($blog->ID); ?></p>

                                <div class="fw-light text-dark"><?= get_the_date('d-m-Y', $blog->ID); ?></div>
                            </div>
                        </a>
                    </article>

                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <div class="text-center mb-6">
        <a href="<?= get_the_permalink(get_page_by_title( 'Blog' )); ?>" class="btn btn-yellow"><?php pll_e('Ver Todos');?></a>
    </div>

<?php endif; ?>

<?php get_footer(); ?>