<?php
/**
 * Shortcode For Product Lists
 *
 * @package Hongo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Product Lists */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hongo_addons_single_product_lists_thumbnail_size' ) ) {
	function hongo_addons_single_product_lists_thumbnail_size( $size ) {

		global $hongo_p_lists_image_size;
		if( ! empty( $hongo_p_lists_image_size ) ) {

			$size = $hongo_p_lists_image_size;
		}
		return $size;
	}
}

if ( ! function_exists( 'hongo_addons_single_product_lists_new_products' ) ) {
	function hongo_addons_single_product_lists_new_products( $query_args, $attributes, $type ) {

		global $hongo_p_lists_meta_query;
		if( ! empty( $hongo_p_lists_meta_query ) && $type == 'products' ) {

			$query_args['meta_query'][] = $hongo_p_lists_meta_query;
		}
		return $query_args;
	}
}

if ( ! function_exists( 'hongo_addons_product_lists_by_taxonomy' ) ) {
	function hongo_addons_product_lists_by_taxonomy( $query_args, $attributes, $type ) {

		global $hongo_p_lists_taxonomy_query;
		if( ! empty( $hongo_p_lists_taxonomy_query ) && $type == 'products' ) {

			$query_args['tax_query'][] = $hongo_p_lists_taxonomy_query;
		}
		return $query_args;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_style_product_lists' ) ) {
	function hongo_addons_product_archive_style_product_lists( $style ) {

		global $hongo_p_lists_shop_style;

		if( ! empty( $hongo_p_lists_shop_style ) ) {

			$style = $hongo_p_lists_shop_style;
		}
		return $style;
	}
}

if( ! function_exists( 'hongo_addons_product_archive_product_content_align' ) ) {
	function hongo_addons_product_archive_product_content_align( $class ) {

		global $hongo_p_lists_shop_content_alignment;

		if( ! empty( $hongo_p_lists_shop_content_alignment ) ) {
			$class = str_replace( $class , $hongo_p_lists_shop_content_alignment, $class );
		}
				
		return $class; 
	}
}

if ( ! function_exists( 'hongo_addons_product_list_class_product_lists' ) ) {
	function hongo_addons_product_list_class_product_lists( $class ) {

		$class = str_replace( 'hongo-shop-common-isotope', '', $class );

		return $class;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_metro_product_lists' ) ) {
	function hongo_addons_product_archive_enable_metro_product_lists( $enable_metro ) {

		global $hongo_p_lists_enable_metro;

		if( $hongo_p_lists_enable_metro != '' ) {

			$enable_metro = $hongo_p_lists_enable_metro;
		}
		return $enable_metro;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_metro_position_product_lists' ) ) {
	function hongo_addons_product_archive_metro_position_product_lists( $metro_position ) {

		global $hongo_p_lists_metro_position;

		if( $hongo_p_lists_metro_position != '' ) {

			$metro_position = $hongo_p_lists_metro_position;
		}
		return $metro_position;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_gallery_slider_product_lists' ) ) {
	function hongo_addons_product_archive_enable_gallery_slider_product_lists( $enable_gallery_slider ) {

		global $hongo_p_lists_enable_gallery_slider;

		if( $hongo_p_lists_enable_gallery_slider != '' ) {

			$enable_gallery_slider = $hongo_p_lists_enable_gallery_slider;
		}
		return $enable_gallery_slider;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_gallery_slide_product_lists' ) ) {
	function hongo_addons_product_archive_gallery_slide_product_lists( $gallery_slide ) {

		global $hongo_p_lists_gallery_slide;

		if( $hongo_p_lists_gallery_slide != '' ) {

			$gallery_slide = $hongo_p_lists_gallery_slide;
		}
		return $gallery_slide;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_deal_product_lists' ) ) {
	function hongo_addons_product_archive_enable_deal_product_lists( $enable_deal ) {

		global $hongo_p_lists_enable_deal;

		if( $hongo_p_lists_enable_deal != '' ) {

			$enable_deal = $hongo_p_lists_enable_deal;
		}
		return $enable_deal;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_sale_box_product_lists' ) ) {
	function hongo_addons_product_archive_enable_sale_box_product_lists( $enable_sale_box ) {

		global $hongo_p_lists_enable_sale_box;

		if( $hongo_p_lists_enable_sale_box != '' ) {

			$enable_sale_box = $hongo_p_lists_enable_sale_box;
		}
		return $enable_sale_box;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_new_box_product_lists' ) ) {
	function hongo_addons_product_archive_enable_new_box_product_lists( $enable_new_box ) {

		global $hongo_p_lists_enable_new_box;

		if( $hongo_p_lists_enable_new_box != '' ) {

			$enable_new_box = $hongo_p_lists_enable_new_box;
		}
		return $enable_new_box;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_star_rating_product_lists' ) ) {
	function hongo_addons_product_archive_enable_star_rating_product_lists( $enable_star_rating ) {

		global $hongo_p_lists_enable_star_rating;

		if( $hongo_p_lists_enable_star_rating != '' ) {

			$enable_star_rating = $hongo_p_lists_enable_star_rating;
		}
		return $enable_star_rating;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_alternate_image_product_lists' ) ) {
	function hongo_addons_product_archive_enable_alternate_image_product_lists( $alternate_image ) {

		global $hongo_p_lists_enable_alternate_image;

		if( $hongo_p_lists_enable_alternate_image != '' ) {

			$alternate_image = $hongo_p_lists_enable_alternate_image;
		}
		return $alternate_image;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_overlay_product_lists' ) ) {
	function hongo_addons_product_archive_enable_overlay_product_lists( $overlay ) {

		global $hongo_p_lists_enable_overlay;

		if( $hongo_p_lists_enable_overlay != '' ) {

			$overlay = $hongo_p_lists_enable_overlay;
		}
		return $overlay;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_add_to_cart_product_lists' ) ) {
	function hongo_addons_product_archive_enable_add_to_cart_product_lists( $add_to_cart ) {

		global $hongo_p_lists_enable_add_to_cart;

		if( $hongo_p_lists_enable_add_to_cart != '' ) {

			$add_to_cart = $hongo_p_lists_enable_add_to_cart;
		}
		return $add_to_cart;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_blur_effect_product_lists' ) ) {
	function hongo_addons_product_archive_enable_blur_effect_product_lists( $blur_effect ) {

		global $hongo_p_lists_enable_blur_effect;

		if( $hongo_p_lists_enable_blur_effect != '' ) {

			$blur_effect = $hongo_p_lists_enable_blur_effect;
		}
		return $blur_effect;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_quick_view_product_lists' ) ) {
	function hongo_addons_product_archive_enable_quick_view_product_lists( $quick_view ) {

		global $hongo_p_lists_enable_quick_view;

		if( $hongo_p_lists_enable_quick_view != '' ) {

			$quick_view = $hongo_p_lists_enable_quick_view;
		}
		return $quick_view;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_wishlist_product_lists' ) ) {
	function hongo_addons_product_archive_enable_wishlist_product_lists( $wishlist ) {

		global $hongo_p_lists_enable_wishlist;

		if( $hongo_p_lists_enable_wishlist != '' ) {

			$wishlist = $hongo_p_lists_enable_wishlist;
		}
		return $wishlist;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_compare_product_lists' ) ) {
	function hongo_addons_product_archive_enable_compare_product_lists( $compare ) {

		global $hongo_p_lists_enable_compare;

		if( $hongo_p_lists_enable_compare != '' ) {

			$compare = $hongo_p_lists_enable_compare;
		}
		return $compare;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_mobile_columns' ) ) {
	function hongo_addons_product_archive_mobile_columns( $mobile_column ) {

		global $hongo_p_lists_mobile_column;

		$mobile_column = $hongo_p_lists_mobile_column;

		return $mobile_column;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_gutter_type' ) ) {
	function hongo_addons_product_archive_gutter_type( $gutter_type ) {

		global $hongo_p_lists_gutter_type;

		$gutter_type = $hongo_p_lists_gutter_type;

		return $gutter_type;
	}
}


if ( ! function_exists( 'hongo_addons_product_archive_enable_short_desc_product_lists' ) ) {
	function hongo_addons_product_archive_enable_short_desc_product_lists( $short_desc ) {

		global $hongo_p_lists_enable_short_desc;

		if( $hongo_p_lists_enable_short_desc != '' ) {

			$short_desc = $hongo_p_lists_enable_short_desc;
		}
		return $short_desc;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_enable_shop_pagination_product_lists' ) ) {
	function hongo_addons_product_archive_enable_shop_pagination_product_lists( $shop_pagination ) {

		global $hongo_p_lists_enable_shop_pagination;

		if( $hongo_p_lists_enable_shop_pagination != '' ) {

			$shop_pagination = $hongo_p_lists_enable_shop_pagination;
		}
		return $shop_pagination;
	}
}

if ( ! function_exists( 'hongo_addons_product_archive_shop_pagination_style_product_lists' ) ) {
	function hongo_addons_product_archive_shop_pagination_style_product_lists( $pagination_style ) {

		global $hongo_p_lists_shop_pagination_style;

		if( $hongo_p_lists_shop_pagination_style != '' ) {

			$pagination_style = $hongo_p_lists_shop_pagination_style;
		}
		return $pagination_style;
	}
}

$hongo_slider_unique_id = 1;
if ( ! function_exists( 'hongo_product_lists_shortcode' ) ) {
	function hongo_product_lists_shortcode( $atts, $content = null ) {

		global $hongo_slider_unique_id, $hongo_slider_script, $hongo_featured_array, $hongo_p_lists_image_size, $hongo_p_lists_meta_query, $hongo_p_lists_taxonomy_query, $hongo_p_lists_shop_style, $hongo_p_lists_enable_metro, $hongo_p_lists_metro_position, $hongo_p_lists_enable_gallery_slider, $hongo_p_lists_gallery_slide, $hongo_p_lists_enable_deal, $hongo_p_lists_enable_sale_box, $hongo_p_lists_enable_new_box, $hongo_p_lists_enable_star_rating, $hongo_p_lists_enable_alternate_image,$hongo_p_lists_enable_overlay, $hongo_p_lists_enable_add_to_cart, $hongo_p_lists_enable_blur_effect, $hongo_p_lists_enable_quick_view, $hongo_p_lists_enable_wishlist, $hongo_p_lists_enable_compare, $hongo_p_lists_mobile_column, $hongo_p_lists_gutter_type,  $hongo_p_lists_enable_short_desc, $hongo_p_lists_enable_shop_pagination, $hongo_p_lists_shop_pagination_style, $hongo_p_lists_shop_content_alignment, $hongo_quick_view_popup, $hongo_compare_popup;

		extract( shortcode_atts( array(
        	'id' => '',
        	'class' => '',
        	'hongo_products_lists_show' => '',
        	'hongo_product_lists_type' => '',
        	'hongo_products_lists_category' => '',
        	'hongo_shop_style' => '',
        	'hongo_image_srcset' => 'woocommerce_thumbnail',

        	'hongo_enable_slider' => '',
        	'slides_per_view_desktop' => '4',
        	'slides_per_view_mini_desktop' => '3',
            'slides_per_view_tablet' => '2',
            'slides_per_view_mobile' => '1',
            'hongo_enable_loop'=>'',
            'hongo_enable_autoplay'=>'',
            'slidedelay'=> '',
            'show_pagination'=>'',
            'show_pagination_style' => '',
            'pagination_color' => '',
            'active_pagination_color' => '',
            'hongo_show_navigation' => '1',
            'navigation_color' => '',
            'show_cursor_color_style' => '',
            'hongo_slidespeed' => '',

            'hongo_enable_metro' => '1',
            'hongo_metro_position' => '*,*,2-2,2-1,2-2,1-2',

            'hongo_enable_gallery_slider' => '',
            'hongo_gallery_slide' => '3',

        	'hongo_enable_deal' => '',

        	'hongo_enable_sale_box' => '',
        	'hongo_enable_new_box' => '',
        	'hongo_enable_star_rating' => '',
        	'hongo_enable_alternate_image' => '',
        	'hongo_enable_overlay' => '',
        	'hongo_enable_add_to_cart' => '',
        	'hongo_enable_blur_effect' => '',
        	'hongo_enable_quick_view' => '',
        	'hongo_enable_wishlist' => '',
        	'hongo_enable_compare' => '',
        	'hongo_enable_short_desc' => '',
        	'hongo_per_page' => '4',
        	'hongo_enable_shop_pagination' => '',
        	'hongo_shop_pagination_style' => 'pagination',
        	'hongo_column' => '4',
        	'hongo_mobile_column' => '',
        	'hongo_gutter_type' => 'gutter-medium',
        	'hongo_orderby' => '',
        	'hongo_sortby' => '',
        	'hongo_content_alignment' => '',
        ), $atts ) );

		$output = $hongo_slider_id = $slider_config = $navigation_html = $pagination_html = $pagination_bottom_class = $pagination_class = '';
		$classes = array();

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        if( $hongo_enable_slider == '1' ) {
        	$classes[] = 'hongo-product-lists-slider';
        }

        $class_list = ! empty( $classes ) ? ' ' . implode( ' ', $classes) : '';

        // To filter Product lists column 
        $hongo_column = apply_filters( 'hongo_product_lists_column', $hongo_column );

		// Change thumbanil image size
		$hongo_p_lists_image_size = $hongo_image_srcset;
		add_filter( 'single_product_archive_thumbnail_size', 'hongo_addons_single_product_lists_thumbnail_size' );
		add_filter( 'hongo_loop_alternate_product_thumbnail_size', 'hongo_addons_single_product_lists_thumbnail_size' );

		// Set products list style
		if( ! empty( $hongo_shop_style ) ) {

			$hongo_p_lists_shop_style = 'shop-' . $hongo_shop_style;
			add_filter( 'hongo_product_archive_style', 'hongo_addons_product_archive_style_product_lists', 100 );

		} else {

			$hongo_p_lists_shop_style = '';
		}

		// Set products list style
		if( ! empty( $hongo_content_alignment ) ) {

			$hongo_p_lists_shop_content_alignment = $hongo_content_alignment;
			add_filter( 'hongo_product_archive_content_alignment', 'hongo_addons_product_archive_product_content_align', 100 );

		} else {

			$hongo_p_lists_shop_content_alignment = '';
		}

		// Set Product metro layout
		if( $hongo_enable_metro != '' ) {

			$hongo_p_lists_enable_metro = $hongo_enable_metro;
			add_filter( 'hongo_product_archive_page_enable_metro', 'hongo_addons_product_archive_enable_metro_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_metro = '';
		}

		// Set Product metro position
		if( $hongo_metro_position != '' ){
			$hongo_p_lists_metro_position = $hongo_metro_position;
			add_filter( 'hongo_product_archive_page_double_grid_position', 'hongo_addons_product_archive_metro_position_product_lists', 100 );

		} else {

			$hongo_p_lists_metro_position = '';
		}

		// Set products loop slider
		if( $hongo_enable_gallery_slider != '' ) {

			$hongo_p_lists_enable_gallery_slider = $hongo_enable_gallery_slider;
			add_filter( 'hongo_product_archive_enable_gallery_slider', 'hongo_addons_product_archive_enable_gallery_slider_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_gallery_slider = '';
		}

		// Set products loop slide
		if( $hongo_gallery_slide != '' ) {

			$hongo_p_lists_gallery_slide = $hongo_gallery_slide;
			add_filter( 'hongo_product_archive_gallery_slide', 'hongo_addons_product_archive_gallery_slide_product_lists', 100 );

		} else {

			$hongo_p_lists_gallery_slide = '';
		}

		// Set products loop Countdown
		if( $hongo_enable_deal != '' ) {

			$hongo_p_lists_enable_deal = $hongo_enable_deal;
			add_filter( 'hongo_product_archive_enable_deal', 'hongo_addons_product_archive_enable_deal_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_deal = '';
		}

		// Set products sale box
		if( $hongo_enable_sale_box != '' ) {

			$hongo_p_lists_enable_sale_box = $hongo_enable_sale_box;
			add_filter( 'hongo_product_archive_enable_sale_box', 'hongo_addons_product_archive_enable_sale_box_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_sale_box = '';
		}

		// Set products new box
		if( $hongo_enable_new_box != '' ) {

			$hongo_p_lists_enable_new_box = $hongo_enable_new_box;
			add_filter( 'hongo_product_archive_enable_new_box', 'hongo_addons_product_archive_enable_new_box_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_new_box = '';
		}

		// Set products star rating
		if( $hongo_enable_star_rating != '' ) {

			$hongo_p_lists_enable_star_rating = $hongo_enable_star_rating;
			add_filter( 'hongo_product_archive_enable_star_rating', 'hongo_addons_product_archive_enable_star_rating_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_star_rating = '';
		}

		// Set Products list style alternative image enable/disable option
		if( $hongo_enable_alternate_image != '' ) {

			$hongo_p_lists_enable_alternate_image = $hongo_enable_alternate_image;
			add_filter( 'hongo_product_archive_enable_alternate_image', 'hongo_addons_product_archive_enable_alternate_image_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_alternate_image = '';
		}

		// Set Products list style Overlay enable/disable option
		if( $hongo_enable_overlay != '' ) {

			$hongo_p_lists_enable_overlay = $hongo_enable_overlay;
			add_filter( 'hongo_product_archive_overlay', 'hongo_addons_product_archive_enable_overlay_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_overlay = '';
		}

		// Set product list style add to cart style enable/disable option
		if( $hongo_enable_add_to_cart != '' ){

			$hongo_p_lists_enable_add_to_cart = $hongo_enable_add_to_cart;
			add_filter( 'hongo_product_archive_enable_add_to_cart', 'hongo_addons_product_archive_enable_add_to_cart_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_add_to_cart = '';
		}

		// Set product list style clean style blur effect enable/disable option
		if( $hongo_enable_blur_effect != '' ){

			$hongo_p_lists_enable_blur_effect = $hongo_enable_blur_effect;
			add_filter( 'hongo_product_archive_enable_blur_effect', 'hongo_addons_product_archive_enable_blur_effect_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_blur_effect = '';
		}

		// Set product list style quick view enable/disable option
		if( $hongo_enable_quick_view != '' ){

			$hongo_quick_view_popup = true;
			$hongo_p_lists_enable_quick_view = $hongo_enable_quick_view;
			add_filter( 'hongo_product_archive_enable_quick_view', 'hongo_addons_product_archive_enable_quick_view_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_quick_view = '';
		}

		// Set product list style wishlist enable/disable option
		if( $hongo_enable_wishlist != '' ){

			$hongo_p_lists_enable_wishlist = $hongo_enable_wishlist;
			add_filter( 'hongo_product_archive_enable_wishlist', 'hongo_addons_product_archive_enable_wishlist_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_wishlist = '';
		}

		// Set product list style Compare enable/disable option
		if( $hongo_enable_compare != '' ){

			$hongo_compare_popup = true;
			$hongo_p_lists_enable_compare = $hongo_enable_compare;
			add_filter( 'hongo_product_archive_enable_compare', 'hongo_addons_product_archive_enable_compare_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_compare = '';
		}

		// Set Product in mobile 2 columns
		if( $hongo_mobile_column != '' ) {

			if( $hongo_mobile_column == '2' ) {

				$hongo_p_lists_mobile_column = $hongo_mobile_column;
			}
			add_filter( 'hongo_product_lists_mobile_column', 'hongo_addons_product_archive_mobile_columns', 100 );

		} else {

			$hongo_p_lists_mobile_column = '';
		}

		// Set product list style Gutter Type option
		if( $hongo_gutter_type != '' ){

			if( $hongo_enable_slider == '1' ) {

				$hongo_p_lists_gutter_type = '';

			} else {
				$hongo_p_lists_gutter_type = $hongo_gutter_type;
			}
			add_filter( 'hongo_product_archive_gutter', 'hongo_addons_product_archive_gutter_type', 100 );

		} else {
			$hongo_p_lists_gutter_type = '';
		}

		// Set product list style Short Description enable/disable option
		if( $hongo_enable_short_desc != '' ){

			$hongo_p_lists_enable_short_desc = $hongo_enable_short_desc;
			add_filter( 'hongo_product_archive_enable_short_desc', 'hongo_addons_product_archive_enable_short_desc_product_lists', 100 );

		} else {
			$hongo_p_lists_enable_short_desc = '';
		}

		// Set product list style Shop pagination enable/disable option
		if( $hongo_enable_shop_pagination != '' ){

			$hongo_p_lists_enable_shop_pagination = $hongo_enable_shop_pagination;
			add_filter( 'hongo_product_archive_enable_pagination', 'hongo_addons_product_archive_enable_shop_pagination_product_lists', 100 );

		} else {

			$hongo_p_lists_enable_shop_pagination = '';
		}

		// Set product list style Shop pagination Style
		if( $hongo_shop_pagination_style != '' ){

			$hongo_p_lists_shop_pagination_style = $hongo_shop_pagination_style;
			add_filter( 'hongo_product_archive_product_pagination_style', 'hongo_addons_product_archive_shop_pagination_style_product_lists', 100 );

		} else {

			$hongo_p_lists_shop_pagination_style = '';
		}

		// Unique Id
        $hongo_slider_unique_id = ! empty( $hongo_slider_unique_id ) ? $hongo_slider_unique_id : 1;
        $navigation_unique_id = $hongo_slider_unique_id;
        $hongo_slider_id = ( $hongo_slider_id ) ? $hongo_slider_id : 'hongo-product-list';
        $hongo_slider_id.= '-' . $hongo_slider_unique_id;
        $hongo_slider_unique_id++;        

        // Slider
		if( $hongo_enable_slider == '1' ) {

			$gutter_size = hongo_get_product_slider_gutter_size( $hongo_gutter_type );
			$slider_config .= 'spaceBetween: '. $gutter_size .',';

	        // Navigation
			if( $hongo_show_navigation == 1 ) {

	            $navigation_color = ! empty( $navigation_color ) ? $navigation_color : '';

	            $hongo_featured_array[] = '#'.$hongo_slider_id. ' .swiper-button-next i, #'.$hongo_slider_id.' .swiper-button-prev i { color: '.$navigation_color.'; }';

	            $navigation_html .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id .'"><i class="fa-solid fa-chevron-right"></i></div>
	                    <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id .'"><i class="fa-solid fa-chevron-left"></i></div>';

	            $slider_config .= "navigation: { nextEl: '.swiper-next-" . $navigation_unique_id . "', prevEl: '.swiper-prev-" . $navigation_unique_id . "', },";
	        }

	        // Pagination
			if( $show_pagination == 1 ) {

				if ( $show_pagination_style == 'swiper-pagination-border' ) {
                                
                    if ( ! empty( $pagination_color ) ) {
                        $hongo_featured_array[] =  '.' . $hongo_slider_id . ' .swiper-pagination-border .swiper-pagination-bullet { border-color:'.$pagination_color.' }';
                        if ( empty( $active_pagination_color ) ) {
                            $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$pagination_color.'!important; }';
                        }
                    }
                    
                    if ( ! empty( $active_pagination_color ) ) {
                        $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { border-color:'.$active_pagination_color.' }';
                        $hongo_featured_array[] =  '.'.$hongo_slider_id. ' .swiper-pagination-border .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'!important; }';
                    }
                } else {

		            if ( ! empty( $pagination_color ) ) {
		                $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-pagination-bullet { background-color:'.$pagination_color.'; }';
		            }
		            if ( ! empty( $active_pagination_color ) ) {
		                $hongo_featured_array[] = '.'.$hongo_slider_id.' .swiper-pagination-bullet-active { background-color:'.$active_pagination_color.'; }';
		            }
                }

	            $pagination_bottom_class = $show_pagination == 1 ? ' pagination-bottom-space' : '';
	            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style.' ' : ' white-move ';
	            $pagination_class = ! empty( $show_pagination_style ) ? ' '.$show_pagination_style : ' swiper-pagination-dots';
	            $class_name = ' swiper-pagination-' . $navigation_unique_id;
	            $pagination_html .= '<div class="swiper-pagination'.$class_name.$pagination_class.'"></div>';

	            $slider_config .= "pagination: { el: '.swiper-pagination-".$navigation_unique_id."',type: 'bullets', clickable: true },";
	        }

			// Don't call isotope while shop listing slider enabled
			add_filter( 'hongo_product_list_class', 'hongo_addons_product_list_class_product_lists', 100 );
		}

		switch( $hongo_products_lists_show ) {

			case 'types':

				if( ! empty( $hongo_product_lists_type ) ) {

					$output .= '<div'.$id.' class="woocommerce hongo-woocommerce-product-lists'.esc_attr( $class_list ).'">';

						remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
						remove_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 27 );
						remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
						remove_action( 'woocommerce_before_shop_loop', 'hongo_top_filter_sidebar_content', 35 );
						remove_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 35 );						

						switch( $hongo_product_lists_type ) {

							case 'recent_products':

								/* Recent Products */

								$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="recent-product-lists '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_class ).esc_attr( $pagination_bottom_class ).esc_attr( $show_cursor_color_style ).'">';

										$atts = array_merge( array(
											'category'     => '',
											'cat_operator' => 'IN',
										), (array) $atts );

										if( $hongo_enable_shop_pagination ==  '1' ) {
											$atts['paginate'] = true;
										}
										if( ! empty( $hongo_per_page ) ) {
											$atts['limit'] = $hongo_per_page;
										}
										if( ! empty( $hongo_column ) ) {
											$atts['columns'] = $hongo_column;
										}
										if( ! empty( $hongo_orderby ) ) {
											$atts['orderby'] = $hongo_orderby;
										}
										if( ! empty( $hongo_sortby ) ) {
											$atts['order'] = $hongo_sortby;
										}
										$output .= WC_Shortcodes::recent_products( $atts );

										$output .= ( $hongo_enable_slider == '1' && $hongo_show_navigation == 1 ) ? $navigation_html : '';

										$output .= ( $hongo_enable_slider == '1' && $show_pagination == 1 ) ? $pagination_html : '';

								$output .= '</div>';
							break;

							case 'featured_products':

								/* Featured Products */
								$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="featured-product-lists '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_class ).esc_attr( $pagination_bottom_class ).esc_attr( $show_cursor_color_style ).'">';

									// Get Featured Product 
									$atts = array(
										'category'     => '',
										'cat_operator' => 'IN',
									);

									if( $hongo_enable_shop_pagination ==  '1' ) {
										$atts['paginate'] = true;
									}
									if( ! empty( $hongo_per_page ) ) {
										$atts['limit'] = $hongo_per_page;
									}
									if( ! empty( $hongo_column ) ) {
										$atts['columns'] = $hongo_column;
									}
									if( ! empty( $hongo_orderby ) ) {
										$atts['orderby'] = $hongo_orderby;
									}
									if( ! empty( $hongo_sortby ) ) {
										$atts['order'] = $hongo_sortby;
									}

									$output .= WC_Shortcodes::featured_products( $atts );

									$output .= ( $hongo_enable_slider == '1' && $hongo_show_navigation == 1 ) ? $navigation_html : '';

									$output .= ( $hongo_enable_slider == '1' && $show_pagination == 1 ) ? $pagination_html : '';

								$output .= '</div>';

							break;

							case 'sale_products':

								/* Sale Products */
								$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="sale-product-lists '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_class ).esc_attr( $pagination_bottom_class ).esc_attr( $show_cursor_color_style ).'">';

									$atts = array_merge( array(
										'category'     => '',
										'cat_operator' => 'IN',
									), (array) $atts );

									if( $hongo_enable_shop_pagination ==  '1' ) {
										$atts['paginate'] = true;
									}
									if( ! empty( $hongo_per_page ) ) {
										$atts['limit'] = $hongo_per_page;
									}
									if( ! empty( $hongo_column ) ) {
										$atts['columns'] = $hongo_column;
									}
									if( ! empty( $hongo_orderby ) ) {
										$atts['orderby'] = $hongo_orderby;
									}
									if( ! empty( $hongo_sortby ) ) {
										$atts['order'] = $hongo_sortby;
									}

									$output .= WC_Shortcodes::sale_products( $atts );

									$output .= ( $hongo_enable_slider == '1' && $hongo_show_navigation == 1 ) ? $navigation_html : '';

									$output .= ( $hongo_enable_slider == '1' && $show_pagination == 1 ) ? $pagination_html : '';

								$output .= '</div>';

							break;

							case 'best_selling_products':

								/* Best Selling Products */
								$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="best-selling-product-lists '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_class ).esc_attr( $pagination_bottom_class ).esc_attr( $show_cursor_color_style ).'">';

									$atts = array_merge( array(
										'category'     => '',
										'cat_operator' => 'IN',
									), (array) $atts );

									if( $hongo_enable_shop_pagination ==  '1' ) {
										$atts['paginate'] = true;
									}
									if( ! empty( $hongo_per_page ) ) {
										$atts['limit'] = $hongo_per_page;
									}
									if( ! empty( $hongo_column ) ) {
										$atts['columns'] = $hongo_column;
									}

									$output .= WC_Shortcodes::best_selling_products( $atts );

									$output .= ( $hongo_enable_slider == '1' && $hongo_show_navigation == 1 ) ? $navigation_html : '';

									$output .= ( $hongo_enable_slider == '1' && $show_pagination == 1 ) ? $pagination_html : '';

								$output .= '</div>';

							break;

							case 'top_rated_products':

								/* Top Rated Products */
								$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="top-rated-product-lists '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_class ).esc_attr( $pagination_bottom_class ).esc_attr( $show_cursor_color_style ).'">';

									$atts = array_merge( array(
								      'category'     => '',
								      'cat_operator' => 'IN',
								    ), (array) $atts );

								    if( $hongo_enable_shop_pagination ==  '1' ) {
										$atts['paginate'] = true;
									}
									if( ! empty( $hongo_per_page ) ) {
										$atts['limit'] = $hongo_per_page;
									}
									if( ! empty( $hongo_column ) ) {
										$atts['columns'] = $hongo_column;
									}
									if( ! empty( $hongo_orderby ) ) {
										$atts['orderby'] = $hongo_orderby;
									}
									if( ! empty( $hongo_sortby ) ) {
										$atts['order'] = $hongo_sortby;
									}

									$output .= WC_Shortcodes::top_rated_products( $atts );

									$output .= ( $hongo_enable_slider == '1' && $hongo_show_navigation == 1 ) ? $navigation_html : '';

									$output .= ( $hongo_enable_slider == '1' && $show_pagination == 1 ) ? $pagination_html : '';

								$output .= '</div>';

							break;

							case 'new_products':

								/* New Products */
								$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="new-product-lists '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_class ).esc_attr( $pagination_bottom_class ).esc_attr( $show_cursor_color_style ).'">';

									if( $hongo_enable_shop_pagination ==  '1' ) {
										$atts['paginate'] = true;
									}
									if( ! empty( $hongo_per_page ) ) {
										$atts['limit'] = $hongo_per_page;
									}
									if( ! empty( $hongo_column ) ) {
										$atts['columns'] = $hongo_column;
									}
									if( ! empty( $hongo_orderby ) ) {
										$atts['orderby'] = $hongo_orderby;
									}
									if( ! empty( $hongo_sortby ) ) {
										$atts['order'] = $hongo_sortby;
									}

									// add filter for display new products
									$hongo_p_lists_meta_query = array(
																			'key'     => '_hongo_new_product_shop_single',
																			'value'   => '1',
																			'compare' => '=',
																		);
									add_filter( 'woocommerce_shortcode_products_query', 'hongo_addons_single_product_lists_new_products', 10, 3 );

									$output .= WC_Shortcodes::products( $atts );

									$output .= ( $hongo_enable_slider == '1' && $hongo_show_navigation == 1 ) ? $navigation_html : '';
									
									$output .= ( $hongo_enable_slider == '1' && $show_pagination == 1 ) ? $pagination_html : '';
									
									// remove filter for displayed new products
									remove_filter( 'woocommerce_shortcode_products_query', 'hongo_addons_single_product_lists_new_products', 10, 3 );

								$output .= '</div>';

							break;
						}

						add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
						add_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 27 );
						add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
						add_action( 'woocommerce_before_shop_loop', 'hongo_top_filter_sidebar_content', 35 );
						add_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 35 );

					$output .= '</div>';
				}
			break;

			case 'category':

				$category_id = $hongo_products_lists_category;

				if( ! empty( $category_id ) ) {

					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
					remove_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 27 );
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
					remove_action( 'woocommerce_before_shop_loop', 'hongo_top_filter_sidebar_content', 35 );
					remove_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 35 );

					$output .= '<div'.$id.' class="woocommerce hongo-woocommerce-product-lists'.esc_attr( $class_list ).'">';

						$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="hongo-product-category-lists '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_class ).esc_attr( $pagination_bottom_class ).esc_attr( $show_cursor_color_style ).'">';

							$atts['category'] = $category_id;
							if( ! empty( $hongo_per_page ) ) {
								$atts['limit'] = $hongo_per_page;
							}
							if( $hongo_enable_shop_pagination ==  '1' ) {
								$atts['paginate'] = true;
							}
							if( ! empty( $hongo_column ) ) {
								$atts['columns'] = $hongo_column;
							}
							if( ! empty( $hongo_orderby ) ) {
								$atts['orderby'] = $hongo_orderby;
							}
							if( ! empty( $hongo_sortby ) ) {
								$atts['order'] = $hongo_sortby;
							}

							$output .= WC_Shortcodes::product_category( $atts );

							$output .= ( $hongo_enable_slider == '1' && $hongo_show_navigation == 1 ) ? $navigation_html : '';

							$output .= ( $hongo_enable_slider == '1' && $show_pagination == 1 ) ? $pagination_html : '';

						$output .= '</div>';

					$output .= '</div>';

					add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
					add_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 27 );
					add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
					add_action( 'woocommerce_before_shop_loop', 'hongo_top_filter_sidebar_content', 35 );
					add_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 35 );
				}
			break;

			default:

				$term_id = isset( $atts[ 'hongo_products_lists_' . $hongo_products_lists_show ] ) ? $atts[ 'hongo_products_lists_' . $hongo_products_lists_show ] : '';

				if( ! empty( $term_id ) ) {

					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
					remove_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 27 );
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
					remove_action( 'woocommerce_before_shop_loop', 'hongo_top_filter_sidebar_content', 35 );
					remove_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 35 );

					$output .= '<div'.$id.' class="woocommerce hongo-woocommerce-product-lists'.esc_attr( $class_list ).'">';

						$output .= '<div id="'.esc_attr( $hongo_slider_id ).'" class="hongo-product-category-lists '.esc_attr( $hongo_slider_id ).esc_attr( $pagination_class ).esc_attr( $pagination_bottom_class ).esc_attr( $show_cursor_color_style ).'">';

							if( ! empty( $hongo_per_page ) ) {
								$atts['limit'] = $hongo_per_page;
							}
							if( $hongo_enable_shop_pagination ==  '1' ) {
								$atts['paginate'] = true;
							}
							if( ! empty( $hongo_column ) ) {
								$atts['columns'] = $hongo_column;
							}
							if( ! empty( $hongo_orderby ) ) {
								$atts['orderby'] = $hongo_orderby;
							}
							if( ! empty( $hongo_sortby ) ) {
								$atts['order'] = $hongo_sortby;
							}

							// add filter for display products by custom taxonomy
							$hongo_p_lists_taxonomy_query = array(
								'taxonomy'  => $hongo_products_lists_show,
								'field'   	=> 'slug',
								'terms' 	=> $term_id,
							);
							add_filter( 'woocommerce_shortcode_products_query', 'hongo_addons_product_lists_by_taxonomy', 10, 3 );

							$output .= WC_Shortcodes::products( $atts );

							remove_filter( 'woocommerce_shortcode_products_query', 'hongo_addons_product_lists_by_taxonomy', 10, 3 );

							$output .= ( $hongo_enable_slider == '1' && $hongo_show_navigation == 1 ) ? $navigation_html : '';

							$output .= ( $hongo_enable_slider == '1' && $show_pagination == 1 ) ? $pagination_html : '';

						$output .= '</div>';

					$output .= '</div>';

					add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
					add_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 27 );
					add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
					add_action( 'woocommerce_before_shop_loop', 'hongo_top_filter_sidebar_content', 35 );
					add_action( 'woocommerce_before_shop_loop', 'hongo_left_right_sidebar_content', 35 );
				}
			break;
		}

		remove_filter( 'single_product_archive_thumbnail_size', 'hongo_addons_single_product_lists_thumbnail_size' );
		remove_filter( 'hongo_loop_alternate_product_thumbnail_size', 'hongo_addons_single_product_lists_thumbnail_size' );
		
		// Reset products list style
		if( ! empty( $hongo_shop_style ) ) {

			remove_filter( 'hongo_product_archive_style', 'hongo_addons_product_archive_style_product_lists', 100 );
		}

		if( ! empty( $hongo_content_alignment ) ) {

			remove_filter( 'hongo_product_archive_content_alignment', 'hongo_addons_product_archive_product_content_align', 100 );			
		}

		// Reset product metro
		if( ! empty( $hongo_enable_metro ) ) {

			remove_filter( 'hongo_product_archive_page_enable_metro', 'hongo_addons_product_archive_enable_metro_product_lists', 100 );
		}

		// Reset product metro position
		if( ! empty( $hongo_metro_position ) ) {

			remove_filter( 'hongo_product_archive_page_double_grid_position', 'hongo_addons_product_archive_metro_position_product_lists', 100 );
		}

		// Reset enable loop slider
		if( $hongo_enable_gallery_slider != '' ) {

			remove_filter( 'hongo_product_archive_enable_gallery_slider', 'hongo_addons_product_archive_enable_gallery_slider_product_lists', 100 );
		}

		// Reset loop slide
		if( $hongo_gallery_slide != '' ) {

			remove_filter( 'hongo_product_archive_gallery_slide', 'hongo_addons_product_archive_gallery_slide_product_lists', 100 );
		}

		// Reset enable sale box
		if( $hongo_enable_deal != '' ) {

			remove_filter( 'hongo_product_archive_enable_deal', 'hongo_addons_product_archive_enable_deal_product_lists', 100 );
		}

		// Reset enable sale box
		if( $hongo_enable_sale_box != '' ) {

			remove_filter( 'hongo_product_archive_enable_sale_box', 'hongo_addons_product_archive_enable_sale_box_product_lists', 100 );
		}

		// Reset enable new box
		if( $hongo_enable_new_box != '' ) {

			remove_filter( 'hongo_product_archive_enable_new_box', 'hongo_addons_product_archive_enable_new_box_product_lists', 100 );
		}

		// Reset enable star rating
		if( $hongo_enable_star_rating != '' ) {

			remove_filter( 'hongo_product_archive_enable_star_rating', 'hongo_addons_product_archive_enable_star_rating_product_lists', 100 );
		}

		// Reset enable alternative image
		if( $hongo_enable_alternate_image != '' ){
			remove_filter( 'hongo_product_archive_enable_alternate_image', 'hongo_addons_product_archive_enable_alternate_image_product_lists', 100 );
		}

		// Reset enable Overlay
		if( $hongo_enable_overlay != '' ){
			remove_filter( 'hongo_product_archive_overlay', 'hongo_addons_product_archive_enable_overlay_product_lists', 100 );
		}		

		// Reset enable add to cart button
		if( $hongo_enable_add_to_cart != '' ){
			remove_filter( 'hongo_product_archive_enable_add_to_cart', 'hongo_addons_product_archive_enable_add_to_cart_product_lists', 100 );
		}

		// Reset enable Blur effect
		if( $hongo_enable_blur_effect != '' ){
			remove_filter( 'hongo_product_archive_enable_blur_effect', 'hongo_addons_product_archive_enable_blur_effect_product_lists', 100 );
		}

		// Reset enable Quick View button
		if( $hongo_enable_quick_view != '' ){
			remove_filter( 'hongo_product_archive_enable_quick_view', 'hongo_addons_product_archive_enable_quick_view_product_lists', 100 );
		}

		// Reset enable Wishlist button
		if( $hongo_enable_wishlist != '' ){
			remove_filter( 'hongo_product_archive_enable_wishlist', 'hongo_addons_product_archive_enable_wishlist_product_lists', 100 );
		}

		// Reset enable Compare button
		if( $hongo_enable_compare != '' ){
			remove_filter( 'hongo_product_archive_enable_compare', 'hongo_addons_product_archive_enable_compare_product_lists', 100 );
		}

		// Reset mobile column
		if( $hongo_mobile_column != '' ){
			remove_filter( 'hongo_product_lists_mobile_column', 'hongo_addons_product_archive_mobile_columns', 100 );
		}

		// Reset enable gutter
		if( $hongo_gutter_type != '' ){
			remove_filter( 'hongo_product_archive_gutter', 'hongo_addons_product_archive_gutter_type', 100 );
		}

		// Reset enable short decription
		if( $hongo_enable_short_desc != '' ){
			remove_filter( 'hongo_product_archive_enable_short_desc', 'hongo_addons_product_archive_enable_short_desc_product_lists', 100 );
		}

		// Reset enable shop pagination
		if( $hongo_enable_shop_pagination != '' ){
			remove_filter( 'hongo_product_archive_enable_pagination', 'hongo_addons_product_archive_enable_shop_pagination_product_lists', 100 );
		}

		// Reset shop pagination style
		if( $hongo_shop_pagination_style != '' ){
			remove_filter( 'hongo_product_archive_product_pagination_style', 'hongo_addons_product_archive_shop_pagination_style_product_lists', 100 );
		}

		if( $hongo_enable_slider == '1' ) {

			$slider_config .= 'on: { init: function() { var _this = this; setTimeout( function () { _this.update(); }, 10 ); } },';

			$slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
			( $hongo_slidespeed ) ? $slider_config .= 'speed:  '.$hongo_slidespeed.',' : '';
	        ( $hongo_enable_loop == 1 ) ? $slider_config .= 'loop: true,' : '';
	        ( $hongo_enable_autoplay == 1 ) ? $slider_config .= 'autoplay: { delay:' . $slidedelay . ', },' : $slider_config .= 'autoplay: false,';
	        ( $slides_per_view_mobile ) ? $slider_config .= 'slidesPerView: '.$slides_per_view_mobile.',' : '';
	        $slider_config .= "breakpoints: { 768: { slidesPerView: ".$slides_per_view_tablet." }, 992: { slidesPerView: ".$slides_per_view_mini_desktop." }, 1200: { slidesPerView: ".$slides_per_view_desktop." } },";
	        $slider_config .= "watchOverflow: true,";
	        
	        if( hongo_load_javascript_by_key( 'swiper' ) ) {
		        ob_start(); ?>
		        	$( '#<?php echo sprintf( '%s', $hongo_slider_id ); ?> .woocommerce' ).addClass( 'swiper-container' ); $( '#<?php echo sprintf( '%s', $hongo_slider_id ); ?> .products' ).addClass( 'swiper-wrapper' ); $( '#<?php echo sprintf( '%s', $hongo_slider_id ); ?> .product' ).addClass( 'swiper-slide' ); var <?php echo str_replace( '-', '_', $hongo_slider_id ); ?>;<?php echo str_replace( '-', '_', $hongo_slider_id ); ?> = new Swiper('#<?php echo sprintf( '%s', $hongo_slider_id ); ?> .woocommerce', { <?php echo sprintf( '%s', $slider_config ); ?> }); $( '.nav-tabs li a' ).on('click', function() { setTimeout(function () { if ($( '#<?php echo sprintf( '%s', $hongo_slider_id ); ?>' ).length > 0){ <?php echo str_replace( '-', '_', $hongo_slider_id ); ?>.update(); } }, 500); }); 
		        <?php
		        $hongo_slider_script .= ob_get_contents();
		        ob_end_clean();
		    }

			// Don't call isotope while shop listing slider enabled
			remove_filter( 'hongo_product_list_class', 'hongo_addons_product_list_class_product_lists', 100 );
	   	}

		return $output;
	}
}
add_shortcode('hongo_product_lists','hongo_product_lists_shortcode');