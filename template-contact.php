<?php
/*
 * Template Name: Contact
 */

get_header();

$linkedin = get_field('linkedin', 'option');
$twitter = get_field('twitter', 'option');
$address = get_field('address', 'option');	
$email_address = get_field('email_address', 'option');	
?>

<section class="pt-28">

    <div class="container container-wide py-16 lg:py-28 text-midnight-blue">
        <div class="row">
            <div class="col text-center">
                <h2 class="contact-heading heading-component text-4xl md:text-6xl font-bold"><span>Get in touch</span></h2>
                <h4 class="mt-12 text-base font-medium text-black">Use the form below to drop us a message , we typically reply within 48 hours.</h4>
            </div>
        </div>
        <div class="mt-12 md:mt-24 lg:mt-32 grid gap-6 sm:grid-cols-2">
            <div class="col">
                <?php if ($address) : ?>
                    <div class="flex gap-x-6 lg:gap-x-12">
                        <div class="icon">
                            <img class="h-auto w-8" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/location-icon.svg" alt="location icon">
                        </div>
                        <div class="text">
                            <p class="text-md md:text-lg font-medium leading-relaxed"><?php echo $address; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($email_address) :  ?>
                    <div class="flex gap-x-6 lg:gap-x-12 mt-12">
                        <div class="icon">
                            <img class="h-auto w-8" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/email-icon.svg" alt="email icon">
                        </div>
                        <div class="text">
                            <a href="<?php echo esc_url( 'mailto:' . antispambot( $email_address ) ); ?>" class="text-md md:text-lg font-medium leading-relaxed"><?php echo $email_address; ?></a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="flex gap-x-6 lg:gap-x-12 mt-12 items-center">
                    <div class="icon">
                        <img class="h-auto w-8" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/social-icon.svg" alt="social icon">
                    </div>
                    <div class="text flex gap-x-4">
                        <?php if($linkedin) { ?>
                            <a href="<?php echo $linkedin['url']; ?>" target="_blank">
                                <img class="h-6 w-6" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/linkedin-black.png" alt="linnkedin icon">
                            </a>
                        <?php } ?>
                        <?php if($twitter) { ?>
                            <a href="<?php echo $twitter['url']; ?>" target="_blank">
                                <img class="h-6 w-6" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact/twitter-black.png" alt="twitter icon">
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col">
            <form id="contact-form" class="w-full" method="POST">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                            <input class="appearance-none block w-full bg-[#F3F3F3] text-base text-midnight-blue font-semibold px-6 py-4 leading-tight placeholder-midnight-blue" name="first-name" id="first-name" type="text" placeholder="First Name" required>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <input class="appearance-none block w-full bg-[#F3F3F3] text-base text-midnight-blue font-semibold px-6 py-4 leading-tight placeholder-midnight-blue" name="last-name" id="last-name" type="text" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input class="appearance-none block w-full bg-[#F3F3F3] text-base text-midnight-blue font-semibold px-6 py-4 leading-tight placeholder-midnight-blue" name="email" id="email" type="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <textarea class=" no-resize appearance-none block w-full bg-[#F3F3F3] text-base text-midnight-blue font-semibold px-6 py-4 leading-tight h-48 resize-none placeholder-midnight-blue" name="message" id="message" placeholder="Your Message"></textarea>
                        </div>
                    </div>
                    <div class="md:flex items-center justify-end"> 
                        <button class="standard-button text-white bg-electric-pink border-electric-pink hover:text-electric-pink hover:bg-white" type="submit">Send</button>               
                    </div>
                </form>
                <div id="result"></div>
            </div>
        </div>
        
    </div>
</section>

<section>
    <div class="px-8 sm:px-20">
        <div class="row border-t-2 border-black py-20">
            <div class="col">
            <iframe class="w-full h-[70vh]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19885.86128638894!2d-0.13500553129276802!3d51.46306467168573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760467d29e1fb5%3A0xa03036cba7e4fc50!2s6%20Atlantic%20Rd%2C%20London%20SW9%208HY!5e0!3m2!1sen!2suk!4v1689249315523!5m2!1sen!2suk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-heading span::before {
    height: 150px;
    width:120px;
    background-image: url(http://localhost/humble/wp/wp-content/uploads/2023/07/get-in-touch.png);
    top: 0;
    left: 0;
	margin-left: -130px;
	margin-top: -50px;
}
.contact-heading span::after {
    height: 150px;
    width:120px;
    background-image: url(http://localhost/humble/wp/wp-content/uploads/2023/07/get-in-touch2.png);
    top: 0;
    right: 0;
	margin-right: -130px;
	margin-top: -50px;
}
</style>

<script>
    document.querySelector('#contact-form').addEventListener('submit', function(event) {
        event.preventDefault();  // Prevent the default form submission

        var form = event.target; // Reference to the form
        var data = new FormData(form); // This will capture all the form data
        
        // Extract the Contact Form 7 ID from the ACF field
        var shortcode = '<?php echo get_field("contact_form_shortcode"); ?>'; // Replace with the correct ACF field name
        
        var match = shortcode.match(/id="(\d+)"/);
        var formId = match ? match[1] : ''; // Extracted form ID

        fetch('<?php echo home_url(); ?>/wp-json/contact-form-7/v1/contact-forms/' + formId + '/feedback', {
            method: 'POST',
            body: data
        }).then(function(response) {
            return response.json(); // The response is a JSON object
        }).then(function(json) {
            // You can access the JSON properties here
            // for example json.mail_sent_ok contains a boolean if the mail was sent successfully
            if (json.status === 'mail_sent') {
                document.querySelector('#result').innerText = json.message; // Shows the message from the response

                // push an event to the dataLayer
                window.dataLayer.push({
                    'event': 'contact_form_submit'
                });

            } else {
                document.querySelector('#result').innerText = 'An error occurred: ' + json.message; // Shows the error message from the response
                console.error(json); // Log the error to the console
            }
        }).catch(function(error) {
            console.error(error); // Log any network errors to the console
        });
    });
</script>


<?php
$heading_transparent = get_field('heading_transparent');
echo $heading_transparent;
if (!$heading_transparent) { ?>
	<style>
		 #masthead {
 			background-color: #05053D !important;
 		}
	</style>
<?php } 

 // Retrieve the custom CSS
 $custom_css = get_field('page_custom_css');
 
 // Sanitize and validate the custom CSS
 $sanitized_css = wp_kses_post($custom_css);
 
 // Output the custom CSS within a style tag
 if (!empty($sanitized_css)) {
	 echo '<style>' . $sanitized_css . '</style>';
 }


get_footer();
