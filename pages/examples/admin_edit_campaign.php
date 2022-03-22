<?php
session_start();
if(!isset($_GET['eid_id']))
{
    $_SESSION['error']="First select Edit Entry";
    header("Location:campaign.php");
    die();
}
//check customer login or not

// if((isset($_SESSION['role'])!=2) &&(isset($_SESSION['role'])!=3 ) &&!isset($_SESSION['user_email']))
// {
//     header('Location:login.php');
//     die();
// }

require_once("../../php/connection.php");
       
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
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
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
      Admin
    </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
      
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
               <a href="admin_user.php" class="nav-link active">
              <p>
              <i class='fas fa-home'></i> Home
              </p>
            </a>
          </li>
          
          <li class="nav-item menu-open">
            <a href="profile.php" class="nav-link unactive">
              <p>
              <i class='fas fa-user'></i> Profile
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../../php/logout.php" class="nav-link unactive">
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
            <a href="campaign.php" class="nav-link inactive">
              <p>
               Campaign
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item menu-open">
            <a href="admin_edit_campaign.php" class="nav-link active">
              <p>
              Edit campagin 
              </p>
            </a>
          </li>
       

         
             
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
                    <!--  error message -->
                    <?php 
                    if(isset($_SESSION['error'])){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
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

                <h4>Edit Campaign</h4>
                <br>
                <?php
                          if(isset($_GET['eid_id'])){ 
                              $id= $_GET['eid_id'];
                              require("../../php/connection.php");
                              $res=mysqli_query($con,"select * from campaign where campaign_id='$id'");
                              if(mysqli_num_rows($res)>0){
                                  $data=mysqli_fetch_array($res);

                              ?>
                        <form action="../../php/edit_campaign.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                        </div>
                        <label for="prd_name"> Product name</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="prd_name" id="prd_name" value="<?php echo $data['campaign_name'];?>">
                        </div>

                        <label for="prd_desc"> Product desciption</label>
                        <div class="input-group mb-3">
                        <textarea  class="form-control" name="prd_desc" id="prd_desc" ><?php echo $data['campaign_desc'];?>
                              </textarea>
                        </div>
                        <label for="prd_short_desc"> Product short desciption</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="prd_short_desc" id="prd_short_desc"value="<?php echo $data['campaign_short_desc'];?>">
                        </div>
                        <label for="prd_price"> Product price</label>
                        <div class="input-group mb-3">
                        <input type="tel" class="form-control" name="prd_price" id="prd_price"value="<?php echo $data['campaign_price'];?>">
                        </div>
                        <label for="prd_link"> Product link</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="prd_link" id="prd_link"value="<?php echo $data['campaign_link'];?>">
                        </div>
                        <label for="prd_category"> Product categroy</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="prd_category" id="prd_category" value="<?php echo $data['campaign_category'];?>" >
                        </div>
                        <label for="prd_status">Product Status</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="campaign_status" id="prd_status" value="<?php echo $data['campaign_status'];?>" >
                        </div>

                        <label for="prd_sub_category"> Product sub category</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="prd_sub_category" id="prd_sub_category" value="<?php echo $data['campaign_sub_category'];?>">
                        </div>
                        <label for=""><img src="../../prd_media/<?php echo $data['campaign_img'];?>" width="100px " height="100px"alt=""></label>
                        <input type="hidden" value="<?php echo $data['campaign_img'];?>" name="old_file">
                        <div class="input-group mb-3">
                            Add Product Images
                            <input type="file" class="form-control" name="img[]" multiple/>
                        </div>
                        <label ><video autoplay muted loop widht='100px' height='100px'><source src="../../prd_media/<?php echo $data['campaign_video'];?>" type='video/mp4'></video></label>
                        <input type="hidden" value="<?php echo $data['campaign_video'];?>" name="old_video_file">

                        <div class="input-group mb-3">
                            Add Product video
                            <input type="file" class="form-control" name="video" />
                        </div>
                        <input type="submit" name="eid_id" class="btn btn-primary"  value="Save Changes" />

                        </form>
                        <?php
                              }
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
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.js"></script>
  
</body>
</html>
