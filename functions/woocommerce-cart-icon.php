<?php 

// woocommerce custom icons


/*
 * Shortcode for WooCommerce Cart Icon for Menu Item
 */
add_shortcode ('woocommerce_cart_icon', 'woo_cart_icon' );
function woo_cart_icon() {
    ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set variable for Cart URL
  
        echo '<li><a class="menu-item cart-contents" href="'.$cart_url.'" title="Cart">';
        
        if ( $cart_count > 0 ) {
        
            echo '<span class="cart-contents-count">'.$cart_count.'</span>';
       
        }
        
        echo '</a></li>';
        
            
    return ob_get_clean();
 
}


/*
 * Filter with AJAX When Cart Contents Update
 */

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_icon_count' );
function woo_cart_icon_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    
    echo '<a class="cart-contents menu-item" href="'.$cart_url.'" title="View Cart">';
    
    if ( $cart_count > 0 ) {
        
        echo '<span class="cart-contents-count">'.$cart_count.'</span>';
                    
    }
    echo '</a>';
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}


/*
 * Append Cart Icon Particular Menu
 */
add_filter('wp_nav_menu_items','woo_cart_icon_menu', 10, 2);
function woo_cart_icon_menu($menu, $args) {

    if($args->theme_location == 'primary') { // 'primary' is my menu ID
        $cart = do_shortcode("[woo_cart_but]");
        return $cart . $menu;
    }

    return $menu;
}

?>