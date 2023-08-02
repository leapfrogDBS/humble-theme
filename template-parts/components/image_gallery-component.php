<?php
    $image_gallery = get_sub_field('image_gallery');
?>

  
<div class="flex items-center justify-between gap-6 relative z-40">
    <?php if ($image_gallery) : ?>
        <?php foreach ($image_gallery as $image) : ?>
            <div class="w-full">
                <img class="w-full h-full object-cover" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
