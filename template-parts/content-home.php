<?php

/**
 * Template part for the home page.
 *
 * @package egcom
 */


// Retrieve all posts of type portoflio. The meta key
// is created using the Advanced Custom Fields plugin
$portfolios =
    $posts = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'portfolio',
        'meta_key' => 'featured_portfolio',
        'meta_value' => true
    ));
?>

<?php
/**
 * Return all the posts of type logo.
 * @return \WP_Query The array of logo posts.
 */
function getLogoPosts()
{
    $query_params = array(
        'post_type' => 'logo',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );

    $all_posts_query = new WP_Query($query_params);

    wp_reset_query();

    return ($all_posts_query);
}

/**
 * Return URLs of all the logo images.
 * @param array array of logo posts.
 * @return array array of images URLs.
 */
function getLogoURLs(WP_Query $posts)
{
    $urls = array();

    foreach ($posts->posts as $post) {
        $urls[] = get_the_post_thumbnail_url($post);
    }

    return ($urls);
}
?>


<!-- Start the rendering of the template -->
<div class="home-page container">
    <?php for ($index = 0; $index < count($portfolios); $index++) {
        $portfolio = $portfolios[$index];
    ?>
        <div class="row align-items-center justify-content-center py-5 gx-5">
            <?php $title_col_class = 'col-6 ' . ($index % 2 ? 'order-last' : ''); ?>
            <div class="<?= $title_col_class ?>">
                <?php $description_class = $index % 2 ? 'float-start' : 'float-end'; ?>
                <div class="<?= $description_class ?>">
                    <h3><?= get_the_title($portfolio) ?></h3>
                    <p><?= get_the_excerpt($portfolio) ?></p>
                    <a href=<?= get_post_permalink($portfolio) ?>>Continua a leggere</a>
                </div>
            </div>
            <?php $image_col_class = 'col-6 ' ?>
            <div class="<?= $image_col_class ?>">
                <?php $featured_image_class = "featured-image " . ($index % 2 ? 'float-end' : 'float-start'); ?>
                <img class="<?= $featured_image_class ?>" src=<?= get_the_post_thumbnail_url($portfolio) ?>> </img>
            </div>
        </div>
    <?php } ?>

    <!--- Logos --->
    <?php
    $logos = getLogoPosts();
    $logo_urls = getLogoURLs($logos);
    $urls_count = count($logo_urls);
    $urls_first_half = array_slice($logo_urls, 0, floor($urls_count / 2) - 1);
    $urls_second_half = array_slice($logo_urls, floor($urls_count / 2));

    array_push($urls_first_half, ...$urls_first_half);
    array_push($urls_second_half, ...$urls_second_half);
    ?>

    <div class=" logo-slider-container">
        <div class="logo-slider-row-1">
            <?php
            foreach ($urls_first_half as $logo_url) {
            ?>
                <img src=<?= $logo_url; ?> alt=" Image"></img>
            <?php } ?>
        </div>
        <div class="logo-slider-row-2">
            <?php
            foreach ($urls_second_half as $logo_url) {
            ?>
                <img src=<?= $logo_url; ?> alt=" Image"></img>
            <?php } ?>
        </div>
    </div>
</div>