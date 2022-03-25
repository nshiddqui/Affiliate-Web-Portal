<?php
session_start();
//check customer login or not
if((isset($_SESSION['role'])!=2) &&(isset($_SESSION['role'])!=3 ) &&!isset($_SESSION['user_email']))
{
    header('Location:login.php');
    die();
}

require_once("../php/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin-categories</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a  class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
      Admin
    </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="admin_user.php" class="nav-link active">
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
            <a href="admin_user.php" class="nav-link unactive">
              <p>
               Affiliate Users
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="categories.php" class="nav-link active">
              <p>
               Categories
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="campaign.php" class="nav-link inactive">
              <p>
               Campaign List 
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item menu-open">
            <a href="new_campaign.php" class="nav-link inactive">
              <p>
              New campagin 
              </p>
            </a>
          </li>
          <!-- <li class="nav-item menu-open">
            <a href="blog.php" class="nav-link inactive">
              <p>
              Blogs 
              </p>
            </a>
          </li> -->

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
        <div class="row ">
          <div class="col-md-6">
                <!-- add Campaign btn -->
                <tr>
                <td><button class="flaot-left btn btn-success toggle_btn mt-1 py-1" id="add" onclick="toggle_form()"> 
                <i class="fas fa-plus text-white"></i> Add Categories</button>
                </td>
                <td>  
                   <!--  error message -->
                <?php 
                    if(isset($_SESSION['error'])){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <strong>Error </strong>
                        <?php
                            echo $_SESSION['error'];
                        ?>
                        <button type="button" class="close btn btn-sm" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['error']);
                    }
                    // success message
                    if(isset($_SESSION['success'])){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>Success </strong>
                        <?php
                            echo $_SESSION['success'];
                        ?>
                        <button type="button" class="close btn btn-sm" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['success']);
                }
                ?> </td>
                </tr>
            </div>
          </div>
          <div class="container">
            <form action="../php/add_categories.php" method="POST" class="form_btn mt-4" enctype="multipart/form-data">
                <h5>Add new categories</h5>
                <div class="input-group mb-3 mt-3">  
                    <input type="text" class="form-control" name="name" placeholder="Categories name">
                </div>
                <input type="submit" name="category" class="btn btn-primary"value="Add Categories" />
            </form>
          </div>
          </div>
          </div><!-- /.col -->
          <!-- view categories -->
          <h4 class='mt-4'>View Categories</h4>
              <br>
              <table class="table table-bordered  highlight" id="table_timetable ">
              <tr>
                  <th >ID</th>
                  <th>CategoryName</th>
                  <th >Created Date</th>
                  <th data-label='Action' class=''>Action</th>
                  </tr>
                  <?php
                  $response=mysqli_query($con,"select * from categories " );
                  if(mysqli_num_rows($response)>0){
                  $count=0;   
                      while($data=mysqli_fetch_assoc($response)){
                        $count++;
                  echo "<tr>
                  <td>$count</td>
                  <td >$data[name]</td>
                  <td  >$data[created]</td>
                  <td data-label='Action' >
                  <a href='edit_categories.php?eid_id=$data[id]' ><i class='btn btn-primary btn-sm fas fa-edit text-white'></i></a>
                  <a href='../php/edit_categories_script.php?d_id=$data[id] '><i class='btn btn-danger btn-sm fas fa-trash-alt text-white'></i></a></td> </tr>";
              }
          }
              ?>
              </table>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
        $('.form_btn').hide();
         });
      function toggle_form(){
          $('.form_btn').toggle();
        } 
</script>
</body>
</html>
