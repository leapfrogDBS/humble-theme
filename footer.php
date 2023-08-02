<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Humble_Associates
 */

?>

	<footer id="colophon" class="site-footer bg-midnight-blue text-white py-12 relative">
		<div class="px-16 lg:px-20 max-w-5xl mx-auto">
			<div class="row flex flex-col items-center gap-y-8 justify-between lg:flex-row lg:items-end">
				<div class="col">
					<?php 
						$footer_logo = get_field('footer_logo', 'option');

						if($footer_logo) {
							$footer_image_src = $footer_logo['url'];
						} else {
							$footer_image_src = get_template_directory_uri() . '/assets/images/colour-logo.svg';
						}
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="h-20" src="<?php echo esc_url($footer_image_src); ?>" alt="humble associates colour logo">
					</a>
				</div>
				
				<div class="col text-md text-center lg:text-left text-[15px]">
					

					<?php
        			// Replace 'footer-menu' with the name you used for your custom menu
        				wp_nav_menu(array('theme_location' => 'footer-menu'));
        			?>
				</div>

				<div class="col flex flex-col justify-end text-sm gap-y-2 lg:items-end">
					<?php
						$linkedin = get_field('linkedin', 'option');
						$twitter = get_field('twitter', 'option');
					?>
					<div class="social-logos flex gap-x-2 justify-center lg:justify-end">
						<? if($linkedin) : ?>
							<a href="<?php echo esc_url($linkedin['url']); ?>" target="_blank"><img class="h-12 lg:h-6" src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" alt="linkedin icon"></a>
						<? endif; ?>
						<? if($twitter) : ?>
							<a href="<?php echo esc_url($twitter['url']); ?>" target="_blank"><img class="h-12 lg:h-6" src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png" alt="twitter icon"></a>	
						<? endif; ?>
					</div>
					<p class="font-bold mt-4 lg:mt-0">© 2022 Humble Associates Coaching Ltd.</p>
					<?php 
						$address = get_field('address', 'option');
						if ($address) :	
					?>
						<p><?php echo $address; ?></p>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
