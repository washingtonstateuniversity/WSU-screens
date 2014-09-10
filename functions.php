<?php

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'quote', 'link', 'image','award' ) );

add_action( 'wp_enqueue_scripts', 'screens_wp_enqueue_scripts' );
	
function screens_wp_enqueue_scripts() {
	//  Screens Styles
	wp_enqueue_style( 'sspika', get_stylesheet_directory_uri() . '/repo/pika/webfonts/ss-pika.css', array(), spine_get_script_version() );
	wp_enqueue_style( 'videojs', get_stylesheet_directory_uri() . '/scripts/video/video-js.css', array(), spine_get_script_version() );
	
	// Screens Scripts
	wp_enqueue_script( 'videojs', get_stylesheet_directory_uri() . '/scripts/video/video.js' );
	wp_enqueue_script( 'wsu-screens', get_stylesheet_directory_uri() .'/scripts/scripts.js', array(), spine_get_script_version() );
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
