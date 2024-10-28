<?php 

    $active='';
    include("includes/header.php");
                            
    add_cart();
                                


?>
   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                  
                   
                   <li>
                       Details
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-1">
   
   <?php 
    

    
    ?>
               
           </div>
           
           <div class="col-md-10">
               <div id="productMain" class="row">
                   <div class="col-sm-4">
                       <div id="mainImage">
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="products/product_images/<?php echo $pro_img; ?>" alt="Product image" style='max-width:200px;max-height:250px;'></center>
                                   </div>
                               </div>

                           </div>
                       </div>
                   </div>
                   
                   <div class="col-sm-8">

                       <div class="box">
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">

                               <div class="form-group">

                                   <label for="product_qty" class="col-md-5 control-label">Products Quantity:</label>
                                   
                                   <div class="col-md-7" >

                                        <input type="number" name="product_qty" value="1" min="1" max="<?php echo $pro_qty;?>" id="product_qty" class="form-control"/>

                                    </div>
                                   
                               </div>
                               
                               <div class="form-group">

                                   <label class="col-md-5 control-label">Expiry Date:</label>
                                   
                                   <div class="col-md-4">
                                        <label class="form-control" style="border:0px;"> 

                                            <?php
                                            
                                                if ($pro_expiry == null) {

                                                    echo "No expiry date";

                                                } else {

                                                    echo $pro_expiry;
                                                }
                                            
                                            ?>

                                        </label>
                                       
                                   </div>
                               </div>
                               
                               <p class="price">$ <?php echo $pro_price; ?></p>
                               
                               <?php 
                               
                                    if ($pro_qty > 0) {

                                        echo "<p class='text-center buttons'><button class='btn btn-primary i fa fa-shopping-cart'> Add to cart</button></p>";

                                    } else {

                                        echo "<center><h3>Not enough stock<h3></center>";
                                    }
                               ?>
                               
                               
                           </form>
                           
                       </div>
                       
                   </div>
                   
                   
               </div>
               
               <div class="box" id="details">
                       
                       <h4>Product Details</h4>
                   
                   <p>
                       
                       <?php echo $pro_desc; ?>
                       
                   </p>
                   
               </div>
               
               <div id="row same-heigh-row">
                   <div class="col-md-3 col-sm-6">
                       <div class="box same-height headline">
                           <h3 class="text-center">Products You May Like</h3>
                       </div>
                   </div>
                   
                   <?php 
                   
                    $get_products = "select * from products order by rand() LIMIT 0,3";
                   
                    $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_img = $row_products['product_img'];
                       
                       $pro_price = $row_products['product_price'];
                       
                       echo "
                       
                        <div class='col-md-3 col-sm-6 center-responsive'>
                        
                            <div class='product same-height'>
                            
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    <img class='img-responsive' src='products/product_images/$pro_img' style='max-width:200px;max-height:250px;'>
                                
                                </a>
                                
                                <div class='text'>
                                
                                    <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                    
                                    <p class='price'> $ $pro_price </p>
                                
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
