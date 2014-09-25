<?php get_header();

get_template_part( 'parts/headers' );
get_template_part( 'parts/featured-images' );

// SETUP VARIABLES
$format = get_post_format();
$menucolor = get_post_meta( $post->ID, 'menucolor', TRUE );
$videolink = get_post_meta( $post->ID, 'video', TRUE );

?>

<main class="featured<?php echo " ".$menucolor; ?>">

<button id="reload"></button>

<nav>
	<?php if ( $format == 'video' && $videolink != '' ) : ?>
		<button id="pauseplay" class="play ss-pause"></button>
		<button id="mute" class="unmuted ss-highvolume"></button>
	<?php endif; ?>
	<button id="menu" class="closed touchy">
		<menu>
		<ul id="featured">
		<?php $args = array(
			'numberposts' => 10,
			'offset' => 0,
			'tag' => 'featured',
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_status' => 'publish',
			'suppress_filters' => true );

			$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
			foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="'.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
					}
		?>
		</ul>
		</menu>
	</button>
</nav>

<?php get_template_part('parts/headers'); ?>

<?php if ( spine_has_featured_image() ) : ?> 
<?php $featured_image_src = spine_get_featured_image_src(); ?>
<figure class="featured-image" style="background-image: url('<?php echo $featured_image_src ?>');">
	<?php spine_the_featured_image(); ?>
</figure>
<?php endif; ?>

<section class="row side-right gutter pad-ends">

	<div class="column one">
	
		<?php while ( have_posts() ) : the_post(); ?>
				
			<?php get_template_part( 'formats/format', get_post_format() ); ?>

			<?php // get_comments( ); ?>

		<?php endwhile; ?>
		
	</div><!--/column-->

	<div class="column two">
		
		<?php get_sidebar(); ?>
		
	</div><!--/column two-->

</section>

<footer class="main-footer">
	<section class="row halves pager prevnext gutter">
		<div class="column one">
			<?php previous_post_link(); ?> 
		</div>
		<div class="column two">
			<?php next_post_link(); ?>
		</div>
	</section><!--pager-->
</footer>

</main><!--/#page-->

<?php get_footer(); ?>