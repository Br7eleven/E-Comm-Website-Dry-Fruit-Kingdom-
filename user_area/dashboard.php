
<?php
include('../Includes/connect.php');
//include('../functions/common_function.php');




?>
<!-- Main Content -->
<div class="col-md-9">
            <!-- User Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>User Information</h2>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?php echo $_SESSION['username'] ?? ''; ?></p>
                    <p><strong>Email:</strong> <?php echo $_SESSION['user_email'] ?? ''; ?></p>
                    <p><strong>Phone:</strong> <?php echo $_SESSION['user_mobile'] ?? ''; ?></p>
                    <p><strong>Address:</strong> <?php echo $_SESSION['user_address'] ?? ''; ?></p>
                </div>
            </div>
</div>