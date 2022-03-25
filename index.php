<?php
session_start();
if(!isset($_COOKIE['vist'])){
    require_once('php/connection.php');
    setcookie('vist','yes',time()+(60*60*24*30));
    $result=mysqli_query($con,'update visted set vist_count=vist_count+1');
    if($result){
    }
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Affiliate-Index</title>
    <!-- Font Awesome Icons -->
  <link rel='stylesheet' href='plugins/fontawesome-free/css/all.min.css'>
  <link rel='stylesheet' href='plugins/bootstrap/css.css'>
</head>
<body>
<nav class='main-header navbar navbar-expand navbar-black navbar-light dark'>
    <!-- Left navbar links -->
    <ul class='navbar-nav'>
      
      <li class='nav-item d-none d-sm-inline-block active'>
        <a href='index.php' class='nav-link'>Home</a>
      </li>
      <!-- <li class='nav-item d-none d-sm-inline-block'>
        <a href='show_blog.php' class='nav-link'>Blogs</a>
      </li> -->
      <li class='nav-item d-none d-sm-inline-block'>
        <a href='pages/login.php' class='nav-link'>Login</a>
      </li>
      <li class='nav-item d-none d-sm-inline-block'>
        <a href='pages/register.php' class='nav-link'>Registeration</a>
      </li>
    </ul>
</nav>
<hr>
</body>
</html>