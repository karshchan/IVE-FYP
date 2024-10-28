<?php 

    $active='Account';

    include("includes/header.php");

    $c_id = $_GET['c_id'];

?>

<script src="js/change_img.js"></script>
   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">

                    <li>
                       <a href="index.php">Home</a>
                   </li>

            
                    <li>
                        <a href='customer/my_account.php'>My Account</a>
                    </li>

                    <li>
                        <a href='checkout.php'>Payment</a>
                    </li>
                   
                   <li>
                      Payment Form
                   </li>
               </ul>
               
            </div>

            <div class="col-md-3">
            </div>  

            <div class="col-md-6">
                
                <div class="box">
                    
                    <div class="box-header">
                        
                        <form action="payment_form.php?c_id=<?php echo $c_id;?>" method="post">

                            <center><h2>Payment Cost: $<?php echo total_price();?></h2></center>

                            <br>
                            
                            <div class="form-group">
                                
                                <label>Card holder:</label>

                                <br>
                                
                              <input type="text" style="font-size:16px; width: 300px; text-align:center;" name="card_holder" pattern="[a-zA-z]{1,100}" title="Holder name should combine by characters only" maxlength="100" required>
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>Card number:</label>

                                <br>
                                
                               <input type="text" style="font-size:16px; width: 300px; text-align:center;" name="card_number" pattern="[0-9]{10,19}" maxlength="19" title="Credit card number should be a 10 to 19 digit number" required>
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>Expiry date (MM/YY):</label>

                                <br>

                                <input type="text" style="font-size:16px; width: 50px; text-align:center;" name="expiry_month" maxlength="2" pattern="0[1-9]{1}|1[1-2]{1}" title="Month should  be 01, 02, ... , 12" required>
                                /
                                <input type="text" style="font-size:16px; width: 50px; text-align:center;" name="expiry_year" maxlength="2" pattern="[0-9]{2}" title="Year should be a 2 digit number" required>
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>CVV code(3 digit number):</label>

                                <br>
                                
                                <input type="text" style="font-size:16px; width: 100px; text-align:center;" name="cvv" pattern="[0-9]{3}" maxlength="3" title="CVV code should be a 3 digit number (e.g. 123)" required>
                            </div>

                           
                                
                            </div>
                        
                          <div class="text-center">
                           
                           <button class="btn btn-primary btn-lg" name="confirm_payment">
                               <i class="fa fa-user-md"></i> Confirm Payment
                               
                           </button>
                                
                            </div>
                            
                        
                    </div>
                    
                </div>
                
            </div>
           
       </div>

   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>



<?php 
                   
    if(isset($_POST['confirm_payment'])){

        $c_id = $_GET['c_id'];
        
        $s_c_id = $_SESSION['customer_id'];

        if ($s_c_id != $c_id) {

            echo "<script>alert('You are not paying to your cart!'); window.location='cart.php';</script>";

        } else {

            $expiry_month = $_POST['expiry_month'];

            $expiry_year = $_POST['expiry_year'];

            $current_year = date("y");

            if ($expiry_year >= $current_year) {

                $cusrrent_month = date('m');

                if ($expiry_month >= $cusrrent_month) {

                    $get_cart = "select * from cart where customer_id='$c_id'";

                    $run_cart = mysqli_query($con,$get_cart);

                    while($row_cart = mysqli_fetch_array($run_cart)){

                        $cart_p_id = $row_cart['p_id'];
                        
                        $cart_qty = $row_cart['qty'];
                        
                        $select_product = "select * from products where product_id='$cart_p_id'";

                        $run_product = mysqli_query($con,$select_product);

                        $row_product = mysqli_fetch_array($run_product);

                        $seller_id = $row_product['customer_id'];

                        $buyer_id = $c_id;

                        $product_name = $row_product['product_title'];

                        $product_img = $row_product['product_img'];

                        $product_qty = $cart_qty;

                        $product_price = $row_product['product_price'];

                        $insert_record = "insert into trade_record(p_id, seller_id, buyer_id, product_name, product_img, product_qty, product_price) values ('$cart_p_id','$seller_id','$buyer_id','$product_name','$product_img','$product_qty','$product_price')";

                        $run_record = mysqli_query($con,$insert_record);

                        $update_product = "update products set product_qty=product_qty-'$product_qty' where product_id='$cart_p_id'";

                        $run_update = mysqli_query($con,$update_product);

                        $delete_cart = "delete from cart where p_id='$cart_p_id'";

                        $run_delete = mysqli_query($con,$delete_cart);

                        echo "<script>alert('Payment success!'); window.location='index.php';</script>";


                    }


                } else {

                    echo "<script>alert('You credit card is expired!'); window.location='payment_form.php?c_id=$c_id'</script>";

                }

            } else {

                echo "<script>alert('You credit card is expired!'); window.location='payment_form.php?c_id=$c_id'</script>";

            }


        }

    }
                   
?>