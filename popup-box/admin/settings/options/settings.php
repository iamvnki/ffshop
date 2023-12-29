<?php
/**
 * Notification settings parameters
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

//region Triggers

$triggers = array(
	'label'   => esc_attr__( 'Triggers', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[triggers]',
		'id'    => 'triggers',
		'value' => isset( $param['triggers'] ) ? $param['triggers'] : 'auto',
	],
	'options' => [
		'auto'     => esc_attr__( 'Auto', 'popup-box' ),
		'click'    => esc_attr__( 'Click', 'popup-box' ),
		'scrolled' => esc_attr__( 'Scrolled', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Select the trigger when the popup must be opening.', 'popup-box' ),
	'func'    => 'popupType()',
);

$delay = array(
	'label'   => esc_attr__( 'Delay time', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[delay]',
		'id'    => 'delay',
		'value' => isset( $param['delay'] ) ? $param['delay'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'sec',
	],
	'tooltip' => esc_attr__( 'Delay time in seconds for opening the popup.', 'popup-box' ),
);

$distance = array(
	'label'   => esc_attr__( 'Scroll distance', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[distance]',
		'id'    => 'distance',
		'value' => isset( $param['distance'] ) ? $param['distance'] : '50',
		'min'   => '0',
		'step'  => '1',
		'max'   => '100',
	],
	'addon'   => [
		'unit' => '%',
	],
	'tooltip' => esc_attr__( 'Scroll distance of the page in % for an opening popup.', 'popup-box' ),
);

$cookie = array(
	'label'    => esc_attr__( 'Show only once', 'popup-box' ),
	'attr'     => [
		'name'  => 'param[cookie]',
		'id'    => 'cookie',
		'value' => isset( $param['cookie'] ) ? $param['cookie'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'checkbox' => [
		'name'  => 'param[cookie_checkbox]',
		'id'    => 'cookie_checkbox',
		'class' => 'checkLabel',
		'value' => isset( $param['cookie_checkbox'] ) ? $param['cookie_checkbox'] : 0,
	],
	'addon'    => [
		'unit' => 'days',
	],
	'tooltip'  => esc_attr__( 'Defines if the popup will set a cookie and hide it self for a period of time from the user.  Set the cookie in days.', 'popup-box' ),
);

$block_page = array(
	'label'   => esc_attr__( 'Block the page', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[block_page]',
		'id'    => 'block_page',
		'value' => isset( $param['block_page'] ) ? $param['block_page'] : 0,
	],
	'tooltip' => esc_attr__( 'Block the page for scrolling.', 'popup-box' ),
);
//endregion

//region Close Popup

$close_overlay = array(
	'label'   => esc_attr__( 'Overlay', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close_overlay]',
		'id'    => 'close_overlay',
		'value' => isset( $param['close_overlay'] ) ? $param['close_overlay'] : 1,
	],
	'tooltip' => esc_attr__( 'Defines if the overlay can close the popup.', 'popup-box' ),
);

$close_Esc = array(
	'label'   => esc_attr__( 'Esc', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close_Esc]',
		'id'    => 'close_Esc',
		'value' => isset( $param['close_Esc'] ) ? $param['close_Esc'] : 1,
	],
	'tooltip' => esc_attr__( 'Enabled the ESC key to close the popup.', 'popup-box' ),
);

//endregion

