jQuery(document).ready(function($) {
	jQuery('#cherry_sideoption_description').parent().click(function() {
  		jQuery('.postlayout').fadeToggle(400);
  		jQuery('.postlayout').css('display', 'block');
	});
	
	if (jQuery('#cherry_sideoption_description:checked').val() !== undefined) {
		jQuery('.postlayout').show();
	}
    $('label #cherry_side_layout').css('visibility', 'hidden');
	$('label #cherry_side_layout:checked+img').addClass('ri_select');
    $('label .radio_img').click( function() {
	$(this).parent().parent().find('label .radio_img').removeClass('ri_select');
	$(this).addClass('ri_select');
	});
	
	
	jQuery('#cherry_sideoption_description').parent().click(function() {
  		jQuery('.slidelayout').fadeToggle(400);
  		jQuery('.slidelayout').css('display', 'block');
	});
	
	if (jQuery('#cherry_sideoption_description:checked').val() !== undefined) {
		jQuery('.slidelayout').show();
	}
   
	
});



