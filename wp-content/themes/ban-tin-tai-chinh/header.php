<?php defined( 'ABSPATH' ) || exit; ?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<?php
$site_name = get_bloginfo( 'name' );
$site_description = get_bloginfo( 'description' );
if ( ! $site_name || 'My WordPress' === $site_name ) {
	$site_name = 'Bản tin Tài chính';
}
if ( ! $site_description || 'Just another WordPress site' === $site_description ) {
	$site_description = 'Phân tích kinh tế và kiến thức tài chính';
}
?>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
	<div class="top-strip"><div class="header-inner"><span>Phân tích kinh tế · Thị trường · Kiến thức tài chính</span><span>Thông tin mang tính giáo dục</span></div></div>
	<div class="header-inner">
		<div class="brand-lockup"><a class="brand-mark" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Trang chủ <?php echo esc_attr( $site_name ); ?>">BTTC</a><div>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $site_name ); ?></a></p>
			<p class="site-description"><?php echo esc_html( $site_description ); ?></p>
		</div></div>
		<form class="site-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"><label class="screen-reader-text" for="site-search-input">Tìm kiếm bài viết</label><input id="site-search-input" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Tìm kiếm bài viết"><button type="submit">Tìm</button></form>
	</div>
	<div class="nav-bar"><div class="header-inner"><nav class="main-navigation" aria-label="Điều hướng chính"><ul>
			<?php if ( has_nav_menu( 'primary' ) ) : wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'items_wrap' => '%3$s' ) ); else : ban_tin_tai_chinh_fallback_menu(); endif; ?>
		</ul></nav><a class="nav-home" href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a></div></div>
</header>
