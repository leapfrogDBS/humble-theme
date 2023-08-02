<?php if( have_rows('wyl_step') ): ?>
    <div class="step-container mt-12 grid md:grid-cols-2 gap-x-4">
        <?php while( have_rows('wyl_step') ): the_row();    

        $wyl_icon = get_sub_field('wyl_icon');
        $wyl_heading = get_sub_field('wyl_heading');
        $wyl_text = get_sub_field('wyl_text');
        
        ?>
        <div class="flex items-start mt-4 gap-x-4">

            <?php
            if ($wyl_icon) : ?>
                <img class="w-[100px] h-auto" src="<?php echo $wyl_icon['url']; ?>" alt="<?php echo $wyl_icon['alt']; ?>" />
            <?php endif; ?>


            <div>
                <?php if($wyl_heading) : ?>
                    <h3 class="headingFour font-semibold"><?php echo $wyl_heading; ?></h3>
                <?php endif;
                if($wyl_text) : ?>
                    <p class="text-[15px] mt-2"><?php echo $wyl_text; ?></p>
                <?php endif; ?>
            </div>
        </div>

        <?php endwhile; 

        $certificate = get_sub_field('certificate');
        
        if($certificate) : ?>
            <div class="flex items-center justify-center mt-4 gap-x-4">
                <h4 id="certificate-heading" class="headingFour relative  heading-component font-bold">Your<br>certificate</h4>
                <img class="w-[150px] h-auto" src="<?php echo $certificate['url']; ?>" alt="<?php echo $certificate['alt']; ?>" />
            </div>

        <?php endif; ?>

    </div>
<?php endif; ?>

<style>
    #certificate-heading::after {
        width: 43px;
        height: 22px;
        background-image: url(http://localhost/humble/wp/wp-content/uploads/2023/07/teal-chervrons-right.svg);
        top: 0;
        right: 0;
        margin-right: 5px;
        margin-top: -5px;
    }
</style>