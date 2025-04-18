

<!-- if(isset($_POST['insert_product'])){

    $product_title= $_POST['product_title'];
    
    $product_keywords= $_POST['product_keywords'];
    $product_price= $_POST['product_price'];
    $product_status= 'true';
    // accessing images
    $product_image= $_FILES['product_image']['name']; 
    //  accessing image tmp name
    $temp_image= $_FILES['product_image']['tmp_name'];
    // checking empty condition
    if($product_title==''  or $product_keywords=='' 
    or $product_price=='' or $product_image=='' ){
        echo"<script>alert('Please fill all the available fields')</script>";
        exit();
        }    
    else{ 
        move_uploaded_file( $temp_image,"./product_images/$product_image");
        // insert query
        $insert_products="INSERT INTO `product`(product_title,
        product_keywords,product_price,date,status) VALUES ('$product_title',
        '$product_keywords','$product_image','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($conn,$insert_products);
        if($result_query){
            echo"<script>alert('Successfullt inserted the product')</script>";
        }
    }
} -->


<?php
include('../Includes/connect.php');

if(isset($_POST['insert_product'])){

    $product_title = $_POST['product_title'];
    $product_keywords = $_POST['product_keywords'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing image data
    $product_image = $_FILES['product_image']['name']; 
    $temp_image = $_FILES['product_image']['tmp_name'];
    

    // checking empty condition
    if(empty($product_title) || empty($product_keywords) || empty($product_price) || empty($product_image)){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image, "./product_images/$product_image");
       
        // insert query
        $insert_products = "INSERT INTO `product` (product_title, product_keywords, product_price, product_image, date, status) 
                            VALUES ('$product_title', '$product_keywords', '$product_price', '$product_image', NOW(), '$product_status')";
        $result_query = mysqli_query($conn, $insert_products);
        if($result_query) {
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/main.css">
     <!-- fontawesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
    <!-- form -->
        
    <form action="" method="POST"  action= "insert_products.php"enctype="multipart/form-data">
    <!-- Title -->
    <div class="form-outline mb-4 w-50 m-auto ">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" name="product_title" id="product_title" 
        class="form-control" placeholder="Enter Product title" autocomplete="off" required="required">
    </div>   
    <!-- keywords -->
    <div class="form-outline mb-4 w-50 m-auto ">
        <label for="product_keywords" class="form-label">Product Keywords</label>
        <input type="text" name="product_keywords" id="product_keywords" 
        class="form-control" placeholder="Enter Product keywords" 
        autocomplete="off" required="required">
    </div>   
    <!-- Image -->
    <div class="form-outline mb-4 w-50 m-auto ">
        <label for="product_image" class="form-label">Product Image</label>
        <input type="file" name="product_image" id="product_image" 
        class="form-control"  required="required">
    </div> 
    <!-- Price -->
    <div class="form-outline mb-4 w-50 m-auto ">
        <label for="product_price" class="form-label">Product price</label>
        <input type="text" name="product_price" id="product_price" 
        class="form-control" placeholder="Enter Product price" 
        autocomplete="off" required="required">
    </div> 
    <!-- button -->
    <div class="form-outline mb-4 w-50 m-auto ">
       <input type="submit" name="insert_product"
        class="btn btn-primary " value="Insert Products"> 
    </div> 
         
</form>
    </div>
</body>
</html>