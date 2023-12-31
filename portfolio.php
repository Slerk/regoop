<?php session_start();

include 'classes/DbhClass.php';
include 'classes/TopicViewModel.php';
//include 'classes/AddCartModel.php';

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>The Calm Website Template | Portfolio :: w3layouts</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--  jquery plguin -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
					<li><a href="index.php">Главная</a></li>
					<li><a href="forms/regForm.php">Регистрация</a></li>
					<li><a href="forms/auth.php">Вход</a></li>
					<li class="active"><a href="portfolio.html">portfolio</a></li>

					<li><a href="contact.html">contact</a></li>
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
						<li class="nav-item"><a href="index.php">Home</a></li>
						<li class="nav-item"><a href="about.html">About</a></li>
						<li class="nav-item"><a href="portfolio.html">Portfolio</a></li>
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
	</div>
</div>
<!-- start slider -->
<div class="slider_bg">
	<div class="wrap">
		<div class="slider">
			<h2>portfolio</h2>
			<h3>What we Think, latest news</h3>
		</div>
	</div>
</div>
<!-- start main -->
<div class="main_bg">
	<div class="wrap">
		<div class="main">
			<div class="content">
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
				<ul class="folio_list">
                    <?php

                    $posts = new TopicViewModel();
                    $takePost = $posts->viewPost();


                    ?>
                    <?php foreach ($takePost as $item):?>
					<li>
						<a class="popup-with-zoom-anim" href="secondBooks.php?id=<?=$item['id'];?> ">
							<img src="../img/<?=$item['img']?>"  alt="Image 2" />
						</a>
						<h3><?=$item['title']?></h3>
						<p class="para">There are many variations of passages of Lorem Ipsum available,</p>
						<a class="mt-3 btn btn-info cart"   href="productsBuy.php?prodId=<?=$item['id'];?> ">Купить</a>

					</li>
                    <?php endforeach; ?>

					<div class="clear"></div>
				</ul>

			</div>
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
						<li><a href="index.php">home</a></li>
						<li><a href="about.html">about</a></li>
						<li><a href="portfolio.html">portfolio</a></li>
						<li><a href="blog.html">blog</a></li>
						<li><a href="index.php">features</a></li>
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