<div class="bd-2col box_inner cat_box list_posts_box column2 posts-v3 <?php if($GLOBALS['repeat']&10){}else{echo 'last_column';} ?>" >
  <div class="news_box">
    <h3 class="news_box_title2">
      <a href="<?php echo get_category_link($GLOBALS['bd_cat_id']); ?> ">
      <?php echo get_cat_name($GLOBALS['bd_cat_id']); ?>
      </a>
    </h3>
    <ul>
      <?php query_posts(array('showposts' => 1, 'cat' => $GLOBALS['bd_cat_id']  )); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="first_news">
        <div class="inner_post">
          <div class="post_thumbnail">

            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
	            <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
	            	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=233&amp;w=415&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	            <?php } else { ?>
	            <?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 415, 233, true );
					if($ntImage == '')
						{
						$ntImage = BD_IMG .'/default_thumb.png';
						}
					?>
		            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
		            	<img src="<?php echo bd_post_image('large'); ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } else { ?>
		            	<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } ?>

	            <?php } ?>
            </a>
          </div><!--//post_thumbnail-->
          <h2>
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
            	<?php the_title();?>
            </a>


          </h2>
          <div class="post_meta">
            <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
            <?php echo get_the_author() ?>
            </a>
            <a class="date"><?php the_time(get_option('date_format')); ?></a>
              <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
          </div>
          <p>
          <?php bd_excerpt_home() ?>
          </p>
        </div>
      </li>
      <?php endwhile; endif;?>
      <?php wp_reset_query(); ?>

      <?php query_posts(array('showposts' => $GLOBALS['bd_total_posts'],'offset'=>1, 'cat' => $GLOBALS['bd_cat_id']  )); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <li class="posts-list-small">
        <div class="inner_post">
            <?php
            $img_w      = 55;
            $img_h      = 55;
            $thumb      = bd_post_image('full');
            $image      = aq_resize( $thumb, $img_w, $img_h, true );
            $alt        = get_the_title();
            $link       = get_permalink();
            if (strpos(bd_post_image(), 'youtube'))
            {
                echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
            }
            elseif (strpos(bd_post_image(), 'vimeo'))
            {
                echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
            }
            elseif (strpos(bd_post_image(), 'dailymotion'))
            {
                echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
            }
            else
            {
                if($image) :
                    echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                endif;
            }
            ?>
          <h2>
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
            <?php the_title();?>
            </a>
          </h2>
          <div class="post_meta">
            <a class="date">
            <?php the_time(get_option('date_format')); ?>
            </a>
              <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
          </div>
        </div>
      </li>
      <?php endwhile; endif;?>
      <?php wp_reset_query(); ?>
    </ul>
  </div>
</div>