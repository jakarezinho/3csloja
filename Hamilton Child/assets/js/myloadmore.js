jQuery(function ($) {

    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
        bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts
    ///
    // Add class to elements when they're in view
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop(),
            docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top,
            elemBuffer = $(window).width > 600 ? 200 : 50,
            elemBottom = elemTop + elemBuffer;

        return (elemBottom <= docViewBottom);
    }

    function fadeInSpotted() {
        $('.tracker').each(function () {
            $(this).addClass('will-spot');
            if ($(this).offset().top < $(window).height()) {
               $(this).addClass('spotted');
            }
        });
    }

    if ($('.tracker').length) {
        $(window).on('load', function () {
            fadeInSpotted();
        });
        $(window).scroll(function () {
            $('.tracker').each(function () {
                if (isScrolledIntoView(this) === true) {
                   $(this).addClass('spotted');
                }
            });
        });
    }

    ////
    $container = $('#posts');
    $container.css({ 'opacity': 0 });
    $('#fim').css({ 'opacity': 0 });

    $container.masonry({
        percentPosition: true,
        transitionDuration: 0,
        itemSelector: '.post-preview'
    });



    $(window).scroll(function () {

        var data = {
            'action': 'loadmore',
            'query': misha_loadmore_params.posts,
            'page': misha_loadmore_params.current_page
        };
        if ($(document).scrollTop() > ($(document).height() - bottomOffset) && canBeLoaded == true) {

            $.ajax({
                url: misha_loadmore_params.ajaxurl,
                data: data,
                type: 'POST',
                beforeSend: function (xhr) {
                    // you can also add your own preloader here
                    // you see, the AJAX call is in process, we shouldn't run it again until complete
                    canBeLoaded = false;
                },
                success: function (data) {
                    if (data) {
                        el = $(data)
                        $container.imagesLoaded().done(function () {
                            $container.append(el).masonry('appended', el)
                            fadeInSpotted();
                            $container.animate({ opacity: 1.0 }, 500);
                            setTimeout(function () {
                                $container.masonry();

                            }, 500);

                        });

                        // $container.masonry().append( data).masonry( 'appended',data )
                        canBeLoaded = true; // the ajax is  completed, now we can run it again
                        misha_loadmore_params.current_page++;

                    }
                }

            });
        }



    });
});