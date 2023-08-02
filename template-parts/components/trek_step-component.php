
<?php
$trek_step_image = get_sub_field('trek_step_image');
$trek_step_heading = get_sub_field('trek_step_heading');
$trek_step_text = get_sub_field('trek_step_text');
?>
<div class="flex flex-col items-center md:flex-row gap-12 md:w-10/12 my-12">
    <?php if ($trek_step_image) : ?>
        <img src="<?php echo esc_url($trek_step_image['url']); ?>" alt="<?php echo esc_attr($trek_step_image['alt']); ?>" class="w-36 h-36">
    <?php endif; ?>

    <div class="text-center md:text-left">
        <?php if ($trek_step_heading) : ?>
            <h3 class="text-[22px] font-semibold"><?php echo esc_html($trek_step_heading); ?></h3> 
        <?php endif; ?>

        <?php if ($trek_step_text) : ?>
            <p class="mt-4 text-lg font-medium"><?php echo esc_html($trek_step_text); ?></p>
        <?php endif; ?>        
    </div>
</div>