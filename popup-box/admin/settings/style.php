<?php
/**
 * Style settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/style.php' );

?>

<!--region Popup Style-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Popup', 'popup-box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-one-third">
					<?php $this->number( $width ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->number( $height ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->number( $zindex ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->select( $location ); ?>
                </div>

                <div class="column is-one-third">
                    <span id="location-top"><?php $this->number( $top ); ?></span>
                    <span id="location-bottom"><?php $this->number( $bottom ); ?></span>
                </div>

                <div class="column is-one-third">
                    <span id="location-left"><?php $this->number( $left ); ?></span>
                    <span id="location-right"><?php $this->number( $right ); ?></span>
                </div>
                <div class="column is-one-third">
					<?php $this->select( $popup_animation ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->number( $radius ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->number( $padding ); ?>
                </div>

                <div class="column is-one-third">
					<?php $this->number( $shadow ); ?>
                </div>
                <div class="column is-one-third shadow-color">
					<?php $this->color( $shadow_color ); ?>
                </div>
                <div class="column is-one-third">
                </div>
                <div class="column is-one-third">
					<?php $this->color( $background ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->input( $background_img ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Overlay-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Overlay', 'popup-box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-one-third">
					<?php $this->color( $overlay ); ?>
                </div>
                <div class="column is-one-third overlay">
					<?php $this->select( $overlay_animation ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Content-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Content', 'popup-box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-one-third">
					<?php $this->select( $content_font ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->number( $content_size ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->number( $content_padding ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->select( $border_style ); ?>
                </div>
                <div class="column is-one-third border-content">
					<?php $this->number( $border_width ); ?>
                </div>
                <div class="column is-one-third border-content">
					<?php $this->number( $border_radius ); ?>
                </div>
                <div class="column is-one-third border-content">
					<?php $this->color( $border_color ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Close Button-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Close Button', 'popup-box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-one-third">
					<?php $this->select( $close ); ?>
                </div>
                <div class="column is-one-third close-button">
					<?php $this->number( $close_size ); ?>
                </div>
                <div class="column is-one-third close-button">
                    <span class="close-text"><?php $this->input( $close_text ); ?></span>
                </div>
                <div class="column is-one-third close-button">
					<?php $this->select( $close_location ); ?>
                </div>
                <div class="column is-one-third close-button">
					<?php $this->select( $close_place ); ?>
                </div>
                <div class="column is-one-third close-button">

                </div>
                <div class="column is-one-third close-button">
					<?php $this->color( $close_color ); ?>
                </div>
                <div class="column is-one-third close-button">
                    <span class="close-background"><?php $this->color( $close_background ); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Mobile Devices', 'popup-box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-one-third">
					<?php $this->number( $mobile ); ?>
                </div>
                <div class="column is-one-third mobile-rules">
					<?php $this->number( $mobile_width ); ?>
                </div>
            </div>
        </div>
    </div>
</div>