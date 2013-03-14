<?php
/**
 * NewpostCatch class
 **/
if ( !class_exists('NewpostCatch') ) {
	class NewpostCatch extends WP_Widget {
		/*** plugin variables ***/
		var $version = "1.0.9";
		var $pluginDir = "";
		
		/*** plugin structure ***/
		function NewpostCatch() {
			/** widget settings **/
			$widget_ops = array( 'description' => 'Thumbnails in new articles.' );
			
			/** widget actual processes **/
			parent::WP_Widget(false, $name = 'Newpost Catch', $widget_ops );
			
			/** plugin path **/
			if (empty($this->pluginDir)) $this->pluginDir = WP_PLUGIN_URL . '/newpost-catch';
			
			/** default thumbnail **/
			$this->default_thumbnail = $this->pluginDir . "/no_thumb.png";
			
			/** charset **/
			$this->charset = get_bloginfo('charset');
			
			/** print stylesheet **/
			add_action( 'wp_head', array(&$this, 'NewpostCatch_print_stylesheet') );
			
			/** activate textdomain for translations **/
			add_action( 'init', array(&$this, 'NewpostCatch_textdomain') );
		}
		
		/** plugin localization **/
		function NewpostCatch_textdomain() {
			load_plugin_textdomain ( 'newpost-catch', false, basename( rtrim(dirname(__FILE__), '/') ) . '/languages' );
		}
		
		/** plugin insert header stylesheet **/
		function NewpostCatch_print_stylesheet() {
			$css_path = ( @file_exists(TEMPLATEPATH.'/css/newpost-catch.css') ) ? get_stylesheet_directory_uri().'/css/newpost-catch.css' : plugin_dir_url( __FILE__ ).'style.css';
			echo "\n"."<!-- Newpost Catch ver".$this->version." -->"."\n".'<link rel="stylesheet" href="' . $css_path . '" type="text/css" media="screen" />'."\n"."<!-- End Newpost Catch ver".$this->version." -->"."\n";	
		}
		
		/**▼ create widget ▼**/
		function widget($args, $instance) {
			extract( $args );
			
			$title = apply_filters('NewpostCatch_widget_title', $instance['title']);
			$width = apply_filters('NewpostCatch_widget_width', $instance['width']);
			$height = apply_filters('NewpostCatch_widget_height', $instance['height']);
			$number = apply_filters('NewpostCatch_widget_number', $instance['number']);

			function no_thumb_image() {
				$set_img = '';
				ob_start();
				ob_end_clean();
				$output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches );
				$set_img = $matches[1][0];

				/* if not exist images */
				if( empty( $set_img ) )
				{
				$set_img = WP_PLUGIN_URL . '/newpost-catch' . '/no_thumb.png';
				}
				return $set_img;
			}
			
			echo $before_widget;
			
			if ( $title ) echo $before_title . $title . $after_title;
				query_posts("showposts=" . $number . "&ignore_sticky_posts=1" );

?>
<ul id="npcatch" >
<?php if( have_posts() ) : ?>
<?php while( have_posts() ) : the_post(); ?>
<li>
	<a href="<?php esc_attr( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>" >
		<?php if( has_post_thumbnail() ) { ?>
			<?php //\n . the_post_thumbnail( array( $width , $height ),array( 'alt' => $title_attr , 'title' => $title_attr )); ?>
			<?php
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id);
			$thumb_url = $thumb_url[0];
			?>
			<img src="<?php echo esc_attr( $thumb_url ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" alt="<?php esc_attr( the_title() ); ?>" title="<?php esc_attr( the_title() ); ?>"  />
		<?php } else { ?>
			<img src="<?php echo esc_attr( no_thumb_image() ); ?>"  width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" alt="<?php esc_attr( the_title() ); ?>" title="<?php esc_attr( the_title() ); ?>" />
		<?php } ?>
	</a>
	<div class="title"><a href="<?php esc_attr( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>"><?php esc_html( the_title() ); ?></a></div>
	<div class="date"><?php esc_html( the_time('[Y/m/d]' , '' , '' ) ); ?></div>
	<div class="excerpt"><?php esc_html( the_excerpt() ); ?></div>
</li>
<?php endwhile; ?>
<?php else : ?>
<p>no post</p>
<?php endif; wp_reset_query(); ?>
</ul>
<?php
			echo $after_widget;
		}
		/**▲ create widget ▲**/

		/** @see WP_Widget::update **/
		// updates each widget instance when user clicks the "save" button
		function update($new_instance, $old_instance) {
			
			$instance = $old_instance;
			
			$instance['title'] = ($this->magicquotes) ? htmlspecialchars( stripslashes(strip_tags( $new_instance['title'] )), ENT_QUOTES ) : htmlspecialchars( strip_tags( $new_instance['title'] ), ENT_QUOTES );
			$instance['width'] = is_numeric($new_instance['width']) ? $new_instance['width'] : 10;
			$instance['height'] = is_numeric($new_instance['height']) ? $new_instance['height'] : 10;
			$instance['number'] = is_numeric($new_instance['number']) ? $new_instance['number'] : 5;
			$instance['date']['active'] = $new_instance['date'];
			
			return $instance;
		}
		 
		/** @see WP_Widget::form **/
		function form($instance) {
			$title = esc_attr($instance['title']);
			$width = esc_attr($instance['width']);
			$height = esc_attr($instance['height']);
			$number = esc_attr($instance['number']);
			$defaults = array( 'date' => array( 'active' => false ) );
?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:' , 'newpost-catch'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" class="widefat" value="<?php echo $title; ?>" /></label>
			</p>
			<p>
			<?php _e('Thumbnail Size' , 'newpost-catch'); ?><br />
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:' , 'newpost-catch'); ?></label>
			<input id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" style="width:30px" value="<?php echo $width; ?>" /> px</label>
			<br />
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:' , 'newpost-catch'); ?></label>
			<input id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" style="width:30px;" value="<?php echo $height; ?>" /> px</label>
			</p>
			<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Showposts:' , 'newpost-catch'); ?></label>
			<input style="width:30px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></label> <?php _e('Posts', 'newpost-catch'); ?>
			</p>
			<p>
	                <input type="checkbox" class="checkbox" <?php echo ($instance['date']['active']) ? 'checked="checked"' : ''; ?> id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" /> <label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e('Display date', 'newpost-catch'); ?></label>
			</p>
			<p>
			<label><?php _e('Are you satisfied?' , 'newpost-catch'); ?></label>
				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fimamura.tetsuya&amp;width=226&amp;height=190&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23ccc&amp;stream=false&amp;header=true&amp;appId=352152184854708" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:226px; height:190px;" allowTransparency="true"></iframe>
			</p>
<?php
		}
	}
}
?>