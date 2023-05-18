<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CZHED8F57D"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-CZHED8F57D');
    </script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <?php if(is_front_page()): ?>
            <title><?php pll_e('Descubre tu hogar ideal con HeyHaus MX - Propiedades exclusivas en Puerto Vallarta y Bahía de Banderas');?></title>
            <meta name="description" content="<?php pll_e('HeyHaus MX es una plataforma de venta de propiedades en Puerto Vallarta y Bahía de Banderas, México. Ofrecemos una amplia selección de propiedades exclusivas, que van desde apartamentos y casas de playa hasta terrenos y lotes residenciales. Nuestro equipo de expertos inmobiliarios altamente capacitados ofrece asesoramiento personalizado a compradores y vendedores interesados en el mercado inmobiliario de la zona. En HeyHaus, nos enfocamos en la calidad y la transparencia para brindar la mejor experiencia de compra y venta de propiedades. Encuentra tu hogar ideal hoy con HeyHaus.');?>">
        <?php elseif(is_post_type_archive()):?>
            <title>HeyHaus MX - <?php echo post_type_archive_title(); ?></title>
            <meta name="description" content="<?php pll_e('HeyHaus MX es una plataforma de venta de propiedades en Puerto Vallarta y Bahía de Banderas, México. Ofrecemos una amplia selección de propiedades exclusivas, que van desde apartamentos y casas de playa hasta terrenos y lotes residenciales. Nuestro equipo de expertos inmobiliarios altamente capacitados ofrece asesoramiento personalizado a compradores y vendedores interesados en el mercado inmobiliario de la zona. En HeyHaus, nos enfocamos en la calidad y la transparencia para brindar la mejor experiencia de compra y venta de propiedades. Encuentra tu hogar ideal hoy con HeyHaus.');?>">
        <?php elseif( is_page() ):?>
            <title>HeyHaus MX - <?php echo single_post_title(); ?></title>
            <meta name="description" content="<?php echo get_the_excerpt(); ?>">
        <?php else: ?>
            <title>HeyHaus MX - <?php echo the_title(); ?></title>
            <meta name="description" content="<?php echo get_the_excerpt(); ?>">
	<?php endif; ?>

    <!-- CSS -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<nav class="navbar navbar-expand-xl bg-white blue-text sticky-top py-1" style="border-bottom: 4px #003E6F solid">
  <div class="container-fluid">

    <a class="navbar-brand" href="<?= get_home_url();?>">
        <img width="250px" src="<?php echo get_template_directory_uri();?>/assets/icons/heyhaus-logo.webp" alt="Logo de HeyHaus">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

      <div class="offcanvas-header">
        <div class="offcanvas-title" id="offcanvasNavbarLabel">
            <img class="w-100 px-4" src="<?php echo get_template_directory_uri();?>/assets/icons/heyhaus-logo.webp" alt="Logo de HeyHaus">
        </div>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body pe-4">
        <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'ul',
                //'container_class'   => ' list-unstyled',
                'container_id'      => 'navbarSupportedContent',
                'menu_class'        => 'navbar-nav justify-content-end flex-grow-1 pe-3 fw-bold',
                //'menu_id'           => '',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
        ?>
      </div>

    </div>

  </div>
</nav>