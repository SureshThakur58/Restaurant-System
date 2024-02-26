<?php

session_start();
if(!isset($_SESSION['Login']) || ($_SESSION['Login'])!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:adminlogin.php");
}
?>


<?php
include "dbconnect.php";

if(isset($_GET['ItemID'])) {
    $item_id = $_GET['ItemID'];
} else {
    echo "";
    exit();
}

$sql = "DELETE FROM menu WHERE ItemID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $item_id);
$stmt->execute();

header("Location: viewMenu.php");
exit();
?>
