// Optional params for foundation
$(document).foundation();

// Enhance responsiveness on mobile
$(function() {
    FastClick.attach(document.body);
});

// Slider parameters
$(".slider").responsiveSlides({
    auto: true,             // Boolean: Animate automatically, true or false
    speed: 1500,            // Integer: Speed of the transition, in milliseconds
    timeout: 6000,          // Integer: Time between slide transitions, in milliseconds
    pager: false,           // Boolean: Show pager, true or false
    nav: false,             // Boolean: Show navigation, true or false
    random: true,           // Boolean: Randomize the order of the slides, true or false
    pause: false,           // Boolean: Pause on hover, true or false
    pauseControls: true,    // Boolean: Pause when hovering controls, true or false
    prevText: "Previous",   // String: Text for the "previous" button
    nextText: "Next",       // String: Text for the "next" button
    maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
    navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
    manualControls: "",     // Selector: Declare custom pager navigation
    namespace: "slider",    // String: Change the default namespace used
    before: function(){},   // Function: Before callback
    after: function(){}     // Function: After callback
});

// Global transition params
var bezier = 'cubic-bezier(0,0.9,0.3,1)'; // Easing bezier
var timing = 500; // Timing in ms

// Navigation panel display events
$('.off-canvas-toggle').click(function() { 
    $('nav.mobile aside, nav.mobile').addClass('show').transition({ x:'0' }, timing, bezier ); 
});

$('nav.mobile aside, nav.mobile').click(function() { 
    $('nav.mobile aside').transition({ x:'14em' }, timing, 'ease-in', function() { 
        $('nav.mobile').removeClass('show'); 
    }) 
});

// Subscribe panel display events
$('.subscribe-button').click(function() { 
    $('.subscribe-panel').addClass('show').transition({ y:'0' }, timing, bezier ); 
});

$('.close').click(function() { 
    $('.subscribe-panel').transition({ y:'-100%' }, function() { 
        this.removeClass('show'); 
    }) 
});

// Login panel display events
$('.login-button').click(function() { 
    $('.login-panel').addClass('show').transition({ y:'0' }, timing, bezier );
});

$('.close').click(function() { 
    $('.login-panel').transition({ y:'-100%' }, function() { 
        this.removeClass('show'); 
    }) 
});

// Video overlay display events
$('.video-trigger').click(function() { 
    $('.video-overlay').addClass('show').transition({ opacity:'1' }, timing, bezier, function() {
        $('.video-overlay .flex-video').addClass('show');
    }); 
});

$('.video-overlay').click(function() { 
    $('.video-overlay').transition({ opacity:'0' }, function() { 
        $('.video-overlay .flex-video').removeClass('show');
        $('.video-overlay .flex-video iframe').attr("src", "");
        this.removeClass('show'); 
    }) 
});

// Gallery click events
$('.gallery-thumb').click(function() {
    if( $(this).hasClass('show') ) {
        $(this).transition({ 'padding-bottom':'0', 'width':'236px' }, timing, bezier );
        $(this).removeClass('show');
        $(this).next().removeClass('show');
    } else if($(this).hasClass('landscape')) {
        $(this).transition({ 'width':'100%', 'padding-bottom':'67%' }, timing, bezier, function() {
            $(this).addClass('show');
            $(this).next().addClass('show');
        });
    } else if($(this).hasClass('portrait')) {
        $(this).transition({ 'width':'100%', 'padding-bottom':'150%' }, timing, bezier, function() {
            $(this).addClass('show');
            $(this).next().addClass('show');
        });
    }
});

// Scroll down click events
$('.scroll-down').click(function() {
    $("html, body").animate({ scrollTop: $('.slider-container').height() }, "slow");
})

// Scroll down click events
$('.to-top').click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
})
