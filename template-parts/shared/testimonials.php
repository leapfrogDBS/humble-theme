<?php
// Add the text color style if it's set
$text_color = get_sub_field('row_text_colour') ?: '';

if ($text_color) {
    $row_style = 'color: ' . $text_color . ';';
} else {
    $row_style = 'color: #fff;';
}

?>
        <div class="row" style="<?php echo $row_style; ?>">
            <div class="col overflow-hidden">
                <div id="testimonial-slider" class="swiper-container relative">
                    <div class="swiper-wrapper">
                        <?php if (have_rows('testimonials')) : ?>
                            <?php while (have_rows('testimonials')) : the_row(); ?>
                                <div class="swiper-slide mb-12">
                                    <div class="max-w-2xl mx-auto h-full flex flex-col justify-between">
                                        <img class="h-9 opacity-70 mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/quote-icon.svg" alt="quote icon">
                                        <?php $testimonial_logo = get_sub_field('testimonial_logo'); ?>
                                        <?php if ($testimonial_logo) : ?>
                                            <img class="max-w-xs h-20 mt-8 mx-auto sm:max-w-sm" src="<?php echo esc_url($testimonial_logo['url']); ?>" alt="<?php echo esc_attr($testimonial_logo['alt']); ?>">
                                        <?php endif; ?>
                                        <div class="testimonial-text mt-14">
                                            <?php the_sub_field('testimonial_text'); ?>
                                        </div>
                                        <div class="grid md:grid-cols-2 gap-x-6 mt-4">
                                            <?php $testimonial_profile_pic = get_sub_field('testimonial_profile_pic'); ?>
                                            <?php if ($testimonial_profile_pic) : ?>
                                                <div class="flex justify-center md:justify-end">
                                                    <img class="h-[105px] rounded-full aspect-square object-cover" src="<?php echo esc_url($testimonial_profile_pic['url']); ?>" alt="<?php echo esc_attr($testimonial_profile_pic['alt']); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="author flex justify-center md:justify-start">
                                                <div>
                                                    <p class="name font-bold text-lg text-center mt-6"><?php the_sub_field('testimonial_author'); ?>,</p>
                                                    <p class="name font-bold text-lg text-center"><?php the_sub_field('testimonial_position'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-pagination relative flex items-center justify-center"></div>
                    <!-- Add navigation arrows -->
                    <div class="hidden lg:block">
                        <div class="swiper-button-next">
                            <i class="fa fa-angle-right text-5xl text-white" aria-hidden="true"></i>
                        </div>
                        <div class="swiper-button-prev">
                            <i class="fa fa-angle-left text-5xl text-white" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
