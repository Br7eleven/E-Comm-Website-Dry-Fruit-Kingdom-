<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- bootstrap css -->
     <link rel = "stylesheet" href = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>

<!--  navbar-->
<div class="container-fluid"> 
<nav class = "navbar navbar-expand-lg navbar-light bg-white  py-4 fixed-top ">
        <div class = "container d-flex justify-content-end ">
            <a class = "navbar-brand  justify-content-between align-items-center order-lg-0" href = "index.php">
                <img src = "../images/shopping-bag-icon.png" alt = "site icon">
                <span class = "text-uppercase fw-lighter ms-2 ">Dry Fruit Kingdom</span>
            </a>
            

            <div class = "order-lg-2 nav-btns best">
                
                
               <!-- cart button -->
                <form class="d-flex position-"  method="GET" action="search_product.php" role="search" >
        
         
            <h1 class="text-uppercase fw-lighter ms-2 flex">Welcome</h1>
      </form>
            </div>

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
            <ul class="navbar-nav">
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <!-- second child -->
    
     </div>
     <!-- third child -->
     <div class="row my-5 py-5 ">
    <div class="col-md-12  bg-secondary p-5  ">
        
        <p class="text-light  text-center p-1">Manage Details</p>
        <p class="text-light text-center">Admin Name</p>
    
    <div class="button text-center  ">

    <a href="insert_products.php" class="btn btn-primary mt-3">Insert products</a>
    <a href="#" class="btn btn-primary mt-3">View products</a>
    <a href="order_list.php" class="btn btn-primary mt-3">All Orders</a>
    <a href="#" class="btn btn-primary mt-3">Users List</a>
    <a href="#" class="btn btn-primary mt-3">All Payments</a>
    <a href="#" class="btn btn-primary mt-3">All Orders</a>
    <a href="admin_login.php" class="btn btn-primary mt-3">Logout</a>
   
    </div>
     </div>
</div>
<footer class="bg-dark">
<?php include("../Includes/footer.php")?>

</footer>





     <!-- jquery -->
     <script src = "js/jquery-3.6.0.js"></script>
    <!-- bootstrap js -->
    <script src = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script>
</body>
</html>