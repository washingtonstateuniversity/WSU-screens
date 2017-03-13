<?php

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'quote', 'link', 'image' ) );
add_post_type_support( 'page', 'post-formats' );

function screens_get_option( $option_name ) {
	$screens_options = get_option( 'screens_options' );

	// Defaults for the screens options will be compared to what is stored in screens_options.
	$defaults = array(
		'returnhome'             => '0',
	);
	
	$screens_options = wp_parse_args( $screens_options, $defaults );
	
	if ( isset( $screens_options[ $option_name ] ) ) {
		return $screens_options[ $option_name ];
	} else {
		return false;
	}
}

add_action( 'wp_enqueue_scripts', 'screens_wp_enqueue_scripts' );
	
function screens_wp_enqueue_scripts() {
	
	// Symbolfont
	wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css' );
	
	// Video JS
	wp_enqueue_script( 'videojs', get_stylesheet_directory_uri() . '/ui/video/video.dev.js', array('wsu-spine') );
	wp_enqueue_style( 'videojs', get_stylesheet_directory_uri() . '/ui/video/video-js.css', array('wsu-spine') );
	
	// On Screen Keyboard
	wp_enqueue_script( 'keyboard-js', get_stylesheet_directory_uri() . '/ui/keyboard/jquery.onScreenKeyboard.js', array('jquery') );
	wp_enqueue_style( 'keyboard-css', get_stylesheet_directory_uri() . '/ui/keyboard/onScreenKeyboard.css' );
	// wp_enqueue_script( 'keyboard-js', get_stylesheet_directory_uri() . '/ui/keyboard/js/jquery.keyboard.js', array('jquery') );
	// wp_enqueue_style( 'keyboard-css', get_stylesheet_directory_uri() . '/ui/keyboard/css/keyboard.css', array('jquery') );
	
	// Idle Timer
	if ( screens_get_option('returnhome') != "0" && ! is_page_template( 'templates/alumni-association.php' ) ) {
		wp_enqueue_script( 'idletimer', get_stylesheet_directory_uri() . '/ui/idle/idle-timer.1.0.1.min.js', array('jquery') );
	}
	
	// Screens Scripts
	wp_enqueue_script( 'wsu-screens-scripts', get_stylesheet_directory_uri() .'/scripts.js', array('wsu-spine'), spine_get_script_version() );

	// Alumni Association template styles
	if ( is_page_template( 'templates/alumni-association.php' ) ) {
		wp_enqueue_style( 'alumni-association', get_stylesheet_directory_uri() . '/alumni-association.css', array('wsu-spine') );
	}
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