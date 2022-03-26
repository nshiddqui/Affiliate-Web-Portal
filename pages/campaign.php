<?php
session_start();
//check admin login or not
if((isset($_SESSION['role'])!=2) &&(isset($_SESSION['role'])!=3 ) &&!isset($_SESSION['user_email']))
{
    header('Location:login.php');
    die();
}
include("../php/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin-Campaings </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<style>
  /* hover style on table  */
  .highlight th{
    background: rgba(0,0,0,0.4);
    }
  .highlight tr:hover{
    background: rgba(0,0,0,0.4);
  }
</style>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" id="search"type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
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
    <a  class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
      Admin
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
            <a href="categories.php" class="nav-link inactive">
              <p>
               Categories
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item menu-open">
            <a href="campaign.php" class="nav-link active">
              <p>
               Campaigns List
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
                   <!--  error message -->
                <?php 
                    if(isset($_SESSION['error'])){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                        <strong>Error </strong>
                        <?php
                            echo $_SESSION['error'];
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['error']);
                    }
                    // success message
                    if(isset($_SESSION['success'])){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                        <strong>Success </strong>
                        <?php
                            echo $_SESSION['success'];
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['success']);
                }
                ?>
                
        <!-- view campaing -->
        <div class="row mt-3">
          <div class="col-md-6">
            <h3>View Campaigns</h3>
          </div>
            <div class="col-md-3 float-left">
              <form action="campaign.php" method="GET" class=" ">
                <select name="filter_term" id="" class='form-control'>
                  <option >Filter Choose</option>  
                  <option value="name">Name</option>  
                  <option value="status">Status</option>  
                  <option value="category_id">Category</option>  
                </select>
                <input type="submit" name="filter" class="btn btn-info btn-sm mt-2 w-100"value="Filter" />
              </form>
            </div>
        </div>
                <div class="container-fluid">
                <?php
                 // filter btn select option list
                            if(isset($_GET['filter']))
                            {
                                $filter_term=$_GET['filter_term'];
                                $response=mysqli_query($con,"select * from campaigns order by '$filter_term' ");
                            }
                            // end filter select option list
                            else{
                            $sql="select * from campaigns ORDER BY id asc ";
                            $response=mysqli_query($con,$sql) or die(mysqli_error($con));
                            }
                    ?>
                    <!-- display search campaing result -->
                    <div id="show_table_campaign">
                    </div>
                    <!-- display all campaing -->
                    <?php 
                if(mysqli_num_rows($response)>0){
                  $total_record=mysqli_num_rows($response);
                  if($total_record>0){
                    echo "<br>Total campaings : $total_record";
                    echo"<br>";
            ?>
        <div id="show_table_id" >
            <table class="table table-bordered highlight" >
            <?php
                echo "<tr>
                <th >SNO.</th>
                <th>Name</th>
                <th style='width:100px;'>Status</th>
                <th style='width:100px;'>Category</th>
                <th style='width:300px;'>Link</th>
                <th style='width:100px;'>Video</th>
                <th style='width:100px;'>Action</th>
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
                <td >$count</td>
                <td >$data[name]</td>
                <td >$data[status]</td>
                <td >$category_id_name</td>
                <td >$data[link]</td>
                <td >";
                if($data['video']!=''){
                    echo"<video autoplay muted loop widht='100px' height='100px'><source src='../prd_media/$data[video]' type='video/mp4'></video></td>";
                }else{
                   echo"No Video File </td>";
                }
                echo"<td data-label='Action' >";
                if($data['status']!='active'){
                    echo "<a href='../php/activate_and_deactivate_campaign.php?a_id=$data[id]' class='btn btn-primary btn-sm''>Activate</a>";
                }
                else{
                    echo"  <a href='../php/activate_and_deactivate_campaign.php?d_id=$data[id] 'class='btn btn-info  btn-sm'>Deactivate</a>";
                }
                   echo "<a href='edit_campaign.php?eid_id=$data[id]' ><i class='btn btn-primary btn-sm fas fa-edit text-white'></i> </a>
                  <a href='../php/edit_campaign_script.php?d_id=$data[id] '><i class='btn btn-danger btn-sm fas fa-trash-alt text-white'></i></a></td> ";
                  echo"</tr>";
                   }
        }
      }
            echo "</table>";
            ?>
                  </div>
            </div>
          
        </div>
    </div>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
    $(document).ready(function() {
        // search box   
        $("#show_table_campaign").hide();
        $('#show_table_id').show();
        $("#search").on("keyup", function() {
            // e.preventDefault();
            var search_term = $(this).val();
             if(search_term!="") {
                $('#show_user_user').show();//search
                $('#show_user_id').hide();
            }
            else{
                $("#show_table_campaign").hide();
                $('#show_table_id').show();
            }
            $.ajax({
                url: "../php/search_prd.php",
                method: "GET",
                data: { search: search_term },
                success: function(data) {
                    $('#show_table_campaign').html(data);
                    $('#show_table_id').html(data);
                }
            });
        });
        // end of search box
      });
      </script>
</body>
</html>
