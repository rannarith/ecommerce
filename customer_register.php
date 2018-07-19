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
                    <?php cart(); ?>
                    <div id="shopping_cart">
                   
                        <span style="float:right; font-size: 18px; padding:5px; line-height: 40px;"> 
                        
                        Welcome Guest! <b style="color:yellow">Shopping cart:</b>Total Item:<b style="color: red"><?php total_items(); ?> </b>
                        </b>Total Pirce:<b style="color: red"><?php total_price(); ?></b>
                        <a href="cart.php" style="color:yellow">Go to Cart</a>
                        </span>
                    
                    </div>
               
                        <form action="customer_register.php" method="POST" enctype="multipart/form-data">

                            <table align="center" width="750">

                                <tr align="center">
                                    <td colspan="6"><h2>Create an Account</h2></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer Name:</td>
                                    <td><input type="text" name="c_name" /></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer Email:</td>
                                    <td><input type="text" name="c_email" /></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer Password</td>
                                    <td><input type="password" name="c_pass" /></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer Image</td>
                                    <td><input type="file" name="c_image" /></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer Country</td>
                                    <td>

                                        <select name="c_country" >
                                            <option>Select a Country</option>
                                            <option>Cambodia</option>
                                            <option>Chinese</option>
                                            <option>US</option>
                                            <option>thai</option>
                                            <option>Paris</option>
                                            <option>Australia</option>
                                            <option>VN</option>
                                            <option>SP</option>
                                        
                                        </select>
                                    
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right">Customer City</td>
                                    <td><input type="text" name="c_city" /></td>
                                </tr>

                                <tr>
                                    <td align="right">Customer Contact:</td>
                                    <td><input type="text" name="c_contact" /></td>
                                </tr>

                                <tr>
                                    <td align="right"> Customer Address </td>
                                    <td><input type="text" name="c_address" /></td>
                                </tr>

                                <tr align="center">
                                    <td colspan="6"><input type="submit" name="register" value="Create Account"/></td>
                                </tr>
                            
                            </table>
                        
                        </form>  
                   

                </div>
                <!-- End content _area-->

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

<?php 

    if(isset($_POST['register'])) {

        $ip = getIp();

        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tpm = $_FILES['c_image']['tmp_name'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        
        move_uploaded_file($c_image_tpm,"customer/customer_images/$c_image");

        $insert_c = "insert into customer1 
        (customer_ip, customer_name, customer_email, customer_pass)
        values ('$ip','$c_name','$c_email', '$c_pass')";
        

        $run_c = mysqli_query($con, $insert_c);

        if($run_c) {
            
            echo "<script>alert('registation succesfull')</script>";

        }







    }


?>
