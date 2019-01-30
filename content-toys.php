<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'spacious_before_post_content' ); ?>
	<div class="entry-content clearfix">
		<header class="entry-header">
		<h5><a href="http://we247.org/toys/"> < Back to List </a> </h5>
					<ol class="breadcrumb">
	<li><a href="http://we247.org/">Home</a></li>
<li><a href="https://we247.org/weplay">WEPlay Toy Library</a></li>
	<li><a href="http://we247.org/toys/">Toys (A-Z)</a></li>
</ol>
<br>
<br>
<div class="toy-id"><p><?php echo get_post_meta($post->ID, 'Toy ID', true); ?></p></div>
	<div class="toy-name">	<h1 class="entry-title"><?php print_post_title() ?></h1></div>
		
			
		<?php
	if ( has_post_thumbnail() ) { ?>
	<figure class="featured-image toy-medium">
		<?php
		the_post_thumbnail();
		?>
	</figure><!-- .featured-image  -->
	<p><a class="btn btn-primary btn-lg toy-button" href="https://search.clevnet.org/client/en_US/clevnet/search/detailnonmodal/ent:$002f$002fSD_ILS$002f0$002fSD_ILS:7574802/one" role="button">View Item Availability</a></p>
	
	<div class="toy-info-full"><div class="taxonomies">
			  <div class="age">
        <?php echo get_the_term_list( $post->ID, 'age', 'Age: ', ', ', '' ); ?>
    </div>
    <div class="toy-category">
        <?php echo get_the_term_list( $post->ID, 'toy-category', 'Category: ', ', ', '' ); ?>
    </div>
    <div class="brands">
        <?php echo get_the_term_list( $post->ID, 'brand', 'Brand: ', ', ', '' ); ?>
    </div>
		  <div class="library-location">
        <?php echo get_the_term_list( $post->ID, 'library-location', 'Location: ', ', ', '' ); ?>
    </div>
    <div class="toy-tag">
        <?php echo get_the_term_list( $post->ID, 'toy-tag', 'Tag: ', ', ', '' ); ?>
    </div>
</div></div>
	<?php } ?>

<div class="hold">
  <p>Toys are available on a first come first serve basis. Please call the owning library to confirm the item's availability.</p> 
	<p><strong>Willoughby Public Library</strong>: 440-942-3200 | <strong>Willowick Public Library</strong>: 440-943-4151</p></div>
 
		<?php 
			the_content();

			$spacious_tag_list = get_the_tag_list( '', '&nbsp;&nbsp;&nbsp;&nbsp;', '' );
			if( !empty( $spacious_tag_list ) ) {
				?>
				<div class="tags">
					<?php
					_e( 'Tagged on: ', 'spacious' ); echo $spacious_tag_list;
					?>
				</div>
				<?php
			}

			wp_link_pages( array( 
			'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'spacious' ),
			'after'             => '</div>',
			'link_before'       => '<span>',
			'link_after'        => '</span>'
      ) );
		?>

	

				

		</div>


 <h3><a href="http://we247.org/toys/"> < Back to List </a> </h3>
 
<hr>
	<?php
	do_action( 'spacious_after_post_content' );
   ?>
</article>

