
$('.navbar .dropdown').hover(function() {
	$(this).find('.dropdown-menu').first().stop(true, true).delay(10).slideDown();
}, function() {
	$(this).find('.dropdown-menu').first().stop(true, true).delay(10).slideUp()
});


//Hamburger menu toggle
$(".navbar-nav li a").click(function (event) {
	// check if window is small enough so dropdown is created
	var toggle = $(".navbar-toggle").is(":visible");
	if (toggle) {
		$(".navbar-collapse").collapse('hide');
	}
});

//hide menu click on anywhere
$(document).on('click',function(){
    $('.collapse').collapse('hide');
})


$(window).resize(function() {
	setthumbsize();
});

$(".myval").select2({
   width: "100%",
   dropdownAutoWidth: true,
 });


/* tooltip */
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


/* remove space */
function removeSpaces(string) {
	return string.split(' ').join('');
}



/* height via jS */
$('document').ready(function() {
	$('.company-contact-details').css({'height': $('.company-description .company-content').innerHeight()});
});


/* back to top */
$(document).ready(function(){
			
	//on scroll, show the back to top button
	$(window).scroll(function(){
		if($(window).scrollTop() >= 1){ //if user has scrolled the window
			$('.backToTop').fadeIn(500); // show the back to top button
		}else { // else if user is at the top already
			$('.backToTop').fadeOut(500); //hide the back to top button
		}
	});

	//scroll the page to the top if user clicks on the back to top button
	$('.backToTop').click(function(){
		$('html,body').animate({ scrollTop: 0 }, 'slow');
	});

	//checks if page was already scrolled down before load
	if($(window).scrollTop() >= 1){
		$('.backToTop').show(); // show the back to top button
	}
});
