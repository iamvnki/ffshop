<?php
/**
 * Style parameters
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$animation = [
	'fadeIn' => 'fadeIn',
];

//region General Style
$width = array(
	'label'   => esc_attr__( 'Modal Width', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[width]',
		'id'    => 'width',
		'value' => isset( $param['width'] ) ? $param['width'] : '550',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[width_unit]',
		'value'   => isset( $param['width_unit'] ) ? $param['width_unit'] : 'px',
		'id'      => 'width_unit',
		'options' => [
			'auto' => esc_attr__( 'auto', 'popup-box' ),
			'px'   => esc_attr__( 'px', 'popup-box' ),
			'%'    => esc_attr__( '%', 'popup-box' ),
		],
	],
	'tooltip' => esc_attr__( 'Set Modal Window width', 'popup-box' ),
);

$height = array(
	'label'   => esc_attr__( 'Modal Height', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[height]',
		'id'    => 'height',
		'value' => isset( $param['height'] ) ? $param['height'] : '350',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[height_unit]',
		'value'   => isset( $param['height_unit'] ) ? $param['height_unit'] : 'auto',
		'id'      => 'height_unit',
		'options' => [
			'auto' => esc_attr__( 'auto', 'popup-box' ),
			'px'   => esc_attr__( 'px', 'popup-box' ),
			'%'    => esc_attr__( '%', 'popup-box' ),
		],
	],
	'tooltip' => esc_attr__( 'Set Modal Window height.', 'popup-box' ),
);

$zindex = array(
	'label'   => esc_attr__( 'Z-index', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[zindex]',
		'id'    => 'zindex',
		'value' => isset( $param['zindex'] ) ? $param['zindex'] : '999',
		'min'   => '0',
		'step'  => '1',
	],
	'tooltip' => esc_attr__( 'The z-index property specifies the stack order of an element. An element with greater stack order is always in front of an element with a lower stack order.', 'popup-box' ),
);

$location = array(
	'label'   => esc_attr__( 'Location', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[location]',
		'id'    => 'location',
		'value' => isset( $param['location'] ) ? $param['location'] : '-center',
	],
	'options' => [
		'-center'       => esc_attr__( 'Center', 'popup-box' ),
		'-topCenter'    => esc_attr__( 'Top Center', 'popup-box' ),
		'-bottomCenter' => esc_attr__( 'Bottom Center', 'popup-box' ),
		'-left'         => esc_attr__( 'Left Center', 'popup-box' ),
		'-topLeft'      => esc_attr__( 'Top Left', 'popup-box' ),
		'-bottomLeft'   => esc_attr__( 'Bottom Left', 'popup-box' ),
		'-right'        => esc_attr__( 'Right Center', 'popup-box' ),
		'-topRight'     => esc_attr__( 'Top Right', 'popup-box' ),
		'-bottomRight'  => esc_attr__( 'Bottom Right', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Specify popup location.', 'popup-box' ),
	'func'    => 'popupLocation()',
);

$top = array(
	'label'   => esc_attr__( 'Top', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[top]',
		'id'    => 'top',
		'value' => isset( $param['top'] ) ? $param['top'] : '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[top_unit]',
		'value'   => isset( $param['top_unit'] ) ? $param['top_unit'] : 'px',
		'id'      => 'top_unit',
		'options' => [
			'px' => esc_attr__( 'px', 'popup-box' ),
			'em' => esc_attr__( 'em', 'popup-box' ),
		],
	],
	'tooltip' => esc_attr__( 'Property affects the top vertical position of a popup.', 'popup-box' ),
);

$bottom = array(
	'label'   => esc_attr__( 'Bottom', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[bottom]',
		'id'    => 'bottom',
		'value' => isset( $param['bottom'] ) ? $param['bottom'] : '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[bottom_unit]',
		'value'   => isset( $param['bottom_unit'] ) ? $param['bottom_unit'] : 'px',
		'id'      => 'bottom_unit',
		'options' => [
			'px' => esc_attr__( 'px', 'popup-box' ),
			'em' => esc_attr__( 'em', 'popup-box' ),
		],
	],
	'tooltip' => esc_attr__( 'Property affects the bottom vertical position of a popup.', 'popup-box' ),
);

$left = array(
	'label'   => esc_attr__( 'Left', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[left]',
		'id'    => 'left',
		'value' => isset( $param['left'] ) ? $param['left'] : '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[left_unit]',
		'value'   => isset( $param['left_unit'] ) ? $param['left_unit'] : 'px',
		'id'      => 'left_unit',
		'options' => [
			'px' => esc_attr__( 'px', 'popup-box' ),
			'em' => esc_attr__( 'em', 'popup-box' ),
		],
	],
	'tooltip' => esc_attr__( 'Property affects the left horizontal position of a popup.', 'popup-box' ),
);

$right = array(
	'label'   => esc_attr__( 'Right', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[right]',
		'id'    => 'right',
		'value' => isset( $param['right'] ) ? $param['right'] : '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[right_unit]',
		'value'   => isset( $param['right_unit'] ) ? $param['right_unit'] : 'px',
		'id'      => 'right_unit',
		'options' => [
			'px' => esc_attr__( 'px', 'popup-box' ),
			'em' => esc_attr__( 'em', 'popup-box' ),
		],
	],
	'tooltip' => esc_attr__( 'Property affects the right horizontal position of a popup.', 'popup-box' ),
);

$popup_animation = array(
	'label'   => esc_attr__( 'Animation', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[popup_animation]',
		'id'    => 'popup_animation',
		'value' => isset( $param['popup_animation'] ) ? $param['popup_animation'] : 'fadeIn',
	],
	'options' => $animation,
	'tooltip' => esc_attr__( 'Set the Animation for popup.', 'popup-box' ),
);

$padding = array(
	'label'   => esc_attr__( 'Padding', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[padding]',
		'id'    => 'padding',
		'value' => isset( $param['padding'] ) ? $param['padding'] : '15',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Used to generate space around a popup content, inside of any defined borders.', 'popup-box' ),
);

$radius = array(
	'label'   => esc_attr__( 'Radius', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[radius]',
		'id'    => 'radius',
		'value' => isset( $param['radius'] ) ? $param['radius'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Defines the radius of the corners for popup.', 'popup-box' ),
);

$shadow = array(
	'label'    => esc_attr__( 'Shadow', 'popup-box' ),
	'attr'     => [
		'name'  => 'param[shadow]',
		'id'    => 'shadow',
		'value' => isset( $param['shadow'] ) ? $param['shadow'] : '8',
		'min'   => '0',
		'step'  => '1',
	],
	'checkbox' => [
		'name'  => 'param[shadow_checkbox]',
		'id'    => 'shadow_checkbox',
		'class' => 'checkLabel',
		'value' => isset( $param['shadow_checkbox'] ) ? $param['shadow_checkbox'] : 1,
	],
	'addon'    => [
		'unit' => 'px',
	],
	'tooltip'  => esc_attr__( 'Attaches shadows to an popup', 'popup-box' ),
);

$shadow_color = array(
	'label'   => esc_attr__( 'Shadow Color', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[shadow_color]',
		'id'    => 'shadow_color',
		'value' => isset( $param['shadow_color'] ) ? $param['shadow_color'] : 'rgba(0, 0, 0, 0.5)',
	],
	'tooltip' => esc_attr__( 'The color of the shadow.', 'popup-box' ),
);

$background = array(
	'label'   => esc_attr__( 'Background', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[background]',
		'id'    => 'background',
		'value' => isset( $param['background'] ) ? $param['background'] : '#ffffff',
	],
	'tooltip' => esc_attr__( 'Background of popup.', 'popup-box' ),
);

$background_img = array(
	'label'    => esc_attr__( 'Background Image', 'popup-box' ),
	'attr'     => [
		'name'        => 'param[background_img]',
		'id'          => 'background_img',
		'value'       => isset( $param['background_img'] ) ? $param['background_img'] : '',
		'placeholder' => esc_attr__( 'Enter Image URL', 'popup-box' ),
	],
	'checkbox' => [
		'name'  => 'param[background_img_checkbox]',
		'id'    => 'background_img_checkbox',
		'class' => 'checkLabel',
		'value' => isset( $param['background_img_checkbox'] ) ? $param['background_img_checkbox'] : 0,
	],
	'tooltip'  => esc_attr__( 'Set the image for popup background.', 'popup-box' ),
);
//endregion

//region Content
$content_font = array(
	'label'   => esc_attr__( 'Font Family', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[content_font]',
		'id'    => 'content_font',
		'value' => isset( $param['content_font'] ) ? $param['content_font'] : 'Times New Roman',
	],
	'options' => [
		'inherit'         => esc_attr__( 'Use Your Themes', 'popup-box' ),
		'Sans-Serif'      => 'Sans-Serif',
		'Tahoma'          => 'Tahoma',
		'Georgia'         => 'Georgia',
		'Comic Sans MS'   => 'Comic Sans MS',
		'Arial'           => 'Arial',
		'Lucida Grande'   => 'Lucida Grande',
		'Times New Roman' => 'Times New Roman',
	],
	'tooltip' => esc_attr__( 'Select the Font for Content.', 'popup-box' ),
);

$content_size = array(
	'label'   => esc_attr__( 'Main Font Size', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[content_size]',
		'id'    => 'content_size',
		'value' => isset( $param['content_size'] ) ? $param['content_size'] : '16',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Set the main Font size for content.', 'popup-box' ),
);

$content_padding = array(
	'label'   => esc_attr__( 'Padding', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[content_padding]',
		'id'    => 'content_padding',
		'value' => isset( $param['content_padding'] ) ? $param['content_padding'] : '15',
	],
	'addon'   => [
		'unit' => 'px'
	],
	'tooltip' => esc_attr__( 'Specify popup content inner padding.', 'popup-box' ),
);

$border_style = array(
	'label'   => esc_attr__( 'Border Style', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[border_style]',
		'id'    => 'border_style',
		'value' => isset( $param['border_style'] ) ? $param['border_style'] : 'none',
	],
	'options' => [
		'none'   => esc_attr__( 'None', 'popup-box' ),
		'solid'  => esc_attr__( 'Solid', 'popup-box' ),
		'dotted' => esc_attr__( 'Dotted', 'popup-box' ),
		'dashed' => esc_attr__( 'Dashed', 'popup-box' ),
		'double' => esc_attr__( 'Double', 'popup-box' ),
		'groove' => esc_attr__( 'Groove', 'popup-box' ),
		'inset'  => esc_attr__( 'Inset', 'popup-box' ),
		'outset' => esc_attr__( 'Outset', 'popup-box' ),
		'ridge'  => esc_attr__( 'Ridge', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Choose a border style.', 'popup-box' ),
	'func'    => 'checkBorder()',
);

$border_width = array(
	'label'   => esc_attr__( 'Border Thickness', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[border_width]',
		'id'    => 'border_width',
		'value' => isset( $param['border_width'] ) ? $param['border_width'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border width.', 'popup-box' ),
);

$border_radius = array(
	'label'   => esc_attr__( 'Border Radius', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[border_radius]',
		'id'    => 'border_radius',
		'value' => isset( $param['border_radius'] ) ? $param['border_radius'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border radius.', 'popup-box' ),
);

$border_color = array(
	'label' => esc_attr__( 'Border Color', 'popup-box' ),
	'attr'  => [
		'name'  => 'param[border_color]',
		'id'    => 'border_color',
		'value' => isset( $param['border_color'] ) ? $param['border_color'] : '#d4af37',

	],
);
//endregion

//region Overlay
$overlay = array(
	'label'    => esc_attr__( 'Overlay', 'popup-box' ),
	'attr'     => [
		'name'  => 'param[overlay]',
		'id'    => 'overlay',
		'value' => isset( $param['overlay'] ) ? $param['overlay'] : 'rgba(0, 0, 0, .75)',
	],
	'checkbox' => [
		'name'  => 'param[overlay_checkbox]',
		'id'    => 'overlay_checkbox',
		'class' => 'checkLabel',
		'value' => isset( $param['overlay_checkbox'] ) ? $param['overlay_checkbox'] : 1,
	],
	'tooltip'  => esc_attr__( 'Shows or hides the popup overlay.', 'popup-box' ),
);

$overlay_animation = array(
	'label'   => esc_attr__( 'Animation', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[overlay_animation]',
		'id'    => 'overlay_animation',
		'value' => isset( $param['overlay_animation'] ) ? $param['overlay_animation'] : 'fadeIn',
	],
	'options' => $animation,
	'tooltip' => esc_attr__( 'Set the Animation for overlay.', 'popup-box' ),
);
//endregion

//region Close Button
$close = array(
	'label'   => esc_attr__( 'Close button', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close]',
		'id'    => 'close',
		'value' => isset( $param['close'] ) ? $param['close'] : '-text',
	],
	'options' => [
		'-text' => esc_attr__( 'Text', 'popup-box' ),
		'-icon' => esc_attr__( 'Icon', 'popup-box' ),
		'-tag'  => esc_attr__( 'Box', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Enable close button for the popup and sets the style.', 'popup-box' ),
	'func'    => 'closeButton()',
);

$close_size = array(
	'label'   => esc_attr__( 'Size', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close_size]',
		'id'    => 'close_size',
		'value' => isset( $param['close_size'] ) ? $param['close_size'] : '16',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Sets close button size', 'popup-box' ),
);

$close_text = array(
	'label'   => esc_attr__( 'Text', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close_text]',
		'id'    => 'close_text',
		'value' => isset( $param['close_text'] ) ? $param['close_text'] : 'Close',
	],
	'tooltip' => esc_attr__( 'Sets the button text.', 'popup-box' ),
);

$close_location = array(
	'label'   => esc_attr__( 'Location', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close_location]',
		'id'    => 'close_location',
		'value' => isset( $param['close_location'] ) ? $param['close_location'] : '-topRight',
	],
	'options' => [
		'-topRight'    => esc_attr__( 'Top Right', 'popup-box' ),
		'-topLeft'     => esc_attr__( 'Top Left', 'popup-box' ),
		'-bottomRight' => esc_attr__( 'Bottom Right', 'popup-box' ),
		'-bottomLeft'  => esc_attr__( 'Bottom Left', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Location the button.', 'popup-box' ),
);

$close_place = array(
	'label'   => esc_attr__( 'Place', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close_place]',
		'id'    => 'close_place',
		'value' => isset( $param['close_place'] ) ? $param['close_place'] : '',
	],
	'options' => [
		''       => esc_attr__( 'Inside', 'popup-box' ),
		'-outer' => esc_attr__( 'Outside', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Places the button relative to the popup.', 'popup-box' ),
);

$close_color = array(
	'label'   => esc_attr__( 'Color', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close_color]',
		'id'    => 'close_color',
		'value' => isset( $param['close_color'] ) ? $param['close_color'] : '#383838',
	],
	'tooltip' => esc_attr__( 'Sets close button color', 'popup-box' ),
);

$close_background = array(
	'label'   => esc_attr__( 'Background', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[close_background]',
		'id'    => 'close_background',
		'value' => isset( $param['close_background'] ) ? $param['close_background'] : '#00d1b2',
	],
	'tooltip' => esc_attr__( 'Sets close button background', 'popup-box' ),
);
//endregion

//region Mobile
$mobile = array(
	'label'    => esc_attr__( 'Show on mobile', 'popup-box' ),
	'attr'     => [
		'name'  => 'param[mobile]',
		'id'    => 'mobile',
		'value' => isset( $param['mobile'] ) ? $param['mobile'] : '480',
		'min'   => '0',
		'step'  => '1',
	],
	'checkbox' => [
		'name'  => 'param[mobile_checkbox]',
		'id'    => 'mobile_checkbox',
		'class' => 'checkLabel',
		'value' => isset( $param['mobile_checkbox'] ) ? $param['mobile_checkbox'] : 1,
	],
	'addon'    => [
		'unit' => 'px',
	],
	'tooltip'  => esc_attr__( 'Enables the popup on smaller devices and Sets the breakpoint for smaller devices.', 'popup-box' ),
);

$mobile_width = array(
	'label'   => esc_attr__( 'Width', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[mobile_width]',
		'id'    => 'mobile_width',
		'value' => isset( $param['mobile_width'] ) ? $param['mobile_width'] : '100',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'name'    => 'param[mobile_width_unit]',
		'value'   => isset( $param['mobile_width_unit'] ) ? $param['mobile_width_unit'] : '%',
		'options' => [
			'%'  => esc_attr__( '%', 'popup-box' ),
			'px' => esc_attr__( 'px', 'popup-box' ),
		],

	],
	'tooltip' => esc_attr__( 'Set the popup width on the mobile devices.', 'popup-box' ),
);
//endregion