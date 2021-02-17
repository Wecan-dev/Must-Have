<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Must Have</title>

  <!-- Behavioral Meta Data -->
  <meta content='width=device-width, initial-scale=1, user-scalable=no' name='viewport'>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="theme-color" content="#24272c">
  
  <!-- Google Meta Data -->
  <meta name='description', content=''>
  <meta name='keywords', content=''>
  <meta name="robots" content="index, follow">

  <!-- Blog Meta Data -->
  <meta name="dc.language" content="es">
  <meta name="dc.source" content="">
  <meta itemprop="url" content="">

  <!-- Twitter Card Meta Data -->
  <meta content='summary' name='twitter:card'>
  <meta content='Must Have' name='twitter:site'>
  <meta content='Must Have' name='twitter:title'>
  <meta content='Must Have' name='twitter:description'>

  <!-- Open Graph Meta Data -->
  <meta content='website' property='og:type'>
  <meta content='<?php echo get_template_directory_uri();?>/assets/img/favicon-32x32.png' property='og:image'>
  <meta property="og:site_name" content="">
  <meta property="og:title" content="">
  <meta content='' property='og:description'>
  <meta property="og:type" content="">
  <meta property="og:image" content="">

  <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">

	<link href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/slick-theme.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/slick.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/main.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/slick/slick-theme.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/lightbox2/css/lightbox.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/flaticon.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/animate.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/assets/img/favicon-32x32.png">
  <?php wp_head(); ?>
</head>
<body>

<header id="header" class="header <?php if(is_home()){echo 'header-home';} ?>">
  <nav class="navbar navbar-expand-lg navbar-fixed-js" id="navbar">
    <button class="navbar-buttonModal  border-0 hamburger--elastic ml-autos" data-toggle="modal" data-target="#staticBackdrop">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    <div class="main-brand">
      <a itemprop="url" class="navbar-brand" href="<?php bloginfo('url'); ?>/">
        <img id="iso" src="<?php echo get_template_directory_uri();?>/assets/img/logo-w.png" alt="" />
      </a>
      <div class="iconNav-respon d-flex d-lg-none">
        <div class="content-dropdownUser">
            <a class="icon-user dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/shape.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownUser">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
          <a class="icon-nav" href="#">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-1161.png" alt="">
          </a>
          <a class="icon-nav" href="#">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-929.png" alt="">
          </a>  
      </div>
      <button class="navbar-toggler  border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas"
        type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
    <div class="navbar-collapse offcanvas-collapse">
      <div class="collapse-fixed__content d-none d-lg-flex">
        <a href="<?php bloginfo('url'); ?>/">Inicio</a>
        <a href="#">Upcycling mood </a>
        <a href="<?php bloginfo('url'); ?>/categorias">Categorías</a>
      </div>
      <ul class="navbar-nav ">
        <form class="form-inline my-2 my-lg-0">
          <button class=" my-2 my-sm-0" type="submit"><img src="<?php echo get_template_directory_uri();?>/assets/img/icon.png" alt=""></button>
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        <div class="content-dropdownUser d-none d-lg-flex">
          <a class="icon-user dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/shape.png" alt="">
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownUser">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
        <a class="icon-nav d-none d-lg-flex" href="#">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-1161.png" alt="">
        </a>
        <a class="icon-nav d-none d-lg-flex" href="#">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-929.png" alt="">
        </a>  
        <div class="navCollapse-respon d-block d-lg-none">
        <div class="modalInicio">
            <div class="modalInicio-content">
              <a href="#">Inicio</a>
              <a href="#">Upcycling mood</a>
              <a class="" data-toggle="collapse" href="#collapseModal" role="button" aria-expanded="false" aria-controls="collapseModal">
                Categorías
              </a>
              <div class="collapse" id="collapseModal">
                <div class="collapseModal-content">
                  <a href="#">Second chance</a>
                  <a href="#">Upcycling</a>
                  <a href="#">Productos sosteblibe</a>
                </div>
              </div>
            </div>          
          </div>
          <div class="modalLogin">
            <div class="modalLogin-content">
              <a href="#">Log in</a>
              <a href="#">Sell here</a>
              <a href="#">Productos</a>
              <a href="#">Contacto</a>
            </div>          
          </div>
        </div>
      </ul>
    </div>
  </nav>
</header>