<?php
// Start the rendering of the page
get_header(); 
?>

<div id="clienti">
    <div class="outer-padding title-strip">
        <h1>Clienti</h1>
    </div>

    <div class="container-xl">
        <?php echo do_shortcode(
            "[title_section]
            Ecco con chi ho avuto la fortuna di collaborare.
            [/title_section]"
        ); ?>
    </div>

    <div class="outer-padding container-flex">
        <?php the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>