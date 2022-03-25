<?php
require("connection.php");
if(isset($_GET['a_id'])){
    $user_id=$_GET['a_id'];
    $res=mysqli_query($con,"update campaigns set status='active' where id='$user_id'");
    if($res){
        $_SESSION['success']='Campagin Successfully Activated!';
        header("Location:../pages/campaign.php");
    }
}

// change status activate to pending
if(isset($_GET['d_id'])){
    $user_id=$_GET['d_id'];
    $res=mysqli_query($con,"update campaigns set status='pending' where id='$user_id'");
    if($res){
        $_SESSION['success']='Campaign Successfully Deactivated!';
        header("Location:../pages/campaign.php");
    }
}

?>