<?php get_header(); ?>

<div class="sidebar_content">

  <div class="box_inner cat_box recent_posts_home" >
    <div class="news_box">

		<?php if(bdayh_get_option('article_crumbs') == 1) { ?>
			<div class="pp-breadcrumbs">
			<?php bd_breadcrumbs() ?>
			</div><!--//end breadcrumbs-->
		<?php } ?>

      <h3 class="news_box_title3"><?php printf( __( 'Category Archives: %s', 'bd' ), '<span>' . single_cat_title( '', false ) . '</span>' ) ?>

      <?php if(bdayh_get_option('category_rss') == 1) { ?>
      	<a class="rss-cat-icon tip" title="<?php _e( 'Feed Subscription', 'bd' ); ?>" href="<?php echo get_category_feed_link($category_id) ?>">
      		<?php _e( 'Feed Subscription', 'bd' ); ?>
      	</a>
      <?php } ?>

      </h3>
      <?php if( bdayh_get_option( 'category_desc' ) ):
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo '<div class="archive-desc">' . $category_description . '</div><div class="clear"></div>'; endif; ?>
    </div>
  </div>

		<?php get_template_part( 'loop', 'archive' );	?>

		<?php if(bdayh_get_option('archives_pagination') == 1){ ?>
			<?php if ($wp_query->max_num_pages > 1) bd_pagenavi(); ?>
		<?php } ?>

  <div class="clear"></div>
</div>
<!--//content-->

<div class="sidebar_wrapper">
  <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Category Sidebar')){ }else { ?>
  <?php get_sidebar(); ?>
  <?php } ?>
</div>
<?php get_footer(); ?>
