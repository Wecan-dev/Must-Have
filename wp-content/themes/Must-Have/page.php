<?php if( get_the_content() != NULL){ ?>
    
    <?php
$variable = get_the_ID();
?>
    
    <?php
              // Include the page content template.
    /*  get_template_part( 'content', 'page' );*/
    ?>
    <?php get_header(); ?>
<div id="<?php the_ID(); ?>">
    <div class="content-termsConditions">
        <div class="title-termsConditions">
            <?php the_title(); ?>
        </div>
        <div class="text-termsConditions">
            <?php the_content(); ?>
        </div>
    </div>
</div>
    <?php get_footer(); ?>

    <?php

              // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;           
    ?>  
<?php } ?>