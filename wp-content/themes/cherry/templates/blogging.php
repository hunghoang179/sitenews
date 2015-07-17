<?php
/*
Template Name: Blogging 
*/
?>
<?php get_header(); ?>
<script src="<?php echo BD_JS; ?>/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="<?php echo BD_JS; ?>/jquery.isotope.min.js" type="text/javascript"></script>
<script src="<?php echo BD_JS; ?>/jquery.imagesloaded.min.js" type="text/javascript"></script>
<script src="<?php echo BD_JS; ?>/jquery.fitvids.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    var $isotope = jQuery('.isotope-container');
    
    $isotope.imagesLoaded( function() {
        $isotope.isotope({
            itemSelector: '.post',
            animationOptions: {
                duration: 200,
                easing: 'swing',
                queue: false
            }
        });
    });

});
</script>

<div class="wrapper">
  <div id="content" class="bd_cherry">
    <div id="primary" class="clearfix isotope-container">
      <?php 
            if ( get_query_var('paged') ) {
            	$paged = get_query_var('paged');
            } elseif ( get_query_var('page') ) {
            	$paged = get_query_var('page');
            } else {
            	$paged = 1;
            }

            $temp = $wp_query;
            $wp_query= null;

            $wp_query = new WP_Query( array(
                'post_type' => 'post',
                'paged' => $paged
            ) );

            // enable use of more tag on template page	
            global $more; $more = 0;
            	
           ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <div>
        <?php
			    $format = get_post_format();
			    $format = ($format) ? $format : 'standard';
			    				    
			    get_template_part( 'content', $format);
			    
			    if( $format == 'standard' || $format == 'gallery' || $format == 'video' || $format == 'audio' ) {
			        get_template_part( 'content', 'meta' ); 
			    }
			?>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <div class="clear bd_pagenavi_blogging">
    <?php if ($wp_query->max_num_pages > 1) bd_pagenavi(); ?>
  </div>
</div>
<?php $wp_query = null; $wp_query = $temp;?>
<?php get_footer(); ?>
