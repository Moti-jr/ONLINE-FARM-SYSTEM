<?php
session_start();

?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include("index pages/links.php") ?>
	<title>INDEX</title>
</head>
<style>
	.search-box {
		display: inline-block;
		position: relative;
	}

	.result {
		position: absolute;
		z-index: 999;
		top: 100%;
		left: 0;
	}

	.result p {
		margin: 0;
		padding: 7px 10px;
		border: 1px solid #cccccc;
		border-top: none;
		cursor: pointer;
		background-color: #f2f2f2;
		color: black;
		width: 200px;
	}

	.result p:hover {
		background-color: antiquewhite;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('.search-box input[type="text"]').on("keyup input", function() {
			/* Get input value on change */
			var inputVal = $(this).val();
			var resultDropdown = $(this).siblings(".result");
			if (inputVal.length) {
				$.get("backend-search.php", {
					term: inputVal
				}).done(function(data) {
					// Display the returned data in browser
					resultDropdown.html(data);
				});
			} else {
				resultDropdown.empty();
			}
		});

		// Set search input value on click of result item
		$(document).on("click", ".result p", function() {
			$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
			$(this).parent(".result").empty();
		});
	});
</script>

<body>
	<div class="container-fluid mt-1" style="background-color:rgb(220, 220, 220);">

		<?php include("navbar1.php") ?>
		<nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color: green;">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active mr-3">
					<a class="nav-link" href="home.php"><i class="fa fa-home" aria-hidden="true"></i> <span class="d-lg-inline d-md-inline d-none">Home</span> </a>
				</li>
				<li class="nav-item active  mr-3">
					<a class="nav-link" href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> <span class="d-lg-inline d-md-inline d-none">About</span></a>
				</li>
				<!-- <li class="nav-item active  mr-3">
					<a class="nav-link" href="#"><i class="fa fa-server" aria-hidden="true"></i> <span
							class="d-lg-inline d-md-inline d-none">Services</span></a>
				</li>
				<li class="nav-item active  mr-3">
					<a class="nav-link" href="#"> <i class="fa fa-address-book" aria-hidden="true"></i> <span
							class="d-lg-inline d-md-inline d-none">Blog</span></a>
				</li>
				<li class="nav-item active  mr-3">
					<a class="nav-link" href="#"><i class="fa fa-clone" aria-hidden="true"></i> <span
							class="d-lg-inline d-md-inline d-none">Pages</span></a>
				</li>
				<li class="nav-item active  mr-3">
					<a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i> <span
							class="d-lg-inline d-md-inline d-none">Contact Us</span></a>
				</li> -->
				<li class="nav-item active">
					<a class="nav-link" href="#"><i class="fa fa-search d-lg-none d-md-inline d-sm-inline d-inline" aria-hidden="true"></i></a>
				</li>
				<form class="search-box  form-inline my-2 my-lg-0 ml-3">
					<input class="form-control mr-0" style="position: absolute;border-radius:15px;padding-left:3vw;" type="text" name="prod_name" autocomplete="off" placeholder="Search Product ...">
					<i class="fa fa-search" style="position: relative; font-size: 1.5em;margin-left:8px;margin-top:8px;" aria-hidden="true"></i>
					<div class="result mt-2"></div>
				</form>
				</li>
			</ul>
			<ul class=" navbar-nav ml-0 mt-2 mt-lg-0 pl-lg-5 ml-sm-0">
				<?php
				include("connect.php");
				$UserId = $_SESSION['Id'];
				$sql = "SELECT * FROM `users` WHERE `Id` =  '$UserId'";
				$result = mysqli_query($connection, $sql);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) { ?>
						<li class="nav-item active  mr-3" style="cursor:pointer;">
							<div class="position-relative">
								<a href="cart_info.php"><i class="fa fa-cart-plus fa-2x my-auto" style="color:white" aria-hidden="true"></i>
									<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light" id="cart_no">
										<?php
										include("connect.php");
										$sql = "SELECT * FROM `cart_info` WHERE `UserId` =  '$UserId'";
										$cart = mysqli_query($connection, $sql);
										$num = mysqli_num_rows($cart);
										echo $num;
										?>
									</span>
								</a>
							</div>
						</li>
						<li class="nav-item active  mr-sm-0 ml-3">
							<img src="Images/<?php echo $row['File'] ?>" alt="" style="width:40px;height:40px;border-radius:50%;box-shadow:2px 2px 10px;">
						</li>
						<li class="nav-item active  mr-sm-0 ml-3">
							<a href="logout.php">
								<button type="button" class="btn btn-primary">Logout</button>
							</a>
						</li>
				<?php }
				}
				?>
			</ul>
		</nav>
		<!-- Modal -->
		<div class="jumbotron jumbotron-fluid mb-1" style="background-image: url(Images/background4.jpg);background-size:cover;background-repeat:no-repeat;">
			<div class="container mx-auto">
				<center>
					<h5 class="display-4 col-lg-6">Best Deals
						<span class="display-4" style="color:chocolate">Certified Organic Items</span>
					</h5>

					<p class="lead mt-5">
						<a class="btn btn-outline-success btn-lg" href="Jumbo action link" role="button" style="border-radius:20px;">Order Now</a>
					</p>
				</center>
			</div>
		</div>
		<div class="result" id="result" style="position: absolute; z-index:999;top:100%;left:0;">
		</div>
		<div class="header">
			<h5 class="mx-auto">Best Products</h5>
		</div>
		<?php include("product_list.php") ?>
	</div>
</body>

</html>