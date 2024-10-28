<?php 

    $active='Account';
    include("includes/header.php");

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
                       Register
                   </li>
               </ul>
               
            </div>

            <div class="col-md-1">
            </div>  

            <div class="col-md-9">
                
                <div class="box">
                    
                    <div class="box-header">
                        
                        <center>
                            
                            <h2> Register a new account </h2>
                            
                        </center>
                        
                        <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                            
                            <div class="form-group">
                                
                                <label>Your Name</label>
                                
                                <input type="text" class="form-control" name="c_name" minlength="1" required>
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>Your Email</label>
                                
                                <input type="email" class="form-control" name="c_email" required>
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>Your Password</label>
                                
                                <input type="password" class="form-control" name="c_pass" minlength="8" maxlength="20" required>
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <label>Your Contact</label>
                                
                                <input type="text" class="form-control" name="c_contact" pattern="[0-9]{8}" title="This should be a 8 digit contact number" required>
                                
                            </div>

                            <div class="form-group">
                                
                                <label>Your Profile Picture</label>
                                
                                <input type="file" accept="image/*" class="form-control form-height-custom" name="c_image" onchange="loadImage(event)" required>

                                <img id="preview_img" class="img-responsive" src="" alt="Costumer Image" style='max-width:200px;max-height:250px;'>
                                
                            </div>
                        
                            <div class="text-center">
                                
                                <button type="submit" name="register" class="btn btn-primary">
                                
                                <i class="fa fa-user-md"></i> Register
                                
                                </button>
                                
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

    $_SESSION['customer_id']=$c_id;

    $_SESSION['customer_name']=$c_name;

    $_SESSION['customer_email']=$c_email;
    
    echo "<script>alert('You have been Registered Sucessfully')</script>";
    
    echo "<script>window.open('index.php','_self')</script>";
    
}

?>