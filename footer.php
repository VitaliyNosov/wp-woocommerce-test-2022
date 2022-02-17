<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test-woocommerce
 */

?>

	<footer>
		<div class="container">
			<div class="footer-block">
				<div class="satic-info-block">
					<span>
						Company name stands for stylish, sexy and high-quality shapewear and lingerie.
						Women in the United States, Canada and all around the world know they can trust 
						our unmatched designs and superior customer service.
					</span>
				<div class="cocial-block">
					<div class="icon">
						<i class="fab fa-instagram"></i>
					</div>
					<div class="icon">
						<i class="fab fa-twitter"></i>
					</div>
					<div class="icon">
						<i class="fab fa-pinterest-p"></i>
					</div>
					<div class="icon">
						<i class="fab fa-youtube"></i>
					</div>
					<div class="icon">
						<i class="fab fa-facebook-f"></i>
					</div>
				</div>
				<div class="info-block">
					<span>
						Company name © 2022
					</span>
				</div>
			</div>
				<div class="dynamick-block">
					<div class="menu-block">
						<span>
							About
						</span>
						<?php
			                wp_nav_menu( array(
				            'theme_location' => 'footer-menu-one',
				            'menu_class' => 'menu__items'
			                ));
		                ?>
					</div>
					<div class="menu-two-block">
						<span>
							Help & information
						</span>
						<?php
			                wp_nav_menu( array(
				            'theme_location' => 'footer-menu-two',
				            'menu_class' => 'menu__items'
			                ));
		                ?>
					</div>
					<div class="contact-block">
						<span>
							Contact Us
						</span>
						<?php dynamic_sidebar('footer-widget'); ?>
						<!-- <div class="widget-contact">
							<span>
								(866) 12-4241
							</span>
							<p>
								return & exchange:
							</p>
							<span>
								returns@gmail.com
							</span>
							<p>
								General Questions:
							</p>
							<span>
								csr@gmail.com
							</span>
							<p>
								Suggestion & Comments:
							</p>
							<span>
								feedback@gmail.com
							</span>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
