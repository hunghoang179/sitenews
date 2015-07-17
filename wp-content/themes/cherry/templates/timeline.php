<?php
/*
Template Name: Timeline
*/
?>
<?php get_header(); ?>

<div class="sidebar_content">
  <div class="box_inner author_box">
    <div class="news_box">
      <h2 class="news_box_title2">
        <?php the_title(); ?>
      </h2>
      <div class="clear"></div>
      <?php if(have_posts()) : while(have_posts()) : the_post('');?>
      <div class="entry_cont">
        <?php the_content(); ?>
      </div>
      <div class="timeline_content">
        <?php

			$where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'" );
			$join = apply_filters( 'getarchives_join', '' );
			$query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC";
			$key = md5($query);
			$cache = wp_cache_get( 'wp_get_archives' , 'general');
				if ( !isset( $cache[ $key ] ) ) {
				 $arcresults = $wpdb->get_results($query);
				 $cache[ $key ] = $arcresults;
				 wp_cache_set( 'wp_get_archives', $cache, 'general' );
				} else {
				 $arcresults = $cache[ $key ];
				}

				if ($arcresults) {foreach ( (array) $arcresults as $arcresult) { ?>
				<h3 class="timeline_title"><span><?php echo $arcresult->year ?></span></h3>
				<?php $query = new WP_Query( array( 'year' => $arcresult->year , 'posts_per_page' => -1 ) ); ?>
						<ul class="timeline_list">
						  <?php while ( $query->have_posts() ) : $query->the_post()?>
						  <li>
						    <span>
						     	<?php the_time(get_option('date_format')); ?>
						    </span>
						    <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
						    	<?php the_title(); ?>
						    </a>
						  </li>
						  <?php endwhile; ?>
						</ul>
				<?php } } ?>

      	</div>
      <?php endwhile; ?>
      <?php  else:  ?>
      <?php  endif; ?>
    </div>
  </div><!--//end author box-->
  <div class="clear"></div>

  <?php comments_template('', true); ?>

</div><!--//content-->
<div class="sidebar_wrapper">
<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Page Sidebar')){ }else { ?>
	<?php get_sidebar(); ?>
<?php } ?>
</div>
<?php get_footer(); ?>
