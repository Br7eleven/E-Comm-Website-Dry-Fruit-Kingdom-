<?php
include('functions/common_function.php');
include('./Includes/connect.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Include the cart.js file -->
    <script src="cart.js"></script>
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class="container justify-content-end">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
                <img src="images/shopping-bag-icon.png" alt="site icon">
                <span class="text-uppercase fw-lighter ms-2">Dry Fruit Kingdom</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav col-md-12 align-items-center text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="index.php">Home</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="Display_all.php">All Products</a>
                    </li>
                    <!-- shopping cart btn -->
                    <li class="nav-item order-lg-2 nav-btns flex align-items-center" type="button">
                        <a class="nav-link text-uppercase text-dark" href="cart.php"><i class="fa fa-shopping-cart"></i>
                            <sup><?php cart_item(); ?></sup>
                        </a>
                    </li>
                </ul>
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
<!--end of Navbar  -->
    <section id="cart-container" class="container">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center py-5 my-5">
                <div class="title text-center pt-5">
                    <h2 class="position-relative d-inline-block ms-4 py-5">Shopping Cart</h2>
                </div>
            </div>
        </div>
    </section>

   <!-- cart table -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
                
                <?php
                $get_ip_address = getIPAddress();
                $total_price = 0;
                $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
                $result = mysqli_query($conn, $cart_query);
                $result_count = mysqli_num_rows($result);

                if ($result_count > 0) {
                    echo '<table class="table table-bordered text-center">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Product</th>';
                    echo '<th></th>';
                    echo '<th>Quantity Per Kg</th>';
                    echo '<th>Total price</th>';
                    echo '<th>Operations</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $quantity = intval($row['quantity']);  // Ensure quantity is an integer
                        $select_products = "SELECT * FROM `product` WHERE product_id='$product_id'";
                        $result_products = mysqli_query($conn, $select_products);
                        while ($row_product_price = mysqli_fetch_array($result_products)) {
                            $product_price = floatval($row_product_price['product_price']); // Ensure price is a float
                            $product_title = $row_product_price['product_title'];
                            $product_image = $row_product_price['product_image'];
                            $product_total = $product_price * $quantity;
                            $total_price += $product_total;
                ?>
                                <tr>
                                    <td><?php echo $product_title; ?> </td>
                                    <td><img src="./Admin_Area/product_images/<?php echo $product_image; ?>" class="cart_img" alt=""></td>
                                    <td><input type="number" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" min="1" class="form-input w-50"></td>
                                    <td><?php echo number_format($product_total, 2); ?>/-</td>
                                    <td>
                                        <input type="submit" value="Update Cart" class="btn p-1 mx-3" name="update_cart">
                                        <input type="submit" value="Remove" class="btn p-1 mx-3" name="remove_cart[<?php echo $product_id; ?>]">
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    } else {
                        echo "<h2 class='text-center text-danger'>Empty Cart. <br>Start adding items for a delightful shopping experience!</h2>";
                    }
                    
                    ?>
                </tbody>
            </table>
            <!-- subtotal -->
            <div class="d-flex py-1 mb-5">
                <?php
                if ($result_count > 0) {
                    echo "<h4 class='px-3'>Subtotal:<strong class='text-info'> " . number_format($total_price, 2) . "/-</strong></h4>
                        <input type='submit' value='Continue Shopping' class='btn p-1 mx-3' name='continue_shopping'>
                        <button class='btn p-2'><a href='./user_area/checkout.php' class='text-dark text-decoration-none'>CHECKOUT</a></button>";
                } else {
                    echo "<input type='submit' value='Continue Shopping' class='btn p-1 mx-3' name='continue_shopping'>";
                }

                if (isset($_POST['continue_shopping'])) {
                    echo "<script>window.open('index.php', '_self')</script>";
                }
                ?>
            </div>
        </form>
    </div>
</div>


    <!-- function to update and remove items -->
    <?php
    function update_cart() {
        global $conn;
        if (isset($_POST['update_cart'])) {
            foreach ($_POST['qty'] as $product_id => $quantity) {
                $quantity = intval($quantity);
                if ($quantity > 0) {
                    $update_cart = "UPDATE `cart_details` SET quantity=$quantity WHERE product_id=$product_id AND ip_address='" . getIPAddress() . "'";
                    mysqli_query($conn, $update_cart);
                }
            }
            echo "<script>window.open('cart.php', '_self')</script>";
        }
    }
    function remove_cart_item() {
        global $conn;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['remove_cart'] as $product_id => $value) {
                $delete_query = "DELETE FROM `cart_details` WHERE product_id=$product_id AND ip_address='" . getIPAddress() . "'";
                mysqli_query($conn, $delete_query);
            }
            echo "<script>window.open('cart.php', '_self')</script>";
        }
    }
    update_cart();
    remove_cart_item();
    ?>

    <!-- footer -->
    <footer class="bg-dark py-5">
        <?php
        include("./Includes/footer.php");
        ?>
    </footer>
    <!-- end of footer -->

    <!-- jquery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script>
    <!-- custom js -->
    <script src="js/script.js"></script>
</body>
</html>
