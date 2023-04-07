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

?>
    <div class="container-flex">
        <div class="row mt-5 gx-4">
            <?php
            foreach ($posts as $post) { ?>
                <div class="col-4 d-flex">
                    <div class="author-image">
                        <?= get_the_post_thumbnail($post, "review-thumbnail"); ?>
                    </div>
                    <div class="ms-3">
                        <p class="m-0"><strong><?= get_the_title($post); ?></strong></p>
                        <p class="m-0"><small><small><?= get_the_excerpt($post); ?></small></small></p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="row gx-4">
            <?php
            foreach ($posts as $post) { ?>
                <div class="col-4">
                    <?= get_the_content(null, false, $post); ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>




<!-- Start the rendering of the template -->
<div id="home-page">
    <!-- Hero section -->
    <div id="home-hero" class="outer-padding d-flex justify-content-center align-items-center flex-column">
        <div>
            <!-- Text and image -->
            <div class="d-flex align-items-end">
                <!-- Text on the left -->
                <div class="text-description d-flex flex-column justify-content-between">
                    <h1 class="m-0">
                        Elena<br>Galbusera
                    </h1>
                    <h3>
                        Consulente di Comunicazione & Ufficio Stampa Freelance
                    </h3>
                    <div class="catch d-flex align-items-center">
                        <div class="line"></div>
                        <p class="m-0"><small>Catturare l'attenzione è una questione di stile.</small></p>
                    </div>
                </div>

                <!-- Image on the right -->
                <?= get_hero_image("elena-galbusera-recaled") ?>
            </div>

            <!-- Buttons -->
            <div class="buttons">
                <a class="btn btn-primary" href="#">
                    Contattami
                </a>
                <a class="btn btn-outline-primary" href="/chi-sono">
                    Chi sono
                </a>
            </div>
        </div>
    </div>

    <!-- Projects -->
    <div id="home-projects" class="outer-padding portfolio-list">
        <div class="d-flex align-items-center flex-column">
            <div class="title text-center mt-5">
                <h3>
                    Vedo gente, faccio cose...
                    <br>scrivo e osservo
                </h3>
                <div class="line mt-4"></div>
            </div>

            <div class="description mt-5">
                <p class="text-center">
                    Sono Elena Galbusera e da 20 anni affianco aziende e professionisti
                    nella progettazione di <b>strategie di comunicazione</b> per
                    <strong>incrementare la visibilità</strong> online e offline in maniera efficace.
                </p>
                <p class="text-center">
                    Mi occupo di ufficio stampa, digital PR, social media marketing e
                    content marketing.
                </p>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a class="btn btn-outline-primary" href="/portfolio">Cosa posso fare per te</a>
        </div>
        </div>
            <div class="row gx-3 mt-5">
                <?= get_featured_posts(); ?>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a class="btn btn-outline-primary" href="/portfolio">Guarda tutti i progetti</a>
        </div>
    </div>

    <!-- Reviews -->
    <div id="home-reviews" class="outer-padding mt-5">
        <div class="title">
            <h2>DICONO DI ME</h2>
            <div class="line mt-3"></div>
        </div>
        <?= get_reviews(); ?>
        <div class="d-flex justify-content-center mt-5">
            <a class="btn btn-outline-primary" href="/recensioni">Leggi tutte le recensioni</a>
        </div>
    </div>
</div>