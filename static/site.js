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
     $search = $('.trigger--search');
    $search.on('click touchstart', function(event) {
        event.preventDefault();

        function openSearch(scrollPosition) {
            var scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            ];
            $('body').addClass('letssearch');
            $('.search-field').focus();
            var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
            html.data('scroll-position', scrollPosition);
            html.data('previous-overflow', html.css('overflow'));
            html.css('overflow', 'hidden');
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        }

        function closeSearch(scrollPosition) {
            var scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            ];
            $('body').removeClass('letssearch');
            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        }
        if ($('body').hasClass('letssearch')) {
            closeSearch();
        } else {
            openSearch();
        }
        $(document).keydown(function(event) {
            if (event.keyCode == 27) {
                closeSearch();
            }
        });
    });
    
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