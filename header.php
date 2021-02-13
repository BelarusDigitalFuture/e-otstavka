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
					<div class="user-details__thumb"><img src="<?=get_template_directory_uri();?>/img/avatar.jpg" alt="" title=""></div>
					<div class="user-details__title"><span>Hello</span> Patrick Vue</div>
				</div>
				<nav class="main-nav">
					<ul>
						<li class="subnav opensubnav"><img src="<?=get_template_directory_uri();?>/img/home.svg" alt="" title=""><span>Home Pages</span><i><img src="<?=get_template_directory_uri();?>/img/arrow-right.svg" alt="" title=""></i></li>
						<li><a href="main.html"><img src="<?=get_template_directory_uri();?>/img/checked.svg" alt="" title=""><span>Features</span></a></li>
						<li><a href="blog.html"><img src="<?=get_template_directory_uri();?>/img/news.svg" alt="" title=""><span>News</span></a></li>	
						<li><a href="shop.html"><img src="<?=get_template_directory_uri();?>/img/cart.svg" alt="" title=""><span>Shop</span></a></li>
						<li><a href="photos.html"><img src="<?=get_template_directory_uri();?>/img/photos.svg" alt="" title=""><span>Photos</span></a></li>
						<li><a href="videos.html"><img src="<?=get_template_directory_uri();?>/img/video.svg" alt="" title=""><span>Videos</span></a></li>
						<li><a href="chat.html"><img src="<?=get_template_directory_uri();?>/img/chat.svg" alt="" title=""><span>Chat</span><strong>3</strong></a></li>
						<li><a href="tabs-toggles.html"><img src="<?=get_template_directory_uri();?>/img/tabs.svg" alt="" title=""><span>Tabs &amp; Toggles</span></a></li>
						<li><a href="forms.html"><img src="<?=get_template_directory_uri();?>/img/form.svg" alt="" title=""><span>Forms</span></a></li>
						<li><a href="tables.html"><img src="<?=get_template_directory_uri();?>/img/tables.svg" alt="" title=""><span>Tables</span></a></li>
						<li><a href="contact.html"><img src="<?=get_template_directory_uri();?>/img/contact.svg" alt="" title=""><span>Contact</span></a></li>
						<li><a href="splash.html"><img src="<?=get_template_directory_uri();?>/img/user.svg" alt="" title=""><span>User login</span></a></li>
					</ul>
				</nav>
			</div>	
			<div class="swiper-slide swiper-slide-next" style="width: 1316px;">		
				<div class="subnav-header backtonav"><img src="<?=get_template_directory_uri();?>/img/arrow-left.svg" alt="" title=""><span>BACK</span></div>
				<nav class="main-nav">
				<ul>
					<li><a href="index.html"><b>01</b><span>Main design</span></a></li>
					<li><a href="index-website.html"><b>02</b><span>Mobile Website</span></a></li>
					<li><a href="index-shop.html"><b>03</b><span>Shop Design</span></a></li>
					<li><a href="index-food.html"><b>04</b><span>Food / Restaurant</span></a></li>
					<li><a href="index-medical.html"><b>05</b><span>Medical Clinic</span></a></li>
					<li><a href="index-beauty.html"><b>06</b><span>Beauty Center</span></a></li>
					<li><a href="index-music.html"><b>07</b><span>Music App</span></a></li>
					<li><a href="index-wedding.html"><b>08</b><span>Wedding Website</span></a></li>
					<li><a href="index-app.html"><b>09</b><span>Classic App</span></a></li>
					<li><a href="index-metro.html"><b>10</b><span>Metro Style</span></a></li>
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
			<div class="user-profile__thumb"><img src="<?=get_template_directory_uri();?>/img/avatar.jpg" alt="" title=""></div>
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
				<li><a href="forms.html"><img src="<?=get_template_directory_uri();?>/img/user.svg" alt="" title=""><span>My Account</span></a></li>
				<li><a href="contact.html"><img src="<?=get_template_directory_uri();?>/img/chat.svg" alt="" title=""><span>Messages</span><strong>3</strong></a></li>
				<li><a href="contact.html"><img src="<?=get_template_directory_uri();?>/img/love.svg" alt="" title=""><span>Favourites</span></a></li>
				<li><a href="contact.html"><img src="<?=get_template_directory_uri();?>/img/settings.svg" alt="" title=""><span>Settings</span></a></li>
				<li><a href="index.html"><img src="<?=get_template_directory_uri();?>/img/logout.svg" alt="" title=""><span>Logout</span></a></li>
			</ul>
		</nav>
	</div>  
</div>
<div class="panel-close panel-close--left"><img src="<?=get_template_directory_uri();?>/img/close.svg" alt="" title=""></div>
<div class="panel-close panel-close--right"><img src="<?=get_template_directory_uri();?>/img/close.svg" alt="" title=""></div>	

<div class="page page--main" data-page="shop">
	
	<header class="header header--page header--fixed">	
		<div class="header__inner">	
			<div class="header__icon header__icon--menu open-panel" data-panel="left" data-arrow="right"><span></span><span></span><span></span><span></span><span></span><span></span></div>
			<div class="header__logo header__logo--text"><a href="#" ><strong>Go</strong>Mobile</a></div>	
			<div class="header__icon header__icon--cart"><a href="cart.html" ><img src="<?=get_template_directory_uri();?>/img/cart.svg" alt="" title=""><span class="cart-items-nr">0</span></a></div>
                </div>
	</header>
	
	<!-- PAGE CONTENT -->
<div class="page page--main" data-page="intro-website">
	
	<!-- HEADER -->
	<header class="header header--page header--fixed">	
		<div class="header__inner">	
			<div class="header__icon header__icon--menu open-panel" data-panel="left" data-arrow="right"><span></span><span></span><span></span><span></span><span></span><span></span></div>
			<div class="header__logo header__logo--text"><a href="/">Ezhik.by</a></div>	
			<div class="header__icon open-panel" data-panel="right" data-arrow="left"><img src="<?=get_template_directory_uri();?>/img/white/user.svg" alt="" title=""></div>
                </div>
	</header>
		<!-- PAGE CONTENT -->
<div class="page__content page__content--with-header">	
	<div class="content-area">
		<h2 class="page__title">Что вы хотите заказать?</h2>			
		<?php get_template_part( 'template-parts/content', 'ajax-search' ); ?>