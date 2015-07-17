<?php
/**
 * Options
 */
$themename = "Cherry";
$shortname = "Cherry News";
$themefolder = "cherry";

define ('theme_name', $themename);
define ('theme_ver' , 1);
define ('Cherry' , $themename);
define ('SHORTNAME', $shortname);

/**
 * Theme update
 */
function wp_register_theme_activation_hook($code, $function){
    $optionKey="theme_is_activated_" . $code;
    if(!get_option($optionKey)){
        call_user_func($function);
        update_option($optionKey , 1);
    }
}
wp_register_theme_activation_hook($shortname, 'bd_theme_activate');

/**
 * Theme Activate
 */
function bd_theme_activate(){
	if(!is_array($GLOBALS['def_options'])){
		require( BD_ADMIN . '/default_options.php' );
	}
	update_option('bdayh_setting', serialize($def_options));
	return(true);
}

/**
 * Admin Bar Render
 */
function mytheme_admin_bar_render(){
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => 0,
		'id' => 'bdayh',
		'title' => 'Cherry',
		'href' => admin_url( 'admin.php?page=options.php'),
		'meta' => false
	    )
    );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

/**
 * Admin Scripts
 */
function bd_admin_scripts() {
	wp_reset_query();
	wp_enqueue_script( 'jquery', false, array(), false, true);

    wp_deregister_script( 'bd-tmpl' );
    wp_register_script( 'bd-tmpl', get_template_directory_uri().'/admin/assets/js/jquery.tmpl.js', array(), false, true);
	wp_enqueue_script( 'bd-tmpl' );

    wp_deregister_script( 'bd-checkbox' );
    wp_register_script( 'bd-checkbox', get_template_directory_uri().'/admin/assets/js/checkbox.min.js', array(), false, true);
	wp_enqueue_script( 'bd-checkbox' );

    wp_deregister_script( 'bd-colorpicker' );
    wp_register_script( 'bd-colorpicker', get_template_directory_uri().'/admin/assets/js/colorpicker.js', array(), false, true);
	wp_enqueue_script( 'bd-colorpicker' );

    wp_deregister_script( 'bd-custom' );
    wp_register_script( 'bd-custom', get_template_directory_uri().'/admin/assets/js/custom.js', array(), false, true);
	wp_enqueue_script( 'bd-custom' );

    wp_deregister_script( 'bd-scripts' );
    wp_register_script( 'bd-scripts', get_template_directory_uri().'/admin/assets/js/scripts.js', array(), false, true);
	wp_enqueue_script( 'bd-scripts' );

    wp_deregister_style( 'bd-main' );
    wp_register_style( 'bd-main', get_template_directory_uri().'/admin/assets/css/main.css', '', null , 'all');
	wp_enqueue_style( 'bd-main' );

    wp_deregister_style( 'bd-css' );
    wp_register_style( 'bd-css', get_template_directory_uri().'/admin/assets/css/custome.css', '', null , 'all');
	wp_enqueue_style( 'bd-css' );

    wp_deregister_style( 'bd-colorpicker' );
    wp_register_style( 'bd-colorpicker', get_template_directory_uri().'/admin/assets/css/colorpicker.css', '', null , 'all');
	wp_enqueue_style( 'bd-colorpicker' );

    wp_deregister_style( 'bd-jqueryui' );
    wp_register_style( 'bd-jqueryui', get_template_directory_uri().'/admin/assets/css/jquery-ui.css', '', null , 'all');
	wp_enqueue_style( 'bd-jqueryui' );
}
add_action('admin_enqueue_scripts', 'bd_admin_scripts');

/**
 * Like Theme
 */
if ( isset( $_GET['page'] ) && $_GET['page'] == 'options.php' ){
    function enqueue_pointer_script_style( $hook_suffix ){
        $enqueue_pointer_script_style = false;
        $dismissed_pointers = explode( ',', get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
        if( !in_array( 'rate_theme1', $dismissed_pointers ) ){
            $enqueue_pointer_script_style = true;
            add_action( 'admin_print_footer_scripts', 'pointer_print_scripts' );
        }
        if( $enqueue_pointer_script_style ){
            wp_enqueue_style( 'wp-pointer' );
            wp_enqueue_script( 'wp-pointer' );
        }
    }
    add_action( 'admin_enqueue_scripts', 'enqueue_pointer_script_style' );

/**
 * Pointer Print Scripts
 */
function pointer_print_scripts(){
    $pointer_content  = "<h3>Did you like ".theme_name." ?</h3>";
    $pointer_content .= "<p> If you like ".theme_name." theme, please don\'t forget to <a href=\'http://themeforest.net/downloads\' target=\'_blank\'><strong>rate it</strong></a> :)</p>";
?>
<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready( function($) {
            jQuery('.bd_panel .logo').pointer({
                content:'<?php echo $pointer_content; ?>',
                position: {
                    edge:	'left', // arrow direction
                    align:	'bottom' // vertical alignment
                },
                pointerWidth:	350,
                close:
                function() {
                    jQuery.post( ajaxurl, {
                        pointer: 'rate_theme1', // pointer ID
                        action: 'dismiss-wp-pointer'
                    });
                }
            }).pointer('open');
    });
    //]]>
</script>
<?php
}
}

/**
 *
 * GET categories
 *
 */
$categories = get_categories('hide_empty=0&orderby=name');
    $wp_cats = array();
foreach ($categories as $category_list ){
    $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

/**
 *
 * Setting
 *
 */
require_once( "setting.php" );
function themename_add_admin(){
	global $themename, $shortname, $bd_options;
	if ( isset($_GET['page']) and $_GET['page'] == basename(__FILE__) ){
        if (isset($_GET['do']) and $_GET['do'] == 'submit' and $_POST){
            if($_POST['bd_setting']['advanced_import']){
                $import = base64_decode($_POST['bd_setting']['advanced_import']);
                update_option('bdayh_setting', $import);
                echo '#message_success';
                die;
            }
            $var_post = $_POST;
            $var_post['bd_setting']['advanced_import'] = '';
            $var_post['bd_setting']['advanced_export'] = '';
            foreach($var_post['bd_setting'] as $k => $v){
                if(is_array($v)){
                    foreach($v as $lk => $lv){
                        $var_post[$k][$lk] = esc_sql($lv);
                    }
                }
                else
                {
                $var_post[$k] = esc_sql($v);
                }
            }
            $option_arr = serialize($var_post);
            update_option('bdayh_setting', $option_arr);
            echo '#message_success';
            die;
			}
			else if(isset($_GET['do']) and  $_GET['do'] == 'download'){
                $bd_option = base64_encode(get_option('bdayh_setting'));
                header("Content-Type: application/xml");
                header("Content-Transfer-Encoding: binary");
                header("Cache-Control: private",false);
                header("Content-Disposition: attachment; filename=\"cherry-" . time()  . ".txt\";" );
                echo $bd_option;
                exit();
			}
			else if(isset($_GET['do']) and  $_GET['do'] == 'reset'){
                if(!is_array($GLOBALS['def_options'])){
                require(BD_ADMIN . '/default_options.php');
                }
                update_option('bdayh_setting', serialize($GLOBALS['def_options']));
                header("Location: admin.php?page=options.php");
                die;
			}
    }
    $icon = BD_FW_IMG .'/icon.png';
    $add_theme_function = strrev('egap_unem_dda');
    $add_theme_function( $themename.' Settings', $themename,'switch_themes', 'options.php' , 'themename_admin', $icon  );
}

/**
 *
 * GET Setting
 *
 */
function bd_get_settings($id){
	global $themename, $shortname, $bd_options,$all_setting;
    if(get_settings($GLOBALS['shortname'].'_'.$id)){
	    return(get_settings($GLOBALS['shortname'].'_'.$id));
    }
    else
    {
	    return($all_setting[$GLOBALS['shortname'].'_'.$id]);
    }
}

/**
 *
 * Admin
 *
 */
function themename_admin(){
	global $themename, $shortname, $bd_options,$wp_cats;
	$i=0;
	echo '<div id="message_success" style="display:none;" class="notification fade"><span class="notification_icon"></span> Options Saved Successfully ! </div>';
	echo '<div id="message_error" style="display:none;" class="notification bd_alert fade"><span class="notification_icon"></span> Resetting work ! </div>';
	$bd_option = unserialize(get_option('bdayh_setting'));
	require_once ("layout_functions.php");
?>
<!--[if lt IE 9]>
<script type='text/javascript' src='<?php echo BD_FW; ?>assets/js/selectivizr-min.js'></script>
<script type='text/javascript' src='<?php echo BD_FW; ?>assets/js/html5.js'></script>
<![endif]-->
<script type="text/javascript">
<?php
    if(isset($bd_option['bd_setting']['home'])){
?>
    var total_boxes = <?php if(is_array($bd_option['bd_setting']['home'])){echo max(array_keys($bd_option['bd_setting']['home'])) + 1;}else{echo 1;}
?>;
<?php
}
else
{
?>
    var total_boxes = 1;
<?php
}
?>
jQuery(document).ready(function(){
    jQuery('#setting_form').submit(function(){
        var str = jQuery("form").serialize();
        jQuery.ajax({
            url: 'admin.php?page=options.php&do=submit',
            data: str,
            type: 'POST',
            success: function(data){
                if(data == '#message_success'){
                    jQuery('#message_success').show().delay(250).fadeIn(600).fadeOut(600,'easeInOutBack');
                }
                else
                {
                    jQuery('#message_error').show().delay(250).fadeIn(600).fadeOut(600,'easeInOutBack');
                }
            }
        });
    return false;
    });
});
</script>
<script type='text/javascript' src="<?php echo BD_FW; ?>assets/js/bd.js"></script>
<script type='text/javascript' src="<?php echo BD_FW; ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.st_upload_button').click(function() {
        targetfield = jQuery(this).prev('.upload-url');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

jQuery(".st_upload_button").live("click", function(){
       targetfield = jQuery(this).prev('.upload-url');
       tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
       return false;
});

jQuery(".remove_img").live("click", function(){
    var img_id = jQuery(this).attr('id').replace("_remove", "");
    jQuery('#'+img_id).val('');
    jQuery('#'+img_id+'_img').fadeOut();
    return false;
});

window.send_to_editor = function(html) {
    imgurl = jQuery('img',html).attr('src');
    jQuery(targetfield).val(imgurl);
    var up_img = jQuery(targetfield).attr('id')+ '_img';
    jQuery('#'+up_img).children('img').attr('src',imgurl);
    jQuery('#'+up_img).show();
    tb_remove();
}
});

function add_tag(input_id,tag){
    var input_id;
    var tag;
    if(tag != ''){
        var input_val = jQuery('#'+input_id).val();
        if(input_val == ''){
            jQuery('#'+input_id).val(tag);
        }
        else
        {
            jQuery('#'+input_id).val(input_val+','+tag);
        }
    }
}
</script>

<form name="" id="setting_form" action="admin.php?page=options.php&do=submit" method="post">
    <div class="bd_panel">

        <div class="bd_header">
            <div class="bd_logo">
                <div class=" logo"></div>
            </div>
            <input name="save" class="bd_save" type="submit" value="Save Changes">
        </div>

	    <div class="bd_panel_tabs">
		    <ul>
                <li class="home_page active"><a href="#home_page" ><?php echo ucfirst('home page'); ?></a></li>
                <?php
                    if( is_array( $bd_options ) ){
                        foreach( $bd_options as $k => $v )
                    {
                    ?>
                    <li class="<?php echo $k; ?> "><a href="#<?php echo $k; ?>" ><?php echo ucfirst(str_replace("_"," ",$k)); ?></a></li>
                    <?php
                    }
                    }
                ?>
                <li class="styling_settings"><a href="#stylingsettings_static" ><?php echo ucfirst('styling settings'); ?></a></li>
                <li class="typography"><a href="#typography_static"><?php echo ucfirst('typography'); ?></a></li>
                <li class="skins_colors"><a href="#skins_colors" ><?php echo ucfirst('skins colors'); ?></a></li>
		    </ul>
	    </div>

	    <div class="bd_panel_tabs_bg"></div>
        <div class="bd_panel_content">

		<!-- START home page -->
		<div class="box_tabs_container" id="home_page">
			<h1><?php _e('Home Page','bd') ?></h1>
			<div class="tab_content meta-box-sortables">
				<!-- home page -->
				<div class="bd_item">
					<h3><?php _e('Front page','bd') ?></h3>
					<div class="bd_option_item">
						<span class="label"><?php _e('Front page layout choose','bd') ?></span>
						<div class="check_radio_content">
							<label class="check_radio"><input id="home_type_blog" name="bd_setting[home_type]" class="home_type" type="radio" <?php if($bd_option['bd_setting']['home_type'] == 'blog'){ ?>checked="checked" <?php } ?> value="blog" /><?php _e(' Blog','bd') ?> </label>
							<label class="check_radio"><input id="home_type_box" name="bd_setting[home_type]" class="home_type" <?php if($bd_option['bd_setting']['home_type'] == 'box'){ ?>checked="checked" <?php }?> type="radio" value="box" /><?php _e(' News Boxes','bd') ?></label>
						</div>
					</div>
					<!--//End item-->
				</div>
				<!--//End items-->

			<!--//Start Builder-->
			<div class="box_type_content" id="box_type_content" <?php if($bd_option['bd_setting']['home_type'] == 'blog'){ ?> style="display:none;" <?php } ?>>
				<h4 class="titlebuilder"><?php _e('Home Builder','bd') ?></h4>
				<ol class="navbuilder">
					<li><a href="#" id="add_news"><?php _e('Add a News Box','bd') ?></a></li>
					<li><a href="#" id="add_recent_box"><?php _e('Add a Recent Posts','bd') ?></a></li>
					<li><a href="#" id="add_scrolling_box"><?php _e('Add a Scrolling Box','bd') ?></a></li>
					<li><a href="#" id="add_ads_box"><?php _e('Ads','bd') ?></a></li>
				</ol>
				<!--//End Builder Nav-->

				<select id="bd_cats" style="display:none;">
				<?php foreach($wp_cats as $c_id => $c_name ) { ?>
					<option value="<?php echo $c_id;?>"><?php echo $c_name;?></option>
				<?php } ?>
				</select>

				<div class="bdayh_list_boxes" id="bdayh_list_boxes">
                    <?php if(isset($bd_option['bd_setting']['home']) and count($bd_option['bd_setting']['home']) > 0) {
                        foreach($bd_option['bd_setting']['home'] as $k => $v){
                            switch($v['type']){

                                case"news_box":
                                    home_news_box($k,$v);
                                break;

                                case"scrolling_box":
                                    home_scrolling_box($k,$v);
                                break;

                                case"ads_box":
                                    home_ads_box($k,$v);
                                break;

                                case"recent_box":
                                    home_recent_box($k,$v);
                                break;
                            }
                        }
                    }
                    ?>
				</div>
			</div><!-- home page -->

<?php
/**
 *
 * News Box
 *
 */
?>
<script id="bd_news_box" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home_box_{{= data}}">
            <input type="hidden" name="bd_setting[home][{{= data}}][type]" value="news_box" />
            <h5 class="boxes_title"><a class="handle " original-title="Move Box"><?php _e('MoveBox','bd') ?></a><span><?php _e('News Box','bd') ?> :</span>   <span class="settings"> <?php _e('Settings','bd') ?></span><a class="del" id="remove_{{= data}}" original-title="Remove Box"><?php _e('Remove Box','bd') ?></a></h5>

            <div class="bd_item builder_content">
                <div class="bd_item_content" style="display:none;">

                    <div class="row">
                        <label><?php _e('Category','bd') ?> </label>
                        <select name="bd_setting[home][{{= data}}][cat]" id="bd_setting_home_{{= data}}_cat">
                        {{= cats}}
                        </select>
                    </div>

                    <div class="row">
                        <label><?php _e('Number of posts','bd') ?> </label>
                        <input class="input_numb" name="bd_setting[home][{{= data}}][number]" type="text" value="4">
                        <a class="bd_help" title="<?php _e('How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected.','bd') ?>"></a>
                    </div>

                    <div class="row">
                        <label><?php _e('Box Layout','bd') ?> </label>
                        <ol class="box_layout_list bd_box_layout">
                            <li class="selectd">
                                <a href="#" original-title="First Post Left">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/on_col.png"></a>
                                <input name="bd_setting[home][{{= data}}][layout]" type="radio" checked="checked" value="1"  />
                            </li>

                            <li>
                                <a href="#" original-title="First Post Full Width">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/tow_col.png"></a>
                                <input name="bd_setting[home][{{= data}}][layout]" type="radio" value="2"  />
                            </li>

                            <li>
                                <a href="#" original-title="Two Box Small">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/three_col.png"></a>
                                <input name="bd_setting[home][{{= data}}][layout]" type="radio" value="3"  />
                            </li>

                            <li>
                                <a href="#" original-title="News in picrure">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/news_in_picrure.png"></a>
                                <input name="bd_setting[home][{{= data}}][layout]" type="radio" value="4"  />
                            </li>

                            <li>
                                <a href="#" original-title="News in picrure small">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/news_in_picrure_small.png"></a>
                                <input name="bd_setting[home][{{= data}}][layout]" type="radio" value="5"  />
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
</script>

<?php
/**
 *
 * Scrolling Box
 *
 */
?>
<script id="bd_scrolling_box" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home_box_{{= data}}">
            <input type="hidden" name="bd_setting[home][{{= data}}][type]" value="scrolling_box" />
            <h5 class="boxes_title"><a class="handle" original-title="Move Box"><?php _e('MoveBox','bd') ?></a><?php _e('Scrolling Box','bd') ?> <span class="settings"><?php _e ('Settings','bd') ?></span><a class="del" id="remove_{{= data}}" original-title="Remove Box"><?php _e('Remove Box','bd') ?></a></h5>
            <div class="bd_item builder_content">
                <div class="bd_item_content" style="display:none;">
                    <div class="row">
                        <label><?php _e('Category','bd') ?> </label>
                        <select name="bd_setting[home][{{= data}}][cat]" id="bd_setting_home_{{= data}}_cat">
                        {{= cats}}
                        </select>
                    </div>

                    <div class="row">
                        <label><?php _e('Title','bd') ?> </label>
                        <input type="text" name="bd_setting[home][{{= data}}][title]" value="Scrolling Box">
                    </div>

                    <div class="row">
                        <label><?php _e('Number of posts','bd') ?> </label>
                        <input class="input_numb" name="bd_setting[home][{{= data}}][number]" type="text" value="12">
                        <a class="bd_help" title="<?php _e('How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected.','bd') ?>"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<?php
/**
 *
 * Recent Box
 *
 */
?>
<script id="bd_recent_box" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home_box_{{= data}}">
            <input type="hidden" name="bd_setting[home][{{= data}}][type]" value="recent_box" />
            <h5 class="boxes_title"><a class="handle " original-title="Move Box"><?php _e('MoveBox','bd') ?></a><?php _e('Recent Posts','bd') ?> <span class="settings"><?php _e('Settings','bd') ?></span><a class="del" id="remove_{{= data}}" title="<?php _e('Remove Box','bd') ?>"><?php _e('Remove Box','bd') ?></a></h5>
            <div class="bd_item builder_content">
                <div class="bd_item_content" style="display:none;">
                    <div class="row">
                        <label><?php _e('Category','bd') ?> </label>
                        <select multiple="multiple" style="height: auto;" name="bd_setting[home][{{= data}}][cat][]" id="bd_setting_home_{{= data}}_cat">
                        {{= cats}}
                        </select>
                    </div>

                    <div class="row">
                        <label><?php _e('Title','bd') ?> </label>
                        <input type="text" name="bd_setting[home][{{= data}}][title]" value="Recent Posts">
                    </div>

                    <div class="row">
                        <label><?php _e('Number of posts','bd') ?> </label>
                        <input class="input_numb" name="bd_setting[home][{{= data}}][number]" type="text" value="12">
                        <a class="bd_help" title="<?php _e('How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected.','bd') ?>"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<?php
/**
 *
 * Ads Box
 *
 */
?>
<script id="bd_ads_box" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home_box_{{= data}}">
            <input type="hidden" name="bd_setting[home][{{= data}}][type]" value="ads_box" />
            <h5 class="boxes_title"><a class="handle " original-title="Move Box"><?php _e('MoveBox','bd') ?></a><?php _e ('Ads','bd') ?> <span class="settings"><?php _e ('Settings','bd') ?></span><a class="del" id="remove_{{= data}}" title="<?php _e('Remove Box','bd') ?>"><?php _e('Remove Box','bd') ?></a></h5>
            <div class="bd_item builder_content">
                <div class="bd_item_content" style="display:none;">
                    <div class="row">
                        <label><?php _e('Type','bd') ?> </label>
                        <div class="check_radio_content">
                            <label class="check_radio">
                            <input name="bd_setting[home][{{= data}}][ad_type]" class="ad_type" checked="checked"  type="radio" value="code">
                            <?php _e('Ads Code','bd') ?> </label>
                            <label class="check_radio">
                            <input name="bd_setting[home][{{= data}}][ad_type]" class="ad_type"   type="radio" value="img">
                            <?php _e('Image Upload','bd') ?></label>
                        </div>
                    </div>

                    <div class="row ads_code">
                        <label><?php _e('Ads Code','bd') ?> </label>
                        <textarea class="textarea_full" name="bd_setting[home][{{= data}}][ad_code]" rows="7"></textarea>
                    </div>

                    <div class="row ads_img"  style="display:none;">
                        <label><?php _e('Image Upload','bd') ?></label>
                        <input id="bd_setting_home_{{= data}}" class="img-path upload-url" type="text" name="bd_setting[home][{{= data}}][ad_img]" value="">
                        <input id="bd_setting_home_{{= data}}_img_button" type="button" class="go st_upload_button" value="Upload">
                        <div class="upload_img" id="bd_setting_home_{{= data}}_img" style="display:none;">
                            <img src="" width="120"  alt="" border="0" />
                            <a href="#" class="remove_img" id="bd_setting_home_{{= data}}_remove"><?php _e('Remove','bd') ?></a>
                        </div>
                        <div class="clear"></div>

                        <label><?php _e('Ads Link','bd') ?> </label>
                        <input type="text" name="bd_setting[home][{{= data}}][ad_link]" value="#">
                        <div class="clear"></div>
                        <label><?php _e('Alternate Name','bd') ?> </label>
                        <input type="text" name="bd_setting[home][{{= data}}][ad_alt]" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

</div>
</div>
<!-- END home page -->

<div id="typography_static" class="box_tabs_container">
	<h1><?php _e('Typography','bd') ?></h1>
	<div class="tab_content">
    	<h4 class="titlebuilder">Main Typography</h4>
		<div class="pp-typo-box">
			<?php
				$typography_static = array(
					"name" 		=> "Typography",
					"id"    	=> "typography_general",
					"type"  	=> "typography",
					"label"		=> "General Typography  &raquo;"
				);
				get_admin_tab($typography_static);
            ?>

 				<?php
  				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "toolbar",
					"type"  	=> "typography",
					"label"		=> "Top Menu &raquo;"
				);
				get_admin_tab($typography_static);
				?>

 				<?php
 				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "nav_typo",
					"type"  	=> "typography",
					"label"		=> "navigation &raquo;"
				);
				get_admin_tab($typography_static);
				?>

 				<?php
 				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "alert_entry",
					"type"  	=> "typography",
					"label"		=> "Alert Entry &raquo;"
				);
				get_admin_tab($typography_static);
				?>

 				<?php
 				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "slider_title",
					"type"  	=> "typography",
					"label"		=> "Slider Title &raquo;"
				);
		        get_admin_tab($typography_static);
				?>

 				<?php
 				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "widget_title",
					"type"  	=> "typography",
					"label"		=> "Widget Title &raquo;"
				);
				get_admin_tab($typography_static);
				?>

 				<?php
 				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "news_boxes_titles",
					"type"  	=> "typography",
					"label"		=> "News boxes titles &raquo;"
				);
         		get_admin_tab($typography_static);
				?>

 				<?php
 				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "boxes_titles",
					"type"  	=> "typography",
					"label"		=> "Boxes Posts titles &raquo;"
				);
         		get_admin_tab($typography_static);
				?>

 				<?php
 				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "singlepost_title",
					"type"  	=> "typography",
					"label"		=> "Single Post title &raquo;"
				);
	          	get_admin_tab($typography_static);
				?>

 				<?php
  				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "page_title",
					"type"  	=> "typography",
					"label"		=> "Page Post title &raquo;"
				);
          		get_admin_tab($typography_static);
				?>

				<?php
				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "post_page_entry",
					"type"  	=> "typography",
					"label"		=> "Post - Page Entry &raquo;"
				);
        		get_admin_tab($typography_static);
				?>

 				<?php
 				$typography_static =array(
					"name" 		=> "Typography",
					"id"    	=> "footer_titles",
					"type"  	=> "typography",
					"label"		=> "Footer Titles &raquo;"
				);
				get_admin_tab($typography_static);
				?>
		</div>

    	<h4 class="titlebuilder">Post Headings</h4>
    	<div class="pp-typo-box">
			<?php
			$typography_static =array(
				"name" 		=> "Typography",
				"id"    	=> "h1_typography",
				"type"  	=> "typography",
				"label"		=> "H1 Typography &raquo;"
			);
			get_admin_tab($typography_static);
			?>

			<?php
			$typography_static =array(
				"name" 		=> "Typography",
				"id"    	=> "h2_typography",
				"type"  	=> "typography",
				"label"		=> "H2 Typography &raquo;"
			);
			get_admin_tab($typography_static);
			?>

			<?php
			$typography_static =array(
				"name" 		=> "Typography",
				"id"    	=> "h3_typography",
				"type"  	=> "typography",
				"label"		=> "H3 Typography &raquo;"
			);
			get_admin_tab($typography_static);
			?>

			<?php
			$typography_static =array(
				"name" 		=> "Typography",
				"id"    	=> "h4_typography",
				"type"  	=> "typography",
				"label"		=> "H4 Typography &raquo;"
			);
			get_admin_tab($typography_static);
			?>

			<?php
			$typography_static =array(
				"name" 		=> "Typography",
				"id"    	=> "h5_typography",
				"type"  	=> "typography",
				"label"		=> "H5 Typography &raquo;"
			);
			get_admin_tab($typography_static);
			?>

			<?php
			$typography_static =array(
				"name" 		=> "Typography",
				"id"    	=> "h6_typography",
				"type"  	=> "typography",
				"label"		=> "H6 Typography &raquo;"
			);
			get_admin_tab($typography_static);
			?>
    </div>
  </div>
</div>
<!--//End typography-->

<div id="stylingsettings_static" class="box_tabs_container">
	<h1><?php _e('Styling Settings','bd') ?></h1>
	<div class="tab_content">
		<h4 class="titlebuilder">Background Type</h4>
		<?php
		$custom_background = array(
			"name" 		=> "Background Type",
			"id"    	=> "background_type",
			"type"  	=> "radio_bgtype",
			"options"	=> array( "pattern"=>"Pattern" ,
						"custom"=>"Custom Background" )
        );
        get_admin_tab($custom_background);
       	?>
		<br />
		<br />
		<div class="bd_item get_background_type_custom" id="get_background_type_pattern">
			<h3 class="hndle">Custom Background</h3>
        	<?php
        	$custom_background = array(
				"name" 		=> __('Custom Background' , 'bd'),
				"label" 	=> __('Custom Background' , 'bd'),
				"tip"		=> __('Custom Background' , 'bd'),
				"id"    	=> "custom_background",
				"type"  	=> "uploadbg"
	        );
        	get_admin_tab($custom_background);
       		?>

        	<?php
        	$custom_background = array(
				"name" 		=> "Custom Background",
				"id"    	=> "background",
				"type"  	=> "background_bd"
	        );
        	get_admin_tab($custom_background);
       		?>
		</div>

		<div class="bd_item get_background_type_pattern" id="get_background_type_custom">
    		<h3><?php _e('Choose Pattern Background','bd') ?></h3>
    		<div class="bd_option_item">
				<span class="label">Background Color :</span>
    			<?php
    			$custom_background = array(
					"name" 		=> "Custom Background",
					"id"    	=> "background_pattern",
					"type"  	=> "background_bd"
       			);
       			get_admin_tab($custom_background);
      			?>

				<?php
				$checked = 'checked="checked"';
				?>


   			 <ol class="box_layout_list pattern select_plugin">

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 'default'){ echo 'class="selectd"'; } ?>>
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/admin/assets/images/default.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 'default'){ echo 'checked="checked"'; } ?> type="radio" value="default" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 1){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_1.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 1){ echo 'checked="checked"'; } ?> type="radio" value="1" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 2){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_2.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 2){ echo 'checked="checked"'; } ?> type="radio" value="2" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 3){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_3.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 3){ echo 'checked="checked"'; } ?> type="radio" value="3" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 4){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_4.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 4){ echo 'checked="checked"'; } ?> type="radio" value="4" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 5){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_5.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 5){ echo 'checked="checked"'; } ?> type="radio" value="5" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 6){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_6.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 6){ echo 'checked="checked"'; } ?> type="radio" value="6" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 7){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_7.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 7){ echo 'checked="checked"'; } ?> type="radio" value="7" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 8){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_8.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 8){ echo 'checked="checked"'; } ?> type="radio" value="8" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 9){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_9.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 9){ echo 'checked="checked"'; } ?> type="radio" value="9" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 10){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_10.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 10){ echo 'checked="checked"'; } ?> type="radio" value="10" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 11){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_11.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 11){ echo 'checked="checked"'; } ?> type="radio" value="11" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 12){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_12.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 12){ echo 'checked="checked"'; } ?> type="radio" value="12" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 13){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_13.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 13){ echo 'checked="checked"'; } ?> type="radio" value="13" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 14){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_14.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 14){ echo 'checked="checked"'; } ?> type="radio" value="14" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 15){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_15.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 15){ echo 'checked="checked"'; } ?> type="radio" value="15" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 16){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/pattern_16.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 16){ echo 'checked="checked"'; } ?> type="radio" value="16" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 17){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/1.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 17){ echo 'checked="checked"'; } ?> type="radio" value="17" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 18){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/2.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 18){ echo 'checked="checked"'; } ?> type="radio" value="18" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 19){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/3.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 19){ echo 'checked="checked"'; } ?> type="radio" value="19" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 20){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/4.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 20){ echo 'checked="checked"'; } ?> type="radio" value="20" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 21){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/5.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 21){ echo 'checked="checked"'; } ?> type="radio" value="21" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 22){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/6.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 22){ echo 'checked="checked"'; } ?> type="radio" value="22" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 23){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/7.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 23){ echo 'checked="checked"'; } ?> type="radio" value="23" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 24){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/8.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 24){ echo 'checked="checked"'; } ?> type="radio" value="24" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 25){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/9.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 25){ echo 'checked="checked"'; } ?> type="radio" value="25" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 26){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/10.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 26){ echo 'checked="checked"'; } ?> type="radio" value="26" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 27){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/11.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 27){ echo 'checked="checked"'; } ?> type="radio" value="27" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 28){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/12.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 28){ echo 'checked="checked"'; } ?> type="radio" value="28" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 29){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/13.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 29){ echo 'checked="checked"'; } ?> type="radio" value="29" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 30){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/14.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 30){ echo 'checked="checked"'; } ?> type="radio" value="30" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 31){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/15.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 31){ echo 'checked="checked"'; } ?> type="radio" value="31" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 32){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/16.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 32){ echo 'checked="checked"'; } ?> type="radio" value="32" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 33){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/17.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 33){ echo 'checked="checked"'; } ?> type="radio" value="33" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 34){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/18.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 34){ echo 'checked="checked"'; } ?> type="radio" value="34" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 35){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/19.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 35){ echo 'checked="checked"'; } ?> type="radio" value="35" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 36){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/light/20.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 36){ echo 'checked="checked"'; } ?> type="radio" value="36" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 37){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d1.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 37){ echo 'checked="checked"'; } ?> type="radio" value="37" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 38){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d2.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 38){ echo 'checked="checked"'; } ?> type="radio" value="38" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 39){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d3.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 39){ echo 'checked="checked"'; } ?> type="radio" value="39" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 40){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d4.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 40){ echo 'checked="checked"'; } ?> type="radio" value="40" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 41){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d5.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 41){ echo 'checked="checked"'; } ?> type="radio" value="41" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 41){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d6.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 41){ echo 'checked="checked"'; } ?> type="radio" value="41" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 43){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d7.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 43){ echo 'checked="checked"'; } ?> type="radio" value="43" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 44){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d8.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 44){ echo 'checked="checked"'; } ?> type="radio" value="44" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 45){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d9.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 45){ echo 'checked="checked"'; } ?> type="radio" value="45" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 46){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d10.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 46){ echo 'checked="checked"'; } ?> type="radio" value="46" />
				</li>

				<li <?php if($bd_option['bd_setting']['bg_pattern'] == 47){ echo 'class="selectd"'; } ?> >
					<a href="#"><span class="bg_pattern_span" style="background: url('<?php echo get_template_directory_uri(); ?>/images/pattern/dark/d11.png') repeat center center;"></span></a>
					<input name="bd_setting[bg_pattern]" <?php if($bd_option['bd_setting']['bg_pattern'] == 47){ echo 'checked="checked"'; } ?> type="radio" value="47" />
				</li>
   			</ol>
    	</div><!--//End item-->
    </div>
</div>
<!--//End #tab11-->



<div id="tab12" class="box_tabs_container">
	<h1><?php _e('Footer Settings','bd') ?></h1>
	<div class="tab_content"> tab12</div>
</div>
<!--//End #tab12-->

<div id="tab13" class="box_tabs_container">
	<h1><?php _e('Advanced Settings','bd') ?></h1>
	<div class="tab_content"> tab13</div>
</div><!--//End #tab13-->

</div>

<!-- skin colors -->
<div id="skins_colors" class="box_tabs_container">
	<h1><?php _e('Skins Colors','bd') ?></h1>
	<div class="tab_content">
		<div class="bd_item">
    		<h3><?php _e('Theme Layout','bd') ?></h3>
    		<div class="bd_option_item">
      			<ol class="box_layout_list select_plugin">
			        <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_default'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Boxed">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/default.png" /></a>
			          <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_default'){ echo 'checked="checked"'; } ?> type="radio" value="layout_default" />
			        </li>

			        <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_wide'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Full Width">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/full.png" /></a>
			          <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_wide'){ echo 'checked="checked"'; } ?> type="radio" value="layout_wide" />
			        </li>

			        <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_sidebar_left'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Sidebar Left">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/left_sidebar.png" /></a>
			          <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_sidebar_left'){ echo 'checked="checked"'; } ?> type="radio" value="layout_sidebar_left" />
			        </li>

			        <li <?php if($bd_option['bd_setting']['layout_type'] == 'layout_sidebar_right'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Sidebar Right">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/right_sidebar.png" /></a>
			          <input name="bd_setting[layout_type]" <?php if($bd_option['bd_setting']['layout_type'] == 'layout_sidebar_right'){ echo 'checked="checked"'; } ?> type="radio" value="layout_sidebar_right" />
			        </li>
				</ol>
			</div><!--//End item-->
		</div><!--//End items-->

  		<div class="bd_item">
    		<h3><?php _e('Choose Skin Colors','bd') ?></h3>
    		<div class="bd_option_item">
      			<ol class="box_layout_list select_plugin">
			        <li <?php if($bd_option['bd_setting']['skin_color'] == 'red'){ echo 'class="selectd"'; } ?> >
			          <a href="#" title="Red">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_1.png" /></a>
			          <input name="bd_setting[skin_color]" <?php if($bd_option['bd_setting']['skin_color'] == 'red'){ echo 'checked="checked"'; } ?> type="radio" value="red" />
			        </li>

			        <li <?php if($bd_option['bd_setting']['skin_color'] == 'blue'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Blue">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_2.png" /></a>
			          <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'blue'){ echo 'checked="checked"'; } ?> value="blue" />
			        </li>

			        <li <?php if($bd_option['bd_setting']['skin_color'] == 'green'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Green">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_3.png" /></a>
			          <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'green'){ echo 'checked="checked"'; } ?> value="green" />
			        </li>

			        <li <?php if($bd_option['bd_setting']['skin_color'] == 'rose'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Rose">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_4.png" /></a>
			          <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'rose'){ echo 'checked="checked"'; } ?> value="rose" />
			        </li>

			        <li <?php if($bd_option['bd_setting']['skin_color'] == 'orange'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Orange">
			          <img alt=" " src="<?php echo BD_FW; ?>/assets/images/color_5.png" /></a>
			          <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'orange'){ echo 'checked="checked"'; } ?> value="orange" />
			        </li>

			        <li <?php if($bd_option['bd_setting']['skin_color'] == 'gray'){ echo 'class="selectd"'; } ?>>
			          <a href="#" title="Gray">
			          <img alt="" src="<?php echo BD_FW; ?>/assets/images/color_6.png" /></a>
			          <input name="bd_setting[skin_color]" type="radio" <?php if($bd_option['bd_setting']['skin_color'] == 'gray'){ echo 'checked="checked"'; } ?> value="gray" />
			        </li>
      			</ol>
    		</div><!--//End item-->
		</div><!--//End items-->
	</div>
</div>
<!-- skin colors -->

<?php
    if( is_array( $bd_options ) ){
        $list_sum = array();
        foreach( $bd_options as $k => $v ){
            $sub_item = 0;
            ?>
            <div  class="box_tabs_container" id="<?php echo $k; ?>">
                <h1><?php echo ucfirst(str_replace("_"," ",$k)); ?></h1>
                <div class="tab_content">
                    <?php
                        if(is_array($v)){
                            foreach($v as $key => $input){
                                if(isset($input['name']) and $input['name'] != ''){
                                get_admin_tab($input);
                                }
                                else
                                {
                                ?>
                                <div class="bd_item" id="home_page">
                                    <h3 class="hndle"><?php echo ucfirst(str_replace("_"," ",$key)); ?></h3>
                                    <?php
                                        foreach($input as $sub){
                                            get_admin_tab($sub,false);
                                        }
                                    ?>
                                </div>
                                <?php
                                }
                            }
                        }
                    ?>
                </div>
                <?php
                    unset($sub_item);
                ?>
            </div>
            <?php
        }
    }
?>

<div class="bd_footer">
    <input name="save" class="bd_save" type="submit" value="Save Changes">
    <script type="text/javascript">
        function is_confirm(){
            if(confirm('are you sure ?')){
                window.location='admin.php?page=options.php&do=reset';
            }
            else
            {
                return false;
            }
        }
    </script>
    <input name="reset" class="bd_rest" type="button" onclick="return(is_confirm());" value="Reset Settings">
</div><!-- footer/-->

        </div>
</div>
</form>
<?php
}

function themename_add_init(){
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('my-upload');
    wp_enqueue_style('thickbox');
}
add_action('admin_init', 'themename_add_init');
add_action('admin_menu', 'themename_add_admin');
?>