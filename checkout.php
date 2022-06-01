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

	<div class="row mb-5 pl-3">
		<!-- Column to Display Items in the Cart -->
		<div class="col-lg-8 mt-1 mx-auto" style="box-shadow:1px 1px 10px">
			<?php
			$UserId = $_SESSION['Id'];
			include("connect.php");
			$sql = "SELECT * FROM `users` WHERE `Id` =  $UserId";
			$result = mysqli_query($connection, $sql);
			while ($personal_details = mysqli_fetch_assoc($result)) { ?>
				<div class="card text-dark bg-light mt-1">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-10">
								<h3 class="text mb-3" style="font-family: monospace; font-size:20px;font-weight:600"><i class="fa fa-user" aria-hidden="true"></i> CONTACT INFO</h3>
								<div class="name pl-4">
									<span class="text my-2" style="font-weight: 600;font-size:17px"> Name:</span>
									<?php echo $personal_details['Customer Name'] ?>
								</div>
								<div class="phone pl-4">
									<span class="text my-2" style="font-weight: 600;font-size:17px"> Phone:</span>
									<?php echo $personal_details['Phone Number'] ?>
								</div>
								<div class="phone pl-4">
									<span class="text my-2" style="font-weight: 600;font-size:17px"> Email:
									</span><?php echo $personal_details['Email'] ?>
								</div>
								<div class="phone pl-4">
									<span class="text my-2" style="font-weight: 600;font-size:17px"> Address:
									</span><?php echo $personal_details['Address'] ?>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="edit py-4" style="cursor:pointer;">
									<i class=" fa fa-edit fa-2x" aria-hidden="true" data-toggle="modal" data-target="#modelId"></i><!-- Button trigger modal -->

									<!-- Modal -->
									<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Update Personal Details</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="container-fluid">
														<div class="row">
															<div class="col-lg-6 mx-auto">
																<center><img src="images/logo2.jpg" alt="" style="width:70%; height:auto">
																</center>
															</div>
														</div>
														<form action="update_customer_info.php" method="post">
															<div class="row mb-4">
																<div class="col-lg-6">
																	<div class="input-group">
																		<div class="input-group-text" style="border-radius:0px; width:35px"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
																		<input type="text" value="<?php echo $personal_details['Email'] ?>" class="form-control" id="email" name="customer_email">
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="input-group">
																		<div class="input-group-text" style="border-radius:0px;width:35px;"><i class="fa fa-phone" aria-hidden="true"></i>
																		</div>
																		<input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $personal_details['Phone Number'] ?>" required>
																		<input type="text" name="customer_id" id="" value="<?php echo $personal_details['Id'] ?>" hidden>
																	</div>
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-lg-6">
																	<div class="input-group">
																		<div class="input-group-text" style="border-radius:0px; width:35px"> <i class="fa fa-user" aria-hidden="true"></i>
																		</div>
																		<input type="text" value="<?php echo $personal_details['Customer Username'] ?>" class="form-control" id="customer_username" name="customer_username">
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="input-group">
																		<div class="input-group-text" style="border-radius:0px;width:35px;"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
																		<input type="text" class="form-control" id="customer_address" name="customer_address" value="<?php echo $personal_details['Address'] ?>" required>
																	</div>
																</div>
															</div>
															<div class="row d-flex justify-content-around">
																<div class="col">
																	<button type="submit" class="btn btn-primary" style="float:right">Update User Details</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>

									<script>
										$('#exampleModal').on('show.bs.modal', event => {
											var button = $(event.relatedTarget);
											var modal = $(this);
											// Use above variables to manipulate the DOM

										});
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card text-dark bg-light mt-2">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-10">
								<h3 class="text mb-3" style="font-family: monospace; font-size:20px;font-weight:600"><i class="fa fa-car" aria-hidden="true"></i> ORDERING METHOD</h3>
								<div class="name pl-4">
									<span class="text my-2" style="font-weight: 600;font-size:17px">Type:</span> Pickup
								</div>
							</div>
							<div class="col-lg-2">
								<div class="edit py-4" style="cursor:pointer;">
									<i class=" fa fa-edit fa-2x" aria-hidden="true" data-toggle="modal" data-target="#transaction_method"></i>

									<!-- Modal -->
									<div class="modal fade" id="transaction_method" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-body">
													<div class="alert alert-warning" role="alert">
														<h4 class="alert-heading"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Pickup is the only Available
															Option. </h4>
														<p></p>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card text-dark bg-light mt-2 mb-2">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-10">
								<h3 class="text mb-3" style="font-family: monospace; font-size:20px;font-weight:600"><i class="fas fa-dollar-sign"></i> PAYMENT METHOD</h3>
								<div class="name pl-4">
									<span class="text my-2" style="font-weight: 600;font-size:17px">Type:</span> MPESA
								</div>
								<div class="row">
									<div class="col-lg-9">
										<div class="alert alert-warning alert-dismissible fade show mx-auto" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<strong>
												Make Payment of
												<?php
												$UserId = $_SESSION['Id'];
												// echo $UserId;

												$sql = "SELECT SUM(Amount)  as Amount FROM `cart_info` WHERE `UserId` = $UserId";
												$total = mysqli_query($connection, $sql);
												foreach ($total as $total) {
													$Total = (float)$total['Amount'];
													echo 'Ksh ' . $Total . '.00';
												}
												?>
											</strong>
										</div>
									</div>
									<div class="col-lg-2 py-auto" style="float:right;">
										<?php
										$UserId = $_SESSION['Id'];
										// echo $UserId;
										$sql = "SELECT SUM(Amount)  as Amount FROM `cart_info` WHERE `UserId` = $UserId";
										$total = mysqli_query($connection, $sql);
										foreach ($total as $total) {
											$Total = (float)$total['Amount']; ?>
											<a href="PHP-MPESA/MpesaProcessor.php?amount=<?php echo $Total ?>" class="btn btn-outline-success" style="box-shadow:2px 2px 10px green">checkout</a>
										<?php }
										?>
									</div>
								</div>
								<script>
									$(".alert").alert();
								</script>
								<div class="mpesa_div pt-3 mb-3" style="background-color: green; ">
									<center>
										<h5 style="background-color: white; color:green; width:60%">
											LIPA NA MPESA
										</h5>
										<h5 class="mb-2 text-white">PAYBILL NUMBER</h5>
										<div class="paybill_number " style="background-color: white; color:green; width:50%;height:auto">
											<div class="number">
												<span style="font-weight: 800; font-size:22px">1 7 4 3 7 9</span>
											</div>
										</div>
										<div class="paybill_footer pb-3" style="background-color: green;  width:100%;height:4px">
										</div>
									</center>
								</div>
								<form action="transaction.php" method="post" class="form mb-2">
									<div class="form-group">
										<label for="">ENTER THE VOUCHER CODE RECEIVED:</label>
										<input type="text" name="payment_voucher" id="" class="form-control" placeholder="" autocomplete="off" aria-describedby="helpId" required>
									</div>
									<input type="text" name="paid_by" id="" value="<?php echo $UserId ?>" hidden>
									<input type="text" name="Amount" id="" value="<?php echo $Total ?>" hidden>
									<input type="text" name="payment_date" id="" value="<?php echo date("l d/ m/Y") ?>" hidden>
									<?php
									$sql = "SELECT * FROM `cart` WHERE `customer_id` = '$UserId'";
									$result = mysqli_query($connection, $sql);
									if (mysqli_num_rows($result) > 0) {
										while ($row = mysqli_fetch_assoc($result)) { ?>
											<input type="text" name="cart_id" id="" value=" <?php echo $row['Id'] ?>" hidden>
									<?php }
									}
									?>
									<center><button type="submit" class="btn btn-primary d-block">SUBMIT</button>
									</center>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php }
			?>
		</div>

	</div>
</body>

</html>