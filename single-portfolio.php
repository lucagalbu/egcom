<?php get_header(); ?>

<div id="single-portfolio">
    <div class="d-flex header px-2">
        <div class="half-width title">
            <?= strtoupper(get_the_title()) ?>
            <div class="line"></div>
        </div>
        <div class="half-width">
            <?= get_the_post_thumbnail(null, 'post-title', array('class' => "float-end")); ?>
        </div>
    </div>

    <div class="container content">
        <div class="row g-5">
            <div class="col-9">
                <?= the_content(); ?>
            </div>
            <div class="col-3">
                INCARICO<br>
                Ufficio Stampa<br>
                Social Media Marketing<br>
                Content Marketing
            </div>
        </div>
    </div>
</div>
</div>