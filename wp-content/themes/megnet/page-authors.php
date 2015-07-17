<?php 
/*
Template Name: Authors List
*/
?>
<?php get_header(); ?>
  

<section id="contents" class="clearfix">
<div class="row main_content">
<!-- begin content -->            

<div class="content_wraper">
   <!-- Start content -->
   <?php the_breadcrumb(); ?>
    <div class="grid_8" id="content">
 <div class="widget_container content_page"> 
          
          
          <div id="content">				
		
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		
		<article class="item-list post">
			<div class="post-inner">
				<h3 class="page-title"><?php the_title(); ?></h3>
				<p class="post-meta"></p>
				<div class="clear"></div>
				<div class="entry">
					<?php the_content(); ?>
				
                
                
                
    
                
                
             		
					<?php
						$users = get_users('blog_id=1&orderby=post_count&order=DESC');
						foreach ($users as $user) {	?>
					
                               <div class="author-info">
                               <div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' , $user->ID ), apply_filters( 'MFW_author_bio_avatar_size', 100 ) ); ?></div>
                               <div class="author-description"><h2><a href="<?php echo get_author_posts_url( $user->ID ); ?>" title="<?php echo $user->display_name ?>" rel="author"><?php echo $user->display_name ?></a></h2><p><?php the_author_meta( 'description'  , $user->ID ); ?></p>
                              <?php if ((get_the_author_meta('user_url' , $user->ID)) != ''){ ?> 
                              <p><a href="<?php echo get_the_author_meta('user_url' , $user->ID); ?>" target="_blank"><?php echo get_the_author_meta('user_url' , $user->ID); ?></a></p>
							  <?php }?>
                               <ul class="author-social clearfix">
                               <?php if ((get_the_author_meta('aim' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('aim' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/aim.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('yim' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('yim' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/yahoo_im.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('jabber' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('jabber , $user->ID'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/google_talk.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('rss' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('rss' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/rss.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('pinterest' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('pinterest' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/pinterest.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('devianart' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('devianart' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/deviantart.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('dribble' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('dribble' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/dribbble.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('behance' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('behance' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/behance.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('youtube' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('youtube' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/youtube.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('flickr' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('flickr' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/flickr.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('instagram' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('instagram' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/instagram.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('github' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('github' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/GitHub.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('twitter' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('twitter' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/twitter.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('facebook' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('facebook' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/facebook.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('googleplus' , $user->ID)) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('googleplus' , $user->ID); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/gplus.png"></a></li>
                               <?php }?>
                               </ul>
                               </div></div>
                   
                    
					<?php } ?>
					







				</div><!-- .entry /-->	
			
			</div><!-- .post-inner -->
		</article><!-- .post-listing -->
		<?php endwhile; ?>
	</div><!-- .content -->
          
		  
          
<div class="brack_space"></div>
        </div>

  </div>
  <!-- End content -->
  
          
    <!-- Start sidebar -->
	<div class="grid_4 p7ehc-a" id="sidebar">

                <?php
				
				if(isset($GLOBALS['sbg_sidebar'][0])){
					$dyn_sidebar = $GLOBALS['sbg_sidebar'][0];
					
					$au_sidebar = of_get_option('au_sidebar','');	
					if(!empty($au_sidebar)) {
						$dyn_sidebar = $au_sidebar;
					};
				
					foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
					if($sidebar['name'] == $dyn_sidebar)
			  			{
							 $dyn_side = $sidebar['id'];
						}
					} 
				}			

				if(isset($dyn_side)) {
					
					if (is_active_sidebar($dyn_side)) : dynamic_sidebar($dyn_side);
		            endif;								
					
					
				} else{
					if (is_active_sidebar('center-sidebar')) { dynamic_sidebar('center-sidebar'); }
				}					
				
				
?>    </div>
  <!-- End sidebar -->

          
        
    </div>
</div>
 </section>
<!-- end content --> 

<?php get_footer(); ?>