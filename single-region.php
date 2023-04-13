<?php get_header(); ?>

    <article>

        <?php if ( have_posts() ): ?>
                
            <?php while( have_posts() ): the_post();?>

                <div class="position-relative">
                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' );?>" alt="<?php the_title();?>" class="w-100" style="height:50vh; object-fit:cover;">

                    <div class="fondo-oscuro"></div>

                    <div class="row justify-content-center position-absolute h-100 start-0 top-0 z-2">
                        <div class="col-12 text-center align-self-center">
                            <h1 class="fs-0 fw-bold text-uppercase text-white"><?php the_title();?></h1>
                        </div>
                    </div>

                </div>
                    
                <div class="row justify-content-center my-6 position-relative">

                    <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/half-circle-gold.webp" alt="" class="position-absolute start-0 z-1 px-0" style="width:250px; top:10%;">

                    <div class="col-11 col-lg-10 col-xl-9">
                        <h2 class="fs-1 blue-text mb-4">La región de <?= get_the_title();?></h2>
                        <?php the_content(); ?>

                        <div class="mt-5 fs-4">
                            <div class="blue-text">Precios</div>
                            <?= rwmb_meta('prices'); ?>
                        </div>
                    </div>
                </div>

                <h4 class="fs-2 text-center blue-text mb-1">Galería de <?php the_title();?></h4>
                <hr class="mx-auto col-10 col-lg-3 mt-0 mb-5">

                <section class="splide position-relative z-2 mb-6" aria-label="Propiedades destacadas" id="region-gallery">
                    <div class="splide__track">
                        <ul class="splide__list">

                            <?php $images = rwmb_meta('gallery', ['size'=>'large'] ); ?>
                            <?php foreach($images as $img): ?>
                                <li class="splide__slide px-2">

                                    <img src="<?= $img['url'] ?>" alt="<?= $img['title'] ?>" class="w-100" style="height:50vh; object-fit:cover;">
                                    
                                </li>
                            <?php endforeach; ?>
                            
                        </ul>
                    </div>
                </section>

                <!-- Propiedades en la región -->
                <?php $listings = get_field('listings'); ?>

                <?php if($listings): ?>
                    <h4 class="fs-2 text-center blue-text mb-1">Propiedades en <?php the_title();?></h4>
                    <hr class="mx-auto col-10 col-lg-3 mt-0 mb-5">

                    <section class="splide position-relative z-2 mb-6" aria-label="Propiedades destacadas" id="featured-listings">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php foreach($listings as $listing): ?>
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
                <?php endif; ?>

            <?php endwhile; ?>
            
        <?php endif; ?>

    </article>

<?php get_footer(); ?>