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

	<div id="secondary" role="complementary">
		<img class="sightseeing-image" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2013/02/sightseeing-sidebar-01.jpg" />
		<?php 
		$places = array(
			array(
				'name' 			=> '栗子国際スキー場',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> 'スカイパーク',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> '文知摺観音',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> '古関裕而記念館',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> '福島県立美術館',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> '福島競馬場',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> '阿武隈川の白鳥',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> '福島市 民家園',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> '四季の里',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
			array(
				'name' 			=> 'アンナガーデン',
				'description' 	=> 'ここに簡単な説明文が入りますここに簡単な説明',
				'url'			=> '#',
				'map'			=> '#'
			),
		);
		$num=0;
		?>
		<?php foreach($places as $place ) : ?>
			<div class="sidebar-item">
				<h4 class="sidebar-item-title">
					<span class="sidebar-item-num"><?php echo ++$num; ?></span>
					<?php echo $place['name']; ?>
				</h4>
				<div class="sidebar-item-contents">
					<p class="sidebar-item-description">
						<?php echo $place['description']; ?>
					</p>
					<a class="sidebar-item-link" href="<?php echo $place['url'];?>">URL</a>
					<a class="sidebar-item-map"  href="<?php echo $place['map'];?>">MAP</a>
				</div>
			</div>
		<?php endforeach; ?>
		
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
		<!-- お問い合わせ -->
		<div class="sidebar-banner">
			<div class="banner-contact">
				<a href="<?php echo get_permalink_by_slug('contact'); ?>">
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/banner-contact-link.png" alt="お問い合わせ"/>
				</a>
			</div>
		</div>
	</div><!-- #secondary -->
