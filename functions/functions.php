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

    echo "<li><a href='#'>$cat_title</a><li>";

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

    echo "<li><a href='#'>$brand_title</a><li>";
    
    }

}


function getPro() {

    global $con;
    
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

                <a href='detail.php?pro_id=$pro_id' style='float:left'>Detail</a>

                <a href='detail.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</a>
            </div>       

        ";
    }
}


// function getDetail() {

//     global $con;
//     //$pro_id = 'product_id'; // the same process
//     $get_pro = "select * from products where product_id = product_id";

//     $run_pro = mysqli_query($con, $get_pro);

//     while ($row_pro=mysqli_fetch_array($run_pro)){
//         $pro_id = $row_pro['product_id'];
//         $pro_cat = $row_pro['product_cat'];
//         $pro_brand = $row_pro['product_brand'];
//         $pro_title = $row_pro['product_title'];
//         $pro_price = $row_pro['product_price'];
//         $pro_image = $row_pro['product_image'];
//         $pro_desc = $row_pro['product_desc'];

//         echo  "
//             <div id='single_product'>
//                 <h3>$pro_title</h3>
//                 <img src='admin_area/product_images/$pro_image' width='300' height='240' />
//                 <p>$ $pro_price</p>
//                 <div id='shopping_detail'>
                
//                 <p> $pro_desc </p>

//                 </div>
               
//             </div>       

//         ";
//     }
// }

function getDetail() {

    global $con;
    //$pro_id = 'product_id'; // the same process
    $get_pro = "select * from products where product_id = product_id";

    $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        $pro_desc = $row_pro['product_desc'];

        echo  "
            <div id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='300' height='240' />
                <p>$ $pro_price</p>
                <div id='shopping_detail'>
                
                <p> $pro_desc </p>

                </div>
               
            </div>       

        ";
    }
}

