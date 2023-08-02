<?php
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


    $mailerlite_heading = get_sub_field('mailerlite_form_heading');
    $mailerlite_group_id = get_sub_field('mailerlite_form_group_id');
    $mailerlite_lead_magnet = get_sub_field('mailerlite_form_lead_magnet');

    $form_name = get_sub_field('form_name');
      
    $button_text = get_sub_field('button_label');
    $text_color = get_sub_field('text_colour');
    $button_colour = get_sub_field('button_colour');
    
       
    // Generate inline style attribute based on field values
    $inlineStyle = "";

    // Set fallback colors
    $fallbackButtonColour = "#05053D";
    $fallbackTextColour = "#fff";

    // Set background color and border
    if ($button_colour) {
        $inlineStyle .= "background-color: " . $button_colour . "; border: 1px solid " . $button_colour . "; ";
    } else {
        $inlineStyle .= "background-color: " . $fallbackButtonColour . "; border: 1px solid " . $fallbackButtonColour . ";";
    }

    // Set text color
    if ($text_colour) {
        $inlineStyle .= "color: " . $text_colour . "; ";
    } else {
        $inlineStyle .= "color: " . $fallbackTextColour . "; ";
    }
    

    // Get the text color from the ACF field
    $text_color = get_sub_field('row_text_colour') ?: '';

    // Add the text color style if it's set
    if ($text_color) {
        $row_style = 'color: ' . $text_color . ';';
    } else {
        $row_style = '';
    }
   
?>
<div class="w-full max-w-lg rounded-md py-6 px-4" style="<?php echo $bg_style; ?> <?php echo $row_style; ?>">
<form class="w-full" id="mailerlite-subscribe-form" data-group-number="<?php echo $mailerlite_group_id; ?>" data-form-name="<?php echo $form_name; ?>">
    <div class="background-overlay absolute inset-0 pointer-events-none" style="<?php echo $bg_overlay_style; ?>"></div>
    <div class="mb-6">
        <?php
        include(locate_template('template-parts/components/heading-component.php'));
        ?>
    </div>

    <div class="flex flex-wrap mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input class="appearance-none block w-full bg-white border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="First Name" id="subscriber-first-name" aria-label="First Name">
        </div>
        <div class="w-full md:w-1/2 px-3">
            <input class="appearance-none block w-full bg-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Last Name" id="subscriber-last-name" aria-label="Last Name">
        </div>
    </div>
    <div class="flex flex-wrap mb-6">
        <div class="w-full px-3">
            <input class="appearance-none block w-full bg-white border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" placeholder="Email Address" id="subscriber-email" aria-label="Email Address">
        </div>
    </div>
    <div class="flex items-start mb-6">
        <input type="checkbox" id="marketing-permission" name="marketing-permission" class="form-checkbox h-5 w-5 text-blue-600">
        <label for="marketing-permission" class="ml-2 text-sm ">I agree for Humble Associates to collect and use my data for marketing purposes. For information on how we store your data or to unsubscribe, please review our <a href="<?php echo get_privacy_policy_url(); ?>" class="underline">Privacy Policy</a></label>
    </div>
    <!-- Include CAPTCHA here -->
    <div class="block text-center mt-6">
        <button class="standard-button group" type="submit" style="<?php echo $inlineStyle; ?>"><?php echo $button_text; ?><i class="fa-solid fa-chevron-right ml-4 group-hover:rotate-90 transition-transform duration-200 text-md lg:text-lg"></i></button>
    </div>
    <h4 id="response-message" class="text-center mt-6 text-md font-bold text-electric-pink"></h4>
</form>

<div id="form-success" class="hidden">
    <?php
    if (have_rows('mailerlite_copmponents')):
        while (have_rows('mailerlite_copmponents')): the_row();
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

</div>
