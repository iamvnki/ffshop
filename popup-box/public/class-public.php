<?php
/**
 * Public Class
 *
 * @package     Wow_Plugin
 * @subpackage  Public
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

namespace popup_box;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WP_Plugin_Public {

	private $info;
	/**
	 * @var mixed
	 */
	private $plugin;
	/**
	 * @var mixed
	 */
	private $url;
	/**
	 * @var mixed
	 */
	private $rating;

	public function __construct( $info ) {
		$this->plugin = $info['plugin'];
		$this->url    = $info['url'];
		$this->rating = $info['rating'];
		// Display on the site
		add_shortcode( 'buttonBox', array( $this, 'button_shortcode' ) );
		add_action( 'wp_footer', array( $this, 'popup_display' ) );
	}


	function button_shortcode( $atts, $content ) {
		$atts = shortcode_atts( array(
			'type'      => 'close',
			'link'      => '',
			'target'    => '_blank',
			'color'     => 'white',
			'bgcolor'   => 'mediumaquamarine',
			'size'      => 'normal',
			'fullwidth' => 'no',
		), $atts, 'buttonBox' );

		$size      = 'is-' . $atts['size'];
		$button    = '';
		$fullwidth = ( $atts['fullwidth'] === 'yes' ) ? 'is-fullwidth' : '';
		if ( $atts['type'] === 'close' ) {
			$button = '<button class="ds-button ds-close-popup ' . esc_attr( $size ) . ' ' . esc_attr( $fullwidth ) . '" style="color:' . esc_attr( $atts['color'] ) . '; background:' . esc_attr( $atts['bgcolor'] ) . '">' . esc_attr( $content ) . '</button>';
		} elseif ( $atts['type'] === 'link' ) {
			$button = '<a href="' . esc_url( $atts['link'] ) . '" target="' . esc_attr( $atts['target'] ) . '" class="ds-button ' . esc_attr( $size ) . ' ' . esc_attr( $fullwidth ) . '" style="color:' . esc_attr( $atts['color'] ) . '; background:' . esc_attr( $atts['bgcolor'] ) . '">' . esc_attr( $content ) . '</a>';
		}

		return $button;
	}

	public function popup_display() {
		global $wpdb;
		$table  = $wpdb->prefix . $this->plugin['prefix'];
		$result = $wpdb->get_results( "SELECT * FROM " . $table . " order by id asc" );

		if ( empty( $result ) ) {
			return false;
		}

		if ( count( $result ) === 0 ) {
			return false;
		}

		foreach ( $result as $key => $val ) {
			$param = unserialize( $val->param );

			if ( empty( $val->status ) ) {
				continue;
			}

			$check = $this->check( $param, $val->id );
			if ( $check === false ) {
				continue;
			}

			$this->get_content( $val->id, $param, $val->script );
		}

	}

	private function check( $param, $id ) {
		$check = true;
		$show  = $this->check_show( $param );

		if ( empty( $param['test'] ) ) {
			if ($show === false ) {
				$check = false;
			}

		} else {
			if ( ! current_user_can( 'administrator' ) ) {
				$check = false;
			}
			if($show === false) {
				$check = false;
			}
		}

		return $check;
	}

	function get_content( $id, $param, $script ) {

		$content = '<div class="ds-popup" id="ds-popup-' . absint( $id ) . '">';
		$content .= '<div class="ds-popup-wrapper" style="display: none;">';
		$content .= '<div class="ds-popup-content">';
		$content .= do_shortcode( $param['content'] );
		$content .= '</div></div></div>';

		echo $content;

		$slug       = $this->plugin['slug'];
		$version    = $this->plugin['version'];
		$pre_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		$url_style = plugin_dir_url( __FILE__ ) . 'assets/css/style' . $pre_suffix . '.css';
		wp_enqueue_style( $slug, $url_style, null, $version );

		$url_script = plugin_dir_url( __FILE__ ) . 'assets/js/jsPopup' . $pre_suffix . '.js';
		wp_enqueue_script( $slug, $url_script, array(), $version );

		$data = $this->get_script( $id, $param );

		wp_localize_script( $slug, 'PopupBox_' . $id, $data );

	}

	public function get_script( $id, $param ) {
		$script             = array();
		$script['selector'] = '#ds-popup-' . absint( $id );
		include( 'script.php' );

		return $script;
	}

	public function check_show( $param ) {

		$show = false;

		$display = $param['show'];
		$posts   = ! empty( $param['id_post'] ) ? $param['id_post'] : 0;


		if ( $display === 'all' ) {
			$show = true;
		} elseif ( $display === 'onlypost' && is_single() ) {
			$show = true;
		} elseif ( $display === 'onlypage' && is_page() ) {
			$show = true;
		} elseif ( $display === 'posts' && is_single( preg_split( "/[,]+/", $posts ) ) ) {
			$show = true;
		} elseif ( $display === 'postsincat' && in_category( preg_split( "/[,]+/", $posts ) ) ) {
			$show = true;
		} elseif ( $display === 'pages' && is_page( preg_split( "/[,]+/", $posts ) ) ) {
			$show = true;
		} elseif ( $display === 'expost' && ! is_single( preg_split( "/[,]+/", $posts ) ) ) {
			$show = true;
		} elseif ( $display === 'expage' && ! is_page( preg_split( "/[,]+/", $posts ) ) ) {
			$show = true;
		}

		return $show;
	}

}