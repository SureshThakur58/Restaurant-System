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
    <title>All Customers</title>
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
    </style>
</head>
<body>
    <div>
        <h2>All Customers</h2>
        <table class="table">
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Username</th>
                <th class="text-center">Email</th>
                <th class="text-center">Password</th>
                <th class="text-center">Operations</th>
            </tr>
            <?php
            include "dbconnect.php";
            $sql = "SELECT * FROM myuser";
            $result = mysqli_query($conn, $sql);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $row["fullname"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["password"] ?></td>
                <td>
                    <a href="updateCustomer.php?UserID=<?= $row["UserID"] ?>">Update |</a>
                    <a href="deleteCustomer.php?UserID=<?= $row["UserID"] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
