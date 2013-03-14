<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php if(has_post_thumbnail()) : ?>
				<span class="entry-eyecatch">
					<?php the_post_thumbnail(array(700,250)); ?>
				</span>
			<?php endif; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php $root_post = get_root_page( $post ); ?>
<?php $slug = get_page_uri($root_post->ID); ?>
<?php if(in_array( $slug, array('recommend-iizaka','hito'))) : ?>
	<!-- サイドバー無し -->
<?php elseif(in_array( $slug, array('details','sightseeing','stay','join','event'))) : ?>
	<?php get_sidebar($slug); ?>
<?php else : ?>
	<?php get_sidebar('page'); ?>
<?php endif; ?>
<?php get_footer(); ?>