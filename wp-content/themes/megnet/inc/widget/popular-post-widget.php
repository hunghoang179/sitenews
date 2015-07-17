<?php
add_action( 'widgets_init', 'themeloy_popular_post_widget' );

function themeloy_popular_post_widget() {
	register_widget( 'Themeloy_Popular_Post' );
}


class themeloy_popular_post extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function  themeloy_popular_post() {
		$widget_ops = array( 'classname' => 'post_list_widget', 'description' => __( 'A widget that show popular posts', 'tl_back' ) );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'themeloy-popularpost-widget' );
		$this->WP_Widget( 'themeloy-popularpost-widget', __('Themeloy: Popular Posts', 'tl_back'), $widget_ops, $control_ops );
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('Popular Posts', $instance['title'] );
		$num_posts = $instance['num_posts'];
		echo $before_widget;
		if ( $title ){ 
			echo $before_title . $title . $after_title; 
		}

			$recent_posts = new WP_Query(array(
				'showposts' => $num_posts,
				'orderby' => 'comment_count',
			));
			
			?>
				<div class="widget_container">
				<ul class="post_list">
			<?php while($recent_posts->have_posts()){ 
			$recent_posts->the_post();
			$post_id = get_the_ID(); 
			?>
            
			<li class="clearfix">		
				<div class="img_thumbnail feature-item">	
	<?php echo '<a class="img_thumbnail" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';?>
<?php if ( has_post_thumbnail()) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'small-feature' );?>
        <img src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/small-feature.jpg'.'">';} ?>		 
                <?php echo themeloy_post_type(); ?>
               </a>
			</div>
				<div class="list_desc">
                <h4 class="list_title"><a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
                </a></h4>
                                   <?php echo themeloy_post_meta(get_the_ID());?>
                    
							<?php 
							    $post_review = get_post_custom_values('enable_review_themeloy_select', $post_id); 
								$post_review = ($post_review[0] != '') ? $post_review[0] : of_get_option('enable_all_review');
								$total_review = absint(themeloy_get_total_review($post_id));
							    if($post_review == '1'){
							   ?>
<div class="ratings">
<div class="rating-box">
<div class="rating" style="width:<?php echo themeloy_get_total_review(get_the_ID()); ?>%"></div>
</div>
</div>
 <?php }?> 
                    
				</div>	
	<div class="clear"></div>
	</li>	
		<?php } ?>
</ul>		
</div>			
<?php
		echo $after_widget;
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_posts'] = $new_instance['num_posts'];
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form($instance)
	{
		$defaults = array('title' => __( 'Popular Posts', 'tl_back' ) , 'num_posts' => 4, 'show_comments' => 'on');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'tl_back' ) ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e( 'Number of posts:', 'tl_back' ); ?></label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name('num_posts'); ?>" type="text" value="<?php echo $instance['num_posts']; ?>" />
		</p>		
	<?php 
	}
}
?>