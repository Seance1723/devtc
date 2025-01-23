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
			<footer class="footer style1 bg-image-2" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/img/background/bg-5.png'; ?>');">
				<div class="container">
					<div class="row footer-inner justify-content-center align-items-center">
						<div class="col-auto d-none">
							<div class="footer-nav">
								<ul>
									<li class="menu-item"><a href="#about-main">About</a></li>
									<li class="menu-item"><a href="#features-main">Packages</a></li>
									<li class="menu-item"><a href="#testimonial-main">Gallery</a></li>
									<li class="menu-item"><a href="#contact-main">Services</a></li>
								</ul>
							</div>
						</div>
						<div class="col-auto">
							<div class="logo text-center mb-3">
								<a href="index.html" class=""><img src="http://veeva.thoucentric.com/wp-content/uploads/2024/10/TC_X_LightLogo_23.svg" alt="logo"></a>
							</div>
							<div class="copyright">
								<p class="text-center text-white">©2024 <a href="https://thoucentric.com">Thoucentric</a>, All Rights Reserved.</p>
							</div>
							<div class="footer-link text-center">
								<ul class="d-flex justify-content-evenly">
									<li>
										<a href="https://thoucentric.com/terms-of-use/" target="_blank">Terms of use</a>
									</li>
									<li>
										<a href="https://thoucentric.com/privacy-policy/" target="_blank">Privacy Policy</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>

			<div class="totop">
				<a href="#"><i class="bi bi-chevron-up"></i></a>
			</div>

		</div><!-- #page -->

		<?php wp_footer(); ?>

		<script>

			//Add or remove class for the header based ont he page
			document.addEventListener("DOMContentLoaded", function () {
				if (document.querySelector(".thankspage")) {
					const header = document.querySelector("header");
					if (header) {
						header.classList.add("dark-header");
					}
				}
			});

			document.addEventListener('DOMContentLoaded', function () {
				// Listen for the 'wpcf7submit' event triggered after form submission
				document.addEventListener('wpcf7submit', function () {
					// Select all elements with the class 'wpcf7-response-output'
					const responseOutputs = document.querySelectorAll('.wpcf7-response-output');

					// Iterate through each element and hide them
					responseOutputs.forEach(function (element) {
						element.style.display = 'none';
					});
				});
			});

			document.addEventListener("DOMContentLoaded", function () {
				// Listen for the 'wpcf7submit' event, triggered when the form is submitted
				document.addEventListener('wpcf7submit', function () {
					// Select the response output element
					const responseOutput = document.querySelector('.wpcf7-response-output');

					// If the response output exists, set a timer to hide it after 5 seconds
					if (responseOutput) {
						setTimeout(() => {
							responseOutput.style.display = 'none'; // Hide the element
						}, 5000); // 5000 milliseconds = 5 seconds
					}
				});
			});
		</script>
	</body>
</html>
