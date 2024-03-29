<?php
add_action('widgets_init', 'ad_300_300_load_widgets');
function ad_300_300_load_widgets(){
    register_widget('Ad_300_300_Widget');
}

class Ad_300_300_Widget extends WP_Widget {

function Ad_300_300_Widget(){
    $widget_ops = array('classname' => 'ad_300_300', 'description' => 'Add 300x300 ads.');
    $control_ops = array('id_base' => 'ad_300_300-widget');
    $this->WP_Widget('ad_300_300-widget', theme_name . ' - 300x300 Ads', $widget_ops, $control_ops);
}

function widget($args, $instance){

    extract($args);
    $title = apply_filters('widget_title', $instance['title'] );
    $img = $instance['img'];
    $link = $instance['link'];
    $code = $instance['code'];

    echo $before_widget;
    if($title) {
        echo $before_title.$title.$after_title;
    }
?>
<div class="ads300">
<?php
    $ads = array(1);
    foreach($ads as $ad_count):
?>
<?php if($code != '') { ?>
<div class="ads-content">
<?php echo $code; ?>
</div>

<?php } else { ?>

<div class="ads-content">
    <span class="hold">
        <a href="<?php echo $link ?>">
            <img src="<?php echo $img ?>" alt="" />
        </a>
    </span>
</div>
<?php } ?>
<?php endforeach; ?>
</div>
<?php
    echo $after_widget;
}

    function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['img'] = $new_instance['img'];
        $instance['code'] = $new_instance['code'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }

    function form( $instance ){

        $defaults = array('title' =>__( 'Ads 300 x 300' , 'bd') ,);
        $instance = wp_parse_args((array) $instance, $defaults);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
        </p>

        <p><strong>Ad 1</strong></p>
        <p>
            <label for="<?php echo $this->get_field_id('img'); ?>">Image Ad Link:</label>
            <input  style="width: 216px;" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" value="<?php echo $instance['img']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>">Ad Link:</label>
            <input  style="width: 216px;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo $instance['link']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'code' ); ?>">Or Ads code:</label>
            <textarea id="<?php echo $this->get_field_id( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>" class="widefat" ><?php echo $instance['code']; ?></textarea>
        </p>
    <?php
    }

}