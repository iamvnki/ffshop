/* ========= INFORMATION ============================
	- author:    Dmytro Lobov
	- url:       https://wow-estore.com
	- email:     d@dayes.dev
==================================================== */

'use strick';

(function ($) {

    //region Send Form
    $('#wow-plugin').on('submit', function (event) {
        event.preventDefault();
        getTinymceContent();
        let dataform = $(this).serialize();
        let prefix = $('#prefix').val();
        let data = 'action=' + prefix + '_item_save&' + dataform;
        $('#submit').addClass('is-loading');
        setTimeout(function () {
            $.post(ajaxurl, data, function (response) {
                if (response.status == 'OK') {
                    $('#wow-message')
                        .addClass('notice notice-success is-dismissible')
                        .html('<p>' + response.message + '</p>');
                    $('#add_action').val(2);
                    let tool_id = $('#tool_id').val();
                    $('.nav-tab.nav-tab-active').text('Update #' + tool_id);
                }
                $('#submit').removeClass('is-loading');
            });
        }, 500);
    });
    //endregion

    //region Tabs
    $('#tab li').on('click', function () {
        let tab = $(this).data('tab');
        $('#tab li').removeClass('is-active');
        $(this).addClass('is-active');
        $('#tab-content .tab-content').removeClass('is-active');
        $('[data-content="' + tab + '"]').addClass('is-active');
    });
    //endregion

    // Install the Icon Color
    $('.wp-color-picker-field').not('#clone .wp-color-picker-field').wpColorPicker();

    $('.toggle-preview').on('click', function () {
        $('.live-builder, .toggle-preview .plus, .toggle-preview .minus').toggleClass('is-hidden');
    });

    //region Accordion
    $('.accordion-title').on('click', function () {
        $('.accordion-title').removeClass('active');
        $('.accordion-content').slideUp('normal');
        if ($(this).next().is(':hidden') == true) {
            $(this).addClass('active');
            $(this).next().slideDown('normal');
        }
    });
    $('.accordion-content').hide();
    //endregion

    //region Save item
    $(document).on('click', '.wow-plugin-message .notice-dismiss', function () {
        $.ajax({
            url: ajaxurl, data: {
                action: 'wow_plugin_message',
            },
        });
    });
    //endregion

    //region Share pluign
    $('[data-share]').on('click', function (event) {
        event.preventDefault();
        let network = $(this).data('share');
        let url = $('#wp-url').val();
        let title = $('#wp-title').val();

        let shareUrl;

        switch (network) {
            case 'facebook':
                shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
                break;
            case 'vk':
                shareUrl = 'http://vk.com/share.php?url=' + url;
                break;
            case 'twitter':
                shareUrl = 'https://twitter.com/share?url=' + url + '&text=' + title;
                break;
            case 'linkedin':
                shareUrl = 'https://www.linkedin.com/shareArticle?url=' + url + '&title=' + title;
                break;
            case 'pinterest':
                shareUrl = 'https://pinterest.com/pin/create/button/?url=' + url;
                break;
            case 'xing':
                shareUrl = 'https://www.xing.com/spi/shares/new?url=' + url;
                break;
            case 'reddit':
                shareUrl = 'http://www.reddit.com/submit?url=' + url + '&title=' + title;
                break;
            case 'blogger':
                shareUrl = 'https://www.blogger.com/blog-this.g?u=' + url + '&n=' + title;
                break;
            case 'telegram':
                shareUrl = 'https://telegram.me/share/url?url=' + url + '&text=' + title;
                break;


            default:
                shareUrl = '';
        }

        let popupWidth = 550;
        let popupHeight = 450;
        let topPosition = (screen.height - popupHeight) / 2;
        let leftPosition = (screen.width - popupWidth) / 2;
        let popup = 'width=' + popupWidth + ', height=' + popupHeight + ', top=' + topPosition + ', left=' + leftPosition +
            ', scrollbars=0, resizable=1, menubar=0, toolbar=0, status=0';

        window.open(shareUrl, null, popup);

    });
    //endregion


    $('.checkLabel')
        .each(function () {
            checkLabel(this);
        })
        .on('click', function () {
            checkLabel(this);
        });

    $('#height_unit').on('change', function () {
        checkHeight();
    });

    $('#width_unit').on('change', function () {
        checkWidth();
    });

    $('#shadow_checkbox').on('click', function () {
        checkShadow();
    });

    $('#overlay_checkbox').on('click', function () {
        checkOverlay();
    });

    $('#close_redirect_checkbox').on('click', function () {
        closeRedirect();
    });
    $('#video_support').on('click', function () {
        youtubeSupport();
    });
    $('#mobile_checkbox').on('click', function () {
        mobileRules();
    });

    checkHeight();
    checkWidth();
    popupLocation();
    checkShadow();
    checkBorder();
    checkOverlay();

    closeButton();
    mobileRules();

    popupType();
    closeRedirect();

    youtubeSupport();

    setDate();
    userRole();
    showChange();

})(jQuery);

function checkHeight() {
    let unit = jQuery('#height_unit').val();
    if (unit === 'auto') {
        jQuery('#height').attr('disabled', 'disabled');
    } else {
        jQuery('#height').removeAttr('disabled');
    }
}

function checkWidth() {
    let unit = jQuery('#width_unit').val();
    if (unit === 'auto') {
        jQuery('#width').attr('disabled', 'disabled');
    } else {
        jQuery('#width').removeAttr('disabled');
    }
}

function popupLocation() {
    let location = jQuery('#location').val();
    jQuery('#location-top, #location-bottom, #location-left, #location-right').hide();

    switch (location) {
        case '-topCenter':
            jQuery('#location-top').show();
            break;
        case '-bottomCenter':
            jQuery('#location-bottom').show();
            break;
        case '-left':
            jQuery('#location-left').show();
            break;
        case '-right':
            jQuery('#location-right').show();
            break;
        case '-topLeft':
            jQuery('#location-top').show();
            jQuery('#location-left').show();
            break;
        case '-bottomLeft':
            jQuery('#location-bottom').show();
            jQuery('#location-left').show();
            break;
        case '-topRight':
            jQuery('#location-top').show();
            jQuery('#location-right').show();
            break;
        case '-bottomRight':
            jQuery('#location-bottom').show();
            jQuery('#location-right').show();
            break;

    }
}

function checkShadow() {
    if (jQuery('#shadow_checkbox').prop('checked')) {
        jQuery('.shadow-color').css('visibility', 'visible');
    } else {
        jQuery('.shadow-color').css('visibility', 'hidden');
    }

}

function checkBorder() {
    let border = jQuery('#border_style').val();
    if (border === 'none') {
        jQuery('.border-content').addClass('is-hidden');
    } else {
        jQuery('.border-content').removeClass('is-hidden');
    }
}

function checkOverlay() {
    if (jQuery('#overlay_checkbox').prop('checked')) {
        jQuery('.overlay').css('visibility', 'visible');
    } else {
        jQuery('.overlay').css('visibility', 'hidden');
    }
}


function closeButton() {
    let close = jQuery('#close').val();
    jQuery('.close-text, .close-background').css('visibility', 'hidden');
    switch (close) {
        case '-text':
            jQuery('.close-text, .close-background').css('visibility', 'visible');
            break;
        case '-tag':
            jQuery('.close-background').css('visibility', 'visible');
            break;
    }
}

function mobileRules() {
    if (jQuery('#mobile_checkbox').prop('checked')) {
        jQuery('.mobile-rules').removeClass('is-hidden');
    } else {
        jQuery('.mobile-rules').addClass('is-hidden');
    }
}


function checkLabel(that) {
    if (jQuery(that).prop('checked')) {
        jQuery(that).parent().siblings('.field').removeClass('is-hidden');
    } else {
        jQuery(that).parent().siblings('.field').addClass('is-hidden');
    }
}


function popupType() {
    let trigger = jQuery('#triggers').val();
    jQuery('.trigger-auto, .trigger-scrolled, .trigger-click').addClass('is-hidden');
    switch (trigger) {
        case 'click':
        case 'hover':
            jQuery('.trigger-click').removeClass('is-hidden');
            break;
        case 'auto':
            jQuery('.trigger-auto').removeClass('is-hidden');
            break;
        case 'scrolled':
            jQuery('.trigger-scrolled').removeClass('is-hidden');
            break;
    }
}

function closeRedirect() {
    if (jQuery('#close_redirect_checkbox').prop('checked')) {
        jQuery('.close-redirect').removeClass('is-hidden');
    } else {
        jQuery('.close-redirect').addClass('is-hidden');
    }
}

function youtubeSupport() {
    if (jQuery('#video_support').prop('checked')) {
        jQuery('.youtube').removeClass('is-hidden');
    } else {
        jQuery('.youtube').addClass('is-hidden');
    }
}

function setDate() {
    if (jQuery('#set_dates').prop('checked')) {
        jQuery('.date-set').removeClass('is-hidden');
    } else {
        jQuery('.date-set').addClass('is-hidden');
    }
}

function userRole() {
    let user = jQuery('#item_user').val();
    if (user === '2') {
        jQuery('.user-role').removeClass('is-hidden');
    } else {
        jQuery('.user-role').addClass('is-hidden');
    }
}

function showChange() {
    let show = jQuery('#show').val();
    if (show === 'posts' || show === 'pages' || show === 'expost' || show === 'expage' || show === 'taxonomy' || show === 'postsincat') {
        jQuery('.id-post').removeClass('is-hidden');
        jQuery('.shortcode').addClass('is-hidden');
    } else if (show === 'shortecode') {
        jQuery('.shortcode').removeClass('is-hidden');
        jQuery('.id-post').addClass('is-hidden');
    } else {
        jQuery('.shortcode').addClass('is-hidden');
        jQuery('.id-post').addClass('is-hidden');
    }
    if (show === 'taxonomy') {
        jQuery('.taxonomy').removeClass('is-hidden');
    } else {
        jQuery('.taxonomy').addClass('is-hidden');
    }
}

function getTinymceContent() {
    if (jQuery("#wp-popupBoxContent-wrap").hasClass("tmce-active")) {
        let content = tinyMCE.activeEditor.getContent();
        jQuery('#popupBoxContent').val(content);
    }
}

