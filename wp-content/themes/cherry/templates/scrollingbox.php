<div class="box_inner scrolling_box">
  <div class="news_box">
    <h3 class="news_box_title2">
      <?php echo $v['title']; ?>
    </h3>
    <div class="scrolling_box_content" id="scrolling_box_content<?php echo $GLOBALS['k']; ?>">
      <div class="items">
        <?php query_posts(array('showposts' => $GLOBALS['bd_total_posts'],  'cat' => $GLOBALS['bd_cat_id'])); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="item">
          <div class="post_thumbnail">

            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	            <?php $timthumb = bdayh_get_option('timthumb'); if($timthumb == true) { ?>
	            	<img src="<?php echo BD_URI ?>/timthumb.php?src=<?php echo bd_post_image('large'); ?>&amp;h=111&amp;w=138&amp;zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	            <?php } else { ?>
	            <?php
	                $thumb = bd_post_image('large');
	                $ntImage = aq_resize( $thumb, 138, 111, true );
					if($ntImage == '')
						{
							$ntImage = BD_IMG .'/default_thumb.png';
						}
	                ?>
		            <?php if (strpos(bd_post_image(), 'youtube')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="138" height="111" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="138" height="111" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
		            	<img src="<?php echo bd_post_image('large'); ?>" width="138" height="111" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } else { ?>
		            	<img src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		            <?php } ?>
	            <?php } ?>
            </a>
          </div><!--//post_thumbnail-->
          <h3>
            <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" >
            	<?php echo short_title(' ... ', 8); ?>
            </a>
          </h3>
          <p class="date">
            <?php the_time(get_option('date_format')); ?>
          </p>
            <span class="widget post-rat"><?php echo bd_wp_post_rate(); ?></span>
        </div>
        <?php endwhile; endif; ?>
        <?php wp_reset_query(); ?>
      </div>
    </div>
    <div class="nav" id="nav_<?php echo $GLOBALS['k']; ?>"></div>
  </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
var vids = $("#scrolling_box_content<?php echo $GLOBALS['k']; ?> .items .item");
for(var i = 0; i < vids.length; i+=4) {
vids.slice(i, i+4).wrapAll('<div class="scrolling_items"></div>');
}
$('#scrolling_box_content<?php echo $GLOBALS['k']; ?> .items').cycle({
  fx: 'scrollHorz',
  easing: 'easeOutBack',
  speed: 300,
  timeout: 5000,
  pause: 1,
  cleartype: true,
  cleartypeNoBg: true,
  pager: '#nav_<?php echo $GLOBALS['k']; ?>',
});
});
</script>
