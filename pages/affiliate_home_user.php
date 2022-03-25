<?php
session_start();
//check customer login or not
if(isset($_SESSION['role']) !=1 &&!isset($_SESSION['user_email']))
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
 <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<style>
  .highlight th{
    background: rgba(0,0,0,0.3);
    }
  .highlight tr:hover{
    background: rgba(0,0,0,0.3);
    
  }
</style>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
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
                <?php
                if($status!="pending"){
                    ?>
                    <br>
                    <!-- <h6>Your status is pending !! <br> Wait until your status is approved. It takes maximum 24 hours</h6> -->
          <br>
          <hr>
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
        <div class="row mb-4">
          <div class="col-sm-6">
            <h1 class="mt-0">Welcome, Hi <?php echo ucfirst($first_name);?></h1>
            <small>
            <?php
            if($status=="pending"){
              ?>
              <br>
              <h6>Your status is pending !! <br> Wait until your status is approved. It takes maximum 24 hours</h6>
              <?php  
            }
            ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Info boxes -->
        <div class="row">
               <!-- display search user result -->
               <div id="show_table_user">
                    </div>
        <!-- display all users -->
          <?php 
                include("../php/connection.php");
                $response=mysqli_query($con,"select * from campaigns ");
                if(mysqli_num_rows($response)>0)
                {
            ?>
        <div id="show_table_id" >
        <div id="show_table_id" >
            <table class="table table-bordered highlight ml-4" id="table_timetable ">
            <?php
                echo "<tr>
                <th >SNO.</th>
                <th>Name</th>
                <th style='width:100px;'>Status</th>
                <th style='width:100px;'>Category</th>
                <th style='width:300px;'>Link</th>
                <th style='width:100px;'>Video</th>
                </tr>";
                $count=0;   
                while($data=mysqli_fetch_assoc($response)){
                  $category_id=$data['category_id'];
                  $catergory_res=mysqli_query($con,"select name from categories where id='$category_id'");
                  $category_id_name="";
                  if(mysqli_num_rows($catergory_res)>0){
                    $category_data=mysqli_fetch_assoc($catergory_res);
                    $category_id_name=$category_data['name'];
                  }
                $count++;
                echo "<tr>
                <td  >$count</td>
                <td  >$data[name]</td>
                <td class=''>$data[status]</td>
                <td  >$category_id_name</td>
                <td   >$data[link]</td>
                <td >";
                if($data['video']!=''){
                    echo"<video autoplay muted loop widht='100px' height='100px'><source src='../prd_media/$data[video]' type='video/mp4'></video></td>";
                }else{
                   echo"No Video File </td>";
                }
               
              }
                   echo"</table>";
            
      }
            echo "</table>";
            ?>
                        </div>
        </div>
      </div>
    
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
