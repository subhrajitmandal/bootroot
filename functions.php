<?php


function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'custom_css', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js() {

	global $wp_scripts;

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap_js'), '', true );

}
add_action( 'wp_enqueue_scripts', 'theme_js' );

if ( is_singular() ) wp_enqueue_script( "comment-reply" );

add_editor_style('css/editor-style.css');

//add_filter( 'show_admin_bar', '__return_false' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );

the_post_thumbnail(); // Without parameter ->; Thumbnail
the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
the_post_thumbnail( 'medium' ); // Medium resolution (default 300px x 300px max)
the_post_thumbnail( 'medium_large' ); // Medium-large resolution (default 768px x no height limit max)
the_post_thumbnail( 'large' ); // Large resolution (default 640px x 640px max)
the_post_thumbnail( 'full' ); // Original image resolution (unmodified)
the_post_thumbnail( array( 100, 100 ) ); // Other resolutions (height, width)


// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-featured', 780, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);


// Flush rewrite rules for custom post types.
add_action( 'after_switch_theme', 'bt_flush_rewrite_rules' );
// Flush your rewrite rules
function bt_flush_rewrite_rules() {
     flush_rewrite_rules();
}


function register_theme_menus() {
	register_nav_menus(
		array(
			'headermenu'	=> 'Header Menu'
		)
	);
}
add_action( 'init', 'register_theme_menus' );


// Sidebars & Widgetizes Areas
function bootstrap_register_sidebars() {
  register_sidebar(array(
  	'id' => 'sidebar1',
  	'name' => 'Main Sidebar',
  	'description' => 'Used on every page BUT the homepage page template.',
  	'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widgettitle">',
  	'after_title' => '</h4>',
  ));

} // don't remove this bracket!
add_action( 'widgets_init', 'bootstrap_register_sidebars' );


function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' =>  $name,
		'id' => $id,
		'description' => $description,
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );


?>
