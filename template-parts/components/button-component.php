<?php
// Initialize variables
$button_text = "";
$button_link = "";
$text_colour = "";
$button_colour = "";
$button_alignment = "";
$file_link  = "";

// Retrieve field values
$button_text = get_sub_field('button_label');
$button_link = get_sub_field('button_link');
$text_colour = get_sub_field('text_colour');
$button_colour = get_sub_field('button_colour');
$button_alignment = get_sub_field('button_alignment');
$trigger_popup = get_sub_field('trigger_popup');
$file_link = get_sub_field('file_link');
$link_to = get_sub_field('link_to');
$page_link = get_sub_field('page_link');
$anchor_link = get_sub_field('anchor_link');


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

// Set unique identifier for the button
$unique_id =  uniqid();
$button_id = 'buttonID' . $unique_id;


$button_icon_fa = '<i class="fa-solid fa-chevron-right ml-4 group-hover:rotate-90 transition-transform duration-200 text-md lg:text-lg"></i>';

$target = '';


switch ($link_to) {
   
    case 'file':
        $button_link = $file_link['url'];
        $target = 'target="_blank"';
        $button_icon_fa =  '<i class="fa-solid fa-download  ml-4 text-md lg:text-lg"></i>';
        break;
    case 'page':
        $button_link = $page_link;
        break;
    case 'external':
        $button_link = $button_link['url'];
        $target = 'target="_blank"';
        break;
    case 'anchor' :
        $button_link = $anchor_link;
        break;
    case 'popup':
        $popup_link = get_sub_field('popup_link') ?: '';
        
        if ($popup_link) :    
            set_query_var( 'unique_id', $unique_id );
            set_query_var( 'popup_link', $popup_link );

            get_template_part('template-parts/shared/button_triggered_popup');
        endif;
        
        break;
}

?>

<?php if ($button_text): ?>
    <div class="btn-container w-full <?php echo $button_alignment;?>">
        <div class="inline-block">
            <?php if ($link_to === "popup" && $popup_link): ?>
                <button id="<?php echo $button_id; ?>" class="popup-button standard-button group block z-40 relative mt-6" style="<?php echo $inlineStyle; ?>">
                     <?php echo $button_text; ?><?php echo $button_icon_fa; ?></i>
                </button>
            <?php else: ?>
                <a href="<?php echo esc_url($button_link); ?>" id="<?php echo $button_id; ?>" class="standard-button group block z-40 relative mt-6" style="<?php echo $inlineStyle; ?>" <?php echo $target; ?>>
                     <?php echo $button_text; ?><?php echo $button_icon_fa; ?></i>
                </a>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>

<style>
#<?php echo $button_id; ?>:hover {
    background-color: #ffffff !important;
    <?php if ($button_colour): ?>
    color: <?php echo $button_colour; ?> !important;
    <?php else: ?>
    color: <?php echo $fallbackTextColour; ?> !important;
    <?php endif; ?>
}
</style>


