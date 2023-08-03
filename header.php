<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Humble_Associates
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5TBSTBZ7');</script>
	<!-- End Google Tag Manager -->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<!-- Hotjar Tracking suppression if necessary -->
    <?php 
    if (function_exists('get_field')) {
        $tracking_with_hotjar = get_field('tracking_with_hotjar');
        if ($tracking_with_hotjar === false) {
            echo "<script>
                window.hj = window.hj || function() {
                    (hj.q = hj.q || []).push(arguments);
                };
                hj('tagRecording', ['suppress']);
            </script>";
        }
    }
    ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5TBSTBZ7"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'humble-associates' ); ?></a>

	<!-- Mobile Menu Button -->
	<div class="fixed top-7 right-12 xl:hidden focus:outline-none z-[600]" id="mobile-menu-button">
		<div class="hamburger flex flex-col justify-between h-5">
			<div class="bar w-10 h-0.5 bg-white transition-transform duration-500 ease-in-out"></div>
			<div class="bar w-10 h-0.5 bg-white transition-opacity duration-500 ease-in-out"></div>
			<div class="bar w-10 h-0.5 bg-white transition-transform duration-500 ease-in-out"></div>
		</div>
	</div>

	<header id="masthead" class="bg-midnight-blue site-header fixed top-0 left-0 w-full z-50 text-white py-6 px-16 drop-shadow-2xl lg:px-20 lg:bg-transparent ">
		<div class="px-0 xs:px-16 lg:px-0 max-w-5xl mx-auto">
			<div class="row flex justify-center items-center lg:justify-between">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php 
						$header_logo = get_field('header_logo', 'option');

						if($header_logo) {
							$header_image_src = $header_logo['url'];
						} else {
							$header_image_src = get_template_directory_uri() . '/assets/images/white-logo.svg';
						}
					?>
					<img class="h-8 md:h-12" src="<?php echo esc_url($header_image_src); ?>" alt="humble associates logo">
				</a>
				
				<!-- Desktop Menu -->
				<nav class="hidden xl:block">
					<?php
					wp_nav_menu( array( 
						'theme_location' => 'menu-1',
						'container' => false, 
						'items_wrap' => '<ul class="flex items center gap-x-10">%3$s</ul>',
						'add_li_class'  => 'font-semibold text-lg py-4 border-t-4 border-transparent hover:border-white' 
					) ); 
					?>
				</nav>
			
			</div>
			<!-- Mobile Menu -->
			<nav id="mobile-menu" class="absolute py-32 top-0 right-0 transform translate-x-full overflow-auto h-screen w-96 bg-midnight-blue transition-transform duration-500 ease-in-out xl:hidden">
				<?php
				wp_nav_menu( array( 
					'theme_location' => 'menu-1',
					'container' => false, 
					'items_wrap' => '<ul class="text-white flex flex-col gap-y-2">%3$s</ul>',
					'add_li_class'  => 'text-center text-2xl font-bold leading-9 pb-4' 
				) ); 
				?>
			</nav>

		
		</div>
	</header><!-- #masthead -->

<script>
// Toggles the display of the mobile menu
document.getElementById('mobile-menu-button').addEventListener('click', function() {
    this.classList.toggle('change');
    document.getElementById('mobile-menu').classList.toggle('translate-x-full');
});


</script>