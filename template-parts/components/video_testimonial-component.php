<?php
$video_testimonial_name = get_sub_field('video_testimonial_name');
$video_testimonial_position = get_sub_field('video_testimonial_position');
$video_testimonial_testimonial = get_sub_field('video_testimonial_testimonial');
$video_testimonial_file = get_sub_field('video_testimonial_file');
?>

<div class="flex flex-col gap-y-2 mt-6">
    <div class="video-container z-50">
        <?php
        if ($video_testimonial_file) {
            echo '<video controls><source src="' . $video_testimonial_file['url'] . '"></video>';
        } ?>
    </div>
    <div class="title text-center mt-6">
        <?php if ($video_testimonial_name) : ?>
            <h3 class="text-2xl font-bold"><?php echo esc_html($video_testimonial_name); ?>,</h3>
        <?php endif; ?>
        <?php if ($video_testimonial_position) : ?>
            <h3 class="text-2xl font-bold"><?php echo esc_html($video_testimonial_position); ?></h3>
        <?php endif; ?>       
    </div>
    <div class="testimonial text-center flex flex-col items-center mt-6">
        <?php if ($video_testimonial_testimonial) : ?>
            <img class="h-9 w-9 mb-2 rotate-180" src="<?php echo get_template_directory_uri(); ?>/assets/images/quote.svg" alt="quote icon">
            <p class="text-xl font-medium text-vivid-purple"><?php echo esc_html($video_testimonial_testimonial); ?></p>
            <img class="h-9 w-9 mt-2" src="<?php echo get_template_directory_uri(); ?>/assets/images/quote.svg" alt="quote icon">
        <?php endif; ?>
    </div>
</div>