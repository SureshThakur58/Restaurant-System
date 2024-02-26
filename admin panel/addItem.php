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
    <title>Add Menu Item</title>
    <style>
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 40%;
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
    <h2>Add Menu Item</h2>
    <form action="addItem.php" method="post" enctype="multipart/form-data">
        <label for="productname">Product Name:</label>
        <input type="text" id="productname" name="productname" placeholder="Enter product name" required>
        
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" placeholder="Enter description" required>
        
        <label for="price">Price:</label>
        <input type="number" id="price" name="price"  placeholder="Enter price" required>
        
        <label for="image">Select Image:</label>
        <input type="file" id="image" name="image"  required>
        <br>
        <button type="submit">Add Item</button>
    </form>
</body>
</html>

<?php
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Image upload handling
    $target_dir = "img/menu/"; // Specify the directory where you want to store the uploaded images
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $ImageUrl = $_FILES["image"]["name"];
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // File is an image - Perform additional checks if needed
    } else {
        echo "File is not an image.";
        exit();
    }

    // // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     exit();
    // }

    // Check file size (max 5MB)
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        exit();
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit();
    }

    // Move uploaded file to target directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insert new menu item into the database
        $image_url = $ImageUrl;
        $insert_sql = "INSERT INTO menu (productname, description, price, image_url) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("ssds", $productname, $description, $price, $image_url); // 's' indicates string type, 'd' indicates double type
        $stmt->execute();

        // Redirect to the page where you display the menu items
        header("Location: viewMenu.php");
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }
}
?>
