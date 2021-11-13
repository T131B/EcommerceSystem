<?php include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';
include '../genral/functions.php';


if(isset($_POST['send'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

     $insert = "INSERT INTO customer values (NULL, '$name', '$phone', '$password')";
    $i = mysqli_query($conn, $insert);
    testMessage($i , "Insert" );
  }
  $name="";
  $phone="";
  $update= false;
  if(isset($_GET['edit'])){
      $update=true;
      $id = $_GET['edit'];
      $selsct = "SELECT * FROM customer where id = $id";
      $ss = mysqli_query($conn, $selsct);
      $row = mysqli_fetch_assoc($ss);
      $name = $row['name'];
      $phone = $row['phone'];
      $id = $row['id'];


      if(isset($_POST['update'])){
       $name = $_POST['name'];
       $phone = $_POST['phone'];
       $update = "UPDATE customer SET name ='$name', phone= '$phone' where id =$id";
      $u = mysqli_query($conn, $update);
      header("location: /ecommerce/customer/list.php ");

      }
  }
  auth(1);
  
?>
<?php if($update):?>
    <h1 class="h1 text-center my-3"> Update Customer Page: <?php echo $id;?> </h1>
    
    <?php else:?>
        <h1 class="h1 text-center my-3"> Add Customer Page </h1>
      


<?php endif;?>

<div class="container text-center col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <labele> Customer Name </labele>
                        <input type="text" value="<?php echo $name ?>" name = "name" placeholder= "Customer Name" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <labele> Customer Phone </labele>
                        <input type="text" value="<?php echo $phone ?>"  name = "phone" placeholder= "Customer Phone" class="form-control">
                    </div> 
                    <?php if($update):?>
                        
                    <?php else:?>
                    <div class="form-group">
                        <labele> Customer Password </labele>
                        <input type="text"  name = "password" placeholder= "Customer Password" class="form-control">
                    </div>
                    <?php endif;?>

                    <?php if($update):?>

                    <button name = "update" class="btn btn-primary"> Update Data </button>
                    <?php else:?>
                    
                    <button name = "send" class="btn btn-warning"> Send Data </button>
                    <?php endif;?>
                    
                </form>
            </div>
        </div>
</div>

<?php include '../shared/script.php';?> 
