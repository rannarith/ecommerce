<!DOCTYPE>
<?php 
    session_start();
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
                    <li><a href= '../index.php'>Home</a></li>
                    <li><a href='all_products.php'>All Product</a></li>
                    <li><a href="my_account.php">My Account</a></li>
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
                    <div id="sidebar_title">My Account</div>

                    <ul id="cats">

                        <?php 
                            $user = $_SESSION['customer_email'];

                            $get_img = "select * from customers where customer_email= '$user'";

                            $run_img = mysqli_query($con, $get_img);

                            $row_img = mysqli_fetch_array($run_img);

                            $c_image = $row_img['customer_image'];
                            
                            $c_name = $row_img['customer_name'];
                            echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150'/></p>";
                            
                        
                        ?>

                       <li><a href="my_account.php?my_orders">My order</a></li>
                       <li><a href="my_account.php?edit_account">Edit accoutn</a></li>
                       <li><a href="my_account.php?change_pass">Change Password</a></li>
                       <li><a href="my_account.php?delete_account">Delete acccoutn</a></li>
                    </ul>

                    
                </div>

                <div id="content_area">
                    <?php cart(); ?>
                    <div id="shopping_cart">
                   
                        <span style="float:right; font-size: 18px; padding:5px; line-height: 40px;"> 

                        <?php 
                        if(isset($_SESSION['customer_email'])) {
                            
                            echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;
                        }
                        else {
                            echo "<b>Welcome Guest1</b>";
                        }
                        
                        ?>
                        
                        

                        <?php 
                        
                        if(!isset($_SESSION['customer_email'])) {

                            echo "<a href='checkout.php'>Login</a>";
                        }
                        else {
                            echo "<a href='logout.php'>Logout</a>";
                        }
                        
                        ?>

                        </span>
                    
                    </div>
               
                 
                    <div id="products_box" >

                    
                    <?php
                    if(!isset($_GET['my_orders'])){
                        if(!isset($_GET['edit_account'])){
                            if(!isset($_GET['change_pass'])){
                                if(!isset($_GET['delete_account'])){
                                    
                                   echo " <h2 style='padding:20px; color:balck;'>Welcome: $c_name</h2> 
                                   <b>Your can orders progress by clicking this <a href='my_account.php?my_orders'>Link</a></b>";
                                }
                        
                            }
                        }    
                
                    } 
                                            
                    ?>

                    <?php 
                    if(isset($_GET['edit_account'])){
                    include("edit_account.php");
                    }
                    if(isset($_GET['change_pass'])){
                    include("change_pass.php");
                    }
                    if(isset($_GET['delete_account'])){
                        include("delete_account.php");
                    }
                    
                    
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