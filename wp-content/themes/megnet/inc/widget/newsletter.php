<?php 
add_action('widgets_init','themeloy_newsletter_register');

function themeloy_newsletter_register() { 
				register_widget('themeloy_newsletter'); 
}


class themeloy_newsletter extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function themeloy_newsletter() {
		$widget_ops = array('classname' => 'themeloy_newsletter','description' => __('Widget display the Subscribe box', 'tl_back'));
			parent::__construct('themeloy_newsletter', __('Themeloy: Newsletter', 'tl_back'), $widget_ops);
		}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
		
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);	
		$feed_url = $instance['feed_url'];
		$show_social_network = isset($instance['show_social_network']) ? $instance['show_social_network'] : false;
		$show_subscribe = isset($instance['show_subscribe']) ? $instance['show_subscribe'] : false;

?>

		<div class="newsletter widget">
        
        
        <?php 
		// Widget title
			if($title==""){}else{ 
			echo '<h3 class="widget-title"><span>';
			echo $title;
			echo '</span></h3>';
			}
			
		if ($show_subscribe == true) { ?>
		             <form action="http://feedburner.google.com/fb/a/mailverify" method="post" class="newsletter_form" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feed_url; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
		     <input type="text" class="text" name="email" value="<?php _e('Your Email', 'tl_back'); ?>" onfocus="if(this.value=='<?php _e('Your Email', 'tl_back'); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Your Email', 'tl_back'); ?>';"/>
		     <input type="hidden" name="loc" value="en_US"/>
			<input type="hidden" value="<?php echo $feed_url; ?>" name="uri"/>
		     <input type="submit"  class="buttons" value="<?php _e('Subscribe', 'tl_back');?>" />
                     </form>
         	<?php }?>
             <?php if ($show_social_network == true) { ?>	
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
              <?php } ?>
              
              </div>
              
              
<?php 
}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['feed_url'] = $new_instance['feed_url'];
		$instance['show_social_network'] = $new_instance['show_social_network'];
		$instance['show_subscribe'] = $new_instance['show_subscribe'];
		
		return $instance;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

function form( $instance ) {

		$defaults = array(
			'title' => 'Newslater', 			
			'feed_url' => '1stepwebdesign',
			'show_social_network' => 'on',
			'show_subscribe' => 'on'
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

 <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'tl_back'); ?></label>
		<input  class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" /></p>
           

		<p>
		<label for="<?php echo $this->get_field_id( 'feed_url' ); ?>"><?php _e('feedburner name: (your name without http://feeds.feedburner.com/)', 'tl_back'); ?></label>
		<input  class="widefat" id="<?php echo $this->get_field_id('feed_url'); ?>" name="<?php echo $this->get_field_name('feed_url'); ?>" type="text" value="<?php echo $instance['feed_url']; ?>" />
		</p>
     <p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_subscribe'], 'on'); ?> id="<?php echo $this->get_field_id('show_subscribe'); ?>" name="<?php echo $this->get_field_name('show_subscribe'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_subscribe'); ?>"><?php _e( 'Show Subscribe', 'tl_back'); ?></label>
		</p>
        
     <p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_social_network'], 'on'); ?> id="<?php echo $this->get_field_id('show_social_network'); ?>" name="<?php echo $this->get_field_name('show_social_network'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_social_network'); ?>"><?php _e( 'Show Social network', 'tl_back'); ?></label>
		</p>


   <?php 
}
}
?>