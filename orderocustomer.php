<?php
session_start();
require_once ("../connect.php");
if(!isset($_SESSION['CustomerNumber']))  
{  
   echo "Please Login!";
   exit();
   header("Location:../login.php"); 
}
//*** Update Last Stay in Login System
$sql = "UPDATE customer SET ModifiedDate = NOW() WHERE CustomerNumber = '".$_SESSION['CustomerNumber']."' ";
$query = mysqli_query($conn,$sql);
//*** Get User Login
$strSQL = "SELECT * FROM customer WHERE CustomerNumber = '".$_SESSION['CustomerNumber']."' ";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery); 

if (isset($_POST['submit'])) {
 
  $conn = mysqli_connect("localhost", "root", "1111", "bear02");
  $old_username = $_POST['usertest'];
  $Firstname = $_POST['Fname'];
  $Lastname = $_POST['Lname'];
  $Username = $_POST['Username'];
  $Email = $_POST['EmailAddress'];
  $Password= $_POST['Password'];
  $Phone= $_POST['Phone'];


 $query1 = "UPDATE customer  SET FirstName='$Firstname', LastName=' $Lastname',  EmailAddress='$Email',
                             Username='$Username', Password='$Password',  Phone='$Phone'
                             WHERE CustomerNumber LINE '$old_username'";                       
                          
           
 $result1 = mysqli_query($conn, $query1);
}
//**DISPLAY PRODUCT INFO */

  $query2 = "select * from product ";                       
$result2 = mysqli_query($conn, $query2);
$objResult = mysqli_fetch_array($result2); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bearbrick | Order</title>
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
          <a href="../index2.php" class="nav-link">Home</a>
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
      <a href="../index2.php" class="brand-link">
        <img src="../pics/bearlogo.png"class="brand-image img-circle elevation-3" style="opacity: .8">
        <span style="font-size: 20pt;font-family: 'Reenie Beanie', cursive;">Bearbrick House </span>
        <br>
        <!-- <span class="brand-text font-weight-light" style="font-size: 10pt">Database Management System </span> -->
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
           <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          </div>
  
          <div class="info">
          <a href="editcutomer.php" class="d-block"><?php echo $objResult["Username"];?></a>
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
              <a href="productlinecustomer.php" class="nav-link">
                <i class="nav-icon far fas fa-store"></i>
                <p>
                  Product
                </p>
              </a>
            </li>
            <br>
    
            <li class="nav-item">
              <a href="cartcustomer.php" class="nav-link">
              <i class="nav-icon far fas fa-shopping-cart"></i>
                <p>
                 Cart
                </p>
              </a>
            </li>
            <br>
           
           
           
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
          <div class="col-sm-6" >
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index2.php">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-6"></div>

                <div class="col-md-8">
                    <div class="card-header" style="font-size: 35pt;">
                        <b>Order detail: 30172</b>
                    </div><!--card header-->
                    <div class="table-responsive mailbox-messages">
                        <table class="table " >
                            <thead>
                                <tr style="background-color: burlywood;text-align: center;"> <!--- row1-->
                                  <!---col1-->
                                    <th width=80px>
                                      </th>
                                   <!---col 2-->
                                    <th width=>
                                      <div class="subject">
                                        <h5><b>Name</b></h5>
                                      </div>
                                      </th>
                                  
                                    <th width=>
                                      <div class="subject">
                                        <h5><b>Price</b></h5>
                                      </div>
                                      </th>
                                  
                                    <th width=> 
                                      <div class="subject">
                                        <h5><b>Quantity</b></h5>
                                      </div>
                                      </th>
                                      <th width=>
                                        <h5><b>Total</b></h5>
                                      </th>
                                  
                                    
                                </tr>
                              </thead>

                              <tbody style="text-align: center;">
                                <tr>
                                    <td>
                                        <img src="http://www.toys2plays.com/shop/toys2plays/images/l_cewxpl42fupzlhtlsgeh24220213614007057.png" width="250">
                                    </td>
                                    <td width=180px > Be@rbrick IRON MAN MARK XLII(42) DAMAGE Ver. 1000%
                                    </td>
                                    <td>
                                        150,000
                                    </td>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        150,000
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="http://www.toys2plays.com/shop/toys2plays/images/l_hibtmerksueu2axbth5q30420201538006116.png">
                                    </td>
                                    <td>
                                        BE@RBRICK HARLEY QUINN 400%
                                    </td>
                                    <td>
                                        4,590
                                    </td>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        4,590
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div><!--col-md-6-->
                <div class="col-md-4">
                    <div class="order summary" style="background-color:#fffde7 ;position: relative;top: 103px;"> 
                                    <h3><b>Order Summary</b></h3>
                        <div style="font-size: 20pt;">
                            
                            Subtotal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   154,590 Bath
                        </div>
                        <div style="font-size: 20pt;">
                            Discount:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div style="font-size: 20pt;">
                            Point:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div style="font-size: 23pt;">
                            <b>Customer Name</b>
                        </div>
                        <div><input type="text" id="#" name="customer name"></div>
                        <div style="font-size: 23pt;">
                            <b>Required Date</b>
                        </div>
                        <div><input type="text" id="#" name="Required date"></div>
                    
                    </div><!--order summary-->
                </div><!--col-md4-->
            </div><!--row-->
        </div> <!--contain-fluid-->
    </section>
   
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

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
