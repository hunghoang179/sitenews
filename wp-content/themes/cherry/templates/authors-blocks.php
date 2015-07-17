<?php
/*
Template Name: Authors blocks
*/
?>

<?php get_header(); ?>

<script src="<?php echo BD_JS; ?>/jquery.masonry.min.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery(function() {
			var $container = jQuery('.bd_authors');
				$container.masonry({
					//columnWidth: 220,
					isResizable: true,
					itemSelector: '.author_box',
					isAnimated: true,
					isAnimatedFromBottom: true,
					isFitWidth: true,
					animationOptions: {
						duration: 750,
						easing: 'easeInOutExpo'
					}
				});
			});

		});
</script>

<div class="sidebar_content">
  <div class="authors-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="bd_authors">

      <?php $users = get_users('blog_id=1&orderby=post_count&order=DESC'); foreach ($users as $user) { ?>
      <div class="box_inner author_box">
        <div class="news_box">
          <div>
            <ul class="authors_wrap">
              <li class="page_authors_avatar">
                <div class="post_thumbnail">
                  <?php echo get_avatar( get_the_author_meta( 'user_email' , $user->ID ), apply_filters( 'MFW_author_bio_avatar_size', 190 ) ); ?>
                </div>
                <div class="author-description">
                  <h3>
                    <a href="<?php echo get_author_posts_url( $user->ID ); ?>">
                    <?php echo $user->display_name ?>
                    </a>
                  </h3>
                  <p>
                    <?php the_author_meta( 'description'  , $user->ID ); ?>
                  </p>
                </div>

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

              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
    <?php endwhile; ?><!--//end author box-->
  </div>
</div><!--//content-->

<?php get_footer(); ?>
