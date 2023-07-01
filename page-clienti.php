<?php
/**
 * Return the images of all posts of type logo.
 */
function get_logos()
{
    $posts = get_posts(array(
        'post_type' => 'logo',
        'posts_per_page' => -1
    ));

    foreach ($posts as $post) { ?>
        <div class="d-flex justify-content-center col-4 col-sm-2">
            <?= get_the_post_thumbnail($post); ?>
        </div>
    <?php }
}

// Start the rendering of the page
get_header(); 
?>

<div id="clienti">
    <div class="outer-padding title-strip">
        <h1>Clienti</h1>
    </div>

    <div class="container-xl">
        <?php echo do_shortcode(
            "[title_section]
            Ecco con chi ho avuto la fortuna di collaborare.
            [/title_section]"
        ); ?>
    </div>

    <div class="container-xxl justify-content-center">
        <div class="row gx-2 gy-4 my-5">
            <?php get_logos(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>