jQuery.noConflict(); (function($) {
    document.querySelector('.navbar-toggler').addEventListener('click', function() {
        this.classList.toggle('close-btn');
      });

    ///tiny-slider
    $('.related_articles_list').each(function(index, element) {
        var slider2 = tns({
            container: element,
            swipeAngle: false,
            autoHeight: true,
            items: 1,
            loop: true,
            swipeAngle: false,
            speed: 500,
            gutter: 20,
            mouseDrag: true,
            autoplay: true,
            controls: true,
            nav: false,
            responsive: {
                640: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                980: {
                    items: 3,
                },
                1400: {
                  items: 3,
                }
            }
        });
    });

    $(document).ready(function() {
        $('.navbar-toggler').click(function() {
          $(this).toggleClass('active');
        });
    });

    new WOW().init();
})(jQuery);