<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>
<div class="sidebar_content">

	<?php if(bdayh_get_option('feature_slider') == 1){ ?>

	<?php if(bdayh_get_option('slider_type') == 'cycleslider'){ ?>
			<?php require BD_TM .'/slider.php'; ?>
	   <?php } else { ?>
			<?php require BD_TM .'/slider-flex.php'; ?>
	   <?php } ?>

	<?php } ?>


<?php query_posts('post_type=post&paged='.$paged); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div>
    <div class="box_inner cat_box recent_posts_home blog_loop" >
      <div class="news_box">
        <h3 class="news_box_title2">
          <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title();?></a>
        </h3>

        <div class="postmeta">
          <span class="meta_author">
	          <?php _e('Posted by :', 'bd'); ?>
	          <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
	          	<?php echo get_the_author() ?>
	          </a>
          </span>
          <span class="meta_date"><?php _e('Posted date :', 'bd'); ?><strong><?php the_time(get_option('date_format')); ?></strong></span>
          <span class="meta_cat"><?php _e('In :', 'bd'); ?><strong><?php printf('%1$s', get_the_category_list( ', ' ) ); ?></strong></span>
          <span class="meta_comments"><?php _e('comment :', 'bd'); ?><?php comments_popup_link( __( '0', 'bd' ), __( '1 Comment', 'bd' ), __( '% Comments', 'bd' ) ); ?></span>


        </div><!--//postmeta-->

        <ul>
          <li class="first_news">
            <div class="inner_post">
              <div class="post_thumbnail">

                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	                <?php $timthumb = bdayh_get_option('timthumb'); if ($timthumb == true) { ?>
	                	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=160&amp;w=261&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	                <?php } else { ?>

		                <?php
		                        $thumb = bd_post_image('large');
		                        $ntImage = aq_resize( $thumb, 261, 160, true );
								if($ntImage == ''){ $ntImage = BD_IMG .'/default_thumb.png'; }
		                ?>

		                <?php if (strpos(bd_post_image(), 'youtube')) { ?>
		                	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="261" height="160" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		                <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
		                	<img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="261" height="160" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		                <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
		                	<img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="261" height="160" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		                <?php } else { ?>
		                	<img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		                <?php } ?>

	                <?php } ?>
                </a>
              </div><!--//post_thumbnail-->
              <p>
                <?php the_excerpt_max_charlength('400'); ?>
              </p>
            </div>
          </li>
        </ul>
        <?php require BD_TM .'/social_shers.php'; ?><!--//postmeta_share-->
      </div>
    </div>
  </div>
<?php endwhile; ?>
<?php  else:  ?>
<?php  endif; ?>
<?php if ($wp_query->max_num_pages > 1) bd_pagenavi(); ?>
<div class="clear"></div>
</div>
<!--//content-->
<div class="sidebar_wrapper">
<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Page Sidebar')){ }else { ?>
	<?php get_sidebar(); ?>
<?php } ?>
</div>
<?php get_footer(); ?>