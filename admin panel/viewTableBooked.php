<?php

session_start();
if(!isset($_SESSION['Login']) || ($_SESSION['Login'])!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:adminlogin.php");
}
?>


<?php
include "dbconnect.php";

// Query to retrieve data from the book_a_table table
$sql = "SELECT * FROM book_a_table";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
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
    </style>
</head>
<body>
    <h2>Bookings</h2>
    <?php
// // Include dbconnect.php for database connection
// include "dbconnect.php";

// // Retrieve data from book_a_table
// $sql = "SELECT * FROM book_a_table";
// $result = mysqli_query($conn, $sql);

// Display bookings with verification option for admin
echo "<table border='1'>
        <tr>
            <th>Booking ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>No. of People</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
            <th>Created At</th>
            <th>Verified by Admin</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>" . $row['bookingID'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['phone_number'] . "</td>
            <td>" . $row['no_of_people'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['time'] . "</td>
            <td>" . $row['message'] . "</td>
            <td>" . $row['createdAt'] . "</td>
            <td>";

    // Check if the booking is verified by admin
    if ($row['verified_by_admin'] == 1) {
        echo "Yes";
    } else {
        echo "<form method='post' action='verify_booking.php'>
                <input type='hidden' name='bookingID' value='" . $row['bookingID'] . "'>
                <button type='submit'>Verify</button>
              </form>";
    }

    echo "</td></tr>";
}

echo "</table>";
?>

</body>
</html>
