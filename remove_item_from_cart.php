<?php
include("connect.php");
if (isset($_POST)) {
	$productId = $_POST['order_id'];
	$userId = $_POST['user_Id'];

	$sql = "DELETE FROM cart_info WHERE ProductId ='$productId' AND UserId ='$userId'";
	if ($result = mysqli_query($connection, $sql)) {
		header("location:cart_info.php?message = Item Deleted Successfully");
	}
}