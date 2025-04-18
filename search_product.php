

<?php
         include('./functions/common_function.php');
         include('./Includes/connect.php')
         
        
  
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
    <link rel = "stylesheet" href = "css/main.css">
    
</head>
<body>
    
 <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center order-lg-0" href="index.php">
            <img src="images/shopping-bag-icon.png" alt="site icon">
            <span class="text-uppercase fw-lighter ms-2">Dry Fruit Kingdom</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-lg-1" id="navMenu">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="./user_area/user_registration.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="Display_all.php">All Products</a>
                </li>
                <li class="nav-item order-lg-2 nav-btns align-items-center">
                    <a class="nav-link text-uppercase text-dark" href="cart.php"><i class="fa fa-shopping-cart"></i>
                        <sup><?php cart_item();?></sup>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="cart.php">Total Price: <?php total_cart_price(); ?>/-</a>
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
        @session_start();
                if(!isset($_SESSION['username'])){
                    echo " <a href='#'class='nav-link text-uppercase text-dark  px-1'>Welcome Guest
                    </a>";
                }else{
                    echo "<a href='#'class='nav-link text-uppercase text-dark px-1'>Welcome ".$_SESSION['username']."
                        </a>";
                }
            if(!isset($_SESSION['username'])){
                    echo " <a href='./user_area/user_login.php'class='nav-link text-uppercase text-dark fas fa-user '>Login
                    </a>";
                }else{
                    echo "<a href='./user_area/logout.php'class='nav-link text-uppercase text-dark fas fa-user'>Logout
                        </a>";
                }
                ?>
        </div>
    </div>
</nav>
<!-- end of navbar -->

    <!-- header -->
    <header id = "header" class="s" style = "padding-top: 104px;">
        <div class = "container h-100 d-flex align-items-center carousel-inner">
            
        </div>

        
    </header>
    <!-- end of header -->

    <!-- collection -->
    <section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block">All Products</h2>
            </div>
        
            
    <div class = "collection-list mt-4 row gx-0 gy-3">
    
                
    
            <!-- fetching products -->
        <?php
        // calling function from common_function
        
        search_product();
        
        
        ?>
    </div>
        
    </div>
</section>
    <!-- end of collection -->
    
        

    <!-- blogs -->
    <section id = "offers" class = "py-5">
        <div class = "container">
            <div class = "row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class = "offers-content">
                    <span class = "text-white">Discount Up To 20%</span>
                    <h2 class = "mt-2 mb-4 text-white">Make Your Offer!</h2>
                    <a href = "#" class = "btn">Buy Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of blogs -->

    <!-- blogs -->
    <section id = "blogs" class = "py-5">
        <div class = "container">
            <div class = "title text-center py-5">
                <h2 class = "position-relative d-inline-block">Our Latest Blogs</h2>
            </div>

            <div class = "row g-3">
                <div class = "card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src = "images/blogs01.jpg" alt = "">
                    <div class = "card-body px-0">
                        <h4 class = "card-title">The Health Benefits of Dry Fruits from Gilgit Baltistan</h4>
                        <p class = "card-text mt-3 text-muted">In this blog post, you can discuss the various health benefits of the different types of dry fruits that are commonly found in Gilgit Baltistan, such as apricots, walnuts, and almonds. You can include information about the vitamins, minerals, and other nutrients that these dry fruits contain, and how they can help to improve overall health and wellbeing.</p>
                        <p class = "card-text">
                            <small class = "text-muted">
                                <span class = "fw-bold">Author: </span>Balaj Hussain
                            </small>
                        </p>
                        <a href = "#" class = "btn">Read More</a>
                    </div>
                </div>

                <div class = "card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src = "images/blogs02.png" alt = "">
                    <div class = "card-body px-0">
                        <h4 class = "card-title">The History and Culture of Dry Fruits in Gilgit Baltistan</h4>
                        <p class = "card-text mt-3 text-muted">This blog post can explore the rich history and culture of dry fruits in Gilgit Baltistan, including their traditional uses and importance in local cuisine. You can highlight the unique characteristics and flavors of the dry fruits that are grown in this region, and how they have been cultivated and consumed for centuries.</p>
                        <p class = "card-text">
                            <small class = "text-muted">
                                <span class = "fw-bold">Author: </span>Balaj Hussain
                            </small>
                        </p>
                        <a href = "#" class = "btn">Read More</a>
                    </div>
                </div>

                <div class = "card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src = "images/blogs03.jpeg" alt = "">
                    <div class = "card-body px-0">
                        <h4 class = "card-title">Top 5 Recipes Using Dry Fruits from Gilgit Baltistan</h4>
                        <p class = "card-text mt-3 text-muted">In this blog post, you can share some delicious and creative recipes that incorporate dry fruits from Gilgit Baltistan. This could include sweet and savory dishes, snacks, and desserts that feature ingredients like apricots, figs, and pistachios.</p>
                        <p class = "card-text">
                            <small class = "text-muted">
                                <span class = "fw-bold">Author: </span>Balaj Hussain
                            </small>
                        </p>
                        <a href = "#" class = "btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of blogs -->

    <!-- about us -->
    <section id = "about" class = "py-5">
        <div class = "container">
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4">About Us</h2>
                    </div>
                    <p class = "lead text-muted">Welcome to Dry Fruit Kingdom, a family-owned and operated dry fruit business based in Gilgit Baltistan, Pakistan. We are passionate about bringing the highest quality, locally-sourced dry fruits to our customers.

                        Our story began over 1999 ago when our founders Ali Ghulam started growing and selling dry fruits from their own orchards. Over time, we have expanded our business to include a wider variety of dry fruits and nuts, while always maintaining a commitment to quality and sustainability.
                        
                        We are proud to work with local farmers and suppliers who share our values, and we take great care in selecting only the freshest and most delicious dry fruits for our customers. Whether you are looking for a healthy snack, a special gift, or an ingredient for your favorite recipe, we are confident that you will love our products.
                        
                        Thank you for choosing Dry Fruit Kingdom for your dry fruit needs. We look forward to serving you!.</p>
                </div>
                <div class = "col-lg-6 order-lg-0">
                    <img src = "images/Jan Ali.jpg" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->

   
    

    <!-- newsletter -->
    <section id = "newsletter" class = "py-5">
        <div class = "container">
            <div class = "d-flex flex-column align-items-center justify-content-center">
                <div class = "title text-center pt-3 pb-5">
                    <h2 class = "position-relative d-inline-block ms-4">Contact Us</h2>
                </div>

                <p class = "text-center text-muted">Please feel free to reach out to us using the contact information provided below, we'd love to hear from you!</p>
                <div class = "input-group mb-3 mt-3">
                    <input type = "text" class = "form-control" placeholder="Enter Your Email ...">
                    <button class = "btn btn-primary" type = "submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    <!-- end of newsletter -->

    
 <!-- footer -->
 <footer class = "bg-dark py-5">
       <?php
        include("./Includes/footer.php");
        ?>
    </footer>
    <!-- end of footer -->




    <!-- jquery -->
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>
</body>
</html>
