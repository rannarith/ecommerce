
<table width="795" align="center" bgcolor="pink">

    <tr align="center">
        <td colspan="7"><h3>View All Products Here</h3></td>
    </tr>

    <tr align="center" bgcolor="skyblue">
        <th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php 
    include("includes/db.php");

    $get_pro ="select * from products";

    $run_pro = mysqli_query($con,$get_pro);

    $i=0;

    while($row_pro=mysqli_fetch_array($run_pro)) {

        $pro_id = $row_pro['product_id'];
        $por_title = $row_pro['product_title'];
        $por_image = $row_pro['product_image'];
        $por_price = $row_pro['product_price'];
        $i++;
    
    
    ?>
    <tr align="center">
        <td><?php echo $i; ?></td>
        <td><?php echo $por_title; ?></td>
        <td><img src="product_images/<?php echo $por_image; ?>" width="60" height="50"/></td>
        <td><?php echo $por_price; ?></td>
        <td><a href="index.php?edit_pro=<?php echo $pro_id ?>">Edit</a></td>
        <td><a href="index.php?delete_pro=<?php echo $pro_id ?>">Delete</a></td>

    </tr>
    
    <?php } ?>

    

</table>


