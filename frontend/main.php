<?php

session_start();
if(!isset($_SESSION['login']) || ($_SESSION['login'])!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:login.php");
}
?>

<?php
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="style.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
  <div id="topbar" class="d-flex align-items-center fixed-top"> </div>
    <div class="container d-flex justify-content-center justify-content-md-between"> </div>


   <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
      <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html" style="text-decoration: none; color: #cda45e;"><span>Restro</span> <br>NEPAL</a></h1> -->
      <a href="index.html" class="logo me-auto me-lg-0"><img src="img/logo.jpeg"  class="img-fluid "></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i id="mobileNavToggle" class="bi bi-list mobile-nav-toggle"></i>
        
      </nav>
      <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Restro Nepal</span></h1>
          <h2>Delivering great food for more than 18 years!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
          </div>
        </div>
        <!-- <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="glightbox play-btn"></a>
        </div> -->

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <br>
            <h3>Welcome To Restro Nepal</h3>
              <br>
            <p class="fst-italic">
              Restro Nepal is known for creating unforgettable food experiences. We believe that food is therapy and try to put up a smile on your face with our culinary skills.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Our journey began with a passion for delivering exceptional dining experiences. </li>
              <li><i class="bi bi-check-circle"></i> What sets us apart is not just our delicious food, but also the commitment to providing impeccable service.</li>
              <li><i class="bi bi-check-circle"></i> We provide a wide range of cuisines and dishes to choose from so that every foodie in town has their best experience with us.</li>
            </ul>
            <p>
             Our vision is to create an ultimate destination for every food lover in town and lead them to an extraordinary foods. <br> Thank you for choosing Restro Nepal. Whether you're a first-time visitor or a familiar face, we look forward to sharing our culinary passion with you and creating memories that last a lifetime.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Restaurant</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Online Convenience:</h4>
              <p>Effortlessly plan your visit with online reservations and easy-to-use ordering options.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Delicious Food:</h4>
              <p>Our chefs cook up mouthwatering dishes and culinary masterpieces that redefine taste.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4> Events and Entertainment:</h4>
              <p>Promote special events, theme nights, or entertainment options. Showcase a vibrant social scene or community engagement.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

     <!-- ======= Menu Section ======= -->

     
     
<?php


// SQL query to retrieve menu items
$sql = "SELECT * FROM menu";
$result=mysqli_query($conn,$sql);
?>


<!-- ======= Menu Section ======= -->
<section id="menu" class="menu section-bg">
 <div class="container" data-aos="fade-up">

   <div class="section-title">
     <h2>Menu</h2>
     <p>Check Our Tasty Menu</p>
   </div>
  <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
        <?php
           while ($row = mysqli_fetch_assoc($result)) {
    
             echo '

                <div class="col-lg-6 menu-item ">
                    <img src="../admin panel/img/menu/' . $row["image_url"] . '" class="menu-img" alt="">
                    <div class="menu-content">
                      <a href="#">' . $row["productname"] . '</a><span>' ."Rs ". $row["price"] . '</span>
                    </div>
                    <div class="menu-ingredients">
                      ' . $row["description"] . '
                    </div>
                </div>';

           }
        ?>
    </div>
   </div>
</section>




     <!-- End Menu Section -->

<!-- Event Section -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Organize Your Events in our Restaurant</p>
        </div>

        <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="img/event-birthday.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Birthday Parties</h3>
                  <div class="price">
                    <p><span>RS 20000</span></p>
                  </div>
                  <p class="fst-italic">
                    Host Unforgettable Birthday Parties with Us!
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Personalize the space with decorations that match the birthday theme. </li>
                    <li><i class="bi bi-check-circled"></i> Enjoy stress-free planning with our customizable birthday packages.</li>
                    <li><i class="bi bi-check-circled"></i> Elevate the celebration with entertainment options with live music, DJs.</li>
                  </ul>
                  <p>
                    Our restaurant offers versatile spaces suitable for both intimate gatherings and larger parties. Choose the setting that suits your vision for the perfect birthday celebration.
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="img/event-private.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Private Parties</h3>
                  <div class="price">
                    <p><span>Rs 50000</span></p>
                  </div>
                  <p class="fst-italic">
                    Create Lasting Memories with Family at Restro Nepal!
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Our diverse menu options cater to every family member's taste.</li>
                    <li><i class="bi bi-check-circled"></i> Enjoy your family time in our spacious and comfortable seating areas. </li>
                    <li><i class="bi bi-check-circled"></i> Keep everyone entertained with our family-friendly entertainment options.</li>
                  </ul>
                  <p>
                    Choose Restro Nepal for a family celebration that combines excellent food, a welcoming atmosphere, and a touch of personalization. We look forward to hosting your family's special moments!
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="img/event-custom.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Parties</h3>
                  <div class="price">
                    <p><span>Rs 30000</span></p>
                  </div>
                  <p class="fst-italic">
                    Craft Your Perfect Event at Restro Nepal!
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Elevate your celebration with a customized beverage selection. </li>
                    <li><i class="bi bi-check-circled"></i> Transform our space into the setting of your dreams.</li>
                    <li><i class="bi bi-check-circled"></i> Capture the uniqueness of your celebration in our stylish and photo venue.</li>
                  </ul>
                  <p>
                    Choose Restro Nepal for a custom party experience that goes beyond expectations. From unique decor to personalized menus, we're here to make your event truly special.
                  </p>
                </div>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->


 <!-- ======= Book A Table Section ======= -->

 
<?php
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
            <input type="text" name="date" class="form-control" id="datepicker" placeholder="Date" >
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3">
            <input type="time" class="form-control" name="time" id="timeInput" min="09:00" max="22:00" placeholder="Time" required data-rule="minlen:4" data-msg="Please enter at least 4 chars">
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



 <!-- End Book A Table Section -->



<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">

  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Gallery</h2>
      <p>Some photos from Our Restaurant</p>
    </div>
  </div>

  <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-0">

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-1.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-2.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-3.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-4.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-5.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-6.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-7.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-8.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Gallery Section -->


<!-- ======= Contact Section ======= -->

<?php



// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Sanitize form data
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];



    // SQL query to insert data into the table
    $sql = "INSERT INTO feedback (fullname, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";
      $result=mysqli_query($conn, $sql);
    if ($result == TRUE) {
      echo "<script>alert('Feedback submitted Sucessfully. Thank you!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
}
?>


<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Contact</h2>
      <p>Contact Us</p>
    </div>
  </div>

  

  <div class="container" data-aos="fade-up"><div data-aos="fade-up">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.485628672451!2d85.33616337428421!3d27.671381676203065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19e8af4a5fe3%3A0x963d00cdf478c6b6!2sNepal%20College%20of%20Information%20Technology!5e0!3m2!1sen!2snp!4v1705507807854!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>Balkumari, Lalitpur</p>
          </div>

          <div class="open-hours">
            <i class="bi bi-clock"></i>
            <h4>Open Hours:</h4>
            <p>
              Monday-Sunday:<br>
              09:00 AM - 10:00 PM
            </p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>sureshsh123456789@gmail.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+9779814291500</p>
            <p>+9779866639911</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit" name="submit" >Send Message</button></div>
        </form>

      </div>

    </div>

  </div>
</section>


<!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-md-6">
        <div class="footer-info">
          <h3>Restro Nepal</h3>
          <p>
             <br>
            Balkumari, Lalitpur<br>Nepal<br>
            <strong>Phone:</strong> +9779814291500<br>
            <strong>Email:</strong> sureshsh123456789@gmail.com<br>
          </p>
          <!-- <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.facebook.com/" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div> -->
        </div>
      </div>

      <div class="col-lg-4 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Delicious Dining Experience</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Catering for Events</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Book A Table</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Private Dining Rooms</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Special Events and Celebrations</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

  <script src="js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  
  
  
  
<!-- JavaScript code to handle time selection and limit-->

  <script>

// Get the time input element
const timeInput = document.getElementById('timeInput');

// Add event listener to validate the selected time
timeInput.addEventListener('change', function() {
    const selectedTime = timeInput.value;
    
    // Convert selected time to hours and minutes
    const selectedHour = parseInt(selectedTime.split(':')[0]);
    
    // Check if selected time is within the allowed range
    if (selectedHour < 9 || selectedHour >= 22) {
        alert('Please select a time between 9:00 AM and 10:00 PM.');
        timeInput.value = ''; // Reset the input value
    }
});
</script>


<!--  JavaScript code to handle date selection and limit-->

<script>
$(document).ready(function() {
    // Get current date
    var currentDate = new Date();
    
    // Calculate recent date (today)
    var recentDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate());
    
    // Calculate future date (2 days from today)
    var futureDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() + 2);
    
    // Initialize date picker
    $('#datepicker').datepicker({
        dateFormat: 'mm/dd/yy', // Date format: mm/dd/yy
        minDate: recentDate,    // Minimum selectable date
        maxDate: futureDate     // Maximum selectable date
    });
});
</script>

</body>
</html>