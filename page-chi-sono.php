<?php

get_header();

?>

<div id="chi-sono">
    <div class="outer-padding title-strip">
        <h1>Elena Galbusera</h1>
    </div>

    <div class="outer-padding d-flex justify-content-center mt-4">
        <div class="title">
            <h3 class="text-center">
                <?= get_the_title() ?>
            </h3>
            <div class="line mt-4"></div>
        </div>
    </div>

    <div class="outer-padding container-flex">
        <div class="row justify-content-center gx-5 mt-3">
            <div class="col-6">
                <?= get_the_content() ?>
            </div>
            <div class="col-3">
                <?= get_the_post_thumbnail(null, "full") ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
