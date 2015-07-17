<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'themeloy_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Review and Post option', 'tl_back' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	
	
	
	// List of meta fields
	'fields' => array(
	
		array(
			'name'     => __( 'Show Date', 'tl_back' ),
			'id'       => "date_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),
		
			
		array(
			'name'     => __( 'Show Author', 'tl_back' ),
			'id'       => "author_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),
		
			array(
			'name'     => __( 'Show Category', 'tl_back' ),
			'id'       => "cat_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),
	
		array(
			'name'     => __( 'Show Comment', 'tl_back' ),
			'id'       => "comment_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),		


		array(
			'name'     => __( 'Show Tag', 'tl_back' ),
			'id'       => "tag_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),		

		array(
			'name'     => __( 'Show Share', 'tl_back' ),
			'id'       => "share_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),		

		array(
			'name'     => __( 'Show post nav', 'tl_back' ),
			'id'       => "post_nav_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),		

		array(
			'name'     => __( 'Show author box', 'tl_back' ),
			'id'       => "author_box_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),		

		array(
			'name'     => __( 'Show related post', 'tl_back' ),
			'id'       => "related_post_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),		

	
	array(
			'name' => 'Enable full width post',
			'id'   => "full_width_post{$prefix}checkbox",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		),

		array(
			'name'     => __( 'Enable review', 'tl_back' ),
			'id'       => "enable_review_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),	
		
		
		array(
			'name'     => __( 'Enable User review', 'tl_back' ),
			'id'       => "enable_user_review_{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'' => __('Choose option', 'tl_back'),
				'1' => __( 'Show',  'tl_back' ),
				'2' => __( 'Hide',  'tl_back' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '',
		),					

		
	
		array(
			'name' => __( 'Review Summery Title', 'tl_back' ),
			'id' => "reviewtitle{$prefix}text",
			'desc' => __( 'Review Summer Title', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		// TEXT
		
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'Review Summery', 'tl_back' ),
			'id'   => "review_{$prefix}wysiwyg",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( ' ', 'tl_back' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		// review 1
		array(
			'name' => __( 'Review Criteria 1', 'tl_back' ),
			'id' => "criteria1{$prefix}text",
			'desc' => __( 'Review Criteria 1', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		array(
			'name' => __( 'Review Criteria 1', 'tl_back' ),
			'id'   => "criteria1{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),
		
		//review 2
		array(
			'name' => __( 'Review Criteria 2', 'tl_back' ),
			'id' => "criteria2{$prefix}text",
			'desc' => __( 'Review Criteria 2', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		
		array(
			'name' => __( 'Review Rate', 'tl_back' ),
			'id'   => "criteria2{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),
		
		//review 3
		array(
			'name' => __( 'Review Criteria 3', 'tl_back' ),
			'id' => "criteria3{$prefix}text",
			'desc' => __( 'Review Criteria 3', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		
		array(
			'name' => __( 'Review Rate', 'tl_back' ),
			'id'   => "criteria3{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),
		
		//review 4
		
			array(
			'name' => __( 'Review Criteria 4', 'tl_back' ),
			'id' => "criteria4{$prefix}text",
			'desc' => __( 'Review Criteria 4', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		
		array(
			'name' => __( 'Review Rate', 'tl_back' ),
			'id'   => "criteria4{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),
		
		//review 5
		array(
			'name' => __( 'Review Criteria 5', 'tl_back' ),
			'id' => "criteria5{$prefix}text",
			'desc' => __( 'Review Criteria 5', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		
		array(
			'name' => __( 'Review Rate', 'tl_back' ),
			'id'   => "criteria5{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),
		
		//review 6
		array(
			'name' => __( 'Review Criteria 6', 'tl_back' ),
			'id' => "criteria6{$prefix}text",
			'desc' => __( 'Review Criteria 6', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		
		array(
			'name' => __( 'Review Rate', 'tl_back' ),
			'id'   => "criteria6{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),
		
		//review 7
		array(
			'name' => __( 'Review Criteria 7', 'tl_back' ),
			'id' => "criteria7{$prefix}text",
			'desc' => __( 'Review Criteria 7', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		
		array(
			'name' => __( 'Review Rate', 'tl_back' ),
			'id'   => "criteria7{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),
		
		//review 8
		
		array(
			'name' => __( 'Review Criteria 8', 'tl_back' ),
			'id' => "criteria8{$prefix}text",
			'desc' => __( 'Review Criteria 8', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		
		array(
			'name' => __( 'Review Rate', 'tl_back' ),
			'id'   => "criteria8{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),
		
		//review 9
		array(
			'name' => __( 'Review Criteria 9', 'tl_back' ),
			'id' => "criteria9{$prefix}text",
			'desc' => __( 'Review Criteria 9', 'tl_back' ),
			'type' => 'text',
			'std' => __( ' ', 'tl_back' )
		),
		array(
			'name' => __( 'Review Rate', 'tl_back' ),
			'id'   => "criteria9{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after
			'prefix' => __( '', 'tl_back' ),
			'suffix' => __( '', 'tl_back' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
			),
		),

	)
);



/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function themeloy_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'themeloy_register_meta_boxes' );
