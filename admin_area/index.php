<?php
session_start();

if(!isset($_SESSION['user_email'])){
                        
echo "<script>window.open('admin_login.php?not_admin=You a not admin','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Add Panel</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    
</head>
<body>

    <div class="main_wrapper">

        <div id="header" ><h2 style="text-align:center;">Admin Managment</h2></div>

        
        
        <div id="right">
            <h2 style="text-align:center;"> Manage Content</h2>
            <a href="index.php?insert_product">Insert New Product</a>    
            <a href="index.php?view_products">View All Products</a>    
            <a href="index.php?insert_cat">Insert New Category</a>    
            <a href="index.php?view_cat">View All Category</a>    
            <a href="index.php?insert_brand">Insert New Brand</a>    
            <a href="index.php?view_brand">View All Brand</a>    
            <a href="index.php?view_customers">View Customers</a>    
            <a href="index.php?insert_product">View Orders</a>    
            <a href="index.php?insert_product">View Payments</a>
            <a href="admin_logout.php">Admin Logout</a> 
        
        </div>


        <div id="left">
           
            
            <?php 
                if(isset($_GET['insert_product'])) {
                    include("insert_product.php");
                }

                if(isset($_GET['view_products'])) {
                    include("view_products.php");
                }

                if(isset($_GET['edit_pro'])) {
                    include("edit_pro.php");
                }

                if(isset($_GET['delete_pro'])) {
                    include("delete_product.php");
                }

                if(isset($_GET['insert_cat'])) {
                    include("insert_cat.php");
                }

                if(isset($_GET['view_cat'])) {
                    include("view_cat.php");
                }

                if(isset($_GET['edit_cat'])) {
                    include("edit_cat.php");
                }

                if(isset($_GET['delete_cat'])) {
                    include("delete_cat.php");
                }

                if(isset($_GET['insert_brand'])) {
                    include("insert_brand.php");
                }

                if(isset($_GET['view_brand'])) {
                    include("view_brand.php");
                }

                if(isset($_GET['view_customers'])) {
                    include("view_customers.php");
                }

                if(isset($_GET['delete_customer'])) {
                    include("delete_customer.php");
                }

                

            ?>

        </div>


    </div>




    
</body>
</html>