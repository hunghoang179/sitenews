<?php
add_action('widgets_init','themeloy_ads300x250_load_widgets');


function themeloy_ads300x250_load_widgets(){
		register_widget("themeloy_ads300x250_widget");
}

class themeloy_ads300x250_widget extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	function themeloy_ads300x250_widget(){
		$widget_ops = array( 'classname' => 'themeloy_ads300x250_widget', 'description' => __( 'Ads 300x250 for sidebar widget' , 'tl_back') );
		$control_ops = array( 'id_base' => 'themeloy_ads300x250_widget' );
		$this->WP_Widget( 'themeloy_ads300x250_widget', __( 'Themeloy: Ads 300x250' , 'tl_back') ,  $widget_ops, $control_ops );
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget($args,$instance){
	extract($args);				
		$title = $instance['title'];
		$link = $instance['link'];
		$image = $instance['image'];
		?>

		<div class="widget">

<?php
		if($title) {
			echo $before_title.$title.$after_title;
		}
			?>				
		
			<div class="ads300x250-thumb">
				<a href="<?php if($link != ""){echo $link;}else{echo "#";} ?>">
					<img src="<?php if($image != ""){echo $image;}else{echo get_template_directory_uri()."/images/ads/300x250.png";} ?>" alt="" />
				</a>
			</div>
		</div>
		<?php
	
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['link'] = $new_instance['link'];
		$instance['image'] = $new_instance['image'];
		
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form($instance){
		?>
		<?php
			$defaults = array( 'title' => __( 'ADS 300x250' , 'tl_back'), 'link' => '' , 'image' => '' );
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>
		
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'tl_back'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e( 'Link Url:' , 'themeloy' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $instance['link']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e( 'Image Url:' , 'themeloy' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo $instance['image']; ?>" />
		</p>
		<?php

	}
}
?>