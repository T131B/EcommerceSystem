<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';

$select = "SELECT products.id , products.name product, products.description , products.img, category.name cat FROM `products` JOIN category ON products.categoryID = category.id;";
$s = mysqli_query($conn, $select);

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM products where id= $id";
  $d=  mysqli_query($conn, $delete);
  header("location: /ecommerce/products/list.php ");
  testMessage($d, "Delete");
}
foreach ($s as $data ){
  // auth(0);
}

// auth(0);




?>

<div class="container col-md-8 mt-5">
  <div class="card">
    <div class="card-body pt-0">
      <table class="table text-center">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Category</th>
          
          <th colspan="2">Action</th>
        </tr>
        <?php
        foreach ($s as $data) {
        ?>
          <tr>
            <th> <?php echo $data['id'] ?></th>
            <th><?php echo $data['product'] ?></th>
            <th><?php echo $data['description'] ?></th>
            <th><img src="./upload/<?php echo $data['img'] ?>" alt="test"></th>
            
            <th><?php echo $data['cat'] ?></th>
            <th>
            <a href="/ecommerce/products/add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a> </th>
           <th> <a onclick="return confirm('are your sure ? ')"     href="/ecommerce/products/list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger"> Remove</a>
            </th>
            

          </tr>
        <?php } ?>
      </table>
    </div>

  </div>
</div>
<?php include '../shared/script.php'; ?>