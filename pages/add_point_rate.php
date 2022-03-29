<?php
session_start();
//check id is coming or not through get request
if(!isset($_GET['id'])){
    header("Location:categories.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Point-Rate</title>
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

            <h3 class="btn  btn-success w-100 p-3 ">Add Point-Rate</h3>
            <br>
            <!--  error message -->
            <?php 
                    if(isset($_SESSION['error'])){
                    ?>
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              <strong>Error </strong>
              <?php
                            echo $_SESSION['error'];
                        ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="close"><span
                  aria-hidden="true">&times;</span></button>
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
              <button type="button" class="close" data-dismiss="alert" aria-label="close"><span
                  aria-hidden="true">&times;</span></button>
            </div>
            <?php
                    unset($_SESSION['success']);
                }
                ?>
          </div>
          <?php
                    if(isset($_GET['id'])){ 
                        $id= $_GET['id'];
                        require_once("../php/connection.php");
                        $res=mysqli_query($con,"select * from users where id='$id'");
                        if(mysqli_num_rows($res)>0){
                            $data=mysqli_fetch_array($res);
                        ?>
          <br>
          <form action="../php/add_point_rate_script.php" method="POST">
            <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
            <label for="title"> Point Rate</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder='Enter Point Rate' name="rate" id="title"
                value="<?php echo $data['point_rate'];?>">
            </div>
            <input type="submit" name="add_point" class="btn btn-primary" value="Save Changes" />
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
      <!-- /.row -->
    </div>
    <!--/. container-fluid -->
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