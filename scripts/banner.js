"use strict" //Active "strict mode" in JavaScript

$('.banner').unslider({
    autoplay: true,// autoplay
    speed: 700, // The speed to animate each slide (in milliseconds)
    delay: 2600, // The delay between slide animations (in milliseconds)
    keys: true, // Enable keyboard (left, right) arrow shortcuts
    dots: true, // Display dot navigation
    animation: 'horizontal', //each slide moves from left to right, I also add some effects on css
    fluid: false, // Support responsive design. May break non-responsive designs
    pause: true, // Pause the slide images on mouse hover
});

var unslider = $('.banner').unslider();

$('.unslider-arrow').click(function () {
    var fn = this.className.split(' ')[1];

    //  Either do unslider.data('unslider').next() or .prev() depending on the className
    unslider.data('unslider')[fn]();
});