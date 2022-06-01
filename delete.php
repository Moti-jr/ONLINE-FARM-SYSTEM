<?php
include("connect.php");
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$order_id = $_POST['order_id'];
	// echo $order_id . "<br>";

	$sql = "SELECT * FROM `cart_info` WHERE  `cart_info`.`Id` = '$order_id'";
	$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($Quantity = mysqli_fetch_assoc($result)) {
			$price = $Quantity['Price'];
			if ($Quantity['Quantity'] < 1) {
				$message = '<div class="alert alert-danger" role="alert">
	            <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Minimum Value reached</strong>
	            </div>';
				header("Location:cart_info.php");
			} else {
				$order_id = $Quantity['Id'];
				$Quantity = $Quantity['Quantity'];
				$newQuantity = $Quantity - 1;
				$Amount = $newQuantity * $price;

				echo $Amount;

				$sql = "UPDATE `cart_info` SET `Quantity`='$newQuantity',`Amount`='$Amount' WHERE `cart_info`.`Id` = '$order_id'";
				if ($exp_result = mysqli_query($connection, $sql)) {
					$message = '<div class="alert alert-success" role="alert">
	                <strong><i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Successfully subtracted  product</strong>
	                </div>';
					header("Location:cart_info.php");
				} else {
					$message = '<div class="alert alert-danger" role="alert">
	                <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error Adding Deleting Product' .  mysqli_error($connection) . '</strong>
	                </div>';
					header("Location:cart_info.php");
				}
			}
		}
	}
}
echo $message;