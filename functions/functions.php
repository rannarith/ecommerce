<?php

$con = mysqli_connect("localhost","root","","ecommerce");

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

    $get_pro = "select * from products order by RAND() LIMIT 0,20";

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

                <a href='index.php?pro_id=$pro_id' style='float:left'>Detail</a>

                <a href='detail.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</a>
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
     

    while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
        $pro_id = $row_cat_pro['product_id'];
        $pro_cat = $row_cat_pro['product_cat'];
        $pro_brand = $row_cat_pro['product_brand'];
        $pro_title = $row_cat_pro['product_title'];
        $pro_price = $row_cat_pro['product_price'];
        $pro_image = $row_cat_pro['product_image'];
       

        echo  "
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='300' height='240' />
                <p>$ $pro_price</p>
                
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

    while ($row_bra_pro=mysqli_fetch_array($run_bra_pro)){
        $pro_id = $row_bra_pro['product_id'];
        $pro_cat = $row_bra_pro['product_cat'];
        $pro_brand = $row_bra_pro['product_brand'];
        $pro_title = $row_bra_pro['product_title'];
        $pro_price = $row_bra_pro['product_price'];
        $pro_image = $row_bra_pro['product_image'];
       

        echo  "
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='300' height='240' />
                <p>$ $pro_price</p>
                
            </div>       

        ";
    }
}

}

