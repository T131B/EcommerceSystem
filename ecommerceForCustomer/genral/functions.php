<?php

function testMessage($condation , $mess ){
    if($condation){
        echo "<div class='alert alert-info text-center mx-auto w-50'>
        <h5> $mess Is True Proccess </h5>
        
        </div>";
    }else{
        echo "<div class='alert alert-danger text-center mx-auto w-50'>
        <h5> $mess Is False Proccess </h5>
        
        </div>";

    }
}
function auth($role){
    if($_SESSION['admin']){
        if($_SESSION['role'] == $role || $_SESSION['role'] == 0){

        }else{
            header("location:/ecommerce/admin/login.php");
        }

    }else{
      header("location:/ecommerce/admin/login.php");
    }
}









?>