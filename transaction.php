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
	<!-- <div class="container-fluid mt-1" style="background-color:rgb(220, 220, 220);">
		<div class="col-lg-6 d-none d-lg-block">
			<div class="d-inline-flex align-items-center">
				<a class="text-dark" href="">FAQs</a>
				<span class="text-muted px-2">|</span>
				<a class="text-dark" href="">Help</a>
				<span class="text-muted px-2">|</span>
				<a class="text-dark" href="">Support</a>
			</div>
		</div> -->
	<?php include("navbar1.php") ?>
	<nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color: green;">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active mr-3">
				<a class="nav-link" href="home.php"><i class="fa fa-home" aria-hidden="true"></i> <span class="d-lg-inline d-md-inline d-none">Home</span> </a>
			</li>
			<li class="nav-item active  mr-3">
				<a class="nav-link" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> <span class="d-lg-inline d-md-inline d-none">About</span></a>
			</li>
			<li class="nav-item active  mr-3">
				<a class="nav-link" href="#"><i class="fa fa-server" aria-hidden="true"></i> <span class="d-lg-inline d-md-inline d-none">Services</span></a>
			</li>
			<li class="nav-item active  mr-3">
				<a class="nav-link" href="#"> <i class="fa fa-address-book" aria-hidden="true"></i> <span class="d-lg-inline d-md-inline d-none">Blog</span></a>
			</li>
			<li class="nav-item active  mr-3">
				<a class="nav-link" href="#"><i class="fa fa-clone" aria-hidden="true"></i> <span class="d-lg-inline d-md-inline d-none">Pages</span></a>
			</li>
			<li class="nav-item active  mr-3">
				<a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i> <span class="d-lg-inline d-md-inline d-none">Contact Us</span></a>
			</li>
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
						<div class="position-relative" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa fa-cart-plus fa-2x my-auto" style="color:white" aria-hidden="true"></i>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light" id="cart_no">
								<?php
								include("connect.php");
								$sql = "SELECT * FROM `cart_info` WHERE `UserId` =  '$UserId'";
								$cart = mysqli_query($connection, $sql);
								$num = mysqli_num_rows($cart);
								echo $num;
								?>
							</span>
						</div>
					</li>
					<li class="nav-item active  mr-sm-0 ml-3">
						<img src="Images/<?php echo $row['File'] ?>" alt="" style="width:40px;height:40px;border-radius:50%;box-shadow:2px 2px 10px;">
					</li>
					<li class="nav-item active  mr-sm-0 ml-3">
						<button type="button" class="btn btn-primary">Logout</button>
					</li>
			<?php }
			}
			?>
		</ul>
	</nav>
	<div class="row">
		<?php
		$payment_voucher = $_POST['payment_voucher'];
		$paid_by = $_POST['paid_by'];
		$Amount = $_POST['Amount'];
		$payment_date = $_POST['payment_date'];
		$cart_id = $_POST['cart_id'];

		$sql = "SELECT * FROM `tblpayment` WHERE payment_voucher = '$payment_voucher'";
		$result = mysqli_query($connection, $sql);
		if (mysqli_num_rows($result) > 0) {
			$sql = "SELECT * FROM `cart_info`";
			if ($result = mysqli_query($connection, $sql)) {
				foreach ($result as $row) {
					$Id = $row['Id'];
					$UserId = $row['UserId'];
					$ProductId = $row['ProductId'];
					$cart_id = $row['cart_id'];
					$Price = $row['Price'];
					$Quantity = $row['Quantity'];
					$Amount = $row['Amount'];

					$sql = "INSERT INTO `cart_history`(`Id`, `UserId`, `ProductId`, `cart_id`, `Price`, `Quantity`, `Amount`) VALUES ('$Id','$UserId','$ProductId','$cart_id','$Price','$Quantity','$Amount')";
					if ($result = mysqli_query($connection, $sql)) {
						$sql = "DELETE FROM `cart_info`";
						if ($result = mysqli_query($connection, $sql)) {
		?>
							<div class="col-lg-6 mt-2 mx-auto bg-light">
								<div class="card-header text-white bg-success">
									<i class="fa fa-check" aria-hidden="true"></i> Transaction Successful
								</div>
								<div class="card-body">
									<h6 class="my-3">Payment Details</h6>
									<ul style="list-style:disc;">
										<li>Voucher Code: <?php echo $payment_voucher ?></li>
										<li>Amount:<?php echo $Amount ?> </li>
										<li>Payment Date: <?php echo $payment_date ?></li>
									</ul>
									<a href="checkout.php"><button type="button" class="btn btn-primary my-2 mx-auto d-block"> Print Receipt
											<i class="fa fa-angle-double-right" aria-hidden="true"></i></button></a>


								</div>
							</div>
			<?php } else {
						}
					} else {
						echo mysqli_error($connection);
					}
				}
			} else {
				echo mysqli_error($connection);
			}
			?>

		<?php } else { ?>
			<div class="col-lg-6 mt-2 mx-auto bg-light">
				<div class="card text-dark bg-light">
					<div class="card-header text-white bg-danger">
						<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Wrong Voucher Number
					</div>
					<div class="card-body">
						<h6 class="my-3">Please Check the Voucher code and resent the code</h6>
						<a href="checkout.php"><button type="button" class="btn btn-primary my-2"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Go Back </button></a>
					</div>
				</div>
			</div>
		<?php }
		?>
	</div>
</body>

</html>