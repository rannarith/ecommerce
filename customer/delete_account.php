<h2>Do you want to delete your account</h2>
<form action="" method="post">

<input type="submit" name="yes" value="Do you want to delete" />
<input type="submit" name="no" value="No I don't want" />

</form>

<?php 

    include("includes/db.php");

    $user = $_SESSION['customer_email'];

    if(isset($_POST['yes'])) {
        
        $delete = "delete from customers where customer_email ='$user'";

        $run_delete = mysqli_query($con,$delete);

        echo "<script>alert('Your accocunt has been deleted')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }

    if(isset($_POST['no'])) {

        echo "<script>alert('Don't be do like this again')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";

    }

?>