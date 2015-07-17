<?php
add_action( 'widgets_init', 'bd_related' );
function bd_related() {
    register_widget( 'bd_related' );
}
class bd_related extends WP_Widget {
function bd_related() {
    $widget_ops = array('classname' => 'bd-related', 'description' => '');
    $control_ops = array('id_base' => 'bd-related');
    $this->WP_Widget('bd-related', theme_name . ' - Related Posts', $widget_ops, $control_ops);
}
function widget( $args, $instance ) {
    extract( $args );
    if ( is_single() ) :
    $title = apply_filters('widget_title', $instance['title'] );
    $number = $instance['number'];

    echo $before_widget;
    if($title) {
        echo $before_title.$title.$after_title;
    }
?>
<ul>
<?php
    global $post;
    $cats = get_the_category($post->ID);
    if ($cats) :
        $cat_ids = array();
        foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat->cat_ID;}
        $args=array(
            'category__in' => $cat_ids,
            'post__not_in' => array($post->ID),
            'showposts'=> $number,
            'ignore_sticky_posts'=>1
        );

        query_posts($args);

    ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <li>
                <?php
                $thumb = bd_post_image('large');
                $ntImage = aq_resize( $thumb, 67, 67, true );
                ?>
                <?php if (strpos(bd_post_image(), 'youtube')) { ?>
                    <div class="post_thumbnail">
                        <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                            <img class="youtube-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        </a>
                    </div><!-- thumbnail/-->
                <?php } elseif (strpos(bd_post_image(), 'vimeo')) { ?>
                    <div class="post_thumbnail">
                        <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                            <img class="vimeo-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        </a>
                    </div><!-- thumbnail/-->
                <?php } elseif (strpos(bd_post_image(), 'dailymotion')) {?>
                    <div class="post_thumbnail">
                        <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                            <img class="dailymotion-img" src="<?php echo bd_post_image('large'); ?>" width="67" height="67" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        </a>
                    </div><!-- thumbnail/-->
                <?php } else { if($ntImage != '') { ?>
                    <div class="post_thumbnail">
                        <a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                            <img class="ntImage-img" src="<?php echo $ntImage; ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        </a>
                    </div><!-- thumbnail/-->
                <?php } } ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                <span class="date"><?php the_time(get_option('date_format'));  ?></span>
            </li>
        <?php endwhile; endif; ?>
    <?php
    wp_reset_query();
?>
</ul>
<div class="clear"></div>
<?php
    echo $after_widget;
    endif;
}
function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['number'] = strip_tags( $new_instance['number'] );
    return $instance;
}
function form( $instance ) {
    $defaults = array( 'title' =>__( 'Related Posts' , 'bd'), 'number' => '5');
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

<?php
}

}
