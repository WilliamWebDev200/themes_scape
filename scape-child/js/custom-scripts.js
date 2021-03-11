jQuery(document).ready(function($) {

    // for image background
    $('.image-background').each(function() {
        var getImageSrc = $(this).find('img').attr('src');
        var getImageErrorSrc = $(this).find('img').attr('onerror');
        if (typeof(getImageErrorSrc) != 'undefined') {
            getImageErrorSrc = getImageErrorSrc.slice(10);
            getImageErrorSrc = getImageErrorSrc.slice(0, -1);
        } else {
            getImageErrorSrc = getImageSrc;
        }
        $(this).css({
            'background-size': 'cover',
            'background-repeat': 'no-repeat',
            'background-position': 'center',
            'background-image': 'url("' + getImageSrc + '")'
        });
        $(this).find('img').on('error', function() {
            $(this).parents('.image-background:first').css({
                'background-image': 'url("' + getImageErrorSrc + '")'
            });
        });
    });


    $("trim-word").text(function(index, currentText) {
        return currentText.substr(0, 205);
    });



});


jQuery(document).ready(function($) {

    $('.slide-wrapper').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });

});