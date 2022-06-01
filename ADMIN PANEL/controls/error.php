<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>
<div class="container">
    <div class="col-lg-6 mx-auto mt-2 justify-content-center py-auto">
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="">
          <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="form-group">
          <label for="">Enter Name</label>
          <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" name="" id="" placeholder="">
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html> -->

<?php
$error = "";
if (count($errors) > 0) : ?>
<div class="error">

	<?php
    foreach ($errors as $error) : ?>
	<p> <?php echo $error; ?></p>
</div>
<?php endforeach ?>
<?php endif ?>