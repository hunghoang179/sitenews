<?php
class home_two_columns_post extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Home post two columns',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('home_two_columns_post', $block_options);
	}
	
	
	//create form
	function form($instance) {
        $titles = isset($instance['titles']) ? esc_attr($instance['titles']) : 'Recent Posts';
        $title1 = isset($instance['title1']) ? esc_attr($instance['title1']) : 'Recent Posts';
        $number_show = isset($instance['number_show']) ? absint($instance['number_show']) : 5;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('titles'); ?>" name="<?php echo $this->get_field_name('titles'); ?>" type="text" value="<?php echo $titles; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title for right column:','tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title1'); ?>" name="<?php echo $this->get_field_name('title1'); ?>" type="text" value="<?php echo $title1; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number_show'); ?>"><?php _e('Number of posts to show:', 'tl_back'); ?></label>
            <input id="<?php echo $this->get_field_id('number_show'); ?>" name="<?php echo $this->get_field_name('number_show'); ?>" type="text" value="<?php echo $number_show; ?>" size="3" /></p>

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

        <p>
            <label for="<?php echo $this->get_field_id('cats1'); ?>"><?php _e('Select categories to include in the recent posts list:', 'tl_back'); ?> 

                <?php
                $categories = get_categories('hide_empty=0');
                echo "<br/>";
                foreach ($categories as $cat) {
                    $option = '<input type="checkbox" id="' . $this->get_field_id('cats1') . '[]" name="' . $this->get_field_name('cats1') . '[]"';
                    if (isset($instance['cats1'])) {
                        foreach ($instance['cats1'] as $cats) {
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
		
	
	//create block
	function block($instance) {		
		    extract($instance);
        $titles = apply_filters('widget_title', empty($instance['titles']) ? 'Recent Posts' : $instance['titles'], $instance, $this->id_base);
        $title1 = apply_filters('widget_title', empty($instance['title1']) ? 'Recent Posts' : $instance['title1'], $instance, $this->id_base);
        
        if (!$number_show = absint($instance['number_show']))
            $number_show = 5;

            if (!isset($instance["cats"])) {
			$cats = '';}
			if (!isset($instance["cats1"])) {
			$cats1 = '';}
     

        // array to call recent posts.

        $themeloy_args = array(
            'showposts' => $number_show,
            'category__in' => $cats,
        );

        $themeloy_args1 = array(
            'showposts' => $number_show,
            'category__in' => $cats1);

        $themeloy_widget = null;
        $themeloy_widget = new WP_Query($themeloy_args);



        echo '<div class="widget two_columns_post">';

        $i = 0;
        while ($themeloy_widget->have_posts()) {
            $themeloy_widget->the_post();
            $i++;        
			$post_id = get_the_ID(); 
            if ($i == 1) {				
                ?>   

                <div class="main-post-col1">
                   <?php if (!empty($instance['titles'])) {?><h3 class="widget-title"><span><?php echo $instance["titles"];?></span></h3><?php }?>
                    <div class="two-content-wrapper">
                    
                  <div class="image_review_wrapper">
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
                
                  
                     </div>
                  
                    <div class="feature-text-col">

                        <div class="post-title"><h3><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
						<?php the_title(); ?>
						</a></h3></div> 
                      <?php echo themeloy_post_meta(get_the_ID());?> 
                    <?php echo themeloy_short_title(190, get_the_excerpt()); ?>  
                    </div>

                   <?php
			}else {                    
                    ?>
                    <div class="small-feature">
 
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
							 	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium-feature' );
	?>
    <img src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/medium-feature.jpg'.'">';} ?>
                        
                         </a>
                          <?php echo themeloy_post_type(); ?>
                       </div>
                        <div class="feature-text">
                            <div class="post-title"><h4 class="list_title"> <a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_title(); ?>
                            </a></h4></div>
               
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


                <?php
			};
            }
            ?>
           
            </div>
        </div>

        <?php
        wp_reset_query();

        // column right      

        $themeloy_widget1 = null;
        $themeloy_widget1 = new WP_Query($themeloy_args1);

        $i = 0;
        while ($themeloy_widget1->have_posts()) {
            $themeloy_widget1->the_post();
            $i++;
			$post_id = get_the_ID();
            $thumb = themeloy_get_thumbnail(get_the_ID());
            if ($i == 1) {
                ?>   

                <div class="main-post-col2">
                  <?php if (!empty($instance['title1'])) {?><h3 class="widget-title"><span><?php echo $instance["title1"];?></span></h3><?php }?>
                     <div class="two-content-wrapper">
                     
                    <div class="image_review_wrapper">
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
                
                    </div>
	              	
                
                    <div class="feature-text-col">

                        <div class="post-title"><h3><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
						<?php the_title(); ?>
						</a></h3></div> 
                       <?php echo themeloy_post_meta(get_the_ID());?> 
                   <?php echo themeloy_short_title(190, get_the_excerpt()); ?>  
                    </div>
                    <?php
			}else {
                        $date = '<span class="date">' . get_the_date('M d, Y') . '</span>';
                 
                    ?>
                    <div class="small-feature">

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
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium-feature' );
	?>
    <img src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/medium-feature.jpg'.'">';} ?>
                        
                        </a>
                        <?php echo themeloy_post_type(); ?>
                        </div>
                        <div class="feature-text">
                            <div class="post-title"><h4 class="list_title"><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_title(); ?>
							</a></h4></div>
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


                <?php
				}
            }
            ?>
            </div>
        </div>
         </div>
      
        <?php
        wp_reset_query();

    }
	
	    function update($new_instance, $old_instance) {
        return $new_instance;
    }

	
}
