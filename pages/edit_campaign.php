<?php
session_start();
// if(!isset($_GET['eid_id']))
// {
//     $_SESSION['error']="First select Edit Entry";
//     header("Location:campaign.php");
//     die();
// }
//check customer login or not
// if((isset($_SESSION['role'])!=2) &&(isset($_SESSION['role'])!=3 ) &&!isset($_SESSION['user_email']))
// {
//     header('Location:login.php');
//     die();
// }

require_once("../php/connection.php");
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Edit-Campaign</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
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

                <h3 class="btn btn-success w-100 p-3">Edit Campaign</h3>
                <br>
                <?php
                          if(isset($_GET['eid_id'])){ 
                              $id= $_GET['eid_id'];
                              require("../php/connection.php");
                              $res=mysqli_query($con,"select * from campaigns where id='$id'");
                              if(mysqli_num_rows($res)>0){
                                  $data=mysqli_fetch_array($res);
                                  $category_id=$data['category_id'];
                                  $catergory_res=mysqli_query($con,"select name from categories where id='$category_id'");
                                  $catergory_id_name="";
                                  if(mysqli_num_rows($catergory_res)>0){
                                    $catergory_data=mysqli_fetch_assoc($catergory_res);
                                    $catergory_id_name=$catergory_data['name'];
                                    
                                  }

                              ?>
                        <form action="../php/edit_campaign_script.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                        </div>
                        <label for="name"> Campaign name</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Campaign name"id="name" value="<?php echo $data['name'];?>">
                        </div>
                        <label for="link"> Campaign link</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control"placeholder="Link" name="link" id="link"value="<?php echo $data['link'];?>">
                        </div>
                        <label for="category"> Campaign categroy</label>
                        <!-- categories -->
                        <select name="cat" id="" class='form-control' placeholder="choose category">
                        <option value="<?php echo $data['category_id'];?>">
                        <?php echo ucfirst($catergory_id_name); ?></option>  
                              <option >Choose Category</option>  
                                <?php
                                    $response=mysqli_query($con,"select * from categories " );
                                    if(mysqli_num_rows($response)>0){
                                        while($i=mysqli_fetch_assoc($response)){
                                            ?>
                                            <option value="<?php echo $i['id'];?>"><?php echo ucfirst($i['name']); ?></option>  
                                            <?php
                                          }
                                    }
                                ?>
                        </select>
                        </div>
                        <?php
                        if($data['name'] !=""){
                            ?>
                          <label ><video autoplay muted loop widht='100px' height='100px'><source src="../prd_media/<?php echo $data['video'];?>" type='video/mp4'></video></label>
                          <input type="hidden" value="<?php echo $data['video'];?>"class="form-control" name="old_video_file">
                          <?php
                        }
                        ?>
                          <small>Note: video length samller than 40 MB.</small>
                          <div class="input-group mb-3">
                            Add Campaign video
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
  
</body>
</html>
