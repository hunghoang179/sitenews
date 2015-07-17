                    <!-- start post -->
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>" itemscope="" itemtype="http://schema.org/Review">
                                    
                        <?php if (have_posts()) { while (have_posts()) { the_post(); ?>
                                <?php
                                $categories = get_the_category();
                                $tags = get_the_tags();
                                $post_id = get_the_ID();
                                ?>

                                   <h2 itemprop="name" class="entry-title post-title"><?php the_title(); ?></h2>
                                <?php echo themeloy_single_post_meta($post_id);?>
                               <hr class="none" />
                               
                              <?php if(of_get_option('blog_post_feautre') == 1) { ?>
                              <?php $image_feature = wp_get_attachment_url( get_post_thumbnail_id($post_id, 'full') ); ?> 
                              <?php if(!empty($image_feature)) { ?>
                              <img src="<?php echo $image_feature; ?>" alt="<?php the_title(); ?>" />
                              <?php }}?>
                               
                                <div class="post_content"><?php the_content(); ?></div> 
                                                               
							<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'tl_back' ) . '</span>', 'after' => '</div>' ) ); ?>
                            
                            <?php 
							$GLOBALS['sbg_sidebar'] = get_post_meta($post_id, 'sbg_selected_sidebar_replacement', true);  
							
							?>
                          
                        
                         
                                
                               <?php 
							    $post_review = get_post_custom_values('enable_review_themeloy_select', $post_id); 
								$post_review = ($post_review[0] != '') ? $post_review[0] : of_get_option('enable_all_review');
								$total_review = absint(themeloy_get_total_review($post_id));
							    if($post_review == '1'){
							   ?>
                                 <!-- review box -->   
                                <div class="reviewbox">
                                <div class="review_header"><h3> <span itemprop="itemreviewed"><?php echo of_get_option('term_review'); ?> </span></h3></div>
                                  <ul class="progress-bar">
                              <?php 
										for($i=0; $i<10; $i++) 
										{
											$rate_value = 'criteria'.$i.'themeloy_slider';
											$text_value = 'criteria'.$i.'themeloy_text';
											
											$rate = get_post_custom_values($rate_value);
											$rating_text = get_post_custom_values($text_value);
											
											if(!empty($rate[0]) && !empty($rating_text[0]) && $rate[0] >0)
											{
											?>
                                <li class="meter">
                                  <div class="meter-content" style="width:<?php echo $rate[0]; ?>%"></div>
                                  <span class="meter-title"><?php echo $rating_text[0]; ?> - <?php echo $rate[0]; ?>%</span>
                                  </li>
                           
                           <?php 
						   		}
						  	 }
						   ?>
                              
                              <li class="meter">
                                  <div class="meter-content" style="width:<?php echo themeloy_get_total_review($post_id); ?>%"></div>
                                  <span class="meter-title"><?php _e('Total Score', 'tl_back'); ?> <?php echo $total_review; ?>%</span>
                                  </li>
                              
                                </ul>
                                
                <div itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                  <meta itemprop="worstRating" content = "1">
                  <meta itemprop="ratingValue" content = "<?php echo $total_review / 20;?>">
                  <meta itemprop="bestRating" content = "5">
                </div>	
								
                                
                                
                                   <?php if($review_summer = get_post_custom_values('review_themeloy_wysiwyg')){?>
                                <div class="review-summery">
                                  <h4><?php $review_title = get_post_custom_values('reviewtitlethemeloy_text'); echo $review_title[0]; ?></h4>
                                  <?php echo $review_summer[0]; ?>
                                  </div>
                                  <?php }?>                                 
                                 
                              
                              <?php 
							    $post_user_review = get_post_custom_values('enable_user_review_themeloy_select', $post_id); 
								$post_user_review = ($post_user_review[0] != '') ? $post_user_review[0] : of_get_option('enable_all_user_review');
							    if($post_user_review == '1'){
							   ?>
                              <!-- user review box --> 
                                <div class="clearfix"></div>
                                <div class="votebox">
                                	 <div id="votecount"><img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif"  /> <span class="user-rate-summery"> <?php _e('User rating: ', 'tl_back'); ?> </span> <span class="vote-per"><?php echo themeloy_get_user_review($post_id); ?></span>% ( <span class="vote-count"><?php echo $user_vote = absint(get_post_meta($post_id,'votes_count', true ));  ?></span> </div> 
                                     <span class="vote-label"><?php _e(' votes )', 'tl_back'); ?></span>
                                     
                                     <div id="star" data-readonly="<?php echo themeloy_vote_response($post_id); ?>" data-score="<?php echo (themeloy_get_user_review($post_id) / 20); ?>" data-postid="<?php the_ID(); ?>" data-path="<?php echo get_template_directory_uri(); ?>/images">
                                </div> 
                                </div>
                      		  <!-- close user review box -->
                               <?php }?>  
                                  
                                 </div>
                                 <!-- close review box --> 
                                 <?php }?>
                                
                                
                                <hr class="none" />
                               <?php 
							    $post_tag = get_post_custom_values('tag_themeloy_select', $post_id); 
								$post_tag = ($post_tag[0] != '') ? $post_tag[0] : of_get_option('blog_tag_post');
							    if($post_tag == '1'){
							   ?>
                             
                                <ul class="tag-cat">                                                               
                                    <li><?php if (!empty($tags)){ ?><?php the_tags('', ' '); ?></li> <?php } ?>                                                          
                                </ul>
                                <?php }?>
                                
                                
                                         
                                 
              <div class="clear"></div>
                                
                           <?php 
							    $post_share = get_post_custom_values('share_themeloy_select', $post_id); 
								$post_share = ($post_share[0] != '') ? $post_share[0] : of_get_option('blog_share_post');
							    if($post_share == '1'){
							   ?>
                            <div class="share-post">
                                 <ul>                                                
<li>
<div id="fb-root"></div>
<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
</li>                                   
<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="" data-lang="en">tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li> 
<li>
<div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>
			<script type='text/javascript'>
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
</li>
                               <li><script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php echo get_permalink(); ?>" data-counter="right"></script></li>     

                              <li style="width:80px;"><script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script><a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&amp;media=<?php $thumb = get_post_thumbnail_id(get_the_ID()); if($thumb){echo $thumb;}?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="http://assets.pinterest.com/images/PinExt.png" title="Pin It"/></a></li>                 
              </ul>
             <div class="clear"></div>
             
              </div>
                            <?php }?>
                            
                           
                           
               
                          
                        
                        <?php 
							    $post_nav_single = get_post_custom_values('post_nav_themeloy_select', $post_id); 
								$post_nav_single = ($post_nav_single[0] != '') ? $post_nav_single[0] : of_get_option('blog_nav');
							    if($post_nav_single == '1'){
							   ?>
                            <div class="postnav">
                                       
                            
                                <?php
                                $next_post = get_next_post();
								
                                if (!empty($next_post)){
									
                                    ?>
                                    <a href="<?php echo get_permalink($next_post->ID); ?>" id="prepost"><span class="previouspost"><i class="icon-double-angle-left"></i></span><?php echo $next_post->post_title; ?></a>

                                <?php }; ?>

                                <?php
								
                                $prev_post = get_previous_post();
                                if (!empty($prev_post)){
								
                                    ?>
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>" id="nextpost"><?php echo $prev_post->post_title; ?><span class="nextpost"><i class="icon-double-angle-right"></i></span></a>
                                <?php }; ?>
                                
                                
                                
                            </div>
                         <?php }?>
                            <hr class="none">
                        
                        
                            
                            <?php 
							    $post_author_box = get_post_custom_values('author_box_themeloy_select', $post_id); 
								$post_author_box = ($post_author_box[0] != '') ? $post_author_box[0] : of_get_option('blog_author');
							    if($post_author_box == '1'){
							   ?>
                            <div class="auth">
                            <div class="author-info">                                       
                                 <div class="author-avatar"><?php echo get_avatar(get_the_author_meta('user_email'), 90); ?></div> 
                                    <div class="author-description"><h5><a itemprop="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></h5>
                                <p><?php echo get_the_author_meta('description'); ?></p>
                                
                                      <ul class="author-social clearfix">
                               <?php if ((get_the_author_meta('aim')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('aim'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/aim.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('yim')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('yim'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/yahoo_im.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('jabber')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('jabber'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/google_talk.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('rss')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('rss'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/rss.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('pinterest')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('pinterest'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/pinterest.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('devianart')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('devianart'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/deviantart.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('dribble')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('dribble'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/dribbble.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('behance')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('behance'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/behance.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('youtube')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('youtube'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/youtube.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('flickr')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('flickr'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/flickr.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('instagram')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('instagram'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/instagram.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('github')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('github'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/GitHub.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('twitter')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('twitter'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/twitter.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('facebook')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('facebook'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/facebook.png"></a></li>
                               <?php }?>
                                <?php if ((get_the_author_meta('googleplus')) != ''){ ?>
                               <li><a href="<?php echo get_the_author_meta('googleplus'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/gplus.png"></a></li>
                               <?php }?>
                               </ul>
                                </div>
                                 </div>
                            </div>
                            <?php } ?>
                            
                        <?php } // end of the loop.   ?>                    

                    <?php } ?>
                  
                   <?php 
							    $related_post_box = get_post_custom_values('related_post_themeloy_select', $post_id); 
								$related_post_box = ($related_post_box[0] != '') ? $related_post_box[0] : of_get_option('blog_related');
							    if($related_post_box == '1'){
							   ?>
                    <div class="relativepost clearfix">
                        <h5><?php echo of_get_option('rela_articles'); ?></h5>

                        <?php
                        $themeloy_tags = null;
                        if (!empty($tags)) {
                            foreach ($tags as $tag) {
                                $themeloy_tags[] = $tag->term_id;
                            }
                        };
                        $arg_tag = array('tag__in' => $themeloy_tags, 'showposts' => of_get_option('blog_related_num'), 'post__not_in' => array($post_id));
                        $post_query = null;
                        $post_query = new WP_Query($arg_tag);
                        echo "<ul  class=\"ulpost picture\">\n";


                        while ($post_query->have_posts()) {
                            $post_query->the_post();
							$post_id = get_the_ID();
                            ?>
                            <li class="feature-item">
                                <?php            						
                                echo '<a  class="entry-thumb feature-link" href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
                               if ( has_post_thumbnail()) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'main-square' );
							    ?>
 <img src="<?php echo $image[0]; ?>" />
<?php }else{echo '<img src="'.get_template_directory_uri().'/images/demo/main-square.jpg'.'">';} ?>
<?php echo themeloy_post_type(); ?>

 </a>
                                <div class="ulpost_title">
                                    <a class="title related-title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>">
									<?php the_title(); ?>
                                    
                                    </a>
                                 
                                </div>
                              
                            </li>
                            <?php
                        }

                        wp_reset_query();

                        echo "</ul>\n";
                        ?>

                    </div>                  
                    <?php } ?>        
                  
					<hr class="none" />

                    <!-- comment -->
                    <?php comments_template('', true); ?>
                    
                    </div>
                  <!-- end post --> 


            