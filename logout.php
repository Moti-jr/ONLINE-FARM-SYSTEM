<?php
session_start();
unset($_SESSION['Id']);
header("location:home.php");