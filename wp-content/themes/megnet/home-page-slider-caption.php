<?php
/*
  Template Name: Home page slider with caption
 */
?>

<?php get_header(); ?>
 
   
   <!-- Start Slider -->
<div class="row">

<!--slider caption-->
<div class="grid_12 slider-container">
  <?php if(of_get_option('slider_homepage_normal_option')){?>
  <div class="slider-wrapper">
            <div id="slider" class="nivoSlider slider_images">
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
					<img src="<?php echo $image[0]; ?>" title="<?php echo '#sliderCaption'.$i;?>" data-transition="<?php echo of_get_option('slider_effect_option');?>" />	
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/slider-image.jpg'.'" title="#sliderCaption'.$i.'">';} ?>
</a>
<?php }?>


  
  	   </div>
       
<?php
		$i=0;
		 while ($themeloy_widget->have_posts()) {
            $themeloy_widget->the_post();
		$i++;
			?>
        

<div id="sliderCaption<?php echo $i;?>" class="nivo-html-caption">    
<h5><a href="<?php the_permalink(); ?>"><?php the_title()?></a>
<i class="icon-sort-down caption_arrow"></i>
</h5>
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
 <div class="clear"></div>                                   
<p> <?php echo themeloy_short_title(200, get_the_excerpt('')); ?> </p>
<p><a href="<?php the_permalink(); ?>" class="read_more"><?php echo of_get_option('read_more');?></a></p>
</div>
<?php }?>       
<?php wp_reset_query();?>
            </div>  
  <?php }else{echo '<div class="slider_margin"></div>';}?>          
            
    </div>
   <!--end slider caption--> 
     
</div>
<!-- End Slider -->


<!-- Start content -->
<section id="contents" class="clearfix">

<?php if(of_get_option('carousel_homepage_with_caption')){
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
