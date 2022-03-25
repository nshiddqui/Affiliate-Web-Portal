<?php
session_start();
require("connection.php");
if(isset($_POST['change_pwd']))
{
    $email=$_POST['email'];
    $old_img=$_POST['old_img'];
    $img=$_POST['img'];
    $pwd=$_POST['new_pwd'];
    $pwd=password_hash($pwd,PASSWORD_BCRYPT);
    $res=mysqli_query($con,"update users set password ='$pwd' where email='$email'");
    if($res)
    {
        $_SESSION['success']="Password Change Successfully!";
    }
    else{
        $_SESSION['success']="Password doesn't Change!";

    }
}
header("Location:../pages/admin_user.php");
?>