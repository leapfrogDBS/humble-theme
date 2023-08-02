<?php
$background_color = get_sub_field('colour_selection') ?: '';
$background_image = get_sub_field('background_image') ?: '';
$background_overlay_color = get_sub_field('background_overlay_colour') ?: '';
$background_overlay_opacity = get_sub_field('background_overlay_opacity') ?: '';

$section_css_id = get_sub_field('section_css_id') ?: '';

$bg_style = '';
$bg_overlay_style = ''; 

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
    $container_width = get_sub_field('container_width') ?: 'container-small'; // Default to 'container' if not set
?>

<section id="<?php echo $section_css_id; ?>" style="<?php echo $bg_style; ?>">
    <div class="background-overlay absolute inset-0 pointer-events-none" style="<?php echo $bg_overlay_style; ?>"></div>
        <div class="container <?php echo $container_width; ?>">