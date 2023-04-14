<?php get_header(); ?>

    <article>
  
        <?php if ( have_posts() ): ?>
                
            <?php while( have_posts() ): the_post();?>

                <?php $images = rwmb_meta('listing_gallery', ['size'=>'large', 'limit'=>40]);?>

                <div class="row mb-6">

                    <div class="col-12 px-0 position-relative">
                        <img src="<?= $images[0]['url'] ?>" alt="<?= $images[0]['title'] ?>" class="w-100 z-1" style="height:60vh; object-fit:cover;" data-fancybox="gallery">
                        <div class="fondo-oscuro z-2"></div>

                        <div class="position-absolute top-0 start-0 h-100 w-100 z-3 d-flex justify-content-center">
                            <div class="text-center text-white mb-1 align-self-center">
                                <h1 class="fs-0 fw-bold"><?= get_the_title(); ?></h1>
                                <h2 class="fs-4 fw-light"><?php get_list_terms(get_the_ID(), 'regiones'); ?></h2>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-6 col-lg-3 p-1">
                        <img src="<?= $images[1]['url'] ?>" alt="<?= $images[1]['title'] ?>" class="w-100" style="height:27vh; object-fit:cover;" data-fancybox="gallery">
                    </div>
                    <div class="col-6 col-lg-3 p-1">
                        <img src="<?= $images[2]['url'] ?>" alt="<?= $images[2]['title'] ?>" class="w-100" style="height:27vh; object-fit:cover;" data-fancybox="gallery">
                    </div>
                    <div class="col-6 col-lg-3 p-1">
                        <img src="<?= $images[3]['url'] ?>" alt="<?= $images[3]['title'] ?>" class="w-100" style="height:27vh; object-fit:cover;" data-fancybox="gallery">
                    </div>
                    <div class="col-6 col-lg-3 p-1">
                        <a href="#gallery-5" class="w-100 d-flex justify-content-center position-relative" style="height:27vh; background-image:url('<?= $images[4]['url'] ?>');background-size:cover;">
                            <div class="fondo-oscuro"></div>
                            <div class="align-self-center fs-1 text-white z-2">
                                <svg class="d-inline" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M160 80H512c8.8 0 16 7.2 16 16V320c0 8.8-7.2 16-16 16H490.8L388.1 178.9c-4.4-6.8-12-10.9-20.1-10.9s-15.7 4.1-20.1 10.9l-52.2 79.8-12.4-16.9c-4.5-6.2-11.7-9.8-19.4-9.8s-14.8 3.6-19.4 9.8L175.6 336H160c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16zM96 96V320c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H160c-35.3 0-64 28.7-64 64zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120V344c0 75.1 60.9 136 136 136H456c13.3 0 24-10.7 24-24s-10.7-24-24-24H136c-48.6 0-88-39.4-88-88V120zm208 24a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                                <span><?= count($images) ?> +</span>
                            </div>
                        </a>
                    </div>

                    <?php for($i=4; $i<count($images); $i++): ?>
                        <img src="<?= $images[$i]['url'] ?>" alt="<?= $images[$i]['title'] ?>" class="d-none" data-fancybox="gallery">
                    <?php endfor; ?>

                </div>
                
                <div class="row justify-content-center position-relative">

                    <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-0 end-0 z-1" style="width:250px;transform: rotate(180deg);">

                    <!-- Detalles -->
                    <div class="col-12 col-lg-10">

                        <h2 class="text-center fs-0 fw-bold blue-text mb-1"><?= get_the_title(); ?></h2>
                        <h2 class="fw-light gold-text text-center mb-5"><?php get_property_type(get_the_ID(), 'property_type'); ?></h2>

                        <div class="row justify-content-center">
                            <div class="col-6 col-lg-2 text-center mb-4 mb-lg-0">
                                <div class="fs-1 blue-text fw-bold"><?= rwmb_meta('bedrooms'); ?></div>
                                <div class="fs-5 fw-light text-uppercase"><?php pll_e('Recámaras');?></div>
                            </div>
                            <div class="col-6 col-lg-2 text-center mb-4 mb-lg-0">
                                <div class="fs-1 blue-text fw-bold"><?= rwmb_meta('bathrooms'); ?></div>
                                <div class="fs-5 fw-light text-uppercase"><?php pll_e('Baños');?></div>
                            </div>
                            <div class="col-6 col-lg-2 text-center">
                                <div class="fs-1 blue-text fw-bold"><?= rwmb_meta('construction'); ?>m²</div>
                                <div class="fs-5 fw-light text-uppercase"><?php pll_e('Conts. Total');?></div>
                            </div>
                            <div class="col-6 col-lg-2 text-center">
                                <div class="fs-1 blue-text fw-bold"><?= rwmb_meta('lot_area'); ?>m²</div>
                                <div class="fs-5 fw-light text-uppercase"><?php pll_e('Lote');?></div>
                            </div>

                            <?php if( rwmb_meta('avaliable') == 'Disponible' ): ?>
                                <div class="col-12 text-center my-5">
                                    <div class="fs-5 gold-text fw-light"><?=rwmb_meta('avaliable'); ?></div>
                                    <h2 class="fs-1 blue-text">$<?= number_format(rwmb_meta('price')); ?> <span class="fs-4"><?= rwmb_meta('currency');?></span></h2>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>

                    <hr class="col-11 col-lg-10">

                    <!-- Descripcion -->
                    <div class="col-12 col-lg-10 my-4">
                        <h3 class="fs-2 fw-bold blue-text"><?php pll_e('Descripción');?></h3>
                        <div class="fs-5">
                            <?= get_the_content();?>
                        </div>

                        <h3 class="fs-2 fw-bold blue-text mt-4"><?php pll_e('Amenidades');?></h3>
                        <div class="fs-5">
                            <?php $amenities = rwmb_meta('amenities');?>
                            <?php 
                                foreach($amenities as $key => $amenity):
                                    echo $amenity;
                                    if ($key == count($amenities) - 1) {
                                        echo ".";
                                    } else {
                                        echo ", ";
                                    }
                                endforeach;
                            ?>
                        </div>
                    </div>

                    <hr class="col-11 col-lg-10 mt-4">

                    <!-- Ubicación -->
                    <div class="col-12 col-lg-10 my-4 position-relative z-2">
                        <h3 class="fs-2 fw-bold blue-text mb-1"><?php pll_e('Ubicación');?></h3>
                        <h4 class="fw-light gold-text mb-4 fs-5"><?php get_list_terms(get_the_ID(), 'regiones'); ?></h4>
                        <div>
                            <?php
                                $args = [
                                    'width'        => '100%',
                                    'height'       => '480px',
                                    'zoom'         => 14,
                                    'marker'       => true,
                                ];
                                rwmb_the_value( 'map', $args );
                            ?>
                        </div>
                    </div>

                    <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute px-0 top-50 start-0 z-1" style="width:250px;">


                    <!-- Formulario de contacto -->
                    <div class="col-12 col-lg-8 col-xl-5 mb-6 mt-5">
                        <h4 class="fs-2 text-center fw-bold blue-text mb-1"><?php pll_e('Contacto');?></h4>
                        <h5 class="text-center gold-text fs-4 fw-light mb-4"><?php pll_e('¡Contáctanos para obtener respuestas a tus preguntas!');?></h5>
                        <?= do_shortcode( '[cf7form cf7key="formulario-de-contacto-1"]' ); ?>
                    </div>

                </div>

            <?php endwhile; ?>
            
        <?php endif; ?>

    </article>

    <script src="<?php echo get_template_directory_uri();?>/assets/js/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
        // Your custom options
        });
    </script>

<?php get_footer(); ?>