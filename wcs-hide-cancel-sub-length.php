<?php
/**
 * Plugin Name: WooCommerce Subscriptions - Hide Cancel Button - Sub Length
 * Plugin URI:  https://github.com/jrick1229/wcs-hide-cancel-sub-length
 * Description: Hides the 'Cancel' button on the My Account page if the subscription has a set 'End Date'.
 * Author:      jrick1229
 * Author URI:  http://joeyrr.com/
 * Version:     1.1.0
 * License:     GPLv3
 *
 * GitHub Plugin URI: jrick1229/wcs-hide-cancel-sub-length
 * GitHub Branch: master
 *
 * Copyright 2018 Prospress, Inc.  (email : freedoms@prospress.com)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package WooCommerce Subscriptions
 * @author  Prospress Inc.
 * @since   1.0.0
 */

/**
 * Remove the "cancel" button.
 *
 * @param array           $actions      Array of action buttons.
 * @param WC_Subscription $subscription The subscription object.
 *
 * @return array The filtered array of actions.
 */
function eg_remove_my_subscriptions_button( $actions, $subscription ) {
	if ( $subscription->get_time( 'end' ) === 0 || $next_payment_timestamp > $subscription->get_time( 'end' ) ) {
		return $actions;
	}

	// Hide "Cancel" button.
	unset( $actions['cancel'] );

	return $actions;
}
add_filter( 'wcs_view_subscription_actions', 'eg_remove_my_subscriptions_button', 100, 2 );
