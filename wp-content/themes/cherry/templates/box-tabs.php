<div class="box_inner box_tabs cat_box">
  <div class="news_box">
    <ol class="box_tabs_nav">
      <?php if(bdayh_get_option('feature_tabs_cat1')){ ?>
      <li class="active">
        <a href="#item1">
          <?php echo get_cat_name(bdayh_get_option('feature_tabs_cat1'));?>
        </a>
      </li>
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat2')){ ?>
      <li>
        <a href="#item2">
          <?php echo get_cat_name(bdayh_get_option('feature_tabs_cat2'));?>
        </a>
      </li>
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat3')){ ?>
      <li>
        <a href="#item3">
          <?php echo get_cat_name(bdayh_get_option('feature_tabs_cat3'));?>
        </a>
      </li>
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat4')){ ?>
      <li>
        <a href="#item4">
          <?php echo get_cat_name(bdayh_get_option('feature_tabs_cat4'));?>
        </a>
      </li>
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat5')){ ?>
      <li>
        <a href="#item5">
          <?php echo get_cat_name(bdayh_get_option('feature_tabs_cat5'));?>
        </a>
      </li>
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat6')){ ?>
      <li>
        <a href="#item6">
          <?php echo get_cat_name(bdayh_get_option('feature_tabs_cat6'));?>
        </a>
      </li>
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat7')){ ?>
      <li>
        <a href="#item7">
          <?php echo get_cat_name(bdayh_get_option('feature_tabs_cat7'));?>
        </a>
      </li>
      <?php } ?>
    </ol>
    <div class="box_tabs_content">
      <?php if(bdayh_get_option('feature_tabs_cat1')){ ?>
      <div class="box_tabs_container" id="item1">
        <ul>
          <?php query_posts(array('showposts' =>5, 'cat' => bdayh_get_option('feature_tabs_cat1') )); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="first_news">
            <div class="inner_post">
              <div class="first-post-thumbnail-tabs">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
                  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
                  <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <?php
	                    $thumb = bd_post_image('large');
	                    $ntImage = aq_resize( $thumb, 100, 90, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
	                    ?>
                  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <img src="<?php echo $ntImage; ?>" width="100" height="90"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                  <?php } ?>
                </a>
              </div>
              <!--//post_thumbnail-->
              <h2 class="boxestitles">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
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
                  <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
              </div>
              <p>
                <?php the_excerpt_max_charlength('160'); ?>
                <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>">
                  <?php _e('Read more','bd')?>
                  <span>
                  &raquo;
                  </span>
                </a>
              </p>
            </div>
          </li>
          <?php endwhile; endif;?>
          <?php wp_reset_query(); ?>
        </ul>
      </div>
      <!--//end tab1-->
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat2')){ ?>
      <div class="box_tabs_container" id="item2">
        <ul>
          <?php query_posts(array('showposts' =>5, 'cat' => bdayh_get_option('feature_tabs_cat2') )); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="first_news">
            <div class="inner_post">
              <div class="first-post-thumbnail-tabs">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
                  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
                  <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <?php
	                    $thumb = bd_post_image('large');
	                    $ntImage = aq_resize( $thumb, 100, 90, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
	                    ?>
                  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <img src="<?php echo $ntImage; ?>" width="100" height="90"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                  <?php } ?>
                </a>
              </div>
              <!--//post_thumbnail-->
              <h2 class="boxestitles">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
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
                  <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
              </div>
              <p>
                <?php the_excerpt_max_charlength('160'); ?>
                <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>">
                  <?php _e('Read more','bd')?>
                  <span>
                  &raquo;
                  </span>
                </a>
              </p>
            </div>
          </li>
          <?php endwhile; endif;?>
          <?php wp_reset_query(); ?>
        </ul>
      </div>
      <!--//end tab2-->
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat3')){ ?>
      <div class="box_tabs_container" id="item3">
        <ul>
          <?php query_posts(array('showposts' =>5, 'cat' => bdayh_get_option('feature_tabs_cat3') )); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="first_news">
            <div class="inner_post">
              <div class="first-post-thumbnail-tabs">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
                  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
                  <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <?php
	                    $thumb = bd_post_image('large');
	                    $ntImage = aq_resize( $thumb, 100, 90, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
	                    ?>
                  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <img src="<?php echo $ntImage; ?>" width="100" height="90"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                  <?php } ?>
                </a>
              </div>
              <!--//post_thumbnail-->
              <h2 class="boxestitles">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
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
                  <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
              </div>
              <p>
                <?php the_excerpt_max_charlength('160'); ?>
                <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>">
                  <?php _e('Read more','bd')?>
                  <span>
                  &raquo;
                  </span>
                </a>
              </p>
            </div>
          </li>
          <?php endwhile; endif;?>
          <?php wp_reset_query(); ?>
        </ul>
      </div>
      <!--//end tab3-->
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat4')){ ?>
      <div class="box_tabs_container" id="item4">
        <ul>
          <?php query_posts(array('showposts' =>5, 'cat' => bdayh_get_option('feature_tabs_cat4') )); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="first_news">
            <div class="inner_post">
              <div class="first-post-thumbnail-tabs">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
                  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
                  <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <?php
	                    $thumb = bd_post_image('large');
	                    $ntImage = aq_resize( $thumb, 100, 90, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
	                    ?>
                  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <img src="<?php echo $ntImage; ?>" width="100" height="90"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                  <?php } ?>
                </a>
              </div>
              <!--//post_thumbnail-->
              <h2 class="boxestitles">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
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
                  <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
              </div>
              <p>
                <?php the_excerpt_max_charlength('160'); ?>
                <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>">
                  <?php _e('Read more','bd')?>
                  <span>
                  &raquo;
                  </span>
                </a>
              </p>
            </div>
          </li>
          <?php endwhile; endif;?>
          <?php wp_reset_query(); ?>
        </ul>
      </div>
      <!--//end tab4-->
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat5')){ ?>
      <div class="box_tabs_container" id="item5">
        <ul>
          <?php query_posts(array('showposts' =>5, 'cat' => bdayh_get_option('feature_tabs_cat5') )); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="first_news">
            <div class="inner_post">
              <div class="first-post-thumbnail-tabs">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
                  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
                  <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <?php
	                    $thumb = bd_post_image('large');
	                    $ntImage = aq_resize( $thumb, 100, 90, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
	                    ?>
                  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <img src="<?php echo $ntImage; ?>" width="100" height="90"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                  <?php } ?>
                </a>
              </div>
              <!--//post_thumbnail-->
              <h2 class="boxestitles">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
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
                  <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
              </div>
              <p>
                <?php the_excerpt_max_charlength('160'); ?>
                <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>">
                  <?php _e('Read more','bd')?>
                  <span>
                  &raquo;
                  </span>
                </a>
              </p>
            </div>
          </li>
          <?php endwhile; endif;?>
          <?php wp_reset_query(); ?>
        </ul>
      </div>
      <!--//end tab5-->
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat6')){ ?>
      <div class="box_tabs_container" id="item6">
        <ul>
          <?php query_posts(array('showposts' =>5, 'cat' => bdayh_get_option('feature_tabs_cat6') )); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="first_news">
            <div class="inner_post">
              <div class="first-post-thumbnail-tabs">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
                  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
                  <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <?php
	                    $thumb = bd_post_image('large');
	                    $ntImage = aq_resize( $thumb, 100, 90, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
	                    ?>
                  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <img src="<?php echo $ntImage; ?>" width="100" height="90"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                  <?php } ?>
                </a>
              </div>
              <!--//post_thumbnail-->
              <h2 class="boxestitles">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
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
                  <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
              </div>
              <p>
                <?php the_excerpt_max_charlength('160'); ?>
                <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>">
                  <?php _e('Read more','bd')?>
                  <span>
                  &raquo;
                  </span>
                </a>
              </p>
            </div>
          </li>
          <?php endwhile; endif;?>
          <?php wp_reset_query(); ?>
        </ul>
      </div>
      <!--//end tab6-->
      <?php } ?>
      <?php if(bdayh_get_option('feature_tabs_cat7')){ ?>
      <div class="box_tabs_container" id="item7">
        <ul>
          <?php query_posts(array('showposts' =>5, 'cat' => bdayh_get_option('feature_tabs_cat7') )); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="first_news">
            <div class="inner_post">
              <div class="first-post-thumbnail-tabs">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
                  <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
                  <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <?php
	                    $thumb = bd_post_image('large');
	                    $ntImage = aq_resize( $thumb, 100, 90, true );
						if($ntImage == '')
							{
								$ntImage = BD_IMG .'/default_thumb.png';
							}
	                    ?>
                  <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                  <img src="<?php echo bd_post_image('large'); ?>" width="100" height="90" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } else { ?>
                  <img src="<?php echo $ntImage; ?>" width="100" height="90"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                  <?php } ?>
                </a>
              </div>
              <!--//post_thumbnail-->
              <h2 class="boxestitles">
                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
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
                  <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
              </div>
              <p>
                <?php the_excerpt_max_charlength('160'); ?>
                <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>">
                  <?php _e('Read more','bd')?>
                  <span>
                  &raquo;
                  </span>
                </a>
              </p>
            </div>
          </li>
          <?php endwhile; endif;?>
          <?php wp_reset_query(); ?>
        </ul>
      </div>
      <!--//end tab7-->
      <?php } ?>
    </div>
  </div>
</div>
<script type="text/javascript">
jQuery(".box_tabs_container").hide();
jQuery("ol.box_tabs_nav li:first").addClass("active").show();
jQuery(".box_tabs_container:first").show();
jQuery("ol.box_tabs_nav li").click(function() {
	jQuery("ol.box_tabs_nav li").removeClass("active");
	jQuery(this).addClass("active");
	jQuery(".box_tabs_container").hide();
	var activeTab = jQuery(this).find("a").attr("href");
	jQuery(activeTab).fadeIn();
	return false;
});
</script>