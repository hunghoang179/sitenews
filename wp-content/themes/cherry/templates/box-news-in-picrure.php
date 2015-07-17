<div class="box_inner posts-vpic">
  <div class="news_box news_pic_home">
    <h3 class="news_box_title2">
      <a href="<?php echo get_category_link($GLOBALS['bd_cat_id']); ?> ">
      	<?php echo get_cat_name($GLOBALS['bd_cat_id']);?>
      </a>
    </h3>
    <ul>
      <?php query_posts(array('showposts' => 1, 'cat' => $GLOBALS['bd_cat_id']  )); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="frist_pic">
        <div>
          <div class="post_thumbnail">

            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
	            <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
	            	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=170&amp;w=338&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	            <?php } else { ?>
	            <?php
		            $thumb = bd_post_image('large');
		            $ntImage = aq_resize( $thumb, 338, 170, true );
					if($ntImage == '')
						{
						$ntImage = BD_IMG .'/default_thumb.png';
						}
		            ?>

		            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="338" height="170" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="338" height="170" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="338" height="170" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } else { ?>
		            	<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } ?>

	            <?php } ?>

            </a>
          </div><!--//post_thumbnail-->
        </div>
      </li>
      <?php endwhile; ?>
      <?php  endif; ?>
      <?php query_posts(array('showposts' => $GLOBALS['bd_total_posts'],'offset'=>1, 'cat' => $GLOBALS['bd_cat_id']  )); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li>
        <div>
          <div class="post_thumbnail">
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
	            <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
	            	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=54&amp;w=54&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	            <?php } else { ?>
	            <?php
                    $thumb = bd_post_image('large');
                    $ntImage = aq_resize( $thumb, 54, 54, true );
					if($ntImage == '')
						{
							$ntImage = BD_IMG .'/default_thumb.png';
						}
                    ?>

		            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="54" height="54" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="54" height="54" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="54" height="54" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } else { ?>
		            	<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } ?>

	            <?php } ?>
            </a>
          </div><!--//post_thumbnail-->
        </div>
      </li>
      <?php endwhile; ?>
      <?php  endif; ?>
    </ul>
  </div>
</div>
