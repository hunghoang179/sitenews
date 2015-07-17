<?php if( !is_single() ) { ?>

<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
<?php } ?>
<div class="entry-quote">
  <?php $quote = get_post_meta($post->ID, '_bd_quote_quote', true); ?>
  <h2>
    <?php echo $quote; ?>
  </h2>
  <p class="quote-source">
    <?php the_title(); ?>
  </p>
</div>
<?php if( !is_single() ) { ?>
</a>
<?php } ?>
