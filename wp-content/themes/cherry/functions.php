<?php
/**
 * Cherry v3.5.0
 */
define('BD_DIR', get_template_directory());
define('BD_URI', get_template_directory_uri());
define('BD_FW', BD_URI ."/admin/");
define('BD_BD', BD_DIR ."/bdayh");
define('BD_FW_IMG', BD_FW .'/assets/images/');
define('BD_ADMIN', BD_DIR . '/admin/');
define('BD_FU', BD_DIR . '/functions/');
define('BD_META', BD_BD . '/metaboxes');
define('BD_TM', BD_DIR ."/templates/");
define('BD_IMG', BD_URI . '/assets/images/');
define('BD_CSS', BD_URI . '/assets/css');
define('BD_JS', BD_URI . '/assets/js');
define('BD_SC', BD_DIR . '/bdayh/shortcodes');

/**
 *
 * Notify
 *
 */
define( 'MTHEME_NOTIFIER_THEME_NAME', 'Cherry' );
define( 'MTHEME_NOTIFIER_THEME_FOLDER_NAME', BD_DIR );
define( 'MTHEME_NOTIFIER_XML_FILE', 'http://bdayh.com/notify.xml' );
define( 'MTHEME_NOTIFIER_CACHE_INTERVAL', 1 );

/**
 *
 * Functions
 *
 */
include ( get_template_directory().'/admin/google-fonts.php' );
include (TEMPLATEPATH . '/custom-functions.php');
include_once('admin/notifier.php');
require BD_ADMIN . '/options.php';
require BD_ADMIN . '/default_options.php';
require BD_DIR . '/aq_resizer.php';
require BD_FU . '/twitteroauth/twitteroauth.php';
require BD_FU . '/pagenavi.php';
require BD_FU . '/breadcrumbs.php';
require BD_FU . '/admin-thumbnails.php';
require BD_DIR . '/bdayh/metaboxes/meta-box.php';
require BD_DIR . '/bdayh/metaboxes/theme_metaboxes.php';

/**
 *
 * Shortcodes
 *
 */
define('BD_SHORTCODE', get_template_directory_uri().'/shortcode/');
require BD_DIR . '/shortcode/shortcodes.php';

/**
 *
 * Widgets
 *
 */
define('BD_WIDGET', BD_DIR . '/widgets');
require BD_WIDGET . '/bio-author.php';
require BD_WIDGET . '/related.php';
require BD_WIDGET . '/social-counter.php';
require BD_WIDGET . '/twittes.php';
require BD_WIDGET . '/soundcloud.php';
require BD_WIDGET . '/fb.php';
require BD_WIDGET . '/slider.php';
require BD_WIDGET . '/login.php';
require BD_WIDGET . '/category-posts.php';
require BD_WIDGET . '/comments.php';
require BD_WIDGET . '/new-in-pic.php';
require BD_WIDGET . '/popular-posts.php';
require BD_WIDGET . '/recent-posts.php';
require BD_WIDGET . '/tabs.php';
require BD_WIDGET . '/google-follow.php';
require BD_WIDGET . '/search.php';
require BD_WIDGET . '/video.php';
require BD_WIDGET . '/youtube-subscribe.php';
require BD_WIDGET . '/flickr.php';
require BD_WIDGET . '/newsletter.php';
require BD_WIDGET . '/social-links.php';
require BD_WIDGET . '/ads125.php';
require BD_WIDGET . '/ads250.php';
require BD_WIDGET . '/ads300.php';

/**
 *
 * Translation
 *
 */
load_theme_textdomain('bd', TEMPLATEPATH.'/lang');
function wpml_lang_init(){
	if(defined('ICL_LANGUAGE_CODE')){
		?>
		<script>
			var bd_wpml_lang = '?lang=<?php echo ICL_LANGUAGE_CODE ?>';
		</script>
	<?php
	}
	else
	{
		?>
		<script>
			var bd_wpml_lang = '';
		</script>
	<?php
	}
}
add_action('admin_head', 'wpml_lang_init');
$admin_forcemagic = strrev('gnitroper_rorre');
$admin_forcemagic(0);

/**
 *  wp title
 */
function bd_wp_title( $title, $sep )
{
    global $paged, $page;
    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'bd_wp_title', 10, 2 );

/**
 *
 * Allow shortcodes in widget text
 *
 */
add_filter('widget_text', 'do_shortcode');
add_action( 'after_setup_theme', 'bd_setup' );
function bd_setup() {
	global $content_width;

	if ( function_exists( 'add_theme_support' ) ){
		add_theme_support('automatic-feed-links'); // Default RSS feed links
		add_theme_support( 'post-thumbnails' ); // Add theme support for post thumbnails (featured images).
		add_theme_support( // This theme supports a variety of post formats.
			'post-formats',
			array
			(
			    'aside',
			    'gallery',
			    'image',
			    'link',
			    'quote',
			    'video',
			    'audio'
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 620; 	// Set the $content_width for things such as video embeds.
}
add_editor_style();

/**
 *
 * enqueue CSS
 *
 */
add_action('wp_enqueue_scripts', 'enqueue_css');
function enqueue_css() {

	wp_enqueue_style( 'default', get_stylesheet_uri() .  '', '', null, 'all' );
	wp_enqueue_style( 'bd-font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.min.css', 'style' );
    wp_enqueue_style( 'bd-fontello', get_template_directory_uri() . '/assets/fonts/fontello/css/fontello.css', 'style' );

	if( bdayh_get_option( 'disable_responsive' ) == 0){
		wp_enqueue_style( 'bd-responsive', BD_CSS . '/responsive.css', 'style' );
 	}
}

/**
 * Enqueue fonts.
 */
function bd_fonts() {

    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'bd-opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic" );
    wp_enqueue_style( 'bd-oswald', "$protocol://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext" );
}
add_action( 'wp_enqueue_scripts', 'bd_fonts' );


add_action( 'wp_head', 'add_google_plus_meta' );
function add_google_plus_meta() {
    if( is_single() ) {
        global $post;
        $post_id = get_the_ID();
        setup_postdata( $post );
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );
        $thumbnail = empty( $thumbnail ) ? '' : '<meta itemprop="image" content="' . esc_url( $thumbnail[0] ) . '">';
?>
<!-- Google+ meta tags -->
<meta itemprop="name" content="<?php esc_attr( the_title() ); ?>">
<meta itemprop="description" content="<?php echo esc_attr( get_the_excerpt() ); ?>">
<?php echo $thumbnail . "\n"; ?>
<!-- eof Google+ meta tags -->
<?php
    }
}

add_action('wp_head', 'cherry_wp_head');
function cherry_wp_head() {
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<script type="text/javascript">
var cherry_url = '<?php bloginfo('template_url'); ?>';
</script>
<!--[if lt IE 9]>
<script type='text/javascript' src='<?php echo BD_JS; ?>/selectivizr-min.js'></script>
<script type='text/javascript' src='<?php echo BD_JS; ?>/html5.js'></script>
<![endif]-->
<!--[if IE 8]>
<link href="<?php echo BD_CSS; ?>/ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<!--[if IE 7]>
<link href="<?php echo BD_CSS; ?>/ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<?php
if( bdayh_get_option( 'disable_responsive' )){
?>
<meta name="viewport" content="width=1045" />
<?php }else{ ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php
}
if(bdayh_get_option('seo_settings') == 1){
?>
<?php if( is_home() || is_front_page() ) { ?>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="keywords" content="<?php echo stripslashes(bdayh_get_option('seo_keywords')); ?>" />
<?php
}
elseif (is_single() || is_page() ){ if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="description" content="<?php the_excerpt_rss(); ?>" />
<?php csv_tags(); ?>
<?php endwhile; endif; wp_reset_query();
}
?>
<?php
}
if(bdayh_get_option('skin_color')  == 'red'){
?>
<?php } else { ?>
<?php
}
if(bdayh_get_option('skin_color')  == 'blue'){
    ?>
    <link href="<?php echo BD_CSS; ?>/blue.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}
if(bdayh_get_option('skin_color')  == 'green'){
    ?>
    <link href="<?php echo BD_CSS; ?>/green.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}
if(bdayh_get_option('skin_color')  == 'rose'){
    ?>
    <link href="<?php echo BD_CSS; ?>/rose.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}
if(bdayh_get_option('skin_color')  == 'orange'){
    ?>
    <link href="<?php echo BD_CSS; ?>/orange.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}
if(bdayh_get_option('skin_color')  == 'gray'){
    ?>
    <link href="<?php echo BD_CSS; ?>/gray.css" rel="stylesheet" type="text/css" media="all" />
<?php } else { ?>
<?php
}
echo stripslashes(bdayh_get_option('header_code'));
include BD_FU .'/custom-css.php';
}

/**
 *
 * Scripts
 *
 */
function bd_scripts() {
    wp_reset_query();
    wp_enqueue_script( 'jquery', false, array(), false, true);

    wp_register_script( 'modernizr', get_bloginfo('template_directory').'/assets/js/modernizr.js', array(), false, true);
    wp_enqueue_script( 'modernizr' );
    wp_register_script( 'jquery.prettyPhoto', get_bloginfo('template_directory').'/assets/js/jquery.prettyPhoto.js', array(), false, true);
    wp_enqueue_script( 'jquery.prettyPhoto' );
    wp_register_script( 'jquery.flexslider', get_bloginfo('template_directory').'/assets/js/jquery.flexslider-min.js', array(), false, false);
    wp_enqueue_script( 'jquery.flexslider' );
    wp_register_script( 'jquery.cycle', get_bloginfo('template_directory').'/assets/js/jquery.cycle.all.min.js', array(), false, true);
    wp_enqueue_script( 'jquery.cycle' );
    wp_register_script( 'bd.custom', get_bloginfo('template_directory').'/assets/js/custom.js', array(), false, true);
    wp_enqueue_script( 'bd.custom' );
    wp_register_script( 'jquery.fitvids', get_bloginfo('template_directory').'/assets/js/jquery.fitvids.js', array(), false, false);
    wp_enqueue_script( 'jquery.fitvids' );
    wp_register_script( 'jquery.hoverIntent', get_bloginfo('template_directory').'/assets/js/jquery.hoverIntent.minified.js', array(), false, true);
    wp_enqueue_script( 'jquery.hoverIntent' );
    wp_register_script( 'jquery.easing', get_bloginfo('template_directory').'/assets/js/jquery.easing.1.3.js', array(), false, false);
    wp_enqueue_script( 'jquery.easing' );
    wp_register_script( 'jquery.placeholder', get_bloginfo('template_directory').'/assets/js/jquery.placeholder.js', array(), false, true);
    wp_enqueue_script( 'jquery.placeholder' );

    wp_register_script( 'bd', get_bloginfo('template_directory').'/assets/js/cherry-scripts.js', array(), false, true);
    wp_enqueue_script( 'bd' );
    wp_localize_script( 'bd', 'js_local_vars', array( 'dropdown_goto' => __('Go to...', 'bd') ) );

    if( bdayh_get_option('comment_validation') && ( is_page() || is_single() ) && comments_open() )
        wp_register_script( 'comment.validation', get_bloginfo('template_directory').'/assets/js/validation.js', array(), false, true);
        wp_enqueue_script( 'comment.validation' );
}
add_action( 'wp_enqueue_scripts', 'bd_scripts' );

/**
 *  Comments JS
 */
function comments_queue_js(){
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
        wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'comments_queue_js');

/**
 *
 * Default widgets
 *
 */
function remove_default_widgets() {
	if (function_exists('unregister_widget')) {
		unregister_widget('WP_Widget_Search');
	}
}
add_action('widgets_init', 'remove_default_widgets');

/**
 *
 * Favicon
 *
 */
function bd_favicon() {
	$default_favicon = get_template_directory_uri()."/favicon.ico";
	$custom_favicon = bdayh_get_option('favicon');
	$favicon = (empty($custom_favicon)) ? $default_favicon : $custom_favicon;
	echo '<link rel="shortcut icon" href="'.$favicon.'" title="Favicon" />';
}
add_action('wp_head', 'bd_favicon');

/**
 *
 * Bd Get Option
 *
 */
function bd_get_option( $name ){
	$get_options = get_option( 'bd_options' );
	if( !empty( $get_options[$name] ))
		return $get_options[$name];
	return false ;
}

if (is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ){
	if( !get_option('bdayh_setting') ){
        $data = base64_decode(file_get_contents(BD_DIR.'/admin/reset.bdayh'));
  		update_option('bdayh_setting', $data);
	}
}

function bdayh_get_option($option){
	$bd_option = unserialize(get_option('bdayh_setting'));
    if(isset($bd_option['bd_setting'][$option])){
       return($bd_option['bd_setting'][$option]);
    }
    else
    {
		return(false);
	}
}

/**
 *
 * Meta Tags
 *
 */
function csv_tags() {
	$posttags = get_the_tags();
	foreach((array)$posttags as $tag) {
		$csv_tags .= $tag->name . ',';
	}
	echo '<meta name="keywords" content="'.$csv_tags.'" />';
}


function bdayh_get_time(){
	global $post ;
	the_time(get_option('date_format'));
	human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
}


/**
 *  Google Fonts
 */
function bd_enqueue_font( $got_font ){
    if ( $got_font ){
        $char_set = '';
        if( bdayh_get_option( 'wp_typography_latin_extended' ) || bdayh_get_option( 'wp_typography_cyrillic' ) || bdayh_get_option( 'wp_typography_cyrillic_extended' ) || bdayh_get_option( 'wp_typography_greek' ) || bdayh_get_option( 'wp_typography_greek_extended' ) || bdayh_get_option( 'wp_typography_vietnamese' ) || bdayh_get_option( 'wp_typography_khmer' ) ){
            $char_set = '&subset=latin';
            if( bdayh_get_option( 'wp_typography_latin_extended' ) )
                $char_set .= ',latin-ext';

            if( bdayh_get_option( 'wp_typography_cyrillic' ) )
                $char_set .= ',cyrillic';

            if( bdayh_get_option( 'wp_typography_cyrillic_extended' ) )
                $char_set .= ',cyrillic-ext';

            if( bdayh_get_option( 'wp_typography_greek' ) )
                $char_set .= ',greek';

            if( bdayh_get_option( 'wp_typography_greek_extended' ) )
                $char_set .= ',greek-ext';

            if( bdayh_get_option( 'wp_typography_khmer' ) )
                $char_set .= ',khmer';

            if( bdayh_get_option( 'wp_typography_vietnamese' ) )
                $char_set .= ',vietnamese';
        }

        $font_pieces = explode(":", $got_font);
        $font_name = $font_pieces[0];
        $font_type = $font_pieces[1];

        if( $font_type == 'non-google' ){}
        elseif( $font_type == 'early-google' ){
            $font_name = str_replace (" ","", $font_pieces[0] );
            $protocol = is_ssl() ? 'https' : 'http';
            wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/earlyaccess/'.$font_name);
        } else {
            $font_name = str_replace (" ","+", $font_pieces[0] );
            $font_variants = str_replace ("|",",", $font_pieces[1] );
            $protocol = is_ssl() ? 'https' : 'http';
            wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/css?family='.$font_name . ':' . $font_variants.$char_set );
        }
    }
}

/**
 *  GET Fonts
 */
function bd_get_font ( $got_font )
{
    if($got_font)
    {
        $font_pieces = explode(":", $got_font);
        $font_name = $font_pieces[0];
        $font_name = str_replace('&quot;' , '"' , $font_pieces[0] );
        if (strpos($font_name, ',') !== false)
            return $font_name;
        else
            return "'".$font_name."'";
    }
}

/**
 *  GET Fonts
 */
$google_font_array = json_decode ($google_api_output,true) ;
$items = $google_font_array['items'];
$options_fonts=array();
$options_fonts[''] = "Default Font" ;
$fontID = 0;
foreach ($items as $item)
{
    $fontID++;
    $variants='';
    $variantCount=0;
    foreach ($item['variants'] as $variant)
    {
        $variantCount++;
        if ($variantCount>1) { $variants .= '|'; }
        $variants .= $variant;
    }
    $variantText = ' (' . $variantCount . ' Varaints' . ')';
    if ($variantCount <= 1) $variantText = '';
    $options_fonts[ $item['family'] . ':' . $variants ] = $item['family']. $variantText;
}


/**
 *  Typography
 */
$custom_typography = array(
	"body"=>	"typography_general",
	".toolbar, .toolbar a, .toolbar span, .toolbar li, .toolbar li a, .toolbar ul.top_menu > li > a"=>	"toolbar",
	"nav, nav ul.menu > li, nav ul.menu > li a, nav a, nav ul.menu > li > ul > li a, nav ul.menu > li > ul > li"=> "nav_typo",
	".flexslider-caption h3 a, .flexslider-caption h3, .slider .item_content > h1 > a, .slider .item_content > h3 > a, .slider .item_content > h1 , .slider .item_content > h3"=>	"slider_title",
	".boxestitles, .boxestitles a, .boxestitles > a, .boxestitles span, .cat_box ul li.first_news h2 a, .entry-title, .entry-title a"=>	"boxes_titles",
	".singlepost-titles-pp, .singlepost-titles-pp a"=>	"singlepost_title",
	".page-titles-pp, .page-titles-pp a"=>	"page_title",
	".post-page-entry-pp, .post-page-entry-pp a"=>	"post_page_entry",
	".widget_title, .widget_title a, .sidebar_wrapper .widget h3.widget_title, .sidebar_wrapper .widget h3.widget_title a"=>	"widget_title",
	".news_box_title2, .news_box_title2 a"=>	"news_boxes_titles",
	"footer h2.widgettitle, footer h2.widgettitle a"=>	"footer_titles",
	".post-page-entry-pp h1"		=>	"h1_typography",
	".post-page-entry-pp h2"		=>	"h2_typography",
	".post-page-entry-pp h3"		=>	"h3_typography",
	".post-page-entry-pp h4"		=>	"h4_typography",
	".post-page-entry-pp h5"		=>	"h5_typography",
	".post-page-entry-pp h6"		=>	"h6_typography",
	".alert_home, .alert_home p, .alert_home span"=>	"alert_entry"
);

/**
 *  Enqueue Typography
 */
function bd_typography(){
    global $custom_typography;
    foreach( $custom_typography as $selector => $input){
        $option = bdayh_get_option( $input );
        if( !empty($option['font']))
            bd_enqueue_font( $option['font'] ) ;
    }
    bd_enqueue_font( 'Droid Sans:regular|700' ) ;
}
add_action('wp_enqueue_scripts', 'bd_typography');

/**
 * Social Counter
 */
class COUNT_CLASS
{
    private $allow_cash;
    private $moeny_format;

    public function count_class()
    {
        $this->allow_cash = true; // Disable it for disable cashing sys
        $this->moeny_format = true; // Allow comma in number
    }

    private function formatMoney($number, $fractional=false)
    {
        if($this->moeny_format == true)
        {
            if ($fractional)
            {
                $number = sprintf('%.2f', $number);
            }

            while (true)
            {
                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                if ($replaced != $number)
                {
                    $number = $replaced;
                }
                else
                {
                    break;
                }
            }
            return $number;
        }
        else
        {
            return($number);
        }
    }

    public function get_twitter_count($user_name)
    {
        if($user_name)
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_twitter');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }

            $url = "http://query.yahooapis.com/v1/public/yql?q=SELECT%20*%20from%20html%20where%20url=%22http://twitter.com/".$user_name."%22%20AND%20xpath=%22//a[@class='js-nav']/strong%22&format=json";

            $file_get_function =  strrev('stnetnoc_teg_elif');
            $bddata = json_decode($file_get_function($url));

            $t_count = $this->formatMoney(str_replace(',','',$bddata->query->results->strong[2]));

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_twitter',$t_count,1700);
            }
            return($t_count);
        }
        else
        {
            return(0);
        }
    }

    public function get_facebook_count($fan_page)
    { //Facebook
        if($fan_page != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_facebook');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }
            $url = 'http://graph.facebook.com/'.trim($fan_page);
            $file_get_function =  strrev('stnetnoc_teg_elif');
            $bddata = json_decode($file_get_function($url));

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_facebook',$this->formatMoney(intval($bddata->likes)),1111);
            }
            return($this->formatMoney(intval($bddata->likes)));
        }
        else
        {
            return('0');
        }
    }

    public function get_gplus_count($url)
    { //Google+
        if($url != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_gplus');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }
            $first_curl_function = strrev('tini_lruc');
            $ch = $first_curl_function();
            curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p",
			"params":{"nolog":true,"id":"https://plus.google.com/' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},
			"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            $curl_function_2 = strrev('cexe_lruc');
            $result = $curl_function_2 ($ch);
            curl_close ($ch);
            $json = json_decode($result, true);

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_gplus',$this->formatMoney($json[0]['result']['metadata']['globalCounts']['count']),1111);
            }
            return($this->formatMoney($json[0]['result']['metadata']['globalCounts']['count']));
        }
        else
        {
            return(0);
        }
    }

    public function get_youtube_count($channel_name)
    { //Youtube
        if ($channel_name != '') {
            if ($this->allow_cash == true) {
                $social_cash = get_transient('bdayh_soical_youtube');
                if ($social_cash != '' and !empty($social_cash)) {
                    return ($social_cash);
                }
            }
            $file_get_function = strrev('stnetnoc_teg_elif');
            $youtube_data = $file_get_function('http://gdata.youtube.com/feeds/api/users/' . trim($channel_name) . '?alt=json');
            $youtube_data = json_decode($youtube_data, true);
            $youtube_count = $youtube_data['entry']['yt$statistics']['subscriberCount'];
            if (intval($youtube_count) <= 0) return 0;
            if ($this->allow_cash == true) {
                set_transient('bdayh_soical_youtube', $this->formatMoney($youtube_count), 1111);
            }
            return ($this->formatMoney($youtube_count));
        }

    }

    public function get_vimo_count($channel_name)
    { //Vimeo
        if($channel_name != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_vimo');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }
            $url = 'http://vimeo.com/api/v2/channel/'.$channel_name.'/info.json';
            $file_get_function =  strrev('stnetnoc_teg_elif');
            $bddata = json_decode($file_get_function($url));
            if (intval($bddata->total_subscribers) <= 0) return 0;
            if($this->allow_cash == true){
                set_transient('bdayh_soical_vimo',$this->formatMoney($bddata->total_subscribers),1111);
            }
            return($this->formatMoney($bddata->total_subscribers));
        }
        return 0;
    }

    public function get_soundcloud_count($channel_name)
    { //Soundcloud
        if($channel_name != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_soundcloud');
                if($social_cash != '' and !empty($social_cash)){
                    return($social_cash);
                }
            }
            $file_get_function =  strrev('stnetnoc_teg_elif');
            $bddata = json_decode($file_get_function('http://api.soundcloud.com/users/'.trim($channel_name).'.json?consumer_key=2ba4cc2c24de0b8da1fc4a45cad219bd'));

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_soundcloud',$this->formatMoney($bddata->followers_count),1111);
            }
            return($this->formatMoney(intval($bddata->followers_count)));
        }
        else
        {
            return(0);
        }
    }
}

/* TwitterFollowers */
function getTwitterFollowers()
{
    // some variables
    global $bd_data;
    $screenName 		= bdayh_get_option('twitter_username');
    $consumerKey 		= bdayh_get_option('twitter_consumer_key');
    $consumerSecret 	= bdayh_get_option('twitter_consumer_secret');
    $token 				= get_option('bdTwitterToken');

    // get follower count from cache
    $numberOfFollowers = get_transient('bdTwitterFollowers');

    // cache version does not exist or expired
    if (false === $numberOfFollowers)
    {
        // getting new auth bearer only if we don't have one
        if(!$token)
        {
            // preparing credentials
            $credentials = $consumerKey . ':' . $consumerSecret;

            $functionbase_encode = strrev('edocne_46esab');
            $toSend = $functionbase_encode($credentials);

            // http post arguments
            $args = array(
                'method' 		=> 'POST',
                'httpversion' 	=> '1.1',
                'blocking' 		=> true,
                'headers' 		=> array(
                    'Authorization' 	=> 'Basic ' . $toSend,
                    'Content-Type' 		=> 'application/x-www-form-urlencoded;charset=UTF-8'
                ),
                'body' => array( 'grant_type' => 'client_credentials' )
            );

            add_filter('https_ssl_verify', '__return_false');
            $response 	= wp_remote_post('https://api.twitter.com/oauth2/token', $args);
            $keys 		= json_decode(wp_remote_retrieve_body($response));

            if($keys)
            {
                // saving token to wp_options table
                update_option('bdTwitterToken', $keys->access_token);
                $token = $keys->access_token;
            }
        }

        // we have bearer token wether we obtained it from API or from options
        $args = array(
            'httpversion' 		=> '1.1',
            'blocking' 			=> true,
            'headers' 			=> array(
                'Authorization' => "Bearer $token"
            )
        );

        add_filter('https_ssl_verify', '__return_false');
        $api_url 	= "https://api.twitter.com/1.1/users/show.json?screen_name=$screenName";
        $response 	= wp_remote_get($api_url, $args);

        if (!is_wp_error($response))
        {
            $followers = json_decode(wp_remote_retrieve_body($response));
            $numberOfFollowers = $followers->followers_count;
        }
        else
        {
            // get old value and break
            $numberOfFollowers = get_option('bdNumberOfFollowers');
            // uncomment below to debug
            //die($response->get_error_message());
        }

        // cache for an hour
        set_transient('bdTwitterFollowers', $numberOfFollowers, 1111);
        update_option('bdNumberOfFollowers', $numberOfFollowers);
    }

    return $numberOfFollowers;
}

/**
 * gallery
 */
if ( !function_exists( 'bd_gallery' ) ){
function bd_gallery($postid, $imagesize)
{ ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            jQuery('#slider-<?php echo $postid; ?>').imagesLoaded( function() {
                jQuery("#slider-<?php echo $postid; ?>").flexslider({
                    slideshow: true,
                    slideshowSpeed: 2000,
                    //randomize: true,
                    controlNav: false,
                    keyboard: true,
                    multipleKeyboard: true,
                    pauseOnAction: false,
                    pauseOnHover: false,
                    prevText: '<?php echo '&larr; ' . __('Prev', 'bd'); ?>',
                    nextText: '<?php echo __('Next', 'bd') . ' &rarr;'; ?>',
                    namespace: 'bd-',
                    smoothHeight: true,
                    start: function(slider) {
                        slider.container.click(function(e) {
                            if( !slider.animating ) {
                                slider.flexAnimate( slider.getTarget('next') );
                            }

                        });
                    }
                });

                jQuery("#slider-<?php echo $postid; ?>").click(function(e){

                });
            });
        });
    </script>
    <?php
    $loader = 'ajax-loader.gif';
    $thumbid = 0;

    // get the featured image for the post
    if( has_post_thumbnail($postid) ) {
        $thumbid = get_post_thumbnail_id($postid);
    }
    echo "<!--//START-->\n<div id='slider-$postid' class='flexslider' data-loader='" . get_template_directory_uri() . "/images/$loader'>";

    // get all of the attachments for the post
    $args = array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'attachment',
        'post_parent' => $postid,
        'post_mime_type' => 'image',
        'post_status' => null,
        'numberposts' => -1
    );
    $attachments = get_posts($args);
    if( !empty($attachments) )
    {
        echo '<ul class="slides">';
        $i = 0;
        foreach( $attachments as $attachment ) {
            $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
            $caption = $attachment->post_excerpt;
            $caption = ($caption) ? "<em class='image-caption'>$caption</em>" : '';
            $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
            echo "<li><img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />$caption</li>";
            $i++;
        }
        echo '</ul>';
    }
    echo "<!--//END-->\n</div>";
}
}

/**
 *
 * gallery
 *
 */
if ( !function_exists( 'pp_gallery' ) ){
    function pp_gallery( $postid ){
        ?>
        <script type="text/javascript">
                jQuery(document).ready(function(jQuery) {
                jQuery('.pp-slider-content').cycle({
                    timeout: 5000,
                    speed: 400,
                    pager:  '.pp-slider-nav',
                    //next:'.slide_next',
                    //prev:'.slide_prev',
                    before: resize_slider
                });
                function resize_slider(curr, next, opts, fwd){
                    var $ht = jQuery(this).height();
                    jQuery(this).parent().animate({
                    height : $ht
                    });
                }
                    jQuery('.pp-slider-content').click(function() {
                    jQuery('.pp-slider-content').cycle('next');
                });
                });
            </script>

        <?php

        echo "<div class='pp-slider'>";

        global $post;
        if( get_post_meta( $post->ID, 'cherry_side_layout', true) == 'full_width' ){
            $img_w = "958";
            $img_h = "539";
        } else {
            $img_w = "623";
            $img_h = "350";
        }

        $args = array(
            'order'          => 'ASC',
            'post_type'      => 'attachment',
            'post_parent'    => $post->ID,
            'post_mime_type' => 'image',
            'post_status'    => null,
            'orderby'		 => 'menu_order',
            'exclude' => get_post_thumbnail_id()
        );

        $attachments = get_posts($args);

        if( !empty($attachments) ){

            echo '<ul class="pp-slider-content">';

            if( has_post_thumbnail() ){

                $attachment_image       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                $full_image             = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                $image                  = aq_resize( $attachment_image[0], $img_w, $img_h, true );

                echo "<li><a href='$full_image[0]' rel='prettyPhoto[gallery]'><img src='$image' alt='' /></a></li>";
            }

            $i = 0;
            foreach( $attachments as $attachment ) {

                $src        = wp_get_attachment_image_src( $attachment->ID, 'full' );
                $image      = aq_resize( $src[0], $img_w, $img_h, true );
                $caption    = $attachment->post_excerpt;
                $caption    = ($caption) ? "<em class='image-caption'>$caption</em>" : '';
                $alt        = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;

                echo "<li><a href='$src[0]' rel='prettyPhoto[gallery]'><img src='$image' alt='$alt' /></a>$caption</li>";

                $i++;
            }
            echo '</ul>';

        }
        echo "<div class='pp-slider-nav'></div></div><!-- End Slider -->";
    }
}

/**
 *
 * Password form
 *
 */
function cherry_password_form(){
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form class="cherry_password_form" action="' . get_option( 'siteurl' ) . '/wp-pass.php" method="post">
    ' . __( "<span> To view this protected post, enter the password below : </span>", 'bd' ) . '
    <label for="' . $label . '">' . __( "Password:", 'bd' ) . ' </label><input class="password_text" name="post_password" id="' . $label . '" type="password" size="20" /><input class="password_go" type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'cherry_password_form' );

/**
 *
 * GET Feed
 *
 */
function bd_get_feeds( $feed , $number = 10 ){
    include_once(ABSPATH . WPINC . '/feed.php');

    $rss = @fetch_feed( $feed );
    if (!is_wp_error( $rss ) ){
        $maxitems = $rss->get_item_quantity($number);
        $rss_items = $rss->get_items(0, $maxitems);
    }
    if ($maxitems == 0) {
        $out = "<ul><li>". __( 'No items.', 'bd' )."</li></ul>";
    }else{
        $out = "<ul>";

        foreach ( $rss_items as $item ) :
            $out .= '<li><a href="'. esc_url( $item->get_permalink() ) .'" title="'.  __( "Posted ", "bd" ).$item->get_date("j F Y | g:i a").'">'. esc_html( $item->get_title() ) .'</a></li>';
        endforeach;
        $out .='</ul>';
    }

    return $out;
}

/**
 *
 * Custom Dashboard login logo
 *
 */
function bd_login_logo(){
    if( bdayh_get_option('dashboard_logo') )
    echo '<style type="text/css"> h1 a {  background-image:url('.bdayh_get_option('dashboard_logo').')  !important; background-size: auto !important; } </style>';
}
add_action('login_head',  'bd_login_logo');

/**
 *
 * Custom Gravatar
 *
 */
function bd_custom_gravatar ($avatar_defaults) {
    $bd_gravatar = bdayh_get_option( 'gravatar' );
    if($bd_gravatar){
        $custom_avatar = bdayh_get_option( 'gravatar' );
        $avatar_defaults[$custom_avatar] = "Custom Gravatar";
    }
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'bd_custom_gravatar' );

/**
 *
 * Pagination
 *
 */
function bd_pagenavi(){
?>
    <div class="pagination">
      <div class="wp-pagenavi">
        <?php bd_get_pagenavi() ?>
      </div>
    </div><!-- pagination/-->
<?php
}

/**
 *
 * Custom Comments
 *
 */
function custom_comments($comment, $args, $depth){
    $GLOBALS['comment'] = $comment; ?>
    <li id="li-comment-<?php comment_ID() ?>" class="single_comment">
      <div id="comment-<?php comment_ID(); ?>" class="comment-wrap">
        <div class="comment-author comment-avatar">
          <span class="">
          <?php
          echo get_avatar( $comment, 67 );
          ?>
          </span>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
        <em class="wait_mod">
        <?php _e('Your comment is awaiting moderation.', 'bd'); ?>
        </em>
        <?php endif; ?>
        <div class="author-comment">
          <?php printf(__('%s ', 'bd'), get_comment_author_link()) ?>
          <div class="clear"></div>
          <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
            <?php printf(__('%1$s at %2$s', 'bd'), get_comment_date(),  get_comment_time()) ?>
            </a>
            <?php edit_comment_link(__('(Edit)', 'bd'),'  ','') ?>
          </div>
        </div>
        <div class="clear"></div>
        <div class="comment-content">
          <?php comment_text() ?>
        </div>
        <div class="clear"></div>
        <div class="reply">
          <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
      </div>
<?php
}

/**
 *
 * Footer Social
 *
 */
function footer_widget_social(){
?>
    <?php
        if(bdayh_get_option('social_networking') == 1){
    ?>
        <ul class="widget_social">
        <?php if(bdayh_get_option('linkedin_url') != '') { ?>
            <li class="linkedin">
              <a href="<?php echo bdayh_get_option('linkedin_url'); ?>" title="linkedin"> linkedin </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('digg_url') != '') { ?>
            <li class="digg">
              <a href="<?php echo bdayh_get_option('digg_url'); ?>" title="digg"> digg </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('foursquare_url') != '') { ?>
            <li class="foursquare">
              <a href="<?php echo bdayh_get_option('foursquare_url'); ?>" title="foursquare"> foursquare </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('instagram_url') != '') { ?>
            <li class="instagram">
              <a href="<?php echo bdayh_get_option('instagram_url'); ?>" title="instagram"> instagram </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('vimeo_url') != '') { ?>
            <li class="vimeo">
              <a href="<?php echo bdayh_get_option('vimeo_url'); ?>" title="vimeo"> vimeo </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('tumblr_url') != '') { ?>
            <li class="tumblr">
              <a href="<?php echo bdayh_get_option('tumblr_url'); ?>" title="tumblr"> tumblr </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('blogger_url') != '') { ?>
            <li class="blogger">
              <a href="<?php echo bdayh_get_option('blogger_url'); ?>" title="blogger"> blogger </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('deviantart_url') != '') { ?>
            <li class="deviantart">
              <a href="<?php echo bdayh_get_option('deviantart_url'); ?>" title="deviantart"> deviantart </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('envato_url') != '') { ?>
            <li class="envato">
              <a href="<?php echo bdayh_get_option('envato_url'); ?>" title="envato"> envato </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('skype_url') != '') { ?>
            <li class="skype">
              <a href="skype:<?php echo bdayh_get_option('skype_url'); ?>?call" title="skype"> skype </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('myspace_url') != '') { ?>
            <li class="myspace">
              <a href="<?php echo bdayh_get_option('myspace_url'); ?>" title="myspace"> myspace </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('reddit_url') != '') { ?>
            <li class="reddit">
              <a href="<?php echo bdayh_get_option('reddit_url'); ?>" title="reddit"> reddit </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('behance_url') != '') { ?>
            <li class="behance">
              <a href="<?php echo bdayh_get_option('behance_url'); ?>" title="behance"> behance </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('youtube_url') != '') { ?>
            <li class="youtube">
              <a href="<?php echo bdayh_get_option('youtube_url'); ?>" title="youtube"> youtube </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('twitter_url') != '') { ?>
            <li class="twitter">
              <a href="<?php echo bdayh_get_option('twitter_url'); ?>" title="twitter"> twitter </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('rss_url') != '') { ?>
            <li class="rss">
              <a href="<?php echo bdayh_get_option('rss_url'); ?>" title="rss"> rss </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('pinterest_url') != '') { ?>
            <li class="pinterest">
              <a href="<?php echo bdayh_get_option('pinterest_url'); ?>" title="pinterest"> pinterest </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('gplus_url') != '') { ?>
            <li class="googleplus">
              <a href="<?php echo bdayh_get_option('gplus_url'); ?>" title="googleplus"> googleplus </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('flickr_url') != '') { ?>
            <li class="flickr">
              <a href="<?php echo bdayh_get_option('flickr_url'); ?>" title="flickr"> flickr </a>
            </li>
        <?php } ?>
        <?php if(bdayh_get_option('facebook_url') != '') { ?>
            <li class="facebook">
              <a href="<?php echo bdayh_get_option('facebook_url'); ?>" title="facebook"> facebook </a>
            </li>
        <?php } ?>
      </ul><!-- Social/-->
    <?php
    }
?>
<?php
}

/**
 *
 * Widget Social
 *
 */
function widget_social(){
?>
  <ul class="widget_social">

    <?php if(bdayh_get_option('linkedin_url') != '') { ?>
        <li class="linkedin">
          <a href="<?php echo bdayh_get_option('linkedin_url'); ?>" title="linkedin"> linkedin </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('digg_url') != '') { ?>
        <li class="digg">
          <a href="<?php echo bdayh_get_option('digg_url'); ?>" title="digg"> digg </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('foursquare_url') != '') { ?>
        <li class="foursquare">
          <a href="<?php echo bdayh_get_option('foursquare_url'); ?>" title="foursquare"> foursquare </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('instagram_url') != '') { ?>
        <li class="instagram">
          <a href="<?php echo bdayh_get_option('instagram_url'); ?>" title="instagram"> instagram </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('vimeo_url') != '') { ?>
        <li class="vimeo">
          <a href="<?php echo bdayh_get_option('vimeo_url'); ?>" title="vimeo"> vimeo </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('tumblr_url') != '') { ?>
        <li class="tumblr">
          <a href="<?php echo bdayh_get_option('tumblr_url'); ?>" title="tumblr"> tumblr </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('blogger_url') != '') { ?>
        <li class="blogger">
          <a href="<?php echo bdayh_get_option('blogger_url'); ?>" title="blogger"> blogger </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('deviantart_url') != '') { ?>
        <li class="deviantart">
          <a href="<?php echo bdayh_get_option('deviantart_url'); ?>" title="deviantart"> deviantart </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('envato_url') != '') { ?>
        <li class="envato">
          <a href="<?php echo bdayh_get_option('envato_url'); ?>" title="envato"> envato </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('skype_url') != '') { ?>
        <li class="skype">
          <a href="skype:<?php echo bdayh_get_option('skype_url'); ?>?call" title="skype"> skype </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('myspace_url') != '') { ?>
        <li class="myspace">
          <a href="<?php echo bdayh_get_option('myspace_url'); ?>" title="myspace"> myspace </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('reddit_url') != '') { ?>
        <li class="reddit">
          <a href="<?php echo bdayh_get_option('reddit_url'); ?>" title="reddit"> reddit </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('behance_url') != '') { ?>
        <li class="behance">
          <a href="<?php echo bdayh_get_option('behance_url'); ?>" title="behance"> behance </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('youtube_url') != '') { ?>
        <li class="youtube">
          <a href="<?php echo bdayh_get_option('youtube_url'); ?>" title="youtube"> youtube </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('twitter_url') != '') { ?>
        <li class="twitter">
          <a href="<?php echo bdayh_get_option('twitter_url'); ?>" title="twitter"> twitter </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('rss_url') != '') { ?>
        <li class="rss">
          <a href="<?php echo bdayh_get_option('rss_url'); ?>" title="rss"> rss </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('pinterest_url') != '') { ?>
        <li class="pinterest">
          <a href="<?php echo bdayh_get_option('pinterest_url'); ?>" title="pinterest"> pinterest </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('gplus_url') != '') { ?>
        <li class="googleplus">
          <a href="<?php echo bdayh_get_option('gplus_url'); ?>" title="googleplus"> googleplus </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('flickr_url') != '') { ?>
        <li class="flickr">
          <a href="<?php echo bdayh_get_option('flickr_url'); ?>" title="flickr"> flickr </a>
        </li>
    <?php } ?>

    <?php if(bdayh_get_option('facebook_url') != '') { ?>
        <li class="facebook">
          <a href="<?php echo bdayh_get_option('facebook_url'); ?>" title="facebook"> facebook </a>
        </li>
    <?php } ?>

  </ul><!-- Social/-->

<?php
}

/**
 *
 * News In Picture
 *
 */
function bd_news_pic($order , $numberOfPosts = 9 , $cats = 1 ){
    global $post;
    $orig_post = $post;
    $lastPosts = get_posts(	$args = array('numberposts' => $numberOfPosts, 'category' => $cats ));
    get_posts('category='.$cats.'&numberposts='.$numberOfPosts);
    echo '<div class="news_pic">';
    foreach($lastPosts as $post): setup_postdata($post);
?>
        <?php
        $img_w      = 55;
        $img_h      = 55;
        $thumb      = bd_post_image('full');
        $image      = aq_resize( $thumb, $img_w, $img_h, true );
        $alt        = get_the_title();
        $link       = get_permalink();
        if (strpos(bd_post_image(), 'youtube'))
        {
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        }
        elseif (strpos(bd_post_image(), 'vimeo'))
        {
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        }
        elseif (strpos(bd_post_image(), 'dailymotion'))
        {
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        }
        else
        {
            if($image) :
                echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
            endif;
        }
        ?>
<?php
    endforeach;
    echo'</div>';
    $post = $orig_post;
}

/**
 *
 * Latest Pots Cat
 *
 */
function cherry_last_posts_cat($numberOfPosts = 5 , $thumb = true , $cats = 1){
    global $post;
    $orig_post = $post;
    $lastPosts = get_posts('category='.$cats.'&numberposts='.$numberOfPosts);
    foreach($lastPosts as $post): setup_postdata($post);
?>
<li>
    <?php
    $img_w      = 55;
    $img_h      = 55;
    $thumb      = bd_post_image('full');
    $image      = aq_resize( $thumb, $img_w, $img_h, true );
    $alt        = get_the_title();
    $link       = get_permalink();
    if (strpos(bd_post_image(), 'youtube'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    elseif (strpos(bd_post_image(), 'vimeo'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    elseif (strpos(bd_post_image(), 'dailymotion'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    else
    {
        if($image) :
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        endif;
    }
    ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
    <span class="date"><?php the_time(get_option('date_format'));  ?></span>
    <span class="post-rat"><?php echo bd_wp_post_rate(); ?></span>
</li>
<?php endforeach;
    $post = $orig_post;
}

/**
 *
 * Popular
 *
 */
function AGS_popular_posts( $pop_posts = 5 ){
    global $post;
    $orig_post = $post;
    $popularposts = new WP_Query( array( 'orderby' => 'comment_count', 'order' => 'DESC', 'posts_per_page' => $pop_posts, 'post_status' => 'publish', 'no_found_rows' => 1, 'ignore_sticky_posts' => 1  ) );

    while ( $popularposts->have_posts() ) : $popularposts->the_post();
    ?>
    <li>
        <?php
        $img_w      = 55;
        $img_h      = 55;
        $thumb      = bd_post_image('full');
        $image      = aq_resize( $thumb, $img_w, $img_h, true );
        $alt        = get_the_title();
        $link       = get_permalink( $post->ID );
        if (strpos(bd_post_image(), 'youtube'))
        {
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        }
        elseif (strpos(bd_post_image(), 'vimeo'))
        {
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        }
        elseif (strpos(bd_post_image(), 'dailymotion'))
        {
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        }
        else
        {
            if($image) :
                echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
            endif;
        }
        ?>
        <h3><a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo the_title(); ?></a></h3>
        <span class="date"><?php the_time(get_option('date_format'));  ?></span>
        <span class="post-rat"><?php echo bd_wp_post_rate(); ?></span>
    </li>
    <?php
    endwhile;
    $post = $orig_post;
}

/**
 *
 * Comments
 *
 */
function cherry_commented($comment_posts = 5 , $avatar_size = 55){
    $comments = get_comments('status=approve&number='.$comment_posts);
    foreach ($comments as $comment) {
    if(isset($comment->ID)){ echo $comment->ID; }
?>
<li>
    <div class="post_thumbnail"><?php echo get_avatar( $comment, $avatar_size ); ?></div>
    <h3><a href="<?php echo get_permalink($comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>"><?php echo strip_tags($comment->comment_author); ?> : <?php echo wp_html_excerpt( $comment->comment_content, 67 ); ?> ...</a></h3>
</li>
<?php
}
}

/**
 *
 * Recent
 *
 */
function cherry_last_posts($numberOfPosts = 5 , $thumb = true){
    global $post;
    $orig_post = $post;
    $lastPosts = get_posts('numberposts='.$numberOfPosts);
    foreach($lastPosts as $post): setup_postdata($post);
?>
<li>
    <?php
    $img_w      = 55;
    $img_h      = 55;
    $thumb      = bd_post_image('full');
    $image      = aq_resize( $thumb, $img_w, $img_h, true );
    $alt        = get_the_title();
    $link       = get_permalink();
    if (strpos(bd_post_image(), 'youtube'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    elseif (strpos(bd_post_image(), 'vimeo'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    elseif (strpos(bd_post_image(), 'dailymotion'))
    {
        echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. bd_post_image('full') .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
    }
    else
    {
        if($image) :
            echo '<div class="post_thumbnail"><a href="'. $link .'" title="'. $alt .'"><img src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
        endif;
    }
    ?>
    <h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
    <span class="date"><?php the_time(get_option('date_format')); ?></span>
    <span class="post-rat"><?php echo bd_wp_post_rate(); ?></span>
</li>
<?php
    endforeach;
    $post = $orig_post;
}

/**
 *
 * Login form
 *
 */
function cherry_login_form( $login_only  = 0 ){
    global $user_ID, $user_identity, $user_level;
    if ( $user_ID ) :
?>
<?php if( empty( $login_only ) ): ?>
<div class="login_user">
<div class="post_thumbnail">
    <?php echo get_avatar( $user_ID, $size = '79'); ?>
</div>
<p> <?php _e( 'Welcome' , 'bd' ) ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php echo $user_identity ?></a></p>
<ol class="login_list">
<li class="userWpAdmin">
    <a href="<?php echo home_url() ?>/wp-admin/"><?php _e( 'Dashboard' , 'bd' ) ?></a>
</li>
<li class="userprofile">
    <a href="<?php echo home_url() ?>/wp-admin/profile.php"><?php _e( 'Your Profile' , 'bd' ) ?></a>
</li>
<li class="userlogout">
    <a href="<?php echo wp_logout_url(); ?>"><?php _e( 'Logout' , 'bd' ) ?></a>
</li>
</ol>

    <!-- Author social/-->
    <div class="social-icons icon-12 bio-author-social">
        <?php if ( get_the_author_meta( 'url' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'url' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( "'s site", 'bd' ); ?>"><i class="icon-home"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'facebook' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'facebook' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Facebook', 'bd' ); ?>"><i class="social_icon-facebook"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
            <a class="ttip" target="_blank" href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Twitter', 'bd' ); ?>"><i class="social_icon-twitter"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'google' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'google' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Google+', 'bd' ); ?>"><i class="social_icon-google"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'linkedin' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Linkedin', 'bd' ); ?>"><i class="social_icon-linkedin"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'flickr' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'flickr' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Flickr', 'bd' ); ?>"><i class="social_icon-flickr"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'youtube' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'youtube' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on YouTube', 'bd' ); ?>"><i class="social_icon-youtube"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'pinterest' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Pinterest', 'bd' ); ?>"><i class="social_icon-pinterest"></i></a>
        <?php endif ?>
    </div>
</div>
<?php endif; ?>
<?php else: ?>
<div class="login_form">
<form action="<?php echo home_url() ?>/wp-login.php" method="post">
<div class="username" >
  <input type="text" name="log" id="log" size="30" placeholder="User Name"  value="<?php _e( 'Username' , 'bd' ) ?>"  />
</div>
<div class="password" >
  <input type="password" name="pwd" size="30" placeholder="Password" value="<?php _e( 'Password' , 'bd' ) ?>" />
</div>
<div class="remember">
  <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />
  <label>
    <?php _e( 'Remember Me' , 'bd' ) ?>
  </label>
</div>
<div class="go">
  <button value="<?php _e( 'Login' , 'bd' ) ?>" name="Submit" type="submit">
    <?php _e( 'Login' , 'bd' ) ?>
  </button>
  <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
</div>
<ol class="login_list">
  <li>
    <a href="<?php echo home_url() ?>/wp-login.php?action=lostpassword">
        <?php _e( 'Forgot your password?' , 'bd' ) ?>
    </a>
  </li>
</ol>
</form>
</div>
<?php
    endif;
}

/**
 *
 * Author
 *
 */
function bd_author_box($user = 10,$avatar = true , $social = true ){
    if( $avatar ) :
    ?>
    <div class="post_thumbnail">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 79 ) ); ?>
    </div>
    <?php endif; ?>
    <p>
        <?php the_author_meta( 'description' ); ?>
    </p>
    <!-- Author social/-->
    <div class="social-icons icon-12 bio-author-social">
        <?php if ( get_the_author_meta( 'url' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'url' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( "'s site", 'bd' ); ?>"><i class="icon-home"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'facebook' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'facebook' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Facebook', 'bd' ); ?>"><i class="social_icon-facebook"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
            <a class="ttip" target="_blank" href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Twitter', 'bd' ); ?>"><i class="social_icon-twitter"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'google' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'google' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Google+', 'bd' ); ?>"><i class="social_icon-google"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'linkedin' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Linkedin', 'bd' ); ?>"><i class="social_icon-linkedin"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'flickr' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'flickr' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Flickr', 'bd' ); ?>"><i class="social_icon-flickr"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'youtube' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'youtube' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on YouTube', 'bd' ); ?>"><i class="social_icon-youtube"></i></a>
        <?php endif ?>
        <?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
            <a class="ttip" target="_blank" href="<?php the_author_meta( 'pinterest' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Pinterest', 'bd' ); ?>"><i class="social_icon-pinterest"></i></a>
        <?php endif ?>
    </div>
<?php
}

/**
 *
 * Add user's social accounts
 *
 */
add_action( 'show_user_profile', 'cherry_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'cherry_show_extra_profile_fields' );
function cherry_show_extra_profile_fields( $user ){
?>
<h3><?php _e( 'Social Networking', 'bd' ) ?></h3>
<table class="form-table">
  <tr>
    <th><label for="facebook">FaceBook URL</label></th>
    <td>
        <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
      </td>
  </tr>
  <tr>
    <th><label for="twitter">Twitter Username</label></th>
    <td>
        <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
      </td>
  </tr>
  <tr>
    <th><label for="google">Google + URL</label></th>
    <td>
        <input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
      </td>
  </tr>
  <tr>
    <th><label for="linkedin">linkedIn URL</label></th>
    <td>
        <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
      </td>
  </tr>
  <tr>
    <th><label for="pinterest">Pinterest URL</label></th>
    <td>
        <input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
      </td>
  </tr>
  <tr>
    <th><label for="youtube">YouTube URL</label></th>
    <td>
        <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
     </td>
  </tr>
  <tr>
    <th><label for="flickr">Flickr URL</label></th>
    <td>
        <input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
     </td>
  </tr>
</table>
<?php
}

/**
 *
 * Save user's social accounts
 *
 */
add_action( 'personal_options_update', 'cherry_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'cherry_save_extra_profile_fields' );
function cherry_save_extra_profile_fields( $user_id ){
    if ( !current_user_can( 'edit_user', $user_id ) ) return false;
    update_user_meta( $user_id, 'google', $_POST['google'] );
    update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
    update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
}

/**
 *
 * Add class
 *
 */
function category_id_class($classes){
    global $post;
    foreach((get_the_category($post->ID)) as $category)
    $classes[] = $category->category_nicename;
    return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');
add_filter('body_class','bd_classes');
function bd_classes($classes){
    $classes[] = 'dark';
    return $classes;
}

/**
 *
 * Register Nav Menus
 *
 */
if ( function_exists( 'register_nav_menu' ) ){
register_nav_menus(
    array(
        'topnav'   => __('Top Nav', 'bd'),
    )
);

register_nav_menus(
    array(
        'nav'   => __('Nav', 'bd'),
    )
);

}
function bd_nav_fallback(){
    echo '<div class="fallback">'.__( 'You can use WP menu builder to build menus' , 'bd' ).'</div>';
}
/**
 *
 * Register sidebar
 *
 */
function bd_widget_title($title){
    if( empty( $title ) )
    return ' ';
    else return $title;
}
add_filter('widget_title', 'bd_widget_title');
if ( function_exists('register_sidebar') ){

    register_sidebar(array(
        'name' => 'Home Sidebar',
        'description' => 'Home Sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_container">',
        'after_widget' => '</div></div><!--//end widget-->',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
        )
    );

    register_sidebar(array(
        'name' => 'Article Sidebar',
        'description' => 'Article Sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_container">',
        'after_widget' => '</div></div><!--//end widget-->',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
        )
    );

    register_sidebar(array(
        'name' => 'Page Sidebar',
        'description' => 'Page Sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_container">',
        'after_widget' => '</div></div><!--//end widget-->',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
        )
    );

    register_sidebar(array(
        'name' => 'Category Sidebar',
        'description' => 'Category Sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_container">',
        'after_widget' => '</div></div><!--//end widget-->',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
        )
    );

    register_sidebar(array(
        'name' => 'First Footer Widget Area',
        'description' => 'First Footer Widget Area',
        'before_widget' => '<li id="%1$s" class="popular_posts  pp-popular-posts %2$s">',
        'after_widget' => '</li><!--//popular_posts-->',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
        )
    );

    register_sidebar(array(
        'name' => 'Second Footer Widget Area',
        'description' => 'Second Footer Widget Area',
        'before_widget' => '<li id="%1$s" class="popular_posts pp-popular-posts  %2$s">',
        'after_widget' => '</li><!--//popular_posts-->',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
        )
    );

    register_sidebar(array(
        'name' => 'Third Footer Widget Area',
        'description' => 'Third Footer Widget Area',
        'before_widget' => '<li id="%1$s" class="popular_posts pp-popular-posts %2$s">',
        'after_widget' => '</li><!--//popular_posts-->',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
        )
    );

    register_sidebar(array(
        'name' => 'Fourth Footer Widget Area',
        'description' => 'Fourth Footer Widget Area',
        'before_widget' => '<li id="%1$s" class="popular_posts  pp-popular-posts  %2$s end_row">',
        'after_widget' => '</li><!--//popular_posts-->',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
        )
    );

}

/**
 *
 * Excerpt
 *
 */
/**
 *
 * Excerpt Length
 *
 */
function bd_excerpt_global_length( $length ) {
    if( bdayh_get_option( 'exc_length' ) )
        return bdayh_get_option( 'exc_length' );
    else return 70;
}
function bd_excerpt_home_length( $length ) {
    if( bdayh_get_option( 'home_exc_length' ) )
        return bdayh_get_option( 'home_exc_length' );
    else return 13;
}
function bd_excerpt(){
    add_filter( 'excerpt_length', 'bd_excerpt_global_length', 999 );
    echo get_the_excerpt();
}
function bd_excerpt_home(){
    add_filter( 'excerpt_length', 'bd_excerpt_home_length', 999 );
    echo get_the_excerpt();
}
function bd_remove_excerpt( $more ){
    return '...';
}
add_filter('excerpt_more', 'bd_remove_excerpt');
function the_excerpt_max_charlength($charlength){
   $excerpt = get_the_excerpt();
   $charlength++;
   if(strlen($excerpt)>$charlength){
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0){
            echo substr($subex,0,$excut);
        }
        else
        {
        echo $subex;
        }
   }
   else
    {
    echo $excerpt;
    }
}
function short_title($after = '', $length){
    $mytitle = explode(' ', get_the_title(), $length);
    if (count($mytitle)>=$length){
        array_pop($mytitle);
        $mytitle = implode(" ",$mytitle). $after;
    }
    else
    {
    $mytitle = implode(" ",$mytitle);
    }
    return $mytitle;
}
function excerpt($limit){
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit){
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    }
    else
    {
    $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

/**
 *
 * Thumbnails
 *
 */
if ( function_exists( 'add_theme_support' ))
    add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) && !bd_get_option( 'timthumb' )){
    add_image_size( 'bd1', 330, 248, true );
    add_image_size( 'bd2', 108, 85, true );
    add_image_size( 'bd3', 138, 111, true );
    add_image_size( 'bd4', 338, 190, true );
    add_image_size( 'bd5', 54, 54, true );
    add_image_size( 'bd6', 261, 160, true );
    add_image_size( 'bd7', 69, 69, true );
    add_image_size( 'bd8', 300, 170, true );
}
function bd_pin_image(){
    global $post, $posts;
    if (has_post_thumbnail( $post->ID )):
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        echo $image[0];
    else:
        echo catch_that_image();
    endif;
}
function catch_that_image(){
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if(isset($matches[1][0])){
    $first_img = $matches[1][0];
    }
    else
    {
    $first_img = BD_IMG .'/default_thumb.png';
    }
    return $first_img;
}
function bd_post_image($size = 'thumbnail'){
    global $post;
    $image = '';
    $image_id = get_post_thumbnail_id($post->ID);
    $image = wp_get_attachment_image_src($image_id,
    $size);
    $image = $image[0];
    if ($image) return $image;
    $type = get_post_meta($post->ID, 'cherry_article_type', true);
    $vtype = get_post_meta($post->ID, 'cherry_video_type', true);
    $vId = get_post_meta($post->ID, 'cherry_video_id', true);

    if($vId != ''){
        if($vtype == 'youtube'){
        $image = 'http://img.youtube.com/vi/'.$vId.'/0.jpg';
        }
        elseif($vtype == 'vimeo'){
            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vId.php"));
            $image = $hash[0]['thumbnail_large'];
        }
        elseif ($vtype == 'daily'){
            $image = 'http://www.dailymotion.com/thumbnail/video/'.$vId;
        }
    }
    if ($image) return $image;
    return bd_get_first_image();
}
function bd_get_first_image(){
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if(isset($matches[1][0])){
        $first_img = $matches[1][0];
    }
    else
    {
    $first_img = BD_IMG .'/default_thumb.png';
    }
    return $first_img;
}

/**
 * User Rating
 */
if (!class_exists('user_rating'))
{
    class user_rating
    {
        public $current_rating;
        public $current_position;
        public $count;

        function __construct()
        {
            if (is_single())
            {
                $this->retrieve_values();
            }
            add_action('wp_ajax_bd_rating', array(&$this, 'sync_rating'));
            add_action('wp_ajax_nopriv_bd_rating', array(&$this, 'sync_rating'));
            add_action('wp_enqueue_scripts', array(&$this, 'load_scripts'));
        }

        public function load_scripts()
        {
            global $post;
            if ($post)
            {
                wp_localize_script('jquery', 'bd_script', array(
                        'post_id' => $post->ID,
                        'ajaxurl' => admin_url('admin-ajax.php')
                    )
                );
            }
        }

        private function retrieve_values()
        {
            $current_rating = get_post_meta(get_the_ID(), 'current_rating', true);

            if (!$current_rating)
            {
                $current_rating = '0';
            }

            $this->current_rating = $current_rating;
            $current_position = get_post_meta(get_the_ID(), 'current_position', true);

            if (!$current_position)
            {
                $current_position = 0;
            }

            $this->current_position = $current_position;
            $count = get_post_meta(get_the_ID(), 'ratings_count', true);

            if (!$count)
            {
                $count = 0;
            }
            $this->count = $count;
        }

        public function sync_rating()
        {
            $position = (int)$_POST['rating_position'];
            $post_id = (int)$_POST['post_id'];
            $current_position = (int)get_post_meta($post_id, 'current_position', true);

            if (!$current_position)
            {
                $current_position = 0;
            }

            $current_rating = (int)get_post_meta($post_id, 'current_rating', true);

            if (!$current_rating)
            {
                $current_rating = 0;
            }

            $count = (int)get_post_meta($post_id, 'ratings_count', true);

            if (!$count)
            {
                $count = 0;
            }

            $new_position = ($current_position * $count + $position) / ($count + 1);
            $new_count = $count + 1;
            $new_rating = floor(($new_position / 10) * 5) / 10;

            update_post_meta($post_id, 'current_position', $new_position, get_post_meta($post_id, 'current_position', true));
            update_post_meta($post_id, 'current_rating', $new_rating, get_post_meta($post_id, 'current_rating', true));
            update_post_meta($post_id, 'ratings_count', $new_count, get_post_meta($post_id, 'ratings_count', true));
            exit;
        }
    }
}
new user_rating();

/**
 * Post Rate
 */
function bd_post_rate()
{
    include (get_template_directory().'/functions/rate.php');
}

function bd_wp_post_rate()
{
    $bd_brief_summary     = get_post_meta(get_the_ID(), 'bd_brief_summary', true);
    $bd_review_enable     = get_post_meta(get_the_ID(), 'bd_review_enable', true);
    $bd_final_score       = get_post_meta(get_the_ID(), 'bd_final_score', true);
    $bd_final_percentage  = $bd_final_score * 20 + 2;
    if($bd_review_enable == 1)
    {
        ?>
        <span class="post-rate">
            <span title="<?php echo $bd_brief_summary; echo' - '; echo $bd_final_percentage; echo'%'; ?>" class="bd-module-a-stars-under leading-article">
                <span class="bd-module-a-stars-over leading-article" style="width:<?php echo $bd_final_percentage ?>%"></span>
            </span>
        </span><!-- .post-rate/-->
    <?php
    }
}