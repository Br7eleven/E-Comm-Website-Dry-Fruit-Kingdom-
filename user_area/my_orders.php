<?php
 //include('../functions/common_function.php');
 include('../Includes/connect.php');
 
 
?>
<div class="card">
    <div class="card-header">
        <h2>My Orders</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Amount Due</th>
                    <th>Invoice Number</th>
                    <th>Total Products</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
               
                display_order_details();
                
                ?>
            </tbody>
        </table>
    </div>
</div>
