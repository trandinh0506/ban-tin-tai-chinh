<?php get_header(); ?><main class="site-main">
<?php if ( have_posts() ) : ?><div class="archive-heading"><h1><?php echo is_search() ? 'Kết quả tìm kiếm' : 'Góc nhìn tài chính'; ?></h1></div><div class="post-grid">
	<?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/post', 'card' ); endwhile; ?></div><?php the_posts_pagination( array( 'screen_reader_text' => 'Điều hướng bài viết', 'prev_text' => 'Bài trước', 'next_text' => 'Bài tiếp theo' ) ); ?>
<?php else : ?><div class="empty-state"><h1>Chưa có bài viết</h1><p>Nội dung mới sẽ được cập nhật tại đây.</p></div><?php endif; ?></main><?php get_footer(); ?>
