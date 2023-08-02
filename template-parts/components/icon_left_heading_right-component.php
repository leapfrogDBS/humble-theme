<?php
    $icon_left = get_sub_field('icon_left');
    $heading_text = get_sub_field('heading_text');
    $icon_width_px = get_sub_field('icon_width_px') ?: '100';
    $text_editor_content = get_sub_field('text_editor_content');
?>

<div class="icon-text-container flex flex-col md:flex-row items-center gap-x-6 gap-y-4 lg:flex-row z-40 mb-6">
    <?php if($icon_left) : ?>
        <img class="h-auto object-cover" src="<?php echo $icon_left['url']; ?>" alt="<?php echo $icon_left['alt']; ?>" style="width:<?php echo $icon_width_px;?>px;">
    <?php endif; ?>
    <div>
        <?php if($heading_text) : ?> 
            <?php include(locate_template('template-parts/components/heading-component.php')); ?>
        <?php endif; ?>
        <?php if($text_editor_content) : ?>
            <div class="text-center md:text-left">
                <?php echo $text_editor_content; ?>
            </div>
        <?php endif; ?>
    </div>
</div>