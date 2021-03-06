<?php // SETUP VARIABLES
$videolink = get_post_meta($post->ID, 'video', TRUE);
$youtube = get_post_meta($post->ID, 'youtube', TRUE);
$vimeo = get_post_meta($post->ID, 'vimeo', TRUE);
$audiolevel = get_post_meta($post->ID, 'audiolevel', TRUE);
if ( $audiolevel == "") { $audiolevel = '.3';  }
if (has_tag('home')) { $loop = " loop"; $ytloop = "&loop=1"; } else { $loop = ""; $ytloop = ""; };
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<?php if ( $videolink != '' ) : ?>
				
	<video class="video-js vjs-default-skin" controls autoplay<?php echo esc_attr( $loop ); ?> preload="auto" width="1920" height="1080" poster="" data-setup='{"example_option":true}'>
		<source src="<?php echo esc_url( get_post_meta($post->ID, 'video', true) ); ?>" type='video/mp4' />
	</video>
	
	<script>
	if ($('video').length) {
		$('video').get(0).volume = <?php echo esc_js( $audiolevel ); ?>;
		}
	</script>
	
<?php elseif ( $youtube != '' ) : ?>

<!--<div id="ytplayer"></div>

<script>
  // Load the IFrame Player API code asynchronously.
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/player_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // Replace the 'ytplayer' element with an <iframe> and
  // YouTube player after the API code downloads.
  var player;
  function onYouTubePlayerAPIReady() {
    player = new YT.Player('ytplayer', {
      height: '1080',
      width: '1920',
      videoId: '<?php echo esc_url( get_post_meta($post->ID, 'youtube', true) ); ?>',
      controls: '0',
      autoplay: '1'
    });
  }
</script>-->
	
<iframe width="1920" height="1080" src="//www.youtube.com/embed/<?php echo urlencode( get_post_meta($post->ID, 'youtube', true) ); ?>?version=3&enablejsapi=1&rel=0&showinfo=0&autoplay=1&controls=0&html5=1<?php echo urlencode( $ytloop ); ?>&volume=100" frameborder="0"  scrolling="yes" allowfullscreen></iframe>
	
<?php endif; ?>
		
</article>