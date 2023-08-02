<?php
$background_color = get_sub_field('colour_selection') ?: '';
$background_image = get_sub_field('background_image') ?: '';
$background_overlay_color = get_sub_field('background_overlay_colour') ?: '';
$background_overlay_opacity = get_sub_field('background_overlay_opacity') ?: '';
$animation = get_sub_field('animation') ?: 'none';

$bg_style = '';
$bg_overlay_style = ''; 

$layout = get_sub_field('column_layout') ?: '';



if ($background_image) {
    // use the background image
    $bg_style .= 'background-image: url(' . esc_url($background_image['url']) . ');';

    if ($background_overlay_color && $background_overlay_opacity !== '') {
        // Extract the RGB values from the background overlay color
        $rgb_values = array_slice($background_overlay_color, 0, 3);

        // Combine the RGB values with the opacity
        $rgba_values = array_merge($rgb_values, array($background_overlay_opacity));

        // Convert the background overlay color to the rgba string
        $rgba_value = implode(',', $rgba_values);

        // Apply the background overlay color to the overlay div
        $bg_overlay_style = 'background-color: rgba(' . $rgba_value . ');';
    }
    
} elseif ($background_color) {
    // use the background color as a fallback
    $bg_style .= 'background-color: ' . esc_attr($background_color) . ';';
}   

// Get any css classes added to the column
$css_class = get_sub_field('css_class') ? get_sub_field('css_class') : false;

// Add the $css_classes to the column class
$column_class = 'col bg-cover bg-center bg-no-repeat relative';
if ($css_class) {
    $column_class .= ' ' . $css_class;
}


$vertically_position = get_sub_field('vertically_position') ?: '';

if ($vertically_position) {
    $column_class .=  ' ' . $vertically_position;
}

if($animation !== 'none') {
    $column_class .= ' ' . $animation;
}

echo '<div class="h-full flex flex-col '. $column_class .'" style="' . $bg_style . '" >';
    echo '<div class="background-overlay absolute inset-0 pointer-events-none" style="'. $bg_overlay_style .'"></div>'
?>