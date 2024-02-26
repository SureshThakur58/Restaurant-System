<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
  echo"<script>alert('Please login first!');  </script>";
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
<?php
include "connect.php";

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
                    <img src="' . $row["image_url"] . '" class="menu-img" alt="">
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

</body>
</html>