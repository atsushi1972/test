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
		<a href="./hito"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/home-hito-03.jpg" alt="今月の人" style="max-width:350px;"/></a>
		<div id="whatsnew">
			<div id="whatsnew-title">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/home-oshirase.png">
			</div>
			<div id="whatsnew-list">
				<ul id="npcatch" >
					<?php 
					query_posts( array( 
						'showposts'=>5,
						'ignore_sticky_posts'=>1,
						'post_type' => array( 'post', 'tomaru-campaign', 'sankasuru-campaign' ),
					 ));
					?>
					<?php if( have_posts() ) : ?>
						<?php while( have_posts() ) : the_post(); ?>
							<li>
								<div class="content-image">
									<a href="<?php esc_attr( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>" >
										<img src="<?php echo catch_that_image(); ?>" alt="<?php esc_attr( the_title() ); ?>" title="<?php esc_attr( the_title() ); ?>"  />
									</a>
								</div>
								<div class="content-wrapper">
									<?php if( get_post_type()!='post' ) : ?>
										<?php 
											$objPostType=get_post_type_object( get_post_type() );
											switch($objPostType->name){
												case 'sankasuru-campaign':
													$cat_name="参加する";
													$slug="sanka";
													break;
												default: 
													$cat_name="泊まる";
													$slug="tomaru";
											}
										?>
										<div class="content-category <?php echo $slug; ?>">
											<?php echo $cat_name; ?>
										</div>
									<?php else : ?>
										<?php $category = get_the_category(); ?>
										<?php if(!empty($category)) : ?>
											<?php foreach( $category as $cat ) :	?>
												<div class="content-category <?php echo $cat->slug; ?>">
													<?php echo esc_attr($cat->name); ?>
												</div>
											<?php endforeach;?>
										<?php endif;?>	
									<?php endif;?>
									<div class="content-date"><?php esc_html( the_time('Y.m.d' , '' , '' ) ); ?></div>
									<div class="content-title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>"><?php esc_html( the_title() ); ?></a></div>
									<div class="content-excerpt"><?php esc_html( the_excerpt() ); ?></div>
								</div>
							</li>
						<?php endwhile; ?>
					<?php else : ?>
						<p>no post</p>
					<?php endif; wp_reset_query(); ?>
				</ul>
			</div><!--  whatsnew list -->
		</div><!-- what's new -->
		<div class="fb-like-box" data-href="http://www.facebook.com/iizakaonsen" data-width="350" data-show-faces="true" data-stream="false" data-header="true"></div>
		<a class="twitter-timeline" href="https://twitter.com/iizaka_onsen" data-widget-id="301994312760168448">@iizaka_onsen からのツイート</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
	</div><!-- #secondary -->
