<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Humble_Associates
 */

get_header();

// Show popup
$show_popup = get_field('show_popup');

if ($show_popup) {
	$select_popup_to_show = get_field('select_popup_to_show');
	
	// Make the $select_popup_to_show variable available to the included file
	 set_query_var('popup_post_id', $select_popup_to_show->ID);

	// Include the popup template part (change this to match your actual template part)
    get_template_part('template-parts/shared/popup');

    // Switch back to the main query
    wp_reset_postdata();
}


$reading_time = get_field('reading_time');

?>

<section>
    <div class="container container-xs py-120">
        <div class="row mt-20 mb-32">
            <div class="col">
                <div class="black-to-blog-link text-electric-pink text-lg font-semibold">
                <?php
                    // Check if the referrer header is set
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $referrer = $_SERVER['HTTP_REFERER'];
                        echo "<a href='$referrer'><i class='fa-solid fa-chevron-left mr-3'></i>Back to Blog</a>";
                    } else {
                        // If the referrer header is not set, create a default link to the homepage
                        echo "<a href='index.php'><i class='fa-solid fa-chevron-left mr-3'></i>Back to Blog</a>";
                    }
                    ?>
                    </a>
                    </div>

                <div class="copy post-content text-midnight-blue mt-6">
                    <?php if ($reading_time) : ?>
                        <p class="text-base font-medium"><?php echo esc_html($reading_time); ?> min read</p>
                    <?php endif; ?>
                    <h3 class="font-semibold"><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
                <div class="border-t border-gray-300 mt-12 flex gap-x-8 py-6">
                <?php 
                    // Get the current post's URL and title
                    $post_url = urlencode(get_permalink());
                    $post_title = urlencode(get_the_title());
                ?>
                    <a href="https://twitter.com/share?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank">
                        <img class="w-5 h-5" src="<?php echo get_template_directory_uri(); ?>/assets/images/blue-twitter.svg" alt="twitter-icon">
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $post_url; ?>" target="_blank">
                        <img class="w-5 h-5" src="<?php echo get_template_directory_uri(); ?>/assets/images/blue-linkedin.svg" alt="linkedin-icon">
                    </a>
                    <div id="copyButton">
                        <img class="w-5 h-5" src="<?php echo get_template_directory_uri(); ?>/assets/images/blue-email.svg" alt="email-icon">
                    </div>
                    <div class="text-sm m-0 text-electric-pink font-semibold" id="alert" style="display: none;">Link copied</div>
                </div>
            </div>
		</div>

        <div class="hidden row">
            <div class="col copy post-copy">
                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
            </div>
        </div>
    </div>
</section>

<style>
    #masthead {
        background-color: #05053D !important;
    }
</style>

<script>
    document.getElementById("copyButton").addEventListener("click", function() {
    var copyText = window.location.href;

    var el = document.createElement('textarea');
    el.value = copyText;
    el.setAttribute('readonly', '');
    el.style.position = 'absolute';
    el.style.left = '-9999px';
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);

    // Display the alert message
    var alertDiv = document.getElementById("alert");
    alertDiv.style.display = "block";
    setTimeout(function() {
        alertDiv.style.display = "none";
    }, 1000);
});

</script>

<?php
get_footer();
