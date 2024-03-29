
<div class="post-thumb">
  <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
	  	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=170&amp;w=300&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	  <?php } else { ?>
	  <?php
			$thumb = bd_post_image('large');
			$ntImage = aq_resize( $thumb, 300, 170, true );
			if($ntImage == '')
				{
					$ntImage = BD_IMG .'/default_thumb.png';
				}
		  ?>
		  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
		  	<img src="<?php echo bd_post_image('large'); ?>" width="300" height="170" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
		  	<img src="<?php echo bd_post_image('large'); ?>" width="300" height="170" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
		  	<img src="<?php echo bd_post_image('large'); ?>" width="300" height="170" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		  <?php } else { ?>
		  	<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		  <?php } ?>
	  <?php } ?>
  </a>
</div><!--//END-->

<h2 class="entry-title">
  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
  	<?php the_title(); ?>
  </a>
</h2><!--//END-->

<div class="entry-meta-header">
  <span>
 	 <?php the_time( get_option('date_format') ); ?>
  </span>
</div><!--//END-->

<div class="entry-content">
  <?php the_excerpt( __('Read more ...', 'bd') );  ?>
</div><!--//END-->
