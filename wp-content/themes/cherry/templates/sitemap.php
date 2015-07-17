<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>

<div>
  <?php bd_breadcrumbs() ?>
  <div class="box_inner author_box">
    <div class="news_box">
      <h2 class="news_box_title2 text_center">
        <?php the_title(); ?>
      </h2>
      <ul class="sitemap_content">
        <li>
          <h3 class="sitemap_title">
            <?php _e('Pages','bd'); ?>
          </h3>
          <ul id="sitemap_pages">
            <?php wp_list_pages('title_li='); ?>
          </ul>
        </li><!--//sitemap pages-->

        <li>
          <h3 class="sitemap_title">
            <?php _e('Categories','bd'); ?>
          </h3>
          <ul id="sitemap_categories">
            <?php wp_list_categories('title_li='); ?>
          </ul>
        </li><!--//sitemap categories-->

        <li>
          <h3 class="sitemap_title">
            <?php _e('Tags','bd'); ?>
          </h3>
          <ul id="sitemap_categories">
            <?php $tags = get_tags();
			  if ($tags)
				{
					foreach ($tags as $tag)
					{
					  echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
					}
				}
			?>
          </ul>
        </li><!--//sitemap tags-->

        <li class="end_row">
          <h3 class="sitemap_title">
            <?php _e('Authors','bd'); ?>
          </h3>
          <ul id="sitemap_authors" >
            <?php wp_list_authors('optioncount=1&exclude_admin=0'); ?>
          </ul>
        </li><!--//sitemap tags-->

      </ul>
    </div>
  </div><!--//end author box-->

  <div class="clear"></div>
</div><!--//content-->
<?php get_footer(); ?>
