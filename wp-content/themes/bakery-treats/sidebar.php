<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Bakery Treats
 */

?>

<?php

if ( is_active_sidebar( 'sidebar-1' )) { ?>
	<aside id="secondary" class="widget-area sidebar-width">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
<?php } else { ?>
	<aside id="secondary" class="widget-area sidebar-width">
		<div class="default-sidebar">
			<aside id="search-3" class="widget widget_search">
	            <h2 class="widget-title"><?php esc_html_e('Search', 'bakery-treats'); ?></h2>
	            <form method="get" id="searchform" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		            <input placeholder="<?php esc_attr_e('Type here...', 'bakery-treats'); ?>" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		            <input type="submit" class="search-field" value="<?php esc_attr_e('Search...', 'bakery-treats');?>" />
		        </form>
	        </aside>
	        <aside id="categories-2" class="widget widget_categories">
	            <h2 class="widget-title"><?php esc_html_e('Categories', 'bakery-treats'); ?></h2>
	            <ul>
	                <?php
	                wp_list_categories(array(
	                    'title_li' => '',
	                ));
	                ?>
	            </ul>
	        </aside>
	        <aside id="pages-2" class="widget widget_pages">
	            <h2 class="widget-title"><?php esc_html_e('Pages', 'bakery-treats'); ?></h2>
	            <ul>
	                <?php
	                wp_list_pages(array(
	                    'title_li' => '',
	                ));
	                ?>
	            </ul>
	        </aside>
	        <aside id="archives-2" class="widget widget_archive">
	            <h2 class="widget-title"><?php esc_html_e('Archives', 'bakery-treats'); ?></h2>
	            <ul>
	            <?php
	            wp_get_archives(array(
	                'type' => 'postbypost',
	                'format' => 'html',
	            ));
	            ?>
	        </ul>
	       </aside>
	   </div>
	</aside>
<?php } ?>