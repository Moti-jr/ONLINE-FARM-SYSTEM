<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'farm';

$connect = new mysqli($servername, $username, $password, $dbname);
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_Id = $_POST['UserId'];
    $Product_Id = $_POST['product_id'];
    // $Product_name = $_POST['Product_name'];
    $Product_price = $_POST['Price'];
    $sql = "SELECT * FROM `cart_info` WHERE `UserId` = '$user_Id' AND `ProductId` = '$Product_Id'";
    if ($result = mysqli_query($connect, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($user_Id == $row['UserId']) {
                    $message = '<div class="alert alert-danger" role="alert">
                    <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> You Have Already Made This Order</strong>
                    </div>';
                    $sql = "SELECT * FROM `cart_info` WHERE `UserId` = '$user_Id'";
                    if ($result = mysqli_query($connect, $sql)) {
                        $num = mysqli_num_rows($result);
                        $Message = "Product Added Successfully";
						header("Location:index.php");
                    }
                }
            }
        } else {
            $sql = "INSERT INTO `cart_info` (`UserId`,`ProductId`,`Quantity`,`Price`,`Amount`) VALUES('$user_Id','$Product_Id',1,'$Product_price', '$Product_price')";
            if ($result = mysqli_query($connect, $sql)) {
                $message = '<div class="alert alert-success" role="alert">
                    <strong><i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> ORDER ADDED TO CART</strong>
                    </div>';
                $sql = "SELECT * FROM `cart_info` WHERE `UserId` = '$user_Id'";
                if ($result = mysqli_query($connect, $sql)) {
                    $num = mysqli_num_rows($result);
                    $Message = "Product Added Successfully";
					header("Location:index.php");
                }
            } else {
                $message = '<div class="alert alert-danger" role="alert">
                <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> UKNOWN ERROR ADDING PRODUCT TO CART ' . mysqli_error($connect) . '</strong>
                </div>';
				header("Location:index.php");
            }
        }
    } else {
        echo "CONNECTION NOT SUCCESSFUL" . mysqli_error($connect);
    }
}