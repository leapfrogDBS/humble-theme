<?php
$video_url = get_sub_field('youtube_video');

if ($video_url) {
    // Append autoplay and mute parameters to the URL
    $video_url = add_query_arg(array(
        'autoplay' => '1',
        'mute' => '1'
    ), $video_url);
?>

    <div class="video-container mt-16">
        <iframe src="<?php echo esc_url($video_url); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

<?php
}
?>

<style>
.video-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* Aspect ratio for 16:9 */
    height: 0;
    overflow: hidden;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

</style>
