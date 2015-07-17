  
    <?php
                    if (is_search()) {
                        echo '<h3 class="categories-title title">';
                        _e('Result for: ', 'tl_back');
                        the_search_query();
                        echo '</h3>';
                    }else if(is_category() ) {
							echo '<h3 class="categories-title title">';
							_e('Category Archive: ', 'tl_back');
							 the_category(', ');
							echo '</h3>';
					} else if(is_author() ) {
							echo '<h3 class="categories-title title">';
							_e('Author Archive: ', 'tl_back');
							 the_author();
							echo '</h3>';
					}else if(is_tag() ) {
							echo '<h3 class="categories-title title">';							
							_e('Tag Archive: ', 'tl_back');
							 the_tags('');
							echo '</h3>';
					}
                    ?>
                    <div class="post_list_medium_widget ">
                    <div class="<?php if(of_get_option('blog_layout') == 'blog_layout2'){echo "post_list_medium_style1";}else{echo "post_list_medium";}?>">
                    
                    <?php if (have_posts()){ 
						$row_count=0; 
						while (have_posts()){ the_post(); 
                        $row_count++;
						 $post_id = get_the_ID();
                            ?>
                            <div class="list_item <?php if($row_count % 2 == 0){echo "left-column-post";}?>">
                                <div class="entry-thumb feature-item">
                                <a href="<?php the_permalink(); ?>">
                                                             <?php if ( has_post_thumbnail()) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'feature-large' );
	?>
    <img class="image_over cat-feature-large-img" src="<?php echo $image[0]; ?>" />
	<?php }else{echo '<img class="image_over cat-feature-large-img" src="'.get_template_directory_uri().'/images/demo/feature-large.jpg'.'">';} ?>	
    </a>
    	<div class="cat-feature-large">
					<?php $post_cat = get_post_custom_values('cat_themeloy_select', get_the_ID());
		 $post_cat = ($post_cat[0] != '') ? $post_cat[0] : of_get_option('blog_category_post');
		 if($post_cat == '1'){echo '<p class="cat-slider">'; echo the_category(', ').'</p>';}?>
         </div>
                                 <?php echo themeloy_post_type(); ?>
                     
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
                      
                      
                           <h3><a class="title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  /><?php the_title(); ?></a></h3>
                      
                       <?php echo themeloy_post_meta(get_the_ID());?>
                          <?php echo themeloy_short_title(200, get_the_excerpt('')); ?> 
                      
                                
                              
<div class="clear"></div>
                            </div>

                        <?php } ?>
                    <?php }else{ ?>       
                        <?php
                        if (is_search()) {
                            _e('No result found', 'tl_back');
                        }
                        ?>                   
                    <?php } ?>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
                   <?php themeloy_pagination(); ?>  