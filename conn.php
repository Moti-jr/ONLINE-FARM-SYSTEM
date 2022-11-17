<?php
$severname = "localhost";
$username = "root";
$password = "";
$databasename = "farm";
//database connection
$conn = new mysqli($severname, $username, $password, $databasename);

if (!$conn) {
	echo ("connection failed") . mysqli_error($conn);
} else {
	$cname = $_POST['cname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$number = $_POST['number'];
	$pass = $_POST['pass'];

	$sql = "INSERT INTO `users`(`Customer Name`, `Customer Username`, `Email`, `Address`, `Phone Number`, `Password`) VALUES ('$cname','$uname','$email','$address','$number','$pass')";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		echo ("Data Not Inserted") . mysqli_error($conn);
	} else {
		header("Location:sign_in.php");
	}
}