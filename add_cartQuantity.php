<?php
include("connect.php");
$cart_quantity = $_POST['cart_quantity'];
$UserId = $_POST['UserId'];
$ProductId = $_POST['ProductId'];

$sql = "SELECT * FROM `cart_info` WHERE productId =  $ProductId and UserId = $UserId";
$cart_quantity = mysqli_query($connection, $sql);
foreach ($cart_quantity as $cart_quantity) {
    $CartId = $cart_quantity['Id'];
    $prev_cartQuantity = $cart_quantity['Quantity'];
    $new_quantity = $prev_cartQuantity + 1;
    $sql = "UPDATE `cart_info` SET `Quantity` = '$new_quantity' WHERE `cart_info`.`Id` = '$CartId'";
    if ($result = mysqli_query($connection, $sql)) {
        $sql = "SELECT Quantity FROM `cart_info` WHERE `cart_info`.`Id` = '$CartId'";
        $newResult = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($newResult)) {
            $Quantity = $row['Quantity'];
            $sql = "SELECT per_unit FROM `products` WHERE  `product_id` = '$ProductId'";
            $price = mysqli_query($connection, $sql);
            foreach ($price as $price) {
                $Amount = $price['per_unit'] * $Quantity;
                $sql = "UPDATE `cart_info` SET `Amount` = '$Amount' WHERE `cart_info`.`Id` = '$CartId'";
                if ($result = mysqli_query($connection, $sql)) {
                    $sql = "SELECT SUM(Amount)  as Amount FROM `cart_info` WHERE UserId = $UserId";
                    $total = mysqli_query($connection, $sql);
                    foreach ($total as $Total) {
                        $Total = $Total['Amount'];
                        $Tax = 0.07 * $Total;
                        $Tax = (int)$Tax;
                        $T_Payable = $Total + $Tax;
                        echo json_encode(["Amount" => $Amount, "Quantity" => $Quantity, "Total" => $Total, "Tax" => $Tax, "T_Payable" => $T_Payable]);
                    }
                }
            }
        }
    }
}