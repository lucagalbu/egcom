<?php

/**
 * Template part for the home page.
 *
 * @package egcom
 */

?>

<?php
function get_hero_image($slug)
{
    $args = array(
        'post_type' => 'attachment',
        'name' => sanitize_title($slug),
        'posts_per_page' => 1,
        'post_status' => 'inherit',
    );

    $_head = get_posts($args);
    $id = $_head ? array_pop($_head)->ID : null;
    echo wp_get_attachment_image($id, "full");
}
?>

<?php
function get_featured_posts()
{
    $posts = get_posts(array(
        'numberposts'   => 3,
        'post_type'     => 'portfolio',
        'meta_key'      => 'featured_portfolio',
        'meta_value'    => true
    ));

    foreach ($posts as $post) { ?>
        <div class="col-4 d-flex justify-content-center">
            <a class="project-container position-relative" href='<?= get_permalink($post) ?>'>
                <?= get_the_post_thumbnail($post, "post-title"); ?>
                <div class="d-flex justify-content-center align-items-center text-center post-title">
                    <?= get_the_title($post); ?>
                </div>
                <div class="post-description">
                    <?= get_the_excerpt($post); ?>
                </div>
            </a>
        </div>
<? }
}
?>

<?php
function get_reviews()
{
    $posts = get_posts(array(
        'numberposts'   => 3,
        'post_type'     => 'recensioni'
    ));

    foreach ($posts as $post) { ?>
        <div class="col-4">
            <div class="header d-flex align-items-center">
                <div class="author-image">
                    <?= get_the_post_thumbnail($post, "full"); ?>
                </div>
                <div class="ms-3">
                    <div class="author-name"><?= get_the_title($post); ?></div>
                    <div class="author-description"><?= get_the_excerpt($post); ?></div>
                </div>
            </div>
            <div class="text mt-4">
                <?= get_the_content(null, false, $post); ?>
            </div>
        </div>
<? }
}
?>

<!-- Start the rendering of the template -->
<div id="home-page">
    <!-- Hero section -->
    <div id="home-hero" class="d-flex justify-content-center align-items-center flex-column">
        <div>
            <!-- Text and image -->
            <div class="d-flex align-items-end">
                <!-- Text on the left -->
                <div class="text-description d-flex flex-column justify-content-between">
                    <div class="title">
                        Tom<br>Johnson
                    </div>
                    <div class="description">
                        Consulente di Comunicazione & Ufficio Stampa Freelance
                    </div>
                    <div class="catch d-flex align-items-center">
                        <div class="line"></div>
                        Catturare l'attenzione è una questione di stile.
                    </div>
                </div>

                <!-- Image on the right -->
                <?= get_hero_image("tom-johnson-recaled") ?>
            </div>

            <!-- Buttons -->
            <div class="buttons">
                <a class="btn btn-primary" href="#">
                    Collabora
                </a>
                <a class="btn btn-outline-primary" href="#">
                    Chi sono
                </a>
            </div>
        </div>
    </div>

    <!-- Projects -->
    <div id="home-projects">
        <div class="d-flex align-items-center flex-column">
            <div class="title mt-5">
                Vedo gente, faccio cose...
                <br>scrivo e osservo
                <div class="line mt-4"></div>
            </div>
            <div class="description mt-5">
                <p>
                    Sono Tom Johnson e da 20 anni affianco aziende e professionisti
                    nella progettazione di <b>strategie di comunicazione</b> per
                    <strong>incrementare la visibilità</strong> online e offline in maniera efficace.
                </p>
                <p>
                    Mi occupo di ufficio stampa, digital PR, social media marketing e
                    content marketing.
                </p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row gx-3 mt-5">
                <?= get_featured_posts(); ?>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a class="btn btn-outline-primary" href="#">Guarda tutti i progetti</a>
        </div>
    </div>

    <!-- Reviews -->
    <div id="home-reviews" class="reviews mt-5">
        <div class="title">
            DICONO DI ME
            <div class="line mt-3"></div>
        </div>
        <div class="review-container row gx-5"><?= get_reviews(); ?></div>
        <div class="d-flex justify-content-center mt-5">
            <a class="btn btn-outline-primary" href="#">Leggi tutte le recensioni</a>
        </div>
    </div>
</div>