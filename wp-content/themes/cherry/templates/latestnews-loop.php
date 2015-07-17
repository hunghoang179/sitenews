<div class="box_inner cat_box recent_posts_home" >
  <div class="news_box">
    <ul>
      <?php query_posts(array ( 'paged' => get_query_var( 'paged' ), )); ?>
      <?php if(have_posts()) : while(have_posts()) : the_post('');?>
      <li class="first_news">
        <div class="inner_post">
          <div class="post_thumbnail">

            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				 <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
				 	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=160&amp;w=261&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				 <?php } else { ?>
				 <?php
						$thumb = bd_post_image('large');
						$ntImage = aq_resize( $thumb, 261, 160, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
					  ?>
					  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
					  	<img src="<?php echo bd_post_image('large'); ?>" width="261" height="160" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
					  	<img src="<?php echo bd_post_image('large'); ?>" width="261" height="160" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
					  	<img src="<?php echo bd_post_image('large'); ?>" width="261" height="160" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					  <?php } else { ?>
					  	<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
					  <?php } ?>
				 <?php } ?>
            </a>
          </div><!--//post_thumbnail-->
          <h2>
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
            	<?php the_title();?>
            </a>
          </h2>
          <div class="post_meta">
            <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
            	<?php echo get_the_author() ?>
            </a>
            <a class="date">
            	<?php the_time(get_option('date_format')); ?>
            </a>
          </div>
          <p>
            <?php the_excerpt_max_charlength('160'); ?>
          </p>
        </div>
      </li>
      <?php endwhile; endif;?>
      <?php wp_reset_query(); ?>
    </ul>
  </div>
</div><!--//news_box-->
<?php if ($wp_query->max_num_pages > 1) bd_pagenavi(); ?>
