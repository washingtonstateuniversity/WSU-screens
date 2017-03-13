<?php
/* Template Name: Alumni Association */
// Provides a page without Patterson Wall branding

get_header();
?>

<main class="screens-page-default">

<?php get_template_part( 'parts/headers', 'alumni-association' ); ?>
<?php get_template_part( 'parts/featured-images' ); ?>

<section class="row single gutter">

	<div class="column one">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'formats/format' ); ?>

		<?php endwhile; ?>

	</div><!--/column-->

</section>

<?php get_template_part( 'parts/footers', 'alumni-association' ); ?>

</main>

<?php get_footer(); ?>
