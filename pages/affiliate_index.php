<?php
session_start();
//check customer login or not
if(isset($_SESSION['role']) !=1 && !isset($_SESSION['user_email']))
{
    header('Location:login.php');
    die();
}
        $email=$_SESSION['user_email'];
        $mobile=$_SESSION['mobile'];
        echo $email;
        // die();
        // $email='amit100lanki70122@gmail.com';
        require_once("../php/connection.php");
        $response=mysqli_query($con,"select * from users where mobile='$mobile' ");
        $count=mysqli_num_rows($response);
        if($count>0){
            $data=mysqli_fetch_array($response);
            $aadhar_img=$data['aadhar_file'];
            $pan_img=$data['pan_file'];
            $aadhar_no=$data['aadhar_no'];
            $pan_no=$data['pan_no'];
            $user_id=$data['id'];
            $role=$data['role'];
            $mobile=$data['mobile'];
            $status=$data['status'];
            if ($role==2)
            $role='Affiliate';
            $first_name=$data['first_name'];
            $last_name=$data['last_name'];
        }else{
            echo "name";
        }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Affiliate User </title>
 <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
        <?php echo $role." User";?>
        <small><?php echo $status;?></small>
      </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="affiliate_index.php" class="nav-link active">
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
                <?php
                if($status!="pending"){
                    ?>
          <hr>
          
          <li class="nav-item menu-open">
            <a href="affiliate_home_user.php" class="nav-link inactive">
              <p>
                <i class='fas fa-sell'></i> View Campaings 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="affilate_user_wallet.php" class="nav-link inactive">
              <p>
                <i class='fas fa-wallet'></i> Wallet
              </p>
            </a>
          </li>
          <?php  
            }
            ?>
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
              <div class="row mb-4">
                  <div class="col-sm-6">
                      <h1 class="mt-0">Welcome, Hi <?php echo ucfirst($first_name);?></h1>
                      <small>
                        <?php
                        if($status=="pending"){
                        ?>
                        <br>
                        <h6>Your status is pending !! <br> Wait until your status is approved. It takes maximum 24 hours</h6>
                        </small>
                        <?php  
                        }
                        ?>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <!-- Info boxes -->
                <div class="row mt-3">
                    <!-- <h4>All Campaings</h4> -->
                    <table class="table table-bordered highlight">
                        <?php
                        echo "
                        <tr>
                            <th>Name</th>
                            <td>$first_name</td>
                        </tr><tr>
                            <th>Last Name</th>
                            <td>$last_name</td>
                        </tr><tr>
                            <th>Email ID</th>
                            <td>$email</td>
                        </tr><tr>
                            <th>Mobile No.</th>
                            <td>$mobile</td>
                        </tr><tr>
                            <th>Aadhar Card No.</th>
                            <td>$aadhar_no</td>
                        </tr><tr>
                            <th>Aadhar Card File</th>
                            <td><a href='../kyc_doc/$aadhar_img' target='new_blank' class='btn btn-info btn-sm'>View</a></td>
                        </tr><tr>
                           <th>Pan Card No.</th>
                           <td>$pan_no</td>
                        </tr><tr>
                          <th>Pan Card File</th>
                             <td><a href='../kyc_doc/$pan_img' target='new_blank' class='btn btn-info btn-sm'>View</a></td>
                        </tr><tr>
                            <th>Status</th>
                            <td>$status</td>
                        </tr>";
                    ?>
                    </table>

                    <iframe src="" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
</body>
</html>
