<?php 

    include("includes/db.php");
    
    if (isset($_POST['submit'])) {

        $delete_account = $_POST['submit'];

        if ($delete_account == "Yes, I Want To Delete") {

            session_start();

            $c_id = $_SESSION['customer_id'];

            $get_product_id = "select * from products where customer_id='$c_id'";

            $run_product_id = mysqli_query($con,$get_product_id);

            while($result = mysqli_fetch_assoc($run_product_id)) {

                $p_id = $result['product_id'];

                $delete_cart = "delete from cart where p_id='$p_id'";

                $run_delete_cart = mysqli_query($con,$delete_cart);

            }

            $delete_product = "delete from products where customer_id='$c_id'";

            $run_delete_product = mysqli_query($con,$delete_product);

            $delete_customer = "delete from customers where customer_id='$c_id'";

            $run_delete_customer = mysqli_query($con,$delete_customer);

            echo "<script>alert('Account deleted!');window.location='logout.php';</script>";

        } else {

            echo "<script>window.location='my_account.php';</script>";

        }

    }
?>

<center>
    
    <h1> Do You Realy Want To Delete Your Account ? </h1>
    
    <form action="delete_account.php" method="post">
        
       <input type="submit" name="submit" value="Yes, I Want To Delete" class="btn btn-danger"> 
        
       <input type="submit" name="submit" value="No, I Dont Want To Delete" class="btn btn-primary"> 
        
    </form>
    
</center>