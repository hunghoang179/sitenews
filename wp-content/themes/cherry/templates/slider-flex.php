<div class="flexslider-cherry">

		<?php
			  $f_display = bdayh_get_option('feature_display');
			  $f_cat = bdayh_get_option('feature_category');
			  $f_tag = bdayh_get_option('feature_tag');
			  $f_numb = bdayh_get_option ('feature_slider_numb');
		?>

		<?php if ($f_display == 'lates') { ?>
			<?php query_posts(array('showposts' => $f_numb)); ?>
		<?php } elseif ($f_display == 'category') { ?>
			<?php query_posts(array('showposts' => $f_numb, 'cat' => $f_cat )); ?>
		<?php } elseif ($f_display == 'tag') { ?>
			<?php query_posts(array('showposts' => $f_numb, 'tag' => $f_tag )); ?>
		<?php } else { ?>
			<?php query_posts(array('showposts' => $f_numb)); ?>
		<?php } ?>

		<div class="flexslider-pp">
        <ul class="flexslider-items slides">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li class="flexslider-item">
     		<div class="flexslider-thumb">
	            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		            <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
		            	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=350&amp;w=623&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } else { ?>
						<?php
						$thumb = bd_post_image('large');
						$ntImage = aq_resize( $thumb, 623, 350, true );
						if($ntImage == '')
							{
							$ntImage = BD_IMG .'/default_thumb.png';
							}
						?>
			            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
			            	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="623" height="350" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
			            	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="623" height="350" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
			            	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="623" height="350" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } else { ?>
			            	<img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } ?>
		            <?php } ?>
	            </a>
     		</div><!--//Thumb-->
     		<div class="flexslider-caption">
				<h3>
					<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h3>
				<p><?php the_excerpt_max_charlength('200'); ?></p>
     		</div><!--//flex caption-->
		</li><!--//End -->
        <?php endwhile; ?>
      	<?php  else:  ?>
      	<!--//else -->
      	<?php  endif; ?>
      	<?php wp_reset_query(); ?>
        </ul>
        </div><!--//End -->
</div>
<script type="text/javascript" charset="utf-8">
jQuery(window).load(function(){

		jQuery('.flexslider-pp').flexslider({
			animation: "fade",
			slideshow: true,
			touch: true,
			slideshowSpeed: <?php echo stripslashes(bdayh_get_option('feature_slider_speed')); ?>,
			animationSpeed: <?php echo stripslashes(bdayh_get_option('feature_slider_animation')); ?>,
			video: true,

			after: function(slider) {
			  jQuery('.flexslider-caption').animate({bottom:0,}, 400)},
			before: function(slider) {
			  jQuery('.flexslider-caption').animate({ bottom:-105,}, 400)},
			start: function(slider){
			  jQuery('body').removeClass('loading');
			  jQuery('.flexslider-caption').animate({ bottom:0,}, 400)
			}
		});
});
</script>