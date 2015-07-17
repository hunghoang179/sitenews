<?php
/*
  Template Name: Home page
 */
?>

<?php get_header(); ?>
 
   
   <!-- Start Slider -->
<div class="row">
	<!--slider with list post-->
<div class="grid_12 nivo_slider_list_small">
<div class="widget_container">
		        <div class="slider-wrapper-content theme-default">
            <div id="slider" class="nivoSlider nivoSlider_content">
    <?php
	$cats="";
	$number_slider= of_get_option('slider_number');
	$category_slider= of_get_option('slider_category_select');
	
	$cats = '';
	if(!empty($category_slider)) {
		
	foreach($category_slider as $key=>$value) { if($value == 1) { $cats[] = $key; } }	
	}
	
	
	$themeloyw_args = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
        );
     $themeloy_widget = null;	
        $themeloy_widget = new WP_Query($themeloyw_args);
		$i=0;
		 while ($themeloy_widget->have_posts()) {
            $themeloy_widget->the_post();
			$i++;
			$post_id = get_the_ID();
			?>
         
<a  href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">              
<?php if ( has_post_thumbnail()) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'slider-normal' );
					?>
					<img src="<?php echo $image[0]; ?>" title="<?php echo '#htmlcaption-slide'.$i;?>" data-transition="<?php echo of_get_option('slider_effect_option');?>" />	
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/slider-image.jpg'.'" title="#htmlcaption-slide'.$i.'">';} ?>
</a>
<?php }?>
</div>
 
        
   
   <?php
		$i=0;
		 while ($themeloy_widget->have_posts()) {
            $themeloy_widget->the_post();
		$i++;
			?>
                
         <div id="htmlcaption-slide<?php echo $i;?>" class="nivo-html-caption">
         <?php $post_cat = get_post_custom_values('cat_themeloy_select', get_the_ID());
		 $post_cat = ($post_cat[0] != '') ? $post_cat[0] : of_get_option('blog_category_post');
		 if($post_cat == '1'){echo '<p class="cat-slider">'; echo the_category(', ').'</p>';}?>

          <div class="caption-slider-text">
             <h5><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h5>
              <?php echo themeloy_single_post_meta(get_the_ID());?>              							
              							<?php 
							    $post_review = get_post_custom_values('enable_review_themeloy_select', $post_id); 
								$post_review = ($post_review[0] != '') ? $post_review[0] : of_get_option('enable_all_review');
								$total_review = absint(themeloy_get_total_review($post_id));
							    if($post_review == '1'){
							   ?>
      <div class="ratings">
<div class="rating-box">
<div class="rating" style="width:<?php echo themeloy_get_total_review(get_the_ID()); ?>%"></div>
</div>
</div>

 <?php }?>   
 </div>   
 <div class="clear"></div>                                   

</div>
<?php }?>       
<?php wp_reset_query();?>
            </div>  
               
        


<div class="list_post_vertical slider_post_list_right_small" id="slider_post_list_right">
  <ul>          
                
       <?php
	$cats_right="";
	$number_slider_right= of_get_option('number_slider_right');
	$category_slider_right= of_get_option('category_on_right_slider');
	
	$cats_right = '';
	if(!empty($category_slider_right)) {
		
	foreach($category_slider_right as $key=>$value) { if($value == 1) { $cats_right[] = $key; } }	
	}
	
	
	$themeloyw_args = array(
            'showposts' => $number_slider_right,
            'category__in' => $cats_right,
        );
     $themeloy_widget = null;	
        $themeloy_widget = new WP_Query($themeloyw_args);
		$i=0;
		 while ($themeloy_widget->have_posts()) {
            $themeloy_widget->the_post();
			$i++;
			$post_id = get_the_ID();
			?>                     
     <li>
       <?php
                                    $post_date = get_post_custom_values('date_themeloy_select', get_the_ID()); 
									$post_date = ($post_date[0] != '') ? $post_date[0] : of_get_option('blog_date_post');
                                 if($post_date == '1'){
	 ?>
     <div class="feature_post_style">
                        <span class="post_date"><span class="date_number"><?php echo get_the_date('d');?></span> <?php echo get_the_date('M');?>
                        <i class="icon-caret-right feature-icon-right"></i>
                        </span>
                        <span class="post_time"><i class="icon-time"></i> <?php echo get_the_time('H:i');?></span>
                        </div>
                        <?php }?>
<div class="feature-link feature-item">                      
<a  href="<?php the_permalink(); ?>" rel="bookmark"  class="feature-link" title="<?php the_title_attribute(); ?>">              
<?php if ( has_post_thumbnail()) {the_post_thumbnail('medium-feature');}
else{echo '<img src="'.get_template_directory_uri().'/images/demo/medium-feature.jpg'.'">';} ?>
</a>
<?php echo themeloy_post_type(); ?>
</div>
       
                       <div class="list_desc">
                           <h4 class="list_title"><a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
                            </a></h4>
                           
                   <?php echo themeloy_feature_post_meta(get_the_ID());?>
							<?php 
							    $post_review = get_post_custom_values('enable_review_themeloy_select', $post_id); 
								$post_review = ($post_review[0] != '') ? $post_review[0] : of_get_option('enable_all_review');
								$total_review = absint(themeloy_get_total_review($post_id));
							    if($post_review == '1'){
							   ?>
<div class="ratings">
<div class="rating-box">
<div class="rating" style="width:<?php echo themeloy_get_total_review(get_the_ID()); ?>%"></div>
</div>
</div>
 <?php }?> 
                        
                        </div>                     
<div class="clear"></div>
</li>
            
  <?php }?>
         
            
                            
			

   </ul>
            </div>


                
        </div>
        </div>
        
<!-- end slider with list post-->        
</div>
<!-- End Slider -->


<!-- Start content -->
<section id="contents" class="clearfix">

<?php if(of_get_option('carousel_homepage_normal_option')){
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
