<?php get_header(); ?>

<div class="sidebar_content">
  <?php bd_breadcrumbs() ?>
  <?php
	if(isset($_GET['author_name'])) :
		$curauth = get_userdatabylogin($author_name);
	  else :
		$curauth = get_userdata(intval($author));
	endif;

  ?>
  <div class="box_inner author_box">
    <div class="news_box">
      <h2 class="news_box_title5">
        <?php echo __( 'Author Archives : ', 'bd'  ); ?>
        <span>
        <?php echo $curauth->display_name; ?>
        </span>
      </h2>
      <div class="">
        <?php if(function_exists('get_avatar')) { echo get_avatar( $curauth->user_email, $size = '79' ); } /* Displays the Gravatar based on the author's email address. Visit Gravatar.com for info on Gravatars */ ?>
      </div>
      <?php if($curauth->description !="") {  ?>
      <p>
        <?php echo $curauth->description; ?>
      </p>
      <?php }?>

      <div class="author_social">

        <?php if(get_the_author_meta('url',$curauth->ID ) != "") { ?>
        	<a href="<?php the_author_meta( 'url',$curauth->ID  ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( "'s site'", 'bd' ); ?>"><img src="<?php echo BD_IMG; ?>/small_social_icons/home.png" alt="" /></a>
        <?php } ?>

        <?php if(get_the_author_meta('facebook',$curauth->ID ) != "") { ?>
        	<a href="<?php the_author_meta( 'facebook',$curauth->ID ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Facebook', 'bd' ); ?>"><img src="<?php echo BD_IMG; ?>/small_social_icons/facebook.png" alt="" /></a>
        <?php } ?>

        <?php if(get_the_author_meta('twitter',$curauth->ID ) !="") { ?>
        	<a href="http://twitter.com/<?php the_author_meta( 'twitter',$curauth->ID ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Twitter', 'bd' ); ?>"><img src="<?php echo BD_IMG; ?>/small_social_icons/twitter.png" alt="" /></a>
        <?php } ?>

        <?php if(get_the_author_meta('google',$curauth->ID ) !="") { ?>
        	<a href="<?php the_author_meta( 'google',$curauth->ID  ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Google+', 'bd' ); ?>"><img src="<?php echo BD_IMG; ?>/small_social_icons/gplus.png" alt="" /></a>
        <?php } ?>

        <?php if(get_the_author_meta('linkedin',$curauth->ID ) !="") { ?>
        	<a href="<?php the_author_meta( 'linkedin',$curauth->ID ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Linkedin', 'bd' ); ?>"><img src="<?php echo BD_IMG; ?>/small_social_icons/linkedin.png" alt="" /></a>
        <?php } ?>

        <?php if(get_the_author_meta('pinterest',$curauth->ID ) !="") { ?>
        	<a href="<?php the_author_meta( 'pinterest',$curauth->ID ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Pinterest', 'bd' ); ?>"><img src="<?php echo BD_IMG; ?>/small_social_icons/pinterest.png" alt="" /></a>
        <?php } ?>

        <?php if(get_the_author_meta('youtube',$curauth->ID ) !="") { ?>
        	<a href="<?php the_author_meta( 'youtube',$curauth->ID ); ?>" title="<?php echo $user_identity ?><?php _e( '  on YouTube', 'bd' ); ?>"><img src="<?php echo BD_IMG; ?>/small_social_icons/youtube.png" alt="" /></a>
        <?php } ?>

        <?php if(get_the_author_meta('flickr',$curauth->ID ) !="") { ?>
        	<a href="<?php the_author_meta( 'flickr',$curauth->ID ); ?>" title="<?php echo $user_identity ?><?php _e( '  on Flickr', 'bd' ); ?>"><img src="<?php echo BD_IMG; ?>/small_social_icons/flickr.png" alt="" /></a>
        <?php } ?>

      </div>
      <?php  ?>
    </div>
  </div>
  <!--//end author box-->
  <div class="box_inner cat_box recent_posts_home" >
    <div class="news_box">
      <ul>
        <?php if(have_posts()) : while(have_posts()) : the_post('');?>
        <li class="first_news">
          <div class="inner_post">
            <div class="">

              <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
              <?php $timthumb = bdayh_get_option('timthumb');
                if ($timthumb == true) { ?>
              <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=160&amp;w=261&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
              <?php } else { ?>
                    <?php
                    $thumb = bd_post_image('large');
                    $ntImage = aq_resize( $thumb, 158, 158, true );
                    ?>
                    <div class="pp-post-thumbnail-blog pp-img">
                        <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                            <img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="158" height="158" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                            <img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="158" height="158" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                            <img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="158" height="158" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        <?php } else { if($ntImage != '') { ?>
                            <img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        <?php } } ?>
                    </div>
              <?php } ?>
              </a>
            </div>
            <h2>
              <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
              <?php the_title();?>
              </a>
            </h2>


            <div class="post_meta">
              <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
              <?php echo get_the_author() ?>
              </a>
              <a class="date">
              <?php the_time(get_option('date_format')); ?>
              </a>
            </div>
            <p>
              <?php the_excerpt_max_charlength('200'); ?>
              ...</p>
          </div>
        </li>
        <?php endwhile; ?>
        <?php  else:  ?>
        <?php  endif; ?>
      </ul>
    </div>
  </div>
  <?php if ($wp_query->max_num_pages > 1) bd_pagenavi(); ?>
</div>
<!--//content-->

<div class="sidebar_wrapper">
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
