<?php
add_action( 'widgets_init', 'bd_popular' );
function bd_popular() {
    register_widget( 'bd_popular' );
}
class bd_popular extends WP_Widget {
function bd_popular() {
    $widget_ops = array('classname' => 'bd-popular-posts', 'description' => '');
    $control_ops = array('id_base' => 'bd-popular-posts');
    $this->WP_Widget('bd-popular-posts', theme_name . ' - Popular Posts', $widget_ops, $control_ops);
}
function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title'] );
    echo $before_widget;
    if($title) {
        echo $before_title.$title.$after_title;
    }
?>
<ul>
<?php AGS_popular_posts(); ?>
</ul>
<?php
    echo $after_widget;
}
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    return $instance;
}
function form( $instance ) {
    $defaults = array( 'title' =>__( 'Popular Posts' , 'bd'));
    $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title : ','bd') ?></label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
    </p>
<?php
}

}
