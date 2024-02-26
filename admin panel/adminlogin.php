
<?php   
   include "dbconnect.php"; 
   ?>
<?php
session_start();
if(isset($_POST['Login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(!empty($email)&&!empty($password)){
        $sql="SELECT * FROM admin WHERE email='$email' AND password='$password' ";
        $result=mysqli_query($conn,$sql);  
        
        $num=mysqli_num_rows($result);
        if($num>0){
            $_SESSION['email']=$email;
            $_SESSION['Login']=true;
     
       header("location:dashboard.php");

        }
        else{
            echo"<script>alert('Invalid User');</script>";
        }
    }
    
}
?>










<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel Login</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f1f1f1;
    }
    
    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .login-container input[type="email"],
    .login-container input[type="password"],
    .login-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }
    
    .login-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    
    .login-container input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Panel Login</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" name="Login" value="Login">
        </form>
    </div>
</body>
</html>
