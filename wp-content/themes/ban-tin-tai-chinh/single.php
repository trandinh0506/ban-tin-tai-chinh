<?php get_header(); ?><main class="site-main">
<?php while ( have_posts() ) : the_post(); ?><article <?php post_class( 'single-post' ); ?>>
	<div class="article-hero"><?php ban_tin_tai_chinh_post_image( 'large' ); ?></div><div class="eyebrow"><?php the_category( ' · ' ); ?></div><h1><?php the_title(); ?></h1>
	<p class="post-meta">Đăng ngày <?php echo esc_html( get_the_date( 'j/n/Y' ) ); ?> · Tác giả: <?php echo esc_html( get_the_author() ); ?> · <?php echo esc_html( ban_tin_tai_chinh_reading_time() ); ?> phút đọc</p>
	<?php if ( has_excerpt() ) : ?><p class="lead"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?><div class="entry-content"><?php the_content(); ?></div>
	<?php $related_category = get_the_category(); if ( $related_category ) : $related = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 2, 'cat' => $related_category[0]->term_id, 'post__not_in' => array( get_the_ID() ), 'post_status' => 'publish' ) ); if ( $related->have_posts() ) : ?><section class="related-posts"><h2>Bài viết liên quan</h2><div class="post-grid post-grid-compact"><?php while ( $related->have_posts() ) : $related->the_post(); get_template_part( 'template-parts/post', 'card' ); endwhile; ?></div></section><?php endif; wp_reset_postdata(); endif; ?>
</article><?php endwhile; ?></main><?php get_footer(); ?>
