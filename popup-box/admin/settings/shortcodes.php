<?php
/**
 * Shortcode Generation for Popup Box
 *
 * @package     WP_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once( 'options/shortcodes.php' );

?>

<div id="popupShortcode" style="display:none;">

    <div id="shortcodeBuilder">
        <div class="columns is-t-margin">
            <div class="column is-one-third">
				<?php $this->select( $shortcode_type ); ?>
            </div>
        </div>

        <div class="columns is-multiline button-box">
            <div class="column is-one-third">
				<?php $this->select( $shortcode_btn_type ); ?>
            </div>
            <div class="column is-one-third ">
				<?php $this->select( $shortcode_btn_size ); ?>
            </div>
            <div class="column is-one-third ">
		        <?php $this->select( $shortcode_btn_fullwidth ); ?>
            </div>
            <div class="column is-one-third">
				<?php $this->input( $shortcode_btn_text ); ?>
            </div>
            <div class="column is-one-third shortcode-btn-link">
		        <?php $this->input( $shortcode_btn_link ); ?>
            </div>
            <div class="column is-one-third shortcode-btn-link">
		        <?php $this->select( $shortcode_btn_target ); ?>
            </div>

            <div class="column is-one-third">
				<?php $this->color( $shortcode_btn_color ); ?>
            </div>
            <div class="column is-one-third">
				<?php $this->color( $shortcode_btn_bgcolor ); ?>
            </div>

        </div>
    </div>

    <div class="columns button-box" id="shortcodeBtnBuilder">
        <div class="column is-full">
            <label class="label"><?php esc_attr_e( 'Preview Button', 'popup-box' ); ?>:</label>
            <div class="has-text-centered" id="shortcodeBtnPreview"></div>
        </div>
    </div>

    <div class="columns">
        <div class="column is-full">
            <label class="label"><?php esc_attr_e( 'Shortcode', 'popup-box' ); ?>:</label>
            <div class="shortcodeBox has-text-centered" id="shortcodeBox"></div>
        </div>
    </div>

    <button class="button button-primary button-large is-size-6 is-radiusless" id="shortcodeInsert">
        <span>Insert Shortcode</span>
    </button>


</div>