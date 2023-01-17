<?php

/**
 * Template part for the home page.
 *
 * @package egcom
 */

?>

<?php
/**
 * Return all the posts of type portfolio.
 * @var \WP_Query The array of portfolio posts.
 */
function getPortfolioPosts()
{
    $query_params = array(
        'post_type' => 'portfolio',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );

    $all_posts_query = new WP_Query($query_params);

    wp_reset_query();

    return ($all_posts_query);
}
?>

<!-- Start the rendering of the template -->
<?php $portfolio_items = getPortfolioPosts(); ?>
<div class="container-fluid">
    <div class="grid">
        <!-- The following two containers are required by masonry to set a 
        relative size for the articles -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        <?php
        while ($portfolio_items->have_posts()) {
            $portfolio_items->the_post();
        ?>
            <div class="grid-item">
                <div class="card mb-4 d-flex flex-column align-items-center">
                    <div class="portfolio_thumbnail">
                        <a href=<?= get_post_permalink(); ?> target="_self">
                            <img src=<?= the_post_thumbnail_url(); ?>></img>
                        </a>
                    </div>
                    <p class="text-center mb-0"> <?= get_the_title(); ?> </p>
                    <p class="text-center fw-light fst-italic"> <?= get_the_category()[0]->name; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>