(function($) {
	"use strict";
	// VC Image Hotspot parameter js
	vc.atts.hongo_image_hotspot = {
		init: function (param, $field) {
			if(!$field.prev().data('vc-shortcode-param-name') || !$field.prev().data('vc-shortcode-param-name') == 'image') {
				return false;
			}
			
			var imgSrc = '',
			$imgInput = $field.prev().find('input[name="image"]'),
			previewImage = function() {
				if($field.prev().find('img').length > 0) {
					var id = $field.find('.hongo_hotspot_var').attr('id');
					    imgSrc = $field.prev().find('img').attr('src');
					    imgSrc = imgSrc.replace('-150x150', '', imgSrc);
					if($field.find('img.hongo-hotspot-image').length > 0) {
						$field.find('img.hongo-hotspot-image').attr('src', imgSrc);
					} else {
						$field.find('.hongo-hotspot-image-holder').append('<img src="'+imgSrc+'" alt="Preview image" class="hongo-hotspot-image" />');
					}
					$field.find('.hongo-hotspot-image-holder').hotspot({
						mode:			'admin',
						LS_Variable:	'#'+id,
						done_btnClass: 'btn btn-success hongo_addons_done',
						remove_btnClass: 'btn button-primary hongo_addons_remove',
						sync_btnClass: 'btn btn-info hongo_addons_server',
						popupTitle:		$field.find('.hongo-hotspot-image-holder').data('popup-title') ? $field.find('.hongo-hotspot-image-holder').data('popup-title') : 'Save',
						saveText:		$field.find('.hongo-hotspot-image-holder').data('save-text') ? $field.find('.hongo-hotspot-image-holder').data('save-text') : 'Save',
						closeText:		$field.find('.hongo-hotspot-image-holder').data('close-text') ? $field.find('.hongo-hotspot-image-holder').data('close-text') : 'Close',
						dataStuff: [
							{
								'property': 'Product',
								'default': ''
							},
							{
								'property': 'Position',
								'default':''
							}
						]
					});
				}
			};
				
			previewImage();
			$imgInput.change(function() {
				previewImage();
			});
		},
	};

})(jQuery);