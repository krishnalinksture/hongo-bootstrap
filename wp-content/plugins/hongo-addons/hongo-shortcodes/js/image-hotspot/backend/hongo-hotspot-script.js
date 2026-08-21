(function($) {

	'use strict';

	vc.atts.hongo_image_hotspot = {

		init: function( param, $field ) {

			var $imageParam = $field.prev();
			var lastImageId = '';

			/*
			 * Get current image ID from WPBakery.
			 */
			function getImageId() {

				var $input = $imageParam.find('input[name="image"]');

				if ( ! $input.length ) {
					return '';
				}

				return $input.val() || '';
			}


			/*
			 * Get WordPress image URL from attachment ID.
			 */
			function loadImage( imageId ) {

				if ( ! imageId ) {
					return;
				}

				/*
				 * Make sure WordPress media API exists.
				 */
				if ( typeof wp === 'undefined' || typeof wp.media === 'undefined' ) {
					return;
				}

				/*
				 * Get attachment.
				 */
				var attachment = wp.media.attachment(imageId);

				/*
				 * Fetch attachment data.
				 */
				attachment.fetch().done(function() {

					var imgSrc = attachment.get('url');

					if ( ! imgSrc ) {
						return;
					}

					/*
					 * Update hotspot image.
					 */
					updateHotspotImage(imgSrc);

				});

			}


			/*
			 * Put image into hotspot.
			 */
			function updateHotspotImage(imgSrc) {

				var $holder = $field.find( '.hongo-hotspot-image-holder' );

				if (!$holder.length) {
					return;
				}


				var $image = $holder.find( 'img.hongo-hotspot-image');

				if ($image.length) {
					/*
					 * Existing image.
					 */
					$image.attr(
						'src',
						imgSrc
					);

				} else {
					/*
					 * Create image.
					 */
					$image = $('<img>', {
						src: imgSrc,
						alt: 'Preview image',
						class: 'hongo-hotspot-image'
					});

					$holder.empty().append($image);

				}


				/*
				 * Initialize hotspot plugin.
				 */
				initHotspot();

			}


			/*
			 * Initialize your existing hotspot plugin.
			 */
			function initHotspot() {

				var $holder = $field.find( '.hongo-hotspot-image-holder' );

				if (!$holder.length) {
					return;
				}

				var id = $field.find( '.hongo_hotspot_var' ).attr('id');

				$holder.hotspot({

					mode: 'admin',

					LS_Variable: '#' + id,

					done_btnClass:
						'btn btn-success hongo_addons_done',

					remove_btnClass:
						'btn button-primary hongo_addons_remove',

					sync_btnClass:
						'btn btn-info hongo_addons_server',

					popupTitle:
						$holder.data('popup-title') ||
						'Save',

					saveText:
						$holder.data('save-text') ||
						'Save',

					closeText:
						$holder.data('close-text') ||
						'Close',

					dataStuff: [
						{
							property: 'Product',
							default: ''
						},
						{
							property: 'Position',
							default: ''
						}
					]

				});

			}

			/*
			 * Check image ID.
			 */
			function checkImage() {

				var imageId = getImageId();
				if (imageId === lastImageId) {
					return;
				}

				lastImageId = imageId;

				if (imageId) {
					loadImage(imageId);
				}
			}

			/*
			 * Check existing image.
			 */
			checkImage();

			/*
			 * WPBakery sometimes changes the hidden
			 * input without triggering change.
			 */
			setInterval(function() {

				checkImage();

			}, 300);


			/*
			 * Also listen for normal change.
			 */
			$imageParam.on(
				'change',
				'input[name="image"]',
				function() {
					checkImage();
				}
			);
		}
	};
})(jQuery);