<?php
/*
Template Name: Blog List
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
  <!--//slider-->

  <?php query_posts(array ( 'paged' => get_query_var( 'paged' ), )); ?>
  <?php
  	get_template_part( 'loop', 'category' );
  ?>
  <?php if ($wp_query->max_num_pages > 1) bd_pagenavi(); ?>
  <div class="clear"></div>
</div><!--//content-->

<div class="sidebar_wrapper">
	<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Page Sidebar')){ }else { ?>
		<?php get_sidebar(); ?>
	<?php } ?>
</div>
<?php get_footer(); ?>
