<?php

    if ( isset($_SESSION['customer_id'])) {

        $c_id = $_SESSION['customer_id'];

    } else {

        echo "<script>alert('Error occur! Unexpected error!'); window.location='index.php';</script>";
        
    }
    

?>
<div class="box">
    
    <h1 class="text-center">Payment For You</h1>  
     
     <center>
         
        <p class="lead">
            
            <a href="payment_form.php?c_id=<?php echo $c_id;?>">
                
                Online Payment
                
                <img class="img-responsive" src="images/paypall_img.png" alt="img-paypall">
                
            </a>
            
        </p> 
         
     </center>
    
</div><