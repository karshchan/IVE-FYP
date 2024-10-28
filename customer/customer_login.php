<div class="box">

<div class="col-md-3">
</div>

    <div class="box-header">
        
        <center>
            
            <h1> Login </h1>
            
            <p class="lead"> Already have our account..? </p>
        
            
        </center>
        
    </div>
    
    <form method="post" action="checkout.php">
        
        <div class="form-group">
            
            <label> Email </label>
            
            <input name="c_email" type="text" class="form-control" required>
            
        </div>
        
        <div class="form-group">
            
            <label> Password </label>
            
            <input name="c_pass" type="password" class="form-control" required>
            
        </div>
        
        <div class="text-center">
            
            <button name="login" value="Login" class="btn btn-primary">
                
                <i class="fa fa-sign-in"></i> Login
                
            </button>
            
        </div> 
        
    </form>
    
    <center>
        
        <a href="customer_register.php">
            
            <h3> Dont have account..? Register here </h3>
            
        </a> 
        
    </center>

</div>


<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $check_customer = mysqli_num_rows($run_customer);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        exit();
        
    } else {

        $extract_result = mysqli_fetch_assoc($run_customer);

        extract($extract_result);

        $_SESSION['customer_id']=$customer_id;

        $_SESSION['customer_name']=$customer_name;
        
        $_SESSION['customer_email']=$customer_email;

        $select_cart = "select * from cart where customer_id='$customer_id'";
    
        $run_cart = mysqli_query($con,$select_cart);
    
        $check_cart = mysqli_num_rows($run_cart);

        if($check_customer==1 AND $check_cart==0){
            
            echo "<script>alert('You are Logged in')</script>"; 
            
            echo "<script>window.open('customer/my_account.php?my_functions','_self')</script>";
        
        }else{
        
            echo "<script>alert('You are Logged in')</script>"; 
        
            echo "<script>window.open('checkout.php','_self')</script>";
        
        }
    }
    
}

?>