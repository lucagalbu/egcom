<?php

get_header();

?>

<div id="chi-sono">
    <div class="outer-padding title-strip">
        <h1>Elena Galbusera</h1>
    </div>

    <?php
    $title = get_the_title();
    echo do_shortcode(
        "[title_section]" . $title . "[/title_section]"
    );
    ?>

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
