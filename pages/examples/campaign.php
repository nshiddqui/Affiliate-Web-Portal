<?php
session_start();
//check customer login or not
// if((isset($_SESSION['role'])!=2) &&(isset($_SESSION['role'])!=3 ) &&!isset($_SESSION['user_email']))
// {
//     header('Location:login.php');
//     die();
// }

require_once("../../php/connection.php");
if(isset($_GET['click_allow_user']))
{
  // echo "<script>alert('click')</script>";
  $user_email=$_GET['allow_user'];
  $id=$_GET['id'];
  if($user_email!='Allow User'){

    echo "<script>alert($user_email)</script>";
    $check_mysqli=mysqli_query($con,"update campaign set campaign_allow_user='$user_email' where campaign_id='$id'");
    if($check_mysqli){
      echo "done";
      die();
    }
  }

}else{
  echo"else";
}     

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
   <!-- materalize css -->
   <!-- <link rel="stylesheet" href="../../plugins/materialize.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<style>
  #desc{
    overflow:auto;
  }
  #allow_user{
    margin-left:-30px;
    min-width:220px;
  }
</style>

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
            <a href="campaign.php" class="nav-link active">
              <p>
               Campaign
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item menu-open">
            <a href="admin_edit_campaign.php" class="nav-link inactive">
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
        <div class="row ">
          <div class="col-md-6">
                <!-- add product btn -->
                <tr>
                <td><button class="flaot-left btn btn-success toggle_btn mt-1 py-1" id="add" onclick="toggle_form()"> 
                <i class="fas fa-plus text-white"></i> Create New Campaign</button>
                </td>
                <td>       
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
                ?> </td>
                </tr>
            </div>
          </div>
            <div class="container">
            <form action="../../php/add_campaign.php" method="POST" class="form_btn " enctype="multipart/form-data">
            <h5>Add new campaign</h5>
           

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="prd_name" placeholder="Product name">
        </div>

        <div class="input-group mb-3">
          <textarea class="form-control" name="prd_desc" placeholder="Product description"></textarea>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="prd_short_desc" placeholder="Product short description">
        </div>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="prd_price" placeholder="Product Price">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="prd_link" placeholder="Product Link">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="prd_category" placeholder="Product category">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="prd_sub_category" placeholder="Product sub category">
        </div>
        <div class="input-group mb-3">
            Add Product Images
            <input type="file" class="form-control"id="file" name="img[]" multiple />
        </div>
        <div class="input-group mb-3">
            Add Product video
            <input type="file" class="form-control"id="file" name="video" />
        </div>

        <input type="submit" name="add_prd" class="btn btn-primary"value="Add Product" />
            </form>
          </div>
            <!-- view product -->
            <div class="row mt-3">
          <div class="col-md-6">
            <h4>View Campaign</h4>
            <!-- <br> -->
          </div>
            <div class="col-md-3 float-left">
              <form action="campaign.php" method="GET" class=" ">
                <select name="filter_term" id="" class='form-control'>
                  <option >Filter Choose</option>  
                  <option value="campaign_name">Campaign name</option>  
                  <option value="campaign_status">Campaign status</option>  
                  <option value="campaign_category">Campaign category</option>  
                  <option value="campaign_price">Price</option>  
                </select>
                <input type="submit" name="filter" class="btn btn-info btn-sm mt-2 w-100"value="Filter" />
              </form>
            </div>
        </div>
                <div class="container-fluid">
        <!-- pagination code  -->
                <?php
                        $per_page_result=5;
                        $start=0;
                        $current_page=1;
                        if(isset($_GET['start'])){
                            $start=$_GET['start'];
                            if($start<=0){
                                $start=0;
                                $current_page=1;
                            }
                            else{
                                $current_page=$start;
                                $start=$start-1;
                                // echo $start;
                                // $start=$start*5;
                                $start=$start*$per_page_result;
                            }
                        }
                             // filter select option list
                            if(isset($_GET['filter']))
                            {
                                $filter_term=$_GET['filter_term'];
                                $response=mysqli_query($con,"select * from campaign order by '$filter_term'");
                            }
                            else{
                            $sql="select * from campaign ORDER BY campaign_id asc limit $start,$per_page_result ";
                            $response=mysqli_query($con,$sql) or die(mysqli_error($con));
                            }
                        // end filter select option list
                    ?>
        <!-- display search product result -->
                    <div id="show_table_campaign">
                    </div>
        <!-- display all product -->
          <?php 
                if($response){
                  $total_record=mysqli_num_rows($response);
                if($total_record>0){
                   // ceil is used for round of the number in int
                   $pagi=ceil($total_record/$per_page_result);
                    echo "<br>Total Product : $total_record";
                    echo"<br>";
            ?>
        <div id="show_table_id" >
            <table class="table striped bordered highlight" id="table_timetable ">
            <?php
                echo "<tr>
                <th id='allow_user'>Allow User </th>
                <th >ID</th>
                <th>Product Name</th>
                <th style='width:80px; '>Product Price</th>
                <th style='width:100px;'>Status</th>
                <th style='width:200px;'>Product Description</th>
                <th style='width:100px;'>Product short description</th>
                <th style='width:100px;'>Product category</th>
                <th style='width:100px;'>Product sub category</th>
                <th style='width:100px;'>Product link</th>
                <th style='width:100px;'>Product image</th>
                <th style='width:100px;'>Product video</th>
                <th style='width:100px;'>Action</th>

                </tr>";
                 $count=0;   
                while($data=mysqli_fetch_assoc($response)){
                //  print_r($data); 
                $count++;
                echo "<tr>
                <td id='allow_user'>
                <form method='GET' action='campaign.php' >
               <select name='allow_user' class='form-control'>";
               if($data['campaign_allow_user']){
                 echo "<option>$data[campaign_allow_user]</option> ";
               }
               else{
                echo "<option>Allow User</option> ";
               }
                  $select=mysqli_query($con,"select email from users ");
                  if($select)
                  {
                    foreach($select as $s ){
                      echo  "<option value='$s[email]'>$s[email]</option>";
                    }
                  }
                  echo"</select>
                  <input type='hidden' name='id' value='$data[campaign_id]' >
                  <input type='submit'class='mt-1 btn btn-info btn-sm' name='click_allow_user' value='Confirm'>
                  
              </form>
              </td>
                <td data-label='Id' >$count</td>
                <td data-label='campaign_name' >$data[campaign_name]</td>
                <td data-label='campaign_price' >$data[campaign_price]</td>
                <td data-label='status' >$data[campaign_status]</td>
                <td data-label='campaign_desc'style='width:200px;text-wrap:wrap;' id='desc' >$data[campaign_desc]</td>
                <td data-label='campaign_short_desc' >$data[campaign_short_desc]</td>
                <td data-label='campaign_category'  >$data[campaign_category]</td>
                <td data-label='campaign_sub_category'  >$data[campaign_sub_category]</td>
                <td data-label='campaign_link'  >$data[campaign_link]</td>
                <td data-label='campaign_img' >";
                if($data['campaign_img']!=''){
                    echo"<img src='../../prd_media/$data[campaign_img]' widht='60px' height='60px' ></td>";
                }else{
                   echo"No Image uploaded </td>";
                }
                echo"<td data-label='campaign_video'>";
                if($data['campaign_video']!=''){
                    echo"<video autoplay muted loop widht='100px' height='100px'><source src='../../prd_media/$data[campaign_video]' type='video/mp4'></video></td>";
                }else{
                   echo"No Video File </td>";
                }
                
                echo"<td data-label='Action' >";
                if($data['campaign_status']!='complete'){
                    echo "<a href='../../php/activate_and_deactivate_campaign.php?a_id=$data[campaign_id]' class='btn btn-primary btn-sm''>Activate</a>";
                }
                else{
                    echo"  <a href='../../php/activate_and_deactivate_campaign.php?d_id=$data[campaign_id] 'class='btn btn-info  btn-sm'>Deactivate</a>";
                }
                   echo "<a href='admin_edit_campaign.php?eid_id=$data[campaign_id]' ><i class='btn btn-primary btn-sm fas fa-edit text-white'></i></a>
                  <a href='admin_edit_campaign.php?d_id=$data[campaign_id] '><i class='btn btn-danger btn-sm fas fa-trash-alt text-white'></i></a></td> ";
                  echo"</tr>";
                   }
                   echo"</table>";
            
        }
        else{
            if(isset($_GET['start'])){
                $start=$_GET['start'];
                if($start>$pagi){
                    echo "<h5>No Records Fund</h5>";
                 }
                }
                ?>
                <h5>No Records Fund</h5>
            <?php } 
        }
            echo "</table>";
            ?>
                    </div>
            </div>
            <div class="container">
                <div class="col s12 ">
                    <ul class="pagination">
                        <?php
            if($current_page==1){
                echo "<li class='disabled'>";
            }
            ?>
                        <a href="admin_user.php?start=<?php echo $current_page-1;?>">
                            <i class="fas fa-angle-left text-white"></i></a>
                        </li>
                        <?php
                    for($i=1;$i<=$pagi;$i++){
                        $class='';
                        // <!-- check click btn is equal to $i -->
                        if($current_page==$i){
                            $class='active';
                        }
                    ?>
                        <li class="waves-effect <?php echo $class; ?>"><a href="?start=<?php echo $i;?>">
                                <?php echo $i;?>
                            </a></li>
                        <?php
            }
            if($current_page==$pagi){
                echo "<li class='disabled'>";
            }
                ?>
                        <a href="admin_panel.php?start=<?php echo $current_page+1;?>">
                            <i class="fas fa-angle-right text-white"></i></a>
                        </li>
                    </ul>
                </div>
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
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
                url: "../../php/search_prd.php",
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
      $('.form_btn').hide();
      function toggle_form() {
          $('.form_btn').toggle();
      }
      </script>
</body>
</html>
