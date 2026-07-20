<?php
/**
 * Map For Video
 *
 * @package hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Video */
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
	    'name' => esc_html__('Video', 'hongo-addons'),
	    'description' => esc_html__('Add local and external videos', 'hongo-addons'),
	    'icon' => 'fa-solid fa-video hongo-shortcode-icon',
	    'base' => 'hongo_video',
	    'category' => 'Hongo',
	    'params' => array(
	        array(
		        'type' => 'dropdown',
		        'heading' => esc_html__('Video', 'hongo-addons'),
		        'param_name' => 'hongo_video_type',
		        'admin_label' => true,
		        'value' => array(
		        	esc_html__( 'Select', 'hongo-addons') => '',
		        	esc_html__( 'Youtube video', 'hongo-addons' ) => 'youtube-video',
		            esc_html__( 'Vimeo video', 'hongo-addons' ) => 'vimeo-video',
		            esc_html__( 'Html video', 'hongo-addons' ) => 'html5-video',
		        ),
	      	),
	      	array(
		      	'type' => 'hongo_preview_image',
		      	'heading' => esc_html__('Select pre-made style', 'hongo-addons'),
		      	'param_name' => 'hongo_video_preview_image',
		    ),
	      	array(
		        'type' => 'textfield',
		        'heading' => esc_html__('YouTube URL', 'hongo-addons'),
		        'param_name' => 'hongo_youtube_url',
		        'description' => esc_html__( 'Enter YouTube URL like https://www.youtube.com/embed/xxxxxxxx', 'hongo-addons' ),
		        'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'youtube-video' ) ),
		    ),
	      	array(
		        'type' => 'textfield',
		        'heading' => esc_html__('Vimeo URL', 'hongo-addons'),
		        'param_name' => 'hongo_vimeo_url',
		        'description' => esc_html__( 'Add VIMEO VIDEO URL like https://player.vimeo.com/video/xxxxxxxxxx, you will get this from vimeo.', 'hongo-addons' ),
		        'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'vimeo-video' ) ),
		    ),
		    array(
		      	'type' => 'textfield',
		      	'heading' => esc_html__('MP4 video URL', 'hongo-addons'),
		      	'param_name' => 'mp4_video',
		      	'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'html5-video' ) ),
		    ), 
		    array(
		      	'type' => 'textfield',
		      	'heading' => esc_html__('OGG video URL', 'hongo-addons'),
		      	'param_name' => 'ogg_video',
		      	'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'html5-video' ) ),
		    ), 
		    array(
		      	'type' => 'textfield',
		      	'heading' => esc_html__('WEBM video URL', 'hongo-addons'),
		      	'param_name' => 'webm_video',
		      	'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'html5-video' ) ),
		    ),
		   array(
		      	'type' => 'hongo_custom_switch_option',
		      	'holder' => 'div',
		      	'class' => '',
		      	'heading' => esc_html__('Autoplay', 'hongo-addons'),
		      	'param_name' => 'video_autoplay',
		      	'value' => array(
		      		esc_html__('Off', 'hongo-addons') => '0', 
		            esc_html__('On', 'hongo-addons') => '1'
		        ),
		      	'std' => '0',
		      	'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'html5-video' ) ),
		    ),
		    array(
		      	'type' => 'hongo_custom_switch_option',
		      	'holder' => 'div',
		      	'class' => '',
		      	'heading' => esc_html__('Mute', 'hongo-addons'),
		      	'param_name' => 'video_muted',
		      	'value' => array(
		      		esc_html__('Off', 'hongo-addons') => '0', 
		            esc_html__('On', 'hongo-addons') => '1'
		        ),
		      	'std' => '1',
		      	'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'html5-video' ) ),
		    ),
		    array(
		      	'type' => 'hongo_custom_switch_option',
		      	'holder' => 'div',
		      	'class' => '',
		      	'heading' => esc_html__('Loop', 'hongo-addons'),
		      	'param_name' => 'video_loop',
		      	'value' => array(
		      		esc_html__('Off', 'hongo-addons') => '0',
		            esc_html__('On', 'hongo-addons') => '1'
		        ),
		      	'std' => '1',
		      	'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'html5-video' ) ),
		    ), 
		    array(
		      	'type' => 'hongo_custom_switch_option',
		      	'holder' => 'div',
		      	'class' => '',
		      	'heading' => esc_html__('Controls', 'hongo-addons'),
		      	'param_name' => 'video_controls',
		      	'value' => array(
		      		esc_html__('Off', 'hongo-addons') => '0', 
		            esc_html__('On', 'hongo-addons') => '1'
		        ),
		      	'std' => '1',
		      	'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'html5-video' ) ),
		    ),
		    
		    array(
		      	'type' => 'hongo_custom_switch_option',
		      	'holder' => 'div',
		      	'class' => '',
		      	'heading' => esc_html__('Responsive video', 'hongo-addons'),
		      	'param_name' => 'enable_responsive_video',
		      	'value' => array(
		      		esc_html__('Off', 'hongo-addons') => '0', 
		            esc_html__('On', 'hongo-addons') => '1'
		        ),
		      	'std' => '1',
		      	'dependency'  => array( 'element' => 'hongo_video_type', 'value' => array( 'youtube-video','vimeo-video' ) ),
		      	'group' => 'Style',
		    ),
		     array(
		      	'type'        => 'textfield',
		      	'heading'     => esc_html__('Width', 'hongo-addons' ),
		      	'param_name'  => 'width',
		      	'dependency'  => array( 'element' => 'enable_responsive_video', 'value' => array('0') ),
		      	'group'       => esc_html__('Style', 'hongo-addons')
		    ),
		    array(
		      	'type'        => 'textfield',
		      	'heading'     => esc_html__('Height', 'hongo-addons' ),
		      	'param_name'  => 'height',
		      	'dependency'  => array( 'element' => 'enable_responsive_video', 'value' => array('0') ),
		      	'group'       => esc_html__('Style', 'hongo-addons')
		    ),
		    $hongo_vc_extra_id,
      		$hongo_vc_extra_class,
	    )
	)
);