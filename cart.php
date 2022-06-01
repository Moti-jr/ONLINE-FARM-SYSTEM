<?php
include("connect.php");
$product_id = $_POST['product_id'];
$UserId = $_POST['UserId'];
$Price = $_POST['Price'];
$sql = "SELECT * FROM `cart_info` WHERE `UserId`= $UserId AND `ProductId` = $product_id";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
    $sql = "SELECT * FROM `cart_info` WHERE `UserId` =  '$UserId'";
    $cart = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($cart);
    $Message = "<script>alert('Product Has Already Been Added to The Cart')</script>";
    header("Location:index.php");
    /*   echo $num; */
} else {
    $sql = "INSERT INTO `cart_info`(`UserId`, `ProductId`,`Price`,`Quantity`,`Amount`) VALUES ('$UserId','$product_id','$Price',1,'$Price')";
    if ($result = mysqli_query($connection, $sql)) {
        $sql = "SELECT * FROM `cart_info` WHERE `UserId` =  '$UserId'";
        $cart = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($cart);
        $Message = "<script>alert('Product Added to The Cart')</script>";
        header("Location:index.php");
        /*  echo $num; */
    }
}
echo $Message;