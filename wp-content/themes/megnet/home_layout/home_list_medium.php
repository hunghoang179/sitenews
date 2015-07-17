<?php
class home_list_medium extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Home list or grid medium size',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('home_list_medium', $block_options);
	}
	
	
	//create form
	function form($instance) {
        $titles = isset($instance['titles']) ? esc_attr($instance['titles']) : 'Recent Posts';
        $number_show = isset($instance['number_show']) ? absint($instance['number_show']) : 5;
        $show_style_1 = isset($instance['show_style_1']) ? (bool) $instance['show_style_1'] : false;
		?>
        <p><label for="<?php echo $this->get_field_id('titles'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('titles'); ?>" name="<?php echo $this->get_field_name('titles'); ?>" type="text" value="<?php echo $titles; ?>" /></p>

        
        <p><label for="<?php echo $this->get_field_id('number_show'); ?>"><?php _e('Number of posts to show:', 'tl_back'); ?></label>
            <input id="<?php echo $this->get_field_id('number_show'); ?>" name="<?php echo $this->get_field_name('number_show'); ?>" type="text" value="<?php echo $number_show; ?>" size="3" /></p>

<p><input class="checkbox" type="checkbox" <?php checked($show_style_1); ?> id="<?php echo $this->get_field_id('show_style_1'); ?>" name="<?php echo $this->get_field_name('show_style_1'); ?>" />
            <label for="<?php echo $this->get_field_id('show_style_1'); ?>"><?php _e('Display post grid', 'tl_back'); ?></label></p>
 
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
		<?php
		
	}
		
	
	//create block
	function block($instance) {
		
		    extract($instance);

        $titles = apply_filters('widget_title', empty($instance['titles']) ? 'Recent Posts' : $instance['titles'], $instance, $this->id_base);
    
        $show_style_1 = isset($instance['show_style_1']) ? $instance['show_style_1'] : false;
		
      
                if (!isset($instance["cats"])) {
			$cats = '';}

        // array to call recent posts.

        $themeloy_args = array(
            'showposts' => $number_show,
            'category__in' => $cats,
        );
		


        $themeloy_widget = null;
        $themeloy_widget = new WP_Query($themeloy_args);

        ?>
        <div class="widget post_list_medium_widget">
        <?php if (!empty($instance['titles'])) {?><h3 class="widget-title"><span><?php echo $instance["titles"];?></span></h3><?php }?>
		<div class="widget_container">
        <ul class="<?php if ($show_style_1 == true ) {echo "post_list_medium_style1";}else{echo "post_list_medium";}?>">
        <?php
		$row_count=0;
        while ($themeloy_widget->have_posts()) {
           $row_count++;
		   $themeloy_widget->the_post();
		   $post_id = get_the_ID();
           $thumb = themeloy_get_thumbnail(get_the_ID());
                ?>   

                 <li class="list_item <?php if($row_count % 2 == 0){echo "left-column-post";}?>">
                <div class="entry-thumb feature-item">
                    <a href="<?php the_permalink(); ?>"> 
                    <?php if ( has_post_thumbnail()) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'feature-large' );
	?>
    <img class="cat-feature-large-img" src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img class="cat-feature-large-img" src="'.get_template_directory_uri().'/images/demo/feature-large.jpg'.'">';} ?>
</a>



                               	<div class="cat-feature-large">
					<?php $post_cat = get_post_custom_values('cat_themeloy_select', get_the_ID());
		 $post_cat = ($post_cat[0] != '') ? $post_cat[0] : of_get_option('blog_category_post');
		 if($post_cat == '1'){echo '<p class="cat-slider">'; echo the_category(', ').'</p>';}?>
         </div>
               
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
                 <h3><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h3>
              
                  
                     <?php $enable_review = get_post_custom_values('reviewthemeloy_checkbox', get_the_ID()); ?>
	                <?php 
					if (of_get_option('disable_review') == 0){
						if($enable_review[0] == 1){ ?>
                     <span class="review-wrap">
                     <span class="review-star">
                          <span style="width:<?php echo themeloy_get_total_review(get_the_ID()); ?>%" class="review-star-inline"> </span>
                     </span>
                     </span>
                     <?php }else{?>
					  <span class="review-wrap">
						 <span class="review-star-none">
                          <span class="review-star-inline-none"></span>
                     </span>
                      </span>
					 <?php }}else{?>
                      <span class="review-wrap">
						 <span class="review-star-none">
                          <span class="review-star-inline-none"></span>
                     </span>
                      </span>
                    	<?php } ?>  
                       
<?php echo themeloy_post_meta(get_the_ID());?>
    <?php if ($show_style_1 == true ) {}else{?>
    <p><?php echo themeloy_short_title(320, get_the_excerpt('')); ?>  </p>
    <?php }?>
     <div class="clear"></div>
     </li>
              
                <?php }?>
      </ul>
        </div>
        </div>
     
        <?php
        wp_reset_query();	
		
	}
	
	    function update($new_instance, $old_instance) {
        return $new_instance;
    }

	
}
