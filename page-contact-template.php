<?php
 /*
  Template Name: Contact Template
 */
get_header();
?>

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


<?php get_footer(); ?>