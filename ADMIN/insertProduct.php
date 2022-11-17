<?php
include('components/session.php');
include("server/connect.php");

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $weight = $_POST['weight'];
    $unit = $_POST['unit'];
    $previous_price = $_POST['previous_price'];
    $per_unit = $_POST['per_unit'];
    $category = $_POST['Category'];
    $color = $_POST['color'];
    $search_term = $_POST['search_term'];

    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $folder = "IMAGES/products" . $filename;

    $sql = "INSERT INTO `product`(`name`, `description`, `weight`, `unit`, `previous_price`, `per_unit`, `category`, `img`, `color`, `search_term`) VALUES ('$name','$description','$weight','$unit','$previous_price','$per_unit','$category','$filename','$color','$search_term')";

    if (mysqli_query($conn, $sql)) {

        if (move_uploaded_file($tmp_name, $folder)) {
            $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Successfully Added to Database</strong> 
      </div>';
        } else {
            $message = "FAILED TO UPLOAD IMAGE";
        }
    } else {
        $message = "Error" . $sql . " . " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<script>
$(".alert").alert();
</script>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>ADD PRODUCT PAGE</title>
	<!-- Custom fonts for this template-->
	<?php include("components/links.php") ?>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
					<div class="row">
						<div class="col-lg-8 mx-auto my-3 ">
							<script>
							$(document).ready(function() {
								$(".alert").hide(2000);
							})
							</script>
							<div class="shadow-lg card text-white bg-light">
								<div class="card-header bg-success">
									<h5 class="ml-2">
										<i class="fa fa-plus" aria-hidden="true"></i> Add Product
									</h5>
								</div>
								<div class="card-body text-dark">
									<div class="my-1">
										<div class="my-2">
											<?php echo $message ?>
										</div>
									</div>
									<form action="" method="post" enctype="multipart/form-data">
										<div class="row">
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Enter Product Name</label>
													<input type="text" name="name" id="" class="form-control"
														placeholder="" aria-describedby="helpId">
												</div>
											</div>
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Enter Product Description</label>
													<input type="text" name="description" id="" class="form-control"
														placeholder="" aria-describedby="helpId">
												</div>
											</div>
										</div>
										<div class="row">
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Enter Product Weight</label>
													<input type="text" name="weight" id="" class="form-control"
														placeholder="" aria-describedby="helpId">
												</div>
											</div>
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Select Product Unit</label>
													<select class="form-control" name="unit" id="">
														<option disabled value="Select">--SELECT--</option>
														<option value="Meters">Meters</option>
														<option value="Kilograms">Kilogram</option>
														<option value="Litres">Litres</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Enter Product Price_Per Unit</label>
													<input type="text" name="per_unit" id="" class="form-control"
														placeholder="" aria-describedby="helpId">
												</div>
											</div>
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<div class="col form-group">
														<label for="">Category</label>
														<select class="form-control" name="Category" id=""
															value="<?php echo $row['category'] ?>">
															SELECT<option value="" disabled>
																--SELECT--
															</option>
															<option value="Vegetable">
																Vegetable
															</option>
															<option value="Fruit">
																Fruit</option>
															<option value="Tubers">
																Tubers</option>
															<option value="Grains">
																Grains
															</option>
															<option value="Legumes">
																Legumes
															</option>
														</select>
													</div>

												</div>
											</div>
										</div>
										<div class="row">
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Enter Product Color</label>
													<input type="text" name="color" id="" class="form-control"
														placeholder="" aria-describedby="helpId">
												</div>
											</div>
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Enter Product Search Term</label>
													<input type="text" name="search_term" id="" class="form-control"
														placeholder="" aria-describedby="helpId">
												</div>
											</div>
										</div>
										<div class="row">
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Enter Product Previous Price</label>
													<input type="text" name="previous_price" id="" class="form-control"
														placeholder="" aria-describedby="helpId">
												</div>
											</div>
											<div class=" col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="">Added By</label>
													<input type="text" name="admin_name" id="" class="form-control"
														placeholder="" aria-describedby="helpId">
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<label class="file">
												Upload Photo

											</label>
											<input type="file" name="file" id="" class="form-control" placeholder=""
												aria-describedby="helpId">
										</div>
										<br>
										<center> <button type="submit" class="btn btn-primary my-2">Save
												Product</button>
										</center>
									</form>
								</div>
							</div>

							<!-- <form id="myform" action="" method="post" enctype="multipart/form-data">
                                <div class="row mx-2">
                                    <div class="col form-group">
                                        <label for="" style="font-weight:700;">Enter the Product Name</label>
                                        <input type="text" name="P_name" id="name" class="form-control" placeholder="" aria-describedby="helpId" autocomplete="off" required>

                                    </div>
                                    <div class="col form-group" <div class="form-group">
                                        <label for="">Category</label>
                                        <select class="form-control" name="Category" id="">
                                            SELECT<option value="" disabled>--SELECT--</option>
                                            <option value="Furniture">Furniture</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="Utensils">Utensils</option>
                                            <option value="Gas Cylinders">Gas Cylinders</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row mx-2">
                                    <div class="col form-group mt-3 mb-3">
                                        <label for="" style="font-weight:700;">Description</label>
                                        <input type="textarea" name="Description" id="password" autocomplete="off" class="form-control" placeholder="" aria-describedby="helpId" required>
                                    </div>
                                    <div class="col form-group mt-3 mb-3">
                                        <label for="" style="font-weight:700;">Price</label>
                                        <input type="text" id="" name="Price" autocomplete="off" class="form-control" placeholder="" aria-describedby="helpId" required>

                                    </div>
                                </div>
                                <div class="ml-3 form-group mt-3">
                                    <label for="" style="font-weight:700;">Upload Product Photo</label>
                                    <input type="file" class="form-control" name="File" id="" placeholder="" aria-describedby=" fileHelpId" style="padding-bottom: 2px;">
                                </div>
                                <center><button type="submit" class="btn btn-success mt-4" style="width: 30%;">Save Product</button>
                                </center>
                            </form> -->
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

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>
</body>

</html>