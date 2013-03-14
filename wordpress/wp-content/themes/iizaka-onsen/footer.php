<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
		</div><!-- #main .wrapper -->
		<footer id="colophon" role="contentinfo">
			<div id="footer-links">
				|&nbsp;<a href="<?php echo get_permalink_by_slug('details'); ?>">知る</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('stay'); ?>">泊まる</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('taste'); ?>">食べる・飲む</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('join'); ?>">見る・楽しむ</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('event'); ?>">参加する</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('littlespa'); ?>">湯めぐり</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('sightseeing'); ?>">立ち寄る</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('town'); ?>">まちづくり</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('post'); ?>">お知らせ</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('recommend-iizaka'); ?>">ここがいいざか</a>&nbsp;|
				<br/>
				|&nbsp;<a href="<?php echo get_permalink_by_slug('contact'); ?>">お問い合わせ</a>&nbsp;|&nbsp;
				<a href="<?php echo get_permalink_by_slug('privacy'); ?>">プライバシーポリシー</a>&nbsp;|
			</div><!-- .footer-links-->
			<div class="site-info">
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #main-frame -->
	<div id="copy-right">
		飯坂温泉観光協会＆飯坂温泉旅館協同組合 福島県福島市飯坂町十綱町３番地 024-542-4241<br/>
		Copyright&copy;Iizakaonsen, All rights reserved.
	</div>
	<div id="to-top"><a href="#top"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/to-top.png" /></a></div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
