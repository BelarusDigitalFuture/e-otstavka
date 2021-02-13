<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<? //<ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>

<div class="swiper-container swiper-product slider-thumbs swiper-container-product slider-init mb-20 s0 swiper-container-initialized swiper-container-horizontal" data-paginationtype="bullets" data-spacebetweenitems="10" data-itemsperview="auto">
	<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
	
