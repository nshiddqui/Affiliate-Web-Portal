<?php
session_start();

if(isset($_GET['refer']))
{
  global $user_code;
  global $u_mail;
  $user_code=$_GET['refer'];
  require("../php/connection.php");
  $response=mysqli_query($con,"select * from users where user_code='$user_code'");
  if(mysqli_num_rows($response)>0){
    $data=mysqli_fetch_array($response);
    $u_mail=$data['email'];
    $user_code=$data['user_code'];
    $_SESSION['success']="Valid Refer code!";

  }
  else{
    $_SESSION['error']="Invalid Refer code!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Affiliate | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
  
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
      session_unset();

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
      session_unset();
  }
  ?>

<div class="register-box">
  <div class="register-logo">
    <b>Affiliate</b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      <!-- <form action="../../index.html" method="post"> -->
      <!-- <form action="../../php/register.php" method="post"> -->
      <form action="../php/register_script.php" method="post">

      <?php
      if(isset($_GET['refer']))
      {
        ?>
      <div class="input-group mb-3">
        <label for="ref">Refer Code 
          <?php 
          if($u_mail !="")
          {
            echo "by : $u_mail";
            }
          ?>
       <input type="text" class="form-control"id="ref" name="ref_code" readonly value="<?php echo $_GET['refer'];?>"> 
          </label>
        </div>
     <?php
    }else{
      ?>
      <input type="hidden" class="form-control"id="ref" name="ref_code"> 
<?php
    }
    ?>    
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="first_name" placeholder="First name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="last_name" placeholder="Last name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pwd"placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirm_pwd"placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <p><small id="error_mobile" class="text-danger"></small><br></p>
          <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 " id="otp" >
          <input type="tel" class="form-control bg-warning " name="otp"placeholder="OTP"  >
        </div>
      
          <!-- /.col -->
          <div class="col-8" >
            <button type="submit" name="register_index" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    <?php
    if(!isset($_GET['refer']) || !isset($_SESSION))
    {
    ?>
      <a href="login.php" class="text-center">I already have a account</a><br>
    <?php
    }
    ?>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="../dist/js/adminlte.min.js"></script> -->
<script>
  $('#otp').hide();
  var mobile=$('#mobile');
  mobile.on('keyup',()=>{
    var value=$('#mobile').val();
    if(value.length==10){
      $.ajax({
        url:"https:www.mobile_number_vericaton.",
        type:GET,
        data:"mobile_no="+mobile,
        success:function(data){
                console.log(value);
                 $('#otp').show();
                
        },
        error:function(data){
              $('#error_mobile').text("Invalid Mobile No.");
        }
      });

    }
    // console.log(value);
    // alert('done');
  });
  
</script>
</body>
</html>
