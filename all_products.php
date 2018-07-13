<!DOCTYPE>
<?php 

    include("functions/functions.php");

?>
<html>
    <head>
        <title>My online Shope</title>
    <link rel="stylesheet" href="styles/style.css" media="all">

    </head>

    <body>

        <!--Main Contianer start here --> 
        <div class="main_wrapper">
            <!--Header start here --> 
            <div class="header_wrapper">
                
                <a href="index.php"><img id="logo" src="images/logo.jpg" /></a>
                <img id="banner" src="images/ad_banner.jpg" />
            </div> 
            <!--Header end here --> 


            <!--Navigation bar start here --> 
            <div class="menubar">

                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href='all_products.php'>All Product</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">Shopping Cart</a></li>
                    <li><a href="#">Contact Us</a></li>

                </ul>
                <div id="form">
                    <form action="results.php" method="get" enctype="multipart/form-data">
                        <input type="text" name="user_query" placeholder="Search a product"/>
                        <input type="submit" name="search" value="Search"/>
                    
                    </form>

                </div>
                

            </div>
            <!--Navigation bar end here --> 


            <!--Content wrapper start here --> 
            <div class="content_wrapper">

                <div id="sidebar"> 
                    <div id="sidebar_title">Categories</div>

                    <ul id="cats">
                        <?php 
                            getCats();
                        ?>   

                    </ul>

                    <div id="sidebar_title">Brands</div>

                    <ul id="cats">
                        <?php 
                            getBrands();
                        ?>   
                    </ul>
                </div>

                <div id="content_area">

                    <div id="shopping_cart">
                   
                        <span style="float:right; font-size: 18px; padding:5px; line-height: 40px;"> 
                        
                        Welcome Guest! <b style="color:yellow">Shopping cart:</b>Total Item: Total Price: 
                        <a href="cart.php" style="color:yellow">Go to Cart</a>

 

                        </span>
                    
                    </div>

                    <div id="products_box" >
                    <?php 
                        

                       
                        if(!isset($_GET['cat'])){
                            if(!isset($_GET['brand'])){

                        $get_pro = "select * from products";

                        $run_pro = mysqli_query($con, $get_pro);

                        while ($row_pro=mysqli_fetch_array($run_pro)){
                            $pro_id = $row_pro['product_id'];
                            $pro_cat = $row_pro['product_cat'];
                            $pro_brand = $row_pro['product_brand'];
                            $pro_title = $row_pro['product_title'];
                            $pro_price = $row_pro['product_price'];
                            $pro_image = $row_pro['product_image'];

                            echo  "
                                <div id='single_product'>
                                    <h3>$pro_title</h3>
                                    <img src='admin_area/product_images/$pro_image' width='180' height='140' />
                                    <p>$ $pro_price</p>

                                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>

                                    <a href='detail.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</a>
                                </div>       

                            ";
                        }
                        }

                        } //<!--End_function-->

                       
                    ?>    
                        
                    </div>

                </div>


            </div>
            <!--Content wrapper end here --> 
            

            <div id="footer"> 
            
                <h3 style="text-align:center; padding-top:10px;">
                    &copy; 2018 by www.ahsongha.com
                </h2>

            </div> 

        </div>
       <!-- Main Container end here Main wrapper-->




        
    </body>
</html>