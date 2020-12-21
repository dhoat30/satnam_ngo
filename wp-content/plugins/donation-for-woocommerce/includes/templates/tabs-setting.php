
<h2 class="nav-tab-wrapper">
	<?php
	/**
	 *  Tabs html .
	 *
	 * @package donation
	 */
	
	if ( isset ( $_GET[ 'tab' ]) && ! empty( sanitize_text_field(  $_GET[ 'tab' ] ) ) ) {
		$current      = 	esc_attr( sanitize_text_field(  $_GET[ 'tab' ] ) );
	} else {
		$current      = 	esc_attr( 'general' );
	}
	$setting_tabs = array(
		'general'         => __( 'General Setting', 'wc-donation' ),
		'manage-compaign' => __( 'Manage Campaign', 'wc-donation' ),
		'widget' => __( 'Widget & Shortcode Setting', 'wc-donation' ),
		'round-off' => __( 'Round Off Donation', 'wc-donation' ),
	);
	foreach ( $setting_tabs as $setting_tab => $name ) {
		$class = ( $setting_tab === $current ) ? 'nav-tab-active' : '';
		?>
		<a class="nav-tab <?php echo esc_attr( $class ); ?>" href="?page=<?php echo esc_attr( $this->plugin_page_slug ); ?>&tab=<?php echo esc_attr( $setting_tab ); ?>"><?php echo esc_attr( $name ); ?></a>
	<?php } ?>
</h2>
