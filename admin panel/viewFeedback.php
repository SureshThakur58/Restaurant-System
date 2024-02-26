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
    <title>Customers Feedback</title>
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
   
        <h2>Customers Feedback</h2>
       
        <?php
        include "dbconnect.php"; // Include your database connection file


        $sql = "SELECT fid, fullname, email, subject, message FROM feedback";
        $result = mysqli_query($conn, $sql);
        $count=1;

        if (mysqli_num_rows($result) > 0) {
          echo "<table border='1'>";
          echo "<tr><th>Feedback ID</th><th>Full Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>";
    
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $count++. "</td>";
            echo "<td>" . $row["fullname"]. "</td>";
            echo "<td>" . $row["email"]. "</td>";
            echo "<td>" . $row["subject"]. "</td>";
            echo "<td>" . $row["message"]. "</td>";
            echo "</tr>";
           }
          echo "</table>";
        } else {
        echo "No feedback found.";
        }


        mysqli_close($conn);
        ?>

  </body>
</html>













