<?php
/**
 * Spacious functions related to defining constants, adding files and WordPress core functionality.
 *
 * Defining some constants, loading all the required files and Adding some core functionality.
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menu() To add support for navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */


 


/* Direct Database Title to External URL */
function print_post_title() {
global $post;
$thePostID = $post->ID;
$post_id = get_post($thePostID);
$title = $post_id->post_title;
$perm = get_permalink($post_id);
$post_keys = array(); $post_val = array();
$post_keys = get_post_custom_keys($thePostID);

if (!empty($post_keys)) {
foreach ($post_keys as $pkey) {
if ($pkey=='external_url') {
$post_val = get_post_custom_values($pkey);
}
}
if (empty($post_val)) {
$link = $perm;
} else {
$link = $post_val[0];
}
} else {
$link = $perm;
}
echo '<h2><a href="'.$link.'" rel="bookmark" title="'.$title.'">'.$title.'</a></h2>';
}

// Order custom post types alphabetically
function owd_post_order( $query ) {
    if ( $query->is_post_type_archive( array( 'databases', 'toys' )) && $query->is_main_query() ) {
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'owd_post_order' );

// Order custom post types alphabetically on tax page
function custom_post_type_listings ( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
    	return;

	if ( is_tax( array( 'topic', 'organization', 'toy-category', 'age', 'brand', 'library-location', 'toy-tag' )) ) {
		$query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		return;
	}
}
add_action( 'pre_get_posts', 'custom_post_type_listings', 1 );



//Taxonomy dropdown
function click_taxonomy_dropdown($taxonomy) { ?>
	<form action="/" method="get">
	<select name="cat" id="cat" class="postform">
	<option value="-1">Choose one...</option>
	<?php
	$terms = get_terms($taxonomy);
	foreach ($terms as $term) {
		printf( '<option class="level-0" value="%s">%s</option>', $term->slug, $term->name );
	}
	echo '</select></form>';
	?>
<?php }

//Increase Number of Posts on Toys Custom Post Type Archive Page
function set_posts_per_page_for_toys_cpt( $query ) {
  if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'toys' ) ) {
    $query->set( 'posts_per_page', '100' );
  }
}
add_action( 'pre_get_posts', 'set_posts_per_page_for_toys_cpt' );