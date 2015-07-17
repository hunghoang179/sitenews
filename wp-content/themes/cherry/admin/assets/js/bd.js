jQuery(document).ready(function() {
	
//background type
var r_background_type  = jQuery("input[name='bd_setting[background_type]']:checked").val();
if(r_background_type  == 'custom') {	jQuery('#get_background_type_custom').hide();	}
if(r_background_type  == 'pattern') {	jQuery('#get_background_type_pattern').hide();	}
jQuery("input[name='bd_setting[background_type]']").change(function(){
	var r_background_type  = jQuery("input[name='bd_setting[background_type]']:checked").val();
	if (r_background_type  == 'pattern') {

		jQuery('#get_background_type_custom').fadeIn();
		jQuery('#get_background_type_pattern').hide();
	}else{
		jQuery('#get_background_type_pattern').fadeIn();
		jQuery('#get_background_type_custom').hide();
	}
});
 
//postbox
jQuery(".postbox input:checked").parent().addClass("selected");
	jQuery(".postbox .checkbox-select").click(
		function(event) {
			event.preventDefault(event);
			jQuery(".postbox li").removeClass("selected");
			jQuery(this).parent().addClass("selected");
			jQuery(this).parent().find(":radio").attr("checked","checked");
		}
	);
});


/* HOME */
jQuery(document).ready(function()
{

	/*
 	jQuery('#advanced_export').click(function() {
         this.setSelectionRange(0, 9999);
    });
	*/

	jQuery(".select_plugin li input").css('display','none');

	jQuery(".select_plugin li").click(function()
	{
		jQuery(this).parent('ol').find('li').removeClass('selectd');
		jQuery(this).addClass('selectd');

		jQuery(this).find('input').attr('checked','checked');

	});

	jQuery(".select_plugin li a").click(function(event)
	{
		event.preventDefault(event);
	});




	jQuery("#add_news").click(function(event)
	{
		 event.preventDefault(event);
		 var template = jQuery('#bd_news_box'),data = {data: total_boxes /*, cats: bd_cats*/ };
		 var compile = template.tmpl(data).html();
		 jQuery('.bdayh_list_boxes').append(compile);

		 jQuery('#home_box_'+total_boxes+' .bd_item_content').css('display','block');
		 jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
		 total_boxes++;
	});

	jQuery("#add_scrolling_box").click(function(event)
	{
		 event.preventDefault(event);
		 var template = jQuery('#bd_scrolling_box'),data = {data: total_boxes};
		 var compile = template.tmpl(data).html();
		 jQuery('.bdayh_list_boxes').append(compile);
		 
		 jQuery('#home_box_'+total_boxes+' .bd_item_content').css('display','block');
		 jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
		 total_boxes++;
	});

	jQuery("#add_recent_box").click(function(event)
	{
		 event.preventDefault(event);
		 var template = jQuery('#bd_recent_box'),data = {data: total_boxes};
		 var compile = template.tmpl(data).html();
		 jQuery('.bdayh_list_boxes').append(compile);
		 
		 jQuery('#home_box_'+total_boxes+' .bd_item_content').css('display','block');
		 jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');

		 total_boxes++;
	});



	jQuery("#add_ads_box").click(function(event) {
		 event.preventDefault(event);
		 var template = jQuery('#bd_ads_box'),data = {data: total_boxes};
		 var compile = template.tmpl(data).html();

		 jQuery('.bdayh_list_boxes').append(compile);
		 jQuery('#home_box_'+total_boxes+' .bd_item_content').css('display','block');
		 total_boxes++;
	});


	jQuery(".del").live("click", function(){
	  var box_id = jQuery(this).attr('id').replace('remove_','');
	  jQuery('#home_box_'+box_id).fadeOut('slow').remove();
	});

	jQuery(".boxes_title").live("click", function()
	{
	   jQuery(this).parent().find('.bd_item_content').fadeToggle('fast');
	});

	jQuery( "#bdayh_list_boxes" ).sortable
	({
        placeholder: "ui-state-highlight"
    });


	jQuery(".ad_type").live("change", function()
	{
		 if(jQuery(this).val() == 'code')
		 {
			 jQuery(this).parents('.bd_item_content').find('.ads_img').hide();
			 jQuery(this).parents('.bd_item_content').find('.ads_code').show();
		 }
		 else
		 {
			 jQuery(this).parents('.bd_item_content').find('.ads_code').hide();
			 jQuery(this).parents('.bd_item_content').find('.ads_img').show();
		 }
	});


	jQuery(".home_type").change(function ()
	{
		if(jQuery(this).val() == "blog")
		{
			jQuery("#box_type_content").hide();
		}
		else
		{
			jQuery("#box_type_content").show();
		}
	});

	jQuery(".bd_box_layout li").live("click", function()
	{
		 jQuery(this).parent('ol').find('li').removeClass('selectd');
		 jQuery(this).addClass('selectd');

		 //jQuery(".bd_box_layout li input").removeAttr('checked');
		 jQuery(this).parent('ol').find('input').removeAttr('checked');
		 jQuery(this).find('input').attr('checked','checked');
		 return false;
	});

	jQuery(".bd_box_layout li a").live("click", function(event)
	{
		event.preventDefault(event);
	});




	/*jQuery('.fade').fadeIn(600).delay(250).fadeOut(600,'easeInOutBack').queue(function() {
		jQuery(this).remove();
	});*/

});