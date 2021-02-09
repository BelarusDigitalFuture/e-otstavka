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

<div class="cards cards--12 mb-20">			   
	<? foreach ($categories as $category) {?>
		<div class="category-card">				  
			  <div class="card__details">
				  <h4 class="card__title"><a href="<?=get_category_link($category);?>" ><?=$category->name;?></a></h4>
			  </div>				  
			  <div class="card__product">
				  <?
					  // get the thumbnail id using the queried category term_id
				    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
				
				    // get the image URL
				    $image = wp_get_attachment_url( $thumbnail_id ); 
				  ?>  
				  <a href="<?=get_category_link($category);?>" >
					  <img src="<?=$image;?>" alt="" title="">
				  </a> 
			  </div>				  
		  </div>
	<?}?>
   
  <div class="category-card">				  
	  <div class="card__details">
		  <h4 class="card__title"><a href="shop-details.html" >Burger Box</a></h4>
	  </div>				  
	  <div class="card__product">
		  <a href="shop-details.html" >
			  <img src="/wp-content/uploads/2021/01/fruits.svg" alt="" title="">
		  </a> 
	  </div>				  
  </div>
  <div class="category-card">				  
	  <div class="card__details">
		  <h4 class="card__title"><a href="shop-details.html" >Burger Box</a></h4>
	  </div>				  
	  <div class="card__product">
		  <a href="shop-details.html" >
			  <img src="/wp-content/uploads/2021/01/fruits.svg" alt="" title="">
		  </a> 
	  </div>				  
  </div>
  <div class="category-card">				  
	  <div class="card__details">
		  <h4 class="card__title"><a href="shop-details.html" >Burger Box</a></h4>
	  </div>				  
	  <div class="card__product">
		  <a href="shop-details.html" >
			  <img src="/wp-content/uploads/2021/01/fruits.svg" alt="" title="">
		  </a> 
	  </div>				  
  </div>
</div>

