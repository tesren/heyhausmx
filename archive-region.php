<?php get_header(); ?>

    <section>

        <?php if ( have_posts() ): ?>

            <h1 class="fs-2 blue-text fw-bold text-center mt-6 mb-1">Regiones para comprar la propiedad de tus sueños</h1>
            <hr class="col-11 col-lg-5 mx-auto mt-0 mb-6">
                
            <?php while( have_posts() ): the_post();?>

            <div class="row justify-content-center my-5 position-relative z-2">

                <div class="col-12 col-lg-4">
                    <?php $url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );?>
                    <img src="<?= $url ?>" alt="<?= get_the_title(); ?>" class="w-100 rounded-3" loading="lazy">
                </div>

                <div class="col-12 col-lg-5">
                    <h2 class="fs-1 blue-text"><?= get_the_title(); ?></h2>
                    <p class="fs-5 mb-5"><?= get_the_excerpt(  ); ?></p>

                    <div class="row">
                        <div class="col-12 col-lg-6 px-0 fs-4">
                            <div class="blue-text">Precios</div>
                            <?= rwmb_meta('prices'); ?>
                        </div>

                        <div class="col-12 col-lg-6 px-0 align-self-center">
                            <a href="<?= get_the_permalink(  ); ?>" class="btn btn-yellow">
                                Conocer Más
                            </a>
                        </div>
                    </div>

                </div>

            </div>

            <?php endwhile; ?>
            
        <?php endif; ?>

    </section>

<?php get_footer(); ?>