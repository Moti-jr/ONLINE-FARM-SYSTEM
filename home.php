<html lang="en">

<head>
	<link rel="stylesheet" href="index.js">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include("index pages/links.php") ?>
	<title>Homepage</title>
</head>

<body>
	<div class="container-fluid mt-1" style="background-color:rgb(220, 220, 220);">
		<?php include("navbar1.php") ?>
		<nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color: green;">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active mr-3">
					<a class="nav-link" href="home.php"><i class="fa fa-home" aria-hidden="true"></i> <span
							class="d-lg-inline d-md-inline d-none">Home</span> </a>
				</li>
				<li class="nav-item active  mr-3">
					<a class="nav-link" href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> <span
							class="d-lg-inline d-md-inline d-none">About</span></a>
				</li>
				<li class="nav-item active  mr-3">
					<a class="nav-link" href="#"><i class="fa fa-server" aria-hidden="true"></i> <span
							class="d-lg-inline d-md-inline d-none">Services</span></a>
				</li>

			</ul>
			<ul class="navbar-nav ml-auto mt-2 mt-lg-0 ml-sm-0">
				<li class="nav-item active  mr-3 mr-sm-0">
					<a href="register.php"><button type="button" class="btn btn-success">Register</button></a>
				</li>
				<li class="nav-item active  mr-sm-0">
					<button type="button" class="btn btn-primary ml-2 " data-toggle="modal"
						data-target="#modelId">Login</button>
				</li>
			</ul>
		</nav>

		<!-- register  Modal
		<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header mx-auto">
						<img src="Images/logo2.jpg" alt="" style="width:70px; height:auto;">
						<div class="name_info">
							<h5 class="company_name ml-3" style="font-family: cursive;">Moti's Farm Management System
							</h5>
							<p class="additional_info ml-4" style="color: green;">Tasked with delivering the best</p>
						</div>
					</div>
					<div class="col-lg-11 mx-auto mt-1 px-3">
						<form action="conn_reg.php" method="post">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-2">
										<label for="">Customer Name</label>
										<input type="text" name="cname" id="" class="form-control" placeholder="" aria-describedby="helpId">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-2">
										<label for="">Customer Username</label>
										<input type="text" name="uname" id="" class="form-control" placeholder="" aria-describedby="helpId">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mb-2">
										<label for="">Email </label>
										<input type="email" name="email" id="" class="form-control" placeholder="abc@gmail" aria-describedby="helpId">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mb-2">
										<label for="">Address</label>
										<input type="text" name="address" id="" class="form-control" placeholder="" aria-describedby="helpId">
									</div>
								</div>
							</div>
							<div class="form-group mb-2">
								<label for="">Phone Number</label>
								<input type="text" name="number" id="" class="form-control" placeholder="" aria-describedby="helpId">
							</div>
							<div class="form-group mb-2">
								<label for="">Password</label>
								<input type="password" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
							</div>
							<center><a button type="submit" data-toggle="modal" href="#modelId" class="btn btn-primary">Submit</button></a></center>
							 <center><button type="submit" class="btn btn-primary mb-2">Submit</button></center> -->
		<!-- <p class="login_text mb-2">
			If you already have an account
			<span data-toggle="modal" data-target="#modelId" data-dismiss="modal"
				style="color: blue;text-decoration:underline;cursor:pointer"> click here</span>
		</p>
		</form> -->
	</div>

	</div>
	</div>
	</div> -->
	<!-- Modal -->
	<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header mx-auto">
					<img src="Images/logo2.jpg" alt="" style="width:70px; height:auto;">
					<div class="name_info">
						<h5 class="company_name ml-3" style="font-family: cursive;">Moti's Farm Management System
						</h5>
						<p class="additional_info ml-4" style="color: green;">Tasked with delivering the best</p>
					</div>
				</div>
				<div class="modal-body">
					<h5 class="mb-3" id="text" style="color:green;text-align:center;">Customer Login</h5>
					<h6 id="test" class="col-lg-12 mx-auto"></h6>
					<h6 id="result" class="col-lg-12 mx-auto"></h6>
					<form action="" method=" post">
						<div class="form-group mb-2 col-lg-10">
							<label class="sr-only" for="inlineFormInput">Username</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text" style="color: green;">
										<i class="fa fa-user mr-2" aria-hidden="true"></i>
									</div>
								</div>
								<input type="text" name="Username" id="username" class="form-control"
									placeholder="Username" aria-describedby="helpId">
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="sr-only" for="inlineFormInput">Username</label>
							<div class="input-group mb-2  col-lg-10">
								<div class="input-group-prepend">
									<div class="input-group-text" style="color: green;">
										<i class="fa fa-key mr-2" aria-hidden="true"></i>
									</div>
								</div>
								<input type="password" name="Password" id="password" class="form-control"
									placeholder="Password" aria-describedby="helpId">
							</div>
						</div>
						<div class="login mt-3">
							<center>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
								<button type="button" id="submit_button" class="btn btn-primary">Login</button>
							</center>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</ul>
	<div class="jumbotron mt-1 mb-5"
		style="background-image: url(Images/bg-3.jpg);background-size:cover;height: 512px;">
		<center>
			<h5 class="col-lg-4 display-4" style="color: white;">Let Us care <span style="color: yellow;">And
					Share Your Garden</span></h5>
			<p class="mb-2 col-lg-5" style="color: white;font-weight:bolder">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit amet vel atque facilis vero
				dolore odit,
			</p>

		</center>
		<div class="row mt-5">
			<div class="col-lg-4 d-md-inline d-lg-inline d-none">
				<div class="card text-black"
					style="background-image: url(images/syngenta.jpg);background-size:cover;opacity:100;width:85%;height:100%;">
					<div class="card-body">
						<h5 class="card-title" style="font-weight: 700; text-align:center">Syngenta</h5>
						<p class="card-text" style="font-weight: 700;">Syngenta AG is a provider of agricultural
							science and technology, in particular seeds and pesticides, with its management
							headquarters in Basel, Switzerland, and further locations in Chicago, Tel Aviv, and
							Shangha</p>
						<center><a href="https://www.syngenta.com/en" btn type="button" class="btn btn-success">READ
								MORE</a></center>
					</div>
				</div>
			</div>
			<div class=" col-lg-4 d-md-inline d-lg-inline d-none">
				<div class="card text-black"
					style="background-image: url(images/matsuri.jpg);background-size:cover;opacity:90;width:85%">
					<div class="card-body">
						<h5 class="card-title" style="font-weight: 700; text-align:center">MATSURI</h5>
						<p class="card-text" style="font-weight: 700;">Matsuri belongs to the
							Carboxinililde/Carboxamide group. It is effective both as a preventive and a curative
							fungicide. No fungicide has been registered with this unique mode of action for the
							control of sheath blight of paddy.</p>
						<center><button type="button" class="btn btn-success">READ MORE</button></center>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 d-md-inline d-lg-inline d-none">
				<div class="card text-black"
					style="background-image: url(Images/sevin.jpg);background-size:cover;opacity:90;width:85%">
					<div class="card-body">
						<h5 class="card-title" style="font-weight: 700; text-align:center">SEVIN</h5>
						<p class="card-text" style="font-weight: 700;">Sevin is a familiar insecticide brand name
							for home gardeners used to control insects in lawns, on ornamental plants, and on
							vegetables. Sevin and the active ingredient carbaryl are practically synonymous.</p>
						<center><button type="button" class="btn btn-success">READ MORE</button></center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
	<script src="index.js"></script>
</body>

</html>