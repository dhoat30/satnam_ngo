<form method="post" class="wc-donation-widget-form" action="options.php">
	<?php
	/**
	 * Admin settings.
	 *
	 * @package donation
	 */
	//echo 'widget Setting Page';
	settings_fields( 'wc-donation-widget-settings-group' );
	do_settings_sections( 'wc-donation-widget-settings-group' );
	$products        = wc_get_products( array( 'type' => 'simple', 'limit' => -1, 'meta_key' => 'is_wc_donation', 'meta_value' => 'donation' ) );
	$donation_redirect        = get_option( 'wc-donation-widget-redirect' );
	$display_compaigns = get_option( 'wc-domain-compaign-enable' );
	$compaign_values = get_option( 'wc-donation-compaign-values' );
	$donation_values = get_option( 'wc-donation-widget-donation-values' );
	$donation_label  = !empty( esc_attr( get_option( 'wc-donation-widget-field-label' ))) ? esc_attr( get_option( 'wc-donation-widget-field-label' )) : 'Donation';
	$donation_button_text  = !empty( esc_attr( get_option( 'wc-donation-widget-button-text' ))) ? esc_attr( get_option( 'wc-donation-widget-button-text' )) : 'Donate';
	$donation_button_color  = !empty( esc_attr( get_option( 'wc-donation-widget-button-color' ))) ? esc_attr( get_option( 'wc-donation-widget-button-color' )) : 'd5d5d5';
	$donation_button_text_color  = !empty( esc_attr( get_option( 'wc-donation-widget-button-text-color' ))) ? esc_attr( get_option( 'wc-donation-widget-button-text-color' )) : '000000';
	?>

	<div class="select-wrapper">
		<label for="wc-woo-shortcode" onclick="copyToClip()"><?php echo esc_attr( __( 'Use this shortcode to show donation form anywhere in your site (click to copy)', 'wc-donation' ) ); ?></label>
		<input type="text" id="wc-woo-shortcode" onclick="copyToClip()" value="[wc_woo_donation]" readonly>
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr( __( 'Donation Product', 'wc-donation' ) ); ?></label>
		<select class='select short' style="width:200px;" name='wc-donation-widget-product<?php echo esc_attr(WcDonation::get_wpml_lang_code()); ?>'>
			<option><?php echo esc_html(__('select product', 'wc-donation')); ?></option>
			<?php
			foreach ( $products as $product ) {
				echo '<option value="' . esc_attr( $product->get_id() ) . '"' .
				selected( get_option( 'wc-donation-widget-product' . WcDonation::get_wpml_lang_code() ), $product->get_id() ) . '>' .
				esc_attr( $product->get_name() ) . '</option>';
			}
			?>
		</select>
	</div>

	<?php 
	if ( 1 == $display_compaigns && ( count( $compaign_values ) > 0 ) ) {
		?>
		<div class="select-wrapper">
			<label for=""><?php echo esc_attr( __( 'Select Campaign (If not selected all campaigns will show)', 'wc-donation' ) ); ?></label>
			<select name='wc-donation-widget-display-campaign'>
				<?php
				echo '<option value="user-defined" ' . selected( get_option( 'wc-donation-widget-display-campaign' ), 'user-defined' ) . '>' . esc_html__('User Defined', 'wc-donation') . '</option>';
				foreach ( $compaign_values as $value ) {
					echo '<option value="' . esc_attr( $value ) . '"' .
					selected( get_option( 'wc-donation-widget-display-campaign' ), $value ) . '>' .
					esc_attr( $value ) . '</option>';
				}
				?>
			</select>
		</div>
		<?php 
	} 
	?>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr( __( 'Display Donation', 'wc-donation' ) ); ?></label>
		<select name='wc-donation-widget-display-donation'>
			<?php
			foreach ( WcDonation::DISPLAY_DONATION() as $key => $value ) {
				echo '<option value="' . esc_attr( $key ) . '"' .
				selected( get_option( 'wc-donation-widget-display-donation' ), $key ) . '>' .
				esc_attr( $value ) . '</option>';
			}
			?>
		</select>
	</div>

	<div class="select-wrapper" id="display-donation-type">
		<label for=""><?php echo esc_attr( __( 'Display Donation Type', 'wc-donation' ) ); ?></label>
		<select name='wc-donation-widget-display-donation-type'>
			<?php
			foreach ( WcDonation::DISPLAY_DONATION_TYPE() as $key => $value ) {
				echo '<option value="' . esc_attr( $key ) . '"' .
				selected( get_option( 'wc-donation-widget-display-donation-type' ), $key ) . '>' .
				esc_attr( $value ) . '</option>';
			}
			?>
		</select>
	</div>

	<div id="wc-donation-widget-section-form-donation">

		<div>
			<div id="wc-danation-widget-stored-values-donation">
				<?php
				if ( ! empty( $donation_values ) ) {
					foreach ( $donation_values as $value ) {
						echo "<div class='wc-donation-widget-row-donation'> 
						<span class='wc-donation-widget-value-donation'>" . esc_attr( $value ) . "</span> 
						<button class ='wc-donation-widget-row-delete-donation'> " . esc_attr( __( 'Delete', 'wc-donation' ) ) . '</button>
						</div>';
					}
				}
				?>
			</div>
			<button class='button button-primary' onclick="displayFormWidget(event)"> <i class="fa fa-plus"></i> <?php echo esc_attr( __( 'Add Donation', 'wc-donation' ) ); ?></button>
			<div id="wc-donation-widget-form-donation" style="display:none;">
				<input id='wc-domain-widget-input-value-donation' name='wc-domain-widget-donation-value' type='number' min="1" value="<?php echo esc_attr( get_option( 'wc-domain-donation-value' ) ); ?>">
				<button class='button button-primary' id='wc-domain-widget-submit-value-donation'> <?php echo esc_attr( __( 'Save', 'wc-donation' ) ); ?> </button>
			</div>
		</div>

	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Currency Symbol', 'wc-donation' ); ?></label>

		<select name='wc-donation-widget-currency-symbol'>
			<?php
			foreach ( WcDonation::CURRENCY_SIMBOL() as $key => $value ) {
				echo '<option value="' . esc_attr( $key ) . '"' .
				selected( get_option( 'wc-donation-widget-currency-symbol' ), $key ) . '>' .
				esc_attr( $value ) . '</option>';
			}
			?>
		</select>
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Donation Field Label', 'wc-donation' ); ?></label>
		<input type="text" value="<?php echo esc_attr($donation_label); ?>" name="wc-donation-widget-field-label" id="wc-donation-widget-field-label" />
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Button Text', 'wc-donation' ); ?></label>
		<input type="text" value="<?php echo esc_attr($donation_button_text); ?>" name="wc-donation-widget-button-text" id="wc-donation-widget-button-text" />
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Button Color', 'wc-donation' ); ?></label>
		<input type="text" class="jscolor" value="<?php echo esc_attr($donation_button_color); ?>" name="wc-donation-widget-button-color" id="wc-donation-widget-button-color" />
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Button Text Color', 'wc-donation' ); ?></label>
		<input type="text" class="jscolor" value="<?php echo esc_attr($donation_button_text_color); ?>" name="wc-donation-widget-button-text-color" id="wc-donation-widget-button-text-color" />
	</div>


	<?php submit_button(); ?>

</form>
