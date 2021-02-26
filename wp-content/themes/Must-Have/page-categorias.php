<?php get_header(); ?>


<section class="">
    <div class="category">
        <div class="main-category">
            <div class="main-category__title">
                <p>Categorías</p>
            </div>
            <div class="main-category__content">
                <?php $wcatTerm = get_terms('product_tag', array('hide_empty' => 0)); 
                foreach($wcatTerm as $wcatTer) : ?>
                    <div class="main-category__item">   
                        <div class="main-category__text">
                            <p>
                            <?php echo $wcatTer->description ?>
                            </p>
                        </div>
                        <div class="main-category__img">
                            <div class="main-category__img--content">
                                <img src="<?php echo termmeta_value_img('imagen_etiqueta_home', $wcatTer->term_id);?>" alt="">
                            </div>
                            <div class="main-category__img--btn item-categoria__btn">
                            <a href="<?php echo get_term_link( $wcatTer->slug, $wcatTer->taxonomy );?>"><?php echo $wcatTer->name ?></a>
                            </div>
                            <div class="item-category__mask"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>




<?php get_footer(); ?>