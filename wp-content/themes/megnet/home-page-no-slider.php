<?php
/*
  Template Name: Home page no slider header
 */
?>

<?php get_header(); ?>
   
   
<div class="slider_margin"></div>


<!-- Start content -->
<section id="contents" class="clearfix">

<?php if(of_get_option('carousel_homepage_no_slider_option')){
if (is_active_sidebar('carousel-sidebar')){?>
<div class="row">
	<div class="grid_12">
    <?php dynamic_sidebar('carousel-sidebar');?>
    
    </div>
</div>
<?php }}?>

<div class="row main_content">
<div class="content_wraper">
   <!-- Start content -->
    <div class="grid_8" id="content">
            
			  <?php if (have_posts()) {
				   while (have_posts()) { the_post();
			   the_content();
			   }}
            ?>


  </div>
  <!-- End content -->
  
  
    <!-- Start sidebar -->
	<div class="grid_4" id="sidebar">
<?php
 if (have_posts()) : while (have_posts()) : the_post();
 $GLOBALS['sbg_sidebar'] = get_post_meta(get_the_ID(), 'sbg_selected_sidebar_replacement', true);
 endwhile;
 endif;
				$dyn_sidebar = $GLOBALS['sbg_sidebar'][0];
				
				$po_sidebar = of_get_option('po_sidebar','');	
				if(!empty($po_sidebar)) {
					$dyn_sidebar = $po_sidebar;
				};				
				
				foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
					if($sidebar['name'] == $dyn_sidebar)
			  			{
							 $dyn_sidebar = $sidebar['id'];
						}
				} 
				if($dyn_sidebar) {
					if (is_active_sidebar($dyn_sidebar)) : dynamic_sidebar($dyn_sidebar);
		            endif;	
				} else{
					if (is_active_sidebar('center-sidebar')) : dynamic_sidebar('center-sidebar');
		            endif;
				}					
?>
  </div>
  <!-- End sidebar -->
  <div class="clear"></div>
  </div>
  
  </div>

</section>
   
<?php get_footer(); ?>
