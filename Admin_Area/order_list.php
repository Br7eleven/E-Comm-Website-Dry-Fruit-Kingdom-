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
    <title>Order List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        .container {
            margin-top: 70px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
            color: #343a40;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        th, td {
            text-align: center;
            padding: 15px;
        }

        th {
            background-color: #6c757d; /* Darker grey for better visibility */
            color: white;
            border: none;
            border-radius: 10px 10px 0 0;
        }

        tr {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 15px; /* Add margin to create spacing between rows */
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        td {
            border: none;
        }

        td:first-child {
            border-radius: 10px 0 0 10px;
        }

        td:last-child {
            border-radius: 0 10px 10px 0;
        }

        .back-button {
            display: block;
            margin: 20px auto;
            padding: 15px 35px;
            text-align: center;
            border-radius: 20px;
            width: 100px;
            height: 60px;
        }

        
    </style>
</head>
<body>
    <div class="container">
        <h2>Order List</h2>
        <table>
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
                session_start();
                    display_order_details();
                ?>
            </tbody>
        </table>
        <a href="index.php" class="back-button btn btn-outline-success">Back</a>
    </div>
</body>
</html>
