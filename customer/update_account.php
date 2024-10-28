<?php

    include("includes/db.php");

    session_start();

    if (!isset($_POST['update'])) {

        echo "<script>alert('Error! No information for update!');window.location='my_account.php';</script>";

    } else {

        $c_id = $_SESSION['customer_id'];

        $c_name = $_POST['c_name'];

        $c_email = $_POST['c_email'];

        $c_contact = $_POST['c_contact'];

        $c_image = $_FILES['c_image']['name'];

        if ($c_image != null) {

            $c_image_tmp = $_FILES['c_image']['tmp_name'];

            move_uploaded_file($c_image_tmp,"customer_images/$c_image");

            $update_customer = "update customers set customer_name='$c_name' , customer_email='$c_email' , customer_contact='$c_contact' , customer_image='$c_image' where customer_id='$c_id'";

            $run_update_customer = mysqli_query($con,$update_customer);

        } else {


            $update_customer = "update customers set customer_name='$c_name' , customer_email='$c_email' , customer_contact='$c_contact' where customer_id='$c_id'";

            $run_update_customer = mysqli_query($con,$update_customer);

        }

        if (mysqli_affected_rows($con) == 1) {

            $_SESSION['customer_name'] = $c_name;

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('Update success!');window.location='my_account.php';</script>";

        } else {

            echo "<script>alert('Error occur! No update is made!');window.location='my_account.php';</script>";

        }

        
        
    }

?>