<?php
$slide_images = get_sub_field('intro_section_slide_images');
?>

<div class="image-slider swiper-container relative  mx-auto overflow-hidden z-40 w-full">
    <div class="swiper-wrapper flex items-center">
        <?php if ($slide_images) : ?>
            <?php foreach ($slide_images as $slide_image) : ?>
                <div class="swiper-slide mb-12">
                    <img class="h-auto lg:w-full object-cover" src="<?php echo $slide_image['intro_section_slide_image']['url']; ?>" alt="<?php echo $slide_image['intro_section_slide_image']['alt']; ?>">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination relative flex items-center justify-center"></div>
</div>