<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clean_Commerce
 */

?><?php
	/**
	 * Hook - clean_commerce_action_doctype.
	 *
	 * @hooked clean_commerce_doctype - 10
	 */
	do_action( 'clean_commerce_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - clean_commerce_action_head.
	 *
	 * @hooked clean_commerce_head - 10
	 */
	do_action( 'clean_commerce_action_head' );
	?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;800&amp;display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">	
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<!-- Overlay panel -->
<div class="body-overlay"></div>
<!-- Left panel -->
<div class="panels" id="panel-left">
	<div class="panel panel--left">
	      <!-- Slider -->
	     <div class="panel__navigation swiper-container-initialized swiper-container-horizontal">
	        <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
			<div class="swiper-slide swiper-slide-active" style="width: 1316px;">
				<div class="user-details">
					<div class="user-details__thumb"><img src="/wp-content/themes/clean-commerce/img/avatar.jpg" alt="" title=""></div>
					<div class="user-details__title"><span>Hello</span> Patrick Vue</div>
				</div>
				<nav class="main-nav">
					<ul>
						<li class="subnav opensubnav"><img src="/wp-content/themes/clean-commerce/img/home.svg" alt="" title=""><span>Home Pages</span><i><img src="/wp-content/themes/clean-commerce/img/arrow-right.svg" alt="" title=""></i></li>
						<li><a href="main.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/checked.svg" alt="" title=""><span>Features</span></a></li>
						<li><a href="blog.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/news.svg" alt="" title=""><span>News</span></a></li>	
						<li><a href="shop.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/cart.svg" alt="" title=""><span>Shop</span></a></li>
						<li><a href="photos.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/photos.svg" alt="" title=""><span>Photos</span></a></li>
						<li><a href="videos.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/video.svg" alt="" title=""><span>Videos</span></a></li>
						<li><a href="chat.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/chat.svg" alt="" title=""><span>Chat</span><strong>3</strong></a></li>
						<li><a href="tabs-toggles.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/tabs.svg" alt="" title=""><span>Tabs &amp; Toggles</span></a></li>
						<li><a href="forms.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/form.svg" alt="" title=""><span>Forms</span></a></li>
						<li><a href="tables.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/tables.svg" alt="" title=""><span>Tables</span></a></li>
						<li><a href="contact.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/contact.svg" alt="" title=""><span>Contact</span></a></li>
						<li><a href="splash.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/user.svg" alt="" title=""><span>User login</span></a></li>
					</ul>
				</nav>
			</div>	
			<div class="swiper-slide swiper-slide-next" style="width: 1316px;">		
				<div class="subnav-header backtonav"><img src="/wp-content/themes/clean-commerce/img/arrow-left.svg" alt="" title=""><span>BACK</span></div>
				<nav class="main-nav">
				<ul>
					<li><a href="index.html" class="keychainify-checked steem-keychain-checked"><b>01</b><span>Main design</span></a></li>
					<li><a href="index-website.html" class="keychainify-checked steem-keychain-checked"><b>02</b><span>Mobile Website</span></a></li>
					<li><a href="index-shop.html" class="keychainify-checked steem-keychain-checked"><b>03</b><span>Shop Design</span></a></li>
					<li><a href="index-food.html" class="keychainify-checked steem-keychain-checked"><b>04</b><span>Food / Restaurant</span></a></li>
					<li><a href="index-medical.html" class="keychainify-checked steem-keychain-checked"><b>05</b><span>Medical Clinic</span></a></li>
					<li><a href="index-beauty.html" class="keychainify-checked steem-keychain-checked"><b>06</b><span>Beauty Center</span></a></li>
					<li><a href="index-music.html" class="keychainify-checked steem-keychain-checked"><b>07</b><span>Music App</span></a></li>
					<li><a href="index-wedding.html" class="keychainify-checked steem-keychain-checked"><b>08</b><span>Wedding Website</span></a></li>
					<li><a href="index-app.html" class="keychainify-checked steem-keychain-checked"><b>09</b><span>Classic App</span></a></li>
					<li><a href="index-metro.html" class="keychainify-checked steem-keychain-checked"><b>10</b><span>Metro Style</span></a></li>
				</ul>
				</nav>
			</div>
		    </div>
		<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
	</div>
</div>
<!-- Right panel -->
<div id="panel-right" class="panels">
	<div class="panel panel--right">
		<div class="user-profile">
			<div class="user-profile__thumb"><img src="/wp-content/themes/clean-commerce/img/avatar.jpg" alt="" title=""></div>
			<div class="user-profile__name">Patrick Vue</div>
			<div class="buttons buttons--centered mb-20">
				<div class="info-box"><span>Followers</span> 25k</div>
				<div class="info-box"><span>Following</span> 9k</div>
				<div class="info-box"><span>Likes</span>1.5k</div>
			</div>
			<div class="buttons buttons--centered">
				<a href="#" class="button button--blue button--ex-small ml-10 keychainify-checked steem-keychain-checked">FOLLOW</a>
				<a href="#" class="button button--green button--ex-small ml-10 keychainify-checked steem-keychain-checked">MESSAGE</a>
			</div>
		</div>
		<nav class="main-nav">
			<ul>
				<li><a href="forms.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/user.svg" alt="" title=""><span>My Account</span></a></li>
				<li><a href="contact.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/chat.svg" alt="" title=""><span>Messages</span><strong>3</strong></a></li>
				<li><a href="contact.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/love.svg" alt="" title=""><span>Favourites</span></a></li>
				<li><a href="contact.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/settings.svg" alt="" title=""><span>Settings</span></a></li>
				<li><a href="index.html" class="keychainify-checked steem-keychain-checked"><img src="/wp-content/themes/clean-commerce/img/logout.svg" alt="" title=""><span>Logout</span></a></li>
			</ul>
		</nav>
	</div>  
</div>
<div class="panel-close panel-close--left"><img src="/wp-content/themes/clean-commerce/img/close.svg" alt="" title=""></div>
<div class="panel-close panel-close--right"><img src="/wp-content/themes/clean-commerce/img/close.svg" alt="" title=""></div>	

<div class="page page--main" data-page="shop">
	
	<header class="header header--page header--fixed">	
		<div class="header__inner">	
			<div class="header__icon header__icon--menu open-panel" data-panel="left" data-arrow="right"><span></span><span></span><span></span><span></span><span></span><span></span></div>
			<div class="header__logo header__logo--text"><a href="#" ><strong>Go</strong>Mobile</a></div>	
			<div class="header__icon header__icon--cart"><a href="cart.html" ><img src="/wp-content/themes/clean-commerce/img/cart.svg" alt="" title=""><span class="cart-items-nr">0</span></a></div>
                </div>
	</header>
	
	<!-- PAGE CONTENT -->
<div class="page page--main" data-page="intro-website">
	
	<!-- HEADER -->
	<header class="header header--page header--fixed">	
		<div class="header__inner">	
			<div class="header__icon header__icon--menu open-panel" data-panel="left" data-arrow="right"><span></span><span></span><span></span><span></span><span></span><span></span></div>
			<div class="header__logo header__logo--text"><a href="#">Ezhik.by</a></div>	
			<div class="header__icon open-panel" data-panel="right" data-arrow="left"><img src="/wp-content/themes/clean-commerce/img/user.svg" alt="" title=""></div>
                </div>
	</header>
		<!-- PAGE CONTENT -->
<div class="page__content page__content--with-header">	