<?php defined( 'ABSPATH' ) || exit; ?>
<aside class="site-sidebar" aria-label="Thông tin bổ trợ">
	<section class="sidebar-module"><h2>Bài viết mới</h2><ol class="sidebar-post-list">
	<?php $sidebar_query_args = array( 'post_type' => 'post', 'posts_per_page' => 5, 'post_status' => 'publish', 'post__not_in' => is_single() ? array( get_the_ID() ) : array() ); if ( is_home() || is_front_page() ) $sidebar_query_args['offset'] = 1; $sidebar_recent = new WP_Query( $sidebar_query_args ); while ( $sidebar_recent->have_posts() ) : $sidebar_recent->the_post(); ?><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span><?php echo esc_html( get_the_date( 'j/n/Y' ) ); ?></span></li><?php endwhile; wp_reset_postdata(); ?>
	</ol></section>
	<section class="sidebar-module"><h2>Chuyên mục</h2><ul class="category-list">
	<?php foreach ( array( 'vi-mo', 'chung-khoan', 'kien-thuc-tai-chinh' ) as $sidebar_slug ) : $sidebar_term = get_category_by_slug( $sidebar_slug ); if ( ! $sidebar_term ) continue; ?><li><a href="<?php echo esc_url( get_category_link( $sidebar_term ) ); ?>"><span><?php echo esc_html( $sidebar_term->name ); ?></span><b><?php echo esc_html( $sidebar_term->count ); ?></b></a></li><?php endforeach; ?>
	</ul></section>
	<section class="sidebar-note"><p class="eyebrow">Góc kiến thức</p><p>Nội dung nhằm giúp bạn hiểu các khái niệm tài chính và đặt câu hỏi phân tích phù hợp.</p></section>
</aside>
