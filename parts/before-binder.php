<button id="reload"></button>

<?php

if ( has_nav_menu( 'jacket-top' ) ) {
	wp_nav_menu( array( 'theme_location' => 'jacket-top' ) );
}