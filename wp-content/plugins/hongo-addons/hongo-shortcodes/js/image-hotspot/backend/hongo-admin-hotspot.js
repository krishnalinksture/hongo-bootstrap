;(function($) {
	
	// Default settings for the plugin
	var defaults = {

		// Data
		data: [],

		// Hotspot Tag
		tag: 'img',

		// Mode of the plugin
		// Options: admin, display
		mode: 'display',

		// HTML5 LocalStorage variable
		LS_Variable: '__hongo_hotspot_local',
		
		// Hidden class for hiding the data
		hiddenClass: 'hidden',

		// Event on which the data will show up
		// Options: click, hover, none
		interactivity: 'hover',

		// Buttons' id (Used only in Admin mode)
		done_btnId: 'hongo_addons_done',
		remove_btnId: 'hongo_addons_remove',
		sync_btnId: 'hongo_addons_server',

		// Buttons class
		done_btnClass: 'btn btn-success hongo_addons_done',
		remove_btnClass: 'btn btn-danger hongo_addons_remove',
		sync_btnClass: 'btn btn-info hongo_addons_server',

		// Classes for Hotspots
		hotspotClass: 'hongo_addons_hotspot',
		hotspotAuxClass: 'hongo_addons_inc',

		// Overlay
		hotspotOverlayClass: 'hongo_addons_overlay',
		
		// Text
		popupTitle: 'Tooltip content',
		saveText: 'Save',
		closeText: 'Close',

		// No. of variables included in the spots
		dataStuff: [
			{
				'property': 'Title',
				'default': 'Tooltip title'
			}
		]
	},
	count = 1;
	
	// Constructor
	function Hotspot(element, options) {
		
		// Overwriting defaults with options
		this.config = $.extend(true, {}, defaults, options);
		
		this.element = element;
		this.imageEl = element.find(this.config.tag);
		this.imageParent = this.imageEl.parent();

		this.broadcast = '';

		var widget = this;

		// Event API for users
		$.each(this.config, function(index, val) {
			if (typeof val === 'function') {
				widget.element.on(index + '.hotspot', function() {
					val(widget.broadcast);
				});
			};
		});

		this.init();
	};

	Hotspot.prototype.init = function() {

		this.getData();

		if (this.config.mode != 'admin') {
			return;
		};
		
		var hongo_spot_image = new Image(),
			self = this;
		
		hongo_spot_image.src = $(this.imageEl).attr('src');
		
		hongo_spot_image.onload = function() {
			var height = self.imageEl[0].height;
			var width = self.imageEl[0].width;

			// Masking the image
			$('<span/>', {
				html: '<p>This is Admin-mode. Click this Panel to Store Messages</p>'
			}).addClass(self.config.hotspotOverlayClass).appendTo(self.imageParent);

			var widget = self;
			var data = [];
			var counter = count;

			// Adding controls
			$('<button/>', {
				text: 'Remove All Spots'
			}).prop('id', self.config.remove_btnId).addClass(self.config.remove_btnClass).appendTo(self.imageParent);

			$(self.imageParent).delegate('button#' + self.config.remove_btnId, 'click', function(event) {
				event.preventDefault();
				widget.removeData();
			});

			// Start storing
			self.element.delegate('span', 'click', function(event) {
				event.preventDefault();
				
				counter++;

				var offset = $(this).offset();
				var relativeX = (event.pageX - offset.left) / width * 100;
				var relativeY = (event.pageY - offset.top) / height * 100;

				var dataStuff = widget.config.dataStuff;

				var dataBuild = {index: counter, x: relativeX, y: relativeY};

				for (var i = 0; i < dataStuff.length; i++) {
					var val = dataStuff[i];
					dataBuild[val.property] = val.default;
				};

				data.push(dataBuild);

				if (widget.config.interactivity === 'none') {
					var htmlBuilt = $('<div id="hongo-hotspot-dot-'+counter+'" data-index="'+counter+'"><i class="delete-item fas fa-times"></i></div>');
				} else {
					var htmlBuilt = $('<div id="hongo-hotspot-dot-'+counter+'" data-index="'+counter+'"><i class="delete-item fas fa-times"></i></div>').addClass(widget.config.hiddenClass);
				}


				$.each(dataBuild, function(index, val) {
					if (typeof val === "string") {
						$('<div/>', {
							html: val
						}).addClass('Hotspot_' + index).appendTo(htmlBuilt);
					};
				});

				var div = $('<div/>', {
					html: htmlBuilt
				}).css({
					'top': relativeY + '%',
					'left': relativeX + '%'
				}).addClass(widget.config.hotspotClass + ' ' + widget.config.hotspotAuxClass).appendTo(widget.element);

				if (widget.config.interactivity === 'click') {
					div.on(widget.config.interactivity, function(event) {
						$(this).children('div').toggleClass(widget.config.hiddenClass);
					});
					htmlBuilt.css('display', 'block');
				} else {
					htmlBuilt.removeClass(widget.config.hiddenClass);
				}

				if (widget.config.interactivity === 'none') {
					htmlBuilt.css('display', 'block');
				};
				
				widget.storeData(data);
				data = [];
				
				widget.popupWindow(counter);
				
				$('body').trigger('hongo-hotspot-updated');
			});
			
			self.element.delegate('.hongo_addons_hotspot', 'click', function(event) {
				var $self = $(this),
					index = $self.find('> div').data('index'),
					currentData = widget.getItemData(index)[0];					
				
				widget.popupWindow(index, currentData);
			});
			
			self.element.delegate('.delete-item', 'click', function(event) {
				event.preventDefault();
				event.stopPropagation();
				
				var index = $(this).parent().data('index');
				
				widget.removeItem(index);
				
				setTimeout(function() {
					widget.updateView();
				}, 0);
			});

		};
	};

	Hotspot.prototype.popupWindow = function(index, currentData) {
		var self = this,
			dataStuff = this.config.dataStuff,
			$popupInnerHtml = '',
			popupTitle = 'Select Product',
			saveText = this.config.saveText,
			closeText = this.config.closeText;

		for (var i = 0; i < dataStuff.length; i++) {
			var val = dataStuff[i],
				defaultText = (typeof currentData != 'undefined' && typeof currentData[val.property] != 'undefined') ? currentData[val.property] : val.default,
				input = '<label>'+val.property+'</label><input type="text" class="hongo-hotspot-'+val.property+'" value="'+defaultText+'" />';						
			if(val.property == 'Product') {
				
				input = '<label>'+val.property+' Id </label>';
				input += '<input type="text" class="hongo-hotspot-'+ val.property +'" value="'+defaultText+'" />';
				input += '<span>'+ hongoHotspot.product_description +'</span>';
			}

			if(val.property == 'Position') {
				var product_position = $.parseJSON( hongoHotspot.products_position );
				input = '<label>'+val.property+'</label>';
				input += '<select class="hongo-hotspot-'+ val.property +'">';
				input += '<option value="">Select Position</option>';
				$.each( product_position, function( key, value ) {
					var selected = ( defaultText == key ) ? ' selected="selected"' : '';
				  	input += '<option value="'+key+'"'+selected+'>'+value+'</option>';
				});
				input += '<select>';
			}

			$popupInnerHtml += '<div>'+input+'</div>';
		};
		
		$popupInnerHtml += '<a href="#" title="'+closeText+'" class="vc_general vc_ui-button vc_ui-button-default vc_ui-button-shape-rounded vc_ui-button-fw hongo-hotspot-close">'+closeText+'</a><a href="#" title="'+saveText+'" class="vc_general vc_ui-button vc_ui-button-action vc_ui-button-shape-rounded vc_ui-button-fw hongo-hotspot-save">'+saveText+'</a>';
		
		var $popupHtml = '<div class="hongo-hotspot-popup"><div class="hongo-hotspot-popup-title">'+popupTitle+'<a href="#" title="Close" class="hongo-hotspot-close Default-close"></a></div>'+$popupInnerHtml+'</div>';
		
		$('body').append($popupHtml);
		
		$('.hongo-hotspot-save').on('click', function() {
			var $container = $(this).parents('.hongo-hotspot-popup'),
				dataBuild = {};
			
			for (var i = 0; i < dataStuff.length; i++) {
				var val = dataStuff[i];
				dataBuild[val.property] = $container.find('.hongo-hotspot-'+val.property).val();
			};
			
			$('.hongo-hotspot-popup').remove();
			
			self.updateData(dataBuild, index);
			
			self.updateView();
		});
		
		$('body').on('click', '.hongo-hotspot-close', function() {
			$('.hongo-hotspot-popup').remove();
		});
	};

	Hotspot.prototype.getItemData = function(index) {
		if (index == '') {
			return;
		};

		var raw = decodeURIComponent($(this.config.LS_Variable).val()),
			obj = [],
			newObj = [];
		
		if (raw) {
			obj = JSON.parse(raw);
		}

		$.each(obj, function(count) {
			var node = obj[count];
			
			if(node['index'] == index) {
				newObj.push(node);
			}
		});
		
		return newObj;
	};

	Hotspot.prototype.getData = function() {
		if (($(this.config.LS_Variable).val() == '' || $(this.config.LS_Variable).val()) === null && this.config.data.length == 0) {
			return;
		} 

		if (this.config.mode == 'admin' && ($(this.config.LS_Variable).val() == '' || $(this.config.LS_Variable).val() === null)) {
			return;
		} 
		
		this.beautifyData();
		
		$('body').trigger('hongo-hotspot-initialized');
	};

	Hotspot.prototype.beautifyData = function() {
		var widget = this;

		if (this.config.mode != 'admin' && this.config.data.length != 0) {
			var obj = this.config.data;
		} else {
			var raw = decodeURIComponent($(this.config.LS_Variable).val());
			var obj = JSON.parse(raw);
		}
		
		for (var i = obj.length - 1; i >= 0; i--) {
			var el = obj[i];
			
			if(i == obj.length - 1) {
				count = el['index'];
			}

			if (this.config.interactivity === 'none') {
				var htmlBuilt = $('<div id="hongo-hotspot-dot-'+el.index+'" class="hongo-admin-'+el.Position+'" data-index="'+el.index+'"><i class="delete-item fas fa-times"></i></div>');
			} else {
				var htmlBuilt = $('<div id="hongo-hotspot-dot-'+el.index+'" class="hongo-admin-'+el.Position+'" data-index="'+el.index+'"><i class="delete-item fas fa-times"></i></div>').addClass(this.config.hiddenClass);
			}

			$.each(el, function(index, val) {
				if (typeof val === 'string') {
					var productHtml = '';
					if( index == 'Product' ) {

						var products_data = jQuery.parseJSON( hongoHotspot.products_json );
						productHtml += '<div class="product-info-hotspot-wrap">';
							productHtml += '<div class="product-image"><img src="' + products_data.image + '"></div>';
							productHtml += '<div class="product-title">' + products_data.title + '</div>';
						productHtml += '</div>';
					}
					$('<div/>', {
						html: ( index == 'Product' ) ? productHtml : val
					}).addClass('Hotspot_' + index).appendTo(htmlBuilt);
				};
			});

			var div = $('<div/>', {
				html: htmlBuilt
			}).css({
				'top': el.y + '%',
				'left': el.x + '%'
			}).addClass(this.config.hotspotClass).appendTo(this.element);

			if (widget.config.interactivity === 'click') {
				div.on(widget.config.interactivity, function(event) {
					$(this).children('div').toggleClass(widget.config.hiddenClass);
				});
				htmlBuilt.css('display', 'block');
			} else {
				htmlBuilt.removeClass(this.config.hiddenClass);
			}

			if (this.config.interactivity === 'none') {
				htmlBuilt.css('display', 'block');
			}
		};
	};

	Hotspot.prototype.storeData = function(data) {

		if (data.length == 0) {
			return;
		};

		var raw = decodeURIComponent($(this.config.LS_Variable).val());
		obj = [];
		
		if (raw) {
			var obj = JSON.parse(raw);
		}

		$.each(data, function(index) {
			var node = data[index];

			obj.push(node);
		});

		$(this.config.LS_Variable).val(encodeURIComponent(JSON.stringify(obj)));

		this.broadcast = 'Saved to LocalStorage';
		this.element.trigger('afterSave.hotspot');
	};

	Hotspot.prototype.updateData = function(data, index) {

		if (data.length == 0 || index == '') {
			return;
		};

		var raw = decodeURIComponent($(this.config.LS_Variable).val()),
			obj = [];
		
		if (raw) {
			obj = JSON.parse(raw);
		}

		$.each(obj, function(count) {
			if(obj[count]['index'] == index) {
				$.each(obj[count], function(i) {
					if(typeof data[i] != 'undefined' && typeof obj[count][i] != 'undefined') {
						obj[count][i] = data[i];
					}
				});
			}
		});

		$(this.config.LS_Variable).val(encodeURIComponent(JSON.stringify(obj)));

		this.broadcast = 'Saved to LocalStorage';
		this.element.trigger('afterSave.hotspot');
	};

	Hotspot.prototype.removeItem = function(index) {
		if (index == '') {
			return;
		};

		var raw = decodeURIComponent($(this.config.LS_Variable).val()),
			obj = [],
			newObj = [];
		
		if (raw) {
			obj = JSON.parse(raw);
		}
		
		$.each(obj, function(count) {
			var node = obj[count];
			
			if(node['index'] != index) {
				newObj.push(node);
			}
		});
		
		$(this.config.LS_Variable).val(encodeURIComponent(JSON.stringify(newObj)));

		this.broadcast = 'Saved to LocalStorage';
		this.element.trigger('afterSave.hotspot');
	};

	Hotspot.prototype.removeData = function() {
		if ($(this.config.LS_Variable).val === null) {
			return;
		};
		
		if (!confirm('Are you sure you want delete all spots?')) {
			return;
		};
		
		$(this.config.LS_Variable).val('');
		this.broadcast = 'Removed successfully';
		this.element.trigger('afterRemove.hotspot');
		
		this.updateView();
	};

	Hotspot.prototype.updateView = function() {
		if(this.element.find('.hongo_addons_hotspot').length > 0) {
			this.element.find('.hongo_addons_hotspot').remove();
		}
		
		this.beautifyData();
		
		$('body').trigger('hongo-hotspot-updated');
	};
	
	$.fn.hotspot = function (options) {
		new Hotspot(this, options);
		return this;
	};

}(jQuery));