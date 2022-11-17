<?php
// echo "Hello";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farm";

if ($conn = new mysqli($servername, $username, $password, $dbname)) {
} else {
    echo mysqli_error($conn);
}