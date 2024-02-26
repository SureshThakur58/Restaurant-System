<?php
session_start();
if(!isset($_SESSION['Login']) || ($_SESSION['Login'])!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:adminlogin.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <style>
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="tel"],
        input[type="password"],
        input[type="email"] {
            width: 30%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Add Admin</h2>
    <form action="addAdmin.php" method="post" enctype="multipart/form-data">
        <label for="fullname">Admin Name:</label>
        <input type="text" id="fullname" name="fullname" placeholder="Enter Admin name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"  placeholder="Enter password" required>
        
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber"  required>
        <br> <br>
        <button type="submit">Add Item</button>
    </form>
</body>
</html>


<?php
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contactNumber'];
    
    // Insert admin data into the database
    $sql = "INSERT INTO admin (fullname, email, password, contactNumber) 
            VALUES ('$fullname', '$email', '$password', '$contactNumber')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New Admin Added Successfully')</script>";
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: viewAdmin.php");
    // Close the database connection
    $conn->close();
}
?>


