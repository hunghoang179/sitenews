<?php get_header(); ?>

<div class="sidebar_content">
  <?php if ( have_posts() ) : ?>
  <h2 class="news_box_title5">
    <?php if ( have_posts() ) : ?>
    <?php printf( __( 'Search Results for: %s', 'bd' ), '<span>' . get_search_query() . '</span>' ); ?>
    <?php else : ?>
    <?php _e('Nothing Found', 'bd'); ?>
    <?php endif; ?>
  </h2>
  <?php get_template_part( 'loop', 'search' );	?>
  <?php else : ?>
  <div class="box_inner author_box">
    <div class="news_box">
      <h2 class="news_box_title5">
        <?php if ( have_posts() ) : ?>
        <?php printf( __( 'Search Results for: %s', 'bd' ), '<span>' . get_search_query() . '</span>' ); ?>
        <?php else : ?>
        <span>
        <?php _e('Nothing', 'bd'); ?>
        </span>
        <?php _e('Found', 'bd'); ?>
        <?php endif; ?>
      </h2>
      <p>
        <?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'bd' ); ?>
      </p>
    </div>
  </div>
  <!--//end author box-->
  <?php endif; ?>
  <?php if ($wp_query->max_num_pages > 1) bd_pagenavi(); ?>
  <div class="clear"></div>
</div>
<!--//content-->

<div class="sidebar_wrapper">
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
