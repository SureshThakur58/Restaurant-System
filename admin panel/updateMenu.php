<?php

session_start();
if(!isset($_SESSION['Login']) || ($_SESSION['Login'])!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:adminlogin.php");
}
?>


<?php
include "dbconnect.php";

// Check if ItemID is provided in the URL
if(isset($_GET['ItemID'])) {
    $item_id = $_GET['ItemID'];
} else {
    // Handle the case when ItemID is not provided
    echo "ItemID is missing.";
    exit(); // Stop further execution
}

// Query to retrieve existing menu item data using prepared statement
$sql = "SELECT * FROM menu WHERE ItemID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $item_id); // 'i' indicates integer type for the item ID
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Assuming your form submits to the same PHP file for processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $updated_productname = $_POST['productname'];
    $updated_description = $_POST['description'];
    $updated_price = $_POST['price'];
    
    // Handle file upload
    $target_directory = "img/menu/"; // Directory where images will be stored
    $target_file = $target_directory . basename($_FILES["image"]["name"]);
    $ImageUrl = $_FILES["image"]["name"];  // File path of the uploaded image
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); // Move uploaded file to target directory
    
    // Update the menu item record in the database using prepared statement
    $update_sql = "UPDATE menu SET productname = ?, description = ?, price = ?, image_url = ? WHERE ItemID = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssdsi", $updated_productname, $updated_description, $updated_price, $ImageUrl, $item_id); // 's' indicates string type, 'd' indicates double type, 'i' indicates integer type
    $stmt->execute();

    // Redirect to a confirmation page or do whatever you need
    header("Location: viewMenu.php"); // Redirect to the page where you display the updated menu
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Menu Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 15px;
            border-radius: 4px;
        }

        .file-upload-label {
            font-size: 16px;
            cursor: pointer;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            width: 20%;
            text-align: center;
            display: block;
        }
        img {
         max-width: 200px; /* Set the maximum width */
         max-height: 200px; /* Set the maximum height */
         height: auto;
         margin-top: 15px;
         border-radius: 4px;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Menu Item</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="productname" value="<?php echo $row['productname']; ?>" placeholder="Product Name" required>
            <input type="text" name="description" value="<?php echo $row['description']; ?>" placeholder="Description" required>
            <input type="number"  name="price" value="<?php echo $row['price']; ?>" placeholder="Price" required>
            <label for="image" class="file-upload-label">Choose Image</label>
            <input type="file" name="image" id="image" accept="image/*" style="display: none; size:50px" onchange="previewImage(event)" required>
            <img id="image-preview" src="../admin panel/img/menu/<?php echo $row['image_url']; ?>" alt="Image Preview"> <br>
            <button type="submit" style="width: 25%; text-align:center "> Update</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            var imagePreview = document.getElementById('image-preview');
            imagePreview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>
