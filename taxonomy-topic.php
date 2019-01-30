<?php
/**
 * Taxonomy Index
 */
?>

<?php get_header(); ?>

	<?php do_action( 'spacious_before_body_content' ); ?>

	<div id="primary">
		<div id="content" class="clearfix">
		

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
			<h5><ol class="breadcrumb">
	<li><a href="http://we247.org/info/">Research</a></li>
	<li><a href="http://we247.org/databases/">All Databases (A-Z)</a></li>
	<li class="active">Topic</li>
</ol>
</h5>
<br>
<br>
			<div class="well well-sm"><h2 class="page-title">
			<?php
			$current_term = get_queried_object ();
			$taxonomy = get_taxonomy($current_term->taxonomy);
			echo $taxonomy->label . ': ' . $current_term->name;
			?>
			</h2></div>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php get_template_part( 'navigation', 'archive' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>
				
			<?php endif; ?>

					<div class="well"><h5>Browse by topic:</h5>
				<?php
				//list terms in a given taxonomy
				$taxonomy = 'topic';
				$tax_terms = get_terms($taxonomy);
				?>
				<ul><p>
				<?php
				foreach ($tax_terms as $tax_term) {
				echo '' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a> | ';
			}
			?>
				</p></ul></div>

		</div><!-- #content -->


	</div><!-- #primary -->

	
	
	<?php spacious_sidebar_select(); ?>
	
	<?php do_action( 'spacious_after_body_content' ); ?>

<?php get_footer(); ?>