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
	<script type="text/javascript">
		var j$ = jQuery;
	
		j$(function(){
			j$(".acm-parent").each(function(){
				j$("li.has-child > a", this).each(function(index){
					var $this = j$(this);
	
					$this.next().hide();
	
					$this.click(function(){
						var params = {height:"toggle", opacity:"toggle"};
						j$(this).next().animate(params).parent().siblings()
							.children("ul:visible").animate(params);
						return false;
					});
				});
			});
		});
	</script>
	<div id="secondary" class="widget-area" role="complementary">
		<!-- 固定ページ 子ページリスト -->
		<ul id="page-children" class="acm-parent">
			<li><a href="<?php echo esc_html(get_permalink_by_slug('join/join02'));?>">旧堀切亭</a></li>
			<li><a href="<?php echo esc_html(get_permalink_by_slug('join/join03'));?>">飯坂温泉花ももの里</a></li>
			<li><a href="<?php echo esc_html(get_permalink_by_slug('join/join04'));?>">西根堰</a></li>
			<li class="has-child" ><a href="<?php echo esc_html(get_permalink_by_slug('join/join05'));?>">美術館(3)</a>
				<ul class="acm-child" >
					<?php echo wp_list_pages("sort_column=menu_order&title_li=&child_of=149&echo=0"); ?>
				</ul>
			</li>
			<li class="has-child" ><a href="<?php echo esc_html(get_permalink_by_slug('join/join06'));?>">名所旧跡(6)</a>
				<ul class="acm-child" >
					<?php echo wp_list_pages("sort_column=menu_order&title_li=&child_of=152&echo=0"); ?>
				</ul>
			</li>
			<li class="has-child" ><a href="<?php echo esc_html(get_permalink_by_slug('join/join07'));?>">神社仏閣(16)</a>
				<ul class="acm-child" >
					<?php echo wp_list_pages("sort_column=menu_order&title_li=&child_of=154&echo=0"); ?>
				</ul>
			</li>
			<li><a href="<?php echo esc_html(get_permalink_by_slug('join/join09'));?>">茂庭周辺</a></li>
			<li><a href="<?php echo esc_html(get_permalink_by_slug('join/join10'));?>">飯坂のくだもの</a></li>
			<li><a href="<?php echo esc_html(get_permalink_by_slug('join/fruits-owner'));?>">くだものの木オーナー制度</a></li>
			<li><a href="<?php echo esc_html(get_permalink_by_slug('join/fruits-owner/fruits-owner02'));?>">オーナー制度 果樹園</a></li>
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
		<!-- お問い合わせ -->
		<div class="sidebar-banner">
			<div class="banner-contact">
				<a href="<?php echo get_permalink_by_slug('contact'); ?>">
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/banner-contact-link.png" alt="お問い合わせ"/>
				</a>
			</div>
		</div>
				
		<!-- くだものの木オーナー制度 -->
		<div id="fruit-owner">
			<a href="<?php echo get_permalink_by_slug('kokoga_iizaka'); ?>">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/fruit_owner.jpg" alt="くだものの木オーナー制度"/>
			</a>
		</div>
	</div><!-- #secondary -->
