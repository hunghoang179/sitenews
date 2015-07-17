<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
      <!-- Basic Page Needs
  	  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo('name'); ?>  <?php wp_title('-'); ?></title>
     <?php if (of_get_option('disable_design') == 0){ ?>
        <!-- Mobile Specific Metas
  		================================================== -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php } ?>

        <!-- Favicons
        ================================================== -->
        <?php $favor = of_get_option('favicon_uploader'); ?>        
        <?php if (!empty($favor)): ?>
            <link rel="shortcut icon" href="<?php echo $favor; ?>">
        <?php else: ?>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
        <?php endif; ?>
        
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>    

<?php 
		// add facebook thumbnail to this page
		if (! is_404() ) { 
			
			$thumbnail_id = get_post_thumbnail_id();
			if( !empty($thumbnail_id) ){
				$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
				echo '<meta property="og:image" content="' . $thumbnail[0] . '"/>';		
			}
		
		}
		


wp_head(); ?>   
    	

<!-- end head -->
</head>
<body <?php body_class();?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php if(of_get_option('full_box_option') == 'box_image_option'){ if(of_get_option('background_option') == 'background_image'){?>
<div class="full-background"><img id="logo" src="<?php echo of_get_option('background_large_image');?>" alt="" /></div>
<?php }}?>

<div class="<?php if(of_get_option('full_box_option') == 'box_image_option'){echo "body_wraper_box";}else{echo "body_wraper_full";}?>">      
<!-- Start header -->
<header class="header-wraper">

<div class="header-top-wraper">
<div class="row">
<div class="grid_6 header-top-left-bar">
<span class="blank_space">.</span>
  <?php if (of_get_option('enable_menu_top') == 1){?> 
  <div class="mainmenu"> 
<?php $top_menu = array('theme_location' => 'Top_Menu', 'container' => '', 'menu_class' => 'sf-top-menu', 'menu_id' => 'menu-top', 'fallback_cb' => false); wp_nav_menu($top_menu);?>
<div class="clear"></div>
</div>
     <?php }?>
</div>
<div class="grid_6 header-top-right-bar">
     <?php if (of_get_option('enable_social_top') == 1){?> 
    <ul class="icon-wrapper">
     <?php if(of_get_option('facebook_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('facebook_url'); ?>"><span class="icons-facebook"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('twitter_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('twitter_url'); ?>"><span class="icons-twitter"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('gplus_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('gplus_url'); ?>"><span class="icons-googleplus"></span></a></li>
     <?php  } ?>
     <?php if(of_get_option('pin_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('pin_url'); ?>"><span class="icons-pinterest"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('rss_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('rss_url'); ?>"><span class="icons-rss-feed"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('linked_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('linked_url'); ?>"><span class="icons-linked"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('youtube_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('youtube_url'); ?>"><span class="icons-youtube"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('vimeo_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('vimeo_url'); ?>"><span class="icons-vimeo"></span></a></li>
     <?php } ?>       
     <?php if(of_get_option('flickr_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('flickr_url'); ?>"><span class="icons-flickr"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('instagram_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('instagram_url'); ?>"><span class="icons-instagram"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('dribbble_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('dribbble_url'); ?>"><span class="icons-dribbble"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('picasa_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('picasa_url'); ?>"><span class="icons-picasa"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('stumbleupon_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('stumbleupon_url'); ?>"><span class="icons-stumbleupon"></span></a></li>
     <?php } ?>
     <?php if(of_get_option('delicious_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('delicious_url'); ?>"><span class="icons-delicious"></span></a></li>
     <?php } ?> 
     <?php if(of_get_option('behance_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('behance_url'); ?>"><span class="icons-behance"></span></a></li>
     <?php } ?> 
     <?php if(of_get_option('deviantart_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('deviantart_url'); ?>"><span class="icons-deviantart"></span></a></li>
     <?php } ?> 
     <?php if(of_get_option('google_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('google_url'); ?>"><span class="icons-google"></span></a></li>
     <?php } ?> 
     <?php if(of_get_option('GitHub_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('GitHub_url'); ?>"><span class="icons-GitHub"></span></a></li>
     <?php } ?> 
     <?php if(of_get_option('wordpress_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('wordpress_url'); ?>"><span class="icons-wordpress"></span></a></li>
     <?php } ?>  
      <?php if(of_get_option('aim_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('aim_url'); ?>"><span class="icons-aim"></span></a></li>
     <?php } ?>
          <?php if(of_get_option('blogger_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('blogger_url'); ?>"><span class="icons-blogger"></span></a></li>
     <?php } ?>
          <?php if(of_get_option('digg_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('digg_url'); ?>"><span class="icons-digg"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('evernote_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('evernote_url'); ?>"><span class="icons-evernote"></span></a></li>
     <?php } ?>
          <?php if(of_get_option('friendfeed_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('friendfeed_url'); ?>"><span class="icons-friendfeed"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('friendster_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('friendster_url'); ?>"><span class="icons-friendster"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('furl_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('furl_url'); ?>"><span class="icons-furl"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('grooveshark_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('grooveshark_url'); ?>"><span class="icons-grooveshark"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('lastfm_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('lastfm_url'); ?>"><span class="icons-lastfm"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('livejournal_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('livejournal_url'); ?>"><span class="icons-livejournal"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('magnolia_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('magnolia_url'); ?>"><span class="icons-magnolia"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('mixx_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('mixx_url'); ?>"><span class="icons-mixx"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('myspace_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('myspace_url'); ?>"><span class="icons-myspace"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('GitHub_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('GitHub_url'); ?>"><span class="icons-GitHub"></span></a></li>
     <?php } ?>
          <?php if(of_get_option('netvibes_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('netvibes_url'); ?>"><span class="icons-netvibes"></span></a></li>
     <?php } ?>
                <?php if(of_get_option('google_talk_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('google_talk_url'); ?>"><span class="icons-google_talk"></span></a></li>
     <?php } ?> 
          <?php if(of_get_option('newsvine_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('newsvine_url'); ?>"><span class="icons-newsvine"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('pownce_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('pownce_url'); ?>"><span class="icons-pownce"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('reddit_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('reddit_url'); ?>"><span class="icons-reddit"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('technorati_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('technorati_url'); ?>"><span class="icons-technorati"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('webshots_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('webshots_url'); ?>"><span class="icons-webshots"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('websitelink_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('websitelink_url'); ?>"><span class="icons-websitelink"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('yahoo_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('yahoo_url'); ?>"><span class="icons-yahoo"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('yahoo_im_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('yahoo_im_url'); ?>"><span class="icons-yahoo_im"></span></a></li>
     <?php } ?>  
          <?php if(of_get_option('yelp_url')){ ?>
     <li class="icon-lists"><a href="<?php echo of_get_option('yelp_url'); ?>"><span class="icons-yelp"></span></a></li>
     <?php } ?>        
     </ul>
     <?php }?>
<span class="blank_space">.</span>
<div class="clear"></div>
</div>
</div>
</div>

        
        <div class="row">
	<div class="<?php if (is_active_sidebar('banner-sidebar')) { echo'grid_3 header-top-left'; } else { echo'grid_12 logo-position';}?>">
    
      <!-- begin logo -->
                           <?php if(of_get_option('logo_option') == 'logo_image_option'){?> 
                            <h4>
                                <a href="<?php echo home_url(); ?>" alt="<?php bloginfo('description'); ?>">
                                    <?php $logo = of_get_option('logo_uploader'); ?>
                                    <?php if (!empty($logo)): ?>   
                                        <img src="<?php echo $logo; ?>" alt="<?php bloginfo('description'); ?>"/>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('description'); ?>"/>
                                    <?php endif; ?>
                                </a>
                            </h4>
                            <?php }else{?>
							 <h2 class="logo_text"><a href="<?php echo home_url(); ?>" alt="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
                            <p class="logo_description"><?php bloginfo('description'); ?> </p>    
							<?php }?>
                            <!-- end logo -->
  <span class="blank_space">.</span>
    </div>
    <?php if (is_active_sidebar('banner-sidebar')){ ?>
	<div class="grid_9 header-top-right">  
  <?php dynamic_sidebar('banner-sidebar');?>
    </div>
    <?php }?>
    
</div>
                
<!-- end header, logo, top ads -->

              
<!-- Start Main menu -->
<div id="menu_wrapper" class="menu_wrapper<?php if (of_get_option('disable_sticky') == 0){echo " menu_wrapper_sticky";}?>">
<div class="row">
	<div class="main_menu grid_12"> 

                            <!-- main menu -->
                            <div class="mainmenu">
                            
                                <?php
                                $home_link = '<ul class="sf-menu" id="mainmenu"><li id="home"><a href="' . home_url() . '" alt="' . get_bloginfo('description') . '"><span id="homeicon">' . __('Home', 'tl_back') . '</span><i class="icon-home"></i></a></li>%3$s</ul>';

                                $arg = array(
                                    'theme_location' => 'Main_Menu',
                                    'container' => false,
                                    'items_wrap' => $home_link,
									'link_before' => '<span>',
									'link_after'=>'</span>'
                                );
                                ?>


                                <?php if (has_nav_menu('Main_Menu')): ?>
                                    <?php wp_nav_menu($arg); ?>
                                <?php else: ?>
                                    <ul class="sf-menu" id="mainmenu">
                                        <?php wp_list_categories('title_li=&orderby=id'); ?>
                                    </ul>
                                <?php endif; ?>
                                <!-- end menu -->
                            </div>
                            <!-- end main menu -->
                                                           
                            <?php if (of_get_option('disable_search_menu') == 0){ ?>
                              <div class="search-button-menu"><span id="tickersearch"><i class="icon-search"></i></span>
                                    <form id="tickersearchform" action="<?php echo home_url(); ?>" method="GET" role="search">
                                        <div><label for="s" class="screen-reader-text"><?php _e('Search for:', 'tl_back'); ?></label>
                                            <input type="text" id="s" name="s" value="" placeholder="<?php _e('Search here', 'tl_back'); ?>">
                                        </div>
                                    </form>

                              </div>                              
							<?php }?>
                        </div>
                                           
                    </div>   
                    </div>
                    

<?php if (of_get_option('enable_newsticker') == 1){ ?>
<div class="row">
<div class="grid_12 news-ticker-post">
<div class="latest-news">
<h3><?php echo of_get_option('latest_update'); ?></h3>
<div class="container">
<?php get_template_part('newsticker'); ?>       
</div>
</div>
</div>
</div>
<?php }?>


            </header>

