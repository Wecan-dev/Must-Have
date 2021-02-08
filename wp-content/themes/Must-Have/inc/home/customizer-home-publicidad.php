<?php
 
  /***************** home_publicidad  ******************/
  $wp_customize->add_section('home_publicidad', array (
    'title' => 'Home Publicidad',
    'panel' => 'panel1'
  ));

  $wp_customize->add_setting('home_publicidad_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_publicidad_title_control', array (
    'description' => 'Título  ',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_title',
    'type' => 'textarea'
  )));

  $wp_customize->add_setting('home_publicidad_subtitle', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_publicidad_subtitle_control', array (
    'description' => 'Subtítulo',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_subtitle',
    'type' => 'textarea'
  )));

  $wp_customize->add_setting('home_publicidad_image_desktop');
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'home_publicidad_image_desktop_control', array (
    'description' => 'Imagen Desktop',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_image_desktop'
  )));

  $wp_customize->add_setting('home_publicidad_image_responsive');
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'home_publicidad_image_responsive_control', array (
    'description' => 'Imagen Responsive',
    'section' => 'home_publicidad',
    'settings' => 'home_publicidad_image_responsive'
  )));  

  
?>