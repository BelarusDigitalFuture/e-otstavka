<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clean_Commerce
 */

get_header(); ?>

	
		<?php get_template_part( 'template-parts/content', 'categories' ); ?>						
	
		
		<?php // get_template_part( 'template-parts/content', 'featured-slider' ); ?>	
		
		<?php // get_template_part( 'template-parts/content', 'categories-slider' ); ?>						
		
		<?php // get_template_part( 'template-parts/content', 'featured' ); ?>	
		
		<a href="/shop" class="button button--green button--full mb-20">Все товары</a>	  		  	

<?php
	/**
	 * Hook - clean_commerce_action_sidebar.
	 *
	 * @hooked: clean_commerce_add_sidebar - 10
	 */
	do_action( 'clean_commerce_action_sidebar' );
?>

<?php get_footer(); ?>
