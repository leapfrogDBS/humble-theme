<?php
$testimonial = get_sub_field('testimonial');
$background_colour = get_sub_field('colour_selection') ?: '#0DD4C9';
$text_colour = get_sub_field('row_text_colour') ?: '#FFFFFF';
$image_overlay = get_sub_field('ct_image_overlay_graphic') ?: '';
?>
<div class="w-full flex justify-center items-center relative">
    <div class="rounded-full h-48 w-48 flex items-center justify-center p-3 shadow-2xl" style="background-color: <?php echo $background_colour; ?> ;">
        <h3 class="text-center text-[15px] font-semibold" style="color:<?php echo $text_colour;?> ;"><?php echo $testimonial; ?></h3>
    </div>
    <?php if($image_overlay) : ?>
        <img class ="absolute inset-0 object-contain aspect-square w-full h-full" src="<?php echo $image_overlay['url']; ?>);"/>
    <?php endif; ?>
</div>