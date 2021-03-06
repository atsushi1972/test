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
			<div class="page-stay-top-comment">
				飯坂温泉には飯坂温泉旅館協同組合の加盟店旅館が49軒が並んでいます。<br/>
				料金帯、収容人数、特長もそれぞれ。<br/>
				プランに合った宿がきっと見つかるはず！！
			</div>
			<div class="custom-post-list">
				<h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>tomaru-campaign/">お知らせ</a></h3>
				<?php 
					$q = new WP_Query(array('post_type'=>'tomaru-campaign','posts_per_page'=>5,'orderby'=>'date','order'=>'DESC'));
					if($q->have_posts()) :
				?>
					<ul>
					<?php while($q->have_posts()) : $q->the_post(); ?>
						<li>
							<div class="content-image">
								<a href="<?php esc_attr( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>" >
									<img src="<?php echo catch_that_image(); ?>" alt="<?php esc_attr( the_title() ); ?>" title="<?php esc_attr( the_title() ); ?>"  />
								</a>
							</div>
							<div class="content-wrapper">
								<div class="content-date"><?php esc_html( the_time('Y.m.d' , '' , '' ) ); ?></div>
								<div class="content-title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>"><?php esc_html( the_title() ); ?></a></div>
								<div class="content-excerpt"><?php echo mb_substr(get_the_excerpt(),11); ?></div>
								
							</div>
						</li>
					<?php endwhile;?>
					</ul>
				<?php else : ?>
					投稿がありません。
				<?php endif; ?>				
			</div>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('stay'); ?>
<?php get_footer(); ?>