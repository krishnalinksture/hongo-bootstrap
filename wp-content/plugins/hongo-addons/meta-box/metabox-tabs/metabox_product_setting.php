<?php
/**
 * Metabox For Post Setting.
 *
 * @package Hongo
 */
?>
<?php 
hongo_meta_box_dropdown('hongo_featured_image_single',
				esc_html__('Featured Image in Post Page', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons'),
					 ),
				esc_html__('Select Off if you want to hide featured image in the post detail page.', 'hongo-addons')
			);
hongo_meta_box_textarea('hongo_quote_single',
				esc_html__('Blockquote', 'hongo-addons'),
				esc_html__('Add block quote content', 'hongo-addons')
			);
hongo_meta_box_dropdown('hongo_lightbox_image_single',
				esc_html__('List Type', 'hongo-addons'),
				array('1' => esc_html__('Grid with Lightbox Popup', 'hongo-addons'),
					  '0' => esc_html__('Slider', 'hongo-addons'),
					 ),
				esc_html__('Select listing type', 'hongo-addons')
			);
hongo_meta_box_upload_multiple('hongo_gallery_single', 
				esc_html__('Images', 'hongo-addons'),
				esc_html__('Upload / select multiple images to build a gallery', 'hongo-addons')
			);
hongo_meta_box_dropdown('hongo_link_type_single',
				esc_html__('Link Type', 'hongo-addons'),
				array('external' => esc_html__('External Url', 'hongo-addons'),
					  'ajax-popup' => esc_html__('Ajax Popup', 'hongo-addons'),
					 ),
				esc_html__('Select link type', 'hongo-addons')
			);
hongo_meta_box_text('hongo_link_single',
				esc_html__('External Link', 'hongo-addons'),
				esc_html__('Add external link', 'hongo-addons')
			);
hongo_meta_box_dropdown('hongo_video_type_single',
				esc_html__('Video Type', 'hongo-addons'),
				array('self' => esc_html__('Self Hosted', 'hongo-addons'),
					  'external' => esc_html__('External Url', 'hongo-addons'),
					 ),
				esc_html__('Select video type', 'hongo-addons')
			);
hongo_meta_box_dropdown('hongo_enable_mute_single',
				esc_html__('Video Mute', 'hongo-addons'),
				array('1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons'),
					 ),
				esc_html__('Select on to mute background video sound.', 'hongo-addons')
			);
hongo_meta_box_text('hongo_video_mp4_single',
				esc_html__('MP4', 'hongo-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'hongo-addons'),
				''
			);
hongo_meta_box_text('hongo_video_ogg_single',
				esc_html__('OGG', 'hongo-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'hongo-addons'),
				''
			);
hongo_meta_box_text('hongo_video_webm_single',
				esc_html__('WEBM', 'hongo-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'hongo-addons'),
				''
			);
hongo_meta_box_text('hongo_video_single',
				esc_html__('External video url', 'hongo-addons'),
				'Video url is required here if external url option is selected.',
				esc_html__('Add YOUTUBE VIDEO EMBED URL like https://www.youtube.com/embed/xxxxxxxxxx, you will get this from youtube embed iframe src code. or add VIMEO VIDEO EMBED URL like https://player.vimeo.com/video/xxxxxxxx, you will get this from vimeo embed iframe src code.', 'hongo-addons')
			);
hongo_meta_box_textarea('hongo_audio_single',
				esc_html__('Audio URL (Oembed) OR Embed Code', 'hongo-addons'),
				esc_html__('Add code.', 'hongo-addons')
			);