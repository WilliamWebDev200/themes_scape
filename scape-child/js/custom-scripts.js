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


jQuery(document).ready(function($) {
    jQuery(".btn--options").click(function() {
        jQuery(".mobile-sidebar-option").toggleClass('mobile-sidebar-option--active');
        jQuery(".mobile-sidebar-option__modal").toggleClass('mobile-sidebar-option__modal--active');
        jQuery(".mobile-sidebar-option__sidebar").toggleClass(' mobile-sidebar-option__sidebar--slide');

    });
});

jQuery(document).ready(function($) {
    jQuery(".mobile-sidebar-option__closebox").click(function() {
        jQuery(".mobile-sidebar-option__modal").removeClass('mobile-sidebar-option__modal--active');
        jQuery(".mobile-sidebar-option__sidebar").removeClass('mobile-sidebar-option__sidebar--slide');
    });
});

jQuery(document).ready(function($) {
    jQuery(".mobile-sidebar-option__closebox--icon").click(function() {
        jQuery(".mobile-sidebar-option__modal").removeClass('mobile-sidebar-option__modal--active');
        jQuery(".mobile-sidebar-option__sidebar").removeClass('mobile-sidebar-option__sidebar--slide');
    });
});




jQuery(document).ready(function($) {
    jQuery(".desktop-sidebar-option").click(function() {
        jQuery(".bulk-apparel-blog-detail__left").toggleClass('bulk-apparel-blog-detail__left--sidebar-active');
        jQuery(".bulk-apparel-blog-detail__right").toggleClass('bulk-apparel-blog-detail__right--sidebar-active');
    });
});