
<?php
         include('../functions/common_function.php');
         include('../Includes/connect.php');
         
        ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/main.css">
    <head>
    <title>Payment Page</title>
    
</head>
<body>
    <?php
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        // Redirect to login page if not logged in
        echo "<script>window.open('user_login.php','_self')</script>";
    }
    
    ?>
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

        

        <div class="order-lg-2 nav-btns ms-auto d-flex">
        <?php
        
                if(!isset($_SESSION['username'])){
                    echo " <a href='#'class='nav-link text-uppercase text-dark  px-1'>Welcome Guest
                    </a>";
                }else{
                    echo "<a href='#'class='nav-link text-uppercase text-dark px-1'>Welcome ".$_SESSION['username']."
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
        body {
            font-family: Arial, sans-serif;
            background-image: url("../images/pay_bg.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding-top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-top: 50px;
        }

        form {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            opacity: 0.9;
            margin-top: 450px; /* Adjust margin-top as needed */
            padding-top:0px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .card {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            opacity: 0.9;
            margin-top: 50px; /* Adjust margin-top as needed */
        }
    </style>

<body>
    <!-- Payment Form -->
    <form action="process_payment.php" method="post" >
        <h1>Payment Page</h1>
        <label for="name">Name on Card:</label>
        <input type="text" id="name" name="name" required>

        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required>

        <label for="expiration">Expiration Date:</label>
        <input type="text" id="expiration" name="expiration" placeholder="MM/YYYY" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required>

        <input type="submit" value="Submit Payment">
    </form>

    <!-- Offline Payment -->
    <div class="card">
        <h2 class="text-center mb-4">Offline Payment</h2>
        <div class="text-center">
            <a href="order.php?user_id=<?php echo $user_id?>" class="btn btn-primary">Cash on Delivery</a>
        </div>
    </div>
</body>
</html>