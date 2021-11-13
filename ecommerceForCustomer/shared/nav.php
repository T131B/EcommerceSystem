<?php session_start();
if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location:/ecommerce/admin/login.php");

}

?>




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Male</a>
          <a class="dropdown-item" href="/ecommerce/ecommerceForCustomer/products/listFemale.php">Female</a>
         
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      
      <button name="logout" class="btn btn-outline-danger my-2 my-sm-0" type="submit">LogOut</button>
     
    </form>
    <form class="form-inline my-2 my-lg-0"> 
      <a class="btn btn-outline-success my-2 my-sm-0" href="/ecommerce/ecommerceForCustomer/admin/login.php">Login</a>
    </form>
  </div>
</nav>