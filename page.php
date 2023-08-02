<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Humble_Associates
 */
 
 get_header();
 
 // Page Builder Layouts
 include(locate_template('template-page-builder.php'));
 

// Show Popup
if (have_rows('page_popups')):
	while( have_rows('page_popups') ): the_row(); 
		get_template_part('template-parts/shared/page_popup');
	endwhile;
endif;


 // Retrieve the custom CSS
 $custom_css = get_field('page_custom_css');
 
 // Sanitize and validate the custom CSS
 $sanitized_css = wp_kses_post($custom_css);
 
 // Output the custom CSS within a style tag
 if (!empty($sanitized_css)) {
	 echo '<style>' . $sanitized_css . '</style>';
 }

 
$heading_transparent = get_field('heading_transparent');

if (!$heading_transparent) { ?>
	<style>
		 #masthead {
 			background-color: #05053D !important;
 		}
	</style>
<?php } 

$hide_menu = get_field('hide_menu');

if ($hide_menu) { ?>
	<style>
		#masthead nav {
			display: none;
		}
	</style>
<?php }

$hide_header = get_field('hide_header');
if ($hide_header) { ?>
	<style>
		#masthead {
			display: none;
		}
	</style>
<?php }
get_footer();