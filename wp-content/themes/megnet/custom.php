<?php
header("Content-type: text/css; charset: UTF-8");
require_once( '../../../wp-load.php' );

	   $google_fontface = of_get_option('header_google_font');

        if ($google_fontface['face'] != 'none') {
            $google_font = explode(", ", $google_fontface['face']);
            if (strpos($google_font[0], " ") > 0) {
                $face = explode(" ", $google_font[0]);
                $google_font = $face[0] . '+' . $face[1] . '|';
            } else {
                $google_font = $google_font[0] . '|';
            }
        } else {
            $google_font = 'Oswald|';
     }
	 
	 echo '@import url(http://fonts.googleapis.com/css?family='.$google_font.'Open+Sans|Roboto|Roboto);';

$themecolor = of_get_option('theme_color');
if (!empty($themecolor)) { ?>
.nivo-caption a.read_more,
.nivo-controlNav a.active,
.tabs-nav, .meter-content,
.wpcf7-submit,
.newsletter_form .buttons,
.post_type, .post_type .icon,
.widget_tag_cloud .tagcloud a:hover, .tagcloud a:hover,
.pagination .page:hover,
#toTopHover{background-color: <?php echo $themecolor . ';'; ?>}
.widget-title, .feature-item .overlay_icon{color:<?php echo $themecolor . ';'; ?>}
.feature-postslider-item .post-info, .cat-feature-large, .cat-slider, .feature_post_style .post_date, .pagination .page.currentpage{ background: <?php echo $themecolor . ';'; ?>}  
.cat-feature-large-img{ border-bottom: 2px solid <?php echo $themecolor; ?>;}
.feature-item .overlay_icon{ border: 2px solid <?php echo $themecolor; ?>;}
#content h3.title{ border-bottom: 3px solid <?php echo $themecolor; ?>;}   
.feature_post_style .post_date .feature-icon-right{ color: <?php echo $themecolor; ?>;}
.main_post .image_post .caption, .theme-default .nivo-caption, ul.post_grid_list li.list_item .caption{ border-top: 2px solid <?php echo $themecolor; ?>;}         
 .minim-flickr-widget a:hover { border: 3px solid <?php echo $themecolor; ?>;}
 .main-post-large-style .post_type, .main-post-large .post_type, .post-tab-home .post_type, .image_review_wrapper .post_type, post-news .image_review_wrapper .post_type, .feature-link .post_type{ background: <?php echo $themecolor; ?> url(images/title.png) bottom repeat-x;}
.feature-link .post_type{ background: <?php echo $themecolor; ?> url(images/title.png) bottom repeat-x;}
.slider_post_type{ background: <?php echo $themecolor; ?> url(images/title.png) bottom repeat-x;}
.mejs-controls .mejs-time-rail .mejs-time-current {
	width: 0;
	background: <?php echo $themecolor; ?>;
	background-image: -webkit-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -moz-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -o-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -ms-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	-moz-background-size: 6px 6px;
	background-size: 6px 6px;
	-webkit-background-size: 6px 5px;
	z-index: 1;
}
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
	position: absolute;
	left: 0;
	top: 11px;
	width: 50px;
	height: 5px;
	margin: 1px;
	padding: 0;
	font-size: 1px;
	background: <?php echo $themecolor; ?>;
	background-image: -webkit-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -moz-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -o-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: -ms-linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	background-image: linear-gradient(-45deg, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 25%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 50%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?> 75%, <?php echo $themecolor; ?>);
	-moz-background-size: 6px 6px;
	background-size: 6px 6px;
	-webkit-background-size: 6px 5px;

} 				
<?php } ?>    
        
<?php
if ($google_fontface['face'] != 'none') {
?>
.sf-top-menu li a, .sf-menu > li a, .widget-title, .tabs-nav li a, #wp-calendar caption, #tickersocial, span.count, .newsletter .buttons, .widget_search #searchsubmit, .review-post .ulpost_title a.title, .caption h4 a, .main-post-large .post-title h3 a.title, .main-post-large-style .post-title h3 a.title, .feature-text .post-title h4 a.title, .ulpost_title a.title, .title-feature h4 a.title, .main-post-col1 .post-title h3 a.title, .main-post-col2 .post-title h3 a.title, .post_title a.title, .latest-news h3, .post h2, .auth h5, .relativepost h5, .moreincategories h5, .relativepost ul li .ulpost_title a.title, .moreincategories ul li .ulpost_title a.title, .comments-area h3#reply-title, .comments-area h4, .review_header h3, .postnav a, .post-news h3 a, .categories-title, .page_error h1.big, .archive-month, .archive-year, h3.page-title, h2.post-title, .post_grid_list_style1 .caption, h1, h2, h3, h4, h5, h6, .caption span{ font-family: <?php echo $google_fontface['face'] ?>, Helvetica, sans-serif; font-weight:<?php $header_google_font = of_get_option('header_google_font'); echo $header_google_font['style'];?>;}    
<?php }?>            
<?php
$h1 = of_get_option('h1_typ');
$h2 = of_get_option('h2_typ');
$h3 = of_get_option('h3_typ');
$h4 = of_get_option('h4_typ');
$h5 = of_get_option('h5_typ');
$h6 = of_get_option('h6_typ');
$p = of_get_option('p_typ');
echo '.post h1 { font-size:' . $h1['size'] . '; color: ' . $h1['color'] . '; font-weight:' . $h1['style'] . ';}';
echo '.post h2 { font-size:' . $h2['size'] . '; color: ' . $h2['color'] . '; font-weight:' . $h2['style'] . ';}';
echo '.post h3 { font-size:' . $h3['size'] . '; color: ' . $h3['color'] . '; font-weight:' . $h3['style'] . ';}';
echo '.post h4 { font-size:' . $h4['size'] . '; color: ' . $h4['color'] . '; font-weight:' . $h4['style'] . ';}';
echo '.post h5 { font-size:' . $h5['size'] . '; color: ' . $h5['color'] . '; font-weight:' . $h5['style'] . ';}';
echo '.post h6 { font-size:' . $h6['size'] . '; color: ' . $h6['color'] . '; font-weight:' . $h6['style'] . ';}';
echo 'body { font-size:' . $p['size'] . '; font-family:' . $p['face'] . ' !important; color: ' . $p['color'] . '; font-weight:' . $p['style'] . ';}';
?>

<?php 
if(of_get_option('full_box_option') == 'box_image_option'){
if(of_get_option('background_option') == 'background_parttern') {?>
body{ background:url(<?php echo get_template_directory_uri(); ?>/images/pattern/<?php echo of_get_option('background_parttern');?>.png) <?php echo " ".of_get_option('main_background_repeat_option'); echo " ".of_get_option('main_background_position_option'); echo " ".of_get_option('main_background_horizontal_option'); echo " ".of_get_option('main_background_vertical_option');?>;}
<?php }elseif(of_get_option('background_option') == 'background_color_image'){?>
body{ background:<?php echo of_get_option('background_color_png');?><?php if(of_get_option('background_color_img_png') !=""){echo " url(".of_get_option('background_color_img_png').")";}?>  <?php echo " ".of_get_option('main_background_repeat_option'); echo " ".of_get_option('main_background_position_option'); echo " ".of_get_option('main_background_horizontal_option'); echo " ".of_get_option('main_background_vertical_option');?>;}
<?php }}?>

<?php if(of_get_option('logo_align_option')){?>.logo-position{text-align:<?php echo of_get_option('logo_align_option');?>;}<?php }?>
<?php if(of_get_option('link_color')){?>a, a:visited, a.title{color:<?php echo of_get_option('link_color');?>;}<?php }?>
<?php if(of_get_option('link_hover_color')){?>a:hover, a.title:hover{color:<?php echo of_get_option('link_hover_color');?>;}<?php }?>

<?php if(of_get_option('slider_caption_option')){?>.slider-wrapper .nivo-caption{background:<?php echo of_get_option('slider_caption_option');?>;}<?php }?>
<?php if(of_get_option('slider_more_nav_option')){?>.slider-wrapper .nivo-caption a.read_more, .slider-wrapper .nivo-controlNav a.active, .slider-wrapper .tabs-nav{background:<?php echo of_get_option('slider_more_nav_option');?>;}<?php }?>
<?php if(of_get_option('slider_heading_option')){?>
.slider-wrapper .nivo-caption-inner h5 .caption_arrow{color:<?php echo of_get_option('slider_heading_option');?>;}
.slider-wrapper .nivo-caption-inner h5{background:<?php echo of_get_option('slider_heading_option');?>;}<?php }?>
<?php if(of_get_option('slider_meta_option')){?>.slider-wrapper .nivo-caption p.post-meta, .slider-wrapper .nivo-caption p.post-meta a, .slider-wrapper .nivo-caption p.post-meta span{color:<?php echo of_get_option('slider_meta_option');?> !important;}<?php }?>
<?php if(of_get_option('slider_desc_option')){?>.slider-wrapper .nivo-caption p{color:<?php echo of_get_option('slider_desc_option');?>;}<?php }?>

<?php if(of_get_option('main-menu-background')){?>.header-wraper .main_menu{background:<?php echo of_get_option('main-menu-background');?>;}<?php }?>
<?php if(of_get_option('main-menu-home-border-background')){?>
.header-wraper .main_menu{border-top: 5px solid <?php echo of_get_option('main-menu-home-border-background');?>;}
.sf-menu #home a, .sf-top-menu li:hover, .sf-top-menu li.top-menuHover, .sf-menu>li:hover, .sf-menu li:hover, .sf-menu li.sfHover{background-color:<?php echo of_get_option('main-menu-home-border-background');?>;}
<?php }?>
<?php if(of_get_option('newsticker-background')){?>.latest-news{background:<?php echo of_get_option('newsticker-background');?>;}<?php }?>

<?php if(of_get_option('footer_background_color')){?>#footer-container{background:<?php echo of_get_option('footer_background_color');?>;}<?php }?>
<?php if(of_get_option('footer_copyright_background_color')){?>#footer-container .footer-bottom{background:<?php echo of_get_option('footer_copyright_background_color');?>;}<?php }?>
<?php if(of_get_option('footer_link_color')){?>#footer-container a{color:<?php echo of_get_option('footer_link_color');?>;}<?php }?>
<?php if(of_get_option('footer_link_hover_color')){?>#footer-container a:hover{color:<?php echo of_get_option('footer_link_hover_color');?>;}<?php }?>
<?php if(of_get_option('footer_text_color')){?>#footer-container, .footer-left{color:<?php echo of_get_option('footer_text_color');?>;}<?php }?>
<?php if(of_get_option('disable_breadcrumbs')==1){?>.breadcrumbs li{display: none;}<?php }?>


<?php echo of_get_option('custom_style'); ?>

@media only screen and (min-width:768px) and (max-width:1190px) {
<?php echo of_get_option('custom_style_1190'); ?>
}

@media only screen and (min-width:768px) and (max-width:959px) {
<?php echo of_get_option('custom_style_959'); ?>
}

@media only screen and (max-width:767px) {
<?php echo of_get_option('custom_style_767'); ?>
}

@media only screen and (min-width:480px) and (max-width:767px) {
<?php echo of_get_option('custom_style_480'); ?>
}

