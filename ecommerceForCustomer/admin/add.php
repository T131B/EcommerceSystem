<?php include '../shared/header.php';
include '../shared/nav.php';
include '../genral/config.php';
include '../genral/functions.php';


 




if(isset($_POST['signUp'])){
    $name= $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $insert= "INSERT INTO admin VALUES(null, '$name', '$password', $role)";
    $i= mysqli_query($conn, $insert);
    testMessage($i, "Insert Admin");
    

}
auth(0);


?>




<h1 class="h1 text-center my-3"> Add Admin Page </h1>
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

                    <div class="form-group">
                        <labele> Roles :</labele>
                        <select name="role" class="form-control">
                            <option value="0"> All Access</option>
                            <option value="1"> Semi Access</option>
                        </select>
                    </div>

                    <button class="btn btn-primary" name="signUp">Sign Up</button>
                    
                    
                </form>
            </div>
        </div>
</div>


<?php  include '../shared/script.php';?> 


 