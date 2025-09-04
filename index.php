<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wohl Reactions | Premium Skincare & Grooming</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>


	<div class="colorlib-loader"></div>

	<div id="page">
		<?php include 'header.php'; ?>

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/home_carousel/img_bg_1.png);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 offset-sm-3 text-center slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Men's</h1>
											<h2 class="head-2">Grooming</h2>
											<h2 class="head-3">Essentials</h2>
											<p class="category"><span>Discover the latest skincare & style</span></p>
											<p><a href="men.php" class="btn btn-primary">Shop Collection</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/home_carousel/img_bg_2.png);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 offset-sm-3 text-center slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Women's</h1>
											<h2 class="head-2">Beauty</h2>
											<h2 class="head-3">Collection</h2>
											<p class="category"><span>Explore the latest skincare & makeup trends</span></p>
											<p><a href="women.php" class="btn btn-primary">Shop Collection</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/home_carousel/img_bg_3.png);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 offset-sm-3 text-center slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">New</h1>
											<h2 class="head-2">Arrival</h2>
											<h2 class="head-3">Brands</h2>
											<p class="category"><span>Fresh grooming & beauty picks for men and women</span></p>
											<p><a href="men.php" class="btn btn-primary">Shop Collection</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="intro">It started with a simple idea: Create quality, well-designed products that I wanted myself.</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-product">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4 text-center">
						<div class="featured">
							<a href="shop.php?category=1" class="featured-img" style="background-image: url(images/home_category/men.png);"></a>
							<div class="desc">
								<h2><a href="#">Shop Men's Collection</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="featured">
							<a href="shop.php?category=2" class="featured-img" style="background-image: url(images/home_category/women.png);"></a>
							<div class="desc">
								<h2><a href="#">Shop Women's Collection</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="featured">
							<a href="shop.php?category=3" class="featured-img" style="background-image: url(images/home_category/kid.png);"></a>
							<div class="desc">
								<h2><a href="kid.php">Shop Kid's Collection</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="intro">Reviews</h2><br>
						<?php

						$view_feedback = $conn->query("SELECT * FROM tbl_feedback");
						while ($fetch = $view_feedback->fetch_array()) {


						?>
							<div class="about-wrap">
								<?php

								$uid = $fetch['user_id'];
								$city_name = "SELECT * FROM tbl_user WHERE id = $uid";
								$city_result = $conn->query($city_name);
								if (mysqli_num_rows($city_result) > 0) {
									$city_row = mysqli_fetch_array($city_result);
									$uname = $city_row["fullname"];
								}

								?>
								<h4><?php echo $uname; ?></h4>
								<p><?php echo $fetch['feedback'];  ?></p>

							</div>
						<?php
						}

						?>

					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- popper -->
	<script src="js/popper.min.js"></script>
	<!-- bootstrap 4.1 -->
	<script src="js/bootstrap.min.js"></script>
	<!-- jQuery easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<!-- <script>
		function myFunction() {
		   var element = document.body;
		   element.classList.toggle("dark-mode");
		}
		</script> -->
</body>

</html>