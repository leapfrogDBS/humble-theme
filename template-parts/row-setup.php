<?php
$column_count = get_sub_field('column_count');
$columns = get_sub_field('columns');
$row_classes = 'row grid grid-cols-1 gap-6 ';
$column_gap = get_sub_field('column_gap') ?: 'small'; // default to small

// Get the text color from the ACF field
$text_color = get_sub_field('row_text_colour') ?: '';

if ($column_count && $columns) {  
    
    // Add Tailwind CSS class based on column count
    switch ($column_count) {
        case 1:
            $row_classes .= '';
            break;
        case 2:
            $layout = get_sub_field('column_layout') ?: '';
            if ($layout == 'first' || $layout == 'third') {
                $row_classes .= 'md:grid-cols-2';
                if($layout == 'first') {
                    $row_classes .= ' first';
                }
                if($layout == 'third') {
                    $row_classes .= ' third';
                }
            } else {
                $row_classes .= 'md:grid-cols-2';
            }
            break;
        case 3:
            $row_classes .= 'sm:grid-cols-2 lg:grid-cols-3';
            break;
        case 4:
            $row_classes .= 'sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4';
            break;
        case 5:
            $row_classes .= 'sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5';
            break;
        case 6:
            $row_classes .= 'grid-cols-2 xxs:grid-cols-3 sm:grid-cols-4 lg:grid-cols-6';
            break;
        default:
            $row_classes .= '';
            break;
    }
}

switch($column_gap) {
    case 'small':
        $column_gap = 'md:gap-12';
        break;
    case 'medium':
        $column_gap = 'md:gap-32';
        break;
    case 'large':
        $column_gap = 'md:gap-32 lg:gap-64';
        break;
    case 'extra-large':
        $column_gap = 'md:gap-32 lg:gap-64 xl:gap-96';
        break;
    default:
        $column_gap = 'md:gap-12';
        break;
}


// Add the text color style if it's set
if ($text_color) {
    $row_style = 'color: ' . $text_color . ';';
} else {
    $row_style = '';
}
 $row_classes .= ' ' . $column_gap;

echo '<div class="' . $row_classes . '" style="' . $row_style . '">';
?>


<!--
PurgeCSS Safe:

md:gap-12
md:gap-32
md:gap-64
md:gap-96
-->