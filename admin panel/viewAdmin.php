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
    <title>All Admin</title>
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
        <h2>Admin Information</h2>
        <div class="btn">
            <form action="addAdmin.php">
               <button type="submit" name="addAdmin"  >Add Admin</button>
            </form>
        </div>
        <table class="table">
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Adminname</th>
                <th class="text-center">Email</th>
                <th class="text-center">Password</th>
                <th class="text-center">Contact Number</th>
                <th class="text-center">Operations</th>
            </tr>
            <?php
            include "dbconnect.php";
            $sql = "SELECT * FROM admin";
            $result = mysqli_query($conn, $sql);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $row["fullname"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["password"] ?></td>
                <td><?= $row["contactNumber"] ?></td>
                <td>
                    <a href="updateAdmin.php?id=<?= $row["id"] ?>">Update |</a>
                    <a href="deleteAdmin.php?id=<?= $row["id"] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
