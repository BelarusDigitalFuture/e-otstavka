	</div>
</div>
<!-- PAGE END -->

<div id="bottom-toolbar" class="bottom-toolbar"><div class="bottom-navigation">
	 <div class="swiper-container-toolbar swiper-toolbar swiper-container-initialized swiper-container-horizontal">
		<div class="bottom-navigation__pagination"></div>
		<div class="bottom-navigation__more"><img src="/wp-content/themes/clean-commerce/img/more.svg" alt="" title=""></div>
		<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
		  <div class="swiper-slide swiper-slide-active" style="width: 1369px;">
			<ul class="bottom-navigation__icons">
			<li><a href="/"><img src="/wp-content/themes/clean-commerce/img/home.svg" alt="" title=""></a></li>
			<li><a href="#" class="open-panel" data-panel="right" data-arrow="left"><img src="/wp-content/themes/clean-commerce/img/user.svg" alt="" title=""></a></li>
			<li><a href="main.html"><img src="/wp-content/themes/clean-commerce/img/blocks.svg" alt="" title=""></a></li>		
			<li>
				<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
					<img src="/wp-content/themes/clean-commerce/img/cart.svg" alt="" title="">
					<div class="cart-count"><?=WC()->cart->get_cart_contents_count();?></div>
					<div class="cart-sum"><?= WC()->cart->get_cart_total();?></div>		
				</a>						
			</li>
			<li><a href="contact.html"><img src="/wp-content/themes/clean-commerce/img/contact.svg" alt="" title=""></a></li>
			
			</ul>
		  </div> 
		  <? /*
		  <div class="swiper-slide swiper-slide-next" style="width: 1369px;">
			<ul class="bottom-navigation__icons">
			<li><a href="blog.html"><img src="/wp-content/themes/clean-commerce/img/news.svg" alt="" title=""></a></li>
			<li><a href="photos.html"><img src="/wp-content/themes/clean-commerce/img/photos.svg" alt="" title=""></a></li>
			<li><a href="videos.html"><img src="/wp-content/themes/clean-commerce/img/video.svg" alt="" title=""></a></li>
			<li><a href="chat.html"><img src="/wp-content/themes/clean-commerce/img/chat.svg" alt="" title=""></a></li>
			<li><a href="#" data-popup="social" class="open-popup"><img src="/wp-content/themes/clean-commerce/img/love.svg" alt="" title=""></a></li>
			</ul>
		   </div>
		   */?>
		</div>
	  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
	</div>	  
</div>

<!-- Social Icons Popup -->
<div id="popup-social"> <div class="popup popup--centered popup--shadow popup--social">
      <div class="popup__close"><a href="#" class="close-popup keychainify-checked" data-popup="social"><img src="/wp-content/themes/clean-commerce/img/close.svg" alt="" title=""></a></div>
      <h2 class="popup__title">Share</h2>
      <nav class="social-nav">
		  <ul>
		  <li><a href="#" ><img src="/wp-content/themes/clean-commerce/img/twitter.svg" alt="" title=""><span>TWITTER</span></a></li>
		  <li><a href="#" ><img src="/wp-content/themes/clean-commerce/img/facebook.svg" alt="" title=""><span>FACEBOOK</span></a></li>
		  <li><a href="#" ><img src="/wp-content/themes/clean-commerce/img/instagram.svg" alt="" title=""><span>INSTAGRAM</span></a></li>
		  </ul>
      </nav>
</div></div>
 
<!-- Alert --> 
<div id="popup-alert"> <div class="popup popup--centered popup--shadow popup--alert">
      <div class="popup__close"><a href="#" class="close-popup keychainify-checked" data-popup="alert"><img src="/wp-content/themes/clean-commerce/img/close.svg" alt="" title=""></a></div>
      <div class="popup__icon"><img src="/wp-content/themes/clean-commerce/img/alert.svg" alt="" title=""></div>
      <h2 class="popup__title">Hey there !</h2>
      <p class="popup__text">This is an alert example. Creativity is breaking out of established patterns to look at things in a different way.</p>
</div></div>  

<!-- Notifications --> 
<div id="popup-notifications"></div>

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clean_Commerce
 */

	/**
	 * Hook - clean_commerce_action_after_content.
	 *
	 * @hooked clean_commerce_content_end - 10
	 */
	do_action( 'clean_commerce_action_after_content' );
?>

	<?php
	/**
	 * Hook - clean_commerce_action_before_footer.
	 *
	 * @hooked clean_commerce_add_footer_bottom_widget_area - 5
	 * @hooked clean_commerce_footer_start - 10
	 */
	do_action( 'clean_commerce_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - clean_commerce_action_footer.
	   *
	   * @hooked clean_commerce_footer_copyright - 10
	   */
	  do_action( 'clean_commerce_action_footer' );
	?>
	<?php
	/**
	 * Hook - clean_commerce_action_after_footer.
	 *
	 * @hooked clean_commerce_footer_end - 10
	 */
	do_action( 'clean_commerce_action_after_footer' );
	?>

<?php
	/**
	 * Hook - clean_commerce_action_after.
	 *
	 * @hooked clean_commerce_page_end - 10
	 * @hooked clean_commerce_footer_goto_top - 20
	 */
	do_action( 'clean_commerce_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
