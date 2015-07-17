<?php
add_action( 'widgets_init', 'bd_slider' );
function bd_slider() {
    register_widget( 'bd_slider' );
}
class bd_slider extends WP_Widget {
function bd_slider() {
    $widget_ops = array('classname' => 'bd-slider', 'description' => '');
    $control_ops = array('id_base' => 'bd-slider');
    $this->WP_Widget('bd-slider', theme_name . ' - Slider', $widget_ops, $control_ops);
}
function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title'] );
    $number = $instance['number'];
    $categories = $instance['categories'];

?>
<div class="flexslider widgetslider" id="<?php echo $args['widget_id']; ?>">
<ul class="slides">
<?php global $post; $recent = new WP_Query(array( 'cat' => $categories, 'showposts' => $number )); while($recent->have_posts()) : $recent->the_post(); ?>
<li>
    <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php
        $thumb = bd_post_image('large');
        $ntImage = aq_resize( $thumb, 298, 215, true );
        if($ntImage == ''){
            $ntImage = BD_IMG .'/default_thumb.png';
        }
    ?>
    <?php if (strpos(bd_post_image(), 'youtube')) { ?>
        <img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="298" height="215" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
    <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
        <img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="298" height="215" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
    <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
        <img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="298" height="215" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
    <?php } else { ?>
        <img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
    <?php } ?>
    </a>
    <div class="slider-caption">
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
    </div>
</li>
<?php endwhile; ?>
</ul>
</div>
<script>
    jQuery(window).load(function() {
        jQuery('#<?php echo $args['widget_id']; ?>').flexslider({
            animation: "fade",
            slideshowSpeed: 7000,
            animationSpeed: 600,
            randomize: false,
            pauseOnHover: true,
            controlNav: false
        });
    });
</script>
<div class="clear"></div>
<?php
}
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['number'] = strip_tags( $new_instance['number'] );
    $instance['categories'] = $new_instance['categories'];
    return $instance;
}
function form( $instance ) {
    $defaults = array( 'title' =>__( 'Category Posts' , 'bd'), 'number' => '5' , 'categories' => '1');
    $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
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