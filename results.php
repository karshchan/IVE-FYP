<?php 

    $active='Home';
    include("includes/header.php");

    $keyword = $_GET['keyword'];

?>

   
   <div id="hot">
        <div class="col-md-12">
            
            <h2>
                Search Result Of: <?php echo $keyword;?>
            </h2>    
            
        </div>            
   </div>

   <div style="margin-bottom:200px;">
    
    </div>
   
   <div id="content" class="container" style="min-height:400px">
       
       <div class="row">
          
          <?php 

            getSearch();
           
           ?>
           
       </div>
       
   </div>
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>