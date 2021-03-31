<?php get_header(); ?>
<section class="">
    <div class="vendeAqui">
        <div class="main-vendeAqui">
            <div class="main-vendeAqui__content">
                <div class="main-vendeAqui__img">
                    <div class="main-vendeAqui__img--content">
                        <img  src="<?php echo get_template_directory_uri();?>/assets/img/banner-vendeAqui.png" alt="">
                    </div>
                </div>
                <div class="main-vendeAqui__form main-migrar__form">
                    <div class="main-vendeAqui__form--title">
                        <p>Migrar cuenta</p>
                    </div>
                    <div class="main-vendeAqui__form--content">
                    <?php echo do_shortcode('[dokan-customer-migration]'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
  
<script>

document.getElementById('first-name').placeholder='Nombre';
document.getElementById('last-name').placeholder='Apellido';
document.getElementById('company-name').placeholder='Nombre de la tienda';
document.getElementById('seller-url').placeholder='URL de la tienda';
document.getElementById('seller-address').placeholder='Dirección de la tienda';
document.getElementById('shop-phone').placeholder='Número de teléfono de la tienda';

</script>

<?php get_footer(); ?>