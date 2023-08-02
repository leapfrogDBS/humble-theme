<?php 
    $counter = 0;
    if (have_rows('leadership_journey_cards')) : ?>
        <?php while (have_rows('leadership_journey_cards')) : the_row(); ?>
            <?php $counter++; ?>
            <div class="mt-6">
                <div class="card flex flex-col lg:flex-row gap-10 items-center lg:w-3/4 <?php echo ($counter % 2 == 0) ? 'ml-auto mr-0' : ''; ?>">
                    <?php $leadership_journey_card_icon = get_sub_field('leadership_journey_card_icon'); ?>
                        <?php if ($leadership_journey_card_icon) : ?>
                            <img class="h-48 w-48 <?php echo ($counter % 2 == 0) ? 'lg:order-2' : 'lg:order-1'; ?>" src="<?php echo esc_url($leadership_journey_card_icon['url']); ?>" alt="<?php echo esc_attr($leadership_journey_card_icon['alt']); ?>">
                        <?php endif; ?>
                    
                        <div class="text-white <?php echo ($counter % 2 == 0) ? 'lg:order-1 lg:text-right' : 'lg:order-2'; ?>">
                            <h3 class="card-heading text-2xl font-semibold"><?php the_sub_field('leadership_journey_card_heading'); ?></h3>
                            <p class="card-icon-text text-xl mt-2 font-medium"><?php the_sub_field('leadership_journey_card_icon_text'); ?></p>
                        </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>