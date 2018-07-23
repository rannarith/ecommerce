<?php

$con = mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_errno())
        {
            echo "Failed to connect to MYQSL:" .mysqli_connect_error();
        }

// Get user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}


//Creating shopping cart
function cart(){

    if(isset($_GET['add_cart'])){
       global $con;

       $ip = getIp();

       $pro_id = $_GET['add_cart']; 
       
       $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";

       $run_check = mysqli_query($con, $check_pro);

       if(mysqli_num_rows($run_check)>0 ) {
           echo " <h2 style= color:red> Product already add! </h2>";
         

       }
       else {
           $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
           
           $run_pro = mysqli_query($con, $insert_pro);

           echo "<script>window.open('index.php','_selft')</script>";
       }

    }

}


// getting the total added items

function total_items() {
    if(isset($_GET['add_cart'])) { 
        global $con;

        $ip = getIp();

        $get_items = "select * from cart where ip_add='$ip'";

        $run_itmes = mysqli_query($con, $get_items);

        $count_items = mysqli_num_rows($run_itmes);
    }

    else { // For update when user click another cart and update to table cart
            global $con;
            $ip = getIp();

            $get_items = "select * from cart where ip_add='$ip'";

            $run_itmes = mysqli_query($con, $get_items);

            $count_items = mysqli_num_rows($run_itmes);
        }

    echo $count_items;
    
}


// getting price 

function total_price() {

    
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

                $values = array_sum($product_price);
               
                $total += $values;
            }

        }
        
        echo $total;
        
}

    
    



// Getting the categories

function getCats(){
   
    global $con;

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($con, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)){

        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];

    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a><li>";

    }

}


// Getting the Brand

function getBrands(){
   
    global $con;

    $get_brands = "select * from brands";

    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands = mysqli_fetch_array($run_brands)){

        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];

    echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a><li>";
    
    }

}


function getPro() {

    global $con;
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){

    $get_pro = "select * from products order by RAND() LIMIT 0,9";

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
                <p><b>Price: $ $pro_price</p>

                <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>

                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</a>
            </div>       

        ";
    }
}

}

}


function getCatPro() {
    
    global $con;

    if(isset($_GET['cat'])){
    
    $cat_id =$_GET['cat'];
    
    
    $get_cat_pro = "select * from products where product_cat = '$cat_id'";

    $run_cat_pro = mysqli_query($con, $get_cat_pro);

    $count_pro = mysqli_num_rows($run_cat_pro);

        if($count_pro== 0){
            echo "<h2 style='padding:20px';>No product for show. Thank you</h2>";
        };

    while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
        $pro_id = $row_cat_pro['product_id'];
        $pro_cat = $row_cat_pro['product_cat'];
        $pro_brand = $row_cat_pro['product_brand'];
        $pro_title = $row_cat_pro['product_title'];
        $pro_price = $row_cat_pro['product_price'];
        $pro_image = $row_cat_pro['product_image'];
        $pro_desc = $row_cat_pro['product_desc'];

        echo  "
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='300' height='240' />
                <p><b>Price: $</b> $pro_price</p>
                <p> $pro_desc</p>

                <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>

                <a href='detail.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</a>
                
            </div>       

        ";
    }
}

}

function getBraPro() {
    
    global $con;

    if(isset($_GET['brand'])){
    
    $brand_id =$_GET['brand'];
    
    
    $get_bra_pro = "select * from products where product_brand = '$brand_id'";

    $run_bra_pro = mysqli_query($con, $get_bra_pro);
    $count_bar = mysqli_num_rows($run_bra_pro);
    if($count_bar == 0){
        echo "<h2 style='padding:20px';>No Brands for show. Thank you</h2>";
    }

    while ($row_bra_pro=mysqli_fetch_array($run_bra_pro)){
        $pro_id = $row_bra_pro['product_id'];
        $pro_cat = $row_bra_pro['product_cat'];
        $pro_brand = $row_bra_pro['product_brand'];
        $pro_title = $row_bra_pro['product_title'];
        $pro_price = $row_bra_pro['product_price'];
        $pro_image = $row_bra_pro['product_image'];
        $pro_desc = $row_bra_pro['product_desc'];

        echo  "
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='300' height='240' />
                <p><b>Price: $</b>$pro_price</p>
                <p> $pro_desc</p>

                <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>

                <a href='detail.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</a>
            </div>       

        ";
    }
}

}

