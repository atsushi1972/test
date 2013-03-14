<?php
/**
 * 「泊まる」一覧ページ
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

<?php get_sidebar('mirutanoshimu'); ?>
<?php get_footer(); ?>