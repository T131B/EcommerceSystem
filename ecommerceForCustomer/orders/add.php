<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';
include '../genral/functions.php';

$select= "SELECT * FROM products WHERE categoryID = 2";
$s = mysqli_query($conn, $select);

if (isset($_GET['pID'])){
    $pID = $_GET['pID'];
}
if (isset($_SESSION['id'])){
    
 $customerID= $_SESSION['id'];
}

if(isset($_POST['send'])){
    $productid= $_POST['productID'];
    $customerid=$_POST['customerID'];
    $insert="INSERT INTO orders VALUES (NULL, $customerid, $productid)";
    $i= mysqli_query($conn, $insert);
    testMessage($i, "Insert Order");

}




?>
<h1 class="h1 text-center my-3"> Make Order Page  </h1>
<div class="container text-center col-md-6 mt-3">
    
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                    <input type="text" name="productID" class ="form-control" value="<?php echo $pID?>">

                    </div>
                
                
            
            <div class="form-group">

            
                <input type="text" name="customerID" class ="form-control" value="<?php echo $customerID?>">
            </div>
            <button name="send" class="btn btn-success">Make Order</button>
            </form>
            </div>
           
           
        </div>

       
    
        
</div>


<?php
include '../shared/script.php'; ?>