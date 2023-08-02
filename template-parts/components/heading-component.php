<?php
// Get the text color from the ACF field
$text_color = get_sub_field('row_text_colour') ?: '';
$heading_text = get_sub_field('heading_text');
$heading_level = get_sub_field('heading_level');
$heading_css_classes = get_sub_field('heading_css_classes') ?: '';


$custom_font_size_px = "";
if ($heading_level === "custom")  {
    $custom_font_size_px = get_sub_field('custom_font_size_px') ?: '24';
}

$alignment = get_sub_field('alignment') ?: 'left';
$font_weight = get_sub_field('font_weight') ?: '';


$alignment_class = '';

// Apply alignment class to the container
if ($alignment === 'left') {
    $alignment_class = 'text-left';
} elseif ($alignment === 'center') {
    $alignment_class = 'text-center';
} elseif ($alignment === 'right') {
    $alignment_class = 'text-right';
}

// Add the text color style if it's set
$text_style = '';
if ($text_color) {
    $text_style .= 'color: ' . $text_color . ';';
}

// Add custom font size style if it's set
if ($custom_font_size_px) {
    $text_style .= 'font-size: ' . $custom_font_size_px . 'px;';
}

if ($heading_text) {
    echo '<h2 class="heading-component bg-contain bg-center bg-no-repeat z-40 w-full leading-tight text-left relative ' . $font_weight . ' ' . $heading_css_classes . ' ' . $heading_level . ' ' . $alignment_class . '" style="' . $text_style . '"><span>' . $heading_text . '</span></h2>';
}
?>
