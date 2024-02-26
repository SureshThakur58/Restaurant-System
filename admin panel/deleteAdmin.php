<?php

session_start();
if(!isset($_SESSION['Login']) || ($_SESSION['Login'])!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:adminlogin.php");
}
?>


<?php
include "dbconnect.php";

// Check if UserID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the user record from the database
    $sql = "DELETE FROM admin WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // 'i' indicates integer type for the user ID
    $stmt->execute();

    // Redirect back to the index page after deletion
    header("Location: viewAdmin.php");
    exit();
} else {
    // Handle the case when UserID is not provided
    echo "";
    exit(); // Stop further execution
}
?>
