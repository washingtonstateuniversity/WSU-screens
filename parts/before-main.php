<?php
if ( has_nav_menu( 'binder-top' ) && ! is_page_template( 'templates/alumni-association.php' ) ) {
	wp_nav_menu( array( 'theme_location' => 'binder-top' ) );
}
