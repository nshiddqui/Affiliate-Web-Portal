<?php
session_start();
if(!isset($_GET['eid_id'])){
    header("Location:categories.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Edit-Category</title>
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

                <h3 class="btn  btn-success w-100 p-3 ">Edit Category</h3>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['success']);
                }
                ?> 
                </div>
                <?php
                    if(isset($_GET['eid_id'])){ 
                        $id= $_GET['eid_id'];
                        require("../php/connection.php");
                        $res=mysqli_query($con,"select * from categories where id='$id'");
                        if(mysqli_num_rows($res)>0){
                            $data=mysqli_fetch_array($res);
                        ?>
                        <br>
                        <form action="../php/edit_categories_script.php" method="POST">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                      <label for="title" > Category Name</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder='Category Name' name="name" id="title" value="<?php echo $data['name'];?>">
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
