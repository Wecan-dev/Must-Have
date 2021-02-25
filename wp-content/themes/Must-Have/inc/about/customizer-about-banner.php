<?php
 
  /***************** about-banner  ******************/
  $wp_customize->add_section('about-banner', array (
    'title' => 'Banners Quienes Somos',
    'panel' => 'panel2'
  ));

  $wp_customize->add_setting('about-banner_img1', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-banner_img1_control', array (
    'description' => 'Imagen 1',
    'section' => 'about-banner',
    'settings' => 'about-banner_img1',
  )));

  $wp_customize->add_setting('about-banner_img2', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-banner_img2_control', array (
    'description' => 'Imagen 2',
    'section' => 'about-banner',
    'settings' => 'about-banner_img2',
  )));

  $wp_customize->add_setting('about-banner_img3', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-banner_img3_control', array (
    'description' => 'Imagen 3',
    'section' => 'about-banner',
    'settings' => 'about-banner_img3',
  )));
  
  
?>