<form method="post" class="wc-donation-form" action="options.php">
	<?php
	/**
	 * Admin compaign setting
	 *
	 * @package donation
	 */

	settings_fields( 'wc-donation-manage-compaign-settings-group' );
	do_settings_sections( 'wc-donation-manage-compaign-settings-group' );
	$compaign_values = get_option( 'wc-donation-compaign-values' );
	?>

	<label for="wc-domain-compaign-enable">
		<input type="checkbox" id="wc-domain-compaign-enable" name="wc-domain-compaign-enable" value="1" <?php checked( get_option( 'wc-domain-compaign-enable' ), 1 ); ?> />
		<?php echo esc_html( __( 'Enable', 'wc-donation' ) ); ?>
	</label>

	<div class="wc-donation-section-form-compaign" valign="top">
		<div id="wc-danation-stored-values-compaign">
			<?php
			if ( is_array($compaign_values) && count($compaign_values) > 0 ) {
				
				foreach ( $compaign_values as $value ) {
					echo "<div class='wc-donation-row-compaign'> 
							<span class='wc-donation-value-compaign'>" . esc_attr( $value ) . "</span> 
							<button class ='wc-donation-row-delete-compaign button button-warning'> " . esc_html( __( 'Delete', 'wc-donation' ) ) . '</button>
							</div>';
				}
				
			}
			?>
		</div>
		<button class='button button-primary' onclick="displayForm(event)"> <i class="fa fa-plus"></i> <?php echo esc_html( __( 'Add Campaign', 'wc-donation' ) ); ?></button>
		<div id="wc-donation-form-compaign" style="display:none;">
			<input id='wc-domain-input-value-compaign' name='wc-domain-compaign-value' type='text'>
			<button class='button button-primary' class='btn-primary' id='wc-domain-submit-value-compaign'> <?php echo esc_html( __( 'Save', 'wc-donation' ) ); ?></button>
		</div>
	</div>

	<?php submit_button(); ?>

</form>
