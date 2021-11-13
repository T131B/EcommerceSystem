<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';

$select = "SELECT * FROM category";
$s = mysqli_query($conn, $select);
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM category where id= $id";
    $d= mysqli_query($conn, $delete);
  header("location: /ecommerce/category/list.php ");
  testMessage($d , "Delete");
  auth(1);

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
          
         
          <th colspan="2">Action</th>
        </tr>
        <?php
        foreach ($s as $data) {
        ?>
          <tr>
            <th> <?php echo $data['id'] ?></th>
            <th><?php echo $data['name'] ?></th>
            
            
            <th>
            <a href="/ecommerce/category/add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a> </th>
           <th> <a onclick="return confirm('are your sure ? ')"     href="/ecommerce/category/list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger"> Remove</a>
            </th>
            

          </tr>
        <?php } ?>
      </table>
    </div>

  </div>
</div>
<?php include '../shared/script.php'; ?>