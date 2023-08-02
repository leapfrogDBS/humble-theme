
<?php
$code = get_sub_field('code'); // Replace 'your_textarea_field_name' with the actual name/key of your textarea custom field

if ($code) { ?>
    
    <div class="code-container mt-6">
        <?php echo $code; ?>
    </div>
    
<?php 
}
?>