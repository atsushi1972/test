<?php
// of course, I'm lazy.  So I just copied & modified wp-login.php :)

require( dirname(__FILE__).'/../../../wp-config.php' );

$action = 'login';
$errors = array();
$user_pass = $_POST['wordpress_password'];

nocache_headers();

header('Content-Type: '.get_bloginfo('html_type').'; charset='.get_bloginfo('charset'));

if ( defined('RELOCATE') ) { // Move flag is set
	if ( isset( $_SERVER['PATH_INFO'] ) && ($_SERVER['PATH_INFO'] != $_SERVER['PHP_SELF']) )
		$_SERVER['PHP_SELF'] = str_replace( $_SERVER['PATH_INFO'], '', $_SERVER['PHP_SELF'] );

	$schema = ( isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ) ? 'https://' : 'http://';
	if ( dirname($schema . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) != get_option('siteurl') )
		update_option('siteurl', dirname($schema . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) );
}


// Rather than duplicating this HTML all over the place, we'll stick it in function
function login_header($title = 'Login', $message = '') {
	global $errors, $error, $wp_locale;

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('name'); ?> &rsaquo; <?php echo $title; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('wpurl'); ?>/wp-admin/wp-admin.css?version=<?php bloginfo('version'); ?>" type="text/css" />
<?php if ( ('rtl' == $wp_locale->text_direction) ) : ?>
	<link rel="stylesheet" href="<?php bloginfo('wpurl'); ?>/wp-admin/rtl.css?version=<?php bloginfo('version'); ?>" type="text/css" />
<?php endif; ?>
	<!--[if IE]><style type="text/css">#login h1 a { margin-top: 35px; } #login #login_error { margin-bottom: 10px; }</style><![endif]--><!-- Curse you, IE! -->
	<script type="text/javascript">
		function focusit() {
			document.getElementById('wordpress_password').focus();
		}
		window.onload = focusit;
	</script>
<?php // do_action('login_head'); ?>
</head>
<body class="login">

<div id="login"><h1><a href="<?php echo apply_filters('login_headerurl', 'http://wordpress.org/'); ?>" title="<?php echo apply_filters('login_headertitle', __('Powered by WordPress')); ?>"><span class="hide"><?php bloginfo('name'); ?></span></a></h1>

<?php
	if ( !empty( $errors ) ) {
		if ( is_array( $errors ) ) {
			$newerrors = "\n";
			foreach ( $errors as $error ) $newerrors .= '	' . $error . "<br />\n";
			$errors = $newerrors;
		}

		echo '<div id="login_error">' . apply_filters('login_errors', $errors) . "</div>\n";
	}
} // End of login_header()


	$password = '';

	if ( $_POST && empty( $user_pass ) )
		$errors['user_pass'] = __('<strong>ERROR</strong>: The password field is empty.');

	// Some parts of this script use the main login form to display a message
	if ( $_GET['err'] ) $errors['err'] = $_GET['err'] ;

	login_header(__('Login'));
?>

<form name="loginform" id="loginform" action="login.php" method="post">
<h1>Password Required</h1>
	<p>
		<label><?php _e('Password:') ?><br />
		<input type="password" name="wordpress_password" id="wordpress_password" class="input" value="" size="20" tabindex="20" /></label>
<?php 
	if ( $_GET['destination'] ) echo '<input type="hidden" name="destination" value="' . $_GET['destination'] .'" />';
	if ( $_POST['destination'] ) echo '<input type="hidden" name="destination" value="' . $_POST['destination'] .'" />';
?>
	</p>
<?php do_action('login_form'); ?>
	<p class="submit">
		<input type="submit" name="submit" id="submit" value="<?php _e('Login'); ?> &raquo;" tabindex="100" />
		<input type="hidden" name="redirect_to" value="<?php echo attribute_escape($redirect_to); ?>" />
	</p>
</form>
</div>

</body>
</html>
