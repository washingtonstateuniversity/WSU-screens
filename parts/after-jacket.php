<script>

(function($){

<?php

$idletime = '0';

if ( ( screens_get_option('returnhome') != '0' ) && !is_front_page() ) {

	$idletime = screens_get_option('returnhome');
	$idletime = $idletime * 1000;

	$idletime_override = get_post_meta( get_the_ID(), 'idle-time', true );

	if( ! empty( $idletime_override ) && $idletime_override != '0' ) {
	
		$idletime = $idletime_override;
		$idletime = $idletime * 1000;
	
	}

	if( $idletime != '0' ) {
	
?>

	$(document).idleTimer({
        timeout:<?php echo $idletime; ?>, 
        idle:false
    });
	
	$(document).on( "idle.idleTimer", function(){
	    window.location = '<?php echo get_home_url(); ?>';
	});
	
<?php
	}
}

?>

})(jQuery);

</script>