<?php
// Get the text color from the ACF field
$text_color = get_sub_field('row_text_colour') ?: '';

$hero_title = get_sub_field('hero_title');
$hero_subtitle = get_sub_field('hero_subtitle');

// Add the text color style if it's set
if ($text_color) {
    $row_style = 'color: ' . $text_color . ';';
} else {
    $row_style = 'color: #fff;';
}
$row_classes .= 'row mx-auto mt-16 mb-0 md:my-20 relative z-40 py-12 lg:pt-40 lg:pb-0';

echo '<div class="' . $row_classes . '" style="' . $row_style . '">';
?>
    
            <div class="col text-center md:text-left">
                <h1 class="headingOne font-bold"><?php echo $hero_title; ?></h1>
                <h2 class="headingFour w-full lg:w-2/3 mt-6"><?php echo $hero_subtitle; ?></h2>
            </div>      
            <div class="col mt-8 text-center md:text-left">
                <div class="inline-block">
                    <?php include(locate_template('template-parts/components/button-component.php')); ?>
                </div>
            </div>           
        
    </div>
</section>
