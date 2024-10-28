<?php 

    $active='Cart';
    include("includes/header.php");

    if (!isset($_SESSION['customer_id'])) {

        echo "<script>window.location='checkout.php'</script>";

    }

?>
   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Trade Record
                   </li>
               </ul>
               
           </div>

           <div class="col-md-1">
            </div>
           
           <div class="col-md-10" >
               
               <div class="box" >
                       
                       <h1>Trade Record</h1>
                       
                       <div class="table-responsive">
                           
                           <table class="table">
                               
                               <thead>
                                   
                                   <tr>
                                       
                                       <th>Image</th>
                                       <th>Name</th>
                                       <th>Quantity</th>
                                       <th>Unit Price</th>
                                       <th>Record Date</th>
                                       <th>Status</th>
                                       
                                   </tr>
                                   
                               </thead>
                               
                               <tbody>
                                  
                                  <?php 
                                        $c_id = $_SESSION['customer_id'];
                            
                                        $select_record = "select * from trade_record where seller_id='$c_id' or buyer_id='$c_id' order by record_date asc, p_id asc;";
                                        
                                        $run_record = mysqli_query($con,$select_record);
                                        
                                        $count = mysqli_num_rows($run_record);

                                        if ($count > 0) {
                                
                                        while($row_products = mysqli_fetch_array($run_record)){

                                                $product_id = $row_products['p_id'];
                                            
                                                $product_title = $row_products['product_name'];
                                                
                                                $product_img = $row_products['product_img'];
                                                
                                                $product_qty = $row_products['product_qty'];
                                                
                                                $product_price = $row_products['product_price'];

                                                $record_date =  $row_products['record_date'];

                                                if ($row_products['seller_id'] == $c_id) {

                                                    $status = "Sold";

                                                } else if ($row_products['buyer_id'] == $c_id) {

                                                    $status = "Purchased";

                                                }
                                        
                                           
                                   ?>
                                   
                                   <tr>
                                       
                                       <td>
                                           
                                           <img class="img-responsive" src="../products/product_images/<?php echo $product_img; ?>" alt="Product Image" style='max-width:80px;max-height:100px;'>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <a href="../details.php?pro_id=<?php echo $product_id; ?>"> <?php echo $product_title; ?> </a>
                                           
                                       </td>
                                       
                                       <td>
                                          
                                           <?php echo $product_qty; ?>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                          $ <?php echo $product_price; ?>
                                           
                                       </td>
                                    
                                       
                                       <td>
                                           
                                           <?php echo $record_date; ?>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                             <?php echo $status; ?>
                                           
                                       </td>
                                       
                                   </tr>
                                   
                                   <?php }
                                        } else {

                                            echo "<tr><td colspan='6'><center><h2>You have no trade record now!</h2></center></td></tr>";

                                        }
                                   
                                   ?>
                                   
                               </tbody>
                               
                           </table>
                           
                       </div>
                       
                       
                   
               </div>
               
               <div id="row same-heigh-row">
                   <div class="col-md-3 col-sm-6">
                       <div class="box same-height headline">
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div>
                   </div>
                   
                   <?php 
                   
                   $get_products = "select * from products order by rand() LIMIT 0,3";
                   
                   $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $product_id = $row_products['product_id'];
                       
                       $product_title = $row_products['product_title'];
                       
                       $product_price = $row_products['product_price'];
                       
                       $product_img = $row_products['product_img'];
                       
                       echo "
                       
                    <div class='col-md-3 col-sm-6 center-responsive'>
                       <div class='product same-height'>
                           <a href='details.php?pro_id=$product_id'>
                               <img class='img-responsive' src='../products/product_images/$product_img' alt='Product Image' style='max-width:200px;max-height:250px;'>
                            </a>
                            
                            <div class='text'>
                                <h3><a href='details.php?pro_id=$product_id'> $product_title </a></h3>
                                
                                <p class='price'>$$product_price</p>
                                
                            </div>
                            
                        </div>
                   </div>
                   
                       ";
                       
                   }
                   
                   ?>
                   
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