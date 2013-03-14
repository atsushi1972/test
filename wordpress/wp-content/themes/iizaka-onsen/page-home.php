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

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		<div id="update-info">
			<h4>更新情報</h4>
			<?php
				$postslist = get_posts('post_type=page&numberposts=10');
				foreach( $postslist as $post ) :
					setup_postdata($post);
					$res = get_post_meta($post->ID,'new',true);
			?>
					<ul class="page-update-list">
						<li><?php the_time('Y年m月d日')?><span class="update-info-link"><a href="<?php the_permalink();?>"><?php the_title();?><?php if($res) echo esc_attr($res);
						?></a></span></li>
					</ul>
			<?php endforeach;?>
		</div>
	</div><!-- #primary -->

	<?php get_sidebar('home'); ?>

	<div id="home-footer">
		<div class="home-footer-row left">
			<div class="home-footer-img">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/home-logo-small.png" alt="飯坂温泉オフィシャルサイト"/>
			</div>
			<div class="home-footer-text">
				飯坂温泉観光協会＆飯坂温泉旅館協同組合<br/>
				（福島県知事登録旅行業第3－３２６号）<br/>
				〒960-0201 福島県福島市飯坂町十綱町３番地 <br/>
				TEL: 024-542-4241 FAX:024-542-4753<br/>
				このサイトのすべてのデータの著作権は、飯坂温泉観光協会にあります。再利用なさりたい場合にはご一報ください。
			</div>
		</div>
		<div class="home-footer-row right">
			<div class="home-footer-img">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/home-QR.png" alt="飯坂温泉オフィシャルサイト QRコード"/>
			</div>
			<div class="home-footer-text">
				携帯用QRコード<br/>
				左記のQRコードを<br/>
				対応の携帯用カメラで読み取り下さい。<br/>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>