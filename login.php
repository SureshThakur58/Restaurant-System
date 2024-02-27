
<!------For Register php code--------->

<?php
include "connect.php";
if(isset($_POST['register'])){
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(!empty($fullname)&&!empty($email)&&!empty($password)){
        $sql="SELECT * FROM myuser WHERE email='$email' ";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num<1){
            $sql="
            INSERT INTO myuser(fullname,email,password)
            VALUES('$fullname','$email','$password');
            ";

            $result=mysqli_query($conn,$sql);
            if($result){
                 setcookie($email,'email',+3600);
            }
        }
        else{
            echo"<script>alert('Email Already Exist');</script>";
        }
    }
}
?>


<!------For Login php code ------->


<?php
session_start();
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(!empty($email)&&!empty($password)){
        $sql="SELECT * FROM myuser WHERE email='$email' AND password='$password' ";
        $result=mysqli_query($conn,$sql);  
        
        $num=mysqli_num_rows($result);
        if($num>0){
            $_SESSION['email']=$email;
            $_SESSION['login']=true;
     
       header("location:main.php");

        }
        else{
            echo"<script>alert('Invalid User');</script>";
        }
    }
    
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register page</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <div class="account_page">
           
        
        <div class="header">
            <div class="container1">
                <h1 style="margin: 15px;">Welcome to <span style="font-size: 50px; color: #cda45e;">Restro Nepal</span></h1>
            </div>
           
            <div class="form-container2">
                <div class="form-btn">
                    <span onclick="register()">Register</span>
                    <span onclick="login()">Login</span>
                    <hr id="indicator">
                </div>

                <form id="Loginform" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return validateLoginForm(); ">
                    <input type="email" id="loginEmail" name="email"  placeholder="email" required>
                    <input type="password" id="loginPassword" name="password"  placeholder="password" required>
                    <input id="btn" type="submit" name="login" value="Login" >
                    <a href="#">Forgot password</a>
                </form>
                <form id="Regform" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return validateRegForm();">
                    <input type="text" name="fullname" placeholder="Fullname" required>
                    <input type="email" id="regEmail" name="email" placeholder="email" required>
                    <input type="password" id="regPassword" name="password" placeholder="password" required >
                     
                    <input id="btn" type="submit" name="register" value="Register" >
                </form>
            </div>
        </div>
    </div>



    <!-------- JS for toggle form --------->

    <script>
        var RegForm = document.getElementById("Regform")
        var LoginForm = document.getElementById("Loginform")
        var Indicator = document.getElementById("indicator")

        function register() {
            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            Indicator.style.transform = "translateX(0px)"
        }

        function login() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(110px)"
        }
      
        
       
    </script>
    


    <script>
function validateLoginForm() {
    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;

    // Email validation using a simple regular expression
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Invalid Email Address");
        return false;
    }

    // Password length should be at least 8 characters
    if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    }

    // Password should contain at least one uppercase letter
    if (!/[A-Z]/.test(password)) {
        alert("Password must contain at least one uppercase letter");
        return false;
    }

    // Password should contain at least one lowercase letter
    if (!/[a-z]/.test(password)) {
        alert("Password must contain at least one lowercase letter");
        return false;
    }

    // Password should contain at least one digit
    if (!/\d/.test(password)) {
        alert("Password must contain at least one digit");
        return false;
    }

    // Password should contain at least one special character
    if (!/[!@#$%^&*()\-_=+{};:,<.>]/.test(password)) {
        alert("Password must contain at least one special character");
        return false;
    }

    // All validation checks passed
    return true;
}

function validateRegForm() {
    var email = document.getElementById("regEmail").value;
    var password = document.getElementById("regPassword").value;

    // Email validation using a simple regular expression
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Invalid Email Address");
        return false;
    }

    // Password length should be at least 8 characters
    if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    }

    // Password should contain at least one uppercase letter
    if (!/[A-Z]/.test(password)) {
        alert("Password must contain at least one uppercase letter");
        return false;
    }

    // Password should contain at least one lowercase letter
    if (!/[a-z]/.test(password)) {
        alert("Password must contain at least one lowercase letter");
        return false;
    }

    // Password should contain at least one digit
    if (!/\d/.test(password)) {
        alert("Password must contain at least one digit");
        return false;
    }

    // Password should contain at least one special character
    if (!/[!@#$%^&*()\-_=+{};:,<.>]/.test(password)) {
        alert("Password must contain at least one special character");
        return false;
    }

    // All validation checks passed
    return true;
}
</script>


</body>

</html>