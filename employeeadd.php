<?php
session_start();

require_once "../connect.php";
if(!isset($_SESSION['EmployeeNumber'] ))  
{  
   echo "Please Login!";
   exit();
   header("Location:../login.php"); 
} 
//*** Update Last Stay in Login System
$sql = "UPDATE employees SET ModifiedDate = NOW() WHERE  EmployeeNumber = '".$_SESSION['EmployeeNumber']."' ";
$query = mysqli_query($conn,$sql);
//*** Get User Login
$strSQL = "SELECT * FROM employees WHERE  EmployeeNumber = '".$_SESSION['EmployeeNumber']."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery); 

if (isset($_POST['Register']) ){
  $mysqli = new mysqli("localhost", "root","1111","bear02");

  if(empty($_POST["FirstName"]) && empty($_POST["LastName"]) && empty($_POST["Email"]) && empty($_POST["Username"]) )
  {  
    echo '<script>alert("Fields are required")</script>';  
  }else{
      
       //**Personal Info. */
      //  $enum = $_POST['EmployeeNumber'];
      $Fname = $_POST['Firstname'];
      $Lname = $_POST['Lastname'];
      $Email = $_POST['Email'];
      $Username = $_POST['Username']; 
      $Password = $_POST['Password'];
      $OfficeCode = $_POST['OfficeCode'];
      $JobTitle = $_POST['Jobtitle'];
    

       //**Addr Info. */
      //  $AddressNumber = $_POST['AddressNo'];
      //  $StateProvince = $_POST['StateProvince'];
      //  $City = $_POST['City'];
      //  $CountryRegion = $_POST['CountryRegion'];
      //  $Address = $_POST['Address'];
     
      $query= "INSERT INTO employees (EmployeeNumber,FirstName,LastName,Email,Password,Username,OfficeCode,JobTitle) 
                VALUES(null,'$Fname','$Lname','$Email','$Password','$Username','$OfficeCode','$JobTitle');";
      $result = mysqli_query($conn, $query);
      // echo $query;

  }
} 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bearbrick house </title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!--font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Reenie+Beanie&display=swap" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index3.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
      
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto" style="padding-right: 35pt;">
        <!-- Category Dropdown Menu -->
        <div class="dropdown" style="margin:2%">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
        
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Basic</a></li>
            <li><a class="dropdown-item" href="#">Jellybean</a></li>
            <li><a class="dropdown-item" href="#">Horror</a></li>
            <li><a class="dropdown-item" href="#">SF</a></li>
            <li><a class="dropdown-item" href="#">Animal</a></li>
            <li><a class="dropdown-item" href="#">Pattern</a></li>
            <li><a class="dropdown-item" href="#">Artist</a></li>
          </ul>
        </div>
       
        <!-- Notifications Dropdown Menu -->
        <!-- Category Dropdown Menu -->
        <div class="dropdown" style="margin:2%">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Scale
          </a>
        
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">50%</a></li>
            <li><a class="dropdown-item" href="#">70%</a></li>
            <li><a class="dropdown-item" href="#">100%</a></li>
            <li><a class="dropdown-item" href="#">200%</a></li>
            <li><a class="dropdown-item" href="#">400%</a></li>
            <li><a class="dropdown-item" href="#">1000%</a></li>
          </ul>
        </div>
  
        <div class="dropdown" style="margin:2%">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Vender
          </a>
        
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Andy Warhol</a></li>
            <li><a class="dropdown-item" href="#">Kaws</a></li>
            <li><a class="dropdown-item" href="#">Nike</a></li>
            <li><a class="dropdown-item" href="#">Bape</a></li>
            <li><a class="dropdown-item" href="#">Van Gogh</a></li>
            <li><a class="dropdown-item" href="#">DesignerCon</a></li>
            
          </ul>
        </div>
           
        <li class="nav-item" style="margin:1%">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index3.php" class="brand-link">
      <img src="../pics/bearlogo.png"class="brand-image img-circle elevation-3" style="opacity: .8">
      <span style="font-size: 20pt;font-family: 'Reenie Beanie', cursive;">Bearbrick House </span>
        <br>
        <span class="brand-text font-weight-light" style="font-size: 10pt;padding-left:30px">Database Management System </span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
           <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          </div>
  
          <div class="info">
            <a href="#" class="d-block"><?php echo $objResult["Username"];?></a>
            <i><p style="padding-left:150px">
              <a href="../login.php" class="d-block">Logout</a>
              </p></i>
            </div>
          </div>
        
       
  
    
     
   <!-- Sidebar Menu -->
   <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            
            <li class="nav-header"></li>
            <li class="nav-item">
              <a href="productline.php" class="nav-link">
                <i class="nav-icon far fas fa-store"></i>
                <p>
                  Product
                </p>
              </a>
            </li>
            <br>
      
            <li class="nav-item">
              <a href="productadd.php" class="nav-link">
                <i class="nav-icon far fas fa-plus"></i>
                <p>
                  Add Product
                </p>
              </a>
            </li>
            <br>
            <li class="nav-item">
              <a href="productstatus.php" class="nav-link">
                <i class="nav-icon far fas fa-stream"></i>
                <p>
                  Product Status
                </p>
              </a>
            </li>
            <br>
            <li class="nav-item">
              <a href="cart.php" class="nav-link">
              <i class="nav-icon far fas fa-shopping-cart"></i>
                <p>
                 Cart
                </p>
              </a>
            </li>
            <br>
            <li class="nav-item">
              <a href="order.php" class="nav-link">
                <i class="nav-icon far fas fa-folder-open"></i>
                <p>
                 Order
                </p>
              </a>
            </li>
            <br>
            <li class="nav-item">
              <a href="employee.php" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                 Employees
                </p>
              </a>
            </li>
            <br>
            <li class="nav-item">
              <a href="customer.php" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                 Customers
                </p>
              </a>
            </li>
           
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index3.php">Home</a></li>
              <li class="breadcrumb-item active">Add Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-12">
            <div class="card">
              <div class="card-body">
    <form method="post">
    <div class="form-row">
        <div class="col-md-2">
            <div class="input-group mb-3" >
                <label>Office/Branch</label>
                <b>&nbsp&nbsp</b>
                            <select class="form-control" name="OfficeCode">
                                                      <option value="1">1</option>
                                                      <option value="7">7</option>
                                                      <option value="9">9</option>
                            </select>
            </div>
          </div>
            <div class="col-md-4">
            <div class="input-group mb-3">
           
                      <label>Job Position</label>
                      <b>&nbsp&nbsp</b>
                     <select class="form-control" name="Jobtitle">
                                                <option value="Sales Manager">Sales Manager</option>
                                                <option value="HR">HR</option>
                                                <option value="Marketing">Marketing</option>
                    </select>

            </div>
          </div>
        </div>
    <div class="form-row">
            <div class="col">
                <div class="input-group mb-3">
                    <b>Firstname</b>
                    <b>&nbsp&nbsp</b>
                    <input type="text" class="form-control" id="Fname" name="Firstname" placeholder="Fristname">
                </div>
            </div>
            <div class="col"> 
                <div class="input-group mb-3">
                    <label>Lastname</label>
                    <b>&nbsp&nbsp</b>
                    <input type="text" class="form-control" mid="Lname" name="Lastname"  placeholder="Lastname">
                   
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                  <label>Email</label>
                  <b>&nbsp&nbsp</b>
                <input type="email" class="form-control" id="Email" name="Email"  placeholder="Email">
              </div>
            </div>
        </div>
        <div class="form-row">
           <div class="col-md-4">
            <div class="input-group md-3">
              <label>Username</label>
              <b>&nbsp&nbsp</b>
              <input type="text" class="form-control" id="Username" name="Username"  placeholder="Username">
            </div>
          </div>

          <div class="col-md-4">
            <div class="input-group md-3">
              <label>Password</label>
              <b>&nbsp&nbsp</b>
              <input type="text" class="form-control" id="Password" name="Password"  placeholder="Password">
            </div>
        </div>
        </div>
        
    <br>
        </div>
            <!-- /.col -->
          <div class="row">
            <div class="offset-sm-5 col-sm-2">
            <button type="submit" class="btn btn-primary btn-block" id="Register" name="Register"><i class="fa fa-plus "></i> Add</button>
            </div>
         </div>
         <br>
          <!-- /.col -->
        </div>
      </form>
              </div>
        </div>
         
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 <!-- jQuery -->
 <script src="../plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="../dist/js/adminlte.min.js"></script>


<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
</body>
</html>
