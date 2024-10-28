<?php 

    $active='Account';
    include("includes/header.php");

?>
   
   <div id="content">
       
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       <?php

                            if (isset($_SESSION['customer_id'])) {

                                echo "<li><a href='customer/my_account.php'>My Account</a></li>";

                                echo "<li>Payment</li>";

                            } else {

                                echo "<li>Login</li>" ;

                            }
                       
                       ?>
                       
                   </li>
               </ul>

   <?php 
    
    ?>
               
           </div>
           
           <div class="col-md-1">
            </div>  

                <div class="col-md-9">
                <?php 
                
                if(!isset($_SESSION['customer_email'])){
                    
                    include("customer/customer_login.php");
                    
                }else{

                    if (total_price() == 0) {

                        echo "<script>alert('You don\'t have any products in cart!'); window.location='cart.php';</script>";

                    } else {

                        include("payment_options.php");

                    }
                    
                    
                    
                }
                
                ?>
                
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