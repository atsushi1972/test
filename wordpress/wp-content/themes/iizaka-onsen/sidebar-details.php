<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<!-- 固定ページ 子ページリスト -->
		<ul id="page-children">
		<?php
			if($post->post_parent)
		  		$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->post_parent."&echo=0");
			else
		  		$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->ID."&echo=0");
		  	if ($children) {
		?>
				<?php echo $children; ?>
		<?php } ?>
			<li class="page_item"><a href="https://picasaweb.google.com/iizaka.onsen" target="_blank" >花のアルバム</a></li>
			<li class="page_item"><a href="http://picasaweb.google.com/iizakaphoto/" target="_blank" >飯坂温泉フォトコンテスト</a></li>
		</ul>
		
		<!-- ここがいいざか --> 
		<div class="sidebar-banner">
			<a href="<?php echo get_permalink_by_slug('recommend-iizaka'); ?>">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/sidebar-iizaka.png" alt="ここがいいざか"/>
			</a>
		</div>	
		<!-- 今月の人--> 
		<div class="sidebar-banner">
			<a href="<?php echo get_permalink_by_slug('hito'); ?>">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/banner-hito.jpg" alt="今月の人"/>
			</a>
		</div>
		<!-- ゆらり飯坂てくてくブック -->
		<div class="shiru-yurari" >
			<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/shiru-yurari.jpg" alt="ゆらり飯坂てくてくブック"/>
			<p>
				<span style="font-weight:bold;">ゆらり飯坂てくてくブック</span><br/>
				1冊100円（税込）で販売中<br/>
				飯坂歩きのお供に！
			</p>
		</div>
		<!-- お問い合わせ -->
		<div class="sidebar-banner">
			<div class="banner-contact">
				<a href="<?php echo get_permalink_by_slug('contact'); ?>">
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/banner-contact-link.png" alt="お問い合わせ"/>
				</a>
			</div>
		</div>
	</div><!-- #secondary -->
