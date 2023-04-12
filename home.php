<?php get_header(); ?>

    <section>

        <?php if ( have_posts() ): ?>

            <h1 class="fs-1 blue-text fw-bold text-center mt-6 mb-1">Nuestro Blog</h1>
            <hr class="col-11 col-lg-3 col-xl-2 mx-auto mt-0 mb-6">
                
            <?php while( have_posts() ): the_post();?>


            <?php endwhile; ?>
            
        <?php endif; ?>

    </section>

<?php get_footer(); ?>