<?php get_header(); ?>

    <section>

        <?php if ( have_posts() ): ?>

            <h1 class="fs-2 blue-text fw-bold text-center mt-6 mb-1"><?php pll_e('Desarrollos Inmobiliarios');?></h1>
            <hr class="col-11 col-lg-3 mx-auto mt-0 mb-5">

            <div class="row justify-content-center mb-6 position-relative">

                <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-0 end-0 z-1 px-0" style="transform: rotate(180deg); width:250px;" loading="lazy">
                <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute top-50 start-0 z-1 px-0" style="width:250px;" loading="lazy">

                <?php while( have_posts() ): the_post();?>

                    <div class="col-11 col-lg-10 col-xl-9 mb-4 mb-lg-5 shadow-4 px-0 rounded-2 blog-card position-relative z-2">

                        <a href="<?= get_the_permalink(); ?>" class="text-decoration-none">
                            <div class="card w-100 text-dark fw-normal position-relative">

                                <div class="badge bg-blue position-absolute top-0 start-0 ms-3 mt-3 z-3">
                                    <?php get_property_type(get_the_ID() , 'property_type') ?>
                                </div>

                                <div class="row g-0">

                                    <?php $images = rwmb_meta('gallery', ['size'=>'medium-large', 'limit'=>1]) ;?>
                                    <div class="col-12 col-lg-7">
                                        <img src="<?= $images[0]['url'] ?>" class="w-100 rounded-start" alt="<?= get_the_title();?>" style="max-height:450px; object-fit:cover;">
                                    </div>

                                    <div class="col-12 col-lg-5">
                                        <div class="card-body">
                                            <h2 class="fw-bold blue-text mb-1 fs-1"><?= get_the_title();?></h2>
                                            <h3 class="fw-light gold-text fs-4 mb-3"><?php get_list_terms(get_the_ID(), 'regiones'); ?></h3>

                                            <p class="card-text fs-5"><?= get_the_excerpt();?></p>

                                            <div class="fs-4 fw-light blue-text">
                                                <?php pll_e('Precios desde')?>: 
                                                <span class="fw-bolder">
                                                    $<?= number_format(rwmb_meta('price')) ?> <span class="fs-5"><?= rwmb_meta('currency') ?></span>
                                                </span> 
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                        
                    </div>

                <?php endwhile; ?>

            </div>
            
        <?php endif; ?>

    </section>

<?php get_footer(); ?>