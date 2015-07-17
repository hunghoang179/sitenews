<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
  <div class="box_inner">
    <div class="news_box">
		<?php if(bdayh_get_option('article_crumbs') == 1) { ?>
			<div class="pp-breadcrumbs">
			<?php bd_breadcrumbs() ?>
			</div><!--//end breadcrumbs-->
		<?php } ?>
      <h2 class="news_box_title4 page-titles-pp"><?php the_title(); ?></h2><!--//end entry title-->
      <div class="inner_post pp-code post-page-entry-pp">
	 	<?php the_content(); ?>
      </div>
      <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'bd').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
      <!--//end entry-->
	</div>
  </div>
</div><!--//end page-->
<?php comments_template('', true); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>