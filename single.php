<?php

get_header();

if (has_tag('featured')) {
	get_template_part( 'single', 'featured' );
} else {
	get_template_part( 'single', 'default' );
}

get_footer();