<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Change layout style using passing parameter like ?container=full
if ( ! function_exists( 'hongo_override_page_container_style' ) ) {
    function hongo_override_page_container_style( $container ) {
        
        $compare_params = array( 'fix', 'full', 'box' );

        if( ! empty( $_GET['container'] ) && in_array( $_GET['container'], $compare_params ) ) {
            if( $_GET['container'] == 'fix' ) {
            
                $container = 'container';

            } elseif( $_GET['container'] == 'full' ) {

                $container = 'container-fluid';

            } elseif( $_GET['container'] == 'box' ) {

                $container = 'container-fluid-with-padding';
            }
        }

        return $container;
    }
}
add_filter( 'hongo_page_container_style', 'hongo_override_page_container_style', 100 );

// Change sidebar style using passing parameter like ?sidebar=right_sidebar
if ( ! function_exists( 'hongo_override_page_layout_style' ) ) {
    function hongo_override_page_layout_style( $layout_style ) {
        
        $compare_params = array( 'no_sidebar', 'left_sidebar', 'right_sidebar', 'both_sidebar' );

        if( ! empty( $_GET['sidebar'] ) && in_array( $_GET['sidebar'], $compare_params ) ) {
            $layout_style = 'hongo_layout_' . $_GET['sidebar'];
        }

        return $layout_style;
    }
}
add_filter( 'hongo_page_layout_style', 'hongo_override_page_layout_style', 100 );

// Change product archive column using passing parameter like ?column=4
if ( ! function_exists( 'hongo_override_product_column' ) ) {
    function hongo_override_product_column( $column ) {
        
        $compare_params = array( '2', '3', '4', '5', '6' );

        if( ! empty( $_GET['column'] ) && in_array( $_GET['column'], $compare_params ) ) {
            $column = $_GET['column'];
        }

        return $column;
    }
}
add_filter( 'hongo_product_lists_column', 'hongo_override_product_column', 100 );

// Change archive style using passing parameter like ?style=classic
if ( ! function_exists( 'hongo_override_product_archive_style' ) ) {
    function hongo_override_product_archive_style( $shop_style ) {
        
        $compare_params = array( 'default', 'minimalist', 'classic', 'clean', 'flat', 'list', 'masonry', 'metro', 'modern', 'standard', 'simple', 'boxed' );

        if( ! empty( $_GET['style'] ) && in_array( $_GET['style'], $compare_params ) ) {

            $shop_style = 'shop-' . $_GET['style'];
        }
        return $shop_style;
    }
}
add_filter( 'hongo_product_archive_style', 'hongo_override_product_archive_style', 100 );

// Change archive style using passing parameter like ?style=classic
if ( ! function_exists( 'hongo_override_product_archive_page_double_grid_position' ) ) {
    function hongo_override_product_archive_page_double_grid_position( $double_grid_position ) {
        
        $compare_params = array( 'metro', 'modern' );

        if( ! empty( $_GET['style'] ) && in_array( $_GET['style'], $compare_params ) ) {

            $double_grid_position = '*,*,2-2,2-1,2-2,1-2';
        }

        return $double_grid_position;
    }
}
add_filter( 'hongo_product_archive_page_double_grid_position', 'hongo_override_product_archive_page_double_grid_position', 100 );

// Change single product style using passing parameter like ?layout=default
if ( ! function_exists( 'hongo_override_product_single_style' ) ) {
    function hongo_override_product_single_style( $shop_style ) {
        
        $compare_params = array( 'default', 'right-content', 'carousel', 'left-content', 'classic', 'sticky', 'modern', 'extended-descriptions' );

        if( ! empty( $_GET['layout'] ) && in_array( $_GET['layout'], $compare_params ) ) {
            $shop_style = 'single-product-' . $_GET['layout'];
        }

        return $shop_style;
    }
}
add_filter( 'hongo_product_single_style', 'hongo_override_product_single_style', 100 );

// Enable top filter using passing parameter like ?filter=1
if ( ! function_exists( 'hongo_override_enable_shop_top_filter' ) ) {
    function hongo_override_enable_shop_top_filter( $filter ) {

        if( isset( $_GET['filter'] ) ) {
            
            if( $_GET['filter'] == '1' ) {
              
                $filter = '1';

            } elseif( $_GET['filter'] == '0' ) {

                $filter = '0';
            }
        }
        return $filter;
    }
}
add_filter( 'hongo_enable_shop_top_filter', 'hongo_override_enable_shop_top_filter', 100 );

// Enable off canvas using passing parameter like ?off_canvas=1
if ( ! function_exists( 'hongo_override_enable_shop_off_canvas_filter' ) ) {
    function hongo_override_enable_shop_off_canvas_filter( $off_canvas ) {

        if( isset( $_GET['off_canvas'] ) ) {
            
            if( $_GET['off_canvas'] == '1' ) {
              
                $off_canvas = '1';

            } elseif( $_GET['off_canvas'] == '0' ) {

                $off_canvas = '0';
            }
        }
        return $off_canvas;
    }
}
add_filter( 'hongo_enable_shop_off_canvas_filter', 'hongo_override_enable_shop_off_canvas_filter', 100 );

// Enable sale box using passing parameter like ?gallery_slider=1
if ( ! function_exists( 'hongo_override_enable_gallery_slider' ) ) {
    function hongo_override_enable_gallery_slider( $gallery_slider ) {

        if( isset( $_GET['gallery_slider'] ) ) {
            
            if( $_GET['gallery_slider'] == '1' ) {
              
                $gallery_slider = '1';

            } elseif( $_GET['gallery_slider'] == '0' ) {

                $gallery_slider = '0';
            }
        }
        return $gallery_slider;
    }
}
add_filter( 'hongo_product_archive_enable_gallery_slider', 'hongo_override_enable_gallery_slider', 100 );

// Enable sale box using passing parameter like ?gallery_slide=3
if ( ! function_exists( 'hongo_override_gallery_slide' ) ) {
    function hongo_override_gallery_slide( $gallery_slide ) {

        if( ! empty( $_GET['gallery_slide'] ) ) {
            
            $gallery_slide = $_GET['gallery_slide'];
        }

        return $gallery_slide;
    }
}
add_filter( 'hongo_product_archive_gallery_slide', 'hongo_override_gallery_slide', 100 );

// Enable sale box using passing parameter like ?deal=1
if ( ! function_exists( 'hongo_override_enable_deal' ) ) {
    function hongo_override_enable_deal( $deal ) {

        if( isset( $_GET['deal'] ) ) {
            
            if( $_GET['deal'] == '1' ) {
              
                $deal = '1';

            } elseif( $_GET['deal'] == '0' ) {

                $deal = '0';
            }
        }
        return $deal;
    }
}
add_filter( 'hongo_product_archive_enable_deal', 'hongo_override_enable_deal', 100 );

// Enable sale box using passing parameter like ?sale=1
if ( ! function_exists( 'hongo_override_enable_sale_box' ) ) {
    function hongo_override_enable_sale_box( $sale ) {

        if( isset( $_GET['sale'] ) ) {
            
            if( $_GET['sale'] == '1' ) {
              
                $sale = '1';

            } elseif( $_GET['sale'] == '0' ) {

                $sale = '0';
            }
        }
        return $sale;
    }
}
add_filter( 'hongo_product_archive_enable_sale_box', 'hongo_override_enable_sale_box', 100 );

// Enable new box using passing parameter like ?new=1
if ( ! function_exists( 'hongo_override_enable_new_box' ) ) {
    function hongo_override_enable_new_box( $new ) {

        if( isset( $_GET['new'] ) ) {
            
            if( $_GET['new'] == '1' ) {
              
                $new = '1';

            } elseif( $_GET['new'] == '0' ) {

                $new = '0';
            }
        }
        return $new;
    }
}
add_filter( 'hongo_product_archive_enable_new_box', 'hongo_override_enable_new_box', 100 );

// Enable star rating using passing parameter like ?rating=1
if ( ! function_exists( 'hongo_override_enable_star_rating' ) ) {
    function hongo_override_enable_star_rating( $rating ) {

        if( isset( $_GET['rating'] ) ) {
            
            if( $_GET['rating'] == '1' ) {
              
                $rating = '1';

            } elseif( $_GET['rating'] == '0' ) {

                $rating = '0';
            }
        }
        return $rating;
    }
}
add_filter( 'hongo_product_archive_enable_star_rating', 'hongo_override_enable_star_rating', 100 );

// Enable sticky add to cart using passing parameter like ?sticky_add_to_cart=1
if ( ! function_exists( 'hongo_override_single_product_enable_sticky_add_to_cart' ) ) {
    function hongo_override_single_product_enable_sticky_add_to_cart( $sticky_add_to_cart ) {

        if( isset( $_GET['sticky_add_to_cart'] ) ) {
            
            if( $_GET['sticky_add_to_cart'] == '1' ) {
              
                $sticky_add_to_cart = '1';

            } elseif( $_GET['sticky_add_to_cart'] == '0' ) {

                $sticky_add_to_cart = '0';
            }
        }
        return $sticky_add_to_cart;            
    }
}
add_filter( 'hongo_single_product_enable_sticky_add_to_cart', 'hongo_override_single_product_enable_sticky_add_to_cart', 100 );

// add arguments in filter current page URL
if ( ! function_exists( 'hongo_override_filter_current_page_url' ) ) {
    function hongo_override_filter_current_page_url( $link ) {
        
        // Container parameter
        if ( isset( $_GET['container'] ) ) {
            $link = add_query_arg( 'container', wc_clean( wp_unslash( $_GET['container'] ) ), $link );
        }

        // Layout parameter
        if ( isset( $_GET['sidebar'] ) ) {
            $link = add_query_arg( 'sidebar', wc_clean( wp_unslash( $_GET['sidebar'] ) ), $link );
        }

        // Column parameter
        if ( isset( $_GET['column'] ) ) {
            $link = add_query_arg( 'column', wc_clean( wp_unslash( $_GET['column'] ) ), $link );
        }

        // Shop style parameter
        if ( isset( $_GET['style'] ) ) {
            $link = add_query_arg( 'style', wc_clean( wp_unslash( $_GET['style'] ) ), $link );
        }

        // Product single page layout style parameter
        if ( isset( $_GET['layout'] ) ) {
            $link = add_query_arg( 'layout', wc_clean( wp_unslash( $_GET['layout'] ) ), $link );
        }

        // Top filter parameter
        if ( isset( $_GET['filter'] ) ) {
            $link = add_query_arg( 'filter', wc_clean( wp_unslash( $_GET['filter'] ) ), $link );
        }

        // off canvas filter parameter
        if ( isset( $_GET['off_canvas'] ) ) {
            $link = add_query_arg( 'off_canvas', wc_clean( wp_unslash( $_GET['off_canvas'] ) ), $link );
        }

        // Top sale parameter
        if ( isset( $_GET['sale'] ) ) {
            $link = add_query_arg( 'sale', wc_clean( wp_unslash( $_GET['sale'] ) ), $link );
        }

        // Top new parameter
        if ( isset( $_GET['new'] ) ) {
            $link = add_query_arg( 'new', wc_clean( wp_unslash( $_GET['new'] ) ), $link );
        }

        // Top rating parameter
        if ( isset( $_GET['rating'] ) ) {
            $link = add_query_arg( 'rating', wc_clean( wp_unslash( $_GET['rating'] ) ), $link );
        }

        // Sticky add to cart parameter
        if ( isset( $_GET['sticky_add_to_cart'] ) ) {
            $link = add_query_arg( 'sticky_add_to_cart', wc_clean( wp_unslash( $_GET['sticky_add_to_cart'] ) ), $link );
        }

        // Gutter parameter
        if ( isset( $_GET['gutter'] ) ) {
            $link = add_query_arg( 'gutter', wc_clean( wp_unslash( $_GET['gutter'] ) ), $link );
        }

        // Loop Slider
        if ( isset( $_GET['gallery_slider'] ) ) {
            $link = add_query_arg( 'gallery_slider', wc_clean( wp_unslash( $_GET['gallery_slider'] ) ), $link );
        }

        // Loop Slide
        if ( isset( $_GET['gallery_slide'] ) ) {
            $link = add_query_arg( 'gallery_slide', wc_clean( wp_unslash( $_GET['gallery_slide'] ) ), $link );
        }

        // Product Deal
        if ( isset( $_GET['deal'] ) ) {
            $link = add_query_arg( 'deal', wc_clean( wp_unslash( $_GET['deal'] ) ), $link );
        }

        return $link;
    }
}
add_filter( 'woocommerce_rating_filter_link', 'hongo_override_filter_current_page_url' );
add_filter( 'hongo_filter_current_page_url', 'hongo_override_filter_current_page_url' );
add_filter( 'hongo_product_taxonomy_filter_link', 'hongo_override_filter_current_page_url' );

// Gutter using passing parameter like ?gutter=small
if ( ! function_exists( 'hongo_override_product_archive_gutter' ) ) {
    function hongo_override_product_archive_gutter( $gutter ) {

        $gutter_params = array( 'none', 'very-small', 'small', 'medium', 'large', 'extra-large'  );

        if( ! empty( $_GET['gutter'] ) && in_array( $_GET['gutter'], $gutter_params ) ) {
            $gutter = 'gutter-' . $_GET['gutter'];
        }

        return $gutter;
    }
}
add_filter( 'hongo_product_archive_gutter', 'hongo_override_product_archive_gutter', 100 );

// Number of filter parameter like ?per_page=12
if( ! function_exists( 'hongo_override_product_archive_per_page' ) ) {
    function hongo_override_product_archive_per_page( $per_page ) {

        if( ! empty( $_GET['per_page'] ) ) {
          
            $per_page = $_GET['per_page'];
        }

        return $per_page;
    }
}
add_filter( 'hongo_product_archive_page_per_page', 'hongo_override_product_archive_per_page', 100 );
