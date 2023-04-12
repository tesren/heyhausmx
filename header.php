<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Descubre tu hogar ideal con HeyHaus - Propiedades exclusivas en Puerto Vallarta y Bahía de Banderas</title>
    <meta name="description" content="HeyHaus es una plataforma de venta de propiedades en Puerto Vallarta y Bahía de Banderas, México. Ofrecemos una amplia selección de propiedades exclusivas, que van desde apartamentos y casas de playa hasta terrenos y lotes residenciales. Nuestro equipo de expertos inmobiliarios altamente capacitados ofrece asesoramiento personalizado a compradores y vendedores interesados en el mercado inmobiliario de la zona. En HeyHaus, nos enfocamos en la calidad y la transparencia para brindar la mejor experiencia de compra y venta de propiedades. Encuentra tu hogar ideal hoy con HeyHaus.">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

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

      <div class="offcanvas-body">

        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fs-5">

            <li class="nav-item dropdown me-4">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Comprar
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Casas y Villas</a></li>
                    <li><a class="dropdown-item" href="#">Condominios</a></li>
                    <li><a class="dropdown-item" href="#">Lotes</a></li>
                    <li><a class="dropdown-item" href="#">Comercial</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="<?= get_post_type_archive_link( 'propiedad-en-venta' ); ?>">Ver Todo</a></li>
                </ul>
            </li>

            <li class="nav-item me-4">
                <a class="nav-link" href="<?= get_post_type_archive_link( 'region' ); ?>">Regiones</a>
            </li>

            <li class="nav-item me-4">
                <a class="nav-link" href="<?= get_the_permalink( pll_get_post(30) ) ?>">Blog</a>
            </li>

            <li class="nav-item me-4 align-self-center">
                <button class="btn btn-blue px-2 py-1" aria-label="Buscar Propiedades" title="Buscar">
                    <img width="24px" src="<?php echo get_template_directory_uri();?>/assets/icons/search-white.svg" alt="Buscar">
                </button>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">LANG</a>
            </li>

        </ul>
        
      </div>
    </div>

  </div>
</nav>