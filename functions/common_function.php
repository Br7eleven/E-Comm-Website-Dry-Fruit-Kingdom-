<?php
// include connect file

// getting products
function getproducts(){
    global $conn;
    $select_query="SELECT * FROM `product`";
    $result_query=mysqli_query($conn,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        echo "
        <div class = 'col-md-6 col-lg-4 col-xl-3 p-2 best'>
            <div class = 'collection-img position-relative'>
                <img src = './Admin_Area/product_images/$product_image' class = 'w-100'>
                <span class = 'position-absolute bg-primary text-white d-flex align-items-center justify-content-center'>sale</span>
            </div>
            <div class = 'text-center' >
                <div class = 'rating mt-3'>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                </div>
                <p class = 'text-capitalize my-1'>$product_title</p>
                <span class = 'fw-bold d-block'>Price: $product_price/-</span>
                <a href = 'index.php?add_to_cart= $product_id' class = 'btn btn-primary mt-3'>Add to Cart</a>
            </div>
        </div>";

    
    }
}
// searching product function


// Getting products
function search_product() {
    global $conn;
    if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM `product` WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_rows = mysqli_num_rows($result_query); // Get the number of rows returned

        if($num_rows > 0) {
            // Display the products
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image = $row['product_image'];
                $product_price = $row['product_price'];
                echo "
                <div class='col-md-6 col-lg-4 col-xl-3 p-2 best'>
                    <div class='collection-img position-relative'>
                        <img src='./Admin_Area/product_images/$product_image' class='w-100'>
                        <span class='position-absolute bg-primary text-white d-flex align-items-center justify-content-center'>sale</span>
                    </div>
                    <div class='text-center'>
                        <div class='rating mt-3'>
                            <span class='text-primary'><i class='fas fa-star'></i></span>
                            <span class='text-primary'><i class='fas fa-star'></i></span>
                            <span class='text-primary'><i class='fas fa-star'></i></span>
                            <span class='text-primary'><i class='fas fa-star'></i></span>
                            <span class='text-primary'><i class='fas fa-star'></i></span>
                        </div>
                        <p class='text-capitalize my-1'>$product_title</p>
                        <span class='fw-bold d-block'>Price: $product_price /-</span>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary mt-3'>Add to Cart</a>
                    </div>
                </div>";
            }
        } else {
            // Display no results message
            echo "<p class='text-center mt-5'>No results found for '$search_data_value'</p>";
        }
    }
}

// display all products
function display_all_products() {
    global $conn;
   
    $select_query="SELECT * FROM `product` order by rand()";
    $result_query=mysqli_query($conn,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        echo "
        <div class = 'col-md-6 col-lg-4 col-xl-3 p-2 best'>
            <div class = 'collection-img position-relative'>
                <img src = './Admin_Area/product_images/$product_image' class = 'w-100'>
                <span class = 'position-absolute bg-primary text-white d-flex align-items-center justify-content-center'>sale</span>
            </div>
            <div class = 'text-center' >
                <div class = 'rating mt-3'>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                    <span class = 'text-primary'><i class = 'fas fa-star'></i></span>
                </div>
                <p class = 'text-capitalize my-1'>$product_title</p>
                <span class = 'fw-bold d-block'>Price: $product_price/-</span>
                <a href = 'index.php?add_to_cart= $product_id' class = 'btn btn-primary mt-3'>Add to Cart</a>
            </div>
        </div>";

    
    }
}
// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;


//cart function
function cart(){
if(isset($_GET['add_to_cart'])){
    global $conn;
    $get_ip_address = getIPAddress(); 
    $get_product_id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM `cart_details` WHERE
    product_id='$get_product_id' and ip_address='$get_ip_address'";
    $result_query=mysqli_query($conn,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    
    if($num_of_rows>0){
        echo"<script>alert('This item is already present inside cart')</script>";

        echo "<script>window.open('index.php','_self')</script>";
        
    }
    else{
        $insert_query="INSERT INTO `cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id,'$get_ip_address',0)";
        $result_query=mysqli_query($conn,$insert_query);
        echo"<script>alert('item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}
}
// function to get cart item number
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $get_ip_address = getIPAddress(); 
        $select_query="SELECT * FROM `cart_details` WHERE
        ip_address='$get_ip_address'";
        $result_query=mysqli_query($conn,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        
            
        }
        else{
            global $conn;
        $get_ip_address = getIPAddress(); 
        $select_query="SELECT * FROM `cart_details` WHERE
        ip_address='$get_ip_address'";
        $result_query=mysqli_query($conn,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }
    echo $count_cart_items;
    }
// total cart price function
function total_cart_price(){
    global $conn;
    $get_ip_address = getIPAddress();
    $total_price=0;
    $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result=mysqli_query($conn,$cart_query);
    while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="SELECT * FROM `product` WHERE product_id='$product_id'";
            $result_products=mysqli_query($conn,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']); //
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
        
    }
  }
  echo $total_price;  
}
//pending orders
function display_pending_orders_message() {
    global $conn;
    $username = $_SESSION['username'];

    // Get user details
    $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_query = mysqli_query($conn, $get_details);

    if ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];

        // Check for pending orders
        $get_pending_orders = "SELECT * FROM `user_orders` WHERE user_id='$user_id' AND order_status='pending'";
        $result_pending_query = mysqli_query($conn, $get_pending_orders);
        $pending_count = mysqli_num_rows($result_pending_query);

        if ($pending_count > 0) {
            echo "<h3 class='text-center text-success'>You have <span class='text-danger'>$pending_count</span> pending orders</h3>
                  <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
        } else {
            echo "<h3 class='text-center text-success'>You have zero pending orders</h3>
                  <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
        }
    }
}

//display order details
function display_order_details() {
    global $conn;
    $username = $_SESSION['username'];

    // Get user details
    $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_query = mysqli_query($conn, $get_details);

    if ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];

        // Get all orders
        $get_orders = "SELECT * FROM `user_orders` WHERE user_id='$user_id'";
        $result_order_query = mysqli_query($conn, $get_orders);

        while ($row_order = mysqli_fetch_assoc($result_order_query)) {
            echo "<tr>
                    <td>{$row_order['order_id']}</td>
                    <td>{$row_order['amount_due']}</td>
                    <td>{$row_order['invoice_number']}</td>
                    <td>{$row_order['total_products']}</td>
                    <td>{$row_order['order_date']}</td>
                    <td>{$row_order['order_status']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No orders found.</td></tr>";
    }
}


?>