<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Log in</title>
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
    <a ><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <!-- <form action="../../index3.html" method="post"> -->
      <form action="../php/login_admin_script.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email"  placeholder="Email Or Phone Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"name="pwd"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1 pl-4">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0 pl-4">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
