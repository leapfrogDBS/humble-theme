<?php
/*
 * Template Name: Blog
 */

get_header();
?>

<?php
$background_color = get_field('colour_selection') ?: '';
$background_image = get_field('background_image') ?: '';
$background_overlay_color = get_field('background_overlay_colour') ?: '';
$background_overlay_opacity = get_field('background_overlay_opacity') ?: '';

$blog_page_heading = get_field('blog_page_heading') ?: '';
$blog_page_subheading = get_field('blog_page_subheading') ?: '';
$heading_image  = get_field('heading_image') ?: '';

$bg_style = '';
$bg_overlay_style = '';

if ($background_image) {
    // use the background image
    $bg_style .= 'background-image: url(' . esc_url($background_image['url']) . ');';

    if ($background_overlay_color && $background_overlay_opacity !== '') {
        // Extract the RGB values from the background overlay color
        $rgb_values = array_slice($background_overlay_color, 0, 3);

        // Combine the RGB values with the opacity
        $rgba_values = array_merge($rgb_values, array($background_overlay_opacity));

        // Convert the background overlay color to the rgba string
        $rgba_value = implode(',', $rgba_values);

        // Apply the background overlay color to the overlay div
        $bg_overlay_style = 'background-color: rgba(' . $rgba_value . ');';
    }
} elseif ($background_color) {
    // use the background color as a fallback
    $bg_style .= 'background-color: ' . esc_attr($background_color) . ';';
}
$container_width = get_sub_field('container_width') ?: 'container-small'; // Default to 'container' if not set
?>

<section class="pt-20 pb-0 lg:py-20 " style="<?php echo $bg_style; ?>">
    <div class="background-overlay absolute inset-0 pointer-events-none" style="<?php echo $bg_overlay_style; ?>"></div>
    <div class="container container-xs z-30 relative">
        <div class="row">
            <div class="col flex flex-col md:flex-row items-center text-center md:text-right">
                <div class="title text-white">
                    <?php if ($blog_page_heading) : ?>
                        <h1 class="heading-component blog-heading relative headingTwo font-bold"><span><?php echo $blog_page_heading; ?></span></h1>
                    <?php endif; ?>
                    <?php if ($blog_page_subheading) : ?>
                        <p class="m-6 text-lg font-medium"><?php echo $blog_page_subheading; ?></p>
                    <?php endif; ?>
                </div>
                <?php if ($heading_image) : ?>
                    <img class="w-64 h-auto hidden md:block" src="<?php echo $heading_image['url']; ?>" alt="<?php echo $heading_image['alt']; ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section class="bg-white lg:-mb-32">
    <div class="max-w-4xl mx-auto relative lg:-top-44 z-40 bg-white px-6 py-6">
        <?php
        // Query parameters
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'order' => 'DESC',
            'orderby' => 'date',
            'paged' => $paged,
        );

        // The Query
        $blog_posts = new WP_Query($args);

        // The Loop
        if ($blog_posts->have_posts()) :
            while ($blog_posts->have_posts()) : $blog_posts->the_post();
                $reading_time = get_field('reading_time');
        ?>
                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                    <div id="post-container" class="grid md:grid-cols-2 gap-x-12 border-gray-100 border mb-6">
                        <div class="post-content text-midnight-blue hover:text-electric-pink flex flex-col p-6 order-2 md:order-1">
                            <h3 class="text-[12px] font-light mb-6"><?php echo $reading_time; ?> min read</h3>
                            <h4 class="headingFour font-bold"><?php the_title(); ?></h4>
                            <p class="mt-6 text-lg font-medium"><?php the_excerpt(); ?></p>
                        </div>

                        <div class="post-image w-full order-1 md:order-2">
                            <?php if (has_post_thumbnail()) : ?>
                                <img class="w-full h-auto object-cover max-h-[330px]" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </a>

        <?php
            endwhile;
        else :
        ?>

            <p>No blog posts found.</p>

        <?php
        endif;
        // Restore original Post Data
        wp_reset_postdata();
        ?>

        <div class="pagination flex items-center justify-center gap-x-4 text-midnight-blue">
            <?php
            echo paginate_links(array(
                'total' => $blog_posts->max_num_pages,
                'current' => $paged,
                'prev_next' => true,
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
            ));
            ?>
        </div>

    </div>
    
</section>

<style>
    .blog-heading::before {
        content: "";
	    display: inline-block;
	    background-size: cover;
	    position: absolute;
        width: 64px;
        height: 64px;
        background-image: url(http://localhost/humble/wp/wp-content/uploads/2023/07/white-bust.svg);
        top: 0;
        left: 0;
        margin-left: 85px; 
    }
    .blog-heading::after {
        content: "";
	    display: inline-block;
	    background-size: cover;
	    position: absolute;
        width: 32px;
        height: 37px;
        background-image: url(http://localhost/humble/wp/wp-content/uploads/2023/07/pink-burst.svg);
        top: 0;
        left: 0;
        margin-left: 155px; 
        margin-top: -30px;
    }
</style>

<?php include(locate_template('template-page-builder.php')); ?>



<?php

 // Retrieve the custom CSS
 $custom_css = get_field('page_custom_css');
 
 // Sanitize and validate the custom CSS
 $sanitized_css = wp_kses_post($custom_css);
 
 // Output the custom CSS within a style tag
 if (!empty($sanitized_css)) {
	 echo '<style>' . $sanitized_css . '</style>';
 }


 
get_footer();
