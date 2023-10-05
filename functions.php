<?php
/**
 * featherstone functions and definitions
 *
 * @package featherstone
 */

/****************************************************/
/*                       Hooks                       /
/****************************************************/

/* Enqueue scripts and styles */
add_action('wp_enqueue_scripts', 'featherstone_scripts');

/* Add Menus */
add_action('init', 'featherstone_custom_menu');

/* Dashboard Config */
add_action('wp_dashboard_setup', 'featherstone_dashboard_widget');

/* Dashboard Style */
add_action('admin_head', 'featherstone_custom_fonts');

/* Remove Default Menu Items */
add_action('admin_menu', 'featherstone_remove_menus');

/* Change Posts Columns */
add_filter('manage_posts_columns', 'featherstone_manage_columns');

/* Reorder Admin Menu */
add_filter('custom_menu_order', 'featherstone_reorder_menu');
add_filter('menu_order', 'featherstone_reorder_menu');

/* Remove Comments Link */
add_action('wp_before_admin_bar_render', 'featherstone_manage_admin_bar');


/****************************************************/
/*                     Functions                     /
/****************************************************/

function featherstone_scripts() {

	wp_enqueue_style('featherstone-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);
	wp_enqueue_script('featherstone-core-js', get_template_directory_uri() . '/inc/js/compiled.js', array('jquery'), filemtime(get_stylesheet_directory() . '/inc/js/compiled.js'), true);
	wp_localize_script('featherstone-core-js', 'ajax_posts', array('ajaxurl' => admin_url('admin-ajax.php'),'noposts' => __('No older posts found', 'featherstonebarns'),
	));	
}


function featherstone_custom_menu() {
	register_nav_menus(array(
		'main-menu' => __( 'Main Menu' )
	));

	register_nav_menus(array(
		'hero-menu' => __('Hero Menu')
	));

	register_nav_menus(array(
		'mobile-menu' => __( 'Mobile Menu' )
	));

	register_nav_menus(array(
		'footer-menu' => __('Footer Menu')
	));
	register_nav_menus(array(
		'main-menu-right' => __('Main Menu Right')
	));
}

function featherstone_dashboard_widget() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'featherstone Support', 'featherstone_dashboard_help');
}

function featherstone_dashboard_help() {
	echo file_get_contents(__DIR__ . "/admin-settings/dashboard.html");
}

function featherstone_custom_fonts() {
	echo '<style type="text/css">' . file_get_contents(__DIR__ . "/admin-settings/style-admin.css") . '</style>';
}

if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function featherstone_remove_menus(){
	remove_menu_page( 'edit-comments.php' ); //Comments
}

function featherstone_manage_columns($columns) {
	unset($columns["comments"]);
	return $columns;
}

function featherstone_reorder_menu() {
    return array(
		'index.php',                        // Dashboard
		'separator1',                       // --Space--
		'edit.php',                         // Posts
		'edit.php?post_type=page',          // Pages
		'upload.php',                       // Media
		'separator2',                       // --Space--
		'themes.php',                       // Appearance
		'plugins.php',                      // Plugins
		'users.php',                        // Users
		'tools.php',                        // Tools
		'options-general.php',              // Settings
		'wpcf7',                            // Contact Form 7
   );
}

function featherstone_manage_admin_bar(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}

/* ADD CUSTOM RESPONSIVE IMAGE SIZES
================================================== */

function aw_custom_responsive_image_sizes($sizes, $size) {
  $width = $size[0];
  // blog posts
  if ( is_singular( 'post' ) ) {
    // half width images - medium size
    if ( $width === 600 ) {
      return '(min-width: 768px) 322px, (min-width: 576px) 255px, calc( (100vw - 30px) / 2)';
    }
    // full width images - large size
    if ( $width === 1024 ) {
      return '(min-width: 768px) 642px, (min-width: 576px) 510px, calc(100vw - 30px)';
    }
    // default to return if condition is not met
    return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
  }
  // default to return if condition is not met
  return '(max-width: ' . $width . 'px) 100vw, ' . $width . 'px';
}
add_filter('wp_calculate_image_sizes', 'aw_custom_responsive_image_sizes', 10 , 2);

 function manage_my_category_columns($columns)
{
 // only edit the columns on the current taxonomy
 if ( !isset($_GET['taxonomy']) || $_GET['taxonomy'] != 'category' )
 return $columns;

 // unset the description columns
 if ( $posts = $columns['description'] ){ unset($columns['description']); }

 return $columns;
}
add_filter('manage_edit-category_columns','manage_my_category_columns');

show_admin_bar(false);


function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyBrwBhBgG2pT95uWHcDmFF9WAIMMF4dNdw';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function my_theme_setup()
{
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_theme_setup');

add_action('after_setup_theme', 'silver_hero_image');
function silver_hero_image()
{
	add_image_size('hero-image', 1920); // 1920 pixels wide (and unlimited height)
}



function more_post_ajax()
{

	$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 2;
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

	header("Content-Type: text/html");

	$args = array(
		'suppress_filters' => true,
		'post_type' => 'post',
		'posts_per_page' => $ppp,
		'paged'    => $page,
	);

	$loop = new WP_Query($args);

	$out = '';

	if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();
			$out .= get_template_part("partials/blog_content");

		endwhile;
	endif;
	wp_reset_postdata();
	die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


function add_classes_to_linked_images($html)
{
	$classes = 'media-img'; // can do multiple classes, separate with space

	$patterns = array();
	$replacements = array();

	$patterns[0] = '/<a(?![^>]*class)([^>]*)>\s*<img([^>]*)>\s*<\/a>/'; // matches img tag wrapped in anchor tag where anchor tag has no existing classes
	$replacements[0] = '<a\1 class="' . $classes . '" data-fslightbox ><img\2></a>';

	$patterns[1] = '/<a([^>]*)class="([^"]*)"([^>]*)>\s*<img([^>]*)>\s*<\/a>/'; // matches img tag wrapped in anchor tag where anchor has existing classes contained in double quotes
	$replacements[1] = '<a\1class="' . $classes . ' \2"\3 data-fslightbox ><img\4></a>';

	$patterns[2] = '/<a([^>]*)class=\'([^\']*)\'([^>]*)>\s*<img([^>]*)>\s*<\/a>/'; // matches img tag wrapped in anchor tag where anchor has existing classes contained in single quotes
	$replacements[2] = '<a\1class="' . $classes . ' \2"\3 data-fslightbox ><img\4></a>';

	$html = preg_replace($patterns, $replacements, $html);

	return $html;
}

add_filter('the_content', 'add_classes_to_linked_images', 100, 1);

add_filter('the_content', function ($content) {
	//--Remove all inline styles --
	$content = preg_replace('/ style=("|\')(.*?)("|\')/', '', $content);
	return $content;
}, 20);

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

/*	
* Getting script tags
* Thanks http://wordpress.stackexchange.com/questions/54064/how-do-i-get-the-handle-for-all-enqueued-scripts
*/

// add_action( 'wp_print_scripts', 'wsds_detect_enqueued_scripts' );
// function wsds_detect_enqueued_scripts() {
// 	global $wp_scripts;
// 	foreach( $wp_scripts->queue as $handle ) :
// 		echo $handle . ' | ';
// 	endforeach;
// }

add_filter( 'script_loader_tag', 'wsds_defer_scripts', 10, 3 );
function wsds_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
    'cookie-law-info',
    'monsterinsights-frontend-script',
	'leadin-script-loader-js',
	'featherstone-core-js',
	);

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    
    return $tag;
} 


add_action( 'wp_head', 'theme_typekit_inline' );
function theme_typekit() {
	wp_enqueue_script( 'theme_typekit', '//use.typekit.net/lym5ipm.js', '', false);
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
<script>
try {
    Typekit.load({
        async: true
    });
} catch (e) {}
</script>
<?php }
}