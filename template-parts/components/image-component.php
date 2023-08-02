<?php
$image = get_sub_field('image');
$width = get_sub_field('image_width');
$alignment = get_sub_field('image_alignment');
$image_min_width_px = get_sub_field('image_min_width_px') ?: '';
$image_max_width_px = get_sub_field('image_max_width_px') ?: '';

if (!empty($image)) {
    echo '<div class="image-container flex z-40 ';
    
    // Apply alignment class to the container
    if ($alignment === 'left') {
        echo ' justify-start';
    } elseif ($alignment === 'center') {
        echo ' justify-center';
    } elseif ($alignment === 'right') {
        echo ' justify-end';
    }
    
    echo '">';
    
    echo '<img class="xs:w-auto xs:h-auto xs:min-w-0" src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '"';
    
    // Apply width as inline style to the image tag
    echo ' style="width: ' . esc_attr($width) . '%;';
    
    // Apply min-width style to the image tag
    if ($image_min_width_px) {
        echo ' min-width: ' . esc_attr($image_min_width_px) . 'px;';
    }
    
    // Apply max-width style to the image tag
    if ($image_max_width_px) {
        echo ' max-width: ' . esc_attr($image_max_width_px) . 'px;';
    }
    
    echo '">';
    
    echo '</div>';
}
?>
