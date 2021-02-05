<?php get_header(); ?>

<section>
    <div class="bannerStatic">
        <div class="main-bannerStatic">
            <div class="main-bannerStatic__content">
                <div class="main-bannerStatic__img">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/banner-contactanos.png" alt="">
                </div>
                <div class="main-bannerStatic__text">
                    <p>contáctanos</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="">
    <div class="contact">
        <div class="main-contact">
            <div class="main-contact__content">
                <div class="main-contact__form">
                    <div class="main-contact__title">
                        <p>Dejanos un mensaje</p>
                    </div>
                    <div class="main-contact__form--inputs">
                        <input type="text" placeholder="Nombre">
                        <input type="email" placeholder="Correo Electrónico">
                        <input type="text" placeholder="Teléfono">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Comentarios"></textarea>
                        <button>Enviar</button>
                    </div>
                </div>
                <div class="main-contact__info">
                    <div class="main-contact__title">
                        <p>Nuestra información</p>
                    </div>
                    <div class="main-contact__text">
                        <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                    </div>
                    <div class="main-contact__redes">
                        <div class="main-contact__redes--item">
                            <div class="main-contact__redes--icon">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/envelope.png" alt="">
                            </div>
                            <div class="main-contact__redes--link">
                                <p>Correo electrónico</p>
                                <a href="mailto:info@must-have.com">info@must-have.com</a>
                            </div>
                        </div>
                        <div class="main-contact__redes--item">
                            <div class="main-contact__redes--icon">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/phone-call.png" alt="">
                            </div>
                            <div class="main-contact__redes--link">
                                <p>Teléfono</p>
                                <a href="tel:57 (4) 444 00 09">57 (4) 444 00 09</a>
                            </div>
                        </div>
                        <div class="main-contact__redes--item">
                            <div class="main-contact__redes--icon">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/local.png" alt="">
                            </div>
                            <div class="main-contact__redes--link">
                                <p>Ubicación</p>
                                <a href="#">Calle 78 #59 - 24, Medellín-Colombia</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<section>
    <div class="main-map">
        <div class="main-map__content">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/image-map.png" alt="">
        </div>
    </div>
</section>

<?php get_footer(); ?>