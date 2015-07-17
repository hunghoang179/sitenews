<section id="contents" class="clearfix">
<div class="row main_content">
        <!-- begin content -->            
<div class="container content_wraper">
<?php the_breadcrumb(); ?>
  <div class="grid_8" id="content">
        <div class="widget_container content_page">  
            <?php require_once dirname(__FILE__) . '/include/cat.php'; ?>         
  </div></div>
        
 
          <div class="grid_4 p7ehc-a" id="sidebar">
<?php

			
				
				 $ge_sidebar = '';
				 if (is_search()) {
                      $ge_sidebar = of_get_option('se_sidebar','');
                    }else if(is_category() ) {
						
						$category = get_the_category();						
						
						$cn_sidebar ='';
						foreach($category as $ca_id) {
							if(empty($cn_sidebar)) { $cn_sidebar = of_get_option('cat_'.$ca_id->term_id);}								
							
						}
						
						if(empty($cn_sidebar)) {
							$ge_sidebar = of_get_option('cat_sidebar','');
						} else { $ge_sidebar = $cn_sidebar; }
						
						
					} else if(is_author() ) {
						
						$ge_sidebar = of_get_option('au_sidebar','');
						
					}else if(is_tag() ) {
						
						$tags = get_the_tags();						
						
						$cn_sidebar ='';
						foreach($tags as $tg_id) {
							if(empty($cn_sidebar)) { $cn_sidebar = of_get_option('tag_'.$tg_id->term_id);}								
						}
						 
						if(empty($cn_sidebar)) {
							$ge_sidebar = of_get_option('tag_sidebar','');
						} else { $ge_sidebar = $cn_sidebar; }
					}				
					
					
					
				$dyn_sidebar ='';
				if(!empty($ge_sidebar)) {	$dyn_sidebar = $ge_sidebar;	};				
				
				foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
					if($sidebar['name'] == $dyn_sidebar)
			  			{
							 $dyn_sidebar = $sidebar['id'];
						}
				} 
				
				if(!empty($dyn_sidebar)) {
					if (is_active_sidebar($dyn_sidebar)) : dynamic_sidebar($dyn_sidebar);
		            endif;	
				} else{
					if (is_active_sidebar('center-sidebar')) : dynamic_sidebar('center-sidebar');
		            endif;
				}
					
					
?>  
       </div>
       
    <div class="clear"></div>
        
    </div>
</div>
 </section>
<!-- end content --> 