<?php 
$profile_image  = get_sub_field('profile_image');
$linkedin_profile = get_sub_field('linkedin_profile');
$founder_name = get_sub_field('founder_name');
$founder_title = get_sub_field('founder_title');
?>

<div class="flex flex-col items-center gap-y-6">
    <?php if ($profile_image) : ?>
        <div class="flex justify-center">
            <img class="h-[350px] w-auto object-cover" src="<?php echo esc_url($profile_image['url']); ?>" alt="<?php echo esc_attr($profile_image['alt']); ?>">
        </div>
        <div class="bio flex gap-x-6 items-center">
            <?php if ($linkedin_profile) : ?>
                <a href="<?php echo esc_url($linkedin_profile['url']); ?>" target="_blank" rel="noopener noreferrer">
                    <img class="h-11 w-11" src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.png" alt="linkedin icon">
                </a>
            <?php endif; ?>
            <div class="info">
                <?php if ($founder_name) : ?>
                    <h3 class="text-2xl font-bold"><?php echo esc_html($founder_name); ?></h3>
                <?php endif; ?>
                <?php if ($founder_title) : ?>
                    <h4 class="text-xl font-semibold"><?php echo esc_html($founder_title); ?></h4>  
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>