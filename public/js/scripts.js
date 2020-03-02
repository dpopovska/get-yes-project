$(function(){
	/*
	* SCROLL DOWN TO HOME RECENT NEWS
	*/
    $(".hts-scroll-down").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#recent-news-section").offset().top
	    }, 1000);
    });

    /*
	* HIDE ERROR/INFO/SUCCESS MESSAGES
	*/
    $(".ln-close").click(function() {
    	$(this).parent().fadeOut();
    });
    
   /*
	* LOAD RANDOM IMAGE WHEN HOME PAGE IS REFRRESHED
	*/
    var images = ['top-section-bg.jpg', 'salkantay-say-expeditions.jpg', 'La_trampa_carrusel_1.jpg', 'P-215II_slideshow_2_tcm14-1377675.jpg'];
	$(".home-top-section").css({'background-image': 'url(images/'+images[Math.floor(Math.random() * images.length)]});

});
