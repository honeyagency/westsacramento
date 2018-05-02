function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,es,ru',
    }, 'google_translate_element');
}
jQuery(document).ready(function($) {
    var myLazyLoad = new LazyLoad({
        // example of options object -> see options section
        threshold: 500,
        throttle: 30,
        show_while_loading: false,
    });
    if ($('.section--base-stories').length > 0) {
        $('.section--base-stories').flickity({
            // options
            cellAlign: 'left',
            adaptiveHeight: true,
            prevNextButtons: false,
            pageDots: true
        });
    }
    if ($('.section--success-stories').length > 0) {
        $('.section--success-stories').flickity({
            // options
            cellAlign: 'left',
            adaptiveHeight: true,
            prevNextButtons: false,
            pageDots: true
        });
    }
    $('#trigger-translate').on('click touchstart', function(event) {
        event.preventDefault();
        $wrap = $(this).parent('.section--language').find('.block--translate');
        $wrap.toggleClass('open');
    });
    if (window.matchMedia('(max-width: 768px)').matches) {
        var mob = true;
    } else {
        var mob = false;
    }
    if (mob == true) {
        $('.menu--trigger').on('click touchstart', function(event) {
            event.preventDefault();
            $('.menu-item-has-children.open').removeClass('open');
            $('body').toggleClass('open');
        });
        $('.trigger--sub').on('click touchstart', function(event) {
            event.preventDefault();
            $parent = $(this).parent('.menu-item-has-children');
            if ($parent.hasClass('open')) {
                $('.menu-item-has-children.open').removeClass('open');
            } else {
                $('.menu-item-has-children.open').removeClass('open');
                $parent.toggleClass('open');
            }
        });
    } else {}
});