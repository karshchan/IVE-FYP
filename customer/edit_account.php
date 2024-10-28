<script src="js/change_img.js"></script>

<?php

$c_id = $_SESSION['customer_id'];

$get_c_img = "select * from customers where customer_id='$c_id'";

$run_get_c_img = mysqli_query($con, $get_c_img);

$extract_result = mysqli_fetch_array($run_get_c_img);

$c_img = $extract_result['customer_image'];

$name = $extract_result['customer_name'];

$email = $extract_result['customer_email'];

$contact = $extract_result['customer_contact'];

?>

<h1 align="center"> Edit Your Account </h1>


<form action="update_account.php" method="post" enctype="multipart/form-data">

    <div class="form-group">

        <label> Costumer Name: </label>

        <input type="text" name="c_name" class="form-control" minlength="1" value="<?php echo $name; ?>" required>

    </div>

    <div class="form-group">

        <label> Costumer Email: </label>

        <input type="email" name="c_email" class="form-control" value="<?php echo $email; ?>" required>

    </div>

    <div class="form-group">

        <label> Costumer Contact: </label>

        <input type="text" name="c_contact" class="form-control" minlength="8" maxlength="20" value="<?php echo $contact; ?>" required>

    </div>

    <div class="form-group">

        <label> Costumer Image: </label>

        <input type="file" accept="image/*" name="c_image" class="form-control form-height-custom"
            onchange="loadImage(event)" value="customer_images/<?php echo $c_img; ?>">

        <img id="preview_img" class="img-responsive" src="customer_images/<?php echo $c_img; ?>" alt="Costumer Image"
            style='max-width:200px;max-height:250px;'>

    </div>

    <div class="text-center">

        <button name="update" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Update Now

        </button>

    </div>

</form>