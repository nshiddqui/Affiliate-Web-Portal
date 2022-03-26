<?php
session_start();
//check customer login or not
// if(isset($_SESSION['role']) !=1 &&!isset($_SESSION['user_email']))
// {
//     header('Location:login.php');
//     die();
// }
        // $email=$_SESSION['user_email'];
        $email='abc1@gmail.com';
        require_once("../php/connection.php");
        $response=mysqli_query($con,"select * from users where email='$email' ");
        $count=mysqli_num_rows($response);
        if($count>0){
            $data=mysqli_fetch_array($response);
            $aadhar_img=$data['aadhar_file'];
            $pan_img=$data['pan_file'];
            $aadhar_no=$data['aadhar_no'];
            $pan_no=$data['pan_no'];
            $user_id=$data['id'];
            $role=$data['role'];
            $status=$data['status'];
            if ($role==2)
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
  .copy-text input[type='text']{
    padding: 10px;
    font-size:13px;
    color:#555;
    border:none;
    outline:none;
  }
  .copy-text button{
    padding:5px;
    background: #5784f5;
    color:#fff;
    font-size:12px;
    border:none;
    outline:none;
    border-radius:30%;
    cursor:pointer;
  }
</style>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a " class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
        <?php echo $role." User";?>
      </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="affiliate_index.php" class="nav-link uactive">
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
            <a href="affiliate_home_user.php" class="nav-link active">
              <p>
                View Campaings
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
        <h4>All Campaings</h4>
        <!-- Info boxes -->
        <div class="row mt-3">
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
                <th style='width:10px'>SNO.</th>
                <th>Name</th>
                <th style='width:100px;'>Status</th>
                <th style='width:50px;'>Category</th>
                <th style='width:600px;'>Link</th>
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
                <td>
                <div class='copy-text' id='copy-text' >
                <input type='text' id='name' class='form-control name' readonly='readonly' value='$data[link]?user_id=$user_id&category_id=$data[category_id]'> 
                <button class='mt-2 ' type='button'  ><i class='fas fa-clone '></i></button>
                </div>
                </td>
                <td >";
                if($data['video']!=''){
                    echo"<a target='new_blank' href='../prd_media/$data[video]' class='btn btn-primary btn-sm' >View </a></td>";
                    // echo"<video autoplay muted loop widht='100px' height='100px'><source src='../prd_media/$data[video]' type='video/mp4'></video></td>";
                }else{
                   echo"No Video File </td>";
                }
              }
                   echo"</table>";
          }
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
  // code for copy to clipboard
  var btn=document.getElementsByClassName('copy-text');
  var txt=document.getElementsByClassName('name');
  for (let x=0;x<btn.length;x++)
  {
    btn[x].addEventListener('click',function(){
      txt[x].select();
      txt[x].setSelectionRange(0,99999);
      navigator.clipboard.writeText(txt[x].value);
    },false)
  }
</script>
</body>
</html>
