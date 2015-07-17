<?php
class carousel_post_categories extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Home carousel post',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('carousel_post_categories', $block_options);
	}
	
	
	//create form
	function form($instance) {
		$titles = isset($instance['titles']) ? esc_attr($instance['titles']) : 'Recent Posts';
		$number_show = isset($instance['number_show']) ? absint($instance['number_show']) : 5;
		
?>
        <p><label for="<?php echo $this->get_field_id('titles'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('titles'); ?>" name="<?php echo $this->get_field_name('titles'); ?>" type="text" value="<?php echo $titles; ?>" /></p>
                        
        <p><label for="<?php echo $this->get_field_id('number_show'); ?>"><?php _e('Number of posts to show:','tl_back'); ?></label>
        <input id="<?php echo $this->get_field_id('number_show'); ?>" name="<?php echo $this->get_field_name('number_show'); ?>" type="text" value="<?php echo $number_show; ?>" size="3" /></p>
         <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Select categories to include in the recent posts list:', 'tl_back');?> 
            
                <?php
                   $categories=  get_categories('hide_empty=0');
                     echo "<br/>";
                     foreach ($categories as $cat) {
                         $option='<input type="checkbox" id="'. $this->get_field_id( 'cats' ) .'[]" name="'. $this->get_field_name( 'cats' ) .'[]"';
                            if (isset($instance['cats'])) {
                                foreach ($instance['cats'] as $cats) {
                                    if($cats==$cat->term_id) {
                                         $option=$option.' checked="checked"';
                                    }
                                }
                            }
                            $option .= ' value="'.$cat->term_id.'" />';
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
		
	
	//create block
	function block($instance) {
		
		    extract($instance);
			$titles = apply_filters( 'widget_title', empty($instance['titles']) ? '' : $instance['titles'], $instance, $this->id_base);	
			if ( ! $number_show = absint( $instance['number_show'] ) ) $number_show = 5;
			if (!isset($instance["cats"])) {
			$cats = '';}
			$themeloy_args=array(						   
				'showposts' => $number_show,
				'category__in'=> $cats,
				);
			$themeloy_widget = null;
			$themeloy_widget = new WP_Query($themeloy_args);
?>
			<div class="widget carousel_horizontal">
			<?php if (!empty($instance['titles'])) {?><h3 class="widget-title"><span><?php echo $instance["titles"];?></span></h3><?php }?>
			<div class="widget_container">
			<ul>
	<?php		
		while ( $themeloy_widget->have_posts() )
		{
			$themeloy_widget->the_post();
			$post_id = get_the_ID();
		?>
			<li class="feature-postslider-item ajax_block_post">
              <div class="entry-thumb"> 
			  <?php echo ' <a class="feature-link" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';?> 
<?php if ( has_post_thumbnail()) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'feature-large' );
	?>
    <img class="cat-feature-large-img" src="<?php echo $image[0]; ?>" />
	<?php }else{echo '<img class="cat-feature-large-img" src="'.get_template_directory_uri().'/images/demo/feature-large.jpg'.'">';} ?>				 
				 <?php echo '</a>';?> 
                 
                 
<div class="cat-feature-large">
					<?php $post_cat = get_post_custom_values('cat_themeloy_select', get_the_ID());
		 $post_cat = ($post_cat[0] != '') ? $post_cat[0] : of_get_option('blog_category_post');
		 if($post_cat == '1'){echo '<p class="cat-slider feature">'; echo the_category(', ').'</p>';}?>
         </div>
</div>
                                 
                                 <div class="ulpost_title">
                               
                                 <a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>">
								 <?php the_title(); ?>
								</a>
                               <div class="carousel-bottom"> 
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
                               <div class="clear"></div>
                               </div>
                               
                                 </div>



<div class="post-info">
					<h5 class="title_block"><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                    <div class="post_desc">
                    <p><?php echo themeloy_short_title(220, get_the_excerpt('')); ?></p>
                    </div>

  <?php echo themeloy_post_type(); ?>
					</div>

		
			</li>
		<?php

		}

		 wp_reset_query();

		echo "</ul></div></div>";


	}
	
	    function update($new_instance, $old_instance) {
        return $new_instance;
    }

	
}
