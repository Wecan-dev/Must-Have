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
                    <div class="vende-upcycling">
                        <a class="btn-vende-upcycling" data-toggle="collapse" href="#collapseVendeAqui" role="button" aria-expanded="false" aria-controls="collapseVendeAqui"> ¿ Quiere vender en upcycling?</a>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseVendeAqui">
                <div class="content-collapseVendeAqui">
                    <div class="content-collapseVendeAqui__form">
                        <div class="main-vendeAqui__form--title">
                            <p>¿Quieres vender en upcycling?</p>
                        </div>
                        <div class="main-vendeAqui__form--content">
                            <input type="text" placeholder="servicios especificos">
                            <input type="text" placeholder="Tarifa">
                            <input type="text" placeholder="Tiempo de elaboración">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Especificaciones ( materiales )"></textarea>
                            <button type="button" class="btn-send">Enviar</button>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  



<?php get_footer(); ?>