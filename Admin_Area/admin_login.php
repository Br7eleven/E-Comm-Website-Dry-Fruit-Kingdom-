<?php
include('../Includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
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
    <div class="login-container">
      <h2>Admin Login</h2>
      <form method="post">
        <!-- username field -->
        <div class="form-group">
          <label for="admin_name">Username:</label>
          <input type="text" id="admin_name" class="form-control" placeholder="Enter your username"
                     autocomplete="off" required="Required" name="admin_name" /> 
        </div>
        <!-- password field -->
        <div class="form-group">
          <label for="admin_password">Password:</label>
          <input type="password" id="admin_password" class="form-control" placeholder="Enter your password"
                     autocomplete="off" required="Required" name="admin_password" /> 
        </div>
        
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" 
                    class="btn btn-primary" name="admin_login">
                    <p class="small fw-bold mt-2 pt-1">Don't have an account ?
                        <a href="admin_registration.php" class="text-danger">  Register</a></p>
                </div>

                

        
      </form>
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
if(isset($_POST['admin_login'])){
$admin_username=$_POST['admin_name'];
$admin_password=$_POST['admin_password'];

//select query
$select_query="SELECT * FROM `admin_table` WHERE 
admin_name='$admin_username'";
$result=mysqli_query($conn,$select_query);
$row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);

  if($row_count>0){
    $_SESSION['admin_name']=$admin_username;
    if(password_verify($admin_password,$row_data['admin_password'])){
    if($row_count==1 and $row_count_cart==0){
      $_SESSION['admin_name']=$admin_username;

      echo"<script>alert('Login Successful!')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  
  }
}
}

?>