<?php
/**
 * Shortcode Generation options
 *
 * @package     WP_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$shortcode_type = array(
	'label'   => esc_attr__( 'Shortcode Type', 'popup-box' ),
	'attr'    => [
		'id'    => 'shortcode_type',
		'value' => 'button',
	],
	'options' => [
		'button' => esc_attr__( 'Button', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Select the shortcode type.', 'popup-box' ),
);


//region Shortcode Button
$shortcode_btn_type = array(
	'label'   => esc_attr__( 'Button Type', 'popup-box' ),
	'attr'    => [
		'id'    => 'shortcode_btn_type',
		'value' => 'close',
	],
	'options' => [
		'close' => esc_attr__( 'Popup Close Button', 'popup-box' ),
		'link'  => esc_attr__( 'Button with Link', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Set the type of the popup button', 'popup-box' ),
);

$shortcode_btn_size = array(
	'label'   => esc_attr__( 'Button Size', 'popup-box' ),
	'attr'    => [
		'id'    => 'shortcode_btn_size',
		'value' => 'normal',
	],
	'options' => [
		'small'  => esc_attr__( 'Small', 'popup-box' ),
		'normal' => esc_attr__( 'Normal', 'popup-box' ),
		'medium' => esc_attr__( 'Medium', 'popup-box' ),
		'large'  => esc_attr__( 'Large', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Select the size of the button.', 'popup-box' ),
);

$shortcode_btn_fullwidth = array(
	'label'   => esc_attr__( 'Full Width', 'popup-box' ),
	'attr'    => [
		'id'    => 'shortcode_btn_fullwidth',
		'value' => isset( $param['shortcode_btn_fullwidth'] ) ? $param['shortcode_btn_fullwidth'] : '',
	],
	'options' => [
		'' => esc_attr__( 'No', 'popup-box' ),
		'yes' => esc_attr__( 'Yes', 'popup-box' ),
	],
	'tooltip'    => esc_attr__( 'Set the fullwidth option for button.', 'popup-box' ),
);

$shortcode_btn_text = array(
	'label'   => esc_attr__( 'Button Text', 'popup-box' ),
	'attr'    => [
		'name'        => 'param[shortcode_btn_text]',
		'id'          => 'shortcode_btn_text',
		'value'       => 'Close Popup',
		'placeholder' => esc_attr__( 'Enter Text', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Set the text for button.', 'popup-box' ),
);

$shortcode_btn_color = array(
	'label'   => esc_attr__( 'Text Color', 'popup-box' ),
	'attr'    => [
		'id'    => 'shortcode_btn_color',
		'value' => '#ffffff',
	],
	'tooltip' => esc_attr__( 'Set the color for button text.', 'popup-box' ),
);

$shortcode_btn_bgcolor = array(
	'label'   => esc_attr__( 'Background Color', 'popup-box' ),
	'attr'    => [
		'id'    => 'shortcode_btn_bgcolor',
		'value' => '#00d1b2',
	],
	'tooltip' => esc_attr__( 'Set the color for button background.', 'popup-box' ),
);

$shortcode_btn_link = array(
	'label'   => esc_attr__( 'Link', 'popup-box' ),
	'attr'    => [
		'id'          => 'shortcode_btn_link',
		'value'       => '',
		'placeholder' => esc_attr__( 'Enter URL', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Enter the URL for button link', 'popup-box' ),
);

$shortcode_btn_target = array(
	'label'   => esc_attr__( 'Target', 'popup-box' ),
	'attr'    => [
		'id'    => 'shortcode_btn_target',
		'value' => '_blank',
	],
	'options' => [
		'_blank' => esc_attr__( 'New tab', 'popup-box' ),
		'_self'  => esc_attr__( 'Same tab', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Target for opening the URL.', 'popup-box' ),
);
//endregion
