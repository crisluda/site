<?php
ob_start();
$timezone = date_default_timezone_set("Africa/Accra");
$con = mysqli_connect("localhost", "root", "mysql", "romo");

if(mysqli_connect_errno()) {
  echo "Failed to connect: " . mysqli_connect_errno();
}


 ?>
