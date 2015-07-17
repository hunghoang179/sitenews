<div class="newsticker">
  <span class="title"><?php echo stripslashes(bdayh_get_option('newsticker_title')); ?></span>
  <ul class="newsticker_scroller">
    <?php
		$f_display = bdayh_get_option('newsticker_display');
		$f_cat = bdayh_get_option('newsticker_category');
		$f_tag = bdayh_get_option('newsticker_tag');
	?>

    <?php if ($f_display == 'lates') { ?>
    	<?php query_posts(array('showposts' => 7)); ?>
    <?php } elseif ($f_display == 'category') { ?>
    	<?php query_posts(array('showposts' => 7, 'cat' => $f_cat )); ?>
    <?php } elseif ($f_display == 'tag') { ?>
    	<?php query_posts(array('showposts' => 7, 'tag' => $f_tag )); ?>
    <?php } else { ?>
    	<?php query_posts(array('showposts' => 7)); ?>
    <?php } ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>">
      	<?php the_title(); ?>
      </a>
    </li>
    <?php endwhile; ?>
    <?php  else:  ?><!--//else -->
    <?php  endif; ?>
    <?php wp_reset_query(); ?>
  </ul>

<script type="text/javascript">
jQuery(document).ready(function (jQuery){
jQuery('.newsticker_scroller').cycle({
	fx: 'fade', //scrollVert
	easing: 'easeOutBack', //easeInOutBack
	speed: 1000,
	pause:true,
	timeout: 4000,
	pauseOnPagerHover: true,
	});
	});
</script>
</div>
</div>
