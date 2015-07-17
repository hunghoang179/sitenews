<?php
add_action( 'widgets_init', 'bd_cate_posts' );
function bd_cate_posts() {
    register_widget( 'bd_cate_posts' );
}
class bd_cate_posts extends WP_Widget {
function bd_cate_posts() {
    $widget_ops = array('classname' => 'bd-cate-posts', 'description' => '');
    $control_ops = array('id_base' => 'bd-cate-posts');
    $this->WP_Widget('bd-cate-posts', theme_name . ' - Category Posts', $widget_ops, $control_ops);
}
function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title'] );
    $number = $instance['number'];
    $categories = $instance['categories'];
    echo $before_widget;
    if($title) {
        echo $before_title.$title.$after_title;
    }
?>
<ul>
<?php global $post; $recent = new WP_Query(array( 'cat' => $categories, 'showposts' => $number )); while($recent->have_posts()) : $recent->the_post(); ?>
<li>
    <?php
    $img_w      = 55;
    $img_h      = 55;
    $thumb      = bd_post_image('full');
    $image      = aq_resize( $thumb, $img_w, $img_h, true );
    $alt        = get_the_title();
    $link       = get_permalink();
    if (strpos(bd_post_image(), 'youtube'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    elseif (strpos(bd_post_image(), 'vimeo'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    elseif (strpos(bd_post_image(), 'dailymotion'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    else
    {
        if($image) :
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        endif;
    }
    ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
    <span class="date"><?php the_time(get_option('date_format'));  ?></span>
    <span class="post-rat"><?php echo bd_wp_post_rate(); ?></span>
</li>
<?php endwhile; ?>
</ul>
<div class="clear"></div>
<?php
    echo $after_widget;
}
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['number'] = strip_tags( $new_instance['number'] );
    $instance['categories'] = $new_instance['categories'];
    return $instance;
}
function form( $instance ) {
    $defaults = array( 'title' =>__( 'Category Posts' , 'bd'), 'number' => '5' , 'cats_id' => '1');
    $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:' , 'bd'); ?></label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width: 216px" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:' , 'bd'); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Select Category:' , 'bd'); ?></label>
        <select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" style="width:100%;">
        <option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php _e('All Categories' , 'bd'); ?></option>
            <?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
            <?php foreach($categories as $category) { ?>
            <option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
            <?php } ?>
        </select>
    </p>
<?php
}

}