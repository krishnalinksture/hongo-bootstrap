if (function($) {
    if ( vc ) {

        vc.atts.hongo_link = {
            init: function(param, $field) {
                if ( $(document).find('[data-vc-shortcode = "hongo_navigation_links"]').length ) {
                    $( document ).find( '.vc_param-group-admin-labels' ).each(function() {
                        var text = $(this).text();
                        text = text.replace( 'Link configuration: ', '' );
                        text = decodeURIComponent( text );
                        var res = text.split( '|' );
                        if (  res !== undefined && res['1'] !== undefined ) {
                            var title = res['1'].split( ':' );
                            if (  title !== undefined && title[0] !== undefined && title[1] !== undefined ) {
                                $( this ).html( '<strong>' + title[0].charAt(0).toUpperCase() + title[0].substr(1).toLowerCase() + ' : </strong>' + title[1] );
                            }
                        }
                    });
                }
                $(".hongo_link-build", $field).click(function(e) {
                    var $block, $input, $url_label, $title_label, value_object, $link_submit, $vc_link_submit, $vc_link_nofollow, dialog;
                    e.preventDefault(), $block = $(this).closest(".hongo_link"), $input = $block.find(".wpb_vc_param_value"), $url_label = $block.find(".url-label"), $title_label = $block.find(".title-label"), value_object = $input.data("json"), $link_submit = $("#wp-link-submit"), $vc_link_submit = $('<input type="submit" name="vc_link-submit" id="vc_link-submit" class="button-primary" value="Set Link">'), $link_submit.hide(), $("#vc_link-submit").remove(), $vc_link_submit.insertBefore($link_submit), $vc_link_nofollow = $('<div class="link-target vc-link-nofollow"><label><span></span> <input type="checkbox" id="vc-link-nofollow"> Add nofollow option to link</label></div>'), $("#link-options .vc-link-nofollow").remove(), $vc_link_nofollow.insertAfter($("#link-options .link-target")), setTimeout(function() {
                        var currentHeight = $("#most-recent-results").css("top");
                        $("#most-recent-results").css("top", parseInt(currentHeight) + $vc_link_nofollow.height())
                    }, 200), dialog = !window.wpLink && $.fn.wpdialog && $("#wp-link").length ? {
                        $link: !1,
                        open: function() {
                            this.$link = $("#wp-link").wpdialog({
                                title: wpLinkL10n.title,
                                width: 480,
                                height: "auto",
                                modal: !0,
                                dialogClass: "wp-dialog",
                                zIndex: 3e5
                            }), this.$link.addClass("vc-link-wrapper")
                        },
                        close: function() {
                            this.$link && (this.$link.wpdialog("close"), this.$link.removeClass("vc-link-wrapper"))
                        }
                    } : window.wpLink;
                    var onOpen = function(e, wrap) {
                            jQuery(wrap).addClass("vc-link-wrapper")
                        },
                        onClose = function(e, wrap) {
                            jQuery(wrap).removeClass("vc-link-wrapper"), jQuery(document).off("wplink-open", onOpen), jQuery(document).off("wplink-close", onClose)
                        };
                    jQuery(document).off("wplink-open", onOpen).on("wplink-open", onOpen), jQuery(document).off("wplink-close", onClose).on("wplink-close", onClose), "admin_frontend_editor" === vc_mode ? dialog.open("vc-hidden-editor") : dialog.open("content"), _.isString(value_object.url) && ($("#wp-link-url").length ? $("#wp-link-url").val(value_object.url) : $("#url-field").val(value_object.url)), _.isString(value_object.title) && ($("#wp-link-text").length ? $("#wp-link-text").val(value_object.title) : $("#link-title-field").val(value_object.title)), $("#wp-link-target").length ? $("#wp-link-target").prop("checked", !_.isEmpty(value_object.target)) : $("#link-target-checkbox").prop("checked", !_.isEmpty(value_object.target)), $("#vc-link-nofollow").length && $("#vc-link-nofollow").prop("checked", !_.isEmpty(value_object.rel)), $vc_link_submit.unbind("click.vcLink").bind("click.vcLink", function(e) {
                        e.preventDefault(), e.stopImmediatePropagation();
                        var string, options = {};
                        options.url = $("#wp-link-url").length ? $("#wp-link-url").val() : $("#url-field").val(), options.title = $("#wp-link-text").length ? $("#wp-link-text").val() : $("#link-title-field").val();
    	                $.ajax({
    	                    type: 'POST',
    	                    url: hongoAddonsLink.ajaxurl,
    	                    data: {
    	                        'action':'get_postid_from_url',
    	                        'post_url' : options.url
    	                    },
    	                    success:function(response) {
                                options.postid = response.toString();
                                var $checkbox = $("#wp-link-target").length ? $("#wp-link-target") : $("#link-target-checkbox");
                                return options.target = $checkbox[0].checked ? " _blank" : "", options.rel = $("#vc-link-nofollow")[0].checked ? "nofollow" : "", string = _.map(options, function(value, key) {
                                    if (_.isString(value) && 0 < value.length) return key + ":" + encodeURIComponent(value)
                                }).join("|"), $input.val(string), $input.data("json", options), $url_label.html(options.url + options.target), $title_label.html(options.title), dialog.close(), $link_submit.show(), $vc_link_submit.unbind("click.vcLink"), $vc_link_submit.remove(), $("#wp-link-cancel").unbind("click.vcLink"), window.wpLink.textarea = "", $checkbox.attr("checked", !1), $("#most-recent-results").css("top", ""), $("#vc-link-nofollow").attr("checked", !1), !1
    	                    }
    	                });
                    }), $("#wp-link-cancel").unbind("click.vcLink").bind("click.vcLink", function(e) {
                        e.preventDefault(), dialog.close(), $vc_link_submit.unbind("click.vcLink"), $vc_link_submit.remove(), $("#wp-link-cancel").unbind("click.vcLink"), window.wpLink.textarea = ""
                    })
                })
            }
        }
    }
}(window.jQuery), _.isUndefined(window.vc)) var vc = {
  atts: {}
};
(jQuery);