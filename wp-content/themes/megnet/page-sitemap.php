<?php 
/*
Template Name: Sitemap Page
*/
?>
<?php get_header(); ?>
  

<section id="contents" class="clearfix">
<div class="row main_content">
<!-- begin content -->            

<div class="content_wraper">
   <!-- Start content -->
  <?php the_breadcrumb(); ?>
    <div class="grid_8 p7ehc-a" id="content">
 <div class="widget_container content_page"> 
         
	<div id="content">
				
		<?php if ( ! have_posts() ) : ?>
			<div id="post-0" class="post not-found item-list">
				<h1 class="entry-title"><?php _e( 'Not Found', 'tl_back' ); ?></h1>
				<div class="entry">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'tl_back' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<?php $get_meta = get_post_custom($post->ID);  ?>
		
		<article class="item-list post">
			<div class="post-inner">
				<h3 class="page-title"><?php the_title(); ?></h3>
				<p class="post-meta"></p>
				<div class="clear"></div>
				<div class="entry">
                <div class="post_content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tl_back' ), 'after' => '</div>' ) ); ?>
					
					<div id="sitemap">
						<div class="sitemap-col">
							<h2><?php _e('Pages','tl_back'); ?></h2>
							<ul id="sitemap-pages"><?php wp_list_pages('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->
							
						<div class="sitemap-col">
							<h2><?php _e('Categories','tl_back'); ?></h2>
							<ul id="sitemap-categories"><?php wp_list_categories('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->
							
						<div class="sitemap-col">
							<h2><?php _e('Tags','tl_back'); ?></h2>
							<ul id="sitemap-tags">
								<?php $tags = get_tags();
								if ($tags) {
									foreach ($tags as $tag) {
										echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
									}
								} ?>
							</ul>
						</div> <!-- end .sitemap-col -->
												
					</div> <!-- end #sitemap -->
						
				</div><!-- .entry /-->	
			</div> 
			</div><!-- .post-inner -->
		</article><!-- .post-listing -->
		<?php endwhile; ?>
	</div><!-- .content -->
<div class="brack_space"></div>
        </div>

  </div>
  <!-- End content -->
  
          
    <!-- Start sidebar -->
	<div class="grid_4 p7ehc-a" id="sidebar">

                <?php
                if (is_active_sidebar('center-sidebar')) : dynamic_sidebar('center-sidebar');
                endif;
                ?>
  </div>
  <!-- End sidebar -->

          
        
    </div>
</div>
 </section>
<!-- end content --> 

<?php get_footer(); ?>