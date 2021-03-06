<?php get_header(); ?>

<main class="screens-page-default">

<?php get_template_part('parts/headers'); ?>
<?php get_template_part('parts/featured-images'); ?>

<section class="row side-right gutter">

	<div class="column one">
	
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part('format/format'); ?>
		
		<?php endwhile; ?>
		
	</div><!--/column-->

	<div class="column two">
		
		<?php get_sidebar(); ?>
		
	</div><!--/column two-->

</section>

</main>

<?php get_footer(); ?>