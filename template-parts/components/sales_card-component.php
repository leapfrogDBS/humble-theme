<?php
$sales_card_image = get_sub_field('sales_card_image');
$sales_card_title = get_sub_field('sales_card_title');
$sales_card_price = get_sub_field('sales_card_price');
$sales_card_copy = get_sub_field('sales_card_copy');
$sales_card_link = get_sub_field('sales_card_link');
?>

<div class="rounded-3xl relative flex flex-col drop-shadow-2xl h-full mt-12">
    <?php if ($sales_card_image) : ?>
        <div class="flex justify-center relative">
            <img class="w-full h-64 md:h-72 lg:h-96 object-cover rounded-t-3xl" src="<?php echo esc_url($sales_card_image['url']); ?>" alt="<?php echo esc_attr($sales_card_image['alt']); ?>">
        </div>
    <?php endif; ?>
    <div class="flex flex-col bg-white items-center px-6 py-6 rounded-b-3xl flex-1">
        <?php if($sales_card_title) : ?>
            <h3 class="text-3xl font-bold text-vivid-purple text-center"><?php echo esc_html($sales_card_title); ?></h3>
        <?php endif; ?>
        <?php if($sales_card_price) : ?>
            <h4 class="text-xl font-bold text-vivid-purple mt-3 text-center"><?php echo esc_html($sales_card_price); ?></h4>
        <?php endif; ?>
        <?php if($sales_card_copy) : ?>
            <p class="text-lg font-medium text-vivid-purple mt-6 text-center"><?php echo esc_html($sales_card_copy); ?></p>
        <?php endif; ?>
        <?php if($sales_card_link) : ?>
            <a href="<?php echo esc_url($sales_card_link['url']); ?>" class="text-lg font-medium text-aqua-teal mt-6 flex-1 flex items-end">Get the details</a>
        <?php endif; ?>

    </div>
</div>