<!DOCTYPE>

<html>
    <head>
        <title>Inserting Products</title>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

    </head>

<body bgcolor="skyblue">

<?php 
    
    include("includes/db.php");

   if(isset($_GET['edit_pro'])) { 
    
    $get_id = $_GET['edit_pro'];

    $sel_pro = "select * from products where product_id ='$get_id'";

    $run_pro = mysqli_query($con,$sel_pro);

    $pro = mysqli_fetch_array($run_pro);

    $pro_title = $pro['product_title'];
    $pro_cat = $pro['product_cat'];
    $pro_brand = $pro['product_brand'];
    $pro_price = $pro['product_price'];
    $pro_desc = $pro['product_desc'];
    $pro_img = $pro['product_image'];
    $pro_keyword = $pro['product_keywords'];    
    
    }


?>
    
    <form action="insert_product.php" method="post" enctype="multipart/form-data">
        <table align="center" width="795" border="1" bgcolor= "gray">
            
            <tr align="center">
                <td colspan="7"><h2>Insert New Post Here</h2></td>
            </tr>

            <tr>
                <td align="right">Product title</td>
                <td><input type="text" name="product_title" size="60"  value="<?php echo $pro_title ?>" /></td>
            </tr>

           <tr>
                <td align="right">Product Categories</td>
                <td>
                    <select name="product_cat" disabled required>
                        
                        
                        <?php
                        
                        $get_cats = "select * from categories";

                        $run_cats = mysqli_query($con, $get_cats);
                    
                        while ($row_cats = mysqli_fetch_array($run_cats)){
                    
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                    
                        echo "<option value='$cat_id'>$cat_title</option>";
                    
                        }                        
                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td align="right">Product Brand</td>
                <td>
                    <select name="product_brand" disabled required>
                       
                        <?php
                        
                        $get_brands = "select * from brands";

                        $run_brands = mysqli_query($con, $get_brands);

                        while ($row_brands = mysqli_fetch_array($run_brands)){

                            $brand_id = $row_brands['brand_id'];
                            $brand_title = $row_brands['brand_title'];

                        echo "<option value='$brand_id'>$brand_title</option>";
                        
                        }             
                        ?>

                    </select>
                </td>
                
            </tr>
            <tr>
                <td align="right">Product Images</td>
                <td><input type="file" name="product_image" /> <img src="product_images/<?php echo $pro_img;?>" width="60" height="50"></td>
            </tr>
            <tr>
                <td align="right">Product Price</td>
                <td><input type="text" name="product_price" value="<?php echo $pro_price ?>" /></td>
            </tr>
            <tr>
                <td align="right">Product Description</td>
                <td><textarea name="product_desc" size="80" width="50" ><?php echo $pro_desc;?></textarea></td>
            </tr>
            <tr>
                <td align="right">Product Keyword</td>
                <td><input type="text" name="product_keywords" size="50" value="<?php echo $pro_keyword;?>"/></td>
            </tr>
            <tr align="center">
                
                <td colspan="7"><input type="submit" name="update" value="Update Product"/></td>
            </tr>


            

        </table>
    
    </form>



</body>



</html>

<?php 

   if(isset($_POST['update'])){
        
        // Getting the text data from the fields
        $product_id = $get_id;
        $product_title = $_POST['product_title'];
        
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        // getting the image from the fild
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp,"product_images/$product_image");
        
        $update_pro = "update products set
        product_title='$product_title',
        product_price='$product_price',product_desc='$product_desc',product_image='$product_image'
        ,product_keywords='$product_keywords' where product_id='$product_id'";
        
        
        $run_update = mysqli_query($con, $update_pro);

        if($run_update){

            echo "<script>alert('Product has been inserted')</script>";
            echo "<script>window.open('index.php?edit_pro','_self')</script>";
        }
        
   }

?>