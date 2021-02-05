<?php get_header(); ?>

<section>
    <div class="main-404">
        <div class="main-404__content">
            <div class="main-404__img">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/banner-404.png" alt="">
            </div>
            <div class="main-404__text">
                <div class="main-404__text--1">
                    <p>lo sentimos</p>
                </div>
                <div class="main-404__text--2">
                    <p>No podemos encontrar la página que está buscando</p>
                </div>
                <div class="main-404__text--number">
                    <p>404</p>
                </div>
                <div class="main-404__text--3">
                    <p>Te llevamos de vuelta</p>
                </div>
                <div class="main-404__text--btn">
                    <a href="<?php bloginfo('url'); ?>/">Te llevamos al inicio</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>