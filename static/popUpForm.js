jQuery(document).ready(function($) {
    $form = $('.trigger--email');
    $form.on('click touchstart', function(event) {
        event.preventDefault();


        function openForm(scrollPosition) {
            var scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            ];
            $('body').addClass('emailopen');
            var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
            html.data('scroll-position', scrollPosition);
            html.data('previous-overflow', html.css('overflow'));
            html.css('overflow', 'hidden');
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        }

        function closeForm(scrollPosition) {
            var scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            ];
            $('body').removeClass('emailopen');
            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        }
        if ($('body').hasClass('emailopen')) {
            closeForm();
        } else {
            openForm();
        }
        $(document).keydown(function(event) {
            if (event.keyCode == 27) {
                closeForm();
            }
        });
        $('.trigger--close').on('click touchstart', function(event) {
            event.preventDefault();
            closeForm();
        });
    });
});