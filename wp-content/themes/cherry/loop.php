<?php if ( ! have_posts() ) : ?>
<?php else : ?>
<div class="box_inner cat_box recent_posts_home" >
  <div class="news_box">
    <ul>
      <?php while ( have_posts() ) : the_post(); ?>

			<?php
				$a_display = bdayh_get_option('archives_display');
				$a_fullthumb = bdayh_get_option('archives_display_fullthumb');
				$a_content = bdayh_get_option('archives_display_content');
			?>

			<?php if ($a_display == 'excerpt') { ?>
                   <li class="first_news">
        	<div class="inner_post">
	          <h4 class="pp-title-blog boxestitles">
	          	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author"><?php the_title(); ?></a>
	          </h4>

	          <?php if(bdayh_get_option('blog_home_post_meta') == 1) { ?>
		          <div class="post_meta">

		          	<?php if(bdayh_get_option('blog_home_author_meta') == 1) { ?>
			            <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
			            <?php echo get_the_author() ?>
			            </a>
		            <?php } ?>

		            <?php if(bdayh_get_option('blog_home_data_meta') == 1) { ?>
			            <a class="date">
			            <?php the_time(get_option('date_format')); ?>
			            </a>
		            <?php } ?>

                      <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>

		          </div>
	          <?php } ?>

                <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="author">
                <?php
                    $timthumb = bdayh_get_option('timthumb');
                    if ($timthumb == true) {
                ?>
                <div class="pp-post-thumbnail-blog pp-img">
                    <img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=158&amp;w=158&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                </div>
                <?php } else { ?>
                <?php
                    $thumb = bd_post_image('large');
                    $ntImage = aq_resize( $thumb, 158, 158, true );
                ?>
                <div class="pp-post-thumbnail-blog pp-img">
                    <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                        <img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="158" height="158" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                        <img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="158" height="158" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                        <img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="158" height="158" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    <?php } else { if($ntImage != '') { ?>
                        <img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    <?php } } ?>
                </div>
                <?php } ?>
                </a>


	          <p>
	            <?php bd_excerpt() ?>
	            <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>"><?php _e('Read more','bd')?> <span> &raquo; </span></a>
	          </p>

      			<?php if(bdayh_get_option('blog_home_share_post_buttons') == 1){ ?>
       			<div class="full-social">
				<?php require BD_TM .'/social-shers.php'; ?>
				</div>
				<?php } ?>

		        </div>

		      </li>

		    <?php } elseif ($a_display == 'fullthumb') { ?>
                    <li class="first_news">
       		 <div class="inner_post">

	          <h4 class="pp-title-blog boxestitles">
	          	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	          </h4>

	          <?php if(bdayh_get_option('blog_home_post_meta') == 1) { ?>
		          <div class="post_meta">

		          	<?php if(bdayh_get_option('blog_home_author_meta') == 1) { ?>
			            <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
			            <?php echo get_the_author() ?>
			            </a>
		            <?php } ?>

		            <?php if(bdayh_get_option('blog_home_data_meta') == 1) { ?>
			            <a class="date">
			            <?php the_time(get_option('date_format')); ?>
			            </a>
		            <?php } ?>

		          </div>
	          <?php } ?>

	          <div class="fullthumb">
	            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		            <?php $timthumb = bdayh_get_option('timthumb');
		                if ($timthumb == true) { ?>
		            	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } else { ?>
		            <?php
					  	$thumb = bd_post_image('large');
					 	 $ntImage = aq_resize( $thumb, true );
								  if($ntImage == ''){
										$ntImage = BD_IMG .'/default_thumb.png';
									}
					?>
			            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
			            	<img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
			            	<img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
			            	<img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } else { ?>
			            	<img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
			            <?php } ?>
		            <?php } ?>
	            </a>
	          </div><!--//post_thumbnail-->

	          <p>
	            <?php bd_excerpt() ?>
	            <a class="pp-article-rread-more-blog" href="<?php the_permalink();?>"><?php _e('Read more','bd')?> <span> &raquo; </span></a>
	          </p>

     			<?php if(bdayh_get_option('blog_home_share_post_buttons') == 1){ ?>
       			<div class="full-social">
					<?php require BD_TM .'/social-shers.php'; ?>
				</div>
				<?php } ?>

				        </div>

				      </li>

		    <?php } elseif ($a_display == 'content') { ?>
                     <li class="first_news">
        		<div class="inner_post">

	          <h4 class="pp-title-blog boxestitles">
	          	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	          </h4>

	          <?php if(bdayh_get_option('blog_home_post_meta') == 1) { ?>
		          <div class="post_meta">

		          	<?php if(bdayh_get_option('blog_home_author_meta') == 1) { ?>
			            <a class="author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'bd' ), get_the_author() ) ?>">
			            <?php echo get_the_author() ?>
			            </a>
		            <?php } ?>

		            <?php if(bdayh_get_option('blog_home_data_meta') == 1) { ?>
			            <a class="date">
			            <?php the_time(get_option('date_format')); ?>
			            </a>
		            <?php } ?>

		          </div>
	          <?php } ?>

				<div class="pp-code post-page-entry-pp">
					<?php the_content(); ?>
					</div><!--//END Content-->

				    <?php if(bdayh_get_option('blog_home_share_post_buttons') == 1){ ?>
	         			<div class="full-social">
							<?php require BD_TM .'/social-shers.php'; ?>
					</div>
					<?php } ?>

		        </div>
		      </li>
		    <?php } else { ?>

		    <?php } ?>
      <?php endwhile;?>
    </ul>
  </div>
</div><!--//news_box-->
<?php endif; ?>