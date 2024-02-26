<?php

session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:login.php");
}

?>


<?php
include "connect.php";
// Function to sanitize form data
function sanitizeData($data)
{
  return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the form is submitted
if (isset($_POST["submits"])) {
  // Sanitize form data
  $name = sanitizeData($_POST["name"]);
  $email = sanitizeData($_POST["email"]);
  $phone = sanitizeData($_POST["phone_number"]);
  $date = date('Y-m-d', strtotime(sanitizeData($_POST["date"])));
  $time = sanitizeData($_POST["time"]);
  $people = sanitizeData($_POST["no_of_people"]);
  $message = sanitizeData($_POST["message"]);

  // //when submit button clicked
  //     if (isset($_POST["submit"])) {
  //         
  //         $name = $_POST["name"];
  //         $email = $_POST["email"];
  //         $phone = $_POST["phone_number"];
  //         $date = $_POST["date"];
  //         $time = $_POST["time"];
  //         $people = $_POST["no_of_people"];
  //         $message = $_POST["message"];

  // SQL query to insert data into the table
  $sql = "INSERT INTO book_a_table (name, email, phone_number, no_of_people, date, time, message)
            VALUES ('$name', '$email', '$phone', '$people','$date', '$time', '$message')";
  $result = mysqli_query($conn, $sql);
  if ($result == TRUE) {
    echo "<script>alert('Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!');</script>";
  }
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Add these lines at the end of your head section -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b4gtI9YvbN3Isibq9t1PDfO2w/gpHZbW/H6I+Fu4DZsl4HbNUHV79d32LwC8ZTtB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body>
  <section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Reservation</h2>
        <p>Book a Table</p>
      </div>

      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required data-rule="email" data-msg="Please enter a valid email">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Your Phone" required data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3">
            <input type="date" name="date" class="form-control" id="date" placeholder="Date" required data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3">
            <input type="time" class="form-control" name="time" id="time" placeholder="Time" required data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3">
            <input type="number" class="form-control" name="no_of_people" id="people" placeholder="# of people" required data-rule="minlen:1" data-msg="Please enter at least 1 chars">
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          <div class="validate"></div>
        </div>
        <div class="mb-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit" name="submits">Book a Table</button></div>


      </form>
    </div>
    </div>
  </section>


</body>

</html>