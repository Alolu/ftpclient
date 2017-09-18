function goToByScroll(id){
	$('html, body').animate({scrollTop: $("#section"+id).offset().top},'slow');
	if( $(".active-nav").length ) {
		$(".active-nav").removeClass('active-nav');
	}
	$(".bt"+id).addClass('active-nav');
}
$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
