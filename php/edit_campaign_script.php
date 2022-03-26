<?php
session_start();
require("connection.php");


// delete campaign
if(isset($_GET['d_id'])){
    $id=$_GET['d_id'];
    $res=mysqli_query($con,"delete from campaigns where id='$id'");
    if($res){
        $_SESSION['success']='Campaign Successfully Deleted!';
        header("Location:../pages/campaign.php");
        die();
    }
}

//edit campaign
if(isset($_POST['eid_id']))
{
    $id=$_POST['id'];
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $link=mysqli_real_escape_string($con,$_POST['link']);
    $category=mysqli_real_escape_string($con,$_POST['cat']); 
    $old_video_file=$_POST['old_video_file'];
    //  video
    if(empty($_FILES['video']['name'])){
        $video=$old_video_file;
    }
    else{
        $video=$_FILES['video']['name'];
        move_uploaded_file($_FILES['video']['tmp_name'],'../prd_media/'.$video);
    }
    $res=mysqli_query($con,"update campaigns set name='$name',video='$video',link='$link',category_id='$category' where id='$id' ");
    if($res){
        $_SESSION['success']="Sucessfully Edit Campaign Details!";
        header("Location:../pages/campaign.php");
    }
    else{
        header("Location:../pages/500.html");
    }
}
else{
    header("Location:../pages/campaign.php");
    $_SESSION['error']="video length larger than 40 MB ";
}

?>






