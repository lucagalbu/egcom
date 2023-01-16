To create the portfolioo type, add this to the theme

// Portfolio post type
function create_portfoliotype() {
    register_post_type( 'portfolio',
        array(
            'labels' => array(
                'name' => __( 'Portfolio' ),
                'singular_name' => __( 'Portfolio' )
            ),
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'portfolio'),
            'show_in_rest' => true,
			'taxonomies' => array( 'category' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_portfoliotype' );



The following css classes are necessary:

.blog_thumbnail{
	max-width: 533px;
	overflow: hidden;
}

.blog_thumbnail>a>img{
	transform: scale(1);
	transition: transform .3s ease-in-out;
}

.blog_thumbnail>a>img:hover{
	transform:scale(1.1);
}