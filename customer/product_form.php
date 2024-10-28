<script src="js/change_img.js"></script>

<?php 

    $active='Account';
    include("includes/header.php");
    include("product_action.php");

    if (!isset($_SESSION['customer_id'])) {

        header('Location: checkout.php');

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
                        <?php
                        
                            if ($action == "sell") {

                                echo "Sell Product";

                            } else if ($action == "update") {

                                echo "Update Product";

                            }

                        ?>
                   </li>
               </ul>
               
            </div>

            <div class="col-md-1">
            </div>

            <div class="col-md-9">
                
                <div class="box">
                    
                    <div class="box-header">
                        
                        <center>
                            
                            <h2>
                            <?php
                        
                                if ($action == "sell") {

                                    echo "Sell Your Product";

                                } else if ($action == "update") {

                                    echo "Update Your Product";

                                }

                            ?>
                            </h2>
                            
                        </center>

                        <?php

                            if ($action=="sell") {

                                echo "<form action='product_form.php?action=sell' method='post' enctype='multipart/form-data'>";

                            } else if ($action=="update") {

                                echo "<form action='product_form.php?action=update&pro_id=$p_id' method='post' enctype='multipart/form-data'>";

                            }
                        
                        ?>
                        
                        <form action="product_form.php?action=<?php ?>" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                
                                <label>Product Name</label>

                                <br>
                                
                                <input type="text" name="f_p_name" value="<?php echo $p_name;?>" required maxlength="30" style="width:300px;font-size:16px;">
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>Product Quantity</label>

                                <br>
                                
                                <input type="number" min="1" max="999" name="f_p_qty" value="<?php echo $p_qty;?>" required style="text-align:center;width:150px;font-size:20px;">
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>Product Price ($)</label>

                                <br>

                                <input type="number" min="1" max="999999" step="0.1" name="f_p_price" value="<?php echo $p_price;?>" required style="text-align:center; width:150px;font-size:20px;">             
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>Product Description</label>

                                <br>
                                
                                <textarea rows="7" cols="80" maxlength="800" name="f_p_desc" style="resize: none;" placeholder="Enter your product details..." required><?php echo $p_desc;?></textarea>
                                
                            </div>

                            <div class="form-group">
                                
                                <label>Product Expiry Date</label>

                                <br>

                                <input type="date" min="1" max="999999" step="0.1" name="f_p_expiry" value="<?php echo $p_expiry;?>" style="text-align:center; width:200px;font-size:16px;">                          
                                
                            </div>          

                            <div class="form-group">
                                
                                <label>Produte Image</label>
                                
                                <input type="file" accept="image/*" class="form-control form-height-custom" name="f_p_image" onchange="loadImage(event)" <?php echo ($action=="sell")? "required": ""; ?>>

                                <img id="preview_img" class="img-responsive" src="../products/product_images/<?php echo $p_img;?>" alt="Product Image" width="220px">
                                
                            </div>
                        
                            <div class="text-center">
                                
                                <input type="submit" name="submit" value="<?php echo $btn_name;?>" class="btn btn-primary"/>
                                
                            </div>
                            
                        </form>
                        
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

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_contact,customer_image) values ('$c_name','$c_email','$c_pass','$c_contact','$c_image')";
    
    $run_customer = mysqli_query($con,$insert_customer);

    $get_customer_id = "select customer_id from customers where customer_name='$c_name' and customer_email='$c_email' and customer_pass='$c_pass' and customer_contact='$c_contact'";

    $run_customer_id = mysqli_query($con,$get_customer_id);

    $extract_result = mysqli_fetch_assoc($run_customer_id);

    extract($extract_result);

    $c_id = $customer_id;

    echo "<script>alert('$c_id')</script>";

    $_SESSION['customer_id']=$c_id;

    $_SESSION['customer_name']=$c_name;

    $_SESSION['customer_email']=$c_email;
    
    echo "<script>alert('You have been Registered Sucessfully')</script>";
    
    echo "<script>window.open('index.php','_self')</script>";
    
}

?>