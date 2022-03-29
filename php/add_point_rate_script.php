<?php
session_start();
require("connection.php");

// edit point_rate
if(isset($_POST['add_point']))
{   $id=$_POST['id'];
    // $point_rate=mysqli_real_escape_string($con,$_POST['rate']);
    $point_rate=$_POST['rate'];
    if($point_rate ==""){
        $_SESSION['error']='Enter Field Data!';
        header("Location:../pages/add_point_rate.php?id=$id");
    }
    else{
        $res=mysqli_query($con,"UPDATE users SET point_rate='$point_rate' WHERE id='$id'");
        if($res){
            $_SESSION['success']="Update Point Rate Successfully!";
            header("Location:../pages/admin_user.php");
        }
        else{
            header("Location:../pages/500.html");
        }
    
    }
}
?>
