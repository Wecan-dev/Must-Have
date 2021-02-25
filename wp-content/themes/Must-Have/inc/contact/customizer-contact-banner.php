<?php
 
  /***************** contact-banner  ******************/
  $wp_customize->add_section('contact-banner', array (
    'title' => 'Banner Contáctanos',
    'panel' => 'panel3'
  ));

  $wp_customize->add_setting('contact-banner_img1', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact-banner_img1_control', array (
    'description' => 'Imagen',
    'section' => 'contact-banner',
    'settings' => 'contact-banner_img1',
  )));

  $wp_customize->add_setting('contact-banner_text', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact-banner_text_control', array (
    'description' => 'Titulo',
    'section' => 'contact-banner',
    'settings' => 'contact-banner_text',
  )));
  
  
?>