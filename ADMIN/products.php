<?php
include('components/session.php');
include("server/connect.php");

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$productId = $_POST['productId'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$weight = $_POST['weight'];
	$unit = $_POST['unit'];
	$previous_price = $_POST['previous_price'];
	$per_unit = $_POST['per_unit'];
	$category = $_POST['Category'];
	$color = $_POST['color'];
	$search_term = $_POST['search_term'];




	$sql = "UPDATE `product` SET `name`='$name',`description`='$description',`weight`='$weight',`unit`='$unit',`previous_price`='$previous_price',`per_unit`='$per_unit',`category`='$category',`color`='$color',`search_term`='$search_term' WHERE product_id = '$productId'";

	if (mysqli_query($conn, $sql)) {
		$message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Successfully Added to Database</strong> 
      </div>';
	} else {
		$message = "Error" . $sql . " . " . mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>PRODUCTS PAGE</title>
	<!-- Custom fonts for this template-->
	<?php include("components/links.php") ?>
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Content Wrapper -->
		<?php include("components/sidebar.php") ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<?php include('components/top_bar.php') ?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<script>
					$(document).ready(function() {
						var message = <?php echo $message ?>
						if (message == "") {

						} else {
							alert(message);
						}
					})
					</script>
					<div class="row">
						<!-- Page Heading -->
						<h1 class="h3 mb-2 text-gray-800">Products Tables</h1>
						<p class="mb-4">This tables contains all the information that are there in the database regardin
							the products we sell. It is detailed and easy to update ad delete products. It helps the
							admin access the products to ascertain the effectiveness of each and every of them</p>

						<!-- DataTales Example -->
						<div class="card shadow mb-4">
							<div class="card-header py-3 ">
								<div class="mr-auto">
									<a href="insertProduct.php" style="float:right"><button type="button"
											class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> ADD
											PRODUCT</button></a>
								</div>
								<h6 class="m-0 font-weight-bold text-primary">Products</h6>
							</div>
							<div class="card-body">
								<?php
								$sql = "SELECT * FROM product ORDER BY `product_id` DESC";
								$result = mysqli_query($conn, $sql); ?>
								<div class="table-responsive">
									<table class="mr-5 table table-bordered" id="dataTable" width="100%"
										cellspacing="0">
										<thead>
											<tr>
												<th>N/M</th>
												<th>Image</th>
												<th>Name</th>
												<th>Category</th>
												<th>Description</th>
												<th>Price</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<tfoot>
											<?php
											$num =  1;
											while ($row = mysqli_fetch_assoc($result)) { ?>
											<tr>
												<th><?php echo $num ?></th>
												<th> <img src="../Images/<?php echo $row['img'] ?>" alt=""
														style="width:130px; height:130px;"></th>
												<th><?php echo $row['name'] ?></th>
												<th><?php echo $row['category'] ?></th>
												<th><?php echo $row['description'] ?></th>
												<th><?php echo $row['per_unit'] ?></th>

												<th>
													<div class="row">
														<div class="col-lg-6">
															<button type="button" class="btn btn-success px-1"
																data-toggle="modal"
																data-target="#product_modal<?php echo $row['product_id'] ?>">Update</button>

															<!-- Modal -->
															<div class="modal fade"
																id="product_modal<?php echo $row['product_id'] ?>"
																tabindex="-1" role="dialog"
																aria-labelledby="modelTitleId" aria-hidden="true">
																<div class="modal-dialog modal-lg" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title">Update Product</h5>
																			<button type="button" class="close"
																				data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<center>
																				<img src="../IMAGES/<?php echo $row['img'] ?>"
																					alt=""
																					style="width:60%; height:50vh;">
																				<form action="" method="post"
																					enctype="multipart/form-data">
																					<div class="row">
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Update
																									Product Name</label>
																								<input type="text"
																									name="name" id=""
																									class="form-control"
																									placeholder=""
																									value="<?php echo $row['name'] ?>"
																									aria-describedby="helpId">
																							</div>
																						</div>
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Update
																									Product
																									Description</label>
																								<input type="text"
																									name="description"
																									id=""
																									class="form-control"
																									placeholder=""
																									value="<?php echo $row['description'] ?>"
																									aria-describedby="helpId">
																							</div>
																						</div>
																					</div>
																					<div class="row">
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Update
																									Product
																									Weight</label>
																								<input type="text"
																									name="weight" id=""
																									class="form-control"
																									placeholder=""
																									value="<?php echo $row['weight'] ?>"
																									aria-describedby="helpId">
																							</div>
																						</div>
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Select
																									Product Unit</label>
																								<select
																									class="form-control"
																									name="unit" id="">
																									<option disabled
																										value="Select">
																										--SELECT--
																									</option>
																									<option
																										value="Meters">
																										Meters</option>
																									<option
																										value="Kilograms">
																										Kilogram
																									</option>
																									<option
																										value="Litres">
																										Litres</option>
																								</select>
																							</div>
																						</div>
																					</div>
																					<div class="row">
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Update
																									Product Price_Per
																									Unit</label>
																								<input type="text"
																									name="per_unit"
																									id=""
																									class="form-control"
																									placeholder=""
																									value="<?php echo $row['per_unit'] ?>"
																									aria-describedby="helpId">
																							</div>
																						</div>
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<div
																									class="col form-group">
																									<label
																										for="">Category</label>
																									<select
																										class="form-control"
																										name="Category"
																										id=""
																										value="<?php echo $row['category'] ?>">
																										SELECT<option
																											value=""
																											disabled>
																											--SELECT--
																										</option>
																										<option
																											value="Vegetable">
																											Vegetable
																										</option>
																										<option
																											value="Fruit">
																											Fruit
																										</option>
																										<option
																											value="Tubers">
																											Tubers
																										</option>
																										<option
																											value="Grains">
																											Grains
																										</option>
																										<option
																											value="Legumes">
																											Legumes
																										</option>
																									</select>
																								</div>

																							</div>
																						</div>
																					</div>
																					<div class="row">
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Enter
																									Product
																									Color</label>
																								<input type="text"
																									name="color" id=""
																									class="form-control"
																									placeholder=""
																									value="<?php echo $row['color'] ?>"
																									aria-describedby="helpId">
																							</div>
																						</div>
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Enter
																									Product Search
																									Term</label>
																								<input type="text"
																									name="search_term"
																									id=""
																									class="form-control"
																									placeholder=""
																									value="<?php echo $row['search_term'] ?>"
																									aria-describedby="helpId">
																							</div>
																						</div>
																					</div>
																					<div class="row">
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Enter
																									Product Previous
																									Price</label>
																								<input type="text"
																									name="previous_price"
																									id=""
																									class="form-control"
																									placeholder=""
																									value="<?php echo $row['previous_price'] ?>"
																									aria-describedby="helpId">
																							</div>

																						</div>
																						<div
																							class=" col-lg-6 col-md-6 col-sm-12">
																							<div class="form-group">
																								<label for="">Product Id
																								</label>
																								<input type="text"
																									name="productId"
																									id=""
																									class="form-control"
																									value="<?php echo $row['product_id'] ?>"
																									disabled>
																							</div>
																							<input type="text"
																								name="productId" id=""
																								class="form-control"
																								value="<?php echo $row['product_id'] ?>"
																								hidden>

																						</div>

																					</div>


																					<br>
																					<center> <button type="submit"
																							class="btn btn-primary my-2">Save
																							Product</button>
																					</center>
																				</form>
																			</center>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<a href="?productId=<?php echo $row['product_id'] ?> "><button
																	type="button"
																	class="btn btn-danger px-1 mr-1">Delete</button></a>
														</div>

													</div>
												</th>
											</tr>
											<?php
												$num++;
											}
											?>
										</tfoot>
										</tbody>
										<?php
										if (isset($_GET['productId'])) {
											$del_productId = $_GET['productId'];
											$sql = "DELETE FROM product WHERE product_id = $del_productId;";
											$result = mysqli_query($conn, $sql);
											if (!$result) {
												$message = '<div class="alert alert-alert" role="alert">
                                                <strong><i class="fa fa-exclamation" style="color:green" aria-hidden="true"></i> Product Added Successfuly</strong>
                                                </div>';
											} else {
												$message = '<div class="alert alert-success" role="alert">
                                                <strong><i class="fa fa-check" style="color:green" aria-hidden="true"></i> Product Deleted Successfuly</strong>
                                                </div>';
											}
										}
										?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- Page Heading -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2021</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->
		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>
	<!-- Bootstrap core JavaScript-->

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Page level plugins -->
	<script src="vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<!-- <script src="js/demo/datatables-demo.js"></script> -->

</body>

</html>