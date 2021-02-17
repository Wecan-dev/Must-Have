<?php
 
  /***************** home_publicidad  ******************/
  $wp_customize->add_section('home_publicidad', array (
    'title' => 'Home Publicidad',
    'panel' => 'panel1'
  ));

  $wp_customize->add_setting('home_contacto_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_publicidad_title_control', array (
    'description' => 'Título  ',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_title',
  )));

  $wp_customize->add_setting('home_publicidad_text', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_publicidad_text_control', array (
    'description' => 'Texto',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_text',
    'type' => 'textarea'
  )));

  $wp_customize->add_setting('home_publicidad_btn', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_publicidad_btn_control', array (
    'description' => 'Texto de botón',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_btn',
  )));
  $wp_customize->add_setting('home_publicidad_url', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_publicidad_url_control', array (
    'description' => 'URL de botón',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_url',
  )));

  $wp_customize->add_setting('home_publicidad_image');
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'home_publicidad_image_control', array (
    'description' => 'Imagen',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_image'
  )));


  
?>