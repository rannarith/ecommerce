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
            <a href="index.php?insert_product">Insert New Category</a>    
            <a href="index.php?insert_product">View All Category</a>    
            <a href="index.php?insert_product">Insert New Brand</a>    
            <a href="index.php?insert_product">View All Brand</a>    
            <a href="index.php?insert_product">View Customers</a>    
            <a href="index.php?insert_product">View Orders</a>    
            <a href="index.php?insert_product">View Payments</a>
            <a href="index.php?insert_product">Admin Layout</a>        
        
        
        </div>

        <div id="left">

            <?php 
                if(isset($_GET['insert_product'])) {
                    include("insert_product.php");
                }

                if(isset($_GET['view_products'])) {
                    include("view_products.php");
                }
            
            ?>

        </div>


    </div>




    
</body>
</html>