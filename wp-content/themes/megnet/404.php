<?php get_header(); ?>

<section id="contents" class="clearfix">
<div class="row">
<!-- begin content -->   
<div class="grid_12 space_404">&nbsp</div>         
  <div class="grid_12 page_error content_page">
    
                    <h1 class="big"><?php _e('404', 'tl_back'); ?></h1>
                    <p class="description">  
                    <?php $notfound = of_get_option('term_404'); ?>
					<?php echo $notfound; ?></p>
      </div>
  </div> </section>

<?php get_footer(); ?>

