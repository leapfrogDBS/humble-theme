<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Humble_Associates
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container container-small py-16 lg:py-32 min-h-[80vh] flex flex-col items-center justify-center">
				<div class="row">
					<div class="col text-midnight-blue text-center">
						<h1 class="superSize">404</h1>
						<h2 class="headingTwo text-midnight-blue mt-8"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'humble-associates' ); ?></h2>
						<div class="inline-block">
							<a href="<?php echo home_url(); ?>" class="mt-8 standard-button group block z-40 relative mt-6" style="background-color: #FF2E5C; border: 1px solid #FF2E5C; color: #ffffff; ">
                     		Back to Home<i class="fa-solid fa-chevron-right ml-4 group-hover:rotate-90 transition-transform duration-200 text-md lg:text-lg"></i>
                			</a>
						</div>
					</div>
				</div>
			</div>
				
		</section><!-- .error-404 -->

	</main><!-- #main -->

	<style>
		 #masthead {
 			background-color: #05053D !important;
 		}
	</style>

<?php

get_footer();
