$ = jQuery;

function copyToClip(el) {
	/* Get the text field */
	var copyText = document.getElementById(el);

	/* Select the text field */
	copyText.select();
	copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  
	/* Copy the text inside the text field */
	document.execCommand("copy");
  
	/* Alert the copied text */
	alert("Copied the text: " + copyText.value);

	return;
}

jQuery(document).ready(function(){

	//single_capaign.php
	jQuery('.wc-donation-tablinks').on('click', function(e) {
		e.preventDefault();
		var id = jQuery(this).attr('href');
		jQuery(this).siblings('.wc-donation-tablinks').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.wc-donation-tabcontent').css('display', 'none');
		jQuery('#' + id).css('display', 'block');
		jQuery(this).siblings('input').val(id);
	});

	var firstTab = jQuery('#wc-donation-tablink').val();
	jQuery('.wc-donation-tablinks').removeClass('active');
	jQuery('a[href="'+ firstTab +'"]').addClass('active');
	jQuery('.wc-donation-tabcontent').css('display', 'none');
	jQuery('#' + firstTab).css('display', 'block');

	//campaign_settings_html.php
	jQuery('#pred-add-more').click(function(e) {
		e.preventDefault();
		var parent = jQuery(this).parent('#wc-donation-predefined-wrapper');
		var count = parent.find('.pred').length;
		//alert(count);
		var next_count = count+1;
		//alert(next_count);
		var html = '';
		html += '<div class="pred" id="pred-'+ next_count +'">';
		html += '<div class="pred-wrapper">';
		html += '<a href="#" class="dashicons dashicons-trash pred-delete"></a>';
		html += '<h4>'+ wcds.donation_level_text +'</h4>';
		html += '<div class="select-wrapper">'
					+'<label class="wc-donation-label" for="pred-amount-'+ next_count +'">'+ wcds.amount_l_text +'</label>'
					+'<input type="text" id="pred-amount-'+ next_count +'" Placeholder="'+ wcds.amount_p_text +'" name="pred-amount[]" value="">'
				+'</div>';
		html += '<div class="select-wrapper">'
					+'<label class="wc-donation-label" for="pred-label-'+ next_count +'">'+ wcds.label_l_text +'</label>'
					+'<input type="text" id="pred-label-'+ next_count +'" Placeholder="'+ wcds.label_p_text +'" name="pred-label[]" value="">'
				+'</div>';
		html += '</div>';
		html += '</div>';
		//alert(count);

		jQuery(html).insertBefore(jQuery(this));
	});

	jQuery(document).on('click', '.pred-delete', function(e) {
		e.preventDefault();
		//alert('test');
		jQuery(this).parents('.pred').remove();
	});

	jQuery('.display-option').on('click', 'input[type="radio"]', function(){

		if ( jQuery(this).is(':checked') && jQuery(this).val() == 'both' ) {
			jQuery('div[data-id="predefined"]').css('display', 'grid');
			jQuery('div[data-id="free-value"]').css('display', 'grid');
			return;
		}

		if ( jQuery(this).is(':checked') ) {
			var id = jQuery(this).val();
			jQuery('div[data-id="'+ id +'"]').css('display', 'grid');
			jQuery('div[data-id="'+ id +'"]').siblings('.display-wrapper').css('display', 'none');
		}
	});

	if ( jQuery('#predefined').is(':checked') ) {
		jQuery('div[data-id="predefined"]').css('display', 'grid');
		jQuery('div[data-id="free-value"]').css('display', 'none');
	} 
	
	if ( jQuery('#free-value').is(':checked') ) {
		jQuery('div[data-id="free-value"]').css('display', 'grid');
		jQuery('div[data-id="predefined"]').css('display', 'none');
	} 
	
	if ( jQuery('#both').is(':checked') ) {
		jQuery('div[data-id="predefined"]').css('display', 'grid');
		jQuery('div[data-id="free-value"]').css('display', 'grid');
	}

	//recurring_donation_html.php
	jQuery('#wc-donation-recurring').on('change', function(){

        if ( jQuery(this).val() == 'enabled' || jQuery(this).val() == 'user' ) {
            jQuery('#wc-donation-recurring-schedules').css('display', 'inline-block');
        } else {
            jQuery('#wc-donation-recurring-schedules').css('display', 'none');  
        }
    });

    if ( jQuery('#wc-donation-recurring').val() == 'enabled' || jQuery('#wc-donation-recurring').val() == 'user' ) {
        jQuery('#wc-donation-recurring-schedules').css('display', 'inline-block');
    } else {
        jQuery('#wc-donation-recurring-schedules').css('display', 'none');
    }
});

jQuery(document).on('change', '#_subscription_period', function(){

	var $this = jQuery(this);
	var period = $this.val();

	jQuery.ajax({
		url: wcds.ajaxUrl,
		type: "POST",
		dataType: "json",
		data: {
			action: 'wc_donation_get_sub_length_by_sub_period',
			period: period
		},		
		success: function (response) {
			
			if ( response.range != '' ) {
				jQuery('#_subscription_length').html('');
				jQuery.each(response.range, function(index, val) {
					jQuery('#_subscription_length').append('<option value="'+ index +'">'+ val +'</option>');
				} );
			}
		}
	});

});
