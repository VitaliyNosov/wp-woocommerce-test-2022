<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $rebell_theme_options, $animateCounter;

//woocommerce_shop_loop_item_title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 ); 

//woocommerce_before_shop_loop_item
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

//woocommerce_after_shop_loop_item_title
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item_title_loop_price', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title_loop_rating', 'woocommerce_template_loop_rating', 5 );

//woocommerce_before_shop_loop_item_title
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$sk_product_class = "column";
if ( $animateCounter ) $sk_product_class .= ' delay-' . $animateCounter;
if ( (isset($rebell_theme_options['catalog_mode'])) && ($rebell_theme_options['catalog_mode'] == 1) ) $sk_product_class .= ' display_buttons';
if ( !$rebell_theme_options['add_to_cart_display']) $sk_product_class .= ' display_buttons';
?>


<li <?php wc_product_class( $sk_product_class, $product ); ?> >
   
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>	

		<?php
			$attachment_ids = $product->get_gallery_image_ids();
			if ( $attachment_ids ) {
				$loop = 0;
				foreach ( $attachment_ids as $attachment_id ) {
					$image_link = wp_get_attachment_url( $attachment_id );
					if (!$image_link) continue;
					$loop++;
					$product_thumbnail_second = wp_get_attachment_image_src($attachment_id, 'shop_catalog');
					if ($loop == 1) break;
				}
			}
		?>
		
		<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
		
		<?php

		$style = '';
		$class = '';        
		if (isset($product_thumbnail_second[0])) {            
			$style = 'background-image:url(' . $product_thumbnail_second[0] . ')';
			$class = 'with_second_image';     
		}
		
		if ( (isset($rebell_theme_options['second_image_product_listing'])) && ($rebell_theme_options['second_image_product_listing'] == "0" ) ) {
			$style = '';
			$class = '';
		}
		
		?>
		
		<div class="product_thumbnail_wrapper <?php if ( !$product->is_in_stock() ) : ?>outofstock<?php endif; ?>">
			
			<div class="product_thumbnail <?php echo esc_attr( $class ); ?>">
				<a href="<?php the_permalink(); ?>">
					<span class="product_thumbnail_background" style="<?php echo esc_attr( $style ); ?>"></span>
					<?php
						if ( has_post_thumbnail( $product->get_id() ) ) { 	
							echo get_the_post_thumbnail( $product->get_id(), 'shop_catalog');
						} else {
							echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $product->get_id() );
						}
					?>
				</a>
			</div><!--.product_thumbnail-->
			
			<?php if ( (isset($rebell_theme_options['catalog_mode'])) && ($rebell_theme_options['catalog_mode'] == 0) ) : ?>
				<?php wc_get_template( 'loop/sale-flash.php' ); ?>
            <?php endif; ?>
			
			<?php if ( (isset($rebell_theme_options['catalog_mode'])) && ($rebell_theme_options['catalog_mode'] == 0) ) : ?>
				<?php if ( !$product->is_in_stock() && !empty($rebell_theme_options['out_of_stock_label']) ) : ?>            
                    <div class="out_of_stock_badge_loop"><?php esc_html_e( $rebell_theme_options['out_of_stock_label'], 'woocommerce' ); ?></div>            
                <?php endif; ?>
            <?php endif; ?>
			
			<?php if (class_exists('YITH_WCWL')) : ?>
			<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
            <?php endif; ?>

            <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
			
		</div><!--.product_thumbnail_wrapper-->
				
		<div class="h3_content_link"><a class="product-title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
		
        <?php if ( (isset($rebell_theme_options['ratings_catalog_page'])) && ($rebell_theme_options['ratings_catalog_page'] == "1" ) ) : ?>
        <div class="archive-product-rating">
			<?php do_action( 'woocommerce_after_shop_loop_item_title_loop_rating' ); ?>
		</div>
        <?php endif; ?>       
	
		<div class="product_after_shop_loop <?php echo ( GETBOWTIED_GERMAN_MARKET_IS_ACTIVE )  ? 'german-market-active' : ''; ?> <?php echo ( GETBOWTIED_WOOCOMMERCE_GERMANIZED_IS_ACTIVE )  ? 'germanized-active' : ''; ?>">
			
			<div class="product_after_shop_loop_switcher">
				
				<?php if( !GETBOWTIED_GERMAN_MARKET_IS_ACTIVE ) { ?>
					<div class='product_after_shop_loop_price'>
						<?php do_action( 'woocommerce_after_shop_loop_item_title_loop_price' ); ?>
					</div>
				<?php } ?>

				<?php if( GETBOWTIED_GERMAN_MARKET_IS_ACTIVE ) : ?>

					<div class="german-market-active">

						<?php add_action( 'woocommerce_german_market_info', array( 'WGM_Template', 'woocommerce_de_price_with_tax_hint_single' ), 7 ); ?>
						<?php add_filter( 'woocommerce_german_market_info', '__return_true' ); ?>

						<div class='product_german_market_info'>
						<?php do_action( 'woocommerce_german_market_info' ); ?>
						</div>

					</div>
					
				<?php endif ;?>

				<?php if ( (isset($rebell_theme_options['catalog_mode'])) && ($rebell_theme_options['catalog_mode'] == 0) ) : ?>
				
				<div class="product_after_shop_loop_buttons">

					<?php if( GETBOWTIED_WOOCOMMERCE_GERMANIZED_IS_ACTIVE ) : ?>
						<div class="germanized-active">
					    	<?php do_action( 'woocommerce_germanized_unit_price' ); ?>
				    	</div>
					<?php endif; ?>

					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
				</div>

				<?php endif; ?>
				
			</div>
			
		</div>
	
</li>