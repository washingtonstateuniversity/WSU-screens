<?php get_header(); ?>

<main class="home">

<button id="reload"></button>

<?php $args = array(
	'posts_per_page'   => 1,
	'offset'           => 0,
	'category'         => '',
	'tag'			   => 'home',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true );
?>

<?php $posts_home = get_posts( $args );
	
	foreach ( $posts_home as $post ) : setup_postdata( $post );
	$menucolor = get_post_meta($post->ID, 'menucolor', TRUE);
		get_template_part( 'content', get_post_format() );
	endforeach; 
	wp_reset_postdata();
?>

<header>
<nav class="<?php echo ' ' . esc_attr( $menucolor ); ?>">
	<button id="menu" class="closed touchy">
		<menu>
		<ul id="featured">
		<?php $args = array(
			'numberposts' => 10, 'offset' => 0, 'tag' => 'featured', 'orderby' => 'post_date', 'order' => 'DESC', 'suppress_filters' => true );
			$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . esc_url( get_permalink( $recent["ID"] ) ) . '" title="' . esc_attr( $recent["post_title"] ) . '" >' . $recent["post_title"].'</a> </li> ';
			}
		?>
		</ul>
		</menu>
	</button>
</nav>
</header>


</main>

<?php get_footer(); ?>