<?php get_header(); ?>

<div class="sidebar_content">

<?php if( bdayh_get_option( 'feature_slider' ) == 1 ){ ?>
    <?php if( bdayh_get_option( 'slider_type' ) == 'cycleslider' ) { ?>
        <?php require BD_TM .'/slider.php'; ?>
    <?php } else { ?>
        <?php require BD_TM .'/slider-flex.php'; ?>
    <?php } ?>
<?php } ?>

<?php

  	$is_blog_view = (bdayh_get_option('home_type') == 'blog') ? true : false ;
	if( $is_blog_view == true){
		get_template_part( 'loop', 'index' );
		if ($wp_query->max_num_pages > 1) bd_pagenavi();
	}
	else
	{
		$home_boxes = bdayh_get_option('home');
		$repeat = 1;
		if(count($home_boxes) > 0){
			foreach($home_boxes as $k => $v){

    			$bd_cat_id 		= (isset($v['cat'])) ? $v['cat'] : array(0);
   				$bd_total_posts = (isset($v['number'])) ? $v['number'] : 0;

				switch($v['type']){
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
                            echo "<div class='postsv3'>";
						        require(BD_TM .'box-2column.php');
                                $repeat++;
                            echo"</div>";

                       }
                       elseif($v['layout'] == 4)
                       {
							require(BD_TM .'box-news-in-picrure.php');
                       }
                       elseif($v['layout'] == 5)
                       {
							require(BD_TM .'box-news-in-picrure-small.php');
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

<?php if(bdayh_get_option('feature_tabs') == 1) { ?>
    <?php require BD_TM .'/box-tabs.php'; ?>
<?php } ?>
</div><!-- content/-->

<div class="sidebar_wrapper">
<?php get_sidebar(); ?>
</div>

<div class="clear"></div>
<?php if(bdayh_get_option('feature_smallcat') == 1) { ?>
    <?php require BD_TM .'/small-cat.php'; ?>
<?php } ?>

<?php get_footer(); ?>