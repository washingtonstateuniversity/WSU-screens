<?php

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'quote', 'link', 'image' ) );
add_post_type_support( 'page', 'post-formats' );

add_action( 'wp_enqueue_scripts', 'screens_wp_enqueue_scripts' );
	
function screens_wp_enqueue_scripts() {
	
	// Symbolfont
	wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css' );
	
	// Video JS
	wp_enqueue_script( 'videojs', get_stylesheet_directory_uri() . '/ui/video/video.dev.js' );
	wp_enqueue_style( 'videojs', get_stylesheet_directory_uri() . '/ui/video/video-js.css' );
	
	// On Screen Keyboard
	wp_enqueue_script( 'videojs', get_stylesheet_directory_uri() . '/ui/keyboard/jquery.onScreenKeyboard.min.js' );
	wp_enqueue_style( 'videojs', get_stylesheet_directory_uri() . '/ui/keyboard/onScreenKeyboard.css' );
	
	// Screens Scripts
	wp_enqueue_script( 'wsu-screens', get_stylesheet_directory_uri() .'/scripts.js', array(), spine_get_script_version() );
}
	
add_action('wp_head', 'header_meta');

function header_meta() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

function spine_register_menu_locations() {
  register_nav_menu('body-top',__( 'Body (Top)' ));
  register_nav_menu('body-bottom',__( 'Body (Bottom)' ));
  register_nav_menu('jacket-top',__( 'Jacket (Top)' ));
  register_nav_menu('jacket-bottom',__( 'Jacket (Bottom)' ));
  register_nav_menu('binder-top',__( 'Binder (Top)' ));
  register_nav_menu('binder-bottom',__( 'Binder (Bottom)' ));
  register_nav_menu('main-top',__( 'Main (Top)' ));
  register_nav_menu('main-bottom,',__( 'Main (Bottom)' ));
  register_nav_menu('side-top',__( 'Side (Top)' ));
  register_nav_menu('side-bottom',__( 'Side (Bottom)' ));
}
add_action( 'init', 'spine_register_menu_locations' );

function screens_customize_register( $wp_customize ){

	// Style Options
	$wp_customize->add_section('section_screens', array(
		'title'    => __('Screens Options', 'spine'),
		'priority' => 100,
		'description' => '',
	));

	$wp_customize->add_setting('screens_options[aspect_ratio]', array(
		'default'        => 'unspecified',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('screens_aspect_ratio', array(
		'settings'   => 'screens_options[aspect_ratio]',
		'label'      => __('Aspect Ratio', 'spine'),
		'section'    => 'section_screens',
		'type'       => 'select',
		'choices'    => array(
			'unspecified' => 'Unspecified',
			'16-9' => '16-9 (1080p, 720p)',
			'4-3' => '4-3'
		),
	));
	
	$wp_customize->add_setting('screens_options[orientation]', array(
		'default'        => 'landscape',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('screens_orientation', array(
		'settings'   => 'screens_options[orientation]',
		'label'      => __('Orientation', 'screens'),
		'section'    => 'section_screens',
		'type'       => 'select',
		'choices'    => array(
			'landscape' => 'Landscape',
			'portrait' => 'Portrait'
		),
	));

	$wp_customize->add_setting('screens_options[returnhome]', array(
		'default'        => '0',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('screens_returnhome', array(
		'settings'   => 'screens_options[returnhome]',
		'label'      => __('Return Home', 'screens'),
		'description'    => 'Returns to home page when idle for specified number of seconds... (0 for no return)',
		'section'    => 'section_screens',
		'type'       => 'text',
	));
	
}
add_action('customize_register', 'screens_customize_register');

function wall_posted_on() {
	return '';
}

function wall_categorized_blog() {
	return false;
}
?>