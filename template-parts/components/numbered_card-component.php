<?php
$card_number = get_sub_field('ready_section_card_number');
$card_heading = get_sub_field('ready_section_card_heading');
$card_text = get_sub_field('ready_section_card_text');
$card_background_image = get_sub_field('ready_section_card_background_image');

$card_number_background = get_sub_field('ready_section_card_number_background');
$card_number_color = get_sub_field('colour_selection') ?: '';

$bg_style = '';


if ($card_background_image) {
    // use the background image
    $bg_style .= 'background-image: url(' . esc_url($card_background_image['url']) . ');';
} elseif ($card_number_color) {
    // use the background color as a fallback
    $bg_style .= 'background-color: ' . esc_attr($card_number_color) . ';';
}
?>
<div class="card-col h-full col rounded-[50px] flex flex-col justify-between px-12 pt-6 pb-16 bg-no-repeat bg-cover bg-center z-40"  style="<?php echo $bg_style; ?>">
    <h2 class="card-number text-[220px] font-extrabold text-center leading-none bg-contain bg-no-repeat" style="background-image: url(<?php echo esc_url($card_number_background['url']); ?>)"><?php echo esc_html($card_number); ?></h2>
    <h3 class="text-2xl font-bold flex-1"><?php echo esc_html($card_heading); ?></h3>
    <p class="mt-14 text-lg font-normal"><?php echo esc_html($card_text); ?></p>
</div>
   