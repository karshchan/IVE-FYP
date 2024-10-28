<?php

    include("includes/db.php");

    if (isset($_POST['submit'])) {

        session_start();

        $c_id = $_SESSION['customer_id'];

        $old_pass = $_POST['old_pass'];

        $new_pass = $_POST['new_pass'];

        $new_pass_again = $_POST['new_pass_again'];

        if (($old_pass == $new_pass) and ($new_pass == $new_pass_again)) {

            echo "<script>alert('Update faile! Your new passwrod is same as the old one!');window.location='my_account.php';</script>";

        } else {

            $check_old_pass = "select * from customers where customer_id='$c_id' and customer_pass='$old_pass'";

            $run_check_old_pass = mysqli_query($con,$check_old_pass);

            if (mysqli_affected_rows($con) == 1) { 

                if ($new_pass == $new_pass_again) {

                    $update_pass = "update customers set customer_pass='$new_pass' where customer_id='$c_id'";

                    $run_update_pass = mysqli_query($con,$update_pass);

                    if (mysqli_affected_rows($con) == 1) {

                        echo "<script>alert('Update success!');window.location='my_account.php';</script>";
                    }

                } else {

                    echo "<script>alert('Update faile! Two inputed new passwrod is not the same!');window.location='my_account.php';</script>";
                }

            } else {

                echo "<script>alert('Update faile! Your inputed old password is wrong!');window.location='my_account.php';</script>";

            }
        }

    }

?>

<h1 align="center"> Change Password </h1>


<form action="change_pass.php" method="post">
    
    <div class="form-group">
        
        <label> Your Old Password: </label>
        
        <input type="text" name="old_pass" class="form-control" required>
        
    </div>
    
    <div class="form-group">
        
        <label> Your New Password: </label>
        
        <input type="text" name="new_pass" class="form-control" required>
        
    </div>
    
    <div class="form-group">
        
        <label> Confirm Your New Password: </label>
        
        <input type="text" name="new_pass_again" class="form-control" required>
        
    </div>
    
    <div class="text-center">
        
        <button type="submit" name="submit" class="btn btn-primary"><!-- btn btn-primary Begin -->
            
            <i class="fa fa-user-md"></i> Update Now
            
        </button>
        
    </div>
    
</form>