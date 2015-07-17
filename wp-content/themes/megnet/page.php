<?php get_header(); ?>
  

<section id="contents" class="clearfix">
<div class="row main_content">
<!-- begin content -->            

<div class="content_wraper">
<?php the_breadcrumb(); ?>
   <!-- Start content -->
    <div class="grid_8 page_content" id="content">
 <div <?php post_class('widget_container content_page'); ?>> 
          <?php get_template_part('content-page'); ?> 
<div class="brack_space"></div>
        </div>

  </div>
  <!-- End content -->
  
          
    <!-- Start sidebar -->
	<div class="grid_4" id="sidebar">

                <?php
				
				if(isset($GLOBALS['sbg_sidebar'][0])){
					$dyn_sidebar = $GLOBALS['sbg_sidebar'][0];
					
					$pg_sidebar = of_get_option('pg_sidebar','');	
					if(!empty($pg_sidebar)) {
						$dyn_sidebar = $pg_sidebar;
					};
				
					foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
					if($sidebar['name'] == $dyn_sidebar)
			  			{
							 $dyn_side = $sidebar['id'];
						}
					} 
				}			

				if(isset($dyn_side)) {
					
					if (is_active_sidebar($dyn_side)) : dynamic_sidebar($dyn_side);
		            endif;								
					
					
				} else{
					if (is_active_sidebar('center-sidebar')) { dynamic_sidebar('center-sidebar'); }
				}					
				
				
?>
  </div>
  <!-- End sidebar -->

          
        
    </div>
</div>
 </section>
<!-- end content --> 

<?php get_footer(); ?>


