<?php 
    
    $c_name = $_SESSION['customer_name'];

    $c_id = $_SESSION['customer_id'];

    $get_customer_img = "select * from customers where customer_id='$c_id'";

    $run_customer_img = mysqli_query($con,$get_customer_img);

    $customer_image = mysqli_fetch_array($run_customer_img);

    $c_img = $customer_image['customer_image'];

?>

<div class="panel panel-default sidebar-menu">
    
    <div class="panel-heading">
        
        <center>

        <?php 
            echo "<img src='customer_images/$c_img' alt='Profile' class='customer-image' style='max-width:200px;max-height:250px;'>";
        ?>
            
        </center>
        
        <br/>
        
        <h3 align="center" class="panel-title">
            
            Name: <?php echo $c_name; ?>
            
        </h3>
        
    </div>
    
    <div class="panel-body">
        
        <ul class="nav-pills nav-stacked nav">
            
            <li class="<?php if(isset($_GET['my_functions'])){ echo "active"; } ?>">
                
                <a href="my_account.php?my_functions">
                    
                    <i class="fa fa-list"></i> My Functions
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?edit_account">
                    
                    <i class="fa fa-pencil"></i> Edit Account
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                
                <a href="my_account.php?change_pass">
                    
                    <i class="fa fa-user"></i> Change Password
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?delete_account">
                    
                    <i class="fa fa-trash-o"></i> Delete Account
                    
                </a>
                
            </li>
            
            <li>
                
                <a href="logout.php">
                    
                    <i class="fa fa-sign-out"></i> Log Out
                    
                </a>
                
            </li>
            
        </ul>
        
    </div>
    
</div>