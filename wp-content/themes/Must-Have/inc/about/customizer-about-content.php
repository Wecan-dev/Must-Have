<?php
 
  /***************** about-content  ******************/
  $wp_customize->add_section('about-content', array (
    'title' => 'Contenido Quienes Somos',
    'panel' => 'panel2'
  ));

  $wp_customize->add_setting('about-content_img', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-content_img_control', array (
    'description' => 'Imagen',
    'section' => 'about-content',
    'settings' => 'about-content_img',
  )));

  $wp_customize->add_setting('about-content_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'about-content_title_control', array (
    'description' => 'Titulo',
    'section' => 'about-content',
    'settings' => 'about-content_title',
  )));

  $wp_customize->add_setting('about-content_text', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-content_text_control', array (
    'description' => 'Texto',
    'section' => 'about-content',
    'settings' => 'about-content_text',
    'type' => 'textarea'
  )));
  
  
?>