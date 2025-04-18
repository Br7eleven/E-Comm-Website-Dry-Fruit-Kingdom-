<?php
         
         include('../Includes/connect.php');
        
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dry Fruit Kingdom</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "../css/main.css">
    
</head>
<body>
    
    <!-- navbar -->
    <nav class = "navbar navbar-expand-lg navbar-light bg-white  py-4 fixed-top ">
        <div class = "container d-flex justify-content-end ">
            <a class = "navbar-brand  justify-content-between  order-lg-0" href = "../index.php">
                <img src = "../images/shopping-bag-icon.png"  alt = "site icon">
                <span class = "text-uppercase fw-lighter ms-2 ">Dry Fruit Kingdom</span>
                <!-- welcome Guest -->
                
            </a>
            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav  text-center">
                    <li class = "nav-item ">
                        <a class = "nav-link text-uppercase text-dark " href = "../index.php">home</a>
                    </li>
                    <li class = "nav-item ">
                        <a class = "nav-link text-uppercase text-dark" href = "../Display_all.php">All Products</a>
                    </li>
                   
                    <li class = "nav-item ">
                    <a href="#" class="nav-link text-uppercase text-dark px-5 mx-5">Welcome Guest</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
   
   <div class = "container">
            <div class = "d-flex flex-column align-items-center justify-content-center py-5 my-5">
                <div class = "title text-center pt-5 ">
                <?php
                session_start();
            if(!isset($_SESSION['username'])){
                
                include('user_login.php');
                
            }
            
            else{
                include('payment.php');
            }
            

            ?>
                </div>

                
            </div>
        </div>
   
 






    <!-- jquery -->
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script>
    <!-- custom js -->
    <script src = "../js/script.js"></script>
</body>
</html>