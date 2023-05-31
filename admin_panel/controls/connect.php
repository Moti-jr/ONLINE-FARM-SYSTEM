<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'farm';

$conn = new mysqli($servername, $username, $password, $dbname);

$name = "";
$password = "";
$errors = array();

if (isset($_POST['login'])) {
	$name = mysqli_escape_string($conn, $_POST['Username']);
	$password = mysqli_escape_string($conn, $_POST['Password']);

	if (empty($name)) {
		array_push($errors, "name is required");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}

	if (count($errors) == 0) {

		$query = "SELECT * FROM `admins` WHERE `admin_name`= '$name' AND `Password`='$password'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['admin_name'] = $name;
			$_SESSION['message'] = "YOU ARE LOGGED IN" . $_SESSION['admin_name'];
			header('location:../index.php');
		} else {
			array_push($errors, "WRONG NAME OR PASSWORD");
			header("location:../pages/login.php");
		}
	}
}