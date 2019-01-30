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

	<?php 
	if( !is_single() ) {
	?>
	

<header class="entry-header">
	<h2 class="entry-title">
		<?php print_post_title() ?>

	</h2><!-- .entry-title --></header>
<div class="restriction">
				<?php echo get_the_term_list ( $post->ID, 'restriction', 'Access Restrictions: ', ', ', ''); ?>
				</div>

	<?php
	}
	?>

	<div class="entry-content clearfix">
		<?php
			the_excerpt();
		?>
	</div>

	<?php
	if ( 'databases' == get_post_type() ) { ?>
 
   
   <div class="taxonomies"> <div class="database-info">

				
				<div class="topic">
					<?php echo get_the_term_list ( $post->ID, 'topic', 'Topic: ', ', ', ''); ?>
				</div>

				</div></div>

			<?php } ?>	

<?php
if ( 'toys' == get_post_type() ) { ?>
<div class="panel panel-default">
  <div class="panel-body">

  <?php
	if ( has_post_thumbnail() ) { ?>
	<figure class="toy-small">
	<a href="<?php echo esc_url ( get_permalink () ) ?>" rel="bookmark">
		<?php
		the_post_thumbnail();
		?>
		</a>
	</figure><!-- .featured-image  -->
	<?php } ?>
   			<div class="toy-info"><div class="taxonomies">
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
   </div></div> </div></div> 
<?php } ?>


		
		

	<?php if ( 'post' == get_post_type() ) : ?>
		<footer class="entry-meta-bar clearfix">	        			
			<div class="entry-meta clearfix">
				<span class="by-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
				<span class="date"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_time() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
				<?php if( has_category() ) { ?>
	       		<span class="category"><?php the_category(', '); ?></span>
	       	<?php } ?>
				<?php if ( comments_open() ) { ?>
	       		<span class="comments"><?php comments_popup_link( __( 'No Comments', 'spacious' ), __( '1 Comment', 'spacious' ), __( '% Comments', 'spacious' ), '', __( 'Comments Off', 'spacious' ) ); ?></span>
	       	<?php } ?>
	       	<?php edit_post_link( __( 'Edit', 'spacious' ), '<span class="edit-link">', '</span>' ); ?>
				<span class="read-more-link"><a class="read-more" href="<?php the_permalink(); ?>"><?php echo of_get_option( 'spacious_read_more_text', __( 'Read more', 'spacious' ) ); ?></a></span>
			</div>
		</footer>
	<?php endif; ?>
	<?php
	do_action( 'spacious_after_post_content' );
   ?>
</article>

