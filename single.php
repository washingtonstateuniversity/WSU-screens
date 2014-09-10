<?php get_header(); ?>

<?php if (has_tag('featured')) {
		get_template_part( 'single', 'featured' );
	} else {
		get_template_part( 'single', 'default' );
	}
?>

<?php get_footer(); ?>