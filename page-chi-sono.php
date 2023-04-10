<?php

get_header();

?>

<div id="chi-sono">
    <div class="outer-padding title-strip">
        <h1>Tom Johnson</h1>
    </div>

    <div class="outer-padding d-flex justify-content-center mt-4">
        <div class="section-title col-10 col-sm-6 col-md-4">
            <h3 class="text-center">
                <?= get_the_title() ?>
            </h3>
            <div class="line mt-4"></div>
        </div>
    </div>

    <div class="outer-padding container-flex">
        <div class="row d-sm-none justify-content-center">
            <div class="col-5">
                <?= get_the_post_thumbnail(null, "full") ?>
            </div>
        </div>
        <div class="row justify-content-center gx-5 mt-3">
            <div class="col-sm-8 col-xl-6 text-description">
                <?= get_the_content() ?>
            </div>
            <div class="col-sm-4 col-xl-3 d-none d-sm-inline">
                <?= get_the_post_thumbnail(null, "full") ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
