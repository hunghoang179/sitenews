
<div class="slider">
  <div class="top_slider">
    <button id="slider_prev" type="button"><?php _e('prev','bd')?></button>
    <button id="slider_next" type="button"><?php _e('next','bd') ?></button>
    <div class="items">
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

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="item">
        <div>
          <div class="thumb">
            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	            <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
	            	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=248&amp;w=330&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	            <?php } else { ?>
					<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 330, 248, true );
					if($ntImage == '')
						{
						$ntImage = BD_IMG .'/default_thumb.png';
						}
					?>
		            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
		            	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="330" height="248" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
		            	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="330" height="248" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
		            	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="330" height="248" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } else { ?>
		            	<img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } ?>
	            <?php } ?>
            </a>
            <a class="readmore" href="<?php the_permalink();?>" title="<?php the_title(); ?>"> <?php _e('Read more','bd')?> <span> &raquo; </span> </a>

          </div><!--//thumb-->
          <div class="item_content">
            <h3>
              <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
              	<?php the_title(); ?>
              </a>
            </h3>
            <ul class="slider_meta">
              <li>
                <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
                	<?php echo get_the_author() ?>
                </a>
              </li>
              <li>
                <a class="date">
                <?php the_time(get_option('date_format')); ?>
                </a>
              </li>
            </ul>
            <p>
            <?php global $post;
			$excerpt = $post->post_excerpt;
				if($excerpt==''){
				$excerpt = get_the_content('');
				}
			echo wp_html_excerpt($excerpt,180);
			?> ...
			</p>
          </div><!--//item_content-->
        </div><!--End Slider Caption-->
      </div>
      <?php endwhile; ?>
      <?php  else:  ?><!--//else -->
      <?php  endif; ?>
      <?php wp_reset_query(); ?>
    </div><!--Slider-->
  </div><!--Slider Items-->

  <?php if(bdayh_get_option('feature_slider_small_thumb') == 1){ ?>
  <ul class="small_thumbs">

		<?php if ($f_display == 'lates') { ?>
			<?php query_posts(array('showposts' => $f_numb)); ?>
		<?php } elseif ($f_display == 'category') { ?>
			<?php query_posts(array('showposts' => $f_numb, 'cat' => $f_cat )); ?>
		<?php } elseif ($f_display == 'tag') { ?>
			<?php query_posts(array('showposts' => $f_numb, 'tag' => $f_tag )); ?>
		<?php } ?>

	    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
	    <li>
	      <a href="#">
	      <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
	      	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=61&amp;w=77&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	      <?php } else { ?>
	      		<?php
				$thumb = bd_post_image('large');
				$ntImage = aq_resize( $thumb, 77, 61, true );
				if($ntImage == '')
					{
					$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>
				<?php if (strpos(bd_post_image(), 'youtube')) { ?>
					<img src="<?php echo bd_post_image('large'); ?>" width="77" height="61" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
					<img src="<?php echo bd_post_image('large'); ?>" width="77" height="61" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
					<img src="<?php echo bd_post_image('large'); ?>" width="77" height="61" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php } else { ?>
					<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php } ?>
	      <?php } ?>
	      </a>
	    </li>
	    <?php endwhile; ?>
	    <?php  else:  ?>
	    <?php  endif; ?>
	    <?php wp_reset_query(); ?>

  </ul>
  <?php } ?>

</div>
<script type="text/javascript">

jQuery(document).ready(function (jQuery){
jQuery('.top_slider .items, #slider').cycle({
	fx: 'fade',
	speed: <?php echo stripslashes(bdayh_get_option('feature_slider_animation')); ?>,
	timeout: <?php echo stripslashes(bdayh_get_option('feature_slider_speed')); ?>,
	prev :'#slider_prev',
	next :'#slider_next',
	pause: true,
	cleartype: true,
	cleartypeNoBg: true,
	pager: 'ul.small_thumbs',
	after: feature_after,
	before: onbefore,
	pagerAnchorBuilder: function(idx, slide) {
	return 'ul.small_thumbs li:eq(' + (idx) + ')';
	}});
		jQuery('ul.small_thumbs li').hover(function() {
		jQuery('.top_slider .items').cycle('pause');
	}, function () {
		jQuery('.top_slider .items').cycle('resume');
	});

	 //jQuery('.top_slider .items').bind('mousewheel',wheelMove);

	function feature_after() {
		jQuery('.slider .top_slider .thumb .readmore').stop().animate({opacity:1, margin: '0 -2px 0 0'},{queue:false,duration: 200 });
		jQuery('.slider #slider_next').stop().animate({opacity:1, bottom:'0px'},{queue:false,duration: 50 });
		jQuery('.slider #slider_prev').stop().animate({opacity:1, bottom:'0px'},{queue:false,duration: 150 });
	/*
      interval = setTimeout(function(){
        jQuery('.top_slider .items').bind('mousewheel', wheelMove);
      },1600);
  	*/
	}
	function onbefore() {
		jQuery('.slider .top_slider .thumb .readmore').stop().animate({opacity:1, margin: '0 -200px 0 0'},{queue:false,duration:200});
		jQuery('.slider #slider_next').stop().animate({opacity:1, bottom: '-50px'},{queue:false, duration: 50});
		jQuery('.slider #slider_prev').stop().animate({opacity:1, bottom: '-50px'},{queue:false, duration: 150});

	}
		jQuery('.small_thumbs li:not(.activeSlide) a').click(
	function () {
		jQuery('.small_thumbs li a').css('opacity', 1);
		jQuery(this).css('opacity', 1);
	});
		jQuery('.small_thumbs li:not(.activeSlide) a').hover(
	function () {
		jQuery(this).stop(true, true).animate({opacity: 0.7}, 300);
	}, function () {
		jQuery(this).stop(true, true).animate({opacity: 1}, 300);
		});

});
</script>
