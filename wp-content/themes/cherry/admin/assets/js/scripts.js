jQuery(document).ready(function() {	


function hide_all_audio()
{

	
	if(jQuery('#bd_audio_mp3').val() == '')
	{
		jQuery('#bd-metabox-post-audio .inside .rwmb-field').eq(1).hide();		
	}
	
	if(jQuery('#bd_audio_m4a').val() == '')
	{
		jQuery('#bd-metabox-post-audio .inside .rwmb-field').eq(2).hide();	
	}
	
	if(jQuery('#bd_audio_oga').val() == '')
	{
		jQuery('#bd-metabox-post-audio .inside .rwmb-field').eq(3).hide();	
	}

	if(jQuery('#bd_soundcloud').val() == '')
	{
		jQuery('#bd-metabox-post-audio .inside .rwmb-field').eq(4).hide();	
	}
	
}

hide_all_audio();

jQuery('#bd_audio_type').change(function() {
	
  	var selected_v = jQuery(this).val();
    hide_all_audio();
	
	if (selected_v == 'audiomp3') {
		jQuery('#bd-metabox-post-audio .inside .rwmb-field').eq(1).show();
	}
	else if (selected_v == 'audiom4a') {
		jQuery('#bd-metabox-post-audio .inside .rwmb-field').eq(2).show();
	}
	else if (selected_v == 'audiooga') {
		jQuery('#bd-metabox-post-audio .inside .rwmb-field').eq(3).show();
	}
	else if (selected_v == 'soundcloud') {
		jQuery('#bd-metabox-post-audio .inside .rwmb-field').eq(4).show();
	}
	   
});	
	


	
	jQuery(".box_tabs_container").hide();
	jQuery(".bd_panel_tabs ul li:first").addClass("active").show();
	jQuery(".box_tabs_container:first").show(); 
	
	jQuery(".bd_panel_tabs ul li").click(function() {
		jQuery(".bd_panel_tabs ul li").removeClass("active");
		jQuery(this).addClass("active");
		jQuery(".box_tabs_container").hide();
		var activeTab = jQuery(this).find("a").attr("href");
		jQuery(activeTab).fadeIn();
		return false;
	});
	// End tabs

	jQuery('.bd_option_item a , .titlebuilder a, .navbuilder a').tipsy({
		fade: true, 
		gravity: 's'
	});
	//tooltip
	
	jQuery('.bd_panel input:checkbox:not([safari]), .bd_items_panel input:checkbox:not([safari]), .check_radio_content input:radio:not([safari])  , .rwmb-input input:checkbox:not([safari])').checkbox();
	jQuery('.bd_panel input[safari]:checkbox, .bd_items_panel input[safari]:checkbox, .check_radio_content input[safari]:radio  , .rwmb-input input[safari]:checkbox').checkbox({cls:'jquery-safari-checkbox'});
	jQuery('.bd_panel :checkbox, .bd_items_panel :checkbox, .check_radio_content :radio, #review .rwmb-input :radio , #review .rwmb-input :checkbox').checkbox();
	//checkbox

});



// All custom JS not relating to theme options goes here

jQuery(document).ready(function($) {

/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/

    /* Grab our vars ---------------------------------------------------------------*/
	var audioOptions = $('#bd-metabox-post-audio'),
    	audioTrigger = $('#post-format-audio'),
		
    	videoOptions = $('#video_setting'),
    	videoTrigger = $('#post-format-video'),
		
    	galleryOptions = $('#bd-metabox-post-image'),
    	galleryTrigger = $('#post-format-gallery'),
		
    	linkOptions = $('#bd-metabox-post-link'),
    	linkTrigger = $('#post-format-link'),
		
    	quoteOptions = $('#bd-metabox-post-quote'),
    	quoteTrigger = $('#post-format-quote'),
		
    	group = $('#post-formats-select input');

    /* Hide and show sections as needed --------------------------------------------*/
    bdHideAll(null);	

	group.change( function() {
	    $that = $(this);
	    
        bdHideAll(null);

        if( $that.val() == 'audio' ) {
			audioOptions.css('display', 'block');
		} else if( $that.val() == 'video' ) {
			videoOptions.css('display', 'block');
		} else if( $that.val() == 'gallery' ) {
		    galleryOptions.css('display', 'block');
		} else if( $that.val() == 'link' ) {
		    linkOptions.css('display', 'block');
		} else if( $that.val() == 'quote' ) {
		    quoteOptions.css('display', 'block');
		}

	});

	if(audioTrigger.is(':checked'))
		audioOptions.css('display', 'block');

	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');

    if(galleryTrigger.is(':checked'))
        galleryOptions.css('display', 'block');

    if(linkTrigger.is(':checked'))
        linkOptions.css('display', 'block');

    if(quoteTrigger.is(':checked'))
        quoteOptions.css('display', 'block');

    function bdHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		audioOptions.css('display', 'none');
		galleryOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
    }

    /**
     * rating
     */
    jQuery('div.inside > div.bd_c1').wrapAll('<div class="bd_c1_wrapper bd_criteria_wrapper" />');
    jQuery('div.inside > div.bd_c2').wrapAll('<div class="bd_c2_wrapper bd_criteria_wrapper" />');
    jQuery('div.inside > div.bd_c3').wrapAll('<div class="bd_c3_wrapper bd_criteria_wrapper" />');
    jQuery('div.inside > div.bd_c4').wrapAll('<div class="bd_c4_wrapper bd_criteria_wrapper" />');
    jQuery('div.inside > div.bd_c5').wrapAll('<div class="bd_c5_wrapper bd_criteria_wrapper" />');
    jQuery('div.inside > div.bd_c6').wrapAll('<div class="bd_c6_wrapper bd_criteria_wrapper" />');

    var init_rating = jQuery('input#bd_final_score').val();
    init_percentage = init_rating * 20;
    jQuery('p#bd_final_score_description em').text(init_percentage);

    var rating_1a = jQuery('input#bd_c1_rating').val();
    var rating_1b = jQuery('input#bd_c1_description').val();
    var rating_2a = jQuery('input#bd_c2_rating').val();
    var rating_2b = jQuery('input#bd_c2_description').val();
    var rating_3a = jQuery('input#bd_c3_rating').val();
    var rating_3b = jQuery('input#bd_c3_description').val();
    var rating_4a = jQuery('input#bd_c4_rating').val();
    var rating_4b = jQuery('input#bd_c4_description').val();
    var rating_5a = jQuery('input#bd_c5_rating').val();
    var rating_5b = jQuery('input#bd_c5_description').val();
    var rating_6a = jQuery('input#bd_c6_rating').val();
    var rating_6b = jQuery('input#bd_c6_description').val();


    jQuery('.bd_add_another_1').click(function()
    {
        jQuery('.bd_c1').addClass('enabled');
        jQuery('.bd_c1_wrapper').fadeIn(1200);
        jQuery(this).hide(0);
    });
    jQuery('.bd_add_another_2').click(function()
    {
        jQuery('.bd_c2').addClass('enabled');
        jQuery('.bd_c2_wrapper').fadeIn(1200);
        jQuery(this).hide(0);
    });
    jQuery('.bd_add_another_3').click(function()
    {
        jQuery('.bd_c3').addClass('enabled');
        jQuery('.bd_c3_wrapper').fadeIn(1200);
        jQuery(this).hide(0);
    });
    jQuery('.bd_add_another_4').click(function()
    {
        jQuery('.bd_c4').addClass('enabled');
        jQuery('.bd_c4_wrapper').fadeIn(1200);
        jQuery(this).hide(0);
    });
    jQuery('.bd_add_another_5').click(function()
    {
        jQuery('.bd_c5').addClass('enabled');
        jQuery('.bd_c5_wrapper').fadeIn(1200);
        jQuery(this).hide(0);
    });
    jQuery('.bd_add_another_6').click(function()
    {
        jQuery('.bd_c6').addClass('enabled');
        jQuery('.bd_c6_wrapper').fadeIn(1200);
        jQuery(this).hide(0);
    });
    jQuery('input#bd_c1_rating, input#bd_c2_rating, input#bd_c3_rating, input#bd_c4_rating, input#bd_c5_rating, input#bd_c6_rating').change( function()
    {
        var divider	= 0;
        var final_score = 0;
        var rating_1 = jQuery('input#bd_c1_rating').val();
        var rating_2 = jQuery('input#bd_c2_rating').val();
        var rating_3 = jQuery('input#bd_c3_rating').val();
        var rating_4 = jQuery('input#bd_c4_rating').val();
        var rating_5 = jQuery('input#bd_c5_rating').val();
        var rating_6 = jQuery('input#bd_c6_rating').val();
        if (rating_1 !== '') {divider = divider + 1;} else {rating_1 = 0;}
        if (rating_2 !== '') {divider = divider + 1;} else {rating_2 = 0;}
        if (rating_3 !== '') {divider = divider + 1;} else {rating_3 = 0;}
        if (rating_4 !== '') {divider = divider + 1;} else {rating_4 = 0;}
        if (rating_5 !== '') {divider = divider + 1;} else {rating_5 = 0;}
        if (rating_6 !== '') {divider = divider + 1;} else {rating_6 = 0;}
        final_score =  parseFloat(rating_1) + parseFloat(rating_2) + parseFloat(rating_3) + parseFloat(rating_4) + parseFloat(rating_5) + parseFloat(rating_6) ;
        final_score = final_score / divider;
        final_score = Math.round(final_score*10)/10;
        percentage = final_score * 20;
        jQuery('input#bd_final_score').val(final_score);
        jQuery('p#bd_final_score_description em').text(percentage);
    });
    jQuery('input#bd_c1_rating').change( function()
    {
        var rating = jQuery(this).val();
        percent = rating * 20;
        jQuery('em#bd_preview_rating_1').text(' (' +percent + '%)');
    });
    jQuery('input#bd_c2_rating').change( function()
    {
        var rating = jQuery(this).val();
        percent = rating * 20;
        jQuery('em#bd_preview_rating_2').text(' (' +percent + '%)');
    });
    jQuery('input#bd_c3_rating').change( function()
    {
        var rating = jQuery(this).val();
        percent = rating * 20;
        jQuery('em#bd_preview_rating_3').text(' (' +percent + '%)');
    });
    jQuery('input#bd_c4_rating').change( function()
    {
        var rating = jQuery(this).val();
        percent = rating * 20;
        jQuery('em#bd_preview_rating_4').text(' (' +percent + '%)');
    });
    jQuery('input#bd_c5_rating').change( function()
    {
        var rating = jQuery(this).val();
        percent = rating * 20;
        jQuery('em#bd_preview_rating_5').text(' (' +percent + '%)');
    });
    jQuery('input#bd_c6_rating').change( function()
    {
        var rating = jQuery(this).val();
        percent = rating * 20;
        jQuery('em#bd_preview_rating_6').text(' (' +percent + '%)');
    });


});