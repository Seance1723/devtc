<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

$image_url = get_template_directory_uri() . '/assets/images/map.png';

?>

			</div><!-- #content -->
			<!-- Footer -->
			<footer class="footer">
				<div class="container">
					<div class="row footer-inner justify-content-start align-items-center">
						<div class="col-auto">
							<div class="footer-logo">
								<?php
								if (has_custom_logo()) {
									// Display the uploaded logo
									the_custom_logo();
								} else {
									// Fallback to site name
									echo '<h2 class="footer-site-title">' . get_bloginfo('name') . '</h2>';
								}
								?>
							</div>
						</div>
						<div class="col-auto">
							<div class="top-info">
								<p class="text-start text-white m-0">WE ARE PRIORITIZE COLLABORATION </br>WITH OUR CLIENTS</p>
							</div>
						</div>
					</div><!-- .footer-inner -->
					<div class="row footer-cta justify-content-between align-items-center">
						<div class="col-auto">
							<div class="intro-text">
								<h2>Let's Shape Your Vision Together. </br>
								Reach Out to <span class="text-line">thoucentric</span></h2>
							</div>
						</div>
						<div class="col-auto">
							<div class="cta-button">
								<a href="#" class="cta cta-lg cta-outline">SEND A MESSAGE</a>
							</div>
						</div>
					</div><!-- .footer-cta -->
					<div class="row footer-links justify-content-between align-self-start">
						<div class="col-md-9 col-lg-9 col-xl-9">
							<div class="row">
								<?php for ($i = 1; $i <= 4; $i++) : ?>
									<div class="col footer-widget-area">
										<?php if (is_active_sidebar('footer-widget-' . $i)) : ?>
											<?php dynamic_sidebar('footer-widget-' . $i); ?>
										<?php endif; ?>
									</div>
								<?php endfor; ?>
							</div>
						</div>
						<div class="col-auto"></div>
					</div><!-- .footer-links -->
					<div class="footer-bottom">
						<div class="row justify-content-between align-items-center">
							<div class="col-auto">
								<div class="copyright">
									<p class="text-center text-white m-0">©2025 <a href="https://thoucentric.com">Thoucentric</a>, All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-auto">
								<div class="footer-social">
									<ul class="social-icons">
										<li><a href="#"><i class="bi bi-facebook"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter"></i></a></li>
										<li><a href="#"><i class="bi bi-instagram"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-auto">
								<div class="footer-menu">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'footer',
											'menu_id'        => 'footer-menu',
											'container'      => false,
											'depth'          => 1,
										)
									);
									?>
								</div>
							</div>
						</div>
					</div><!-- .footer-bottom -->
				</div>
			</footer>

			<div class="totop">
				<a href="#"><i class="bi bi-chevron-up"></i></a>
			</div>

		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
