<?php
 
  /***************** about-razones  ******************/
  $wp_customize->add_section('about-razones', array (
    'title' => 'Razones Quienes Somos',
    'panel' => 'panel2'
  ));

  $wp_customize->add_setting('about-razones_title', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'about-razones_title_control', array (
    'description' => 'Titulo',
    'section' => 'about-razones',
    'settings' => 'about-razones_title',
  )));

  $wp_customize->add_setting('about-razones_item1_img', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-razones_item1_img_control', array (
    'description' => 'Imagen Item 1',
    'section' => 'about-razones',
    'settings' => 'about-razones_item1_img',
  )));

  $wp_customize->add_setting('about-razones_item1_text', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-razones_item1_text_control', array (
    'description' => 'Texto Item 1',
    'section' => 'about-razones',
    'settings' => 'about-razones_item1_text',
    'type' => 'textarea'
  )));
  
  $wp_customize->add_setting('about-razones_item2_img', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-razones_item2_img_control', array (
    'description' => 'Imagen Item 2',
    'section' => 'about-razones',
    'settings' => 'about-razones_item2_img',
  )));

  $wp_customize->add_setting('about-razones_item2_text', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-razones_item2_text_control', array (
    'description' => 'Texto Item 2',
    'section' => 'about-razones',
    'settings' => 'about-razones_item2_text',
    'type' => 'textarea'
  )));

  $wp_customize->add_setting('about-razones_item3_img', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-razones_item3_img_control', array (
    'description' => 'Imagen Item 3',
    'section' => 'about-razones',
    'settings' => 'about-razones_item3_img',
  )));

  $wp_customize->add_setting('about-razones_item3_text', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about-razones_item3_text_control', array (
    'description' => 'Texto Item 3',
    'section' => 'about-razones',
    'settings' => 'about-razones_item3_text',
    'type' => 'textarea'
  )));
  
?>