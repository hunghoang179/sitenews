<?php $post_id = null; 
$enable_full_width_post = get_post_custom_values('full_width_postthemeloy_checkbox');
?>

<!-- begin content -->            
<section id="contents" class="clearfix">
<div class="row main_content">

<div class="container content_wraper">
<?php the_breadcrumb();?>
        <div class="<?php if($enable_full_width_post[0] == 1){echo "post_full";}else{echo "grid_8";}?>">
         <div class="widget_container content_page"> 
         
            <?php $post_layout = of_get_option('post_layout'); ?>
            <?php require_once dirname(__FILE__) . '/include/single-post.php'; ?>  
        <div class="brack_space"></div>
        </div>
        </div>
        
        <?php if($enable_full_width_post[0] == 1){}else{?>
            <div class="grid_4" id="sidebar">  
<?php
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
?><div class="brack_space"></div>
          
       </div>
       <?php }?>
       
       
        
    </div>
</div>
 </section>
<!-- end content --> 