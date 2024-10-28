<?php

    include("includes/db.php");

    session_start();

    if (isset($_GET['action']) && isset($_GET['pro_id'])) {

        $action = $_GET['action'];

        $p_id = $_GET['pro_id'];
        
        $c_id = $_SESSION['customer_id'];

        if ($action == "delete") {

            $delete_product = "delete from products where customer_id='$c_id' and product_id='$p_id'";

            $run_delete_product = mysqli_query($con,$delete_product);

            if (mysqli_affected_rows($con) > 0) {

                $delete_cart= "delete from cart where p_id='$p_id'";

                $result2 = mysqli_query($con, $delete_cart);

                if (mysqli_affected_rows($con) > 0) {

                    echo "<script>alert('Product deleted!'); window.location='my_account.php?my_functions';</script>";

                } else {

                    echo "<script>alert('Error occur! Unexpected Error!'); window.location='my_account.php';</script>";

                }

            } else {

                echo "<script>alert('Error occur! No product deleted!'); window.location='my_account.php';</script>";

            }
        }
    }

?>