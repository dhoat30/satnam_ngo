<?php

class WcDonationOrder {

	public function __construct() {
		add_filter( 'restrict_manage_posts', array( $this, 'add_new_order_filter' ), 10, 0 );
		add_action( 'pre_get_posts', array( $this, 'process_admin_shop_order_compaign_name_filter' ), 10, 1 );
		add_action( 'wp_ajax_donation_to_order', array( $this, 'add_donation_to_order_action' ), 10 );
		add_action( 'wp_ajax_nopriv_donation_to_order', array( $this, 'add_donation_to_order_action' ), 10 );
		add_action( 'woocommerce_before_calculate_totals', array( $this, 'wc_donation_alter_price_cart'), 9999 );
		add_filter( 'woocommerce_cart_item_price', array( $this, 'wc_donation_cart_item_price_filter' ), 99, 3 );

		add_action('woocommerce_add_order_item_meta', array($this, 'addCartItemMetaToOrderItemMeta'), 10, 3);
		add_filter('woocommerce_order_item_display_meta_key', array($this, 'changeOrderItemMetaTitle'), 20, 3);
		add_filter('woocommerce_get_item_data', array($this, 'displayCartItemCompaignMeta'), 10, 2);

		add_action('woocommerce_thankyou', array( $this, 'wc_donation_counts'), 10, 1);
		add_action('woocommerce_subscription_renewal_payment_complete', array( $this, 'wc_donation_counts_on_subscription'), 10, 2);
		//add_action('woocommerce_before_mini_cart_contents', array( $this, 'wc_donation_test'), 10);

		
	}

	// public function wc_donation_test () {

	// 	wp_die('test!');
	// }

	public function wc_donation_cart_item_price_filter ( $price, $cart_item, $cart_item_key ) {

		if ( isset($cart_item['compaign']) ) {
			return wc_price($cart_item['custom_price']);
		} else {
			return $price;
		}
		
	}

	public function wc_donation_counts_on_subscription ( $subscription, $last_order ) {
		//will start working here.

		$order_id = $last_order->id;
		if ( ! $order_id ) {
			return;
		}

		// Get an instance of the WC_Order object
		$order = wc_get_order( $order_id );

		// Loop through order items
		foreach ( $order->get_items() as $item_id => $item ) {

			// Get the product object
			$product = $item->get_product();

			// Get the product Id
			$product_id = $product->get_id();

			$total_donations = !empty(get_post_meta( $product_id, 'total_donations', true )) ? get_post_meta( $product_id, 'total_donations', true ) : 0;
			$total_donation_amount = !empty(get_post_meta( $product_id, 'total_donation_amount', true )) ? get_post_meta( $product_id, 'total_donation_amount', true ) : 0;
			$item_total = $item->get_total(); // Get the item line total discounted

			//increase the value by 1
			++$total_donations;

			// update to database in product meta
			$total_donations = apply_filters ( 'wc_donation_total_donation_count_on_renewal', $total_donations, $product_id );
			update_post_meta( $product_id, 'total_donations', $total_donations);			

			//increase the value by 1
			$total_donation_amount += $item_total;

			// update to database in product meta
			$total_donation_amount = apply_filters ( 'wc_donation_total_donation_amount_on_renewal', $total_donation_amount, $product_id );
			update_post_meta( $product_id, 'total_donation_amount', $total_donation_amount);

		}
	}

	public function wc_donation_counts ( $order_id ) {
		//will start working here.
		if ( ! $order_id ) {
			return;
		}

		// Allow code execution only once 
		if ( ! get_post_meta( $order_id, '_thankyou_action_done', true ) ) { 

			// Get an instance of the WC_Order object
			$order = wc_get_order( $order_id );

			// Loop through order items
			foreach ( $order->get_items() as $item_id => $item ) {

				// Get the product object
				$product = $item->get_product();
	
				// Get the product Id
				$product_id = $product->get_id();

				//continue from here
				$defined_length = get_post_meta ($product_id, '_subscription_custom_length', true);
				if ( ! empty($defined_length) || false != $defined_length ) {
					update_post_meta ($product_id, '_subscription_length', $defined_length);
				}

				$total_donations = !empty(get_post_meta( $product_id, 'total_donations', true )) ? get_post_meta( $product_id, 'total_donations', true ) : 0;
				$total_donation_amount = !empty(get_post_meta( $product_id, 'total_donation_amount', true )) ? get_post_meta( $product_id, 'total_donation_amount', true ) : 0;
				$item_total = $item->get_total(); // Get the item line total discounted

				//increase the value by 1
				++$total_donations;

				// update to database in product meta
				$total_donations = apply_filters ( 'wc_donation_total_donation_count', $total_donations, $product_id );
				update_post_meta( $product_id, 'total_donations', $total_donations);			

				//increase the value by 1
				$total_donation_amount += $item_total;

				// update to database in product meta
				$total_donation_amount = apply_filters ( 'wc_donation_total_donation_amount', $total_donation_amount, $product_id );
				update_post_meta( $product_id, 'total_donation_amount', $total_donation_amount);
	
			}
		}
	}

	public function addCartItemMetaToOrderItemMeta( $item_id, $item_values, $item_key ) {
		
		wc_update_order_item_meta($item_id, 'compaign', sanitize_text_field($item_values['compaign']));
		wc_update_order_item_meta($item_id, 'campaign_type', sanitize_text_field($item_values['campaign_type']));
		wc_update_order_item_meta($item_id, 'campaign_id', sanitize_text_field($item_values['campaign_id']));
	}

	public function changeOrderItemMetaTitle( $key, $meta, $item ) {

		if ( 'compaign' === $meta->key ) {
			$key = 'Campaign name ';
		} 
		
		if ( 'campaign_type' === $meta->key ) {
			$key = 'type ';
		}
		return $key;
	}

	public function displayCartItemCompaignMeta( $item_data, $cart_item ) {
	
		if ( empty( $cart_item['compaign'] ) || empty( $cart_item['campaign_type'] )  ) {
			return $item_data;
		}
		
		do_action ( 'wc_donation_before_display_meta_on_cart', $item_data, $cart_item );

		$item_data[] = array(
			'key' => __('Campaign', 'wc-donation'),
			'value' => wc_clean($cart_item['compaign']),
			'display' => '',
		);

		$item_data[] = array(
			'key' => __('Source ', 'wc-donation'),
			'value' => wc_clean($cart_item['campaign_type']),
			'display' => '',
		);

		return $item_data;
	}

	public function add_new_order_filter() {
		global $pagenow, $post_type;
		$filter_id = 'filter_compaign_type';
		if ( 'shop_order' === $post_type && 'edit.php' === $pagenow ) {
			if ( isset ( $_GET['filter_compaign_type'] ) ) {
				$current   = sanitize_text_field( $_GET['filter_compaign_type']  );
			} else {
				$current   = '';
			}
			echo '<select name="' . esc_attr( $filter_id ) . '">
			<option value="">' . esc_html( __( 'Filter by Campaign Name', 'wc-donation' ) ) . '</option>';
			$all_campaigns = get_posts(array(
				'fields'          => 'ids',
				'posts_per_page'  => -1,
				'post_type' => 'wc-donation'
			));
			foreach ( $all_campaigns as $campaign ) {
				printf(
					'<option value="%s" %s> %s </option>',
					esc_html( $campaign ),
					esc_attr( $campaign ) === $current ? '" selected="selected"' : '',
					esc_html( get_the_title( $campaign ) )
				);
			}
			echo '</select>';
		}
	}


	public function process_admin_shop_order_compaign_name_filter( $query ) {
		global $pagenow, $post_type, $wpdb;
		if (isset ( $_GET[ 'filter_compaign_type' ] )) { 
			if (
					$query->is_admin && 'edit.php' === $pagenow && 'shop_order' === $post_type && sanitize_text_field($_GET[ 'filter_compaign_type' ]) && '' !== sanitize_text_field($_GET[ 'filter_compaign_type' ])
			) {
				$order_ids = $wpdb->get_col(
					$wpdb->prepare(
						"
				SELECT DISTINCT o.ID
				FROM {$wpdb->prefix}posts o
				INNER JOIN {$wpdb->prefix}woocommerce_order_items oi
					ON oi.order_id = o.ID
				INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta oim
					ON oi.order_item_id = oim.order_item_id
				
				WHERE o.post_type = %s
				AND oim.meta_key = 'campaign_id'
				AND oim.meta_value = %s
				
			",
						$post_type,
						sanitize_text_field( $_GET[ 'filter_compaign_type' ] )
					)
				);

				if ( ! empty( $order_ids ) ) {
					$query->set( 'post__in', $order_ids );      // Set the new "meta query".
					$query->set( 'posts_per_page', 25 );        // Set "posts per page".
					$query->set( 'paged', ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ) );    // Set "paged".
				}
			}
		}
		return $query;
	}

	public function updateExistingCartItem( $cartItemId, $metaData ) {
		$cartItem = WC()->cart->cart_contents[$cartItemId];
		// print_r($metaData);
		// wp_die('ruk yaha!');
		foreach ($metaData as $key => $value) {
			$cartItem[$key] = $value;
		}
		$cartItem['data']->set_price($cartItem['custom_price']);
		WC()->cart->cart_contents[$cartItemId] = $cartItem;
		WC()->cart->set_session();
	}

	public function getCartItemKeysIncludeProduct( $product_id ) {
		$cartItemsIds = array();		
		
		foreach (WC()->cart->get_cart() as $cart_item_key => $values) {

			
			$product = $values['data'];
			if ($product_id == $product->id) {
				
				$cartItemsIds[] = $cart_item_key;
			}
		}

		return $cartItemsIds;
	}

	public function wc_donation_alter_price_cart ( $cart ) {
		if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
			return;
		}
 
		if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 ) {
			return;
		}
	
		foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
			$product = $cart_item['data'];
			$price = $product->get_price();
			if ( isset($cart_item['custom_price']) ) {
				$cart_item['data']->set_price( $price + $cart_item['custom_price'] );
			}
		}
	} 

	public function add_donation_to_order_action() {

		if ( isset( $_POST['nonce'] ) && !wp_verify_nonce(sanitize_text_field($_POST['nonce']), WcdonationProces::$addDonationToOrderActionName )) {
			exit( 'Not Authorized' );
		}

		//$_POST['campaign_id'];
		//$_POST['amount'];
		//$_POST['type'];
		
		do_action ('wc_donation_before_donate');
		
		if ( !isset($_POST['campaign_id']) || empty( sanitize_text_field($_POST['campaign_id']) ) ) {
			wp_die('No campaign ID found!');
		}

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		$object = WcdonationCampaignSetting::get_product_by_campaign( sanitize_text_field($_POST['campaign_id']) );		
		$isDone = false;
		$product_id = $object->product['product_id'];
		$response['response'] = 'failed';
		$RecurringDisp = $object->campaign['RecurringDisp'];
		$is_recurring = isset($_POST['is_recurring']) ? sanitize_text_field($_POST['is_recurring']) : 'no';
		$new_period = isset($_POST['new_period']) ? sanitize_text_field($_POST['new_period']) : '';		
		$defined_length = get_post_meta ($product_id, '_subscription_custom_length', true);
		if (!empty($_POST['amount'])) {

			// check if recurring type is user
			if ( 'user' == $RecurringDisp ) {
				if ( 'yes' == $is_recurring ) {
					update_post_meta ($product_id, '_subscription_period', $new_period);
					update_post_meta ($product_id, '_subscription_length', $defined_length);
				} else { // pass this donation as one time donation
					update_post_meta ($product_id, '_subscription_length', 1); 
				}
			}
			
			$cart_item_data = array(
				'custom_price' => sanitize_text_field( $_POST['amount'] ),
				'campaign_id' => sanitize_text_field($_POST['campaign_id']),
			);

			if ( isset($object->campaign['campaign_name']) ) {
				$cart_item_data['compaign'] = sanitize_text_field( $object->campaign['campaign_name'] );
				$cart_item_data['campaign_type'] = isset($_POST['type']) ? sanitize_text_field($_POST['type']) : '';
			}

			$cartItems = $this->getCartItemKeysIncludeProduct( $product_id );

			if (empty($cartItems)) {
				WC()->cart->add_to_cart($product_id, 1, 0, array(), $cart_item_data);
				$isDone = true;
			} else {
				$cart = WC()->cart->get_cart();
				foreach ($cartItems as $cartItemKey) {
					if ( !$isDone && $cart[$cartItemKey]['compaign'] && sanitize_text_field( $object->campaign['campaign_name'] == $cart[$cartItemKey]['compaign'] ) ) {
						$this->updateExistingCartItem($cartItemKey, $cart_item_data);
						$isDone = true;
					} elseif ( !$isDone && !$cart[$cartItemKey]['compaign'] && !isset($object->campaign['campaign_name']) ) {
						$this->updateExistingCartItem($cartItemKey, $cart_item_data);
						$isDone = true;
					}
				}
				if ( !$isDone ) {
					WC()->cart->add_to_cart( $product_id, 1, 0, array(), $cart_item_data );
				}
			}
			$response['response'] = 'success';

			if ( ! is_checkout() && isset($_POST['type']) && ( 'widget'===$_POST['type'] || 'shortcode'===$_POST['type'] || 'single'===$_POST['type'] ) ) {

				$response['checkoutUrl'] = wc_get_checkout_url();
	
			} else {
	
				$response['checkoutUrl'] = '';
	
			}

		}

		do_action ('wc_donation_after_donate');

		echo ( json_encode( apply_filters ( 'wc_donation_alter_donate_response', $response ) ) );
		wp_die();
	}
}

new WcDonationOrder();
