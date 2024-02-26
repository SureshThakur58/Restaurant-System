<?php

session_start();
if(!isset($_SESSION['Login']) || ($_SESSION['Login'])!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:adminlogin.php");
}
?>


<?php
// Step 1: Retrieve Data from Database
include "dbconnect.php";

$sql = "SELECT * FROM book_a_table";
$result = mysqli_query($conn, $sql);

// Check if any bookings are found
if (mysqli_num_rows($result) > 0) {
    // Step 2: Admin Verification and Send Email after Verification
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if the booking is already verified by admin
        if ($row['verified_by_admin'] == 0) {
            // Implement admin verification logic here
            // For demonstration purposes, let's assume all bookings are verified by admin
            $bookingID = $row['bookingID'];
            $updateSql = "UPDATE book_a_table SET verified_by_admin = 1 WHERE bookingID = $bookingID";
            mysqli_query($conn, $updateSql);

            // Send email only for verified bookings
            $to = $row['email'];
            $subject = "Your Booking Details";
            $message = "Dear " . $row['name'] . ",\n\n";
            $message .= "Thank you for your booking. Here are your booking details:\n\n";
            $message .= "Booking ID: " . $row['bookingID'] . "\n";
            $message .= "Name: " . $row['name'] . "\n";
            $message .= "Email: " . $row['email'] . "\n";
            $message .= "Phone Number: " . $row['phone_number'] . "\n";
            $message .= "Number of People: " . $row['no_of_people'] . "\n";
            $message .= "Date: " . $row['date'] . "\n";
            $message .= "Time: " . $row['time'] . "\n";
            $message .= "Message: " . $row['message'] . "\n";
            $message .= "\n\nBest Regards,\nRestro Nepal Team";

            // Set SMTP configuration dynamically
            ini_set("SMTP", "smtp.example.com");
            ini_set("smtp_port", "587");

            // Send email
            if (mail($to, $subject, $message)) {
                echo "Email sent successfully to " . $to . "<br>";
            } else {
                echo "Failed to send email to " . $to . "<br>";
            }
        }
    }
} else {
    echo "No bookings found.";
}

// Close the database connection
mysqli_close($conn);
?>
