/* General Pinbin Functions
================================================== */

// masonry customization
jQuery(document).ready(function($) {
  $('#post-area').masonry({
    // options...
  isAnimated: true,
  animationOptions: {
    duration: 400,
    easing: 'linear',
    queue: false
  }
	
  });
});