<?php 

$db = mysqli_connect("localhost","root","","ecom_store");

function add_cart(){

    global $db;
    
    if(isset($_GET['add_cart'])){

        if (!isset($_SESSION['customer_id'])) {

            echo "<script>window.location='checkout.php'</script>";

        } else {

            $c_id = $_SESSION['customer_id'];
            
            $p_id = $_GET['add_cart'];

            $p_qty = $_POST['product_qty'];

            $check_owner = "select * from products where product_id='$p_id' and customer_id='$c_id'";

            $run_check_owner = mysqli_query($db,$check_owner);

            if (mysqli_num_rows($run_check_owner) > 0) {

                echo "<script>alert('This is your product! You can\'t add to your cart!')</script>";

                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

            } else {

                $check_product = "select * from cart where customer_id='$c_id' AND p_id='$p_id'";
            
                $run_check = mysqli_query($db,$check_product);
    
                
                
                if(mysqli_num_rows($run_check)>0){
                    
                    echo "<script>alert('This product has already added in cart');</script>";
    
                    echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                    
                }else{
                    
                    $query = "insert into cart (p_id,customer_id,qty) values ('$p_id','$c_id','$p_qty')";
                    
                    $run_query = mysqli_query($db,$query);
                    
                    echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                    
                }

            }
        
        }
        
        
    }
    
}




function getPro(){
    
    global $db;
    
    $get_products = "select * from products order by rand() DESC LIMIT 8";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];
        
        $pro_img = $row_products['product_img'];
        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='../products/product_images/$pro_img' style='max-width:200px;max-height:250px;'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        $ $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";
        
    }
}


function items(){
    
    global $db;
    
    $c_id = $_SESSION['customer_id'];
    
    $get_items = "select * from cart where customer_id='$c_id'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}


function total_price(){
    
    global $db;
    
    $c_id = $_SESSION['customer_id'];
    
    $total = 0;
    
    $select_cart = "select * from cart where customer_id='$c_id'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['qty'];
        
        $get_price = "select * from products where product_id='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['product_price']*$pro_qty;
            
            $total += $sub_total;
            
        }
        
    }
    
    return $total;
    
}


?>