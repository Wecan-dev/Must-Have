<?php get_header(); ?>
<section class="">
    <div class="registro">
        <div class="main-registro">
            <div class="main-registro__content">
                <div class="main-registro__img">
                    <div class="main-registro__img--content">
                        <img  src="<?php echo get_template_directory_uri();?>/assets/img/banner-registro.png" alt="">
                    </div>
                </div>
                <div class="main-registro__item">
                    <div class="main-registro__text">
                        <div class="main-registro__subtitle">
                            <p>tus favoritos</p>
                        </div>
                        <div class="main-registro__title">
                            <h1>lo quieres, lo puedes tener</h1>
                        </div>
                        <div class="boton-registro d-none d-lg-flex">
                        </div>
                    </div>
                    <div class="main-registro__form">
                        <div class="main-registro__form--title">
                            <p>Registro</p>
                        </div>
                        <div class="main-registro__form--content">
                            <input type="text" placeholder="Nombre completo">
                            <input type="email" placeholder="Correo electrónico">
                            <input type="text" placeholder="Contraseña">
                            <a href="#" class="lost-pass">¿Olvidó su contraseña?</a>
                            <button type="button" class="btn-send">Registrarse</button>  
                            <a href="#" class="create-new">Crear una nueva cuenta <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  



<?php get_footer(); ?>