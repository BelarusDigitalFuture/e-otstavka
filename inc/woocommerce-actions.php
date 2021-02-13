<?
	
add_action( 'woocommerce_subcategory_slider', 'subcategory_slider' );

function subcategory_slider() {
$category_current = get_queried_object();	
if (isset($category_current->parent)){
	 $parent = ($category_current->parent == 0 ? $category_current->term_id : $category_current->term_id);
}else {
	$parent = 0;
}
$args = array(
    'parent'   => $parent,
    'orderby'           => 'ID',
    'order'             => 'ASC',
    'show_count'        => 1,
    'hide_empty'        => 1,
    'hierarchical'      => 1,
			    'depth'             => 3,
//			    'number'            => 12,
    'taxonomy'   =>  'product_cat' // mention taxonomy here. 
    );

$categories = get_categories( $args );?>


<div class="swiper-container swiper-categories slider-thumbs slider-init mb-20 swiper-container-initialized swiper-container-horizontal" data-paginationtype="bullets" data-spacebetweenitems="10" data-itemsperview="auto">
	<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">	
	<? foreach ($categories as $category) {?>
	<?
		// get the thumbnail id using the queried category term_id
	    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 	
	    // get the image URL
	    $image = wp_get_attachment_url( $thumbnail_id ); 
	  ?>
		<div class="swiper-slide slider-thumbs__slide slider-thumbs__slide--custom swiper-slide-active<?=($category_current->term_id == $category->term_id ? " current-category" : "");?>" style="margin-right: 10px;">
			<div class="slider-thumbs__icon">
			<div class="slider-thumbs__caption caption">
				<div class="caption__content">
					<h2 class="caption__title caption__title--centered"><a href="<?=get_category_link($category);?>"><?=$category->name;?></a></h2>
				</div>
			</div>
		</div>
			
		</div> 						
	<?}?>   
<!-- SLIDER THUMBS -->		
	</div>
	<div class="swiper-pagination slider-thumbs__pagination swiper-pagination1 swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
<?
}	

add_action( 'woocommerce_product_slider', 'product_slider' );

function product_slider($product) {
?>
<div <?php wc_product_class( 'swiper-slide slider-thumbs__slide slider-thumbs__slide--1h swiper-slide-active', $product ); ?> style="margin-right: 10px;">
	<div class="slider-thumbs__image"><a href="<?=get_permalink( $product->get_id() );?>" ><?=$product->get_image();?></a><span class="slider-thumbs__price"><?=$product->get_price_html();?></span>
		<div class="slider-thumbs__more">
			<?
				/**
				 * Hook: woocommerce_after_shop_loop_item.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );
			?>
			
		</div>
		<div class="slider-thumbs__caption caption">
			<div class="caption__content">
				<h2 class="caption__title"><a href="<?=get_permalink( $product->get_id() );?>" ><?=$product->get_name();?></a></h2>
			</div>
		</div>
	</div>
	
</div> 			
			
<?		
}

add_action( 'woocommerce_products_slider_last_slide', 'products_slider_last' );

function products_slider_last($link) {
?>	
<div class="swiper-slide last-slide slider-thumbs__slide slider-thumbs__slide--1h swiper-slide-active" style="margin-right: 10px;">
	<a href="<?=$link;?>">
		<img src="<?=get_template_directory_uri();?>/img/right.svg">
		<h2 class="caption__title">Ежё товары</h2>
	</a>	
</div>	
	<?
	
}
	

add_action( 'woocommerce_products_slider', 'products_slider' );

function products_slider() {
	
	wp_enqueue_style('main-styles', get_template_directory_uri() . '/css/product.css', array(), filemtime(get_template_directory() . '/css/product.css'), false);
	$category_current = get_queried_object();
	if (isset($category_current->term_id)){		 
		 $parent = ($category_current->parent == 0 ? $category_current->term_id : $category_current->term_id);
	}else {
		$parent = 0;
	}
		$args = array(
		    'parent'   => $parent ,
		    'orderby'           => 'ID',
		    'order'             => 'ASC',
		    'show_count'        => 1,
		    'hide_empty'        => 1,
		    'hierarchical'      => 0,
		//			    'depth'             => 1,
		//			    'number'            => 12,
		    'taxonomy'   =>  'product_cat' // mention taxonomy here. 
		    );
		
		$categories = get_categories( $args );
		    if ( $categories ) {
		        foreach ( $categories as $category ) {
		        	?><div class="category-outer"><div class="category-title"><h2><?=$category->name;?></h2></div><div class="category-all"><a href="<?=get_category_link($category->term_id);?>">Все</a></div></div><?
		            $products = new WP_Query( array(
		                'post_type' => 'product',
		                'product_cat' => $category->slug,
		                
		            ) );
		            woocommerce_product_loop_start();
		            if ( $products->have_posts() ) {
						while ( $products->have_posts() ) : 
							
							$products->the_post();
							wc_get_template_part( 'content', 'product-slider' );
							
						endwhile;
	
						if($category->count > 10){
							do_action( 'woocommerce_products_slider_last_slide', get_category_link($category->term_id) );	
						}
					} else {
						echo __( 'No products found' );
					}
					woocommerce_product_loop_end();
					wp_reset_postdata();
					
		            
		        };
		        
		        
		    }
		    else {
			    if (isset($category_current->slug)){
				    $terms = $category_current->slug;
			    }else {
				    $terms = "*";
			    }
			    $products = new WP_Query( array(
		                'post_type' => 'product',
		                /*
		                'tax_query' => array(
		                    array(
		                        'taxonomy' => 'product_cat',
		                        'field' => 'slug',
		                        'terms' => $terms,
		                    ),
		                ) 
		                */
		            ) );
		            if ( $products->have_posts() ) {
		            	wc_get_template_part( 'content', 'product-loop-start' );
		                
		                while ( have_posts() ) {
							the_post();
				
							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );
				
							wc_get_template_part( 'content', 'product' );
						}
						
						wc_get_template_part( 'content', 'product-loop-end' );							
						
		                wp_reset_postdata();
		            };
		            
		    }

	
	
}	
	

add_action( 'woocommerce_product', 'product_card' );

function product_card($product) {
?>
	
	<div <?php wc_product_class( 'card', $product ); ?>>
	  <div class="card__product"><a href="<?=get_permalink( $product->get_id() );?>"><?=$product->get_image();?></a> <div class="card__price"><?=$product->get_price_html();?></div></div>
	  <div class="card__details">
		  <h4 class="card__title"><a href="<?=get_permalink( $product->get_id() );?>"><?=$product->get_name();?></a></h4>
	  </div>
	  <div class="card__more">
		  <?
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
		?>
	  </div>
	</div>	  			
			
<?		
}	