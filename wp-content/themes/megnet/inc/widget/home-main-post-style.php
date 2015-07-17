<?php
add_action('widgets_init', 'themeloy_register_home_main_post_style');

function themeloy_register_home_main_post_style() {
    register_widget('themeloy_home_main_post_style');
}

class themeloy_home_main_post_style extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

    function __construct() {
        $widget_ops = array(
            'classname' => 'main_post_style clearfix',
            'description' => __('Display main post image style.', 'tl_back')
        );
        parent::__construct('home-main-post-style', __('Themeloy: main post images', 'tl_back'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
    function widget($args, $instance) {

        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Posts' : $instance['title'], $instance, $this->id_base);
    
     
		
        if (!$number = absint($instance['number']))
            $number = 4;

        if (!$cats = $instance["cats"])
            $cats = '';

        // array to call recent posts.

        $themeloy_args = array(
            'showposts' => $number,
            'category__in' => $cats,
        );

        $themeloy_widget = null;
        $themeloy_widget = new WP_Query($themeloy_args);

        echo $before_widget;

        // Widget title

        echo $before_title;
        echo $instance["title"];
        echo $after_title;

        // Post list in widget

        $i = 0;?>
		<div class="widget_container">
        <?php
        while ($themeloy_widget->have_posts()) {
            $themeloy_widget->the_post();
			$post_id = get_the_ID();
            $i++;
            $thumb = themeloy_get_thumbnail(get_the_ID());
            if ($i == 1) {
                ?>   

                   <div class="main_post">
    <div class="image_post feature-item">
                   
                     <a href="<?php the_permalink(); ?>"> 
<?php if ( has_post_thumbnail()) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'main-square' );?>
        <img src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/main-square.jpg'.'">';} ?>	
                     </a>
          
                      <span class="caption">
                      <?php $post_cat = get_post_custom_values('cat_themeloy_select', get_the_ID());
		 $post_cat = ($post_cat[0] != '') ? $post_cat[0] : of_get_option('blog_category_post');
		 if($post_cat == '1'){echo '<p class="cat-slider">'; echo the_category(', ').'</p>';}?>
                      <a href="<?php the_permalink(); ?>"> <span><?php the_title(); ?></span></a> </span>
					<?php echo themeloy_post_type(); ?>
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
                   
<?php echo themeloy_post_meta(get_the_ID());?>
                
 <p>
<?php echo themeloy_short_title(300, get_the_excerpt(''));?>
</p>  

                </div>
   
 					   <div class="list_post_vertical">
                      <ul>          
                
            <?php
			}else {
            ?>
            
     <li>
       <?php
                                    $post_date = get_post_custom_values('date_themeloy_select', get_the_ID()); 
									$post_date = ($post_date[0] != '') ? $post_date[0] : of_get_option('blog_date_post');
                                 if($post_date == '1'){
	 ?>
     <div class="feature_post_style">
                        <span class="post_date"><span class="date_number"><?php echo get_the_date('d');?></span> <?php echo get_the_date('M');?>
                        <i class="icon-caret-right feature-icon-right"></i>
                        </span>
                        <span class="post_time"><i class="icon-time"></i> <?php echo get_the_time('H:i');?></span>
                        </div>
                        <?php }?>
                        <div class="feature-link feature-item">
                       <a href="<?php the_permalink(); ?>" class="feature-link">
<?php if ( has_post_thumbnail()) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium-feature' );?>
        <img src="<?php echo $image[0]; ?>" />	
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/medium-feature.jpg'.'">';} ?>	
                       
                        </a>
                         <?php echo themeloy_post_type(); ?>
                        </div>
                        
                       <div class="list_desc">
                           <h4 class="list_title"><a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
                            </a></h4>
                           
                   <?php echo themeloy_feature_post_meta(get_the_ID());?>
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
            
                <?php }}?>
            
			

   </ul>
            </div>
        </div>
      
        <?php
        wp_reset_query();


        echo $after_widget;
    }

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = $new_instance['cats'];
        $instance['number'] = absint($new_instance['number']);

        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'tl_back'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

   <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Select categories to include in the recent posts list:', 'tl_back'); ?> 

                <?php
                $categories = get_categories('hide_empty=0');
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
