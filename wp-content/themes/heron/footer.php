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
				</div><!-- .container -->
				<div class="footer-bottom">
					<div class="container">
						<div class="row justify-content-between align-items-center footer-bottom-inner">
							<div class="col-auto">
								<div class="copyright">
									<p class="text-center m-0">©2025 <a href="https://thoucentric.com">Thoucentric</a>, All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-auto">
								<div class="footer-social">
									<ul class="social-icons">
										<li>
											<a href="#">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
											</a>
										</li>
										<li>
											<a href="#">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4l11.733 16h4.267l-11.733 -16z" /><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" /></svg>
											</a>
										</li>
										<li>
											<a href="#">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 11v5" /><path d="M8 8v.01" /><path d="M12 16v-5" /><path d="M16 16v-3a2 2 0 1 0 -4 0" /><path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" /></svg>
											</a>
										</li>
										<li>
											<a href="#">
												<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M16.5 7.5v.01" /></svg>
											</a>
										</li>
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
						</div><!-- .footer-bottom-inner -->
					</div>
				</div><!-- .footer-bottom -->

				<!-- <div class="totop d-none">
					<a href="#">
						<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M16 9l-4 -4" /><path d="M8 9l4 -4" /></svg>
					</a>
				</div> -->
				<div class="totop">
					<a href="#">
						<div class="progress-ring">
							<svg width="48" height="48" viewBox="0 0 48 48">
								<circle class="background-ring" cx="24" cy="24" r="22" fill="none" stroke-width="4" />
								<circle class="progress-ring-path" cx="24" cy="24" r="22" fill="none" stroke-width="4" />
							</svg>
							<span class="arrow">&#8593;</span>
						</div>
					</a>
				</div><!-- .totop -->

				<div class="scrolling-text-container">
					<div class="scrolling-text">
						<span>thoucentric</span>
						<span>thoucentric</span>
						<span>thoucentric</span>
						<span>thoucentric</span>
					</div>
				</div><!-- .scrolling-text-container -->

			</footer><!-- .footer -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
