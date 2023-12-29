<?php
/**
 * Notification settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'options/settings.php' );

?>

<!--region Triggers-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Triggers', 'popup-box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns">
                <div class="column is-one-third">
					<?php $this->select( $triggers ); ?>
                </div>
                <div class="column is-one-third trigger-auto">
					<?php $this->number( $delay ); ?>
                </div>
                <div class="column is-one-third trigger-scrolled">
					<?php $this->number( $distance ); ?>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
					<?php $this->number( $cookie ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->checkbox( $block_page ); ?>
                </div>
            </div>
            <div class="trigger-click">
                <p class="has-text-danger has-text-weight-bold"><?php _e( 'You can open popup via adding to the element:', 'popup-box' ); ?></p>
                <ul>
                    <li><strong>Class</strong> - ds-open-popup-<?php echo absint( $tool_id ); ?>, like <code>&lt;span
                            class="ds-open-popup-<?php echo absint( $tool_id ); ?>"&gt;Open Popup&lt;/span&gt;</code>
                    </li>
                    <li><strong>URL</strong> - #ds-open-popup-<?php echo absint( $tool_id ); ?>, like <code>&lt;a
                            href="#ds-open-popup-<?php echo absint( $tool_id ); ?>">Open Popup&lt;/a&gt;</code></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!--region Closing Popup-->
<div class="accordion-wrap">
    <div class="accordion-block">
        <div class="accordion-title">
            <span class="plus"><i class="dashicons dashicons-arrow-down-alt2"></i></span>
            <span class="minus"><i class="dashicons dashicons-arrow-up-alt2"></i></span>
            <span class="faq-title"><?php esc_attr_e( 'Closing Popup', 'popup-box' ); ?></span>
        </div>
        <div class="accordion-content content">
            <div class="columns is-multiline">
                <div class="column is-one-third">
					<?php $this->checkbox( $close_overlay ); ?>
                </div>
                <div class="column is-one-third">
					<?php $this->checkbox( $close_Esc ); ?>
                </div>
            </div>
            <p class="has-text-danger has-text-weight-bold"><?php _e( 'You can сlose popup via adding to the element:', 'popup-box' ); ?></p>
            <ul>
                <li><strong>Class</strong> - ds-close-popup, like <code>&lt;span
                        class="ds-close-popup"&gt;Close Popup&lt;/span&gt;</code></li>

            </ul>
        </div>
    </div>
</div>
<!--endregion-->
