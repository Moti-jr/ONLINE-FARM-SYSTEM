<?php
include("../controls/connect.php");
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include("../controls/links.php") ?>
	<link rel="stylesheet" href="../css/styles.css">
	<title>INDEX</title>
</head>
<body>
	<div class="mt-1" style="background-color:rgb(220, 220, 220);">
		<?php include("../controls/navbar1.php") ?>

		<div class="wrapper">
			<nav class="sidebar nav flex-column" id="sidebar" style="background-color:gainsboro;">
				<span class="nav-item" style="background-color:forestgreen;">
					<div class="media">
						<div class="media-body ml-2">
							<h5 style="color:white;text-align:center;font-family:cursive">Moti's Farm Management System
							</h5>
						</div>
					</div>
				</span>
				<li class="nav-item">
					<a class="sb nav-link active" href="#" style="color:orange"> <i class="fas fa-tachometer-alt"
							aria-hidden="true"></i> <span style="color:green"> Dashboard</span></a>
				</li>
				<li class="nav-item">
					<a class="sb nav-link" href="#" style="color:orange"><i class=" fa fa-plus" aria-hidden="true"></i>
						<span style="color:green">Add Product</span></a>
				</li>
				<li class="nav-item">
					<a class="sb nav-link" href="#" style="color:orange"><i class=" fa fa-plus" aria-hidden="true"></i>
						<span style="color:green">Add Customer</span></a>
				</li>
				<li class="nav-item">
					<a class="sb nav-link" href="#" style="color:orange"><i class=" fa fa-minus" aria-hidden="true"></i>
						<span style="color:green">Delete Distributor</span></a>
				</li>
				<li class="nav-item">
					<a class="sb nav-link" href="#" style="color:orange"><i class="fa fa-cogs" aria-hidden="true"></i>
						<span style="color:green">Update Distributor Details</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" style="color:orange"> <i class="fa fa-cogs" aria-hidden="true"></i>
						<span style="color:green">Update Customer Details</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#" style="color:orange"><i class="fa fa-magnet"
							aria-hidden="true"></i><span style="color:green"> Customer Details</span> </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" style="color:orange"><i class="fab fa-first-order"
							aria-hidden="true"></i> <span style="color:green"> Orders</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" style="color:orange"><i class="fa fa-industry" aria-hidden="true"></i>
						<span style="color:green"> Distributors</span></a>
				</li>
			</nav>
			<div class="content" id="content" style="background-color: white;width:100%">
				<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: green;">
					<ul class="nav navbar-nav mr-auto mt-2 mt-lg-0">
						<button type="button" id="sidebarCollapse" class="btn btn-info">
							<i class="fa fa-align-left" aria-hidden="true"></i>
						</button>
					</ul>
					<ul class="navbar-nav mx-auto mt-2 mt-lg-0">
						<li class="nav-item active mr-3">
							<a class="nav-link" href="home.php"><i class="fa fa-home" aria-hidden="true"></i> <span
									class="d-lg-inline d-md-inline d-none">Home</span> </a>
						</li>
						<li class="nav-item active  mr-3">
							<a class="nav-link" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> <span
									class="d-lg-inline d-md-inline d-none">About</span></a>
						</li>
						<li class="nav-item active  mr-3">
							<a class="nav-link" href="#"><i class="fa fa-server" aria-hidden="true"></i> <span
									class="d-lg-inline d-md-inline d-none">Services</span></a>
						</li>
						<li class="nav-item active  mr-3">
							<a class="nav-link" href="#"> <i class="fa fa-address-book" aria-hidden="true"></i> <span
									class="d-lg-inline d-md-inline d-none">Blog</span></a>
						</li>
					</ul>
					<ul class="navbar-nav ml-0 mt-2 mt-lg-0 pl-lg-5 ml-sm-0">
						<?php
						$admin = $_SESSION['admin_name'];

						$sql = "SELECT * FROM `admins` WHERE `admin_name` = '$admin'";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) { ?>
						<li class="nav-item active  mr-sm-0 ml-3">
							<?php echo $row['admin_name'] ?>

						</li>
						<li class="nav-item active  mr-sm-0 ml-3">
							<button type="button" class="btn btn-primary">Logout</button>
						</li>
						<?php }
						}
						?>
					</ul>
				</nav>
				<div class="ml-5 col-lg-10 col-md-10 col-sm-10 mt-0"
					style="border:2px solid gainsboro;box-shadow:2px 2px 10px;">
					<ul class="row nav justify-content-around ">
						<a class="nav-link" href="#">
							<li class="nav2 nav-item" style="background-color: lightgreen;cursor:pointer;">
								<div class="media">
									<a class="d-flex mr-3" href="#">
										<i class="fab fa-adn fa-3x " aria-hidden="true"></i>
									</a>
									<div class="media-body mr-5">
										<h6>Category</h6>
										Product Category
									</div>
								</div>
							</li>
						</a>
						<li class="nav2 nav-item" style="background-color: lightgreen;">
							<a class="nav-link" href="#">
								<div class="media">
									<a class="d-flex mr-3" href="#">
										<i class="fab fa-adn fa-3x " aria-hidden="true"></i>
									</a>
									<div class="media-body mr-5">
										<h6>Product Description</h6>
										Product Description
									</div>
								</div>
							</a>
						</li>
						<li class="nav2 nav-item" style="background-color: lightgreen;">
							<a class="nav-link" href="#">
								<div class="media">
									<a class="d-flex mr-3" href="#">
										<i class="fab fa-adn fa-3x " aria-hidden="true"></i>
									</a>
									<div class="media-body mr-5">
										<h6>Pricing And Images</h6>
										Product Category
									</div>
								</div>
							</a>
						</li>
					</ul>
					<h5 class="mt-3">Add New Product</h5>
					<form action="productadd.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class=" col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label for="">Enter Product Name</label>
									<input type="text" name="name" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
							<div class=" col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label for="">Enter Product Description</label>
									<input type="text" name="description" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
						</div>
						<div class="row">
							<div class=" col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label for="">Enter Product Weight</label>
									<input type="text" name="weight" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
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
									<input type="text" name="per_unit" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
							<div class=" col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label for="">Enter Product Category</label>
									<input type="text" name="category" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
						</div>
						<div class="row">
							<div class=" col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label for="">Enter Product Color</label>
									<input type="text" name="color" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
							<div class=" col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label for="">Enter Product Search Term</label>
									<input type="text" name="search_term" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
						</div>
						<div class="row">
							<div class=" col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label for="">Enter Product Previous Price</label>
									<input type="text" name="previous_price" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
							<div class=" col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label for="">Added By</label>
									<input type="text" name="admin_name" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="custom-file"> <img src="../Images/download_icon.png" alt="" srcset=""
									width="100px;">
								Upload Photo
								<input type="file" name="file" id="" placeholder="" class="custom-file-input"
									aria-describedby="fileHelpId" required style="height: 4;">
								<span class="custom-file-control"></span>
							</label>
						</div>
						<br>
						<center> <button type="submit" class="btn btn-primary mt-3">Save Product</button></center>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="index.js"></script>
</body>

</html>