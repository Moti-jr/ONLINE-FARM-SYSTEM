<?php
include("../controls/links.php");
include("../controls/links.php");
include("../controls/connect.php");
?>

<h5 style="justify-content:center ;margin-left:500px;margin-right:400px;margin-top:200px;"
	class="nav-item active  mr-3 mr-sm-0">
	<button type="button" class="btn btn-success">Register</button>
	<button type="button" class="btn btn-primary ml-2 " data-toggle="modal" data-target="#modelId">Login</button>
</h5>
<?php include("../controls/error.php"); ?>

<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header mx-auto">
				<img src="../Images/logo2.jpg" alt="" style="width:70px; height:auto;">
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
				<form action="" method="POST">

					<div class="form-group mb-2 col-lg-10">
						<label class="sr-only" for="inlineFormInput">Username</label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text" style="color: green;">
									<i class="fa fa-user mr-2" aria-hidden="true"></i>
								</div>
							</div>
							<input type="text" name="Username" id="username" class="form-control" placeholder="Username"
								aria-describedby="helpId">
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
							<button type="submit" name="login" id="submit_button" class="btn btn-primary">Login</button>
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>