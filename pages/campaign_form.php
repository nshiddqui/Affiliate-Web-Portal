<?php
session_start();
if(!isset($_GET['video']) && !isset($_GET['user_id']) && !isset($_GET['campaign_id'])){
    $_SESSION['error']='Something Went Wrong!';
    header("Location:affiliate_home_user.php");
    die();
}

require_once("../php/connection.php");
$video=$_GET['video'];
$user_id=$_GET['user_id'];
$campaign_id=$_GET['campaign_id'];
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Campaign Form</title>
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
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

                <h3 class="bg-info text-center w-100 p-3 ">Campaign Form</h3>
                <br>
                <?php
                        $res=mysqli_query($con,"select * from users where id='$user_id'");
                        if(mysqli_num_rows($res)>0){
                            $data=mysqli_fetch_array($res);
                        ?>
                        <form action="../php/campaign_form_script.php" method="POST" class="mt-4 w-100" >
                        <input type="hidden" class="form-control" name="user_id"  value="<?php echo $user_id;?>" >
                        <input type="hidden" class="form-control" name="campaign_id" value="<?php echo $campaign_id;?>" >

                        <label for="First Name"> First Name</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="first_name" id="First Name" value="<?php echo $data['first_name'];?>">
                        </div>
                        <label for="Last Name">Last Name</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="last_name" id="Last Name"value="<?php echo $data['last_name'];?>">
                        </div>
                        <label for="email"> Email ID</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" id="email"value="<?php echo $data['email'];?>">
                        </div>
                        <label for="mobile"> Mobile</label>
                        <div class="input-group mb-3">
                        <input type="tel" class="form-control" name="mobile" id="mobile" value="<?php echo $data['mobile'];?>" >
                        </div>
                       
                        <input type="submit" name="add_btn" class="btn btn-primary"  value="Submit" />

                        </form>
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
 
</body>
</html>