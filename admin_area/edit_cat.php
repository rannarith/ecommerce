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

   if(isset($_GET['edit_cat'])) { 
    
    $get_cat_id = $_GET['edit_cat'];

    $sel_cat = "select * from categories where cat_id ='$get_cat_id'";

    $run_cat = mysqli_query($con,$sel_cat);

    $cat = mysqli_fetch_array($run_cat);

    $cat_title = $cat['cat_title'];
    
    }


?>
    
    <form method="post" enctype="multipart/form-data">
        <table align="center" width="795" border="1" bgcolor= "gray">
            
            <tr align="center">
                <td colspan="7"><h2>Please update Categories</h2></td>
            </tr>

            <tr>
                <td align="right">Categories title</td>
                <td><input type="text" name="cat_title" size="60"  value="<?php echo $cat_title ?>" /></td>
            </tr>

           
            <tr align="center">
                
                <td colspan="7"><input type="submit" name="update_cat" value="Update Categories"/></td>
            </tr>


            

        </table>
    
    </form>



</body>



</html>

<?php 

   if(isset($_POST['update_cat'])){
        
        // Getting the text data from the fields
        $cat_id = $get_cat_id;
        $cat_title = $_POST['cat_title'];
        
        
        
        $update_cat = "update categories set
        cat_title='$cat_title' where cat_id='$cat_id' ";
        
        
        $run_updatecat = mysqli_query($con, $update_cat);

        if($run_updatecat){

            echo "<script>alert('Categories has been update')</script>";
            echo "<script>window.open('index.php?view_cat','_self')</script>";
        }
        
   }
