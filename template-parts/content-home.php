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
                    <h1><?= get_the_title($portfolio) ?></h1>
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
</div>