<?php
    get_header(); 
    $images = rwmb_meta('gallery',array('size'=>'full', 'limit'=>2));
    $imagesLarge = rwmb_meta('gallery',array('size'=>'large', 'limit'=>30));
    $models = get_posts(array(
        'post_type' => 'inventory',
        'meta_query' => array(
            array(
                'key' => 'desarrollo', // name of custom field
                'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                'compare' => 'LIKE'
            )
        )
    ));
 ?>


<?php if( have_posts() ):?>

    <?php while( have_posts() ) : the_post(); ?>

        <div class="container-fluid px-0">

            <div class="position-relative">
                <img class="w-100" src="<?php echo $images[0]['url'];?>" alt="<?php echo $images[0]['title'];?>" style="height:93vh; object-fit:cover;">
                <div class="fondo-oscuro"></div>

                <div class="row position-absolute h-100 top-0 start-0 z-3">
                    <div class="col-12 align-self-center text-center text-white">
                        <h1 class="text-uppercase mb-4 mb-lg-2"><?php echo the_title();?></h1>
                        <hr class="col-10 col-lg-2 mx-auto text-white">
                        <h2 class="fs-5">
                            <?php echo get_property_type(get_the_ID(), 'property_type')?> <?php pll_e('en')?> <?php echo get_list_terms(get_the_ID(),'regiones'); ?>
                        </h2>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center" id="info-section">
                <hr class="col-11 col-lg-10 mt-5 mb-0" style="opacity:1; color:#444444;">
                <div class="col-11 col-lg-10 my-4">
                    <div class="row justify-content-between">

                        <div class="col-12 col-lg-7 mb-3 mb-lg-0">
                            <h2 class="mb-3 blue-text"><?php pll_e('Sobre');?> <?php echo the_title();?></h2>
                            <?php echo get_the_content( );?>
                        </div>

                        <div class="col-12 col-lg-4 mb-0 align-self-center">
                            <h3 class="fw-light blue-text">
                                <?php pll_e('Precios desde');?>: <br> 
                                <span class="fw-bolder"> 
                                    $<?php echo number_format(rwmb_meta('price'));?>  <span class="fs-5"><?php echo rwmb_meta('currency');?></span>
                                </span> 
                            </h3>
                        </div>

                    </div>
                </div>
                <hr class="col-11 col-lg-10" style="opacity:1; color:#444444;">

                <div class="col-11 col-lg-10 mb-6">
                    <h5 class="fs-1 blue-text my-4"><?php pll_e('Galería');?></h5>

                    <div class="row">
                        <?php $j=0; foreach($imagesLarge as $img): ?>
                            <div class="col-6 col-lg-4 px-0">
                                <img class="w-100 <?php if($j>5){echo 'd-none';}?>" src="<?php echo $img['url']?>" alt="<?php echo $img['title']?>" data-fancybox="dev-gallery" style="height:35vh; object-fit:cover;" loading="lazy">
                            </div>
                        <?php $j++; endforeach; ?>
                    </div>

                </div>

                <hr class="col-11 col-lg-10" style="opacity:1; color:#444444;">
                <div class="col-11 col-lg-10 mb-5">
                    <h5 class="fs-1 blue-text my-4"><?php pll_e('Ubicación');?></h5>
                    
                    <?php $args = array(
                        'width'        => '100%',
                        'height'       => '500px',
                        'zoom'         => 14,
                        'marker'       => true,
                        //'marker_icon'  => 'https://url_to_icon.png',
                        //'marker_title' => 'Click me',
                        //'info_window'  => '<h3>Title</h3><p>Content</p>.',
                        );
                    
                        echo rwmb_meta( 'development_map', $args );
                    ?>
                        
                </div>
                <hr class="col-11 col-lg-10" style="opacity:1; color:#444444;">

                <?php if($models): ?>

                    <div class="col-11 col-lg-10 mb-5 px-0">
                        <h4 class="fs-1 blue-text mb-4 text-center mt-4"><?php pll_e('Modelos Disponibles');?></h4>

                        <div class="row">
                            <?php foreach($models as $model): ?>
                                <div class="col-12 col-lg-4 mb-5">

                                    <div class="card w-100">
                                        <div class="card-img-top">
                                            <div id="carousel-<?php echo $model->ID;?>" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">

                                                    <?php $modImgs = rwmb_meta('inventory_gallery', array('size'=>'large', 'limit'=>3), $model->ID) ?>

                                                    <?php $k=0; foreach($modImgs as $img): ?>
                                                        <div class="carousel-item <?php if($k==0){echo 'active';}?>">
                                                            <img class="d-block w-100" src="<?php echo $img['url']?>" alt="<?php echo $img['title']?>" style="height:300px; object-fit:cover;">
                                                        </div>
                                                    <?php $k++; endforeach; ?>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $model->ID;?>" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $model->ID;?>" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="fs-3 text-center mt-3 blue-text"><?php echo get_the_title($model->ID); ?></h5>
                                            <hr class="w-100">

                                            <div class="d-flex fs-5 fw-bold gold-text justify-content-evenly mb-3">
                                                <div><img width="24px" src="<?php echo get_template_directory_uri();?>/assets/icons/bed-blue.svg" alt=""> <?php echo $model->bedrooms; ?></div>
                                                <div><img width="24px" src="<?php echo get_template_directory_uri();?>/assets/icons/bathtub-blue.svg" alt="" class="ms-2"> <?php echo $model->bathrooms; ?></div>
                                                <div><img width="24px" src="<?php echo get_template_directory_uri();?>/assets/icons/ruler-blue.svg" alt="" class="ms-2"> <?php echo $model->construction; ?>m²</div>
                                            </div>
                                            <hr class="w-100">

                                            <p class="fs-5 fw-light">
                                                <?php $details = rwmb_meta('extra_features', [], $model->ID); ?>
                                                Cuenta con 
                                                <?php foreach($details as $index => $detail): ?>
                                                    <?php echo $detail; ?><?php echo ($index < count($details) - 1) ? ',' : ''; ?>
                                                <?php endforeach; ?>
                                            </p>

                                        </div>
                                    </div>
                                    

                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                <?php endif; ?>


                <!-- Formulario -->
                <div class="row my-6 justify-content-evenly position-relative">

                    <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-0 end-0 z-1" style="width:250px;transform: rotate(180deg);">

                    <div class="col-11 col-lg-5 mb-5 p-3 p-lg-5 bg-light">
                        <h1 class="gold-text fs-5 fw-light"><?php pll_e('Contacto');?></h1>
                        <h2 class="blue-text mb-4"><?php pll_e('¡Contáctanos para obtener respuestas a tus preguntas!');?></h2>
                        <p class="fs-5 mb-5">
                            <?php pll_e('Si estás interesado en una de nuestras propiedades o si tienes alguna pregunta acerca de nuestros servicios, por favor no dudes en contactarnos.');?> <br> <br>
                            <?php pll_e('Puedes utilizar nuestro formulario de contacto o enviarnos un correo electrónico y uno de nuestros expertos en ventas te responderá lo antes posible.');?>
                        </p>

                        <a href="mailto:info@heyhaus.mx" class="btn btn-yellow fw-light rounded-0 fs-4 py-3 px-4 blog-card shadow-4">
                            <img width="30px" src="<?php echo get_template_directory_uri()?>/assets/icons/mail-white.svg" alt="Email">
                            info@heyhaus.mx
                        </a>

                    </div>

                    <!-- Formulario de contacto -->
                    <div class="col-12 col-lg-4 align-self-center">
                        <?= do_shortcode( '[cf7form cf7key="formulario-de-contacto-1"]' ); ?>
                    </div>

                </div>

            </div>

        </div>

    <?php endwhile;?>

<?php endif;?>

<script src="<?php echo get_template_directory_uri();?>/assets/js/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
    // Your custom options
    });
</script>

<?php get_footer(); ?>