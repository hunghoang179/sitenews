<div class="post-thumb">
  <?php
        bd_gallery( $post->ID );
    ?>
</div>
<!--//END-->

<h2 class="entry-title">
  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
  <?php the_title(); ?>
  </a>
</h2>
<!--//END-->

<div class="entry-meta-header">
  <span>
  <?php the_time( get_option('date_format') ); ?>
  </span>
</div>
<!--//END-->

<div class="entry-content">
  <?php the_excerpt_max_charlength('120'); ?>
</div>
<!--//END-->

