<?php
/**
 * Metabox For Content.
 *
 * @package Hongo
 */
?>
<?php 
if($post->post_type == 'post'){
	hongo_meta_box_dropdown('hongo_enable_comment_single',
				esc_html__('Comment', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);
}else{
	hongo_meta_box_dropdown(	'hongo_hide_page_comment_single',
				esc_html__('Comments', 'hongo-addons'),
				array('default' => esc_html__('Default', 'hongo-addons'),
					  '1' => esc_html__('On', 'hongo-addons'),
					  '0' => esc_html__('Off', 'hongo-addons')
					 )
			);
}