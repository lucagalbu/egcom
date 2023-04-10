<?php

/**
 * Return all the posts of type portfolio.
 * @var \WP_Query The array of portfolio posts.
 */
function getReviewPosts()
{
    $query_params = array(
        'post_type' => 'recensioni',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );

    $all_posts_query = new WP_Query($query_params);

    wp_reset_query();

    return ($all_posts_query);
}


// Start the rendering of the page
get_header();

$reviews_items = getReviewPosts();
?>

<div id="reviews">
    <div class="outer-padding title-strip">
        <h1>Dicono di me</h1>
    </div>

    <div class="outer-padding container-xxl">
        <?php
        while ($reviews_items->have_posts()) {
            $reviews_items->the_post();
        ?>
            <div class="row py-3 justify-content-center gx-1 my-4">
                <div class="col-2 d-flex justify-content-center align-items-start">
                    <?= get_the_post_thumbnail($post, "thumbnail", array('class' => 'author-pic')); ?>
                </div>
                <div class="col-10 col-xl-6">
                    <p class="m-0 title"><strong><?= get_the_title($post); ?></strong></p>
                    <p class="m-0 excerpt"><small><small><?= get_the_excerpt($post); ?></small></small></p>
                    <div class="line"></div>
                    <div class="row mt-2">
                        <div id=<?= "reviewText" . get_the_ID() ?> class="col-11 review-text"><?= the_content(); ?></div>
                        <div class="col-1">
                            <div class="btn btn-outline-primary chevron-container" onclick="recensioniChevronClick(<?= 'reviewChevron' . get_the_ID() ?>, <?= 'reviewText' . get_the_ID() ?>)">
                                <div id=<?= "reviewChevron" . get_the_ID() ?> class="chevron"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
get_footer();
