<?php
require("connection.php");
if(isset($_GET['a_id'])){
    $user_id=$_GET['a_id'];
    $res=mysqli_query($con,"update users set status='complete' where id='$user_id'");
    if($res){
        $_SESSION['success']='User Successfully Activated!';
        header("Location:../pages/examples/admin_user.php");
    }
}

// change status activate to pending
if(isset($_GET['d_id'])){
    $user_id=$_GET['d_id'];
    $res=mysqli_query($con,"update users set status='pending' where id='$user_id'");
    if($res){
        $_SESSION['success']='User Successfully Deactivated!';
        header("Location:../pages/examples/admin_user.php");
    }
}

?>