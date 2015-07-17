<?php get_header(); $bd_criteria_display = get_post_meta(get_the_ID(), 'bd_criteria_display', true); ?>

<div class="<?php $sidepos =  get_post_meta($post->ID, 'cherry_side_layout', true); echo ''.$sidepos;?>">

    <?php if(bdayh_get_option('article_meta_pagination_stick') == 1) { ?>
        <ul class="pp-prev-next-article">
            <li class="pp-next">
                <span class="pp-arrow-right"></span>
                <p class="pp-nn-t">Next article</p>
                <p class="pp-nn-b"><?php next_post_link( '%link', '%title' ); ?></p>
            </li>
            <li class="pp-prev">
                <span class="pp-arrow-prev"></span>
                <p class="pp-nn-t">Previous article</p>
                <p class="pp-nn-b"> <?php previous_post_link( '%link', '%title' ); ?></p>
            </li>
        </ul>
    <?php } ?>

    <div class="sidebar_content">
        <?php while ( have_posts() ) : the_post(); ?>
            <div <?php post_class(); ?>>
                <div class="box_inner">
                    <div class="news_box">

                    <?php if(bdayh_get_option('article_crumbs') == 1) { ?>
                        <div class="pp-breadcrumbs">
                            <?php bd_breadcrumbs() ?>
                        </div><!--//end breadcrumbs-->
                    <?php } ?>

                    <?php
                    if( get_post_meta( $post->ID, 'cherry_side_layout', true) == 'full_width' ){
                        $img_w = "958";
                        $img_h = "539";
                    } else {
                        $img_w = "623";
                        $img_h = "350";
                    }

                    /**
                     *
                     * Gallery
                     *
                     */
                    $ppslider_show = get_post_meta($post->ID, 'cherry_ppslider_show', true);
                        if($ppslider_show == 'on') {
                            pp_gallery( $post->ID );
                        }
                    /**
                     *
                     * Images
                     *
                     */
                    $thumb_show = get_post_meta($post->ID, 'cherry_thumb_show', true);
                        if($thumb_show == 'on') {
                            ?>
                            <?php
                                $thumb = bd_post_image('large');
                                $ntImage = aq_resize( $thumb, $img_w, $img_h, true );
                            ?>
                            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                                <div class="post_thumbnail bottom20">
                                    <a href="<?php echo bd_post_image('large'); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="prettyPhoto">
                                        <img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                    </a>
                                </div><!-- thumbnail/-->
                            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                                <div class="post_thumbnail bottom20">
                                    <a href="<?php echo bd_post_image('large'); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="prettyPhoto">
                                        <img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                    </a>
                                </div><!-- thumbnail/-->
                            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                                <div class="post_thumbnail bottom20">
                                    <a href="<?php echo bd_post_image('large'); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="prettyPhoto">
                                        <img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                    </a>
                                </div><!-- thumbnail/-->
                            <?php } else { if($ntImage != '') { ?>
                                <div class="post_thumbnail bottom20">
                                    <a href="<?php echo bd_post_image('large'); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="prettyPhoto">
                                        <img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                    </a>
                                </div><!-- thumbnail/-->
                            <?php } } ?>
                            <?php
                        }
                    /**
                     *
                     * Video
                     *
                     */
                    $article_type = get_post_meta($post->ID, 'cherry_article_type', true);
                    $type = get_post_meta($post->ID, 'cherry_video_type', true);
                    $id = get_post_meta($post->ID, 'cherry_video_id', true);
                    $vid_show = get_post_meta($post->ID, 'cherry_video_show', true);
                        if($vid_show == 'on') {
                            ?>
                            <?php if($type == 'youtube') { ?>
                                <div class="pp-video">
                                    <iframe width="628" height="340" src="http://www.youtube.com/embed/<?php echo $id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                                </div><!-- video/-->
                            <?php } elseif($type == 'vimeo') { ?>
                                <div class="pp-video">
                                    <iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" width="628" height="340" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                </div><!-- video/-->
                            <?php } elseif($type == 'daily') { ?>
                                <div class="pp-video">
                                    <iframe frameborder="0" width="628" height="340" src="http://www.dailymotion.com/embed/video/<?php echo $id ?>?logo=0"></iframe>
                                </div><!-- video/-->
                            <?php } ?>
                            <?php
                        }
                    ?>
                    <h1 class="news_box_title4 singlepost-titles-pp entry-title"><?php the_title(); ?></h1><!-- //title-->

                    <?php if(bdayh_get_option('article_meta_entry') == 1){ ?>
                        <div class="entry_meta">
                            <div class="left">
                                <?php if(bdayh_get_option('article_author_avatar') == 1) { ?>
                                    <div class="post_thumbnail"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 52 ) ); ?></div><!-- Avatar/-->
                                <?php } ?>
                                <div class="post-meta">
                                <?php if(bdayh_get_option('article_author') == 1) { ?>
                                    <span class="meta_author vcard author" itemprop='author' itemscope itemtype='http://schema.org/Person'><span class='fn' itemprop='name'><?php _e('Posted by :', 'bd'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>"><?php echo get_the_author() ?></a></span></span>
                                <?php } ?>

                                <?php if(bdayh_get_option('article_date') == 1){ ?>
                                    <span class="meta_date updated"><?php _e('Posted date :', 'bd'); ?><strong> <?php the_time(get_option('date_format')); ?></strong></span>
                                <?php } ?>

                                <?php if(bdayh_get_option('article_category') == 1){ ?>
                                    <span class="meta_cat"><strong><?php _e( 'In ' , 'bd' ); ?> <?php printf('%1$s', get_the_category_list( ', ' ) ); ?></strong></span>
                                <?php } ?>

                                <?php if(bdayh_get_option('article_comments') == 1){ ?>
                                    <span class="meta_comments"><?php comments_popup_link( __( '0', 'bd' ), __( '1 Comment', 'bd' ), __( '% Comments', 'bd' ) ); ?></span>
                                <?php } ?>
                            </div>
                            </div>
                        </div><!-- Meta/-->
                    <?php } ?>

                    <div class="inner_post single_article_content">
                        <?php if(bdayh_get_option('article_above_ads') == 1) { ?>
                            <div class="article_above_ads">
                                <?php if(bdayh_get_option('above_ads_code') != '') { ?>
                                    <?php echo stripslashes(bdayh_get_option('above_ads_code')); ?>
                                <?php } else { ?>
                                    <a href="<?php echo bdayh_get_option('above_ads_img_url'); ?>" title="<?php echo bdayh_get_option(__('above_ads_img_altname')); ?>">
                                        <img src="<?php echo bdayh_get_option('above_ads_img'); ?>" alt="<?php echo bdayh_get_option(__('above_ads_img_altname')); ?>" />
                                    </a>
                                <?php }?>
                            </div><!-- Ads/-->
                        <?php } ?>

                        <div class="pp-code post-page-entry-pp">
                            <?php
                            if($bd_criteria_display == 't'):
                                bd_post_rate();
                            endif;
                            ?>
                            <?php
                                the_content();
                                wp_link_pages(
                                    array(
                                        'before' => '<div class="page-pagination">',
                                        'after' => '</div>',
                                        'next_or_number' => 'next_and_number',
                                        'nextpagelink' => __('next page', 'bd'),
                                        'previouspagelink' => __('previous page', 'bd'),
                                        'pagelink' => '<span class="ss">%</span>',
                                        'echo' => 1
                                    )
                                );
                                wp_reset_query();
                            ?>
                            <?php
                            if($bd_criteria_display == 'bottom'):
                                bd_post_rate();
                            endif;
                            ?>
                        </div><!--//END Content-->

                        <?php if(bdayh_get_option('article_below_ads') == 1){ ?>
                            <div class="article_above_ads">
                                <?php if(bdayh_get_option('below_ads_code') != '') { ?>
                                    <?php echo stripslashes(bdayh_get_option('below_ads_code')); ?>
                                <?php } else { ?>
                                    <a href="<?php echo bdayh_get_option('below_ads_img_url'); ?>" title="<?php echo bdayh_get_option(__('below_ads_img_altname')); ?>">
                                        <img src="<?php echo bdayh_get_option('below_ads_img'); ?>" alt="<?php echo bdayh_get_option(__('below_ads_img_altname')); ?>" />
                                    </a>
                                <?php }?>
                            </div><!-- Ads/-->
                        <?php }?>

                    </div><!-- entry/-->

                    <?php if(bdayh_get_option('article_tags') == 1){ ?>
                        <div class="tags article_tags">
                            <span class="title"><?php _e('Tags','bd')?></span>
                            <div class="tagcloud">
                                <?php the_tags('','',''); ?>
                            </div>
                        </div><!-- tags/-->
                    <?php } ?>

                    <?php if(bdayh_get_option('article_socail') == 1){ ?>
                        <div class="postmeta_share">
                            <?php require BD_TM .'/post-social-shers.php'; ?>
                        </div><!-- Shear/-->
                    <?php } ?>
                    </div>
                </div>
            </div><!-- end post/-->
        <?php endwhile; ?>

            <?php if(bdayh_get_option('article_meta_pagination') == 1){ ?>
             <div class="bdayh_post_nav">
               <div class="bdayh_post_previous">
                 <?php previous_post_link( '%link', '%title' ); ?>
               </div>
               <div class="bdayh_post_next">
                 <?php next_post_link( '%link', '%title' ); ?>
               </div>
             </div>
            <?php } ?>

            <?php if(bdayh_get_option('article_author_box') == 1){ ?>
                <div class="box_inner author_box">
                  <div class="news_box">
                    <h2 class="news_box_title2">
                      <?php _e( 'About', 'bd' ) ?>
                      <span>
                      <?php the_author() ?>
                      </span></h2>
                    <?php bd_author_box(get_the_author_meta('ID')) ?>
                  </div>
                </div>
                <!--//end author box-->
            <?php } ?>

            <?php if(bdayh_get_option('article_related') == 1){ ?>
                <?php require BD_TM . '/related.php';?>
            <?php } ?>

            <?php if (comments_open() && !post_password_required()) { ?>
                <?php comments_template('', true); ?>
            <?php } ?>

    </div><!-- Content/-->

    <div class="sidebar_wrapper">
    <?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Article Sidebar')){ }else { ?>
        <?php get_sidebar(); ?>
    <?php } ?>
    </div>
</div>

<?php get_footer(); ?>