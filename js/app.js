$(window).scroll(function(){
    if ($(this).scrollTop() > 195) {
        $('.menu-mobile').addClass('fixed');
    } else {
        $('.menu-mobile').removeClass('fixed');
    }
});

// Navigation panel display events
$('.off-canvas-toggle').click(function () { 
    $('nav.mobile aside, nav.mobile').addClass('show').transition({ x:'0' }, 500, 'cubic-bezier(0,0.9,0.3,1)' ); 
});

$('nav.mobile aside, nav.mobile').click(function () { 
    $('nav.mobile aside').transition({ x:'12em' }, function() { 
        $('nav.mobile').removeClass('show'); 
    }) 
});

// Subscribe panel display events
$('.subscribe-button').click(function () { 
    $('.subscribe-panel').addClass('show').transition({ y:'0' }, 500, 'cubic-bezier(0,0.9,0.3,1)' ); 
});

$('.close').click(function () { 
    $('.subscribe-panel').transition({ y:'-100%' }, function() { 
        this.removeClass('show'); 
    }) 
});