<?php
 
  /***************** home_contacto  ******************/
  $wp_customize->add_section('home_contacto', array (
    'title' => 'Home Info Contacto',
    'panel' => 'panel1'
  ));

  $wp_customize->add_setting('home_contacto_info', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_info_control', array (
    'label' => 'Ésta información corresponde al footer, vista de contacto y todo lugar dónde aparezcan las redes sociales',
    'description' => 'Texto de información',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_info',
    'type'=> 'textarea'
  )));

  $wp_customize->add_setting('home_contacto_youtube', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_youtube_control', array (
    'description' => 'Link de Tik Tok',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_youtube',
  )));

  $wp_customize->add_setting('home_contacto_facebook', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_facebook_control', array (
    'description' => 'Link de Facebook',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_facebook',
  )));
  $wp_customize->add_setting('home_contacto_insta', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_insta_control', array (
    'description' => 'Link de Instagram',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_insta',
  )));

	$wp_customize->add_setting('home_contacto_linkedin', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_linkedin_control', array (
    'description' => 'Link de LinkedIn',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_linkedin',
  )));
  
  $wp_customize->add_setting('home_contacto_phone', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_phone_control', array (
    'description' => 'Número de Teléfono',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_phone',
  )));

  $wp_customize->add_setting('home_contacto_email', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_email_control', array (
    'description' => 'Correo Electrónico',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_email',
  )));

  $wp_customize->add_setting('home_contacto_url_direc', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_url_direc', array (
    'description' => 'URL de Dirección',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_url_direc',
  )));

  $wp_customize->add_setting('home_contacto_text_direc', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_contacto_text_direc_control', array (
    'description' => 'Texto de direcion',
    'section' => 'home_contacto',
    'settings' => 'home_contacto_text_direc',
  )));
  
?>