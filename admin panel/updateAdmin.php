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
} else {
    // Handle the case when UserID is not provided
    echo "";
    exit(); // Stop further execution
}

// Query to retrieve existing user data using prepared statement
$sql = "SELECT * FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // 'i' indicates integer type for the user ID
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Assuming your form submits to the same PHP file for processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $updated_name = $_POST['fullname'];
    $updated_email = $_POST['email'];
    $new_password = $_POST['password']; // New password input field
    $updated_number = $_POST['contactNumber'];
    
    // Update the user record in the database using prepared statement
    $update_sql = "UPDATE admin SET fullname = ?, email = ?, password = ?, contactNumber = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssi", $updated_name, $updated_email, $new_password, $updated_number, $id); // 's' indicates string type
    $stmt->execute();

    // Redirect to a confirmation page or do whatever you need
    header("Location: viewAdmin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 300px; /* Decreased width */
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 400px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        
    </style>
</head>
<body>
    <h2>Update Admin</h2>
    <form  method="post">
        <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" placeholder="Name" required><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="New Password" required><br>
        <input type="tel" name="contactNumber" value="<?php echo $row['contactNumber']; ?>" placeholder="Contact Number" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
