<?php
session_start();

?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include("index pages/links.php") ?>
	<title>cart info</title>
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
		<div class="col-lg-7 mt-1" style="background-color:whitesmoke ;">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>

				<li class="breadcrumb-item active">Cart</li>
			</ol>
			<h5 class=" card-header" style="text-align: center;color:black;margin-right:0px;background-color:gainsboro">
				YOUR
				CART PRODUCT LIST</h5>
			<?php
			$UserId = $_SESSION['Id'];
			$sql = "SELECT ProductId FROM `cart_info` WHERE `UserId` = $UserId";
			$cart = mysqli_query($connection, $sql);
			if (mysqli_num_rows($cart) > 0) { ?>
				<table class="table table-hover table-inverse table-responsive-lg" style="font-weight: 500;" style="overflow-y:hidden ;">
					<thead class="thead-inverse">
						<tr>
							<th class="col-lg-2 col-md-2 col-sm-4 col-4">Name</th>
							<th>Description</th>
							<th class="col-lg-2 col-md-2 col-sm-2 col-2"> Price</th>
							<th class="col-lg-4 col-md-4 col-sm-4 col-4">Action</th>
							<th class="col-lg-2 col-md-2   col-sm-2 col-2">Amount</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($cart as $cart_id) {
							$product_id = $cart_id['ProductId'];
							$sql = "SELECT * FROM `product` WHERE `product_id` =  '$product_id'";
							$cart = mysqli_query($connection, $sql);
							$result = mysqli_query($connection, $sql); ?>
							<?php if (mysqli_num_rows($result) > 0) { ?>
								<tr>
									<?php
									while ($c_details = mysqli_fetch_assoc($result)) { ?>
										<td scope="row no-gutters d-inline">
											<div class="media">
												<a class="d-flex" href="#">
													<img src="ADMIN PANEL/Images/<?php echo $c_details['img'] ?>" alt="" style="width: 70px; height:70px;">
												</a>
												<div class="media-body ml-4">
													<h6> <?php echo $c_details['name'] ?>
													</h6>


												</div>
											</div>
										</td>
										<td>
											<p>DESCRIPTION:<?php echo $c_details['description'] ?></p>
										</td>
										<td class="py-auto"><span>Ksh <?php echo $c_details['per_unit']  ?></span>
										</td>
										<td>
											<?php
											$p_id =  $c_details['product_id'];
											$UserId = $_SESSION['Id'];
											$sql = "SELECT * FROM `cart_info` WHERE ProductId =  $p_id and UserId = $UserId";
											$cart_quantity = mysqli_query($connection, $sql);
											foreach ($cart_quantity as $cart_quantity) {
											?>
												<div class="list-group row">
													<div class="row no-gutters">
														<div class="col mr-0">
															<form action="delete.php" method="post">
																<?php
																if ($cart_quantity['Quantity'] == 1) { ?>
																	<button type="submit" disabled="disabled" class="btn btn-light" style="border-radius: 0px;height:40px" name="subtract"> <i class="fa fa-minus-circle" aria-hidden="true"></i>
																	</button>
																<?php } else { ?>
																	<input type="text" name="user_Id" class="form-control" value="<?php echo $UserId ?>" placeholder="" aria-describedby="helpId" hidden>
																	<input type="text" name="order_id" value="<?php echo $cart_quantity['Id'] ?>" class="form-control" placeholder="" aria-describedby="helpId" hidden>
																	<button type="submit" class="btn btn-light" style="border-radius: 0px;height:40px" name="subtract"> <i class="fa fa-minus-circle" aria-hidden="true"></i>
																	</button>
																<?php }
																?>
															</form>
														</div>
														<div class="col">
															<button type="button" class="btn btn-success ml-0 mr-0" style="border-radius: 0px;height:40px;width:85%;" value="">
																<?php echo $cart_quantity['Quantity'] ?> </button>
														</div>
														<div class="col">
															<form action="add.php" method="post">
																<?php
																if ($cart_quantity['Quantity'] > 4) { ?>
																	<button type="submit" disabled="disabled" class="btn btn-light" style="border-radius: 0px;height:40px" value="" name="add"> <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
																<?php } else { ?>
																	<input type="text" name="user_Id" class="form-control" value="<?php echo $UserId ?>" placeholder="" aria-describedby="helpId" hidden>
																	<input type="text" name="order_id" value="<?php echo $cart_quantity['Id'] ?>" class="form-control" placeholder="" aria-describedby="helpId" hidden>
																	<button type="submit" class="btn btn-light" style="border-radius: 0px;height:40px" value="" name="add"> <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
																<?php }
																?>
															</form>
														</div>
													</div>
												</div>
											<?php } ?>
										</td>
										<td>
											Ksh <?php echo $cart_quantity['Amount'] ?>
										</td>
										<td>
											<form action="remove_item_from_cart.php" method="post">
												<?php
												$UserId = $_SESSION['Id'];
												?>
												<input type="text" name="order_id" value="<?php echo  $product_id ?>" class="form-control" placeholder="" aria-describedby="helpId" hidden>
												<input type="text" name="user_Id" class="form-control" value="<?php echo $UserId ?>" placeholder="" aria-describedby="helpId" hidden>
												<button type="submit" class="btn btn-danger py-0"> <i>Remove Item</i> </button>
											</form>
										</td>
									<?php
									}
									?>
								</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
			<?php } else {
				echo  '<div class="alert alert-danger mt-2" role="alert"><strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>You Don\'t have any item in the Cart</strong>
                             </div>';
			}
			?>
		</div>
		<div class="col-lg-4 col-sm-12 col-md-12" ">
                        <div class=" card text-dark" style="width:100%;">
			<div class=" card-header">
				<h5 style="font-size: 14px;color:black">ORDER DETAILS</h5>
			</div>
			<div class="card-body">

				<div class="card-footer">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h6 style="font-size: 14px;">
								TOTAL
							</h6>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h6 style="font-size: 14px;float:right">
								<?php
								$UserId = $_SESSION['Id'];
								// echo $UserId;
								$sql = "SELECT SUM(Amount)  as Amount FROM `cart_info` WHERE `UserId` = $UserId";
								$total = mysqli_query($connection, $sql);
								foreach ($total as $total) {
									$Total = (float)$total['Amount'];
									echo 'Ksh ' . $Total . '.00';
									$sql = "SELECT * FROM `cart` WHERE `customer_id` = '$UserId'";
									$res = mysqli_query($connection, $sql);
									if (mysqli_num_rows($res) > 0) {
										foreach ($res as $res) {
											$cart_id = $res['Id'];
											// echo $UserId;
											$sql = "UPDATE `cart` SET `Amount`= '$Total' WHERE `Id`= '$cart_id'";
											if ($result = mysqli_query($connection, $sql)) {
												$sql = "UPDATE `tblorder` SET `cart_id`= '$cart_id' WHERE `customer_id`= '$UserId'";
												if ($result = mysqli_query($connection, $sql)) {
												}
											}
										}
									} else {
										$UserId = $_SESSION['Id'];
										$sql = "INSERT INTO `cart`(`customer_id`, `Amount`) VALUES ('$UserId','$Total')";
										if ($result = mysqli_query($connection, $sql)) {
											$sql = "SELECT * FROM `cart` WHERE `customer_id` = '$UserId'";
											$res = mysqli_query($connection, $sql);
											if (mysqli_num_rows($res) > 0) {
												foreach ($res as $res) {
													$cart_id = $res['Id'];
													// echo $cart_id;
													function random_strings($length_of_string)
													{
														$str_result = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
														return substr(str_shuffle($str_result), 0, $length_of_string);
													}
													$voucher_number = random_strings(7);

													$sql = "INSERT INTO `tblpayment`(`payment_voucher`, `cart_id`) VALUES ('$voucher_number','$cart_id')";
													if ($result_voucher = mysqli_query($connection, $sql)) {
														$UserId = $_SESSION['Id'];
														$sql = "UPDATE `cart_info` SET `cart_id`= '$cart_id' WHERE `UserId`= '$UserId'";
														if ($result = mysqli_query($connection, $sql)) {
														}
													} else {
														echo mysqli_error($connection);
													}
												}
											}
										} else {
											echo '<div class="alert alert-danger" role="alert">
                                                            <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Sorry, Failed To add the cart Details' . mysqli_error($connection) . '</strong>
                                                            </div>';
										}
									}
								}
								?>
							</h6>
						</div>
					</div>
					<?php
					$UserId = $_SESSION['Id'];
					?>
					<a href="checkout.php?user_id = <?php echo $UserId ?>&amount =<?php echo $Total ?>" style="text-decoration:none"><button type="button" class="btn btn-dark d-block mt-2 mx-auto" style="border-radius: 0px; width:80%;border-radius:12px; background-color:green;">PROCEED TO
							CHECKOUT</button></a>
				</div>
			</div>

		</div>

	</div>
</body>

</html>