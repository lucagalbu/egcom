<?php

/**
 * Return all the posts of type blog.
 * @return \WP_Query The array of blog posts.
 */
function getBlogPosts()
{
    $query_params = array(
        'post_type' => 'blog',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );

    $all_posts_query = new WP_Query($query_params);

    wp_reset_query();

    return ($all_posts_query);
}

/**
 * Returns the HTML of a blog tile.
 * 
 * A blog tail is composed of a thumbnail and a text side by side.
 
 * @param string $thumbnail HTML string of a img element with the thumbnail.
 * @param string $title title of the blog.
 * @param string $excerpt excerpt describing the blog.
 * @param string $link link to the specific blog page.
 * @param bool $colored give a colored background.
 * @return string HTML string with the blog tile.
 */
function get_tile($thumbnail, $title, $excerpt, $link, $colored)
{

    $row_class = $colored ? "colored-background" : "";
    $row_class = "row my-2 py-2 " . $row_class;
?>
    <div class="<?=$row_class ?>">  
        <div class="col-12 col-lg-5 my-2 d-flex justify-content-center align-items-center">
            <?= $thumbnail ?>
        </div>
        <div class="col-12 col-lg-7">
            <div class="row">
                <div class="col-12">
                    <h3 class = "title"><?= $title ?></h3>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <p class = "excerpt"><?= $excerpt ?></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <a class="btn btn-outline-primary" href='<?= $link ?>'>
                        Leggi di più
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
}


// Start the rendering of the page
get_header();

$blog_items = getBlogPosts();
?>

<div id="blog-thumbnails">
    <div class="outer-padding title-strip">
        <h1>Blog</h1>
    </div>

    <div class="outer-padding container blog-list">
        <?php
            $colored = false;
            while ($blog_items->have_posts()) {
                $blog_items->the_post();
                ?><?= get_tile(get_the_post_thumbnail(null, "post-title"), get_the_title(), get_the_excerpt(), get_permalink(), $colored)?><?
                $colored = !$colored;
            }
        ?>
    </div>
</div>

<?php
get_footer();
