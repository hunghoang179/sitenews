<?php
add_action( 'widgets_init', 'themeloy_rec_register_widgets' );

function themeloy_rec_register_widgets() {
	register_widget( 'themeloy_rec_posts_widget' );
}

class themeloy_rec_posts_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
			
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'post_list_widget', 
			'description' => __('Display a list of recent post entries from choosing categories.', 'tl_back')
		);
    	parent::__construct('rec-recent-posts', __('Themeloy: Recently Posts', 'tl_back'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? 'Recently Articles' : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number']))
            $number = 6;
        if (!$cats = $instance["cats"])
            $cats = '';


        $post_cat_args = array(
            'showposts' => $number,
            'category__in' => $cats,
        );

        $post_cat_widget = null;
        $post_cat_widget = new WP_Query($post_cat_args);


        echo $before_widget;


        echo $before_title;
        echo $instance["title"];
        echo $after_title;

        // Post list in widget
		echo '<div class="widget_container">';
        echo '<ul class="post_list">';

        while ($post_cat_widget->have_posts()) {
            $post_cat_widget->the_post();
			$post_id = get_the_ID();
            ?>
           <li class="clearfix">	
                <div class="img_thumbnail feature-item">
				<?php				
                echo '<a class="img_thumbnail" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';?>
<?php if ( has_post_thumbnail()) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'small-feature' );?>
        <img src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/small-feature.jpg'.'">';} ?>	
				
              </a>
              <?php echo themeloy_post_type(); ?>
         </div>
                <div class="list_desc">
                     <h4 class="list_title"><a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
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


            </li>
            <?php
        }

        wp_reset_query();

        echo "</ul>\n";
		echo "</div>\n";
        echo $after_widget;
    }

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = $new_instance['cats'];
		$instance['number'] = absint($new_instance['number']);
		 
        return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
                        
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'tl_back'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        
         <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Select categories to include in the recent posts list:', 'tl_back');?> 
            
                <?php
                   $categories=  get_categories('hide_empty=0');
                     echo "<br/>";
                     foreach ($categories as $cat) {
                    $option = '<input type="checkbox" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
              
			        if (isset($instance['cats'])) {
                        foreach ($instance['cats'] as $cats) {
                            if ($cats == $cat->term_id) {
                                $option = $option . ' checked="checked"';
                            }
                        }
                    }
			  
                    $option .= ' value="' . $cat->term_id . '" />';
                    $option .= '&nbsp;';
                    $option .= $cat->cat_name;
                    $option .= '<br />';
                    echo $option;
                }
                    
                    ?>
            </label>
        </p>
        
<?php
	}
}
?>
