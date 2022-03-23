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

                <h3 class="btn btn-success w-100 p-3">Edit Campaign</h3>
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

                        <small>Note: video length samller than 40 MB.</small>
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
