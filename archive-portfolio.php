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


// Start the rendering of the page
get_header();

$portfolio_items = getPortfolioPosts();
?>

<div id="portfolio">
    <div class="outer-padding title-strip">
        <h1>Case Studies</h1>
    </div>

    <div class="outer-padding container portfolio-list">
        <div class="row mt-3">
            <?php
            while ($portfolio_items->have_posts()) {
                $portfolio_items->the_post();
            ?>
                <div class="col-xl-4 col-sm-6 col-12 mb-3 mt-3 d-flex justify-content-center">
                    <a class="project-container position-relative" href='<?= get_permalink() ?>'>
                        <?= get_the_post_thumbnail(null, "post-title"); ?>
                        <div class="d-flex justify-content-center align-items-center text-center post-title">
                            <?= get_the_title(); ?>
                        </div>
                        <div class="post-description">
                            <?= get_the_excerpt(); ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
get_footer();
