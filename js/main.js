$(".btn_modal").fancybox({
    'padding'    : 0
});
// Nav {
(function() {
    $('.nav_toggle').on('click touchstart', function(e){
        e.preventDefault();
        $(this).closest('.header').toggleClass('nav_open');
    });
    //$('.lng__dropdown a').on('click touchstart', function(e){
     //   e.preventDefault();
     //   $(this).closest('.lng').removeClass('open');
    //});
}());
// lng
(function() {
    $('.lng__active').on('click touchstart', function(e){
        e.preventDefault();
        $(this).closest('.lng').addClass('open');
    });
  //  $('.lng__dropdown a').on('click touchstart', function(e){
        //e.preventDefault();
   //     $(this).closest('.lng').removeClass('open');
 //   });

}());

// Auth
// (function() {
//     $('.btn_auth').on('click touchstart', function(e){
//         e.preventDefault();
//         var box =  $('#auth');
//         var tab = '#' + $(this).attr("data-target");
//         var nav = '.' + $(this).attr("data-target");
//         //console.log(tab);
//         box.find('.tabs_nav').find('li').removeClass('active');
//         box.find(nav).addClass('active');
//         box.find('.tabs_item').removeClass('active');
//         box.find(tab).addClass('active');
//         $('.auth_open').trigger('click');
//     });
// }());

// Tabs
(function() {
    $('.tabs_nav li a').on('click touchstart', function(e){
        e.preventDefault();
        var tab = $($(this).attr("href"));
        var box = $(this).closest('.tabs');
        $(this).closest('.tabs_nav').find('li').removeClass('active');
        $(this).closest('li').addClass('active');
        box.find('.tabs_item').removeClass('active');
        box.find(tab).addClass('active');
    });

}());
// Hide dropdown
$('body').click(function (event) {
    if ($(event.target).closest(".lng").length === 0) {
        $(".lng").removeClass('open');
    }
});
// Animation

wow = new WOW(
    {
        boxClass:     'wow',    
        animateClass: 'animated', 
        offset:       80,       
        mobile:       true,      
        live:         true       
    }
)
wow.init();