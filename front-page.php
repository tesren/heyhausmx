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

    $featured_devs = get_posts(array(
        'post_type' => 'desarrollos',
        'numberposts' => 5,
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
        <img src="<?php echo get_template_directory_uri();?>/assets/images/about-pic.webp" alt="Heyhaus sobre nosotros" class="w-100" loading="lazy">
    </div>

</div>


<!-- Propiedades destacadas -->
<?php if($featured_listings): ?>
    <div class="position-relative pt-5 mb-6">
        <h2 class="text-center gold-text fs-1 fw-light mb-5"><?php pll_e('Propiedades Destacadas');?></h2>
        <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-0 start-0 z-1" loading="lazy">


        <section class="splide position-relative z-2" aria-label="Propiedades destacadas" id="featured-listings">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php foreach($featured_listings as $listing): ?>
                        <li class="splide__slide">

                            <a href="<?php echo get_the_permalink($listing->ID); ?>" class="text-decoration-none">
                                <?php $images = rwmb_meta('listing_gallery', ['size'=>'medium_large', 'limit'=>1], $listing->ID); ?>
                                <div class="position-relative">
                                    <img src="<?php echo $images[0]['url']; ?>" alt="<?php echo get_the_title( $listing->ID ); ?>" class="w-100 rounded-4" loading="lazy">
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
                                        <img width="24px" src="<?php echo get_template_directory_uri();?>/assets/icons/bed-blue.svg" alt="" loading="lazy">
                                        <?php echo $listing->bedrooms; ?>
                                        <img width="24px" src="<?php echo get_template_directory_uri();?>/assets/icons/bathtub-blue.svg" alt="" class="ms-2" loading="lazy">
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

<!-- Desarrollos destacados -->
<?php if($featured_devs): ?>
    <h3 class="text-center gold-text fs-1 fw-light mb-5"><?php pll_e('Desarrollos Inmobiliarios');?></h3>
    <div class="position-relative py-5 mb-6 bg-blue">
        <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-0 start-0 z-1" loading="lazy">

        <div id="carouselExample" class="carousel slide py-5">
            <div class="carousel-inner">
                <?php $i=0; foreach($featured_devs as $dev):?>
                    <?php $images = rwmb_meta('gallery', ['size'=>'medium_large', 'limit'=>5], $dev->ID); ?>

                    <div class="carousel-item <?php if($i==0){echo 'active';}?>">
                        <div class="row position-relative z-2">

                            <div class="col-12 col-lg-7">
                                <div class="row">
                                    <div class="col-12 col-lg-3 mb-3 mb-lg-0">
                                        <img src="<?php echo $images[0]['url']?>" alt="<?php echo get_the_title($dev->ID);?>" class="w-100 mb-3" style="height:200px; object-fit:cover;" loading="lazy">
                                        <img src="<?php echo $images[1]['url']?>" alt="<?php echo get_the_title($dev->ID);?>" class="w-100" style="height:200px; object-fit:cover;" loading="lazy">
                                    </div>
                                    <div class="col-6 col-lg-4 mb-3 mb-lg-0 d-none d-lg-block">
                                        <img src="<?php echo $images[2]['url']?>" alt="<?php echo get_the_title($dev->ID);?>" class="w-100" style="height:415px; object-fit:cover;" loading="lazy">
                                    </div>
                                    <div class="col-6 col-lg-5 d-none d-lg-block">
                                        <img src="<?php echo $images[3]['url']?>" alt="<?php echo get_the_title($dev->ID);?>" class="w-100 mb-3" style="height:200px; object-fit:cover;" loading="lazy">
                                        <img src="<?php echo $images[4]['url']?>" alt="<?php echo get_the_title($dev->ID);?>" class="w-100" style="height:200px; object-fit:cover;" loading="lazy">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5 px-3 align-self-center">
                                <h3 class="fs-1 fw-normal"><?php echo get_the_title($dev->ID);?></h3>
                                <div class="fs-4 fw-light mb-2"><img width="16px" src="<?php echo get_template_directory_uri()?>/assets/icons/location-dot.svg" alt=""> <?php echo get_list_terms($dev->ID, 'regiones');?></div>
                                <p class="pe-0 pe-lg-3"><?php echo get_the_excerpt( $dev->ID );?></p>
                                <div class="fs-5 fw-light mb-4">
                                    <?php pll_e('Precios desde');?>: 
                                    <span class="fw-bolder">
                                        $<?php echo number_format($dev->price);?>
                                        <span class="fs-6"><?php echo $dev->currency;?></span>
                                    </span>
                                </div>
                                <a href="<?php echo get_the_permalink( $dev->ID );?>" class="btn rounded-0 btn-yellow fs-5 fw-light">
                                    <?php pll_e('Conocer Más');?> <img width="18px" src="<?php echo get_template_directory_uri()?>/assets/icons/arrow-right.svg" alt="">
                                </a>
                            </div>

                        </div>
                    </div>
                <?php $i++; endforeach;?>
            </div>

            <button class="carousel-control-prev z-3" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="width:5%;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next z-3" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="width:5%;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
<?php endif; ?>

<!-- Regiones destacadas -->
<?php if($featured_regions): ?>
    <div class="position-relative mb-6">
        <h3 class="text-center gold-text fs-1 fw-light mb-5"><?php pll_e('Regiones Populares');?></h3>
        <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-50 end-0 z-1" style="transform: rotate(180deg);" loading="lazy">

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
                            <img src="<?= get_the_post_thumbnail_url( $blog->ID, 'medium_large')?>" alt="<?= get_the_title($blog->ID); ?>" class="w-100" style="height:270px; object-fit:cover;" loading="lazy">
                            
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

<?php endif; ?>

<?php get_footer(); ?>