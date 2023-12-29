<?php
/**
 * Notification script generation
 *
 * @package     WP_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//region Main Settings
// Block Page
if ( ! empty( $param['block_page'] ) ) {
	$script['block_page'] = true;
}

// Triggers
if ( $param['triggers'] !== 'click' ) {
	$script['open_popup'] = $param['triggers'];
}
if ( $param['triggers'] === 'auto' && ! empty( $param['delay'] ) ) {
	$script['open_delay'] = $param['delay'];
}

if ( $param['triggers'] === 'scrolled' && ! empty( $param['distance'] ) ) {
	$script['open_distance'] = $param['distance'];
}

// Elements for Open & Close
$script['open_popupTrigger'] = 'ds-open-popup-' . $id;

// Set Cookie
if ( ! empty( $param['cookie_checkbox'] ) ) {
	$script['cookie_enable'] = true;
	$script['cookie_name']   = 'ds-popup-' . $id;
	$script['cookie_days']   = $param['cookie'];
}

// Close by clicking Esc
if ( empty( $param['close_Esc'] ) ) {
	$script['popup_esc'] = false;
}

// Popup z-index
if ( $param['zindex'] !== '999' ) {
	$script['popup_zindex'] = $param['zindex'];
}
//endregion

//region Popup Style
// Popup Animation
$script['popup_animation'] = 'fadeIn';

// Popup width & height
$width               = ( $param['width_unit'] === 'auto' ) ? 'auto' : $param['width'] . $param['width_unit'];
$height              = ( $param['height_unit'] === 'auto' ) ? 'auto' : $param['height'] . $param['height_unit'];
$script['popup_css'] = array(
	'width'  => $width,
	'height' => $height,
);

// Popup background
if ( ! empty( $param['background_img_checkbox'] ) ) {
	$script['popup_css']['background-image'] = 'url(' . $param['background_img'] . ')';
	$script['popup_css']['background-size']  = 'cover';
} else {
	$script['popup_css']['background'] = $param['background'];
}

// Popup Location
if ( $param['location'] !== '-center' ) {
	$script['popup_position'] = $param['location'];
}

switch ( $param['location'] ) {
	case '-topCenter':
		$script['popup_css']['top']   = $param['top'] . 'px';
		$script['popup_css']['right'] = '0';
		break;
	case '-bottomCenter':
		$script['popup_css']['bottom'] = $param['bottom'] . 'px';
		$script['popup_css']['right']  = '0';
		break;
	case '-left':
		$script['popup_css']['left'] = $param['left'] . 'px';
		break;
	case '-right':
		$script['popup_css']['right'] = $param['right'] . 'px';
		break;
	case '-topLeft':
		$script['popup_css']['top']  = $param['top'] . 'px';
		$script['popup_css']['left'] = $param['left'] . 'px';
		break;
	case '-bottomLeft':
		$script['popup_css']['bottom'] = $param['bottom'] . 'px';
		$script['popup_css']['left']   = $param['left'] . 'px';
		break;
	case '-topRight':
		$script['popup_css']['top']   = $param['top'] . 'px';
		$script['popup_css']['right'] = $param['right'] . 'px';
		break;
	case '-bottomRight':
		$script['popup_css']['bottom'] = $param['bottom'] . 'px';
		$script['popup_css']['right']  = $param['right'] . 'px';
		break;
}

// Popup padding
if ( $param['padding'] !== '15' ) {
	$script['popup_css']['padding'] = $param['padding'] . 'px';
}

// Popup border radius
if ( ! empty( $param['radius'] ) ) {
	$script['popup_css']['border-radius'] = $param['radius'] . 'px';
}

// Popup shasow
if ( ! empty( $param['shadow_checkbox'] ) ) {
	$script['popup_css']['box-shadow'] = '0 0 ' . $param['shadow'] . 'px ' . $param['shadow_color'];
}

//endregion

//region Overlay
if ( empty( $param['overlay_checkbox'] ) ) {
	$script['overlay_isVisible'] = false;
} else {

	$script['overlay_animation'] = 'fadeIn';
	$script['overlay_css']       = array(
		'background' => $param['overlay'],
	);
	if ( empty( $param['close_overlay'] ) ) {
		$script['overlay_closesPopup'] = false;
	}
}
//endregion

//region Content Style
$script['content_css'] = array(
	'font-family' => $param['content_font'],
	'font-size'   => $param['content_size'] . 'px',
	'padding'     => $param['content_padding'] . 'px',
);
// Content Border
if ( $param['border_style'] !== 'none' ) {
	$script['content_css']['border'] = $param['border_width'] . 'px ' . $param['border_style'] . ' ' . $param['border_color'];
	if ( ! empty( $param['border_radius'] ) ) {
		$script['content_css']['border-radius'] = $param['border_radius'] . 'px';
	}
}
//endregion

//region Close Button Style
if ( $param['close'] !== '-text' ) {
	$script['close_type'] = $param['close'];
}
$script['close_content'] = $param['close_text'];
$script['close_css']     = array(
	'font-size'  => $param['close_size'] . 'px',
	'color'      => $param['close_color'],
	'background' => $param['close_background'],
);

if ( $param['close_location'] !== '-topRight' ) {
	$script['close_position'] = $param['close_location'];
}
if ( ! empty( $param['close_place'] ) ) {
	$script['close_outer'] = true;
}

//endregion

//region Mobile Style
if ( empty( $param['mobile_checkbox'] ) ) {
	$script['mobile_show'] = false;
} else {
	if ( $param['mobile'] !== '480' ) {
		$script['mobile_breakpoint'] = $param['mobile'] . 'px';
	}
	$script['mobile_css'] = array(
		'width' => $param['mobile_width'] . $param['mobile_width_unit'],
	);

}
//endregion
