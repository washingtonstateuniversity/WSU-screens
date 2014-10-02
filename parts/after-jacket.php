<?php

if ( ( screens_get_option('returnhome') != '0' ) && !is_front_page() ) {

	$idletime = screens_get_option('returnhome');
	$idletime = $idletime * 1000;

?>

<script>

(function($){

	$(document).idleTimer({
        timeout:<?php echo $idletime; ?>, 
        idle:false
    });
	
	$(document).on( "idle.idleTimer", function(){
	    window.location = '<?php echo get_home_url(); ?>';
	});

})(jQuery);

</script>

<?php

}

?>