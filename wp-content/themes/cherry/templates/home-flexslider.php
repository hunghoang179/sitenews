<?php
/*
Template Name: Flexslider
*/
?>

<?php get_header(); ?>

<div class="sidebar_content">

	<?php require BD_TM .'/slider-flex.php'; ?>
	<!--//slider-->

  <?php

  	query_posts('post_type=post&paged='.$paged);
  	$is_blog_view = (bdayh_get_option('home_type') == 'blog') ? true : false;

	if( $is_blog_view == true){
		//rewind_posts();
		get_template_part( 'loop', 'index' );
		if ($wp_query->max_num_pages > 1) bd_pagenavi();

	}
	else
	{

		$home_boxes = bdayh_get_option('home');
		$repeat = 1;
		if(count($home_boxes) > 0)
		{
			foreach($home_boxes as $k => $v)
			{
    			$bd_cat_id 		= (isset($v['cat'])) ? $v['cat'] : array(0);
   				$bd_total_posts = (isset($v['number'])) ? $v['number'] : 0;

				switch($v['type'])
				{
					case"news_box":
                       if($v['layout'] == 2)
                       {
							require(BD_TM .'box-first-post-top.php');
                       }
                       elseif($v['layout'] == 1)
                       {
							require(BD_TM .'box-first-post-left.php');
                       }
                       elseif($v['layout'] == 3)
                       {
							require(BD_TM .'box-2column.php');
							$repeat++;
                       }
                       elseif($v['layout'] == 4)
                       {
							require(BD_TM .'box-news-in-picrure.php');
                       }
					break;
					case"scrolling_box":
                       require(BD_TM .'scrollingbox.php');
					break;
					case"ads_box":
                       require(BD_TM .'box-ads-home.php');
					break;
					case"recent_box":
                        require(BD_TM .'recentposts.php');
					break;
				}
			}
		}

	}
	?>
  <?php if(bdayh_get_option('feature_tabs') == 1){ ?>
  <?php require BD_TM .'/box-tabs.php'; ?>
  <?php } ?>
</div>
<!--//content-->

<div class="sidebar_wrapper">
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
