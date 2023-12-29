/**
 * main.js
 *
 * Handles toggling the navigation menu for small screens.
 */

'use strict';

(function ($) {

    $("#shortcodeInsert").on("click", function () {
        let shortcode = $('#shortcodeBox').text();

        if (jQuery('#wp-popupBoxContent-editor-container > textarea').is(':visible')) {
            let val = jQuery('#wp-popupBoxContent-editor-container > textarea').val() + shortcode;
            jQuery('#wp-popupBoxContent-editor-container > textarea').val(val);
        } else {
            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
        }
        tb_remove();
    });

    $('#shortcodeBuilder').on('change', function () {
        buildShortcode();
    });

    $('#shortcodeBuilder').on('keyup', function () {
        buildShortcode();
    });

    $("#shortcodeBuilder .wp-color-picker-field").wpColorPicker(
        'option',
        'change',
        function (event, ui) {
            buildShortcode();
        }
    );

    $("#shortcode_type").on("click", function () {
        shortCodeType();
        buildShortcode();
    });
    $("#shortcode_btn_type").on("click", function () {
        shortcodeBtnType();
        buildShortcode();
    });

    shortcodeBtnType();
    shortCodeType();
    buildShortcode();

    function shortCodeType() {
        let shortcode = $('#shortcode_type').val();
        $('.button-box, .video-box').addClass('is-hidden');
        if (shortcode === 'button') {
            $('.button-box').removeClass('is-hidden');
        } else if (shortcode === 'video') {
            $('.video-box').removeClass('is-hidden');
        }
    }

    function shortcodeBtnType() {
        let button = $('#shortcode_btn_type').val();
        $('.shortcode-btn-link').addClass('is-hidden');
        if (button === 'link') {
            $('.shortcode-btn-link').removeClass('is-hidden');
        }
    }

    function buildShortcode() {
        let type = $('#shortcode_type').val();
        let video_from = $('#shortcode_video_from').val();
        let video_id = $('#shortcode_video_id').val();
        let video_width = $('#shortcode_video_width').val();
        let video_height = $('#shortcode_video_height').val();
        let button = $('#shortcode_btn_type').val();
        let btn_size = $('#shortcode_btn_size').val();
        let btn_fullwidth = $('#shortcode_btn_fullwidth').val();
        let btn_text = $('#shortcode_btn_text').val();
        let btn_color = $('#shortcode_btn_color').val();
        let btn_bgcolor = $('#shortcode_btn_bgcolor').val();
        let btn_link = $('#shortcode_btn_link').val();
        let btn_target = $('#shortcode_btn_target').val();


        let shortcode;
        if (type === 'video') {
            shortcode = '[videoBox from="' + video_from + '" id="' + video_id + '" width="' + video_width + '" height="' + video_height + '"]';
        } else if (type === 'button') {
            let fullwidth;
            if (btn_fullwidth === '') {
                fullwidth = 'no';
            } else {
                fullwidth = 'yes';
                btn_fullwidth = 'is-fullwidth'
            }
            let btn_param = 'type="' + button + '" color="' + btn_color + '" bgcolor="' + btn_bgcolor + '" size="' + btn_size + '" fullwidth="' + fullwidth + '"';
            if (button === 'link') {
                btn_param += ' link="' + btn_link + '" target="' + btn_target + '"';
            }
            shortcode = '[buttonBox ' + btn_param + ']' + btn_text + '[/buttonBox]';

            let content_size = $('#content_size').val();
            $('#shortcodeBtnPreview').css({
                'font-size': content_size + 'px',
            });
            let style = 'color:' + btn_color + ';background:' + btn_bgcolor + ';';
            let btn_preview = '<button class="ds-button is-' + btn_size + ' ' + btn_fullwidth + '" style="' + style + '">' + btn_text + '</button>';
            $('#shortcodeBtnPreview').html(btn_preview);
        }

        $('#shortcodeBox').text(shortcode);
    }

})(jQuery);