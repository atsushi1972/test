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
			<div class="sidebar-banner">
				<div class="banner-contact">
					<a href="<?php echo get_permalink_by_slug('contact'); ?>">
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/banner-contact-link.png" alt="お問い合わせ"/>
					</a>
				</div>
			</div>
		</div><!-- #secondary -->
