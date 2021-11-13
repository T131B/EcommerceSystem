<?php include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';
include '../genral/functions.php';


if(isset($_POST['send'])){
    $name = $_POST['name'];
 

     $insert = "INSERT INTO category values (NULL, '$name')";
    $i = mysqli_query($conn, $insert);
    testMessage($i , "Insert" );
  }
  $name="";
 
  $update= false;
  if(isset($_GET['edit'])){
      $update=true;
      $id = $_GET['edit'];
      $selsct = "SELECT * FROM category where id = $id";
      $ss = mysqli_query($conn, $selsct);
      $row = mysqli_fetch_assoc($ss);
      $name = $row['name'];
      
      $id = $row['id'];


      if(isset($_POST['update'])){
       $name = $_POST['name'];
       
       $update = "UPDATE category SET name ='$name' where id =$id";
      $u = mysqli_query($conn, $update);
      header("location: /ecommerce/category/list.php ");

      }
  }
  auth(1);
  
?>
<?php if($update):?>
    <h1 class="h1 text-center my-3"> Update category Page: <?php echo $id;?> </h1>
    
    <?php else:?>
        <h1 class="h1 text-center my-3"> Add Category Page </h1>
      


<?php endif;?>

<div class="container text-center col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <labele> Category Name </labele>
                        <input type="text" value="<?php echo $name ?>" name = "name" placeholder= "Category Name" class="form-control">
                    </div>
                    
                    

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
 