<?php get_header(); ?>
<section class="">
    <div class="vendeAqui">
        <div class="main-vendeAqui">
            <div class="main-vendeAqui__content">
                <div class="main-vendeAqui__img">
                    <div class="main-vendeAqui__img--content">
                        <img  src="<?php echo get_template_directory_uri();?>/assets/img/14.SELL HERE.jpg" alt="">
                    </div>
                </div>
                <div class="main-vendeAqui__form">
                    <div class="main-vendeAqui__form--title">
                        <p>Vende aquí</p>
                    </div>
                    <div class="main-vendeAqui__form--content">
                    <?php echo do_shortcode('[dokan-vendor-registration]')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  



<?php get_footer(); ?>