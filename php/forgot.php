<?php
session_start();
require "connection.php";

// forgot password in forgot-password.php
if(isset($_POST['forgot-password']))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
    if(!empty($email))
    {
        $result=mysqli_query($con,"Select * from users where email='$email'");
        if (mysqli_num_rows($result)>0)
        {
            $token=md5(rand());
            setcookie('user_token',$token,time()+(60*2));
            $_SESSION['success']="Your Email is Verfied!";
            header("Location:../pages/recover-password.php?token=$token&email=$email");      
            // die();
        }
        else{
            $_SESSION['error']="Invalid Email ID !";
            header("Location:../pages/forgot-password.php");
            die();
        }
    }
    else{
        $_SESSION['error']="Please Enter your Email ID !";
        header("Location:../pages/forgot-password.php");
    }
}


// recover-password page code

//event fire when user click change password in recover-password.php  
if(isset($_POST['change_pwd']))
{
  $token=$_POST['token'];
  $email=$_POST['email'];
  $pwd=mysqli_real_escape_string($con,$_POST['pwd']);
  $c_pwd=mysqli_real_escape_string($con,$_POST['c_pwd']);
  
  if(isset($_COOKIE['user_token']))
  {
  $cookie_token=$_COOKIE['user_token'];
  }
  // check received token is match to the session token
  if($token == $cookie_token)
  {
    if(!empty($pwd) && !empty($c_pwd))
    {
      // checking password and confirm password is matching or not
      if($pwd==$c_pwd)
      {
        $pwd_hash=password_hash($pwd,PASSWORD_BCRYPT);
        $result=mysqli_query($con,"update users set password ='$pwd_hash' where email='$email' ");
        if($result)
        {
            //remove user_token cookie if password is changed 
            setcookie('user_token',$token,time()-60);
            $_SESSION['success']="Your Password is Changed! Now you can login with your new password!";
            header("Location:../pages/login.php");
        }
      }
      else
      {
          $_SESSION['error']="Password doesn't matched!";
          header("Location:../pages/recover-password.php?token=$token&email=$email");
      }
    }
    else
    {
        $_SESSION['error']="All Field Are Mandetory !";
        header("Location:../pages/recover-password.php?token=$token&email=$email");
    }
  }
  else
  {
    $_SESSION['error']="Invalid Token! Please Try Again!!";
    header("Location:../pages/forgot-password.php");
    die();
  }
}

?>

