<?php if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Home Sidebar')){ }else { ?>

<p class="noside">
  <?php _e('There Is No Sidebar Widgets Yet', 'bd'); ?>
</p>
<?php } ?>
