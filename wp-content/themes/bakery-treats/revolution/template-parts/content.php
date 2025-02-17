<?php
/**
 * Template part for displaying posts
 *
 * @package Bakery Treats
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card-item card-blog-post">
		<!-- .TITLE & META -->
		<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) :

				if (is_singular()) {
					do_action('bakery_treats_breadcrumbs');
				}
				
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					$bakery_treats_enable_title = absint(get_theme_mod('bakery_treats_enable_blog_post_title', 1));
					if ($bakery_treats_enable_title == 1) {
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					}
				endif;

				// Check if is singular
				if ( is_singular() ) : ?>
					<div class="entry-meta">
						<?php
						bakery_treats_posted_on();
						bakery_treats_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php else : 
					$bakery_treats_blog_meta = absint(get_theme_mod('bakery_treats_enable_blog_post_meta', 1));
					if($bakery_treats_blog_meta == 1){ ?>
						<div class="entry-meta">
							<?php
							bakery_treats_posted_on();
							bakery_treats_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php }
				endif;

			endif;
			?>
		</header>
		<!-- .TITLE & META -->

		<!-- .IMAGE -->
		<?php if ( is_singular() ) : ?>
			<?php 
			$bakery_treats_blog_thumbnail = absint(get_theme_mod('bakery_treats_enable_single_post_image', 1));
			if ( $bakery_treats_blog_thumbnail == 1 ) { 
			?>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="card-media">
						<?php bakery_treats_post_thumbnail(); ?>
					</div>
				<?php } else {
					// Fallback default image
					$bakery_treats_default_post_thumbnail = get_template_directory_uri() . '/revolution/assets/image/Cafe-Au-Lait.png';
					echo '<img class="default-post-img" src="' . esc_url( $bakery_treats_default_post_thumbnail ) . '" alt="' . esc_attr( get_the_title() ) . '">';
				} ?>
			<?php } ?>
		<?php else : ?>
		<?php 
			$bakery_treats_blog_thumbnail = absint(get_theme_mod('bakery_treats_enable_blog_post_image', 1));
			if ( $bakery_treats_blog_thumbnail == 1 ) { 
			?>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="card-media">
						<?php bakery_treats_post_thumbnail(); ?>
					</div>
				<?php } else {
					// Fallback default image
					$bakery_treats_default_post_thumbnail = get_template_directory_uri() . '/revolution/assets/image/Cafe-Au-Lait.png';
					echo '<img class="default-post-img" src="' . esc_url( $bakery_treats_default_post_thumbnail ) . '" alt="' . esc_attr( get_the_title() ) . '">';
				} ?>
			<?php } ?>
		<?php endif; ?>
		<!-- .IMAGE -->

		<!-- .CONTENT & BUTTON -->
		<div class="entry-content">
			<?php
				if ( is_singular() ) :
					the_content();
				else :
					// Excerpt functionality for archive pages
					$bakery_treats_enable_excerpt = absint(get_theme_mod('bakery_treats_enable_blog_post_content', 1));
					if ($bakery_treats_enable_excerpt == 1) {
						echo "<p>".wp_trim_words(get_the_excerpt(), get_theme_mod('bakery_treats_excerpt_limit', 25))."</p>";
					}
					?>
					<?php // Check if 'Continue Reading' button should be displayed
					$bakery_treats_enable_read_more = absint(get_theme_mod('bakery_treats_enable_blog_post_button', 1));
					if ($bakery_treats_enable_read_more == 1) {
						if ( get_theme_mod( 'bakery_treats_read_more_text', __('Continue Reading....', 'bakery-treats') ) ) :
							?>
							<a href="<?php the_permalink(); ?>" class="btn read-btn text-uppercase">
								<?php echo esc_html( get_theme_mod( 'bakery_treats_read_more_text', __('Continue Reading....', 'bakery-treats') ) ); ?>
							</a>
							<?php
						endif;
					}?>
				<?php endif; ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bakery-treats' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<!-- .CONTENT & BUTTON -->

	</div>
</article><!-- #post-<?php the_ID(); ?> -->