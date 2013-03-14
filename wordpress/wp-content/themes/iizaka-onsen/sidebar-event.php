<?php
/**
 * サイドバー:参加する
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
		<ul id="page-children" class="acm-parent">
			<?php
				if($post->post_parent)
			  		$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->post_parent."&echo=0");
				else
			  		$children = wp_list_pages("sort_column=menu_order&title_li=&child_of=".$post->ID."&echo=0");
			  	if ($children) {
			?>
					<?php echo $children; ?>
			<?php } ?>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>sankasuru-campaign/">お知らせ</a></li>
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
  	</div><!-- #secondary -->
