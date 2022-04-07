<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Affiliate | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

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
<div class="login-box">
  <div class="login-logo">
    <a ><b>Affiliate</b></a>
  </div>
  <!-- /.login-logo -->

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <!-- <form action="../../index3.html" method="post"> -->
      <form action="../php/login_script.php" method="post">
      <p id="error_mobile" class="text-danger"></p>
      <div class="input-group mb-3">
          <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        <small id="otp_error"></small>
        <div class="input-group mb-3 " id="otp" >
          <input type="text" id='otp_input'class="form-control" name="otp"placeholder="OTP"  >
        </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- <p class="mb-2 pl-4">
        <a href="forgot-password.php">I forgot my password</a>
      </p> -->
      <p class="mb-2 pl-4">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script>
  // generate otp
  function otp_generate(){
      var digits="0123456789";
      let otp="";
      for (let i=0;i<4;i++){
        otp+=digits[Math.floor(Math.random()*10)];
      }
      return otp;
      }
      // end function

      $('#otp_input').prop('disabled',true);
      // $('#otp').hide();
      var mobile=$('#mobile');
      mobile.on('keyup',()=>{
        var value=$('#mobile').val();
        if(value.length==10){
          $('#otp').show();
          var create_otp=otp_generate();
          console.log(create_otp);
// insert otp into table
      $.ajax({
        // url:"https:www.mobile_number_vericaton.",
        url: "../php/login_script.php",
        method:'GET',
        data:{mobile:value,otp:create_otp},
        success:function(data){
          console.log(data);
          data=JSON.parse(data);
          if(data['status']){
            $('#error_mobile').html(data['data']);
            $('#otp_error').html('your temporary password is : '+create_otp);
            $('#otp_input').prop('disabled',false);
          }else{
            $('#otp_error').text();
            $('#error_mobile').html(data['data']);
            $('#otp_input').prop('disabled',true);
         }
        // },
        // error:function(data){
        //   console.log(data);

        }
      });

    }
    // console.log(value);
    // alert('done');
  });
  
</script>
</body>
</html>
