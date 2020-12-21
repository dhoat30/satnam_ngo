<?php
/**
 * Frontend order  html .
 *
 * @package  donation
 */

/**
 * Compaign enable or not  .
 *
 * @var type
 */
$display_compaigns = get_option( 'wc-domain-compaign-enable' );
/**
 * Compaign stored values .
 *
 * @var type
 */
$compaign_values = get_option( 'wc-donation-compaign-values' );
/**
 * Place where display currency symbol.
 *
 * @var type
 */
$where_currency_symbole = get_option( 'wc-donation-round-currency-symbol' );
/**
 * Currency symbol.
 *
 * @var type
 */
if (get_woocommerce_currency_symbol()) {
	$currency_symbole =  get_woocommerce_currency_symbol();
}
/**
 * Donation Label.
 *
 * @var type
 */
$donation_label  = !empty( esc_attr( get_option( 'wc-donation-round-field-label' ))) ? esc_attr( get_option( 'wc-donation-round-field-label' )) : 'Donation';
/**
 * Donation button text.
 *
 * @var type
 */
$donation_button_text  = !empty( esc_attr( get_option( 'wc-donation-round-button-text' ))) ? esc_attr( get_option( 'wc-donation-round-button-text' )) : 'Donate';
/**
 * Donation button Cancel text.
 *
 * @var type
 */
$donation_button_cancel_text  = !empty( esc_attr( get_option( 'wc-donation-round-button-cancel-text' ))) ? esc_attr( get_option( 'wc-donation-round-button-cancel-text' )) : 'Skip';
/**
 * Donation body text.
 *
 * @var type
 */
$donation_body_text  = !empty( esc_attr( get_option( 'wc-donation-round-field-message' ))) ? esc_attr( get_option( 'wc-donation-round-field-message' )) : 'Donate';
/**
 * Donation button bg color.
 *
 * @var type
 */
$donation_button_color  = !empty( esc_attr( get_option( 'wc-donation-round-button-color' ))) ? esc_attr( get_option( 'wc-donation-round-button-color' )) : 'd5d5d5';
/**
 * Donation button text color.
 *
 * @var type
 */
$donation_button_text_color  = !empty( esc_attr( get_option( 'wc-donation-round-button-text-color' ))) ? esc_attr( get_option( 'wc-donation-round-button-text-color' )) : '000000';
/**
 * Donation product.
 *
 * @var type
 */
$donation_product = get_option( 'wc-donation-round-product' );

if ( 'before' === $where_currency_symbole ) {
	$currencyBefore = $currency_symbole . ' ';
} else {
	$currencyAfter = ' ' . $currency_symbole;
}

if ( ! empty( $donation_product ) ) {
	?>
	<div class="wc-donation-popup" id="wc-doantion-popup">
		<style>
			#wc-doantion-popup {
				--wc-wdg-bg-color: #<?php esc_html_e( $donation_button_color ); ?>;
				--wc-wdg-txt-color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
		</style>
		<div class="wc-donation-popup-backdrop"></div>
		<div class="wc-donation-popup-content">
			<div class="wc-donation-popup-header">
				<span class="wc-close">x</span>
				<h1><?php echo esc_html( __( $donation_label, 'wc-donation' ) ); ?></h1>
			</div>
			<div class="wc-donation-popup-body">
				<div class="wc_donation_on_checkout">
					<div class="wc-donation-in-action">
						<p class="donation_text"><?php echo esc_html( __( $donation_body_text, 'wc-donation' ) ); ?></p>
						<div class="in-action-elements">
							<?php
							if ( 'before' === $where_currency_symbole ) {
								?>
								<style>
									#wc-doantion-popup .wc_donation_on_checkout .wc-donation-in-action .in-action-elements #wc-donation-f-donation-value {
										margin-left: 0;
									}
									#wc-doantion-popup .wc_donation_on_checkout .wc-donation-in-action .in-action-elements span {
										
										background: #<?php esc_html_e( $donation_button_color ); ?>;
										color: #<?php esc_html_e( $donation_button_text_color ); ?>;						
										border-radius: 4px 0 0 4px;
										margin-right: 0;
										height: 45px;
									}
								</style>
								<?php
								echo '<span class="display"> ' . esc_attr( $currency_symbole ) . '</span>';
							}
							?>
							<input type="text" onKeyPress="return NumbersOnly(this, event, true);" class="input-text wc-donation-field <?php echo esc_attr( $where_currency_symbole ); ?>" id='wc-donation-round-f-donation-value' Placeholder="<?php esc_html_e( 'Enter donation amount', 'wc-donation' ); ?>">
							<?php
							if ( 'after' === $where_currency_symbole ) {
								?>
								<style>
									#wc-doantion-popup .wc_donation_on_checkout .wc-donation-in-action .in-action-elements #wc-donation-f-donation-value {
										margin-right: 0;
									}
									#wc-doantion-popup .wc_donation_on_checkout .wc-donation-in-action .in-action-elements span {
										
										background: #<?php esc_html_e( $donation_button_color ); ?>;
										color: #<?php esc_html_e( $donation_button_text_color ); ?>;						
										border-radius: 0 4px 4px 0;
										margin-left: 0;
										height: 45px;
									}
								</style>
								<?php
								echo '<span class="display">' . esc_attr( $currency_symbole ) . '</span>';
							} 
							
							?>
										
						</div>
						<?php  
						if ( 1 == $display_compaigns && ( count( $compaign_values ) > 0 ) ) {
							
							if ( 'user-defined'===get_option( 'wc-donation-round-display-campaign' ) ) {

								echo "<select class='select wc-donation-field' id='wc-donation-round-f-compaign-value'>";
								foreach ( $compaign_values as $value ) {
									echo "<option value='" . esc_attr( $value ) . "'>" . esc_attr( $value ) . '</option>';
								}
								echo '</select>';
								
							} else {

								$value = get_option( 'wc-donation-round-display-campaign' );
								echo "<label style='margin-bottom:10px;'>Campaign</label>";
								echo "<input type='text' id='wc-donation-round-f-compaign-value' value='" . esc_html( $value ) . "' readonly='true' />";

							}
						}
						?>

						<button class="button" data-type="roundoff" style="background-color:#<?php esc_attr_e( $donation_button_color ); ?>;border-color:#<?php esc_attr_e( $donation_button_color ); ?>;color:#<?php esc_attr_e( $donation_button_text_color ); ?>;width:100%" id='wc-donation-round-f-submit-donation' value='Donate'><?php echo esc_attr( __( $donation_button_text, 'wc-donation' ) ); ?></button>
						<div style="height:15px; clear:both;">&nbsp;</div>
						<button class="button" data-type="roundoff-skip" style="background-color:#<?php esc_attr_e( $donation_button_color ); ?>;border-color:#<?php esc_attr_e( $donation_button_color ); ?>;color:#<?php esc_attr_e( $donation_button_text_color ); ?>;width:100%" id='wc-donation-round-f-submit-skip-donation' value='skip'><?php echo esc_attr( __( $donation_button_cancel_text, 'wc-donation' ) ); ?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
