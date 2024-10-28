<div id="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-6 col-md-2">
        </div>  
            <div class="col-sm-6 col-md-3">
               
               <h4>Pages</h4>
                
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                </ul>
                
                </div>
                <div class="col-sm-6 col-md-3">
                
                <h4>User Section</h4>
                
                <ul>
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>Login</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_functions'>My Account</a>"; 
                               
                           }
                           
                           ?>
                    
                    <li><a href="customer_register.php">Register</a></li>
                </ul>
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div>

            <div class="col-sm-6 col-md-3">
                <h4>Find Us</h4>
                <p>
                    +852 2345 6789
                    <br/>chui123@gmail.com
                    <br/><strong>Mr Chui</strong>
                    
                </p>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
        
        </div>
    </div>
</div>