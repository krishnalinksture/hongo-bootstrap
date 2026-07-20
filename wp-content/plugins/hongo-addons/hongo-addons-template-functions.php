<?php

    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) { exit; }

/******* Compare template functions start *******/

	/* To Add compare functionality to shop page */
	if ( ! function_exists( 'hongo_addons_template_loop_product_compare' ) ) {
	    function hongo_addons_template_loop_product_compare( $args = array() ) {
	        global $product;

	        // To get Product archive list style
	        $product_archive_list_style = hongo_get_product_archive_list_style();
	        
	        $hongo_product_archive_enable_compare = hongo_get_product_archive_enable_compare();
	        if( $hongo_product_archive_enable_compare != '1' ) {
	            return false;
	        }

	        $productid =$product->get_id();

	        $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
	        $cookie_name = 'hongo-compare'.$siteid;
	        $cookie     = ! empty( $_COOKIE[$cookie_name] ) ? $_COOKIE[$cookie_name] : '';
	        $productids = ! empty( $cookie ) ? explode(",", $cookie) : array();            
	        
	        if ( $product ) {
	            $defaults = array(
	                'quantity' => 1,
	                'class'    => implode( ' ', array_filter( array(
	                		'button',
	                        'product_type_' . $product->get_type(),
	                        'hongo-compare',
	                ) ) ),                    
	            );

	            $args = apply_filters( 'hongo_addons_loop_product_compare_args', wp_parse_args( $args, $defaults ), $product );

	            hongo_addons_get_template( 'loop/compare-product.php', $args );
	        }

            // To enqueue add to compare script
            wp_enqueue_script( 'hongo-addons-compare' );
	    }
	}

	/* To Compare product template */
	if ( ! function_exists( 'hongo_addons_compare_details' ) ) {
	    function hongo_addons_compare_details( $productids ) {

	        $hongo_compare_product_enable_heading   = get_theme_mod( 'hongo_compare_product_enable_heading', '1' );
	        $hongo_compare_product_heading_text     = get_theme_mod( 'hongo_compare_product_heading_text', __( 'COMPARE PRODUCTS', 'hongo-addons' ) );
	        $hongo_compare_product_enable_filter    = get_theme_mod( 'hongo_compare_product_enable_filter', '1' );

	        $defaults = array( 
	                                'productids'    => $productids,
	                                'enable_heading'=> $hongo_compare_product_enable_heading,
	                                'heading_text'  => $hongo_compare_product_heading_text,
	                                'enable_filter' => $hongo_compare_product_enable_filter
	                            );

	        $defaults = apply_filters( 'hongo_addons_compare_details_args', $defaults );

	        hongo_addons_get_template( 'compare-popup/compare-details.php', $defaults );
	    }
	}

	/* Compare Product Add To Cart*/
	if( ! function_exists( 'hongo_addons_common_add_to_cart' ) ) {
	    function hongo_addons_common_add_to_cart( $product, $class_details = '' ) {
	        
	        if ( $product ) {                
	            $defaults = array(
	                'quantity'   => 1,
	                'class'      => implode( ' ', array_filter( array(
	                    'button',
	                    'product_type_' . $product->get_type(),
	                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button '.$class_details : '',
	                    $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
	                ) ) ),
	                'attributes' => array(
	                    'data-product_id'  => $product->get_id(),
	                    'data-product_sku' => $product->get_sku(),
	                    'aria-label'       => $product->add_to_cart_description(),
	                    'rel'              => 'nofollow',
	                ),
	            );

	            $args = apply_filters( 'woocommerce_loop_add_to_cart_args', $defaults, $product );
	            
	            if ( isset( $args['attributes']['aria-label'] ) ) {
	                $args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
	            }

	            wc_get_template( 'loop/add-to-cart.php', $args );
	        }
	    }
	}

	/* Output the quick view product compare */
	if ( ! function_exists( 'hongo_addons_template_quick_view_product_compare' ) ) {
	    function hongo_addons_template_quick_view_product_compare( $args = array() ) {
	        global $product;

	        $hongo_quick_view_product_enable_compare = get_theme_mod( 'hongo_quick_view_product_enable_compare', '1' );
	        if( $hongo_quick_view_product_enable_compare != '1' ) {
	            return false;
	        }

	        $productid = $product->get_id();

	        $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
	        $cookie_name = 'hongo-compare'.$siteid;
	        $cookie     = ! empty( $_COOKIE[$cookie_name] ) ? $_COOKIE[$cookie_name] : '';
	        $productids = ! empty( $cookie ) ? explode(",", $cookie) : array();
	        
	        $hongo_single_product_compare_icon = get_theme_mod( 'hongo_single_product_compare_icon', 'ti-control-shuffle' );
			$hongo_quick_view_product_compare_text = get_theme_mod( 'hongo_quick_view_product_compare_text', __( 'Add to Compare', 'hongo-addons' ) );

	        if ( $product ) {
	            $defaults = array(
	            	'compare_icon' => $hongo_single_product_compare_icon,
	            	'compare_text' => $hongo_quick_view_product_compare_text,
	                'quantity' => 1,
	                'class'    => implode( ' ', array_filter( array(
	                        'product_type_' . $product->get_type(),
	                        'hongo-compare',
	                ) ) ),                    
	            );

	            $args = apply_filters( 'hongo_addons_quick_view_product_compare_args', wp_parse_args( $args, $defaults ), $product );

	            hongo_addons_get_template( 'quick-view/compare-product.php', $args );
	        }
	    }
	}

	/* To Add compare functionality to single page */
	if ( ! function_exists( 'hongo_addons_template_single_product_compare' ) ) {
	    function hongo_addons_template_single_product_compare( $args = array() ) {
	        if( is_product() ) {
	            global $product;

	            $hongo_single_product_enable_compare = hongo_option( 'hongo_single_product_enable_compare', '1' );
	            if( $hongo_single_product_enable_compare != '1' ) {
	                return false;
	            }
	            $productid =$product->get_id();

	            $siteid = ( is_multisite() ) ? '-'.get_current_blog_id() : '';
	            $cookie_name = 'hongo-compare'.$siteid;
	            $cookie     = ! empty( $_COOKIE[$cookie_name] ) ? $_COOKIE[$cookie_name] : '';
	            $productids = ! empty( $cookie ) ? explode(",", $cookie) : array();
	            
				$hongo_single_product_compare_icon = get_theme_mod( 'hongo_single_product_compare_icon', 'ti-control-shuffle' );
				$hongo_single_product_compare_text = get_theme_mod( 'hongo_single_product_compare_text', __( 'Add to Compare', 'hongo-addons' ) );

	            if ( $product ) {
	                $defaults = array(
		            	'compare_icon' => $hongo_single_product_compare_icon,
		            	'compare_text' => $hongo_single_product_compare_text,
	                    'quantity' => 1,
	                    'class'    => implode( ' ', array_filter( array(
	                            'product_type_' . $product->get_type(),
	                            'hongo-compare',
	                    ) ) ),                    
	                );

	                $args = apply_filters( 'hongo_single_product_compare_args', wp_parse_args( $args, $defaults ), $product );

	                hongo_addons_get_template( 'single-product/compare-product.php', $args );
	            }
	        }

            // To enqueue add to compare script
            wp_enqueue_script( 'hongo-addons-compare' );
	    }
	}

/******* Compare template functions end *******/

/******* Quick View template functions start *******/

	/* To Add quick view functionality to shop page */
    if ( ! function_exists( 'hongo_addons_template_loop_product_quick_view' ) ) {
        function hongo_addons_template_loop_product_quick_view( $args = array() ) {
            global $product;

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();

            $hongo_product_archive_enable_quick_view = hongo_get_product_archive_enable_quick_view();
            if( $hongo_product_archive_enable_quick_view != '1' ) {
                return false;
            }
            
            if ( $product ) {
                $defaults = array(
                    'quantity' => 1,
                    'class'    => implode( ' ', array_filter( array(
                			'button',
                            'hongo-quick-view',
                    ) ) ),
                );

                $args = apply_filters( 'hongo_loop_product_quick_view_args', wp_parse_args( $args, $defaults ), $product );

                hongo_addons_get_template( 'loop/quick-view.php', $args );

                // To enqueue add to Quick View script
            	wp_enqueue_script( 'hongo-addons-quick-view' );
            }
        }
    }

    /* Output the product sale flash. */
    if ( ! function_exists( 'hongo_show_quick_view_product_sale_flash' ) ) {
        function hongo_show_quick_view_product_sale_flash() {            

            hongo_addons_get_template( 'quick-view/sale-flash.php' );
        }
    }

    /* Output the quick view product image */
    if ( ! function_exists( 'hongo_show_quick_view_product_image' ) ) {
        function hongo_show_quick_view_product_image() {

            hongo_addons_get_template( 'quick-view/product-image.php' );
        }
    }

	/* Output the quick view top content wrap. */
	if( ! function_exists( 'hongo_template_quick_view_product_top_content_wrap_start' ) ) {
		function hongo_template_quick_view_product_top_content_wrap_start() {
			echo '<div class="summary-main-title">';
                echo '<div class="summary-main-title-left">';
		}
	}

    /* Output the quick view product title. */
    if ( ! function_exists( 'hongo_template_quick_view_product_title' ) ) {
        function hongo_template_quick_view_product_title() {

            $hongo_quick_view_product_enable_title = get_theme_mod( 'hongo_quick_view_product_enable_title', '1' );
            if( $hongo_quick_view_product_enable_title == 1 ) {

                hongo_addons_get_template( 'quick-view/title.php' );
            }
        }
    }

    /* Output the quick view top content wrap middle. */
	if( ! function_exists( 'hongo_template_quick_view_product_top_content_wrap_middle' ) ) {
		function hongo_template_quick_view_product_top_content_wrap_middle() {
			echo '</div>';
            echo '<div class="summary-main-title-right">';
		}
	}

	/* Output the quick view top content wrap end. */
	if( ! function_exists( 'hongo_template_quick_view_product_top_content_wrap_end' ) ) {
		function hongo_template_quick_view_product_top_content_wrap_end() {
				echo '</div>';
            echo '</div>';
		}
	}

	/* Output the quick view product title. */
    if ( ! function_exists( 'hongo_template_quick_view_product_deal' ) ) {
        function hongo_template_quick_view_product_deal() {

            $hongo_quick_view_product_enable_deal = get_theme_mod( 'hongo_quick_view_product_enable_deal', '1' );

            if( $hongo_quick_view_product_enable_deal == 1 ) {

            	global $product;

	            $pricedate_from = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
	            $pricedate_to = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
	          
	            if( $product->get_type() == 'variable' && $variations = $product->get_available_variations() ) {

	                $pricedate_from = get_post_meta( $variations[0]['variation_id'], '_sale_price_dates_from', true );
	                $pricedate_to = get_post_meta( $variations[0]['variation_id'], '_sale_price_dates_to', true );
	            }	            

	            $current_date = current_time( 'timestamp', true );



	            if ( $pricedate_to < $current_date || $current_date < $pricedate_from ){
	                return;
	            }

                if ( $pricedate_to ) {
	                $defaults = array(
	                    'pricedate_to' => $pricedate_to,
	                    'timezone'     => apply_filters( 'hongo_countdown_timezone', false ) ? wc_timezone_string() : 'GMT'
	                );

	                $args = apply_filters( 'hongo_quick_view_product_deal_args', wp_parse_args( $args, $defaults ), $product );

	                hongo_addons_get_template( 'quick-view/product-deal.php', $args );
	            }
            }
        }
    }

	/* Output the quick view product sku. */
    if ( ! function_exists( 'hongo_template_quick_view_product_sku' ) ) {
        function hongo_template_quick_view_product_sku() {

            $hongo_quick_view_product_enable_sku = get_theme_mod( 'hongo_quick_view_product_enable_sku', '1' );
            if( $hongo_quick_view_product_enable_sku == 1 && post_type_supports( 'product', 'comments' ) ) {

                hongo_addons_get_template( 'quick-view/meta-sku.php' );
            }
        }
    }

    /* Output the quick view product rating. */
    if ( ! function_exists( 'hongo_template_quick_view_product_rating' ) ) {
        function hongo_template_quick_view_product_rating() {

            $hongo_quick_view_product_enable_rating = get_theme_mod( 'hongo_quick_view_product_enable_rating', '1' );
            if( $hongo_quick_view_product_enable_rating == 1 && post_type_supports( 'product', 'comments' ) ) {

                hongo_addons_get_template( 'quick-view/rating.php' );
            }
        }
    }

    /* Output the quick view product price. */
    if ( ! function_exists( 'hongo_template_quick_view_product_price' ) ) {
        function hongo_template_quick_view_product_price() {

            $hongo_quick_view_product_enable_price = get_theme_mod( 'hongo_quick_view_product_enable_price', '1' );
            if( $hongo_quick_view_product_enable_price == 1 ) {

                hongo_addons_get_template( 'quick-view/price.php' );
            }
        }
    }

    /* Output the quick view product price. */
    if ( ! function_exists( 'hongo_template_quick_view_product_excerpt' ) ) {
        function hongo_template_quick_view_product_excerpt() {

            $hongo_quick_view_product_enable_short_description = get_theme_mod( 'hongo_quick_view_product_enable_short_description', '1' );
            if( $hongo_quick_view_product_enable_short_description == 1 ) {

                hongo_addons_get_template( 'quick-view/short-description.php' );
            }
        }
    }

    /* Output the quick view product ajax add to cart. */
    if ( ! function_exists( 'hongo_quick_view_product_add_hidden_product_id' ) ) {
        function hongo_quick_view_product_add_hidden_product_id() {
			
			global $product;

			echo '<input type="hidden" name="add-to-cart" value="' . esc_attr( $product->get_id() ) . '" />';
		}
	}
	
    if ( ! function_exists( 'hongo_template_quick_view_product_ajax_add_to_cart' ) ) {
        function hongo_template_quick_view_product_ajax_add_to_cart() {

            $hongo_quick_view_ajax_add_to_cart = get_theme_mod( 'hongo_quick_view_ajax_add_to_cart', '0' );
            if( $hongo_quick_view_ajax_add_to_cart == 1 ) {

                add_action( 'woocommerce_after_add_to_cart_quantity', 'hongo_quick_view_product_add_hidden_product_id' );
            }
        }
    }

    /* Output the quick view product wishlist */
    if ( ! function_exists( 'hongo_template_quick_view_product_wishlist' ) ) {
        function hongo_template_quick_view_product_wishlist( $args = array() ) {
            global $product;

            $hongo_quick_view_product_enable_wishlist = get_theme_mod( 'hongo_quick_view_product_enable_wishlist', '1' );
            if( $hongo_quick_view_product_enable_wishlist != '1' ) {
                return false;
            }
            
            $class = '';
            $hongo_wishlist_id      = get_option( 'woocommerce_wishlist_page_id' );            
            $wishlist_url = ! empty( $hongo_wishlist_id ) ? get_permalink( $hongo_wishlist_id ) : '';
            $data = hongo_addons_get_product_wishlist();
            $productid = $product->get_id();            

            if( ! empty( $data ) ) {

            	if( ! empty( $wishlist_url ) ) {
            		if( in_array( $productid, $data ) ) {
            			$class = 'hongo-wishlist';
            		} else {
            			$class = 'hongo-wishlist hongo-wishlist-add';
            		}
            	} else {
            		$class = ( in_array($productid, $data) ) ? 'hongo-wishlist hongo-wishlist-remove' : 'hongo-wishlist hongo-wishlist-add';
            	}

            } else{
                $class = 'hongo-wishlist hongo-wishlist-add';
            }

            if ( $product ) {
                $defaults = array(
                    'quantity' => 1,
                    'class'    => implode( ' ', array_filter( array(
                            'product_type_' . $product->get_type(),
                            $class,
                    ) ) ),
                );

                $args = apply_filters( 'hongo_quick_view_product_wishlist_args', wp_parse_args( $args, $defaults ), $product );

                hongo_addons_get_template( 'quick-view/wishlist.php', $args );
            }
        }
    }

    /* Output the quick view product meta. */
    if ( ! function_exists( 'hongo_template_quick_view_product_meta' ) ) {
        function hongo_template_quick_view_product_meta() {

            hongo_addons_get_template( 'quick-view/meta.php' );
        }
    }

	/* To Quick view product details template */
	if ( ! function_exists( 'hongo_quick_view_product_details' ) ) {
	    function hongo_quick_view_product_details( $productid ) {

	        if ( empty( $productid ) ) {
	            return '';
	        }

	        $product_data = wc_get_product( $productid );

	        $args = array(
	            'posts_per_page'      => 1,
	            'post_type'           => 'product',
	            'post_status'         => 'publish',
	            'no_found_rows'       => 1,
	        );	        

	        if ( ! empty( $product_data->get_id() ) ) {
	            $args['p'] = absint( $product_data->get_id() );
	        }

	        $single_product = new WP_Query( $args );

	        // For "is_single" to always make load comments_template() for reviews.
	        $single_product->is_single = true;

	        ob_start();

	        global $wp_query;

	        // Backup query object so following loops think this is a product page.
	        $previous_wp_query = $wp_query;
	        // @codingStandardsIgnoreStart
	        $wp_query          = $single_product;
	        // @codingStandardsIgnoreEnd

	        while ( $single_product->have_posts() ) {
	            $single_product->the_post();

	            hongo_addons_get_template( 'quick-view/product-details.php' );
	        }

	        // Restore $previous_wp_query and reset post data.
	        // @codingStandardsIgnoreStart
	        $wp_query = $previous_wp_query;
	        // @codingStandardsIgnoreEnd
	        wp_reset_postdata();

	        echo '<div class="woocommerce">' . ob_get_clean() . '</div>';

	        // To enqueue add to compare script
            wp_enqueue_script( 'hongo-addons-quick-view' );
	    }
	}

/******* Quick View template functions end *******/

/******* Wishlist template functions end *******/

	/* To Add wishlist functionality to shop page */
    if ( ! function_exists( 'hongo_addons_template_loop_product_wishlist' ) ) {
        function hongo_addons_template_loop_product_wishlist( $args = array() ) {
            global $product;

            // To get Product archive list style
            $product_archive_list_style = hongo_get_product_archive_list_style();

            $hongo_product_archive_enable_wishlist = hongo_get_product_archive_enable_wishlist();
            if( $hongo_product_archive_enable_wishlist != '1' ) {
                return false;
            }
            
            $class = '';
            $hongo_wishlist_id      = get_option( 'woocommerce_wishlist_page_id' );            
            $wishlist_url = ! empty( $hongo_wishlist_id ) ? get_permalink( $hongo_wishlist_id ) : '';
            $data = hongo_addons_get_product_wishlist();
            $productid = $product->get_id();
            
            if( ! empty( $data ) ) {

            	if( ! empty( $wishlist_url ) ) {
            		if( in_array( $productid, $data ) ) {
            			$class = 'hongo-wishlist';
            		} else {
            			$class = 'hongo-wishlist hongo-wishlist-add';
            		}
            	} else {
            		$class = ( in_array($productid, $data) ) ? 'hongo-wishlist hongo-wishlist-remove' : 'hongo-wishlist hongo-wishlist-add';
            	}

            } else{
                $class = 'hongo-wishlist hongo-wishlist-add';
            }

            if ( $product ) {
                $defaults = array(
                    'quantity' => 1,
                    'class'    => implode( ' ', array_filter( array(
                			'button',
                            'product_type_' . $product->get_type(),
                            $class,
                    ) ) ),
                );

                $args = apply_filters( 'hongo_loop_product_wishlist_args', wp_parse_args( $args, $defaults ), $product );

                hongo_addons_get_template( 'loop/wishlist.php', $args );
            }

            // To enqueue add to compare script
            wp_enqueue_script( 'hongo-addons-wishlist' );
        }
    }

    /* To Add wishlist functionality to single page */
    if ( ! function_exists( 'hongo_addons_template_single_product_wishlist' ) ) {
        function hongo_addons_template_single_product_wishlist( $args = array() ) {
            if( is_product() ) {
                global $product;

                $hongo_single_product_enable_wishlist = hongo_option( 'hongo_single_product_enable_wishlist', '1' );
                if( $hongo_single_product_enable_wishlist != '1' ) {
                    return false;
                }

                $class = '';
                $hongo_wishlist_id      = get_option( 'woocommerce_wishlist_page_id' );            
                $wishlist_url = ! empty( $hongo_wishlist_id ) ? get_permalink( $hongo_wishlist_id ) : '';
                $data = hongo_addons_get_product_wishlist();
                $productid = $product->get_id();
                
                if( ! empty( $data ) ) {

                    if( ! empty( $wishlist_url ) ) {
	            		if( in_array( $productid, $data ) ) {
	            			$class = 'hongo-wishlist';
	            		} else {
	            			$class = 'hongo-wishlist hongo-wishlist-add';
	            		}
	            	} else {
	            		$class = ( in_array($productid, $data) ) ? 'hongo-wishlist hongo-wishlist-remove' : 'hongo-wishlist hongo-wishlist-add';
	            	}
                } else{
                    $class = 'hongo-wishlist hongo-wishlist-add';
                }
                
                if ( $product ) {
                    $defaults = array(
                        'quantity' => 1,
                        'class'    => implode( ' ', array_filter( array(
                                'product_type_' . $product->get_type(),
                                $class,
                        ) ) ),
                    );

                    $args = apply_filters( 'hongo_single_product_wishlist_args', wp_parse_args( $args, $defaults ), $product );

                    hongo_addons_get_template( 'single-product/wishlist.php', $args );
                }

	            // To enqueue add to wishlist script
	            wp_enqueue_script( 'hongo-addons-wishlist' );
            }
        }
    }

    /* Wishlist Page Product Add To Cart*/
    if( ! function_exists( 'hongo_wishlist_page_add_to_cart' ) ) {
        function hongo_wishlist_page_add_to_cart( $product, $class_details = '' ) {
            
            if ( $product ) {                
                $defaults = array(
                    'quantity'   => 1,
                    'class'      => implode( ' ', array_filter( array(
                        'button',
                        'product_type_' . $product->get_type(),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button '.$class_details : '',
                        $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                    ) ) ),
                    'attributes' => array(
                        'data-product_id'  => $product->get_id(),
                        'data-product_sku' => $product->get_sku(),
                        'aria-label'       => $product->add_to_cart_description(),
                        'rel'              => 'nofollow',
                    ),
                );

                $args = apply_filters( 'hongo_wishlist_page_add_to_cart_args', $defaults, $product );
                
                if ( isset( $args['attributes']['aria-label'] ) ) {
                    $args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
                }

                hongo_addons_get_template( 'loop/add-to-cart.php', $args );
            }
        }
    } 

	/* List of Wishlist data */
	if ( ! function_exists( 'hongo_addons_wishlist_data' ) ) {
	    function hongo_addons_wishlist_data( $data ) { 
	        
	        $defaults = array( 'data' => $data );
	        hongo_addons_get_template( 'wishlist/product-wishlist.php', $defaults );

            // To enqueue add to wishlist script
            wp_enqueue_script( 'hongo-addons-wishlist' );
	    }
	}

    /* Start Wrap for single product buttons */
    if( ! function_exists ( 'hongo_addons_single_product_buttons_wrap_start' ) )    {
        function hongo_addons_single_product_buttons_wrap_start(){
            if( is_product() ) {
                echo '<div class="hongo-single-product-buttons">';
            }
        }
    }

    /* End Wrap for single product buttons */
    if( ! function_exists ( 'hongo_addons_single_product_buttons_wrap_end' ) ) {
        function hongo_addons_single_product_buttons_wrap_end(){
            if( is_product() ) {
                echo '</div>';
            }
        }
    }

    /* Start Wrap for add to cart button */
    if( ! function_exists ( 'hongo_addons_single_product_add_to_cart_wrap_start' ) ) {
		function hongo_addons_single_product_add_to_cart_wrap_start() {

		    echo '<div class="hongo-add-to-cart-button-wrap">';
		}
	}

    /* End Wrap for add to cart button */
    if( ! function_exists ( 'hongo_addons_single_product_add_to_cart_wrap_end' ) ) {
		function hongo_addons_single_product_add_to_cart_wrap_end() {

		    echo '</div>';
		}
	}

/******* Wishlist template functions end *******/

/******* Video template functions Start *******/

// To Add video functionality to single page
if ( ! function_exists( 'hongo_addons_template_single_product_video' ) ) {
    function hongo_addons_template_single_product_video( $args = array() ) {
        global $product;

        $product_id     = $product->get_id();
        $video_type     = hongo_option( 'hongo_product_featured_video_type', '' );
        $vimeo_video    = hongo_option( 'hongo_product_featured_vimeo_video', '' );
        $youtube_video  = hongo_option( 'hongo_product_featured_youtube_video', '' );
        $mp4_video      = hongo_option( 'hongo_product_featured_mp4_video', '' );
        $ogg_video      = hongo_option( 'hongo_product_featured_ogg_video', '' );
        $webm_video     = hongo_option( 'hongo_product_featured_webm_video', '' );

        $class = '';

        if ( $product ) {
            $defaults = array(
                'video_type'    => $video_type,
                'vimeo_video'   => $vimeo_video,
                'youtube_video' => $youtube_video,
                'mp4_video'     => $mp4_video,
                'ogg_video'     => $ogg_video,
                'webm_video'    => $webm_video,
                'class'         => implode( ' ', array_filter( array(
                        'product_type_' . $product->get_type(),
                        $class,
                ) ) ),
            );

            $args = apply_filters( 'hongo_single_product_video_args', wp_parse_args( $args, $defaults ), $product );

            hongo_addons_get_template( 'video/video.php', $args );
        }
    }
}

/******* Video template functions End *******/

/******* 360 Degree template functions Start *******/

	// To Add 360 Functionality to single Page
    if( ! function_exists( 'hongo_addons_template_single_product_360_degree' ) ) {
        function hongo_addons_template_single_product_360_degree( $args = array() ) {
            global $product;

            $id = $product->get_id();

            // 360 Product Images
            $gallery_ids = get_post_meta( $id, '_hongo_product_360_images',true );
            
            if ( ! empty( $gallery_ids ) && hongo_load_javascript_by_key( 'threesixty' ) ) {
                $gallery_ids = explode(',',$gallery_ids);
                $gallery_urls = array();
                foreach( $gallery_ids as $gallery_id ){
                    $gallery_details = wp_get_attachment_image_src( $gallery_id ,'full' );
                    $gallery_urls[] = wp_get_attachment_image_url( $gallery_id, 'full' );
                }
                $data_images = implode(',',$gallery_urls);
                $width = $gallery_details[1];
                $height = $gallery_details[2];

                if ( $product ) {
                    $defaults = array(
                        'data_images'    => $data_images,
                        'data_width'     => $width,
                        'data_height'    => $height,
                    );

                    $args = apply_filters( 'hongo_single_product_360_args', wp_parse_args( $args, $defaults ), $product );

                    hongo_addons_get_template( '360-degree/360-module.php', $args );
                }
            }

        }
    }

/******* 360 Degree template functions End *******/

/******* Sticky add to cart template functions Start *******/

	// To Display sticky add to cart
    if ( ! function_exists( 'hongo_addons_single_product_sticky_add_to_cart' ) ) {
        function hongo_addons_single_product_sticky_add_to_cart( $args = array() ) {
            global $post,$product;

            $type = $product->get_type();
			$title = $product->get_title();
			$price_html = $product->get_price_html();
			$add_to_cart_text = $product->add_to_cart_text();

            // To get single product enbale sticky add to cart
            $enable_sticky_add_to_cart = hongo_get_single_product_enable_sticky_add_to_cart();

            if ( $product && $enable_sticky_add_to_cart ) {    

            	$defaults = array(
            			'id'		 		=> $post->ID,
                        'type'       		=> $type,
                        'title'      		=> $title,
                        'price_html' 		=> $price_html,
                        'add_to_cart_text' 	=> $add_to_cart_text,
                );

                $args = apply_filters( 'hongo_addons_single_product_sticky_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

            	hongo_addons_get_template( 'sticky-add-to-cart/sticky-add-to-cart.php', $args );
            }
        }
    }

/******* Sticky add to cart template functions End *******/

/******* Smart Product template functions Start *******/

	// To Display smart product
	if( ! function_exists( 'hongo_addons_smart_products' ) ) {
		function hongo_addons_smart_products( $args = array() ) {

			$smart_product_enable = get_theme_mod( 'hongo_enable_smart_product','' );
			$smart_product_enable = apply_filters( 'hongo_enable_smart_product', $smart_product_enable );
			$productId = get_theme_mod( 'hongo_single_smart_product','' );

			if( is_product() && $smart_product_enable == '1' && ! empty( $productId ) ) {
				$product = wc_get_product( $productId );

				if( ! empty( $product ) ) {
				
					$type 				= $product->get_type();
					$title 				= $product->get_title();
					$title_url 			= get_permalink( $productId );
					$price_html 		= $product->get_price_html();
					$rating_count 		= $product->get_rating_count();
					$average 			= $product->get_average_rating();
					$rating_html        = wc_get_rating_html( $average, $rating_count );
					if( $product->get_status() == 'publish' && $product ) {

						$defaults = array(
							'id'		 		=> $productId,
	                        'type'       		=> $type,
	                        'title'      		=> $title,
	                        'title_url'	 		=> $title_url,
	                        'price_html' 	 	=> $price_html,
	                        'rating_html'		=> $rating_html,
						);

						$args = apply_filters( 'hongo_addons_smart_product_args', wp_parse_args( $args, $defaults ), $product );					
						
						hongo_addons_get_template( 'smart-product/smart-product.php', $args );

					}

					// To enqueue add to smart Product script
		            wp_enqueue_script( 'hongo-addons-smart-product' );
		        }
			}
		}
	}


/******* Smart Product template functions End *******/

/******* Breadcrumb Navigation template functions Start *******/

/* To Add Breacump and navigation  */
    if ( ! function_exists( 'hongo_addons_single_product_breadcrumb' ) ) {
        function hongo_addons_single_product_breadcrumb( ) {
            global $product;

            if ( $product ) {    

                hongo_addons_get_template( 'breadcrumb-navigation/breadcrumb-navigation.php' );
            }
        }
    }

/******* Breadcrumb Navigation template functions End *******/

/******* Meta Share template functions Start *******/

	/* To Display single product share */
    if ( ! function_exists( 'hongo_addons_single_product_meta_share' ) ) {
        function hongo_addons_single_product_meta_share( ) {
            global $product;

            if ( $product ) {    

                hongo_addons_get_template( 'meta/meta-share.php' );
            }
        }
    }

/******* Meta Share template functions End *******/