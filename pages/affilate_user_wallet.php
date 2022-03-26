<?php
session_start();
//check customer login or not
// if(isset($_SESSION['role'])!=1 &&!isset($_SESSION['user_email']))
// {
//     header('Location:login.php');
//     die();
// }
        // $email=$_SESSION['user_email'];
        $email='abc1@gmail.com';
        require_once("../php/connection.php");
        $response=mysqli_query($con,"select * from users where email='$email' ");
        if(mysqli_num_rows($response)>0){
            $data=mysqli_fetch_array($response);
            $role=$data['role'];
            $point_rate=$data['point_rate'];
            $points=$data['total_points'];
            $current_point=$data['current_point'];
            if ($role==2)
            $role='Affiliate';
            
            $first_name=$data['first_name'];
            $last_name=$data['last_name'];
        }
        // die();
      ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Affiliate User </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
      <?php echo $role." User";?>
    </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             
        
        <li class="nav-item menu-open">
            <a href="admin_user.php" class="nav-link uactive">
              <p>
               <i class='fas fa-home'></i> Home
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="../php/logout.php" class="nav-link unactive">
              <p>
                <i class='fas fa-power-off'></i> Logout
              </p>
            </a>
          </li>
          <br>
          <hr>
          <li class="nav-item menu-open">
            <a href="affiliate_home_user.php" class="nav-link inactive">
              <p>View Campaigns
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="affilate_user_wallet.php" class="nav-link active">
              <p>
              <i class='fas fa-wallet'></i> Wallet
              </p>
            </a>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo ucfirst($first_name);?>,Wallet </h1>
            <br>
            <div class="input-group mb-3">
              <label for="point">Total Earnings
              <input type="text" class="form-control" disabled id="point" value="RS <?php echo $points;?>.00">
              </label>
            </div>
            <div class="input-group mb-3">
              <label for="wallet">Wallet balance
              <input type="text" class="form-control" disabled id="wallet" value="RS <?php echo "";?>.00">
              </label>
            </div>

            <div class="input-group mb-3">
              <label for="bank">Transfer to Bank
              <input type="text" class="form-control" disabled id="bank" value="RS <?php echo "";?>.00">
              <small>Verify your bank account to transfer your earnings to bank account.
                  <br>All bank transfer t be done post a 5% TDS deduction.</small>
              </label>
            </div>
            
                <button class="btn btn-primary" onclick="verify()">Verify Account</button>
          </div>
          
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<script>
  function verify(){
    window.location.href="verify_account.php";
  }
</script>
</body>
</html>
