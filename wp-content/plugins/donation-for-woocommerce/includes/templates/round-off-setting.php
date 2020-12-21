<form method="post" class="wc-donation-round-form" action="options.php">
	<?php
	/**
	 * Admin settings.
	 *
	 * @package donation
	 */
	settings_fields( 'wc-round-off-donation-settings-group' );
	do_settings_sections( 'wc-round-off-donation-settings-group' );
	$products        = wc_get_products( array( 'type' => 'simple', 'limit' => -1, 'meta_key' => 'is_wc_donation', 'meta_value' => 'donation' ) );
	$donation_round_switch = get_option( 'wc-donation-round-switch' );
	$donation_round_multiplier = get_option( 'wc-donation-round-multiplier' );
	$display_compaigns = get_option( 'wc-domain-compaign-enable' );
	$compaign_values = get_option( 'wc-donation-compaign-values' );
	$donation_label  = !empty( esc_attr( get_option( 'wc-donation-round-field-label' ))) ? esc_attr( get_option( 'wc-donation-round-field-label' )) : 'Donation';
	$donation_message  = !empty( esc_attr( get_option( 'wc-donation-round-field-message' ))) ? esc_attr( get_option( 'wc-donation-round-field-message' )) : '';
	$donation_button_text  = !empty( esc_attr( get_option( 'wc-donation-round-button-text' ))) ? esc_attr( get_option( 'wc-donation-round-button-text' )) : 'Donate';
	$donation_button_cancel_text  = !empty( esc_attr( get_option( 'wc-donation-round-button-cancel-text' ))) ? esc_attr( get_option( 'wc-donation-round-button-cancel-text' )) : 'Skip';
	$donation_button_color  = !empty( esc_attr( get_option( 'wc-donation-round-button-color' ))) ? esc_attr( get_option( 'wc-donation-round-button-color' )) : 'd5d5d5';
	$donation_button_text_color  = !empty( esc_attr( get_option( 'wc-donation-round-button-text-color' ))) ? esc_attr( get_option( 'wc-donation-round-button-text-color' )) : '000000';
	?>

	<?php 
	if ( 'yes' === $donation_round_switch ) {
		
		$checked = 'checked';

	} 
	
	?>
	<div class="select-wrapper">
		<label class="wc-donation-switch">
			<input id="wc-donation-round-switch" name="wc-donation-round-switch" type="checkbox" value="yes" <?php echo esc_attr(@$checked); ?>>
			<span class="wc-slider round"></span>
		</label>
		<label for="wc-donation-round-switch"><?php echo esc_attr( __( 'Enable round off donation', 'wc-donation' ) ); ?></label>
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Round Off Multiplier', 'wc-donation' ); ?><br><small style="color:#777"><?php echo esc_attr__( '(number should be greater than 0. if empty or other value than integer, it will be considered as 1)', 'wc-donation' ); ?></small></label>
		<input type="number" min="1" value="<?php echo esc_attr($donation_round_multiplier); ?>" name="wc-donation-round-multiplier" id="wc-donation-round-multiplier" />
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr( __( 'Donation Product', 'wc-donation' ) ); ?></label>
		<select class='select short' style="width:200px;" name='wc-donation-round-product<?php echo esc_attr(WcDonation::get_wpml_lang_code()); ?>'>
			<option><?php echo esc_html(__('select product', 'wc-donation')); ?></option>
			<?php
			foreach ( $products as $product ) {
				echo '<option value="' . esc_attr( $product->get_id() ) . '"' .
				selected( get_option( 'wc-donation-round-product' . WcDonation::get_wpml_lang_code() ), $product->get_id() ) . '>' .
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
			<select name='wc-donation-round-display-campaign'>
				<?php
				echo '<option value="user-defined" ' . selected( get_option( 'wc-donation-round-display-campaign' ), 'user-defined' ) . '>' . esc_html__('User Defined', 'wc-donation') . '</option>';
				foreach ( $compaign_values as $value ) {
					echo '<option value="' . esc_attr( $value ) . '"' .
					selected( get_option( 'wc-donation-round-display-campaign' ), $value ) . '>' .
					esc_attr( $value ) . '</option>';
				}
				?>
			</select>
		</div>
		<?php 
	} 
	?>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Currency Symbol', 'wc-donation' ); ?></label>
		<select name='wc-donation-round-currency-symbol'>
			<?php
			foreach ( WcDonation::CURRENCY_SIMBOL() as $key => $value ) {
				echo '<option value="' . esc_attr( $key ) . '"' .
				selected( get_option( 'wc-donation-round-currency-symbol' ), $key ) . '>' .
				esc_attr( $value ) . '</option>';
			}
			?>
		</select>
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Popup title', 'wc-donation' ); ?></label>
		<input type="text" value="<?php echo esc_attr($donation_label); ?>" name="wc-donation-round-field-label" id="wc-donation-round-field-label" />
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Popup Message (use %amount% to show dynamic donation value in message)', 'wc-donation' ); ?></label>
		<textarea name="wc-donation-round-field-message" id="wc-donation-round-field-message" cols="30" rows="5" style="resize:none"><?php echo esc_attr($donation_message); ?></textarea>
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Button Text', 'wc-donation' ); ?></label>
		<input type="text" value="<?php echo esc_attr($donation_button_text); ?>" name="wc-donation-round-button-text" id="wc-donation-round-button-text" />
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Cancel Button Text', 'wc-donation' ); ?></label>
		<input type="text" value="<?php echo esc_attr($donation_button_cancel_text); ?>" name="wc-donation-round-button-cancel-text" id="wc-donation-round-button-cancel-text" />
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Button Color', 'wc-donation' ); ?></label>
		<input type="text" class="jscolor" value="<?php echo esc_attr($donation_button_color); ?>" name="wc-donation-round-button-color" id="wc-donation-round-button-color" />
	</div>

	<div class="select-wrapper">
		<label for=""><?php echo esc_attr__( 'Button Text Color', 'wc-donation' ); ?></label>
		<input type="text" class="jscolor" value="<?php echo esc_attr($donation_button_text_color); ?>" name="wc-donation-round-button-text-color" id="wc-donation-round-button-text-color" />
	</div>


	<?php submit_button(); ?>

</form>
