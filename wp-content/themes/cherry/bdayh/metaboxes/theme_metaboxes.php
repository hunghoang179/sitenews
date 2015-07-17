<?php
/**
 * Registering meta boxes
 *
 * In this file, I'll show you how to extend the class to add more field type (in this case, the 'taxonomy' type)
 * All the definitions of meta boxes are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value instead of boolean as before
 *
 * You also should read the changelog to know what has been changed
 *
 * For more information, please visit: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 *
 */

/********************* BEGIN EXTENDING CLASS ***********************/

/**
 * Extend RW_Meta_Box class
 * Add field type: 'taxonomy'
 */
class RW_Meta_Box_Taxonomy extends RW_Meta_Box {

	function add_missed_values() {
		parent::add_missed_values();

		// add 'multiple' option to taxonomy field with checkbox_list type
		foreach ($this->_meta_box['fields'] as $key => $field) {
			if ('taxonomy' == $field['type'] && 'checkbox_list' == $field['options']['type']) {
				$this->_meta_box['fields'][$key]['multiple'] = true;
			}
		}
	}

	// show taxonomy list
	function show_field_taxonomy($field, $meta) {
		global $post;

		if (!is_array($meta)) $meta = (array) $meta;

		$this->show_field_begin($field, $meta);

		$options = $field['options'];
		$terms = get_terms($options['taxonomy'], $options['args']);

		// checkbox_list
		if ('checkbox_list' == $options['type']) {
			foreach ($terms as $term) {
				echo "<input type='checkbox' name='{$field['id']}[]' value='$term->slug'" . checked(in_array($term->slug, $meta), true, false) . " /> $term->name<br/>";
			}
		}
		// select
		else {
			echo "<select name='{$field['id']}" . ($field['multiple'] ? "[]' multiple='multiple' style='height:auto'" : "'") . ">";

			foreach ($terms as $term) {
				echo "<option value='$term->slug'" . selected(in_array($term->slug, $meta), true, false) . ">$term->name</option>";
			}
			echo "</select>";
		}

		$this->show_field_end($field, $meta);
	}
}

/********************* END EXTENDING CLASS ***********************/

/********************* BEGIN DEFINITION OF META BOXES ***********************/

// prefix of meta keys, optional
// use underscore (_) at the beginning to make keys hidden, for example $prefix = '_rw_';
// you also can make prefix empty to disable it
$prefix = 'cherry_';

		$meta_boxes = array();
		$imagepath =  get_template_directory_uri() . '/admin/assets/images';
		$meta_boxes[] = array
		(
			'id' => 'sidebar_setting',
			'title' => 'Sidebar Position',
			'pages' => array('post'),
			'priority' => 'high',
			'context' => 'normal',
			'fields' => array
			(
				array
				(
					'id' => $prefix . 'side_layout',
					'type' => 'radio',
					'std' =>'default',
					'class' => 'postlayout',

					'options' => array
					(
						'default' => '<img class="radio_img" src="'. $imagepath . '/default.png">',
						'sidebar_left' => '<img class="radio_img" src="'. $imagepath . '/left_sidebar.png">',
						'full_width' =>'<img class="radio_img" src="'. $imagepath . '/full.png">',
						'sidebar_right' => '<img class="radio_img" src="'. $imagepath . '/right_sidebar.png">'
					)
				),
			),
		);


		$imagepath =  get_template_directory_uri() . '/admin/assets/images';
		$meta_boxes[] = array
		(
			'id' => 'sidebar_setting',
			'title' => 'Sidebar Position',
			'pages' => array('page'),
			'priority' => 'high',
			'context' => 'normal',
			'fields' => array
			(
				array
				(
					'id' => $prefix . 'side_layout',
					'type' => 'radio',
					'std' =>'default',
					'class' => 'postlayout',

					'options' => array
					(
						'default' => '<img class="radio_img" src="'. $imagepath . '/default.png">',
						'sidebar_left' => '<img class="radio_img" src="'. $imagepath . '/left_sidebar.png">',
						'full_width' =>'<img class="radio_img" src="'. $imagepath . '/full.png">',
						'sidebar_right' => '<img class="radio_img" src="'. $imagepath . '/right_sidebar.png">'
					)
				),
			),
		);


		/* Create an image metabox -------------------------------------------------------*/

		$meta_boxes[] = array
		(
			'id' => 'bd-metabox-post-image',
			'title' =>  __('Gallery Settings', 'bd'),
			'description' => __('Upload images to this post using the below controls. Please note that the Featured Image will be used as the "cover" image and will be skipped in the gallery.', 'bd'),
			'page' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
	    		array(
	    				'name' =>  __('Upload Images', 'bd'),
	    				'desc' => __('Click to upload images.', 'bd'),
	    				'id' => '_bd_image_upload',
	    				'type' => 'plupload_image',
	    				'std' => __('Upload Images', 'bd')
	    			)
			)
		);


		/* Create a quote metabox -----------------------------------------------------*/

		$meta_boxes[] = array
		(
			'id' => 'bd-metabox-post-quote',
			'title' =>  __('Quote Settings', 'bd'),
			'description' => __('Input your quote.', 'bd'),
			'page' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
						'name' =>  __('The Quote', 'bd'),
						'desc' => __('Input your quote.', 'bd'),
						'id' => '_bd_quote_quote',
						'type' => 'textarea',
						'std' => ''
					)
			)
		);


		/* Create a link metabox ----------------------------------------------------*/
		$meta_boxes[] = array
		(
			'id' => 'bd-metabox-post-link',
			'title' =>  __('Link Settings', 'bd'),
			'description' => __('Input your link', 'bd'),
			'page' => 'post',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array
			(
				array
				(
						'name' =>  __('The Link', 'bd'),
						'desc' => __('Input your link. Example: http://www.bdayh.com', 'bd'),
						'id' => '_bd_link_url',
						'type' => 'text',
						'std' => ''
				)
			)
		);




        /*
        Featured Image ------------------------------*/

		$meta_boxes[] = array(
			'id' => 'thumb_setting',
			'title' => 'Featured Post',
			'pages' => array('post'),
			'priority' => 'high',
			'context' => 'normal',
			'fields' => array
			(
					array
					(
						'name'		=> __('Show Featured Image on post', 'bd'),
						'id' 		=> $prefix . 'thumb_show',
						'type' 		=> 'select',
						'options'	=> array
						(
										'off' => 'OFF',
										'on' => 'On',
						)
					),

					array
					(
						'name'		=> __('Show Slider on post', 'bd'),
						'id' 		=> $prefix . 'ppslider_show',
						'type' 		=> 'select',
						'options'	=> array
						(
										'off' => 'OFF',
										'on' => 'On',
						)
					),

			)
		);


		/* Create a video ----------------------------------------------------*/

		$meta_boxes[] = array(
			'id' => 'video_setting',
			'title' => 'Video Setting',
			'pages' => array('post'),
			'priority' => 'high',
			'context' => 'normal',
			'fields' => array
			(
				array
				(
					'name' => __('Video Type', 'theme'),
					'id' => $prefix . 'video_type',
					'type' => 'select',
					'std' => '',
					'options' => array
									(
										'youtube' => __('Youtube', 'theme'),
										'vimeo' => __('Vimeo', 'theme'),
										'daily' => __('Dialymotion', 'theme')
									)
				),

				array
				(
					'name'		=> __('Show Video on post', 'theme'),
					'id' 		=> $prefix . 'video_show',
					'type' 		=> 'select',
					'options'	=> array
									(
										'off' => 'OFF',
										'on' => 'On',
									)
				),

				array
				(
					'name' => __('Video ID', 'theme'),
					'id' => $prefix . 'video_id',
					'type' => 'text',
					'std' => ''

				),

			),

        );

/**
 *  Review
 */
$meta_boxes[] = array(
    'id'                        => 'review',
    'title'                     => 'Review Options',
    'pages'                     => array('post','page'),
    'context'                   => 'normal',
    'priority'                  => 'default',
    'fields'                    => array(
        array(
            'name'		            => 'Enable Review?',
            'id'		            => 'bd_review_enable',
            'clone'		            => false,
            'type'		            => 'checkbox',
            'std'		            => false
        ),
        array(
            'name'		            => 'Enable User Ratings?',
            'id'		            => 'bd_user_ratings_visibility',
            'type'		            => 'checkbox',
            'std'		            => false
        ),
        // CRITERIA ONE
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 1:</span> Description',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_add_criteria1 bd_c1 ",
            'id'		=> "bd_c1_description",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 1:</span> Rating <em id=bd_preview_rating_1></em>',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_c1",
            'id'		=> "bd_c1_rating",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        //CRITERIA TWO
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 2:</span> Description',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_add_criteria2  bd_c2",
            'id'		=> "bd_c2_description",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 2:</span> Rating <em id=bd_preview_rating_2></em>',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_c2",
            'id'		=> "bd_c2_rating",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        //CRITERIA THREE
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 3:</span> Description',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_add_criteria3  bd_c3",
            'id'		=> "bd_c3_description",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 3:</span> Rating <em id=bd_preview_rating_3></em>',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_c3",
            'id'		=> "bd_c3_rating",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        //CRITERIA FOUR
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 4:</span> Description',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_add_criteria4  bd_c4",
            'id'		=> "bd_c4_description",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 4:</span> Rating  <em id=bd_preview_rating_4></em>',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_c4",
            'id'		=> "bd_c4_rating",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        //CRITERIA FIVE
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 5:</span> Description',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_add_criteria5  bd_c5",
            'id'		=> "bd_c5_description",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 5:</span> Rating <em id=bd_preview_rating_5></em>',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_c5",
            'id'		=> "bd_c5_rating",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        //CRITERIA SIX
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 6:</span> Description',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_add_criteria6 bd_c6",
            'id'		=> "bd_c6_description",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        array(
            'name'		=> '<span class="bd_get_bold">Criteria 6:</span> Rating <em id=bd_preview_rating_6></em>',
            'desc'		=> "",
            'class'		=> "bd_review_hide bd_c6",
            'id'		=> "bd_c6_rating",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        array(
            'name'		=> 'Rating Type',
            'id'		=> "bd_review_type",
            'class'		=> "bd_review_hide bd_clear_that_thang",
            'type'		=> 'radio',
            'options'	=> array(
                'stars'	  => 'Stars',
                'percent' => 'Percentage'
            ),
            'std'		=> 'stars',
            'desc'		=> ''
        ),
        array(
            'name'		=> 'Final Score',
            'desc'		=> "Total of <em>__</em>% will be displayed if percentage is selected",
            'class'		=> "bd_review_hide ",
            'id'		=> "bd_final_score",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "1"
        ),
        array(
            'name'		=> 'Criteria Header',
            'desc'		=> "Leave empty if you don't want it",
            'class'		=> "bd_review_hide ",
            'id'		=> "bd_criteria_header",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "4"
        ),
        array(
            'name'		=> 'Brief Summary',
            'desc'		=> "Just one or two words",
            'class'		=> "bd_review_hide ",
            'id'		=> "bd_brief_summary",
            'type'		=> 'text',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "4"
        ),
        array(
            'name'		=> 'Longer Summary',
            'desc'		=> "Just a paragraph will do",
            'class'		=> "bd_review_hide ",
            'id'		=> "bd_longer_summary",
            'type'		=> 'textarea',
            'std'		=> "",
            'cols'		=> "50",
            'rows'		=> "4"
        ),
        array(
            'name'		=> 'Criteria Display',
            'id'		=> "bd_criteria_display",
            'type'		=> 'radio',
            'options'	=> array(
                't'			=> 'Top',
                'bottom'	=> 'Bottom',
            ),
            'std'		=> 't',
            'desc'		=> 'Where in the post do you want it to display?',
        ),
    )
);


foreach ($meta_boxes as $meta_box) {
	new RW_Meta_Box_Taxonomy($meta_box);
}

/********************* END DEFINITION OF META BOXES ***********************/

/********************* BEGIN VALIDATION ***********************/

/**
 * Validation class
 * Define ALL validation methods inside this class
 * Use the names of these methods in the definition of meta boxes (key 'validate_func' of each field)
 */
class RW_Meta_Box_Validate {
	function check_name($text) {
		if ($text == 'Anh Tran') {
			return 'He is Rilwis';
		}
		return $text;
	}
}

/********************* END VALIDATION ***********************/
?>
