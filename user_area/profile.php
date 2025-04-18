<?php
include('../Includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .mt-5 {
            padding-top: 130px; /* Adjust this value based on the height of your navbar */
            margin-top: 3rem;
        }
    </style>
</head>
<body>


<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center order-lg-0" href="../index.php">
            <img src="../images/shopping-bag-icon.png" alt="site icon">
            <span class="text-uppercase fw-lighter ms-2">Dry Fruit Kingdom</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-lg-1" id="navMenu">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="../user_area/user_registration.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="../Display_all.php">All Products</a>
                </li>
                <li class="nav-item order-lg-2 nav-btns align-items-center">
                    <a class="nav-link text-uppercase text-dark" href="../cart.php"><i class="fa fa-shopping-cart"></i>
                        <sup><?php cart_item();?></sup>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                </li>
            </ul>
        </div>

        <div class="order-lg-2 nav-btns ms-auto">
            <form class="d-flex" method="GET" action="search_product.php" role="search">
                <input class="form-control me-2" type="search" name="search_data" placeholder="Search me" aria-label="Search">
                <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-success">
            </form>
        </div>

        <div class="order-lg-2 nav-btns ms-auto d-flex">
        <?php
                if(!isset($_SESSION['username'])){
                    echo " <a href='#'class='nav-link text-uppercase text-dark  px-1'>Welcome Guest
                    </a>";
                }else{
                    echo "<a href='profile.php'class='nav-link text-uppercase text-dark px-1'>Welcome ".$_SESSION['username']."
                        </a>";
                }
            if(!isset($_SESSION['username'])){
                    echo " <a href='user_login.php'class='nav-link text-uppercase text-dark fas fa-user '>Login
                    </a>";
                }else{
                    echo "<a href='logout.php'class='nav-link text-uppercase text-dark fas fa-user'>Logout
                        </a>";
                }
                ?>
        </div>
    </div>
</nav>
<!-- end of navbar -->
<style>
    /* Sidebar button styles */
    .list-group-item {
        background-color: #E6E6FA; /* Beige */
        color: #333; /* Dark Gray */
        border: none;
        border-radius: 5px;
        margin-bottom: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .list-group-item:hover {
        background-color: #F5F5DC; /* Lavender */
    }

    .list-group-item.active {
        background-color: #FFDAB9; /* PeachPuff */
        color: #333; /* Dark Gray */
    }

    /* Button animation */
    .list-group-item {
        transition: transform 0.3s ease;
    }

    .list-group-item:hover {
        transform: translateX(5px);
    }
</style>
<div class="container mt-5">
    <h1 class="text-center">User Profile</h1>
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="profile.php?dashboard" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="profile.php?pending_orders" class="list-group-item list-group-item-action">Pending Orders</a>
                <a href="profile.php?edit_account" class="list-group-item list-group-item-action">Edit Account</a>
                <a href="profile.php?my_orders" class="list-group-item list-group-item-action">My Orders</a>
                <a href="profile.php?delete_account" class="list-group-item list-group-item-action">Delete Account</a>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<a href='user_login.php' class='list-group-item list-group-item-action'>Login</a>";
                } else {
                    echo "<a href='logout.php' class='list-group-item list-group-item-action'>Logout</a>";
                }
                ?>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-9">
            <?php
            if (isset($_GET['dashboard'])) {
                include('dashboard.php');
            } elseif (isset($_GET['pending_orders'])) {
                include('pending_orders.php');
            } elseif (isset($_GET['edit_account'])) {
                include('edit_account.php');
            } elseif (isset($_GET['my_orders'])) {
                include('my_orders.php');
            } elseif (isset($_GET['delete_account'])) {
                include('delete_account.php');
            } else {
                include('dashboard.php'); // Default to dashboard if no query parameter is set
            }
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
