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
                    <?php cart(); ?>
                    <div id="shopping_cart">
                   
                        <span style="float:right; font-size: 18px; padding:5px; line-height: 40px;"> 
                        
                        Welcome Guest! <b style="color:yellow">Shopping cart:</b>Total Item:<b style="color: red"><?php total_items(); ?> </b>
                        </b>Total Pirce:<b style="color: red"><?php total_price(); ?></b>
                        <a href="cart.php" style="color:yellow">Go to Cart</a>
                        </span>
                    
                    </div>
               
                 
                    <div id="products_box" >
                      <form action="" method="POST" enctype="multipart/form-data"> 
                        <table align="center" width="700" bgcolor="skyblue">
                            <tr align="center">
                               <th>Remove</th>
                               <th>Products</th>
                               <th>Quantity</th>
                               <th>Total price</th>

                            </tr>

                            <?php
                                $total = 0;
                                global $con;
                        
                                $ip = getIp();
                        
                                $sel_price = "select * from cart where ip_add='$ip'";
                        
                                $run_price = mysqli_query($con, $sel_price);
                        
                                while($P_price = mysqli_fetch_array($run_price)) {
                                    
                                    $pro_id = $P_price['p_id'];
                        
                                    $pro_price = "select * from products where product_id= '$pro_id'";
                        
                                    $run_pro_price = mysqli_query($con, $pro_price);
                        
                                    while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                        
                                        $product_price = array($pp_price['product_price']);
                                        $product_title = $pp_price['product_title'];
                                        $product_image = $pp_price['product_image'];
                                        $single_price = $pp_price['product_price'];
                            $values = array_sum($product_price);
                            $total += $values;
                                    
                            ?>

                            <tr align ="center">

                                <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/> </td>
                                <td><?php echo $product_title; ?><br> 
                                <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60"  height="40">
                                </td>
                                <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?> "></td>
                                    <?php 
                                        if(isset($_POST['update_cart'])) {
                                            $qty = $_POST['qty'];
                                            $update_qty = "update cart set qty = '$qty'";
                                            $run_update_qty = mysqli_query($con, $update_qty);
                                            $_SESSION['qty'] = $qty; //use SESSION Libraries 
                                            $total = $total * $qty;
                                        }
                                    ?>
                                
                                
                                <td><?php echo "$". $single_price; ?> </td>
                            </tr>
                        <?php  } } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="center"><b><?php echo "Sub Total: $".$total; ?></b></td>

                            </tr>

                            <tr>
                                <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
                                <td><input type="submit" name="continue" value="Continue Shopping"></td>
                                <td><button><a href="checkout.php" style="text-decoration:none; color:black">checkout</a></button></td>
                            
                            </tr>
                        </table>
                    
                    </form> 

                    <?php 

                        function updatecart(){
                        $ip = getIp();
                        if(isset($_POST['update_cart'])){

                            foreach($_POST['remove'] as $remove_id){

                                $delete_product = "delete from cart where p_id = '$remove_id' AND ip_add='$ip'";
                                $run_delete = mysqli_query($con, $delete_product);
                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }                                    

                        }

                        if(isset($_POST['continue'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        echo @$up_cart = updatecart();
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