<?php
session_start();
//check customer login or not
if((isset($_SESSION['role'])!=2) &&(isset($_SESSION['role'])!=3 ) &&!isset($_SESSION['user_email']))
{
    header('Location:login.php');
    die();
}

        // $email=$_SESSION['user_email'];
        require_once("../php/connection.php");

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
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<style>
  .highlight th{
    background: rgba(0,0,0,0.4);
    }
  .highlight tr:hover{
    background: rgba(0,0,0,0.4);
    
  }
</style>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin_user.php" class="nav-link">Home</a>
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
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
      Admin
    </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline">

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
<!--           
          <li class="nav-item menu-open">
            <a href="admin_change_pwd.php" class="nav-link unactive">
              <p>
              <i class='fas fa-lock'></i> change Password
              </p>
            </a>
          </li> -->
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
            <a href="#" class="nav-link active">
              <p>
               Affiliate Users
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="categories.php" class="nav-link unactive">
              <p>
               Categories
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="campaign.php" class="nav-link unactive">
              <p>
               Campaign List
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="new_campaign.php" class="nav-link unactive">
              <p>
               New Campaign
              </p>
            </a>
          </li>
          <!-- <li class="nav-item menu-open">
            <a href="blog.php" class="nav-link unactive">
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
        <div class="row">
          <div class="col-md-3">
            <h4>View Users</h4>
            <br>
          </div>
            <div class="col-md-4">
              <form action="admin_user.php" method="GET">
                <select name="filter_term" id="" class='form-control'>
                  <option >Filter Choose</option>  
                  <option value="first_name">First name</option>  
                  <option value="email">Email</option>  
                  <option value="last_name">Last name</option>  
                  <option value="user_points">User points </option>  
                </select>
                <input type="submit" name="filter" class="btn btn-info btn-sm mt-2 w-100"value="Filter" />
              </form>
            </div>
        </div>
         <div class="container-fluid">
        <!-- pagination code  -->
                <?php
                        // $per_page_result=5;
                        // $start=0;
                        // $current_page=1;
                        // if(isset($_GET['start'])){
                        //     $start=$_GET['start'];
                        //     if($start<=0){
                        //         $start=0;
                        //         $current_page=1;
                        //     }
                        //     else{
                        //         $current_page=$start;
                        //         $start=$start-1;
                        //         // echo $start;
                        //         // $start=$start*5;
                        //         $start=$start*$per_page_result;
                        //     }
                        // }

                        // $total_record=mysqli_num_rows(mysqli_query($con,"select * from users"));
                        // ceil is used for round of the number in int
                        // $pagi=ceil($total_record/$per_page_result);
                        // filter select option list
                        if(isset($_GET['filter']))
                        {
                            $filter_term=$_GET['filter_term'];
                            $response=mysqli_query($con,"select * from users order by '$filter_term'");
                        }
                        else{
                        //  $sql="select * from users ORDER BY created desc limit $start,$per_page_result ";
                         $sql="select * from users ";
                        $response=mysqli_query($con,$sql) or die(mysqli_error($con));
                        }
                        //end filter select option list
                        
                    ?>
        <!-- display search user result -->
                    <div id="show_table_user">
                    </div>
        <!-- display all users -->
          <?php 
                if(mysqli_num_rows($response)>0)
                {
                $total_record=mysqli_num_rows($response);
                    echo "<br>Total Users : $total_record";
                    echo"<br>";
            ?>
        <div id="show_table_id" >
            <table class="table table-bordered highlight" id="table_timetable ">
            <?php
                echo "<tr>
                <th >ID</th>
                <th>First Name</th>
                <th style='width:80px; text-wrap:wrap'>Last Name</th>
                <th style='width:100px;'>Email ID</th>
                <th style='width:100px;'>Status</th>
                <th style='width:100px;'>Total  Points</th>
                <th style='width:100px;'>Current Point</th>
                <th style='width:100px;'>Point Rate</th>
                <th style='width:200px;'>Created</th>
                <th style='width:100px;'>Action</th>
                </tr>";
                 $count=0;   
                while($data=mysqli_fetch_assoc($response)){
                //  print_r($data); 
                $count++;
                echo "<tr>
                <td data-label='Id' >$data[id]</td>
                <td data-label='first_name' >$data[first_name]</td>
                <td data-label='last_name' >$data[last_name]</td>
                <td data-label='email'  >$data[email]</td>
                <td >$data[status]</td>
                <td data-label='referral_points' >$data[total_points]</td>
                <td data-label='user_code'  >$data[current_point]</td>
                <td data-label='refer_code'  >$data[point_rate]</td>
                <td data-label='Time'  >$data[created]</td>
                <td data-label='Action' >
                ";
               if($data['status']!='complete'){
                echo "<a href='../php/activate_and_deactivate_user.php?a  _id=$data[id]' class='btn btn-primary btn-sm'><i class='fas fa-person-circle-check'>Activate</i></a>";
                }
                else{
                  echo "<a href='../php/activate_and_deactivate_user.php?d_id=$data[id] 'class='btn btn-danger btn-sm'><i class='fas fa-person-circle-xmark'></i>Deactivate</a></td> ";
                }
                echo"</tr>";
              }
            }
      ?>
            </div>
        </div>
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

    $(document).ready(function() {
        // search box   
        $("#show_table_user").hide();
                $('#show_table_id').show();
        $("#search").on("keyup", function() {
            // e.preventDefault();
            var search_term = $(this).val();
             if(search_term!="") {
                $('#show_user_user').show();//search
                $('#show_user_id').hide();
            }
            else{
                $("#show_table_user").hide();
                $('#show_table_id').show();
            }
            $.ajax({
                url: "../php/search.php",
                method: "GET",
                data: { search: search_term },
                success: function(data) {
                    $('#show_table_user').html(data).show();
                    $('#show_table_id').hide();
                }
            });
        });

    });
        
    //###################################################3 jquery end
</script>
</body>
</html>
