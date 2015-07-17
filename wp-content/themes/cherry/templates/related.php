<div class="box_inner cat_box recent_bd" >
    <div class="news_box">
        <h3 class="news_box_title4"><?php _e('Related posts', 'bd'); ?></h3>
        <ul class="<?php echo bdayh_get_option('related_style'); ?>">
        <?php if (bdayh_get_option('related_type') == 'tags' ) { ?>
            <?php
                global $post;
                $tags = wp_get_post_tags($post->ID);
                if ($tags) :
                $tag_ids = array();
                foreach($tags as $individual_tag){ $tag_ids[] = $individual_tag->term_id;}
                $args=array(
                    'tag__in' => $tag_ids,
                    'post__not_in' => array($post->ID),
                    'showposts'=> bdayh_get_option('article_related_numb'),
                    'ignore_sticky_posts'=>1
                );
                query_posts($args);
            ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php if(bdayh_get_option('related_style') == 'images') { ?>
                    <li class="related_item">
                        <?php if(bd_post_image() == false) {} else { ?>
                            <?php
                                $thumb = bd_post_image('large');
                                $ntImage = aq_resize( $thumb, 67, 67, true );
                            ?>
                            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                                <div class="post_thumbnail">
                                    <a href="<?php the_permalink();?>"  rel="bookmark">
                                        <img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>"  />
                                    </a>
                                </div><!-- thumbnail/-->
                            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                                <div class="post_thumbnail">
                                    <a href="<?php the_permalink();?>"  rel="bookmark">
                                        <img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>"  />
                                    </a>
                                </div><!-- thumbnail/-->
                            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                                <div class="post_thumbnail">
                                    <a href="<?php the_permalink();?>"  rel="bookmark">
                                        <img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>"  />
                                    </a>
                                </div><!-- thumbnail/-->
                            <?php } else { if($ntImage != '') { ?>
                                <div class="post_thumbnail">
                                    <a href="<?php the_permalink();?>"  rel="bookmark">
                                        <img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>"  />
                                    </a>
                                </div><!-- thumbnail/-->
                            <?php } } ?>
                        <?php } ?>
                        <h3><a href="<?php the_permalink();?>"  ><?php echo short_title(' ... ', 8); ?></a></h3>
                        <p class="date"><?php the_time(get_option('date_format')); ?></p>
                    </li>
                <?php } else { ?>
                    <li class="related_list">
                        <h3><a href="<?php the_permalink(); ?>"><span><?php _e('&raquo; ', 'bd'); ?></span><?php the_title(); ?></a></h3>
                    </li>
                <?php } ?>
                    <?php endwhile; ?>
                <?php  else:  ?>
                    <p><?php echo __('There is no related posts.', 'bd'); ?></p>
                <?php endif; ?>
                <?php wp_reset_query(); ?>

        <?php } else { ?>

        <?php
            global $post;
            $cats = get_the_category($post->ID);
            if ($cats) :
            $cat_ids = array();
            foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat->cat_ID;}
            $args=array(
                'category__in' => $cat_ids,
                'post__not_in' => array($post->ID),
                'showposts'=>bdayh_get_option('article_related_numb'),
                'ignore_sticky_posts'=>1
            );
            query_posts($args);
        ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php if(bdayh_get_option('related_style') == 'images') { ?>
                <li class="related_item">
                    <?php if(bd_post_image() == false) {} else { ?>
                        <?php
                            $thumb = bd_post_image('large');
                            $ntImage = aq_resize( $thumb, 67, 67, true );
                        ?>
                        <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                            <div class="post_thumbnail">
                                <a href="<?php the_permalink();?>"  rel="bookmark">
                                    <img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>"  />
                                </a>
                            </div><!-- thumbnail/-->
                        <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                            <div class="post_thumbnail">
                                <a href="<?php the_permalink();?>"  rel="bookmark">
                                    <img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>"  />
                                </a>
                            </div><!-- thumbnail/-->
                        <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                            <div class="post_thumbnail">
                                <a href="<?php the_permalink();?>"  rel="bookmark">
                                    <img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>"  />
                                </a>
                            </div><!-- thumbnail/-->
                        <?php } else { if($ntImage != '') { ?>
                            <div class="post_thumbnail">
                                <a href="<?php the_permalink();?>"  rel="bookmark">
                                    <img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>"  />
                                </a>
                            </div><!-- thumbnail/-->
                        <?php } } ?>
                    <?php } ?>
                    <h3><a href="<?php the_permalink();?>"><?php echo short_title(' ... ', 8); ?></a></h3>
                    <p class="date"><?php the_time(get_option('date_format')); ?></p>
              </li>
            <?php } else { ?>
                <li class="related_list">
                    <h3><a href="<?php the_permalink(); ?>"><span><?php _e('&raquo; ', 'bd'); ?></span><?php the_title(); ?></a></h3>
                </li>
            <?php } ?>
            <?php endwhile; ?>
            <?php  else:  ?>
                <p><?php echo __('There is no related posts.', 'bd'); ?></p>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

      <?php } ?>
    </ul>
  </div>
</div>