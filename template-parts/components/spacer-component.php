<?php 
$spacer = get_sub_field('spacer');
$style = 'height: ' . $spacer . 'px;';
?>
<?php if ($spacer) : ?>
    <div class="spacer-component" style="<?php echo $style; ?>" data-original-height="<?php echo $spacer; ?>px"></div>
<?php endif; ?>
