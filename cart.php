 <?php
	include("other/server.php");
	include("other/links.php");
	include("other/connect.php");
	?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">

 	<link rel="stylesheet" href="other/css/loader.css" type="text/css">
 	<script src="other/javascript/loader.js"></script>
 	<link rel="stylesheet" href="other/search.css" type="text/css">
 	<link rel="stylesheet" href="other/css/ava_sidebar.css" type="text/css">
 	<title>Cart Page</title>
 </head>
 <style>
 	.main::-webkit-scrollbar {
 		display: none;
 	}

 	.mid::-webkit-scrollbar {
 		display: none;
 	}
 </style>

 <body onload="myFunction()" style="margin:0;">
 	<div id="loader"></div>
 	<div class="container-fluid" style="width:100%;height:100%" id="loadDiv" class="animate-bottom">
 		<!-- Main Navbar -->
 		<?php include("other/navbar.php"); ?>
 		<div class="row">
 			<!-- Sidepanel -->
 			<?php include("other/cart_sidebar.php"); ?>
 			<!-- Content- section -->
 			<div class="main col" style="width:calc(100%-245px); 
            background-color:white;height:100vh;overflow:scroll">

 				<div class="row mb-5 d-flex justify-content-around pl-2">
 					<!-- Column to Display Items in the Cart -->


 					<div class="mid col-lg-8 col-sm-12 col-md-11 col-11 mt-1 mb-2" style="box-shadow:2px 2px 10px;border-radius: 8px; background-image:linear-gradient(to bottom,wheat, gainsboro);overflow:scroll;height:90vh;">

 						<h5 class=" card-header" style="text-align: center;background-color:gray;color:white;margin-right:0px">YOUR CART
 							PRODUCT LIST</h5>
 						<?php
							$UserId = $_SESSION['Id'];
							$sql = "SELECT menu_id FROM `tblorder` WHERE `customer_id` =  '$UserId'";
							$cart = mysqli_query($conn, $sql);
							if (mysqli_num_rows($cart) > 0) { ?>
 							<table class="table table-hover table-inverse table-responsive-lg" style="font-weight: 500;" style="overflow-y:hidden ;">
 								<thead class="thead-inverse">
 									<tr>
 										<th class="col-lg-4 col-md-4 col-sm-4 col-4">Name</th>
 										<th class="col-lg-2 col-md-2 col-sm-2 col-2"> Price</th>
 										<th class="col-lg-4 col-md-4 col-sm-4 col-4">Action</th>
 										<th class="col-lg-2 col-md-2   col-sm-2 col-2">Amount</th>
 										<th>Action</th>
 									</tr>
 								</thead>
 								<tbody>

 									<?php foreach ($cart as $cart_id) {
											$menu_id = $cart_id['menu_id'];
											$sql = "SELECT * FROM `tblmenu` WHERE `menu_id` =  '$menu_id'";
											$cart = mysqli_query($conn, $sql);
											$result = mysqli_query($conn, $sql); ?>
 										<?php if (mysqli_num_rows($result) > 0) { ?>
 											<tr>
 												<?php
													while ($c_details = mysqli_fetch_assoc($result)) { ?>
 													<td scope="row no-gutters d-inline">
 														<div class="media">
 															<a class="d-flex" href="#">
 																<img src="ADMIN/IMAGES/<?php echo $c_details['menu_image'] ?>" alt="" style="width: 70px; height:70px;">
 															</a>
 															<div class="media-body ml-4">
 																<h6 style="color:brown;font-family:monospace">
 																	<?php echo $c_details['menu_name'] ?></h6>
 																<p>Description:<?php echo $c_details['ingredients'] ?></p>

 															</div>
 														</div>
 													</td>
 													<td class="py-auto"><span>Ksh <?php echo $c_details['price']  ?></span>
 													</td>
 													<td>
 														<?php
															$p_id =  $c_details['menu_id'];
															$UserId = $_SESSION['Id'];
															$sql = "SELECT * FROM `tblorder` WHERE menu_id =  $p_id and customer_id = $UserId";
															$cart_quantity = mysqli_query($conn, $sql);
															foreach ($cart_quantity as $cart_quantity) { ?>
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
 																				<input type="text" name="order_id" value="<?php echo $cart_quantity['order_id'] ?>" class="form-control" placeholder="" aria-describedby="helpId" hidden>
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
																				if ($cart_quantity['Quantity'] > 3) { ?>
 																				<button type="submit" disabled="disabled" class="btn btn-light" style="border-radius: 0px;height:40px" value="" name="add">
 																					<i class="fa fa-plus-circle" aria-hidden="true"></i></button>
 																			<?php } else { ?>
 																				<input type="text" name="user_Id" class="form-control" value="<?php echo $UserId ?>" placeholder="" aria-describedby="helpId" hidden>
 																				<input type="text" name="order_id" value="<?php echo $cart_quantity['order_id'] ?>" class="form-control" placeholder="" aria-describedby="helpId" hidden>
 																				<button type="submit" class="btn btn-light" style="border-radius: 0px;height:40px" value="" name="add">
 																					<i class="fa fa-plus-circle" aria-hidden="true"></i></button>
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
 						<div class="cnt_shopping mb-2">
 							<a href="index.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i><span style="font-weight: 500;"> CONTINUE SHOPPING</span></a>
 						</div>
 					</div>
 					<!-- Column to Display the Transaction Details -->
 					<div class="col-lg-4 col-sm-12 col-md-12" ">
                        <div class=" card text-dark bg-light" style="width:100%; box-shadow:2px 2px 10px;">
 						<div class=" card-header">
 							<h5 style="font-size: 14px;color:blue">ORDER SUMMARY</h5>
 						</div>
 						<div class="card-body">
 							<div class="row">
 								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
 									<h6 style="font-size: 14px;">ITEMS (
 										<?php
											$UserId = $_SESSION['Id'];
											// echo $UserId;
											$sql = "SELECT * FROM  `tblorder` WHERE `customer_id` = $UserId";
											if ($result = mysqli_query($conn, $sql)) {
												$num = (mysqli_num_rows($result));
												echo $num;
											}
											?>
 										)
 									</h6>
 								</div>
 								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
 									<h6 style="font-size: 14px;float:right">
 										<?php
											$UserId = $_SESSION['Id'];
											// echo $UserId;
											$sql = "SELECT SUM(Amount)  as Amount FROM `tblorder` WHERE `customer_id` = $UserId";
											$total = mysqli_query($conn, $sql);
											foreach ($total as $total) {
												$Total = (float)$total['Amount'];
												echo 'Ksh ' . $Total . '.00';
											}
											?>
 									</h6>
 								</div>
 							</div>
 							<div class="row">
 								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
 									<h6 style="font-size: 14px;">
 										ADDITIONAL COSTS
 									</h6>
 								</div>
 								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
 									<h6 style="font-size: 14px;float:right">
 										NONE
 									</h6>
 								</div>
 							</div>
 						</div>
 						<div class="card-footer">
 							<div class="row">
 								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
 									<h6 style="font-size: 14px;">
 										TOTAL COST
 									</h6>
 								</div>
 								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
 									<h6 style="font-size: 14px;float:right">
 										<?php
											$UserId = $_SESSION['Id'];
											// echo $UserId;
											$sql = "SELECT SUM(Amount)  as Amount FROM `tblorder` WHERE `customer_id` = $UserId";
											$total = mysqli_query($conn, $sql);
											foreach ($total as $total) {
												$Total = (float)$total['Amount'];
												echo 'Ksh ' . $Total . '.00';
												$sql = "SELECT * FROM `cart` WHERE `customer_id` = '$UserId'";
												$res = mysqli_query($conn, $sql);
												if (mysqli_num_rows($res) > 0) {
													foreach ($res as $res) {
														$cart_id = $res['Id'];
														// echo $UserId;
														$sql = "UPDATE `cart` SET `Amount`= '$Total' WHERE `Id`= '$cart_id'";
														if ($result = mysqli_query($conn, $sql)) {
															$sql = "UPDATE `tblorder` SET `cart_id`= '$cart_id' WHERE `customer_id`= '$UserId'";
															if ($result = mysqli_query($conn, $sql)) {
															}
														}
													}
												} else {
													$UserId = $_SESSION['Id'];
													$sql = "INSERT INTO `cart`(`customer_id`, `Amount`) VALUES ('$UserId','$Total')";
													if ($result = mysqli_query($conn, $sql)) {
														$sql = "SELECT * FROM `cart` WHERE `customer_id` = '$UserId'";
														$res = mysqli_query($conn, $sql);
														if (mysqli_num_rows($res) > 0) {
															foreach ($res as $res) {
																$cart_id = $res['Id'];
																// echo $cart_id;
																function random_strings($length_of_string)
																{
																	$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
																	return substr(str_shuffle($str_result), 0, $length_of_string);
																}
																$voucher_number = random_strings(5);

																$sql = "INSERT INTO `tblpayment`(`payment_voucher`, `cart_id`) VALUES ('$voucher_number','$cart_id')";
																if ($result_voucher = mysqli_query($conn, $sql)) {
																	$UserId = $_SESSION['Id'];
																	$sql = "UPDATE `tblorder` SET `cart_id`= '$cart_id' WHERE `customer_id`= '$UserId'";
																	if ($result = mysqli_query($conn, $sql)) {
																	}
																} else {
																	echo mysqli_error($conn);
																}
															}
														}
													} else {
														echo '<div class="alert alert-danger" role="alert">
                                                            <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Sorry, Failed To add the cart Details' . mysqli_error($conn) . '</strong>
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
 							<a href="checkout.php?user_id = <?php echo $UserId ?>&amount =<?php echo $Total ?>" style="text-decoration:none"><button type="button" class="btn btn-dark d-block mt-2" style="border-radius: 0px; width:98%">CHECKOUT</button></a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 </body>
 <script type="text/javascript">
 	$(window).scroll(function() {
 		sessionStorage.scrollTop = $(this).scrollTop();
 	});
 	$(document).ready(function() {
 		if (sessionStorage.scrollTop != "undefined") {
 			$(window).scrollTop(sessionStorage.scrollTop);
 		}
 	});
 </script>

 </html>