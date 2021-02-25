<?php
 
  /***************** contact-content  ******************/
  $wp_customize->add_section('contact-content', array (
    'title' => 'Mapa de ubicación',
    'panel' => 'panel3'
  ));


  $wp_customize->add_setting('contact-content_text', array(
    'default' => ''
  ));
  
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact-content_text_control', array (
    'description' => 'Iframe',
    'section' => 'contact-content',
    'settings' => 'contact-content_text',
    'type' => 'textarea'
  )));
  
  
?>