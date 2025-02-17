<?php
/**
 * The template for displaying all single posts
 *
 * @package Bakery Treats
 */

get_header();
?>

<div class="container">
	<?php
	$bakery_treats_post_layout = get_theme_mod( 'bakery_treats_post_layout', 'layout-1' );

	if ( $bakery_treats_post_layout == 'layout-1' ) {
		?>
	<div class="main-wrapper">
		<main id="primary" class="site-main lay-width">
		
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'revolution/template-parts/content', get_post_format() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'bakery-treats' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'bakery-treats' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
				?>

				<?php 
				do_action('bakery_treats_related_posts');
				?>
				
				<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main>

		<?php
		get_sidebar();	?>
	</div>

	<?php
	} elseif ( $bakery_treats_post_layout == 'layout-2' ) {
		?>
	<div class="main-wrapper">
		<?php
		get_sidebar();	?>

		<main id="primary" class="site-main lay-width">
		
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'revolution/template-parts/content', get_post_format() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'bakery-treats' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'bakery-treats' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
				?>

				<?php 
				do_action('bakery_treats_related_posts');
				?>
				
				<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main>
	</div>
	<?php } ?>
</div>
<?php

get_footer();