<?php session_start();
if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location:/ecommerce/admin/login.php");

}


 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <?php if(isset($_SESSION['admin'])):?>
  <a class="navbar-brand" href="#"><?php echo $_SESSION['admin']  ?> </a>
  <?php else:?>
    <a class="navbar-brand" href="#">Welcome</a>
    <?php endif;?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if(isset($_SESSION['admin'])): ?>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/ecommerce/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Customer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/customer/add.php">Add Customer</a>
          <a class="dropdown-item" href="/ecommerce/customer/list.php"> List Customer </a>
          
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/category/add.php">Add Category</a>
          <a class="dropdown-item" href="/ecommerce/category/list.php"> List Category </a>
          
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/products/add.php">Add Products</a>
          <a class="dropdown-item" href="/ecommerce/products/list.php"> List products </a>
          
      </li>
      <?php if($_SESSION['role'] == 0): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/admin/add.php">Add Admin</a>
          <a class="dropdown-item" href="/ecommerce/admin/list.php"> List Admin </a>
          
      </li>
      <?php endif;?>

      
        
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      
      <button name="logout" class="btn btn-outline-danger my-2 my-sm-0" type="submit">LogOut</button>
     
    </form>
    <?php else:?>

    <form class="form-inline my-2 my-lg-0">
      
      <a href="/ecommerce/admin/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
     
    </form>
    <?php endif;?>
  </div>
</nav>