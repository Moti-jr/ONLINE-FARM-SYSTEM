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
	<centre>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header mx-auto">
					<img src="Images/logo2.jpg" alt="" style="width:70px; height:auto;">
					<div class="name_info">
						<h5 class="company_name ml-3" style="font-family: cursive;">Moti's Farm System
						</h5>
						<p class="additional_info ml-4" style="color: green;">Tasked with delivering the best</p>
					</div>
				</div>
				<div class="col-lg-11 mx-auto mt-1 px-3">
					<form action="conn.php" method="post">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group mb-2">
									<label for="">Customer Name</label>
									<input type="text" name="cname" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group mb-2">
									<label for="">Customer Username</label>
									<input type="text" name="uname" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group mb-2">
									<label for="">Email </label>
									<input type="email" name="email" id="" class="form-control" placeholder="abc@gmail"
										aria-describedby="helpId">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group mb-2">
									<label for="">Address</label>
									<input type="text" name="address" id="" class="form-control" placeholder=""
										aria-describedby="helpId">
								</div>
							</div>
						</div>
						<div class="form-group mb-2">
							<label for="">Phone Number</label>
							<input type="text" name="number" id="" class="form-control" placeholder="username" required
								aria-describedby="helpId">
						</div>
						<div class="form-group mb-2">
							<label for="">Password</label>
							<input type="password" name="pass" id="" class="form-control" placeholder="password"
								required aria-describedby="helpId">
						</div>

						<center><button type="submit" class="btn btn-primary mb-2">Submit</button></center>
						<p class="login_text mb-2">
							If you already have an account
							<a href="sign_in.php"><span style="color: blue;text-decoration:underline;cursor:pointer">
									click here</span></a>
						</p>
					</form>
				</div>

			</div>
		</div>
	</centre>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>