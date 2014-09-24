(function($){

$(document).ready( function(){

	// jQuery("input").prop("placeholder","Search").addClass("placed");
	
	$(".unbox tbody tr").on('ready mouseup touchend', function(){
		
		$('.unboxed').removeClass('unboxed');
		$(this).addClass('unboxed');
		
		$(document).mouseup(function (e) {
		
			    var container = $(".unboxed");
			
			    if ( ( !container.is(e.target) && container.has(e.target).length === 0 ) || ( container.is(e.target) && container.has(e.target).length === 0 ) ) {
						container.removeClass("unboxed");
					}
			});
	
	});
	
	$(".unfold tbody tr").on('ready mouseup touchend', function(){
		
		$('.unfolded').removeClass('unfolded');
		$(this).addClass('unfolded');
		
		$(document).mouseup(function (e) {
		
			    var container = $(".unfolded");
			
			    if ( ( !container.is(e.target) && container.has(e.target).length === 0 ) || ( container.is(e.target) && container.has(e.target).length === 0 ) ) {
						container.removeClass("unfolded");
					}
			});
	
	});
		
	
	$('input').on('focus',function(){
		$(this).onScreenKeyboard();
		alert("hello");
	});
	
	$(".menu li").on('mouseup touchend', function() {
		
		$(this).siblings('li').removeClass('opened');
		$(this).toggleClass('opened');
		
		});

	$("div:not(#spine) .menu li.current").addClass('dogeared').parents('li').addClass('parent').addClass('active');
		

});

jQuery(document).on('ready mouseup touchend', function(){
	
	
	var maxmenu = function() {
		var menu_width = jQuery('#featured').width();
		var menu_height = jQuery('#featured').height();
		var menu_height = menu_height + 105;
		jQuery(this).removeClass('closed').addClass('opened');
		jQuery(this).animate({height: menu_height}, 200);
		jQuery(this).width(menu_width);
		jQuery(this).unbind("click", maxmenu).bind("click", minmenu);
    }
	var minmenu = function() {
		jQuery(this).removeClass('opened').addClass('closed');
		jQuery(this).animate({height: '105'}, 100);
		jQuery(this).width('100px');
		jQuery(this).unbind("click", minmenu).bind("click", maxmenu);
    }

	jQuery("button#menu.closed").bind("click", maxmenu);

	/*
	
	jQuery("button#menu.closed").click(function() {
		 
		 jQuery("button#menu.opened").click(function() {
		 	jQuery(this).removeClass('opened').addClass('closed');
			jQuery(this).animate({height: '105'}, 0);
			jQuery(this).width('100px');
		 	});
		 });
		*/
		
	jQuery('button#reload').click(function() {
    	location.reload();
		});
	
	if (jQuery('video').length) {
		jQuery("#pauseplay.play").click(function() {
		jQuery("video").get(0).pause();
		jQuery(this).removeClass('play').addClass('pause');
		jQuery(this).unbind("click");
		jQuery("#pauseplay.pause").click(function() {
			jQuery("video").get(0).play();
			jQuery(this).removeClass("pause").addClass("play");
		});
	});
	
	jQuery("#mute.unmuted").click(function() {
		jQuery("video").prop('muted', true);
		jQuery(this).removeClass('unmuted').addClass('muted');
		jQuery(this).unbind("click");
		jQuery("#mute.muted").click(function() {
			jQuery("video").prop('muted', false);
			jQuery(this).removeClass("muted").addClass("unmuted");
		});
	});
	
	
	
	
	var video = 'mark';
	var video = jQuery('video');
	var video = video.get(0);
	window.setInterval(function(){
	if (video.paused) {
		window.setInterval(function(){
		if (video.paused) {
			window.location = '/walls/';
			}
		}, 10000);
		}
	}, 1000);
	
	};
	
});


})(jQuery);






