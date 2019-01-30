<?php
/**
 * The template for displaying Archive page.
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
?>

<?php get_header(); ?>

	<?php do_action( 'spacious_before_body_content' ); ?>

	<div id="primary">
		<div id="content" class="clearfix">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
						<ol class="breadcrumb">
	<li><a href="http://we247.org/">Home</a></li>
<li><a href="https://we247.org/weplay">WEPlay Toy Library</a></li>
	<li><a href="http://we247.org/toys/">Toys (A-Z)</a></li>
</ol>
<br>
<br>
<br>
<h3 style="text-align: center;"><img src="https://we247.org/wp-content/uploads/2018/08/ToyLibraryLogo.png"/></h3>
	
			<div class="well"><h3 class="page-title">All Toys (A-Z)</h3><a href="#bottom">Start at Z</a> | <a href="#topic">Browse by Category</a> | <a href="#tag">Browse by Tag</a> | <a href="https://we247.org/weplay/">Browse</a> | <a href="#rules">Lending Rules</a></div>

<div class="intro">
<p>The WEPlay Toy Library Collection is designed to serve all families. The collection is comprised of many award winning toys for all ages. <a href="https://search.clevnet.org/client/en_US/clevnet/search/detailnonmodal/ent:$002f$002fSD_ILS$002f0$002fSD_ILS:7574802/one">View the status of the toys in the catalog.</a> If you'd like to place a hold on a toy, please call the library location listed below. <a href="https://we247.org/wp-content/uploads/2018/09/Toy-Library-Brochure-1.pdf">View the informational brochure to learn more.</a></p>
</div>
<hr>

			
		 <?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>
				

				<?php get_template_part( 'navigation', 'archive' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>
				
			<?php endif; ?>

			<a name="bottom"></a>
		<div class="well"><h5>Browse by category:</h5>
				<?php
				//list terms in a given taxonomy
				$taxonomy = 'toy-category';
				$tax_terms = get_terms($taxonomy);
				?>
				<ul><p>
				<?php
				foreach ($tax_terms as $tax_term) {
				echo '' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a> | ';
			}
			?>
				</p></ul></div><a name="topic">

				<div class="well"><h5>Browse by tag:</h5>
				<?php wp_tag_cloud( array( 'taxonomy' => 'toy-tag' ) ); ?></div><a name="tag">
<div class="well"><a href="https://we247.org/weplay/">View a Browsable List of All Categories</a></div>
<hr />

<h3 id="rules">WePlay Lending Rules</h3>
<ul>
<li>Toys are free for checkout to adult library card holders in good standing!</li>
<li>Toys can be checked out for 21 days.</li>
<li>A max of 3 toys can be charged out per card.</li>
<li>Toys must be returned to the checkout desk at the library they were checked out from.</li>
<li> Please do not put toys in the book drop.</li>
<li>Toys are nonholdable.</li>
<li>Toys are not renewable.</li>
<li>$0.10 per day will be charged for late returns.</li>
<li>Damaged toys or those missing pieces will incur fines.</li></ul>
<hr />

<h4>Documents</h4>
<a href="https://we247.org/wp-content/uploads/2018/09/Toy-Library-Brochure-1.pdf" rel="noopener" target="_blank">WePlay Informational Brochure</a> (PDF)


		</div><!-- #content -->
	</div><!-- #primary -->
	
	<?php spacious_sidebar_select(); ?>
	
	<?php do_action( 'spacious_after_body_content' ); ?>

<?php get_footer(); ?>