
<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';
include '../genral/functions.php';

$select= "SELECT * FROM products WHERE categoryID = 2";
$s = mysqli_query($conn, $select);

?>
<h1 class="h1 text-center my-3"> List female Products page  </h1>
<div class="container text-center col-md-6 mt-3">
    <div class="row">
        <?php foreach($s as $data ){ ?>
            <img src="/ecommerce/products/upload/<?php echo $data['img'] ?>" class="card-img-top" alt="...">
        <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4> Product TITLE: <?php echo $data['name']?></h4>
                <p>Product Description: <?php echo $data['description']?></p>

            </div>
            <a href="/ecommerce/ecommerceForCustomer/orders/add.php?pID=<?php echo $data['id']?>" class="btn btn-success">Make Order</a>
        </div>

        </div>
        <?php }?>
    </div>
        
</div>


<?php
include '../shared/script.php'; ?>