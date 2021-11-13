<?php include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';
include '../genral/functions.php';


if(isset($_POST['login'])){
    $name= $_POST['name'];
    $password = $_POST['password'];
    $select = "SELECT * FROM  customer where name = '$name' and password = '$password' ";
    $s = mysqli_query($conn, $select);
     $numRow= mysqli_num_rows($s);
     $row= mysqli_fetch_assoc($s);
     if($numRow > 0){
         $_SESSION['customer'] = $name;
         $_SESSION['id'] = $row['id'];
       header("location:/ecommerce/ecommerceForCustomer/products/index.php");
     }else{
        echo "<div class='alert alert-danger text-center mx-auto w-50'>
        <h5>  False Admin </h5>
        
        </div>";
       
    }

}
print_r($_SESSION);

?>



<h1 class="h1 text-center my-3"> Login Page </h1>
<div class="container text-center col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                
                <form method="POST">
                    <div class="form-group">
                        <labele>Admin Name </labele>
                        <input type="text" name="name"placeholder="Admin Name" class="form-control">
                        
                
                
                    </div>
                    <div class="form-group">
                        <labele>Admin Password </labele>
                        <input type="password" name="password" placeholder="Admin Password"  class="form-control">
                        
                
               
                    </div>
                    <button class="btn btn-primary" name="login">Login</button>
                    
                    
                </form>
            </div>
        </div>
</div>

<?php include '../shared/script.php';?> 

 