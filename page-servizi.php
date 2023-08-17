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

    <div class="container-xl">
        <?php echo do_shortcode(
            "[title_section]
                Negli anni ho creato una rete di professionisti che mi
                affiancano nella mia attività per offrire al cliente
                una consulenza a 360°
            [/title_section]"
        ); ?>

        <div class="outer-padding container-flex">
            <div class="row mt-3 gy-4 gx-5">
                <div class="col-12 col-sm-6 col-xl-4">
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

                <div class="col-12 col-sm-6 col-xl-4">
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

                <div class="col-12 col-sm-6 col-xl-4">
                    <?= get_tile(
                        "document-pen-sign-svgrepo-com",
                        "Contenuti",
                        "Ogni storia può essere raccontata ma è il modo con cui lo si fa a fare la differenza.",
                        "Produzione di contenuti testuali e visivi per siti, blog, editoria, canali social.",
                        false
                    ) ?>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <?= get_tile(
                        "hashtag-square-svgrepo-com",
                        "Sociale Media Marketing",
                        "I social network sono un canale di comunicazione fondamentale per poter sviluppare una
                    strategia efficace. Sono un'importante opportunità di crescita e visibilità per aziende
                    e professionisti.",
                        "Apertura profili / gestione / produzione contenuti testuali e grafici / campagne ADV.",
                        true
                    ) ?>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <?= get_tile(
                        "book-open-alt-svgrepo-com",
                        "Editoria Print Design",
                        "Lookbooks, cataloghi, brochures, libri, flyers, riviste aziendali e 
                    presentazioni sono strumenti estremamente efficaci per rafforzare l'identità del brand.",
                        "Studio grafico / Produzione di contenuti testuali / realizzazione.",
                        false
                    ) ?>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <?= get_tile(
                        "calendar-days-svgrepo-com",
                        "Eventi",
                        "Eventi aziendali, lanci di prodotto, press day, manifestazioni di interesse comune.",
                        "Ricerca location / allestimenti / ricerca catering /coordinamento / servizi tecnici.",
                        true
                    ) ?>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <?= get_tile(
                        "design-pencil-svgrepo-com",
                        "Brand Design",
                        "Un'immagine visiva coordinata serve per definire e consolidare l'identità del brand.",
                        "Progettazione Brand Image + Logo Design / studio della tipografia / studio del colore.",
                        false
                    ) ?>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <?= get_tile(
                        "monitor-code-svgrepo-com",
                        "Realizzazione siti web",
                        "Il web è la vetrina sul mondo aperta 365 giorni l'anno.
                    È quindi necessario non solo esserci ma esserci nel modo giusto.",
                        "Progettazione e realizzazione di siti web su piattaforma  WordPress / servizio newsletter /
                    landing pages / e-commerce.",
                        true
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
