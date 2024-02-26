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
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

   <?php   
   include "dbconnect.php"; 
   ?>

     <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    
    <a class="navbar-brand ml-5" href="#">
        <img src="images/logo.png" width="80" height="80" >
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <!-- <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i> -->
         </a>
          <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff; margin-left: 1000px;"  aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>




    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
    </div>
    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Customers</h4>
                    <h5 style="color:white;">
                    <?php
                        $sql="SELECT * from myuser ";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Menu Items</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from menu";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Table Booked</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from book_a_table";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Feedback</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from feedback";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
           
        </div>
        
    </div>
       


    <div class="d-flex" id="wrapper">

        <!-- Sidebar starts here -->

        <div class="sidebar" id="mySidebar">
            <div class="side-header">
                <img src="images/logo.png" width="120" height="120" > 
                <h5 style="margin-top:10px;">Hello, Admin</h5>
            </div>
            
            <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

            <div class="list-group list-group-flush my-3"> 
                <a href="dashboard.php" class="list-group list-group-item-action bg-transparent second-text fw-bold">
                     <i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="viewCustomer.php" class="list-group list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-users me-2"></i> Customers</a>
                <a href="viewAdmin.php" class="list-group list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-users me-2"></i> Admin</a>    
                <a href="viewMenu.php" class="list-group list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-list me-2"></i> Menu List</a>
                <a href="viewTableBooked.php" class="list-group list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-th-large me-2"></i> Table Booked</a>
                <a href="viewFeedback.php" class="list-group list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-th me-2"></i> Feedback</a>
                <a href="logout.php" class="list-group list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-project-diagram me-2"></i> Logout</a>
            </div>
        </div>
    </div>
   
    
    

    <script type="text/javascript" src="js/ajaxWork.js"></script>    
    <script type="text/javascript" src="js/script.js"></script>


 
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>