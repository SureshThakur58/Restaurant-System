<?php
include 'dbconnect.php';
session_start();
if(!isset($_SESSION['Login']) || $_SESSION['Login']!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:adminlogin.php");
}

?>

<?php
session_start();
session_unset();
session_destroy();
header("location:adminlogin.php");
?>