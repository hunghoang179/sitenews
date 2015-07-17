<div class="small-cat">
<?php if(bdayh_get_option('feature_smallcat1')) { ?>
	<?php query_posts(array('showposts' =>1, 'cat' => bdayh_get_option('feature_smallcat1') )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="sc-col">
	    <div class="sc-container">
	      <h2 class="sc-title"> <i class="icon"></i> <span><a href="<?php echo get_category_link(bdayh_get_option('feature_smallcat1')); ?>"><?php echo get_cat_name(bdayh_get_option('feature_smallcat1')); ?></a></span> <a href="<?php echo get_category_link(bdayh_get_option('feature_smallcat1')); ?>" class="sc-more">more</a> </h2>
	      <!-- sc-title/-->
	      <div class="sc-content">
	      	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 's', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	      		<?php
	      		$timthumb = bdayh_get_option('timthumb'); if($timthumb == true)
	      		{
	      		?>
				<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php
				}
				else
				{
				?>
				<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 300, 160, true );
					if($ntImage == ''){
						$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>

					<?php
					if (strpos(bd_post_image(), 'youtube'))
					{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'vimeo'))
                  	{
                  		?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'dailymotion'))
                  	{						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	else
                  	{
                  		?>
                  		<img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	?>

				<?php
				}
				?>

	      	<span><?php the_title();?></span>
	      	</a>
	      </div>
	      <!-- sc content/-->
	    </div>
	</div><!-- sc col/-->
	<?php endwhile; endif;?>
	<?php wp_reset_query(); ?>

<?php } ?>
<?php if(bdayh_get_option('feature_small_cat2')) { ?>
	<?php query_posts(array('showposts' =>1, 'cat' => bdayh_get_option('feature_small_cat2') )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="sc-col">
	    <div class="sc-container">
	      <h2 class="sc-title"> <i class="icon"></i> <span><a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat2')); ?>"><?php echo get_cat_name(bdayh_get_option('feature_small_cat2')); ?></a></span> <a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat2')); ?>" class="sc-more">more</a> </h2>
	      <!-- sc-title/-->
	      <div class="sc-content">
	      	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 's', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	      		<?php
	      		$timthumb = bdayh_get_option('timthumb'); if($timthumb == true)
	      		{
	      		?>
				<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php
				}
				else
				{
				?>
				<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 300, 160, true );
					if($ntImage == ''){
						$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>

					<?php
					if (strpos(bd_post_image(), 'youtube'))
					{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'vimeo'))
                  	{
                  		?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'dailymotion'))
                  	{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	else
                  	{
                  		?>
                  		<img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	?>

				<?php
				}
				?>

	      	<span><?php the_title();?></span>
	      	</a>
	      </div>
	      <!-- sc content/-->
	    </div>
	</div><!-- sc col/-->
	<?php endwhile; endif;?>
	<?php wp_reset_query(); ?>
<?php } ?>
<?php if(bdayh_get_option('feature_small_cat3')) { ?>
	<?php query_posts(array('showposts' =>1, 'cat' => bdayh_get_option('feature_small_cat3') )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="sc-col">
	    <div class="sc-container">
	      <h2 class="sc-title"> <i class="icon"></i> <span><a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat3')); ?>"><?php echo get_cat_name(bdayh_get_option('feature_small_cat3')); ?></a></span> <a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat3')); ?>" class="sc-more">more</a> </h2>
	      <!-- sc-title/-->
	      <div class="sc-content">
	      	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 's', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	      		<?php
	      		$timthumb = bdayh_get_option('timthumb'); if($timthumb == true)
	      		{
	      		?>
				<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php
				}
				else
				{
				?>
				<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 300, 160, true );
					if($ntImage == ''){
						$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>

					<?php
					if (strpos(bd_post_image(), 'youtube'))
					{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'vimeo'))
                  	{
                  		?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'dailymotion'))
                  	{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	else
                  	{
                  		?>
                  		<img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	?>

				<?php
				}
				?>

	      	<span><?php the_title();?></span>
	      	</a>
	      </div>
	      <!-- sc content/-->
	    </div>
	</div><!-- sc col/-->
	<?php endwhile; endif;?>
	<?php wp_reset_query(); ?>
<?php } ?>
<?php if(bdayh_get_option('feature_small_cat4')) { ?>
	<?php query_posts(array('showposts' =>1, 'cat' => bdayh_get_option('feature_small_cat4') )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="sc-col">
	    <div class="sc-container">
	      <h2 class="sc-title"> <i class="icon"></i> <span><a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat4')); ?>"><?php echo get_cat_name(bdayh_get_option('feature_small_cat4')); ?></a></span> <a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat4')); ?>" class="sc-more">more</a> </h2>
	      <!-- sc-title/-->
	      <div class="sc-content">
	      	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 's', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	      		<?php
	      		$timthumb = bdayh_get_option('timthumb'); if($timthumb == true)
	      		{
	      		?>
				<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php
				}
				else
				{
				?>
				<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 300, 160, true );
					if($ntImage == ''){
						$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>

					<?php
					if (strpos(bd_post_image(), 'youtube'))
					{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'vimeo'))
                  	{
                  		?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'dailymotion'))
                  	{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	else
                  	{
                  		?>
                  		<img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	?>

				<?php
				}
				?>

	      	<span><?php the_title();?></span>
	      	</a>
	      </div>
	      <!-- sc content/-->
	    </div>
	</div><!-- sc col/-->
	<?php endwhile; endif;?>
	<?php wp_reset_query(); ?>

<?php } ?>
<?php if(bdayh_get_option('feature_small_cat5')) { ?>
	<?php query_posts(array('showposts' =>1, 'cat' => bdayh_get_option('feature_small_cat5') )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="sc-col">
	    <div class="sc-container">
	      <h2 class="sc-title"> <i class="icon"></i> <span><a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat5')); ?>"><?php echo get_cat_name(bdayh_get_option('feature_small_cat5')); ?></a></span> <a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat5')); ?>" class="sc-more">more</a> </h2>
	      <!-- sc-title/-->
	      <div class="sc-content">
	      	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 's', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	      		<?php
	      		$timthumb = bdayh_get_option('timthumb'); if($timthumb == true)
	      		{
	      		?>
				<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php
				}
				else
				{
				?>
				<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 300, 160, true );
					if($ntImage == ''){
						$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>

					<?php
					if (strpos(bd_post_image(), 'youtube'))
					{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'vimeo'))
                  	{
                  		?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'dailymotion'))
                  	{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	else
                  	{
                  		?>
                  		<img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	?>

				<?php
				}
				?>

	      	<span><?php the_title();?></span>
	      	</a>
	      </div>
	      <!-- sc content/-->
	    </div>
	</div><!-- sc col/-->
	<?php endwhile; endif;?>
	<?php wp_reset_query(); ?>

<?php } ?>
<?php if(bdayh_get_option('feature_small_cat6')) { ?>
	<?php query_posts(array('showposts' =>1, 'cat' => bdayh_get_option('feature_small_cat6') )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="sc-col">
	    <div class="sc-container">
	      <h2 class="sc-title"> <i class="icon"></i> <span><a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat6')); ?>"><?php echo get_cat_name(bdayh_get_option('feature_small_cat6')); ?></a></span> <a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat6')); ?>" class="sc-more">more</a> </h2>
	      <!-- sc-title/-->
	      <div class="sc-content">
	      	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 's', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	      		<?php
	      		$timthumb = bdayh_get_option('timthumb'); if($timthumb == true)
	      		{
	      		?>
				<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php
				}
				else
				{
				?>
				<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 300, 160, true );
					if($ntImage == ''){
						$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>

					<?php
					if (strpos(bd_post_image(), 'youtube'))
					{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'vimeo'))
                  	{
                  		?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'dailymotion'))
                  	{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	else
                  	{
                  		?>
                  		<img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	?>

				<?php
				}
				?>

	      	<span><?php the_title();?></span>
	      	</a>
	      </div>
	      <!-- sc content/-->
	    </div>
	</div><!-- sc col/-->
	<?php endwhile; endif;?>
	<?php wp_reset_query(); ?>

<?php } ?>
<?php if(bdayh_get_option('feature_small_cat7')) { ?>
	<?php query_posts(array('showposts' =>1, 'cat' => bdayh_get_option('feature_small_cat7') )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="sc-col">
	    <div class="sc-container">
	      <h2 class="sc-title"> <i class="icon"></i> <span><a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat7')); ?>"><?php echo get_cat_name(bdayh_get_option('feature_small_cat7')); ?></a></span> <a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat7')); ?>" class="sc-more">more</a> </h2>
	      <!-- sc-title/-->
	      <div class="sc-content">
	      	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 's', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	      		<?php
	      		$timthumb = bdayh_get_option('timthumb'); if($timthumb == true)
	      		{
	      		?>
				<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php
				}
				else
				{
				?>
				<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 300, 160, true );
					if($ntImage == ''){
						$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>

					<?php
					if (strpos(bd_post_image(), 'youtube'))
					{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'vimeo'))
                  	{
                  		?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'dailymotion'))
                  	{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	else
                  	{
                  		?>
                  		<img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	?>

				<?php
				}
				?>

	      	<span><?php the_title();?></span>
	      	</a>
	      </div>
	      <!-- sc content/-->
	    </div>
	</div><!-- sc col/-->
	<?php endwhile; endif;?>
	<?php wp_reset_query(); ?>

<?php } ?>
<?php if(bdayh_get_option('feature_small_cat8')) { ?>
	<?php query_posts(array('showposts' =>1, 'cat' => bdayh_get_option('feature_small_cat8') )); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="sc-col">
	    <div class="sc-container">
	      <h2 class="sc-title"> <i class="icon"></i> <span><a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat8')); ?>"><?php echo get_cat_name(bdayh_get_option('feature_small_cat8')); ?></a></span> <a href="<?php echo get_category_link(bdayh_get_option('feature_small_cat8')); ?>" class="sc-more">more</a> </h2>
	      <!-- sc-title/-->
	      <div class="sc-content">
	      	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 's', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	      		<?php
	      		$timthumb = bdayh_get_option('timthumb'); if($timthumb == true)
	      		{
	      		?>
				<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=90&amp;w=100&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				<?php
				}
				else
				{
				?>
				<?php
					$thumb = bd_post_image('large');
					$ntImage = aq_resize( $thumb, 300, 160, true );
					if($ntImage == ''){
						$ntImage = BD_IMG .'/default_thumb.png';
					}
				?>

					<?php
					if (strpos(bd_post_image(), 'youtube'))
					{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'vimeo'))
                  	{
                  		?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	elseif (strpos(bd_post_image(), 'dailymotion'))
                  	{
						?>
                  		<img src="<?php echo bd_post_image('large'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	else
                  	{
                  		?>
                  		<img src="<?php echo $ntImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  	<?php
                  	}
                  	?>

				<?php
				}
				?>

	      	<span><?php the_title();?></span>
	      	</a>
	      </div>
	      <!-- sc content/-->
	    </div>
	</div><!-- sc col/-->
	<?php endwhile; endif;?>
	<?php wp_reset_query(); ?>

<?php } ?>
</div><!-- small cat/-->