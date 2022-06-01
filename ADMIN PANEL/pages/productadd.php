
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'farm';

$conn = new mysqli($servername, $username, $password, $databasename);
if (!$conn) {
    echo ("Connection Failed");
} else {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $weight = $_POST['weight'];
    $unit = $_POST['unit'];
    $previous_price = $_POST['previous_price'];
    $per_unit = $_POST['per_unit'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $search_term = $_POST['search_term'];

    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $folder = "Images/" . $filename;

    $sql = "INSERT INTO `products`(`name`, `description`, `weight`, `unit`, `previous_price`, `per_unit`, `category`, `img`, `color`, `search_term`) VALUES ('$name','$description','$weight','$unit','$previous_price','$per_unit','$category','$filename','$color','$search_term')";

    if (mysqli_query($conn, $sql)) {
        echo "Successfully Added to Database";
    } else {
        echo "Error" . $sql . " . " . mysqli_error($conn);
    }

    if (move_uploaded_file($tmp_name, $folder)) {
        $msg = "IMAGE UPLOADED SUCCESSFULLY";
    } else {
        $msg = "FAILED TO UPLOAD IMAGE";
    }
}
