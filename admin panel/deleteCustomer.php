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
if(isset($_GET['UserID'])) {
    $user_id = $_GET['UserID'];

    // Delete the user record from the database
    $sql = "DELETE FROM myuser WHERE UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id); // 'i' indicates integer type for the user ID
    $stmt->execute();

    // Redirect back to the index page after deletion
    header("Location: viewCustomer.php");
    exit();
} else {
    // Handle the case when UserID is not provided
    echo "";
    exit(); // Stop further execution
}
?>
