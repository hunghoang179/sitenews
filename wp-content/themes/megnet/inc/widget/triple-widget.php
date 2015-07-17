<?php
add_action('widgets_init', 'triple_register_widgets');

function triple_register_widgets() {
    register_widget('Triple_Posts_Widget');
}

class Triple_Posts_Widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

    function __construct() {
        $widget_ops = array(
            'classname' => 'tab_widget',
            'description' => __('Tab widget: Popular, latest and comment.', 'tl_back')
        );
        parent::__construct('triple-posts', __('Themeloy: Tab widget', 'tl_back'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {

        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number']))  $number = 5;
        $themeloy_args = array(
            'showposts' => $number,
            'orderby' => 'comment_count'
        );
		$show_comment_tab = isset($instance['show_comment_tab']) ? $instance['show_comment_tab'] : false;
        $themeloy_args1 = array(
            'showposts' => $number,
            'orderby' => 'date',
        );

        $themeloy_widget = null;
        $themeloy_widget = new WP_Query($themeloy_args);

        $themeloy_widget1 = null;
        $themeloy_widget1 = new WP_Query($themeloy_args1);

        echo $before_widget;

        if ($title != "") {
            echo $before_title;
            echo $title;
            echo $after_title;
        }
        ?>
        <div class="widget_container">    

            <!--tabs-nav -->
            <ul class="tabs-nav">
                <li class="active"><a class="title" href="#tab1"><?php _e('Popular', 'tl_back'); ?></a></li>
                <li class=""><a class="title" href="#tab2"><?php _e('Latest', 'tl_back'); ?></a></li>
               <?php if ($show_comment_tab == true) { ?> <li class=""><a class="title" href="#tab4"><?php _e('Comment', 'tl_back'); ?></a></li><?php }?>
            </ul>
            <!-- end tabs-nav -->

            <div class="tabs-container">

                <!--tab1 -->
                <div id="tab1" class="tab-content" style="display: block;">


                    <ul class="post_list">
                        <?php
                        while ($themeloy_widget->have_posts()) {
                            $themeloy_widget->the_post();
							$post_id = get_the_ID();
                            ?>
                            <li class="clearfix">
                               <div class="img_thumbnail feature-item">
                                <?php				
                 echo '<a  class="img_thumbnail" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '">'; ?>
                 <?php if ( has_post_thumbnail()) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'small-feature' );?>
        <img src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/small-feature.jpg'.'">';} ?>	
                                  
                                  </a>
                                  <?php echo themeloy_post_type(); ?>
                                  </div>
                          
                                <div class="list_desc">
                                    <h4 class="list_title"><a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>">
									<?php echo themeloy_short_title(60, get_the_title('')); ?>
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
                        ?>
                    </ul>

                </div>
                <!-- end tab1 -->

                <!--tab2 -->
                <div id="tab2" class="tab-content">

                     <ul class="post_list">
                        <?php
                        while ($themeloy_widget1->have_posts()) {
                            $themeloy_widget1->the_post();
							$post_id = get_the_ID();
                            ?>
                            <li class="clearfix">
                                <div class="img_thumbnail feature-item">
								<?php							
                                echo '<a  class="img_thumbnail" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '">'; ?>
                                <?php if ( has_post_thumbnail()) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'small-feature' );?>
        <img src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/small-feature.jpg'.'">';} ?>	
                                 
                                  </a>
                                   <?php echo themeloy_post_type(); ?>
                                  </div>

                                <div class="list_desc">
                                    <h4 class="list_title"> <a class="title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
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
                        ?>
                    </ul>

                </div>
                <!-- end tab2 -->
   
                <?php if ($show_comment_tab == true) { ?>
                 <!--tab4 -->
                <div id="tab4" class="tab-content comment-tab">
                 
                 <ul class="post_list">
            <?php 
                $args = array(
                       'status' => 'approve',
                        'number' => $number
					);	
				
				$postcount=0;
                $comments = get_comments($args);
				
                foreach($comments as $comment) :
						$postcount++;								
                        $commentcontent = strip_tags($comment->comment_content);			
                        if (strlen($commentcontent)> 50) {
                            $commentcontent = mb_substr($commentcontent, 0, 100) . "...";
                        }
                        $commentauthor = $comment->comment_author;
                        if (strlen($commentauthor)> 30) {
                            $commentauthor = mb_substr($commentauthor, 0, 29) . "...";			
                        }
                        $commentid = $comment->comment_ID;
                        $commenturl = get_comment_link($commentid); ?>
                      <li class="clearfix">
							<a  class="img_thumbnail" href="<?php echo $commenturl; ?>"><?php echo get_avatar( $comment, '65' ); ?></a>
                              <div class="list_desc">

									 <h4 class="list_title"><a class="post-title" href="<?php echo $commenturl; ?>"><?php echo $commentcontent; ?></a></h4>
									<p class="post-meta">
                                        <span class="meta-date"><i class="icon-time"></i> <?php echo human_time_diff(get_comment_date('U',$comment->comment_ID), current_time('timestamp')), __(' ago', 'tl_back'); ?>
                                        </span>
                                        </p>
                                        </div>
						</li>
            <?php endforeach; ?>
        </ul>
                 
                </div>
                <!-- end tab4 -->
              <?php }?>

            </div>

 <div class="clear"></div>
        </div>
        <!-- end tabs-container -->
        <?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
		$instance['show_comment_tab'] = $new_instance['show_comment_tab'];
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 6;
		
		$defaults = array( 			
			'show_comment_tab' => 'on'
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
       
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tl_back'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'tl_back'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

 <p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_comment_tab'], 'on'); ?> id="<?php echo $this->get_field_id('show_comment_tab'); ?>" name="<?php echo $this->get_field_name('show_comment_tab'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_comment_tab'); ?>"><?php _e( 'Show comment tab', 'tl_back'); ?></label>
		</p>

        <?php
    }

}
?>