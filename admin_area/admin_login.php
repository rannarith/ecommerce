<?php 

session_start();
include("includes/db.php");

?>

<div>
    
    <h2>Please loging befor use </h2>

    <form action="" method="post">
    
        
    <table width="795" align="center" bgcolor="gray">
        
            <tr>
                <td align="center" colspan="2"><h2>Admin Login</h2></td>
            
            </tr>

            <tr>
                <td align="right"><b>Email:</b></td>
                <td><input type="text" name="email" placeholder="enter email"/></td>
            
            </tr>

            <tr>
                <td align="right"><b>Password:</b></td>
                <td><input type="password" name="password" placeholder="enter password"/></td>
            </tr>

            <tr align="center">
                <td colspan="5"><a href="checkout.php?forgot_pass="> Forgot Password</a></td>
            </tr>

            <tr align="center">
                <td colspan="4"><input type="submit" name="login" value="Login"/></td>
            </tr>
        
        </table>

            
    
    </form>
<?php 

if(isset($_POST['login'])) {

    $user_email = $_POST['email'];
    $user_pass = $_POST['password'];

    $sel_user = "select * from admins where user_pass = '$user_pass' AND user_email = '$user_email'";

    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);

    if($check_user==0) {

        echo "<script>alert('Password or email is incorrect Plz try again!')</script>";
        exit();
    }
    else {

        $_SESSION['user_email'] = $user_email;

        echo "<script>alert('You Login successfully!') </script>";

        echo "<script>window.open('index.php?Loged_in=You are admin','_self')</script>";
    }

}


?>



</div>