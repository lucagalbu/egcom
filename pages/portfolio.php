<?php
/*
Template Name: Portfolio Masonry
*/


/**
 * The portfolio template.
 *
 * This page displays a masonry with all the portfolio feature images
 *
 * @author Luca Galbusera
 *
 * @package egcom
 */


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


// Start the rendering of the page
get_header();

$portfolio_items = getPortfolioPosts();
?>

<main id="primary" class="site-main">
    <div class="container-fluid">
        <div class="grid">
            <h1>New theme</h1>
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
</main>

<?php
get_footer();
