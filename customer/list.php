<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';

$select = "SELECT * FROM customer";
$s = mysqli_query($conn, $select);
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM customer where id= $id";
   $d= mysqli_query($conn, $delete);
  header("location: /ecommerce/customer/list.php ");
  testMessage($d, "Delete");
  
  auth(1);
}




?>

<div class="container col-md-8 mt-5">
  <div class="card">
    <div class="card-body pt-0">
      <table class="table text-center">
        <tr>
          <th>ID</th>
          <th>Name</th>
          
          <th>Phone</th>
          <th colspan="2">Action</th>
        </tr>
        <?php
        foreach ($s as $data) {
        ?>
          <tr>
            <th> <?php echo $data['id'] ?></th>
            <th><?php echo $data['name'] ?></th>
            
            <th><?php echo $data['phone'] ?></th>
            <th>
            <a href="/ecommerce/customer/add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a> </th>
           <th> <a onclick="return confirm('are your sure ? ')"     href="/ecommerce/customer/list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger"> Remove</a>
            </th>
            

          </tr>
        <?php } ?>
      </table>
    </div>

  </div>
</div>
<?php include '../shared/script.php'; ?>