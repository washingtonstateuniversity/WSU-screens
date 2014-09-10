<?php // SETUP VARIABLES
	$format = get_post_format();
	$menucolor = get_post_meta($post->ID, 'menucolor', TRUE);
	$videolink = get_post_meta($post->ID, 'video', TRUE);
	?>

<main class="featured<?php echo " ".$menucolor; ?>">

<button id="reload"></button>


<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'formats/format', get_post_format() ); ?>

<?php endwhile; // end of the loop. ?>

<header>
	
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
	
</header>


</main>
