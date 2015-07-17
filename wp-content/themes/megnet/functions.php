<?php
define('THEMELOY', get_template_directory_uri());

add_action('after_setup_theme', 'setup_language');
function setup_language(){
    load_theme_textdomain('tl_back', get_template_directory() . '/languages');
}

if (!function_exists('optionsframework_init')) {
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
    require_once dirname(__FILE__) . '/inc/options-framework.php';
}


//load widget
require_once dirname(__FILE__) . '/inc/widget/init.php';

//load widget
require_once dirname(__FILE__) . '/inc/functions/shortcode/shortcodeinit.php';

//load metabox
require_once dirname(__FILE__) . '/inc/functions/meta-box/meta-box.php';

//load metabox
require_once dirname(__FILE__) . '/inc/functions/aqua-page-builder-master/aq-page-builder.php';

//load sidebar generator
require_once dirname(__FILE__) . '/inc/functions/sidebar_generator.php';

//load user rating
require_once dirname(__FILE__) .'/inc/functions/user-rating.php';



// Post thumbnail support
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_image_size('slider-normal', 725, 430, true);
	add_image_size('feature-large', 415, 280, true);
	add_image_size('medium-feature', 130, 100, true);
	add_image_size('small-feature', 100, 80, true);
	add_image_size('slider-left-small', 335, 450, true);
	add_image_size('main-square', 335, 300, true);
}


// Author contact info
function extra_contact_info($contactmethods) {
$contactmethods['rss'] = 'Rss feed';
$contactmethods['pinterest'] = 'Pinterest';
$contactmethods['devianart'] = 'Devianart';
$contactmethods['dribble'] = 'Dribble';
$contactmethods['behance'] = 'Behance';
$contactmethods['youtube'] = 'Youtube';
$contactmethods['flickr'] = 'Flickr';
$contactmethods['instagram'] = 'Instagram';
$contactmethods['github'] = 'Github';
return $contactmethods;
}
add_filter('user_contactmethods', 'extra_contact_info');



//count review
function themeloy_single_post_meta($post_id) {
                                    $post_date = get_post_custom_values('date_themeloy_select', $post_id); 
									$post_comment = get_post_custom_values('comment_themeloy_select', $post_id); 
									$post_cat = get_post_custom_values('cat_themeloy_select', $post_id);
									$post_author = get_post_custom_values('author_themeloy_select', $post_id);
									
									$post_date = ($post_date[0] != '') ? $post_date[0] : of_get_option('blog_date_post');
									$post_comment = ($post_comment[0] != '') ? $post_comment[0] : of_get_option('blog_comment_post');
									$post_cat = ($post_cat[0] != '') ? $post_cat[0] : of_get_option('blog_category_post');
									$post_author = ($post_author[0] != '') ? $post_author[0] : of_get_option('blog_author_name');

                               echo'<p class="post-meta">';
                                 if($post_date == '1'){echo '<span class="date updated"><i class="icon-time"></i>'.get_the_date('M d, Y').'</span>';}
                                 if($post_author == '1'){echo '<span class="vcard author meta-user"><span class="fn"><i class="icon-user"></i>'; echo the_author_posts_link().'</span></span>';}
                                if($post_cat == '1'){echo '<span class="meta-cat"><i class="icon-book"></i>'; echo the_category(', ').'</span>';}
                               if($post_comment == '1'){echo '<span class="meta-comment last-meta">'; echo comments_popup_link(__('<i class="icon-comments"></i>0', 'tl_back'), __('<i class="icon-comments"></i>1', 'tl_back'), __('<i class="icon-comments"></i>%', 'tl_back')).'</span>'; }
                                     echo'</p>';	
}

function themeloy_post_meta($post_id) {
                                    $post_date = get_post_custom_values('date_themeloy_select', $post_id); 
									$post_comment = get_post_custom_values('comment_themeloy_select', $post_id); 
									$post_author = get_post_custom_values('author_themeloy_select', $post_id);
									
									$post_date = ($post_date[0] != '') ? $post_date[0] : of_get_option('blog_date_post');
									$post_comment = ($post_comment[0] != '') ? $post_comment[0] : of_get_option('blog_comment_post');
									$post_author = ($post_author[0] != '') ? $post_author[0] : of_get_option('blog_author_name');

                               echo'<p class="post-meta">';
                                 if($post_date == '1'){echo '<span class="date updated"><i class="icon-time"></i>'.get_the_date('M d, Y').'</span>';}
                                 if($post_author == '1'){echo '<span class="meta-user"><i class="icon-user"></i>'; echo the_author_posts_link().'</span>';}
                               if($post_comment == '1'){echo '<span class="meta-comment last-meta">'; echo comments_popup_link(__('<i class="icon-comments"></i>0', 'tl_back'), __('<i class="icon-comments"></i>1', 'tl_back'), __('<i class="icon-comments"></i>%', 'tl_back')).'</span>'; }
                                     echo'</p>';	
}

function themeloy_feature_post_meta($post_id) {
									$post_comment = get_post_custom_values('comment_themeloy_select', $post_id); 
									$post_author = get_post_custom_values('author_themeloy_select', $post_id);


									$post_comment = ($post_comment[0] != '') ? $post_comment[0] : of_get_option('blog_comment_post');
									$post_author = ($post_author[0] != '') ? $post_author[0] : of_get_option('blog_author_name');

                               echo'<p class="post-meta">';
                                 if($post_author == '1'){echo '<span class="meta-user">Post by: '; echo the_author_posts_link().'</span>';}
                               if($post_comment == '1'){echo '<span class="meta-comment last-meta">'; echo comments_popup_link(__('<i class="icon-comments"></i>0', 'tl_back'), __('<i class="icon-comments"></i>1', 'tl_back'), __('<i class="icon-comments"></i>%', 'tl_back')).'</span>'; }
                                     echo'</p>';	
}

function themeloy_post_meta_date($post_id) {
									 $post_date = get_post_custom_values('date_themeloy_select', $post_id);
									 $post_date = ($post_date[0] != '') ? $post_date[0] : of_get_option('blog_date_post');


                               echo'<p class="post-meta">';
							   if($post_date == '1'){echo '<span class="date updated"><i class="icon-time"></i>'.get_the_date('M d, Y').'</span>';}
                                     echo'</p>';	
}


//count review
function themeloy_get_total_review($post_id) {
    $total = 0;
    for ($i = 1; $i < 10; $i++) {
        $text = 'criteria' . $i . 'themeloy_slider';
        $slider_value = get_post_custom_values($text, $post_id);
        $divi = $i;
        if ($slider_value[0] == '' || $slider_value[0] == 0) {
            $i = 10;
        } else {
            $total = $slider_value[0] + $total;
        }
    }
	if($total == 0) 
	{ 
		return 0;
	} else {
		 return $total / ($divi - 1);
	}
   
}

//register menu
function themeloy_register_menu() {
    register_nav_menus(
            array(
                'Main_Menu' => 'Main menu',
                'Top_Menu' => 'Top menu',
                'Footer_Menu' => 'Bottom footer menu'
            )
    );
}

add_action('init', 'themeloy_register_menu');


// Add support to post and comment RSS feed links to head
add_theme_support( 'automatic-feed-links' );	

//Author contact
function themeloy_new_contactmethods($contactmethods) {
// Add Twitter
    $contactmethods['twitter'] = 'Twitter';
//add Facebook
    $contactmethods['facebook'] = 'Facebook';
//add google plus
    $contactmethods['googleplus'] = 'Googleplus';

    return $contactmethods;
}

// Set the max content width
if ( ! isset( $content_width ) ){ $content_width = 960; }

add_filter('user_contactmethods', 'themeloy_new_contactmethods', 10, 1);



function themeloy_sidebar_register() {


    register_sidebar(array(
        'name' => __('General Sidebar', 'tl_back'),
        'id' => 'center-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
	
   register_sidebar(array(
        'name' => __('Carousel post sidebar', 'tl_back'),
        'id' => 'carousel-sidebar',
        'before_widget' => '<div id="%1$s" class="widget carousel_horizontal_small">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
 
    register_sidebar(array(
        'name' => __('Header top sidebar', 'tl_back'),
        'id' => 'banner-sidebar',
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer1 Sidebar', 'tl_back'),
        'id' => 'footer1-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer2 Sidebar', 'tl_back'),
        'id' => 'footer2-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer3 Sidebar', 'tl_back'),
        'id' => 'footer3-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

 
}

add_action('init', 'themeloy_sidebar_register');

// Get image attachment (sizes: thumbnail, medium, full)
function themeloy_get_thumbnail($postid=0, $size='full') {
	if ($postid<1) 
	$postid = get_the_ID();
	$thumb = '';
	if(version_compare(get_bloginfo('version'), '2.9') >= 0) {
		if(!$thumb && has_post_thumbnail($postid) && function_exists( 'the_post_thumbnail' ) ) {
			$post_thumbnail_id = get_post_thumbnail_id( $postid );
			$image = wp_get_attachment_image_src( $post_thumbnail_id, $size );
			$thumb = $image[0];
		}
	}

	if ($thumb != null or $thumb != '') {
		return $thumb; 
	} elseif ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => '1',
		'post_mime_type' => 'image', ))) {
		foreach($images as $image) {
			$thumbnail=wp_get_attachment_image_src($image->ID, $size);
			return $thumbnail[0]; 
		}
	}
	
}



if ( ! function_exists( 'themeloy_comment' ) ) :
function themeloy_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'tl_back'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'tl_back'), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'tl_back') . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'tl_back'), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tl_back'); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'tl_back'), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'tl_back'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


?>
<?php		

/*==============================================================
 *  
 *                      Pagination
 *  
 ===============================================================*/
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="page"';
}
// replace next_posts_link() and previous_posts_link() with custom pagination
function themeloy_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     
      if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
	     echo previous_posts_link('PREV'); 
         
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"page currentpage\">".$i."</span>":'<a href="'.get_pagenum_link($i).'" class="page" >'.$i.'</a>';
             }
         }

    
	   echo  next_posts_link('NEXT');
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
		{ 
			echo '<a href="' .get_pagenum_link($pages).'" class="page">'.__('LAST', 'tl_back').'</a>'; 
		}
		
		 
         echo "</div>\n";
		
     }
}


// replace next_posts_link() and previous_posts_link() with custom pagination
function themeloy_pagination_template($pages = '', $range = 2, $query='')
{  
     $showitems = ($range * 2)+1;  

     global $paged;
	 
	if ( get_query_var('paged') ) {
  $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
  $paged = get_query_var('page');
} else {
  $paged = 1;
}

     if($pages == '')
     {
         global $query;
         $pages = $query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
	     echo previous_posts_link('PREV'); 
         
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"page currentpage\">".$i."</span>":'<a href="'.get_pagenum_link($i).'" class="page" >'.$i.'</a>';
             }
         }

    
	   echo  next_posts_link('NEXT');
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
		{ 
			echo '<a href="' .get_pagenum_link($pages).'" class="page">'.__('LAST', 'tl_back').'</a>'; 
		}
		
		 
         echo "</div>\n";
		
		
     }
}

	 /* ============================================================
	 *			
	 *						Post Format
	 *					
	 *============================================================== */
	 
add_theme_support( 'post-formats', array('gallery','video','audio' ) );
function themeloy_post_type()
{
    
    if(has_post_format( 'gallery' )){
        $symbol = '<span class="overlay_icon icon-picture"></span>';
    }elseif(has_post_format('video')){
         $symbol = '<span class="overlay_icon icon-play-circle"></span>';
    }elseif(has_post_format('audio')){
         $symbol = '<span class="overlay_icon icon-volume-up"></span>';
    }else{
        $symbol ='';
    } 
    return $symbol;    
}

    /* ==============================================================
     *  
     *                      Short Title
     *  
      =============================================================== */
function themeloy_short_title($limit, $text){
$chars_limit = $limit;
$chars_text = strlen($text);
$text = $text." ";
$text = substr($text,0,$chars_limit);
$text = substr($text,0,strrpos($text,' '));
if ($chars_text > $chars_limit){$text = $text."...";}
return $text;
}

    /* ==============================================================
     *  
     *                      Breadcrumbs
     *  
      =============================================================== */
	  	
	function the_breadcrumb() {
        echo '<ul class="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo '</a> <i class="icon-caret-right"></i></li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' <i class="icon-caret-right"></i></li><li> ');
            if (is_single()) {
                echo ' <i class="icon-caret-right"></i></li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li>';
            echo the_title();
            echo '</li>';
        }
		elseif (is_search()) {
            echo '<li>';
            echo the_search_query();
            echo '</li>';
        }
		 elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>"; the_author(); echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    }
   
    echo '</ul>';
}
	
	/* =========================================================
	 *							
	 *						Scripts
	 *
	 ===========================================================*/

// used for icon font on ie 7
function add_ie_iconfont () {
    echo '<!--[if IE 7]>';
    echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/font-awesome-ie7.min.css" media="screen">';
    echo '<![endif]-->
    ';
}
add_action('wp_head', 'add_ie_iconfont');	
	 
// used for html5 on ie 9
function add_ie_html5 () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->
    ';
}
add_action('wp_head', 'add_ie_html5');	  

function themeloy_enqueue_style() {
	wp_enqueue_style( 'base', get_template_directory_uri().'/css/base.css', false, '1.2' ); 
	wp_enqueue_style( 'grid', get_template_directory_uri().'/css/amazium.css', false, '1.2' ); 
	wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', false, '1.2' );
	wp_enqueue_style( 'shortcode', get_template_directory_uri().'/css/shortcode.css', false, '1.2' );   
	wp_enqueue_style( 'nivoslider', get_template_directory_uri().'/css/nivo-slider.css', false, '1.2' );
	wp_enqueue_style( 'flex', get_template_directory_uri().'/css/flexslider.css', false, '1.2' ); 
	wp_enqueue_style( 'awesome-font', get_template_directory_uri().'/css/font-awesome.min.css', false, '1.2' );
	wp_enqueue_style( 'mediaelement-css', get_template_directory_uri().'/css/mediaelementplayer.css', false, '1.2' );
	wp_enqueue_style( 'carousel', get_template_directory_uri().'/css/skin.css', false, '1.2' );
	wp_enqueue_style( 'layout', get_template_directory_uri().'/css/layout.css', false, '1.2' );
	wp_enqueue_style( 'custom-style', get_template_directory_uri().'/custom.php', false, '1.2','all' ); 
}
       
function themeloy_enqueue_script() {
	wp_enqueue_script( 'jquery', get_template_directory_uri().'/js/jquery-1.8.2.js', false, '1.2', true );
	wp_enqueue_script( 'nivoslider', get_template_directory_uri().'/js/jquery.nivo.slider.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'flex', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui-1.8.20.custom.min.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'totop', get_template_directory_uri().'/js/jquery.ui.totop.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'selectnav', get_template_directory_uri().'/js/selectnav.min.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'jcarousel', get_template_directory_uri().'/js/jquery.jcarousel.min.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'simplyscroll', get_template_directory_uri().'/js/jquery.simplyscroll.min.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'nicescroll', get_template_directory_uri().'/js/jquery.nicescroll.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'superfish', get_template_directory_uri().'/js/superfish.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri().'/js/jquery.sticky.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'mediaelement-player', get_template_directory_uri().'/js/mediaelement-and-player.min.js', array('jquery'), '1.2', true );
	wp_enqueue_script( 'custom', get_template_directory_uri().'/js/custom.js', array('jquery'), '1.2', true );

}
add_action( 'wp_enqueue_scripts', 'themeloy_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeloy_enqueue_script' );
	
    ?>
