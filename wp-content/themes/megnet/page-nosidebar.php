<?php
/*
  Template Name: Page no sidebar
 */
?>
<?php get_header(); ?>
<section id="contents" class="clearfix">
<div class="row">
<!-- begin content -->        
<div class="grid_12 page_full_content"><?php the_breadcrumb(); ?></div>
<div <?php post_class('grid_12 page-full content_page'); ?> id="post-<?php the_ID(); ?>">  
 <div class="content_page_padding">    

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <h3 class="page-title"><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                    <?php endwhile; // end of the loop.    ?>
                <?php endif; ?>
      </div>
      <div class="brack_space"></div>
      </div>
  </div> 
  </section>
<?php get_footer(); ?>


