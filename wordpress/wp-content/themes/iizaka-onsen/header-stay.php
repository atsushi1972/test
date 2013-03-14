<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 */

$page_contactus = get_page_by_path('contact');			//	お問い合わせページ情報取得
$page_privacypolicy = get_page_by_path('privacypolicy');	//	プライバシーポリシーページ情報取得
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
<!-- Google翻訳 -->
<meta name="google-translate-customization" content="9dfe97002fc981bf-b401ed7f695f3a6b-g6d08ae2f11bebde0-f"></meta>
<!-- //Google翻訳 -->
</head>

<body <?php
     if (is_page()) {
         $page = get_page(get_the_ID());
         $slug = $page->post_name;
         body_class("page-" . $slug);
     } else {
         body_class();
     }
?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=244556229013144";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="page" class="hfeed site">
	<a name="top"/>
	<div id="main-frame">
		<header id="masthead" class="site-header" role="banner">
			<hgroup>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
			<div id="main-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/logo.png" alt="飯坂温泉オフィシャルサイト"/></a></div>
			<div id="header-sub-panel">
				<div id="sub-title">福島市・飯坂温泉をまるっと楽しめるウェブマガジン</div>
				<!-- Google翻訳 -->
				<div id="google_translate_element"></div>
				<script type="text/javascript">
					function googleTranslateElementInit() {
					  new google.translate.TranslateElement({pageLanguage: 'ja', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
					}
				</script>
				<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
				<!--  //Google翻訳 -->
				<ul id="header-menu">
					<li id="header-menu-home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
					<li id="header-menu-contactus"><a href="<?php echo esc_url(get_permalink( $page_contactus->ID )); ?>">お問い合わせ</a></li>
					<li id="header-menu-privacypolicy"><a href="<?php echo esc_url(get_permalink( $page_privacypolicy->ID )); ?>">プライバシーポリシー</a></li>
				</ul>
			</div>
			<!-- 泊まろうねっと -->
			<div id="header-tomarou-net">
				<a href="#"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/head_tomarou_net.png" /></a>
			</div>
			<!-- ヘッダ画像 -->
			<div id="header-eye-catch-default">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2013/02/tomaru-header-image.png" />
			</div>
			
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #site-navigation -->
	
			<div class="breadcrumb">
			    <?php
			    if(function_exists('bcn_display'))
			    {
			    bcn_display();
			    }
			    ?>
			</div>
			
		</header><!-- #masthead -->
	
		<div id="main" class="wrapper">