<?php defined( 'ABSPATH' ) || exit; ?>
<article <?php post_class( 'post-card' ); ?>>
	<a class="post-card-media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>"><?php ban_tin_tai_chinh_post_image( 'large' ); ?></a>
	<div class="post-card-content">
		<div class="eyebrow"><?php the_category( ' · ' ); ?></div>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="post-meta">Đăng ngày <?php echo esc_html( get_the_date( 'j/n/Y' ) ); ?> · Tác giả: <?php echo esc_html( get_the_author() ); ?> · <?php echo esc_html( ban_tin_tai_chinh_reading_time() ); ?> phút đọc</p>
		<?php the_excerpt(); ?>
	</div>
</article>
