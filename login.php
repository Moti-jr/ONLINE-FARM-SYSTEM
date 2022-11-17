<?php
session_start();
$Message = "";
$Username = "";
$Password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'farm';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        echo "Connection Failed" . mysqli_error($conn);
    } else {
        $Username = $_POST['username'];
        $Password = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE `Customer UserName` = '$Username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($Password == $row['Password']) {

                    $_SESSION['Id'] = $row['Id'];
                    $Message = '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <center><strong style="font-size:15px;padding-top:1px;padding-bottom:1px;">Login Successful</strong> </center>
                    </div>
                    <center><img src="Images/' . $row['File'] . '" alt="" style="width:200px;height:200px;border-radius:50%;box-shadow:2px 2px 10px;"></center>
                    <h6 class="mt-2" style="text-align:center;color:green">Welcome ' . $Username . '</h6>
                    <center>  <a href="index.php?Id=' . $_SESSION['Id'] . '" rel="noopener noreferrer"><button type="button" class="btn btn-success mt-3">Click to confirm it is You</button></a></center>
                    ';
                } else {
                    $Message = '<div class="alert alert-danger alert-dismissible fade show  mt-2 " role="alert">
                    <strong>Wrong Password</strong> 
                  </div>';
                }
            }
        } else {
            $Message = '<div class="alert alert-danger alert-dismissible fade show  mt-2 " role="alert">
            <strong>User Does not Exist</strong> 
          </div>';
        }
    }
}
echo $Message;