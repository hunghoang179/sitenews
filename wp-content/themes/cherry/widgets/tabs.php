<?php
add_action( 'widgets_init', 'bd_tabs_widget' );
function bd_tabs_widget(){
    register_widget( 'tabs_widget' );
}
class tabs_widget extends WP_Widget {
function tabs_widget() {
    $widget_ops = array('classname' => 'bd-tabs-widget', 'description' => 'The most ( Popular - Recent - Comments - Tags');
    $control_ops = array('id_base' => 'bd-tabs-widget');
    $this->WP_Widget('bd-tabs-widget', theme_name .' - Tabs', $widget_ops, $control_ops);
}
function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
?>
<div class="widget widget_tabs">
  <div class="widget_container">
    <ol class="tabs_nav">
      <li class="active">
        <a href="#tab1">
            <?php _e( 'Popular' , 'bd' ) ?>
        </a>
      </li>
      <li>
        <a href="#tab2">
            <?php _e( 'Recent' , 'bd' ) ?>
        </a>
      </li>
      <li>
        <a href="#tab3">
            <?php _e( 'Comments' , 'bd' ) ?>
        </a>
      </li>
      <li>
        <a href="#tab4">
            <?php _e( 'Tags' , 'bd' ) ?>
        </a>
      </li>
    </ol>
    <div class="tabs_content">
      <div class="tab_container" id="tab1">
        <ul>
          <?php AGS_popular_posts(); ?>
        </ul>
      </div><!--//end tab1-->
      <div class="tab_container" id="tab2">
        <ul>
          <?php cherry_last_posts(); ?>
        </ul>
      </div><!--//end tab2-->
      <div class="tab_container" id="tab3">
        <ul>
          <?php cherry_commented(); ?>
        </ul>
      </div><!--//end tab3-->
      <div class="tab_container" id="tab4">
        <div class="tagcloud">
          <?php wp_tag_cloud( $args = array('largest' => 8,'number' => 25,'orderby'=> 'count', 'order' => 'DESC' )); ?>
        </div>
      </div><!--//end tab4-->
    </div>
  </div>
</div><!--//end tabs-->
<?php
}
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    return $instance;
}
function form( $instance ) {
    $defaults = array('title' =>__( 'Tabs' , 'bd'));
    $instance = wp_parse_args((array) $instance, $defaults);
	?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
    </p>
<?php
}

}