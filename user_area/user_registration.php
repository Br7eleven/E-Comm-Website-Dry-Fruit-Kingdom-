<?php
include('../Includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f5f5f5;
    }

    .animated-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradientBG 15s ease infinite;
    }

    @keyframes gradientBG {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(-20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #007bff;
      font-size: 24px;
      font-weight: bold;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: border-color 0.3s ease-in-out;
    }

    .form-group input:focus {
      border-color: #007bff;
    }

    .btn-login {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      border: none;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .btn-login:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="animated-bg"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="login-container">
          <h2>User Registration</h2>
          <form action="" method="post">
                <!-- username field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                     autocomplete="off" required="Required" name="user_username" /> 
                </div>
                <!-- email field -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="text" id="user_email" class="form-control" placeholder="Enter your email"
                     autocomplete="off" required="Required" name="user_email" /> 
                </div>
                <!-- password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                     autocomplete="off" required="Required" name="user_password" /> 
                </div>
                <!-- confirm password field -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password"
                     autocomplete="off" required="Required" name="conf_user_password" /> 
                </div>
                <!-- address field -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
                     autocomplete="off" required="Required" name="user_address" /> 
                </div>
                <!-- contact field -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Mobile Number</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number"
                     autocomplete="off" required="Required" name="user_contact" /> 
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" 
                    class="btn btn-primary" name="user_register">
                    <p class="small fw-bold mt-2 pt-1">Already have an account  ?
                        <a href="user_login.php" class="text-danger">  Login</a></p>
                </div>

               </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Add animation to the login form
    $(document).ready(function() {
      $(".login-container").addClass("animated fadeIn");
    });
  </script>
</body>
</html>
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

    //select query
    $select_query="SELECT * FROM `user_table` WHERE username='$user_username' or user_email='$user_email' ";
    $result=mysqli_query($conn,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo"<script>alert('Username and email already exist!')</script>";
    }
    else if($user_password!=$conf_user_password){
       echo"<script>alert('Passwords do not match!')</script>"; 
    }
    else{
    //insert query
    $insert_query="INSERT INTO `user_table` (username,user_email,user_password,
    user_address,user_mobile) VALUES ('$user_username','$user_email',
    '$hash_password','$user_address','$user_contact')";
    $sql_execute=mysqli_query($conn,$insert_query);
    }
    
    
    

   //selecting cart items
   $select_cart_items="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
   $result_cart=mysqli_query($conn,$select_cart_items);
   $rows_count=mysqli_num_rows($result_cart);
   if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo"<script>alert('you have items in your cart!')</script>"; 
    echo"<script>window.open('checkout.php','_self')</script>"; 
   }
   else{
    echo"<script>window.open('../index.php','_self')</script>";
   }


}
?>