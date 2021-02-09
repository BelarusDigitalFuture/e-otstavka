<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Clean_Commerce
 */

?>

<?php $args = array(
    'parent'   => 0,
    'orderby'           => 'ID',
    'order'             => 'ASC',
    'show_count'        => 1,
    'hide_empty'        => 0,
    'hierarchical'      => 0,
//			    'depth'             => 1,
//			    'number'            => 12,
    'taxonomy'   =>  'product_cat' // mention taxonomy here. 
    );
?>
<?php $categories = get_categories( $args ); ?>						

<div class="page__title-bar">
	<h3>Категории</h3>
	<div class="page__title-right">
		<div class="swiper-button-prev slider-thumbs__prev swiper-button-prev1 swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-disabled="true"></div>
		<div class="swiper-button-next slider-thumbs__next swiper-button-next1" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
	</div>
</div>
<div class="swiper-container slider-thumbs slider-init mb-20 s1 swiper-container-initialized swiper-container-horizontal" data-paginationtype="bullets" data-spacebetweenitems="10" data-itemsperview="auto">
	<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">	

	<? foreach ($categories as $category) {?>
	<?
		  // get the thumbnail id using the queried category term_id
	    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
	
	    // get the image URL
	    $image = wp_get_attachment_url( $thumbnail_id ); 
	  ?>
		<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--4h swiper-slide-active" style="margin-right: 10px;">
			<div class="slider-thumbs__icon"><a href="#" ><img src="<?=$image;?>" alt="" title=""></a></div>
			<div class="slider-thumbs__caption caption">
				<div class="caption__content">
					<h2 class="caption__title caption__title--centered"><a href="<?=get_category_link($category);?>" ><?=$category->name;?></a></h2>
				</div>
			</div>
		</div> 						
	<?}?>   
<!-- SLIDER THUMBS -->		
	</div>
	<div class="swiper-pagination slider-thumbs__pagination swiper-pagination1 swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
