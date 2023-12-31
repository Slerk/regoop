<?php session_start();
include 'classes/DbhClass.php';
include 'classes/TopicViewModel.php';

?>
<!DOCTYPE HTML>
<html>
<head>
<title>The Calm Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--  jquery plguin -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- start gallery -->
	<script type="text/javascript" src="js/jquery.easing.min.js"></script>	
	<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
	<script type="text/javascript">
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			
			},
			
			hoverEffect: function () {
			
				// Simple parallax effect
				$('#portfoliolist .portfolio').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);				
			
			}

		};
		
		// Run the show!
		filterList.init();
			
	});	
	</script>
<!-- Add fancyBox main JS and CSS files -->
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>

</head>
<body>
<!-- start header -->
<div class="header_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<h1><a href="index.php"><img src="images/logo.png" alt=""/></a></h1>
		</div>
		<div class="h_right">
			<ul class="menu">
				<?php

                if (isset($_SESSION['login'])):

				?>
                <li><a href=""><?php echo $_SESSION['login'];?></a></li>

				<li class="active"><a href="index.php">Главная</a></li>
<!--				<li><a href="forms/regForm.php">Регистрация</a></li>-->
                    <li><a href="include/outUser.php">Выйти</a></li>
				<li><a href="portfolio.php">portfolio</a></li>
				<li><a href="contact.html">Контакт</a></li>
                <?php else: ?>

                <li class="active"><a href="index.php">Главная</a></li>
                <li><a href="forms/regForm.php">Регистрация</a></li>
                <li><a href="forms/auth.php">Вход</a></li>
                <li><a href="portfolio.php">portfolio</a></li>
                <li><a href="contact.html">Контакт</a></li>
        <?php endif; ?>
			</ul>
			<div id="sb-search" class="sb-search">
				<form>
					<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
					<input class="sb-search-submit" type="submit" value="">
					<span class="sb-icon-search"></span>
				</form>
			</div>
			<script src="js/classie.js"></script>
			<script src="js/uisearch.js"></script>
			<script>
				new UISearch( document.getElementById( 'sb-search' ) );
			</script>
			<!-- start smart_nav * -->
	        <nav class="nav">
	            <ul class="nav-list">
	                <li class="nav-item"><a href="index.html">Home</a></li>
	                <li class="nav-item"><a href="about.html">About</a></li>
	                <li class="nav-item"><a href="portfolio.php">Portfolio</a></li>
	                <li class="nav-item"><a href="blog.html">Blog</a></li>
	                <li class="nav-item"><a href="contact.html">Contact</a></li>
	                <div class="clear"></div>
	            </ul>
	        </nav>
	        <script type="text/javascript" src="js/responsive.menu.js"></script>
			<!-- end smart_nav * -->
		</div>
		<div class="clear"></div>
	</div>
	<div class="header_btm">
		<div class="h_left">
			<h2>Welcome Ladies & Gents to Calm Website.</h2>
			<h3>A theme more stylish than any other on themeforest</h3>
		</div>
		<div class="soc_icons">
			<h2>find us online </h2>
				<ul>
					<li><a class="icon1" href="#"></a></li>
					<li><a class="icon2" href="#"></a></li>
					<li><a class="icon3" href="#"></a></li>
					<li><a class="icon4" href="#"></a></li>
					<li><a class="icon5" href="#"></a></li>
					<div class="clear"></div>
				</ul>	
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<!-- start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<!-- start popup -->
		<div id="small-dialog" class="mfp-hide">
			<div class="pop_up">
			 	<h2>Lorem Ipsum is simply dummy text of the printing and industry</h2>
			 	<img src="images/zoom.jpg" title="image-name">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>
				<a class="btn" href="details.html">Read more</a>
			</div>
		</div>
		<!-- end popup -->
		<!-- start gallery  -->
			<div class="container">
					<ul id="filters" class="clearfix">
						<li><span class="filter active" data-filter="app card icon logo web">All</span></li> /
						<li><span class="filter" data-filter="app card logo">design</span></li> /
						<li><span class="filter" data-filter="card app web icon">branding</span></li> /
						<li><span class="filter" data-filter="icon web app">graphic</span></li> /
						<li><span class="filter" data-filter="logo app">animation</span></li> /
						<li><span class="filter" data-filter="web app card logo icon">illustration</span></li> /
						<li><span class="filter" data-filter="web app logo card">photography</span></li>
					</ul>
		<div id="portfoliolist">



            <?php
//
            $viewTopic = new TopicViewModel();
            $topics = $viewTopic->veiewTopic();
//            $viewTopic->veiewTopic();

            ?>
            <?php foreach ($topics as $topic) :?>
			<a class="" href="portfolio.php?id=<?=$topic['id'];?> ">
				<div class="portfolio logo1" data-cat="logo">
					<div class="portfolio-wrapper">
							<img src="images/pic1.jpg"  alt="Image 2" />
						<div class="label">
							<div class="label-text">
                                <?php
//
//                                $viewTopic = new TopicViewModel();
//                                $viewTopic->veiewTopic();

                                ?>
								<p class="text-title"><?=$topic['name_topic']?></p>
								<span class="text-category">Logo</span>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>
			</a>
            <?php endforeach; ?>


<!--			<a class="popup-with-zoom-anim" href="#small-dialog">-->
<!--				<div class="portfolio app" data-cat="app">-->
<!--					<div class="portfolio-wrapper">			-->
<!--							<img src="images/pic2.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">Visual Infography</p>-->
<!--								<span class="text-category">APP</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>		-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">-->
<!--				<div class="portfolio web" data-cat="web">-->
<!--					<div class="portfolio-wrapper">						-->
<!--							<img src="images/pic3.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">Sonor's Design</p>-->
<!--								<span class="text-category">Web design</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>				-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">-->
<!--				<div class="portfolio card" data-cat="card">-->
<!--					<div class="portfolio-wrapper">			-->
<!--							<img src="images/pic4.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">Typography Company</p>-->
<!--								<span class="text-category">Business card</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>	-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">	-->
<!--				<div class="portfolio app" data-cat="app">-->
<!--					<div class="portfolio-wrapper">-->
<!--							<img src="images/pic5.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">Weatherette</p>-->
<!--								<span class="text-category">APP</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>			-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">-->
<!--				<div class="portfolio card" data-cat="card">-->
<!--					<div class="portfolio-wrapper">			-->
<!--							<img src="images/pic6.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">BMF</p>-->
<!--								<span class="text-category">Business card</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>	-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">-->
<!--				<div class="portfolio card" data-cat="card">-->
<!--					<div class="portfolio-wrapper">			-->
<!--							<img src="images/pic7.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">Techlion</p>-->
<!--								<span class="text-category">Business card</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>	-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">-->
<!--				<div class="portfolio logo1" data-cat="logo">-->
<!--					<div class="portfolio-wrapper">			-->
<!--							<img src="images/pic8.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">KittyPic</p>-->
<!--								<span class="text-category">Logo</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>																																							-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">-->
<!--				<div class="portfolio app" data-cat="app">-->
<!--					<div class="portfolio-wrapper">			-->
<!--							<img src="images/pic9.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">Graph Plotting</p>-->
<!--								<span class="text-category">APP</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>		-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">												-->
<!--				<div class="portfolio web" data-cat="web">-->
<!--					<div class="portfolio-wrapper">						-->
<!--							<img src="images/pic10.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">Student Guide</p>-->
<!--								<span class="text-category">Web design</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>	-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">																-->
<!--				<div class="portfolio icon" data-cat="icon">-->
<!--					<div class="portfolio-wrapper">-->
<!--							<img src="images/pic11.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">Scoccer</p>-->
<!--								<span class="text-category">Icon</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>			-->
<!--			</a>-->
<!--			<a class="popup-with-zoom-anim" href="#small-dialog">																																																													-->
<!--				<div class="portfolio icon" data-cat="icon">-->
<!--					<div class="portfolio-wrapper">						-->
<!--							<img src="images/pic12.jpg"  alt="Image 2" />-->
<!--						<div class="label">-->
<!--							<div class="label-text">-->
<!--								<p class="text-title">3D Map</p>-->
<!--								<span class="text-category">Icon</span>-->
<!--							</div>-->
<!--							<div class="label-bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>		-->
<!--			</a>	-->
		</div>
	</div><!-- end container -->
	</div>
</div>
</div>
<div class="footer_bg">
<div class="wrap">
	<div class="footer">
		<div class="span_of_4">
			<div class="span1_of_4">
				<h4>about us</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry .....</p>
				<span>Address</span>
				<p class="top">500 Lorem Ipsum Dolor Sit,</p>
				<p>22-56-2-9 Sit Amet,</p>
				<p>USA</p>
				<p>Phone:(00) 222 666 444</p>
				<p>Fax: (000) 000 00 00 0</p>
				<div class="f_icons">
						<ul>
							<li><a class="icon2" href="#"></a></li>
							<li><a class="icon1" href="#"></a></li>
							<li><a class="icon3" href="#"></a></li>
							<li><a class="icon4" href="#"></a></li>
							<li><a class="icon5" href="#"></a></li>
						</ul>	
				</div>
			</div>
			<div class="span1_of_4">
				<h4>latest posts</h4>
				<span>Fusce scelerisque massa vitae</span>
				<p>25 april 2013</p>
				<span>Pellentesque bibendum ante</span>
				<p>15 march 2013</p>
				<span>Maecenas quis ipsum sed magna </span>
				<p>25 april 2013</p>
			</div>
			<div class="span1_of_4">
				<h4>latest comments</h4>
				<span class="bg">It is a long established fact that a reader will looking layout.</span>
				<span class="bg top">There are many variations of passages of Lorem Ipsum available words.</span>
				<span class="bg">It is a long established fact that a reader will looking layout.</span>
			</div>
			<div class="span1_of_4">
				<h4>flicker photostream</h4>
				<ul class="f_nav">
					<li><a href="#"><img src="images/f_pic1.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic2.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic3.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic4.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic5.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic6.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic7.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic8.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic9.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic10.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic11.jpg" alt=""> </a></li>
					<li><a href="#"><img src="images/f_pic12.jpg" alt=""> </a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="footer_top">
			<div class="f_nav1">
				<ul>
					<li><a href="index.html">home</a></li>
					<li><a href="about.html">about</a></li>
					<li><a href="portfolio.php">portfolio</a></li>
					<li><a href="blog.html">blog</a></li>
					<li><a href="index.html">features</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="copy">
				<p class="link"><span>© All rights reserved | Template by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
</div>
</body>
</html>