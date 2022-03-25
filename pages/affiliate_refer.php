<?php
session_start();
//check customer login or not
if(isset($_SESSION['role'])!=3 &&!isset($_SESSION['user_email']))
{
    header('Location:login.php');
    die();
}
        $email=$_SESSION['user_email'];
        require_once("../php/connection.php");
        $response=mysqli_query($con,"select * from users where email='$email' ");
        $count=mysqli_num_rows($response);
        if($count>0){
            $data=mysqli_fetch_array($response);
            $img=$data['img'];
            $role=$data['role'];
            $user_code=$data['user_code'];
            $points=$data['referral_points'];
            $refer_code=$data['referal_code'];
            $status=$data['status'];
            if ($role==3)
            $role='Affiliate';
            $first_name=$data['first_name'];
            $last_name=$data['last_name'];
        }
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

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item dropdown" >
        <a class="nav-link" data-toggle="dropdown" href="#" id="notification">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $count;?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $count;?> Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $count;?> new message
            <?php
            if($status=='complete'){
              ?>
            <span class="float-right text-muted text-sm">Now your pending request is completed.!! </span>
            <?php
          }else{
            ?>
            <span class="float-right text-muted text-sm text-wrap">Your request is pending wait until <br>your request is approved.!! </span>
           <?php 
          }
          ?>
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
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
      <!-- SidebarSearch Form -->
      <div class="form-inline">
    
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
          
          <li class="nav-item menu-open">
            <a href="affiliate_home_user.php" class="nav-link uactive">
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
          <?php
          if($status!="pending"){
              ?>
          <li class="nav-item menu-open">
            <a href="affiliate_refer.php" class="nav-link active">
              <p>
              <i class='fas fa-share'></i> Refer and Earn
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Welcome, Hi <?php echo ucfirst($first_name);?></h1>
            <small>
            <?php
            if($status=="pending"){
              ?>
              <br>
              <h6>Your status is pending !! <br> Wait until your status is approved. It takes maximum 24 hours</h6>
              <?php  
            }
            else{
              
            if($refer_code!=""){
              echo $email." , Reffered by :".$refer_code;
            }
            ?>
            </small>
            <br>
              
            <div class="input-group mb-3 mt-3">
              <label for="user">Your Refer Code
              <input type="text" class="form-control" disabled id="user" value="<?php echo $user_code;?>">
              </label>
            </div>

            <div class="input-group mb-3">
              <label for="point">Your Referral Earning
              <input type="text" class="form-control" disabled id="point" value="RS <?php echo $points;?>.00">
              </label>
            </div>
          <?php
                        $res=mysqli_query($con,"select * from users where referal_code='$user_code'");
                        $counts=mysqli_num_rows($res);
            ?>                      
            <div class="input-group mb-3">
              <label for="po">People joined via
              <input type="text" class="form-control" disabled id="po" value="<?php echo $counts;?>">
              </label>
            </div>

            <h6>Here your refer link</h6>
            <small>Share your referral link and earn more </small>
          </div>
          <a class="form-control px-3 mt-2 bg-danger" style="width:80%"; href="http://localhost/affiliate/index.php?refer=<?php echo $user_code;?>">
          http://localhost/affiliate/index.php?refer=<?php echo $user_code;?></a>

          <div class="mt-3">
            <h5>User Referred by you</h5>
            <table class="table mt-3">
              <th>Sno</th><th>Name</th><th>Email Id<th>User code</th>
              
      <?php
              // require_once("../php/connection.php");
              $res=mysqli_query($con,"select * from users where referal_code='$user_code'");
              if(mysqli_num_rows($res)>0)
              {
                $count=1;
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <tr>
                    <?php
                    echo "<td>".$count."</td>";
                    echo "<td>".$row['first_name']."</td>";
                    echo "<td>".$row['email']."</td>"; 
                    echo "<td>".$row['user_code']."</td>";
                    $count++;
                    ?>
                  </tr>
                  <?php
                }
              }
            else{
                  echo "else";
                }
?>
            </table>
<?php
              }
              ?>
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
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<script>
$(document).ready(function(){
  $('#notification').on("click",function(){
    });
});
</script>
</body>
</html>
