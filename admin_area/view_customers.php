
<table width="795" align="center" bgcolor="pink">

<tr align="center">
    <td colspan="7"><h3>View All Customer Here</h3></td>
</tr>

<tr align="center" bgcolor="skyblue">
    <th>S.N</th>
    <th>Customer Name</th>
    <th>Email</th>
    <th>Password</th>
    
    <th>Delete</th>
    
    
</tr>
<?php 
include("includes/db.php");

$get_c ="select * from customers";

$run_c = mysqli_query($con,$get_c);

$i=0;

while($row_c=mysqli_fetch_array($run_c)) {

    $c_id = $row_c['customer_id'];
    $c_name = $row_c['customer_name'];
    $c_email = $row_c['customer_email'];
    $c_img = $row_c['customer_image'];
    
    $i++;


?>
<tr align="center">
    <td><?php echo $i; ?></td>
    <td><?php echo $c_name; ?></td>
    <td><?php echo $c_email; ?></td>
    
    <td><img src="../customer/customer_images/<?php echo $c_img; ?>" width="60" height="50"/></td>
    
    <td><a href="index.php?delete_customer=<?php echo $c_id ?>">Delete</a></td> 
    
</tr>

<?php } ?>



</table>


