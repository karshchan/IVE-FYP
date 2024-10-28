<?php

include("includes/header.php");

if (!isset($_SESSION['customer_id'])) {

    echo "<script>window.location='../checkout.php';</script>";

}

?>

<div id="content">
    <div class="container">
        <div class="col-md-12">

            <ul class="breadcrumb">
                <li>
                    <a href="../index.php">Home</a>
                </li>

                <?php

                if (isset($_GET['my_functions'])) {

                    echo "<li><a href='my_account.php'>My Account</a></li>";

                    echo "<li>My Functions</li>";

                } else if (isset($_GET['edit_account'])) {

                    echo "<li><a href='my_account.php'>My Account</a></li>";

                    echo "<li><li>Edit Account</li>";

                } else if (isset($_GET['change_pass'])) {

                    echo "<li><a href='my_account.php'>My Account</a></li>";

                    echo "<li>Change Password </li>";

                } else if (isset($_GET['delete_account'])) {

                    echo "<li><a href='my_account.php'>My Account</a></li>";

                    echo "<li>Delete Account</li>";

                } else {

                    echo "<li>My Account</li>";
                }

                ?>
            </ul>

        </div>

        <div class="col-md-3">

            <?php

            include("includes/sidebar.php");

            ?>

        </div>

        <div class="col-md-9">

            <div class="box">

                <?php

                if (isset($_GET['my_functions'])) {
                    include("my_functions.php");
                }

                ?>

                <?php

                if (isset($_GET['edit_account'])) {
                    include("edit_account.php");
                }

                ?>

                <?php

                if (isset($_GET['change_pass'])) {
                    include("change_pass.php");
                }

                ?>

                <?php

                if (isset($_GET['delete_account'])) {
                    include("delete_account.php");
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