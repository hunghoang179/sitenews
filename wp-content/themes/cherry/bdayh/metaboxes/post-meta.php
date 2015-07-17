<?php
/**
 * Create the Post meta boxes
 */
 
add_action('add_meta_boxes', 'metabox_posts');
function metabox_posts(){

    
    /* Create a quote metabox -----------------------------------------------------*/
    $meta_box = array(
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
    add_meta_box( $meta_box );
	
	/* Create a link metabox ----------------------------------------------------*/
	$meta_box = array(
		'id' => 'bd-metabox-post-link',
		'title' =>  __('Link Settings', 'bd'),
		'description' => __('Input your link', 'bd'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
					'name' =>  __('The Link', 'bd'),
					'desc' => __('Input your link. Example: http://www.bdayh.com', 'bd'),
					'id' => '_bd_link_url',
					'type' => 'text',
					'std' => ''
				)
		)
	);
    add_meta_box( $meta_box );
    
    /* Create a video metabox -------------------------------------------------------*/
    $meta_box = array(
		'id' => 'bd-metabox-post-video',
		'title' => __('Video Settings', 'bd'),
		'description' => __('These settings enable you to embed videos into your posts.', 'bd'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('Video Height', 'bd'),
					'desc' => __('The video height when image is 580px wide.', 'bd'),
					'id' => '_bd_video_height',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('M4V File URL', 'bd'),
					'desc' => __('The URL to the .m4v video file', 'bd'),
					'id' => '_bd_video_m4v',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('OGV File URL', 'bd'),
					'desc' => __('The URL to the .ogv video file', 'bd'),
					'id' => '_bd_video_ogv',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Poster Image', 'bd'),
					'desc' => __('The preview image. Image should be 580px wide. Click to upload and then "Insert into Post".', 'bd'),
					'id' => '_bd_video_poster_url',
					'type' => 'file',
					'std' => ''
				),
			array(
					'name' => __('Embedded Code', 'bd'),
					'desc' => __('If you are using something other than self hosted video such as Youtube or Vimeo, paste the embed code here. Width is best at 580px with any height.<br><br> This field will override the above fields.', 'bd'),
					'id' => '_bd_video_embed_code',
					'type' => 'textarea',
					'std' => ''
				)
		)
	);
	add_meta_box( $meta_box );
	
	/* Create an audio metabox ------------------------------------------------------*/
	$meta_box = array(
		'id' => 'bd-metabox-post-audio',
		'title' =>  __('Audio Settings', 'bd'),
		'description' => __('These settings enable you to embed audio into your posts.', 'bd'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('MP3 File URL', 'bd'),
					'desc' => __('The URL to the .mp3 audio file', 'bd'),
					'id' => '_bd_audio_mp3',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('OGA File URL', 'bd'),
					'desc' => __('The URL to the .oga, .ogg audio file', 'bd'),
					'id' => '_bd_audio_ogg',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Audio Poster Image', 'bd'),
					'desc' => __('The preview image for this audio track. Image should be 580px wide. Click to upload and then "Insert into Post".', 'bd'),
					'id' => '_bd_audio_poster_url',
					'type' => 'file',
					'std' => ''
				),
			array( 
					'name' => __('Audio Poster Image Height', 'bd'),
					'desc' => __('The height of the poster image when the image has a width of 580px', 'bd'),
					'id' => '_bd_audio_height',
					'type' => 'text',
					'std' => ''
				)
		)
	);
	add_meta_box( $meta_box );
}