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
    <title>Menu Items</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
        }
        .btn button[type="submit"] {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 12px;
    }

    .btn button[type="submit"]:hover {
        background-color: #45a049; /* Darker Green */
    }

    </style>
</head>
<body>
   
    
    <div>
        <h2>Menu Items</h2>
        <div class="btn">
            <form action="addItem.php">
               <button type="submit" name="addItem"  >Add Item</button>
            </form>
        </div>
        <table class="table">
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Price</th>
                <th class="text-center">Image</th>
                <th class="text-center">Operations</th>
            </tr>
            <?php
            include "dbconnect.php";
            $sql = "SELECT * FROM menu";
            $result = mysqli_query($conn, $sql);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $row["productname"] ?></td>
                <td><?= $row["description"] ?></td>
                <td><?= $row["price"] ?></td>
                <td><img src='../admin panel/img/menu/<?= $row["image_url"] ?>' width='100' height='100'></td>
                <!-- <td><img src="../admin panel/img/"></td> -->
                <td>
                    <a href="updateMenu.php?ItemID=<?= $row["ItemID"] ?>">Update |</a>
                    <a href="deleteMenu.php?ItemID=<?= $row["ItemID"] ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
