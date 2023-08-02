<?php 
$unquie_id = get_query_var( 'unique_id' );

$unique_popup_id = 'popupID' . $unquie_id;

$select_popup = get_query_var( 'popup_link' );

$popup_post_id = $popup_link->ID;


    $background_color = get_field('colour_selection', $popup_post_id) ?: '';
    $background_image = get_field('background_image', $popup_post_id) ?: '';
    $background_overlay_color = get_field('background_overlay_colour', $popup_post_id) ?: '';
    $background_overlay_opacity = get_field('background_overlay_opacity', $popup_post_id) ?: '';

          
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
   
?>


<!-- The Modal -->
<div id="<?php echo $unique_popup_id; ?>" class="page-popup modal fixed z-50 inset-0 overflow-auto bg-deep-blue bg-opacity-60 hidden">
  <!-- Modal Wrapper -->
  <div class="modal-wrapper h-full flex items-center justify-center">
        <!-- Modal content -->
        <div id="content-<?php echo $unique_popup_id; ?>" class="popup-content modal-content w-3/4 relative bg-white m-auto p-6 shadow-lg max-w-2xl bg-cover bg-no-repeat fade-in" style="<?php echo $bg_style; ?>">
            <span id="close-<?php echo $unique_popup_id; ?>" class="close-button text-midnight-blue leading-none rounded-full px-3 py-2 bg-white text-xl font-extrabold cursor-pointer absolute top-6 right-6">X</span>
            <div class="content text-white flex flex-col justify-center items-center py-20 px-8 gap-y-6">
                <?php if (have_rows('components', $popup_post_id)) :
                while (have_rows('components', $popup_post_id)): the_row();

                $component_layout = get_row_layout();
                $component_template = 'template-parts/components/' . $component_layout . '-component.php';

                if (locate_template($component_template)):
                    include(locate_template($component_template));
                else:
                    echo '<p>No template found for ' . $component_layout . ' component.</p>';
                endif;

            endwhile;
        
                endif; ?>

            </div>
        </div>
    </div>
</div>


<script>
    (function() {
        // Unique Popup ID from PHP
        
        var uniqueID = <?php echo json_encode($unique_id); ?>;

        var uniquePopupID = <?php echo json_encode($unique_popup_id); ?>;

        // Variables from PHP
        var popupContainer = document.querySelector('#' + uniquePopupID);
        var popupContent = document.querySelector('#content-' + uniquePopupID);
        var closeBtn = document.querySelector('#close-' + uniquePopupID);
       

        // Show popup function
        function showPopup() {
            popupContainer.classList.remove('hidden');
            popupContent.style.opacity = "1";
            document.body.classList.add("no-scroll");
            // push an event to the dataLayer
            dataLayer.push({
                'event': 'popup_appear',
                'popup_id': '<?php echo $popup_post_id; ?>'
            });
        }

        // wait till the DOM is loaded to add event lister to button trigger
        document.addEventListener("DOMContentLoaded", function () {
            var btn_trigger = document.querySelector("#buttonID" + uniqueID);
            btn_trigger.onclick = function () {
            showPopup();
            };          
        });
       
        // Close button and outside click handlers
        closeBtn.onclick = function () {
            // Hide the modal immediately when closing
            popupContent.style.opacity = "0";
            popupContainer.classList.add("hidden");
            // Remove the no-scroll class from the body
            document.body.classList.remove("no-scroll");
            
        };

        popupContainer.onclick = function (event) {
            if (event.target !== popupContent && !popupContent.contains(event.target)) {
                // Hide the modal immediately when closing
                popupContent.style.opacity = "0";
                popupContainer.classList.add("hidden");
                // Remove the no-scroll class from the body
                document.body.classList.remove("no-scroll");
            }
        };
    })();
</script>