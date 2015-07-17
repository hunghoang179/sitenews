<?php get_header(); ?>
<div class="<?php $sidepos =  get_post_meta($post->ID, 'cherry_side_layout', true); echo ''.$sidepos;?>">
<div class="sidebar_content">

  <div class="box_inner">
    <div class="news_box">
		<?php if(bdayh_get_option('article_crumbs') == 1) { ?>
			<div class="pp-breadcrumbs">
			<?php bd_breadcrumbs() ?>
			</div><!--//end breadcrumbs-->
		<?php } ?>

      <h2 class="news_box_title4 page-titles-pp">
        <?php the_title(); ?>
      </h2>
      <!--//end entry title-->

      <?php if(bdayh_get_option('meta_pages') == 1){ ?>
      <div class="entry_meta">
        <div class="left">
          <div class="post_thumbnail">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 52 ) ); ?>
          </div>
          <!--//avatar-->
          <span class="meta_author">
          <?php _e('Posted by :', 'bd'); ?>
          <a
           href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
          <?php echo get_the_author() ?>
          </a>
          </span>
          <span class="meta_date">
          <?php _e('Posted date :', 'cherry'); ?>
          <strong>
          <?php the_time(get_option('date_format')); ?>
          </strong>
          </span>
          <span class="meta_comments">
          <?php comments_popup_link( __( 'Add', 'bd' ), __( '1 Comment', 'bd' ), __( '% Comments', 'bd' ) ); ?>
          </span>
        </div>
      </div>
      <!--//end entry_meta-->
      <?php } ?>

      <div class="inner_post pp-code post-page-entry-pp">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
		<div class="clear"></div>
		<?php wp_link_pages(); ?>
		<?php endwhile; else: ?>
		<?php endif; ?>
	    <?php wp_reset_query(); ?>
      </div>
      <!--//end entry-->

      <?php wp_link_pages(array('next_or_number'=>'next', 'previouspagelink' => ' &laquo; ', 'nextpagelink'=>' &raquo;')); ?>


      <?php if(bdayh_get_option('pages_socail_buttons') == 1){ ?>
      <?php require BD_TM .'/social_shers.php'; ?>
      <!--//postmeta_share-->
      <?php } ?>
    </div>
  </div>
  <!--//end post-->

  <?php comments_template(); ?>
</div>
<!--//content-->
<div class="sidebar_wrapper">
  <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Page Sidebar')){ }else { ?>
  <?php get_sidebar(); ?>
  <?php } ?>
</div>
</div>
<?php get_footer(); ?>
