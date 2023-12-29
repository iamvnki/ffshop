<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Tergeting settings
 *
 * @package     Wow_Plugin
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


//region Display
$show_option = array(
	'all'        => esc_attr__( 'All posts and pages', 'popup-box' ),
	'onlypost'   => esc_attr__( 'All posts', 'popup-box' ),
	'onlypage'   => esc_attr__( 'All pages', 'popup-box' ),
	'posts'      => esc_attr__( 'Posts with certain IDs', 'popup-box' ),
	'pages'      => esc_attr__( 'Pages with certain IDs', 'popup-box' ),
	'postsincat' => esc_attr__( 'Posts in Categorys with IDs', 'popup-box' ),
	'expost'     => esc_attr__( 'All posts. except...', 'popup-box' ),
	'expage'     => esc_attr__( 'All pages, except...', 'popup-box' ),
);

$show = array(
	'label'   => esc_attr__( 'Display on', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[show]',
		'id'    => 'show',
		'value' => isset( $param['show'] ) ? $param['show'] : 'all',
	],
	'options' => $show_option,
	'tooltip' => esc_attr__( 'Choose a condition to target to specific content.', 'popup-box' ),
	'icon'    => '',
	'func'    => 'showChange()',
);

$id_post = array(
	'label'   => esc_attr__( 'ID\'s', 'popup-box' ),
	'attr'    => [
		'name'        => 'param[id_post]',
		'id'          => 'id_post',
		'value'       => isset( $param['id_post'] ) ? $param['id_post'] : '',
		'placeholder' => esc_attr__( 'Enter IDs, separated by comma.', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'Enter IDs, separated by comma.', 'popup-box' ),
);
//endregion

//region Other
$test_mode = array(
	'label'   => esc_attr__( 'Test mode', 'popup-box' ),
	'attr'    => [
		'name'  => 'param[test_mode]',
		'id'    => 'test_mode',
		'value' => isset( $param['test_mode'] ) ? $param['test_mode'] : 'no',
	],
	'options' => [
		'no'  => esc_attr__( 'No', 'popup-box' ),
		'yes' => esc_attr__( 'Yes', 'popup-box' ),
	],
	'tooltip' => esc_attr__( 'If test mode is enabled, the notification will show for admin only', 'popup-box' ),
);
//endregion