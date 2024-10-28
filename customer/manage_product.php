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
                       My Product
                   </li>
               </ul>
               
           </div>

           <div class="col-md-1">
            </div>
           
           <div class="col-md-10">
               
               <div class="box">
                       
                       <h1>My Product</h1>
                       
                       <div class="table-responsive">
                           
                           <table class="table">
                               
                               <thead>
                                   
                                   <tr>
                                       
                                       <th>Image</th>
                                       <th>Name</th>
                                       <th>Quantity</th>
                                       <th>Unit Price</th>
                                       <th>Modify</th>
                                       <th>Delete</th>
                                       
                                   </tr>
                                   
                               </thead>
                               
                               <tbody>
                                  
                                  <?php 
                                        $c_id = $_SESSION['customer_id'];
                            
                                        $select_c_product = "select * from products where customer_id='$c_id' order by date asc, product_id asc";
                                        
                                        $run_c_product = mysqli_query($con,$select_c_product);
                                        
                                        $count = mysqli_num_rows($run_c_product);

                                        if ($count > 0) {
                                
                                        while($row_products = mysqli_fetch_array($run_c_product)){

                                                $product_id = $row_products['product_id'];
                                            
                                                $product_title = $row_products['product_title'];
                                                
                                                $product_img = $row_products['product_img'];
                                                
                                                $product_qty = $row_products['product_qty'];
                                                
                                                $product_price = $row_products['product_price'];
                                        
                                           
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
                                           
                                           <a href="product_form.php?action=update&pro_id=<?php echo $product_id;?>">UPDATE</a>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                            <a href="delete_product.php?action=delete&pro_id=<?php echo $product_id;?>" onclick="return confirm('Do you want to delete this product?')">DELETE</a>
                                           
                                       </td>
                                       
                                   </tr>
                                   
                                   <?php }
                                        } else {

                                            echo "<tr><td colspan='6'><center><h2>You have no products on sale now!</h2></center></td></tr>";

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