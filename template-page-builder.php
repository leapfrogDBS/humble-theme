<?php
// Check if the flexible content field has rows of data
if (have_rows('free_sections')):

    // Loop through the rows of data
    while (have_rows('free_sections')): the_row();

        $section_layout = get_row_layout();

        switch ($section_layout) {
            case 'section':
                // Section Setup File
                get_template_part('template-parts/section-setup');

                if (have_rows('row')):
                    while (have_rows('row')): the_row();

                        // Row Setup File
                        get_template_part('template-parts/row-setup');
                        
                        
                        if (have_rows('columns')):
                            while (have_rows('columns')): the_row();

                                // Column Setup File
                                get_template_part('template-parts/column-setup');
                               
                                
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

                                echo '</div>';  // End .col

                            endwhile;
                        endif;

                        echo '</div>';  // End .row

                    endwhile;
                endif;

                // Close section and container after processing ACF fields
                echo '</div></section>';
                break;

                case 'hero_section':
                    // Hero Section
                    get_template_part('template-parts/section-setup');
                    include(locate_template('template-parts/shared/hero.php'));
                    break;
                
                case 'testimonials_section':
                    // Hero Section
                    get_template_part('template-parts/section-setup');
                    include(locate_template('template-parts/shared/testimonials.php'));
                    break;

                case 'full_width_row_with_image_column':
                    // Full width row with image
                    include(locate_template('template-parts/shared/full-width-image.php'));
                    break;

            default:
                // Default case if no matching section type is found
                echo '<p>No template found for ' . $section_layout . ' section.</p>';
                break;
        }

    endwhile;

else:
    // No layouts found
    echo '<p>No content to display.</p>';

endif;
?>