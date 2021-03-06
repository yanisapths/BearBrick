<?php
session_start();
require_once("../connect.php");

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

if (isset($_POST['transfer']) ){
      $mysqli = new mysqli("localhost", "root", "1111", "bear02");
     
      if( empty( $_GET["OfficeCode"]) && empty( $_POST["offices_OfficeCode"]) && empty($_POST["QuantityInStock"]) )
      {  
        echo '<script>alert("Fields are required")</script>';  
      }else{
          
           $Office_code_Post =$_GET['OfficeCode'];
           $offices_OfficeCode = $_POST['offices_OfficeCode'];
           $Product_quanity = $_POST['QuantityInStock'];
                 
          $query = "INSERT INTO productstock (offices_OfficeCode,QuantityInStock)
                    VALUES(null, '$offices_OfficeCode', $Product_quanity)";  
          $result = mysqli_query($conn, $query);
          echo $query;
             if ($result) {
               $_SESSION['success'] = "Insert user successfully";
               echo '<script>Added successfully")</script>';
               header("Location:customeradd.php");
             } else {
               $_SESSION['error'] = "Something went wrong";
            }
          
        }
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bearbrick | Transfer</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
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
          <h1>Stock</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index3.php">Home</a></li>
            <li class="breadcrumb-item active">Stock</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
             <div class="amado_product_area section-padding-100">
              <div class="container-fluid">
                <div class="cart-title mt-50">
                  <h2>Stock of "1996 Moto Guzzi 1100i"</h2>
                  <br>
                </div>
                
                <div class="row">
                  <div class="col-12">
                    <table class="table">
                      <thead>
                        <tr class="table-warning">
                          <th scope="col-2">Available branch</th>
                          <th scope="col-2">Transfer to</th>
                          <th scope="col-2">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><form action="" method="POST">
                            <select class="form-control" name="from">
                              <option value="1"><?php echo $_GET["OfficeCode"]; ?></option>
                              <option value="7">Branch 7: </option>
                            </select>                  
                          </form></td>
                          <td>
                            <select class="form-control" name="to">
                              <option value="" selected="">Branch : </option>
                            </select>  
                          </td>
                          <td class="qty">
                            <div class="quantity">
                              <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty > 0 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                              <input type="number" class="qty-text" id="qty" step="1" min="1" max="6624" name="quantity" value="1">
                              <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                              <button type="submit" class="btn btn-outline-primary" name="transfer"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Transfer</button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>


              </div>
            </div>
            <!-- /.content-wrapper -->
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
