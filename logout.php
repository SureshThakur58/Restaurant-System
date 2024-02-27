<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:login.php");
}

?>

<?php
session_start();
session_unset();
session_destroy();
header("location:login.php");
?>