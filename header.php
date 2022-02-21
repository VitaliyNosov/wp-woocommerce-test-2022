<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test-woocommerce
 */

?>

<!doctype html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<div class="header-top-block">
	<span>FREE U.S. SHIPPING 90-DAY RETURNS</span>
	<div class="toglle-button">
			<span>HE</span>
				<div class="toggle">
  					<input type="checkbox" id="toggle2" />
  					<label for="toggle2"></label>
				</div>
			<span>EN</span>
	</div>
</div>

	<div class="container">
	<header>
		<div class="logo-block">
			<span>COMPANY NAME</span>
		</div>
		<div class="category-block">
			<span>WOMEN</span>
			<span>|</span>
			<span>MEN</span>
		</div>
		<div class="sherch-block">
			<?php get_search_form(); ?>
		</div>
		<div class="button-block">
			<div class="button-icon icon-user">
				<a href="/my-account/" target="_black">
					<div class="user-block">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/user.png" alt="#">
					</div>
				</a>
			</div>
			<div class="button-icon icon-heart">
				<div class="vah-vah">
					<?php echo do_shortcode( '[yith_wcwl_items_count]' ); ?>
				</div>			
			</div>	
			<div class="button-icon icon-cart">
				<?php echo do_shortcode( '[woocommerce_cart_icon]' );?>		
			</div>	
		</div>

		</br>

	</header>

		<div class="tag-block">
			<div class="tag sale">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/1.png" alt="#">
			</div>
			<div class="tag new">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/7.png" alt="#">
			</div>
			<div class="tag bras">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/4.png" alt="#">
			</div>
			<div class="tag swimsuits">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/2.png" alt="#">
			</div>
			<div class="tag sleepwear">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/8.png" alt="#">	
			</div>
			<div class="tag underwear">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/5.png" alt="#">		
			</div>
			<div class="tag sexy-lingerine">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/3.png" alt="#">
			</div>
			<div class="tag womens-branding">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/6.png" alt="#">
			</div>		
		</div>
	</div>

	

	


	


	