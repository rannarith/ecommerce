<form action="" method="post" >
    <h3>Insert New Brand</h3>
    <input type="text" name="new_brand" />
    <input type="submit" name="add_brand" value="Add Brand"/>




</form>

<?php 
    include("includes/db.php");

    if(isset($_POST['add_brand'])) {
    
            $new_brand = $_POST['new_brand'];
            $insert_brand = "insert into brands (brand_title) values ('$new_brand')";

            $run_brand = mysqli_query($con, $insert_brand);

            if($run_brand) {
            echo "<script> alert('New Brand has been added')</script>";
            echo "<script> window.open('index.php?view_brand','_self')</script>";
            }
    }


?>