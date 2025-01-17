<?php

/**
 * Returns the HTML string of an image.
 *
 * Returns the HTML string of an img element containing an image from the
 * Wordpress media library.
 *
 * @param string $slug slug of the image in the wordpress media library.
 * @return string string with the HTML element.
 */
function get_icon_image($slug)
{
    $args = array(
        'post_type' => 'attachment',
        'name' => sanitize_title($slug),
        'posts_per_page' => 1,
        'post_status' => 'inherit',
    );

    $_head = get_posts($args);
    $id = $_head ? array_pop($_head)->ID : null;
    echo wp_get_attachment_image($id, "services-icon");
}


/**
 * Returns the HTML of a service tile.
 * 
 * A service tail is composed of a title with an icon
 * and a description text. At the end there is the list
 * of services in italic.
 * 
 * @param string $icon_slug slug if the icon in the Wordpress media library.
 * @param string $title Title of the tile.
 * @param string $description Description of the service.
 * @param string $services Services.
 * @param bool $colored give a colored the background
 * @return string HTML stirng with the service tile.
 */
function get_tile($icon_slug, $title, $description, $services, $colored)
{

    $classes = $colored ? "colored-background" : "";
    $classes = "tail-container " . $classes
?>

    <div class="px-3 <?= $classes ?>">
        <div class="row pt-2">
            <div class="col-3">
                <?= get_icon_image($icon_slug) ?>
            </div>
            <div class="col-9">
                <p><strong><?= $title ?></strong></p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <p><?= $description ?></p>
                <p><em><?= $services ?></em></p>
            </div>
        </div>
    </div>
<?php
}
?>


<?php

get_header();

?>

<div id="servizi">
    <div class="outer-padding title-strip">
        <h1>Servizi</h1>
    </div>
        <div class="outer-padding container-flex">
            <div class="row mt-3 gy-4 gx-5">
                <div class="col-12 col-lg-4">
                    <?= get_tile(
                        "newspaper-5-svgrepo-com",
                        "Ufficio Stampa & Media Relations",
                        "Ogni canale ha la sua forma di comunicazione. Che sia la carta stampata, il web,
                    la radio o la Tv è necessario sviluppare un'attività di ufficio stampa ad hoc senza
                    dimenticare l'importanza di coltivare i rapporti con i giornalisti.",
                        "Produzione e invio comunicati stampa / recalling / monitoraggio /
                    rassegna stampa.",
                        false
                    ) ?>
                </div>

                <div class="col-12 col-lg-4">
                    <?= get_tile(
                        "bulb-light-svgrepo-com",
                        "Strategie di Comunicazione",
                        "Un'ottima strategia di comunicazione è la base di qualsiasi attività che andremo a
                    sviluppare insieme.",
                        "Analisi del mercato e dei competitors / analisi del target / definizione obiettivi /
                    definizione strategia.",
                        true
                    ) ?>
                </div>

                <div class="col-12 col-lg-4">
                    <?= get_tile(
                        "document-pen-sign-svgrepo-com",
                        "Contenuti",
                        "Ogni storia può essere raccontata ma è il modo con cui lo si fa a fare la
                    differenza.",
                        "Produzione di contenuti testuali e visivi per siti, blog, editoria, canali social.",
                        false
                    ) ?>
                </div>

                <div class="col-12 col-lg-4">
                    <?= get_tile(
                        "success-svgrepo-com",
                        "Personal Branding e Branding aziendale",
                        "Una buona strategia di branding permette ad aziende e professionisti di distinguersi tra i competitors attivi sul mercato.",
                        "Studio e sviluppo di strategie atte a rafforzare e diffondere l'immagine e la reputazione professionale e aziendale.",
                        true
                    ) ?>
                </div>

                <div id = contatti class="col-12 col-lg-4 align-items-center justify-content-center">
                    <a class="btn btn-primary" href="/contatti">
                        Contattami
                    </a>
                </div>

                <div class="col-12 col-lg-4">
                <?= get_tile(
                        "calendar-days-svgrepo-com",
                        "Eventi",
                        "Eventi aziendali, lanci di prodotto, press day, manifestazioni di interesse comune.",
                        "Ricerca location / allestimenti / ricerca catering /coordinamento / servizi tecnici.",
                        true
                    ) ?>
                </div>
            </div>
        </div>
</div>

<?php
get_footer();
