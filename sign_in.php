<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="Description" content="Enter your description here" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Title</title>
</head>

<body>
	<center>
		<!-- <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"> -->
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header mx-auto">
					<img src="./Images/logo2.jpg" alt="" style="width:70px; height:auto;">
					<div class="name_info">
						<h5 class="company_name ml-3" style="font-family: cursive;">Moti's Farm System
						</h5>
						<p class="additional_info ml-4" style="color: green;">Tasked with delivering the best</p>
					</div>
				</div>
				<div class="modal-body">
					<h5 class="mb-3" id="text" style="color:green;text-align:center;">Customer Login</h5>
					<h6 id="test" class="col-lg-12 mx-auto"></h6>
					<h6 id="result" class="col-lg-12 mx-auto"></h6>
					<form action="login.php" method=" post">
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
	</center>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>