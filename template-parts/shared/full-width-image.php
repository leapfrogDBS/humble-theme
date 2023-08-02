<?php 
$column_one_title = get_sub_field('column_one_title');
$column_two_image = get_sub_field('column_two_image');
$row_classes = 'row grid grid-cols-1 ';

$layout = get_sub_field('column_layout') ?: '';
    if ($layout == 'first' || $layout == 'third') {
        $row_classes .= 'lg:grid-cols-3';
        if($layout == 'first') {
            $row_classes .= ' first';
        }
        if($layout == 'third') {
            $row_classes .= ' third';
        }
    } else {
        $row_classes .= 'lg:grid-cols-2';
    }

    $background_color = get_sub_field('colour_selection') ?: '';
    $background_image = get_sub_field('background_image') ?: '';
    $background_overlay_color = get_sub_field('background_overlay_colour') ?: '';
    $background_overlay_opacity = get_sub_field('background_overlay_opacity') ?: '';
    
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


// Get the text color from the ACF field
$text_color = get_sub_field('row_text_colour') ?: '';
// Add the text color style if it's set
if ($text_color) {
    $row_style = 'color: ' . $text_color . ';';
} else {
    $row_style = '';
}

$image_leftright = get_sub_field('image_leftright') ?: '';

$col1_class = '';
$col2_class = '';

if ($image_leftright === 'left') {
    $col1_class = 'order-2';
    $col2_class = 'order-1';
} 
$position_content = get_sub_field('position_content') ?: '';

$css_id = get_sub_field('css_id') ?: '';

if ($css_id) {
    $css_id = 'id="' . $css_id . '"';
}


?>
    
<section style="<?php echo $bg_style; ?>">
    <div class="w-full p-0 max-w-none">
        <div <?php echo $css_id; ?> class="row <?php echo $row_classes; ?>" style="<?php echo $row_style; ?>">
            <div class="col px-8 sm:px-16 py-8 sm:py-16 lg:py-28 flex flex-col 2xl:px-32 <?php echo $col1_class; ?> <?php echo $position_content; ?>">
            <?php
            if (have_rows('components')):
                while (have_rows('components')): the_row();

                    $component_layout = get_row_layout();
                    $component_template = 'template-parts/components/' . $component_layout . '-component.php';

                    if (locate_template($component_template)):
                        include(locate_template($component_template));
                    else:
                        echo '<p>No template found for ' . $component_layout . ' component.</p>';
                    endif;

                endwhile;
            endif;
            ?>
            </div>
            <div class="image-col col bg-no-repeat bg-cover h-[350px] xs:h-[440px] lg:h-auto <?php echo $col2_class; ?>" style="background-image: url(<?php echo $column_two_image['url']; ?>);">
            
            </div>
        </div>
    </div>
</section>