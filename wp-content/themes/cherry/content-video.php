	<div class="post-thumb">
	  <?php
		    $type = get_post_meta($post->ID, 'cherry_video_type', true);
		    $id = get_post_meta($post->ID, 'cherry_video_id', true);
		    $vid_show = get_post_meta($post->ID, 'cherry_video_show', true);
	        ?>
			<?php if($type == 'youtube') { ?>
				<iframe width="100%" height="380" src="http://www.youtube.com/embed/<?php echo $id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
			<?php } elseif($type == 'vimeo') { ?>
				<iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" width="100%" height="380" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			<?php } elseif($type == 'daily') { ?>
				<iframe frameborder="0" width="100%" height="380" src="http://www.dailymotion.com/embed/video/<?php echo $id ?>?logo=0"></iframe>
			<?php } ?>
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
	  <?php the_excerpt_max_charlength('120'); ?>
	</div><!--//END-->
