<?php
defined( 'ABSPATH' ) || exit;

function ban_tin_tai_chinh_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	register_nav_menus( array( 'primary' => 'Điều hướng chính' ) );
}
add_action( 'after_setup_theme', 'ban_tin_tai_chinh_setup' );

function ban_tin_tai_chinh_assets() {
	wp_enqueue_style( 'ban-tin-tai-chinh-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'ban_tin_tai_chinh_assets' );

function ban_tin_tai_chinh_archive_title( $title ) {
	if ( is_category() ) {
		return single_cat_title( '', false );
	}
	if ( is_tag() ) {
		return 'Nhãn: ' . single_tag_title( '', false );
	}
	if ( is_author() ) {
		return 'Tác giả: ' . get_the_author();
	}
	if ( is_year() ) {
		return 'Lưu trữ năm ' . absint( get_query_var( 'year' ) );
	}
	if ( is_month() ) {
		return 'Lưu trữ tháng ' . sprintf( '%02d/%04d', absint( get_query_var( 'monthnum' ) ), absint( get_query_var( 'year' ) ) );
	}
	if ( is_day() ) {
		return 'Lưu trữ ngày ' . absint( get_query_var( 'day' ) ) . '/' . absint( get_query_var( 'monthnum' ) ) . '/' . absint( get_query_var( 'year' ) );
	}
	return 'Lưu trữ bài viết';
}
add_filter( 'get_the_archive_title', 'ban_tin_tai_chinh_archive_title' );

function ban_tin_tai_chinh_placeholder_label() {
	$category = get_the_category();
	return $category ? $category[0]->name : 'Góc tài chính';
}

function ban_tin_tai_chinh_reading_time() {
	$word_count = preg_match_all( '/\S+/u', wp_strip_all_tags( get_the_content() ), $matches );
	return max( 1, (int) ceil( $word_count / 220 ) );
}

function ban_tin_tai_chinh_post_image( $size = 'large' ) {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( $size, array( 'loading' => 'lazy' ) );
		return;
	}
	printf(
		'<span class="placeholder" aria-hidden="true">%s</span>',
		esc_html( ban_tin_tai_chinh_placeholder_label() )
	);
}

function ban_tin_tai_chinh_category_url( $slug ) {
	$term = get_category_by_slug( $slug );
	return $term ? get_category_link( $term ) : home_url( '/' );
}

function ban_tin_tai_chinh_fallback_menu() {
	$categories = array(
		'Vĩ mô' => 'vi-mo',
		'Chứng khoán' => 'chung-khoan',
		'Kiến thức tài chính' => 'kien-thuc-tai-chinh',
	);
	foreach ( $categories as $label => $slug ) {
		$term = get_category_by_slug( $slug );
		if ( $term ) {
			echo '<li><a href="' . esc_url( get_category_link( $term ) ) . '">' . esc_html( $label ) . '</a></li>';
		}
	}
}
