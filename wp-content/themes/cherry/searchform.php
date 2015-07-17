<form method="get" action="<?php echo home_url(); ?>">
  <input type="text" class="search_text" value="<?php _e('Search here ...', 'bd'); ?>" name="s" onfocus="if(this.value == '<?php _e('Search here ...', 'bd'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search here ...', 'bd'); ?>';}" />
  <input type="submit" class="search_sub" value="<?php _e('Search', 'bd'); ?>" />
</form>
