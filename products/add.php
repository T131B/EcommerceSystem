<?php include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';
include '../genral/functions.php';


if(isset($_POST['send'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $categoryID = $_POST['categoryID'];
    //image coding
    $image_type = $_FILES['image']['type'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location ='./upload';
     if(move_uploaded_file($image_tmp , $location . $image_name )){
         echo "Upload image True";
     }else{
         echo "Upload image False";
     }

   

    $insert = "INSERT INTO products values (NULL, '$name', '$description','$image_name', $categoryID)";
    $i = mysqli_query($conn, $insert);
    testMessage($i , "Insert" );
  }
  $name="";
  $description="";
  $update= false;
  if(isset($_GET['edit'])){
      $update=true;
      $id = $_GET['edit'];
      $selsct = "SELECT * FROM products where id = $id";
      $ss = mysqli_query($conn, $selsct);
      $row = mysqli_fetch_assoc($ss);
      $name = $row['name'];
      $id = $row['id'];
      $description = $row['description'];
     
      $categoryID = $row['categoryID'];


      if(isset($_POST['update'])){
       $name = $_POST['name'];
       $description = $_POST['description'];
       $categoryID = $_POST['categoryID'];
       $update = "UPDATE products SET `name` ='$name', `description`= '$description', categoryID= '$categoryID' where id =$id";
      $u = mysqli_query($conn, $update);
      header("location: /ecommerce/products/list.php ");

      }
  }
 auth(1);
  
?>
<?php if($update):?>
    <h1 class="h1 text-center my-3"> Update Product Page: <?php echo $id;?> </h1>
    
    <?php else:?>
        <h1 class="h1 text-center my-3"> Add product Page </h1>
      


<?php endif;?>

<div class="container text-center col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <labele> product Name </labele>
                        <input type="text" value="<?php echo $name ?>" name = "name" placeholder= "product Name" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <labele> Product Description </labele>
                        <input type="text" value="<?php echo $description ?>"  name = "description" placeholder= "Product Description" class="form-control">
                    </div> 
                    <div class="form-group">
                        <labele> Product image </labele>
                        <input type="file"   name = "image"  class="form-control">
                    </div> 
                   
                    <div class="form-group">
                        <labele> categoryID </labele>
                        <?php 
                        $select = "SELECT * FROM category";
                        $c = mysqli_query($conn, $select);
                        ?>
                        <select name="categoryID" class="form-control" >
                            <?php foreach ($c as $data){?>
                            <option value="<?php echo $data['id']?>"> <?php echo $data['name']?></option>
                            <?php }?>
                            
                        </select>
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
