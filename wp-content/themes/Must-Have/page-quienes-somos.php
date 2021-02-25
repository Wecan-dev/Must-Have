<?php get_header(); ?>

<?php 
$bannerAbout1 = get_theme_mod('about-banner_img1');
$bannerAbout2 = get_theme_mod('about-banner_img2');
$bannerAbout3 = get_theme_mod('about-banner_img3');

?>

<section>
    <div class="bannerAbout">
        <div class="main-bannerAbout">
            <div class="main-bannerAbout__slider">
            <?php if($bannerAbout1): ?>
                    <div class="main-bannerAbout__content">
                        <div class="main-bannerAbout__img">
                                <img src="<?php echo $bannerAbout1; ?>" alt="">  
                        </div>
                    </div>
                <?php endif;?>
                <?php if($bannerAbout2): ?>
                    <div class="main-bannerAbout__content">
                        <div class="main-bannerAbout__img">
                            <?php if($bannerAbout2): ?>
                                <img src="<?php echo $bannerAbout2; ?>" alt="">
                            <?php endif;?>
                        </div>
                    </div>
                <?php endif;?>
                <?php if($bannerAbout3): ?>
                    <div class="main-bannerAbout__content">
                        <div class="main-bannerAbout__img">
                                <img src="<?php echo $bannerAbout3; ?>" alt="">
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>


<section class="">
    <div class="about">
        <div class="main-about">
            <div class="main-about__content">
                <div class="main-about__img">
                    <div class="main-about__img--content">
                        <img src="<?php echo get_theme_mod('about-content_img'); ?>" alt="">
                    </div>
                </div>
                <div class="main-about__item">
                    <div class="main-about__title">
                        <p><?php echo get_theme_mod('about-content_title'); ?></p>
                    </div>
                    <div class="main-about__text">
                        <p>
                            <?php echo get_theme_mod('about-content_text'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  
<section>
    <div class="razonesAbout">
        <div class="main-razonesAbout">
            <div class="main-razonesAbout__content">
                <div class="main-razonesAbout__title">
                    <p><?php echo get_theme_mod('about-razones_title'); ?></p>
                </div>
                <div class="main-razonesAbout__items">
                    <div class="items-razonesAbout__content">
                        <div class="items-razonesAbout__img">
                            <img src="<?php echo get_theme_mod('about-razones_item1_img'); ?>" alt="">
                        </div>
                        <div class="items-razonesAbout__text">
                            <p><?php echo get_theme_mod('about-razones_item1_text'); ?></p>
                        </div>
                    </div>
                    <div class="items-razonesAbout__content">
                        <div class="items-razonesAbout__img">
                            <img src="<?php echo get_theme_mod('about-razones_item2_img'); ?>" alt="">
                        </div>
                        <div class="items-razonesAbout__text">
                            <p><?php echo get_theme_mod('about-razones_item2_text'); ?></p>
                        </div>
                    </div>
                    <div class="items-razonesAbout__content">
                        <div class="items-razonesAbout__img">
                            <img src="<?php echo get_theme_mod('about-razones_item3_img'); ?>" alt="">
                        </div>
                        <div class="items-razonesAbout__text">
                            <p><?php echo get_theme_mod('about-razones_item3_text'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="team">
        <div class="main-team">
            <div class="main-team__content">
                <div class="main-team__text">
                    <div class="main-team__subtitle">
                        <p>acerca de</p>
                    </div>
                    <div class="main-team__title">
                        <p>Nuestro team</p>
                    </div>
                </div>
                <div class="main-team__slider">
                    <?php $args = array( 'post_type' => 'Team');?>   
                    <?php $loop = new WP_Query( $args ); ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="team-slider__content">
                            <div class="team-slider__img">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            </div>
                            <div class="team-slider__text">
                                <div class="team-slider__name">
                                    <p> <?php the_title(); ?></p>
                                </div>
                                <div class="team-slider__details">
                                    <p><?php the_field( 'cargo_team' ); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>