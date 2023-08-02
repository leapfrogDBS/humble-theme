<div class="grid lg:grid-cols-2 gap-x-6">
    <?php
    if (have_rows('icon_top_text_under_collection')) {
        while (have_rows('icon_top_text_under_collection')) {
            the_row();
            $icon_top = get_sub_field('icon_top');
            $heading_text = get_sub_field('heading_text');
            $icon_width_px = get_sub_field('icon_width_px') ?: '100';
            $text_editor_content = get_sub_field('text_editor_content');
    ?>

    <div class="flex flex-col items-center lg:items-start gap-x-6 gap-y-4 z-40">
        <?php if($icon_top) : ?>
            <img class="h-auto object-cover mt-6" src="<?php echo $icon_top['url']; ?>" alt="<?php echo $icon_left['alt']; ?>" style="width:<?php echo $icon_width_px;?>px;">
        <?php endif; ?>
        <div>
            <?php if($heading_text) : ?>      
                <?php include(locate_template('template-parts/components/heading-component.php')); ?>
            <?php endif; ?>
            <?php if($text_editor_content) : ?>
                <div class="text-center lg:text-left">
                    <?php echo $text_editor_content; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
        }
    }
    ?>
</div>