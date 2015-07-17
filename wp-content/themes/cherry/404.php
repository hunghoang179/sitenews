<?php
/*
Template Name: 404 Not Found
*/
?>
<?php get_header(); ?>

<div>
  <?php bd_breadcrumbs() ?>
  <div class="box_inner author_box">
    <div class="news_box">
      <h2 class="news_box_title5 text_center page404title">
        <?php _e( '<span>404</span> - Page Not Found !', 'bd' ); ?>
      </h2>
      <p class="text_center page_notfound_p">
        <?php _e( 'The page you are looking for is not here. Perhaps search helps you.', 'bd' ); ?>
      </p>
      <div class="clear"></div>
      <div class="sitemap_search">
      <?php get_search_form(); ?>
      </div>
      <div class="line_bottom">
      </div>
      <div class="clear"></div>
      <ul class="sitemap_content">
        <li>
          <h3 class="sitemap_title">
            <?php _e('Pages','bd'); ?>
          </h3>
          <ul id="sitemap_pages">
            <?php wp_list_pages('title_li='); ?>
          </ul>
        </li>
        <!--//sitemap pages-->
        
        <li>
          <h3 class="sitemap_title">
            <?php _e('Categories','bd'); ?>
          </h3>
          <ul id="sitemap_categories">
            <?php wp_list_categories('title_li='); ?>
          </ul>
        </li>
        <!--//sitemap categories-->
        
        <li>
          <h3 class="sitemap_title">
            <?php _e('Tags','bd'); ?>
          </h3>
          <ul id="sitemap_categories">
            <?php $tags = get_tags();
			  if ($tags) {
			  foreach ($tags as $tag) {
			  echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
			}
			} 
			?>
          </ul>
        </li>
        <!--//sitemap tags-->
        
        <li class="end_row">
          <h3 class="sitemap_title">
            <?php _e('Authors','bd'); ?>
          </h3>
          <ul id="sitemap_authors" >
            <?php wp_list_authors('optioncount=1&exclude_admin=0'); ?>
          </ul>
        </li>
        <!--//sitemap tags-->
        
      </ul>
    </div>
  </div>
  <!--//end author box-->
  
  <div class="clear"></div>
</div>
<!--//content-->
<?php get_footer(); ?>
