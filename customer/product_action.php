<?php

    if (isset($_SESSION['customer_id'])) {

        $c_id = $_SESSION['customer_id'];

        if (isset($_POST['submit'])) {

            $f_p_name = $_POST['f_p_name'];

            $f_p_qty = $_POST['f_p_qty'];

            $f_p_price = $_POST['f_p_price'];

            $f_p_desc = $_POST['f_p_desc'];

            $f_p_expiry = $_POST['f_p_expiry'];

            $f_p_image = $_FILES['f_p_image']['name'];

            $target_dir = "../products/product_images/";

            $target_file = $target_dir.basename($_FILES["f_p_image"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if (isset($_GET['action'])) {

                $action = $_GET['action'];

                if ($action=="sell") {

                    $f_p_image = rand(1,999999)."-".$f_p_image;

                    $target_dir = "../products/product_images/";

                    $target_file = $target_dir.basename($_FILES["f_p_image"]["name"]);

                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
                    move_uploaded_file($_FILES['f_p_image']['tmp_name'],$target_dir.$f_p_image);
        
                    if ($f_p_expiry == null) {

                        $insert_product = "insert into products(customer_id, product_title, product_img, product_qty, product_price, product_desc) values ('$c_id','$f_p_name','$f_p_image','$f_p_qty','$f_p_price','$f_p_desc')";
        
                    } else {

                        $insert_product = "insert into products(customer_id, product_title, product_img, product_qty, product_price, product_desc, product_expirydate) values ('$c_id','$f_p_name','$f_p_image','$f_p_qty','$f_p_price','$f_p_desc','$f_p_expiry')";

                    }

                    $run_insert_product = mysqli_query($con,$insert_product);

                    if (mysqli_affected_rows($con) > 0) {

                        echo "<script>alert('Your product is on sale now!'); window.location='my_account.php?my_functions'</script>";
                        
                    } else {

                        echo "<script>alert('Upload fail! Your product is not uploaded!'); window.location='my_account.php?my_functions'</script>";
                    }

                } else if ($action=="update") {

                    $p_id = $_GET['pro_id'];

                    if ($f_p_image != null) {

                        $f_p_image = rand(1,999999)."-".$f_p_image;

                        $target_dir = "../products/product_images/";
    
                        $target_file = $target_dir.basename($_FILES["f_p_image"]["name"]);
    
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
                        move_uploaded_file($_FILES['f_p_image']['tmp_name'],$target_dir.$f_p_image);

                        if ($f_p_expiry == null) {

                            $update_product = "update products set product_title='$f_p_name',product_img='$f_p_image',product_qty='$f_p_qty',product_price='$f_p_price',product_desc='$f_p_desc' where product_id='$p_id' and customer_id='$c_id'";
                        } else {

                            $update_product = "update products set product_title='$f_p_name',product_img='$f_p_image',product_qty='$f_p_qty',product_price='$f_p_price',product_desc='$f_p_desc',product_expirydate='$f_p_expiry' where product_id='$p_id' and customer_id='$c_id'";
                        }

                    } else {

                        if ($f_p_expiry == null) {

                            $update_product = "update products set product_title='$f_p_name',product_qty='$f_p_qty',product_price='$f_p_price',product_desc='$f_p_desc',product_expirydate=null where product_id='$p_id' and customer_id='$c_id'";

                        } else {

                            $update_product = "update products set product_title='$f_p_name',product_qty='$f_p_qty',product_price='$f_p_price',product_desc='$f_p_desc',product_expirydate='$f_p_expiry' where product_id='$p_id' and customer_id='$c_id'";
                        }

                    }

                    $run_update_product = mysqli_query($con,$update_product);

                    if (mysqli_affected_rows($con) > 0) {

                        echo "<script>alert('Your product is updated!'); window.location='my_account.php?my_functions'</script>";

                    } else {

                        echo "<script>alert('Update fail! No update is made!'); window.location='my_account.php?my_functions'</script>";
                    }

                }


            }

        } else {

            if (!isset($_GET['action'])) {

                echo "<script>alert('Error occur! Wrong action request!');</script>";

                echo "<script>window.location='../index.php';</script>";

            } else if (isset($_GET['action'])){

                $action = $_GET['action'];

                if ($action == 'sell') {

                    $p_name = "";

                    $p_img = "unknow.jpg";

                    $p_qty= "";

                    $p_price = "";

                    $p_desc = "";

                    $p_expiry = "";

                    $btn_name = "Sell My Product";

                } else if ($action == 'update') {

                    $p_id = $_GET['pro_id'];

                    $check_seller = "select * from products where customer_id='$c_id' and product_id='$p_id'";

                    $run_check_seller = mysqli_query($con,$check_seller);

                    if (mysqli_affected_rows($con) > 0) {

                        $extract_result = mysqli_fetch_array($run_check_seller);

                        $p_name = $extract_result['product_title'];

                        $p_img = $extract_result['product_img'];

                        $p_qty= $extract_result['product_qty'];

                        $p_price = $extract_result['product_price'];

                        $p_desc = $extract_result['product_desc'];

                        $p_expiry = $extract_result['product_expirydate'];

                        $btn_name = "Update My Product";

                    } else {

                        echo "<script>alert('Unknow error occur!');window.location='../index.php';</script>";
                    }

                }

            }

        }
        
    }

?>