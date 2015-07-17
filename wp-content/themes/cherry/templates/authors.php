<?php
/*
Template Name: Authors
*/
?>
<?php get_header(); ?>

<div class="sidebar_content">
  <?php bd_breadcrumbs() ?>
  <div class="box_inner author_box">
    <div class="news_box">
      <h2 class="news_box_title2">
        <?php the_title(); ?>
      </h2>
      <div class="clear"></div>
      <?php if(have_posts()) : while(have_posts()) : the_post('');?>
      <div class="entry_cont">
        <?php the_content(); ?>
      </div>
      <div>
        <ul class="authors_wrap">
          <?php $users = get_users('blog_id=1&orderby=post_count&order=DESC'); foreach ($users as $user) {	?>
	          <li>
	            <div class="post_thumbnail">
	              <?php echo get_avatar( get_the_author_meta( 'user_email' , $user->ID ), apply_filters( 'MFW_author_bio_avatar_size', 80 ) ); ?>
	            </div>
	            <div class="author-description">
	              <h3>
	                <a href="<?php echo get_author_posts_url( $user->ID ); ?>">
	                <?php echo $user->display_name ?>
	                </a>
	              </h3>
	              <?php the_author_meta( 'description'  , $user->ID ); ?>


                  <div class="social-icons icon-12 author_social">
                      <?php if ( get_the_author_meta( 'url' ) ) : ?>
                          <a class="ttip" target="_blank" href="<?php the_author_meta( 'url' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( "'s site", 'bd' ); ?>"><i class="icon-home"></i></a>
                      <?php endif ?>
                      <?php if ( get_the_author_meta( 'facebook' ) ) : ?>
                          <a class="ttip" target="_blank" href="<?php the_author_meta( 'facebook' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Facebook', 'bd' ); ?>"><i class="social_icon-facebook"></i></a>
                      <?php endif ?>
                      <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
                          <a class="ttip" target="_blank" href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Twitter', 'bd' ); ?>"><i class="social_icon-twitter"></i></a>
                      <?php endif ?>
                      <?php if ( get_the_author_meta( 'google' ) ) : ?>
                          <a class="ttip" target="_blank" href="<?php the_author_meta( 'google' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Google+', 'bd' ); ?>"><i class="social_icon-google"></i></a>
                      <?php endif ?>
                      <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
                          <a class="ttip" target="_blank" href="<?php the_author_meta( 'linkedin' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Linkedin', 'bd' ); ?>"><i class="social_icon-linkedin"></i></a>
                      <?php endif ?>
                      <?php if ( get_the_author_meta( 'flickr' ) ) : ?>
                          <a class="ttip" target="_blank" href="<?php the_author_meta( 'flickr' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Flickr', 'bd' ); ?>"><i class="social_icon-flickr"></i></a>
                      <?php endif ?>
                      <?php if ( get_the_author_meta( 'youtube' ) ) : ?>
                          <a class="ttip" target="_blank" href="<?php the_author_meta( 'youtube' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on YouTube', 'bd' ); ?>"><i class="social_icon-youtube"></i></a>
                      <?php endif ?>
                      <?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
                          <a class="ttip" target="_blank" href="<?php the_author_meta( 'pinterest' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Pinterest', 'bd' ); ?>"><i class="social_icon-pinterest"></i></a>
                      <?php endif ?>
                  </div>
                </div>

	            <div class="clear"></div>
	          </li>
          <?php } ?>

        </ul>
      </div>
      <?php endwhile; ?>
      <?php  else:  ?>
      <?php  endif; ?>
    </div>
  </div><!--//end author box-->
  <div class="clear"></div>
  <?php comments_template('', true); ?>
</div><!--//content-->
<div class="sidebar_wrapper">
  <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Page Sidebar')){ }else { ?>
  <?php get_sidebar(); ?>
  <?php } ?>
</div>
<?php get_footer(); ?>
