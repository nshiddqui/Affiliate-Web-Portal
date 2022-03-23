<?php
session_start();
require("connection.php");
if(isset($_POST['eid_id']))
{
    $campaign_id=$_POST['id'];
    $prd_name=mysqli_real_escape_string($con,$_POST['prd_name']);
    $prd_desc=mysqli_real_escape_string($con,$_POST['prd_desc']);
    $prd_short_desc=mysqli_real_escape_string($con,$_POST['prd_short_desc']);
    $prd_price=mysqli_real_escape_string($con,$_POST['prd_price']);
    $prd_link=mysqli_real_escape_string($con,$_POST['prd_link']);
    $prd_category=mysqli_real_escape_string($con,$_POST['prd_category']); 
    $prd_sub_category=mysqli_real_escape_string($con,$_POST['prd_sub_category']);
    $campaign_status=mysqli_real_escape_string($con,$_POST['campaign_status']);
    $old_file=$_POST['old_file'];
    $old_video_file=$_POST['old_video_file'];

    if($_FILES['img']['name']==''){
        $image=$old_file;
    }
    else{
        $image='';
        foreach($_FILES['img']['name'] as $key=>$val){
            $img=$val;
            if(!file_exists('../prd_media/'.$img))
        {
            move_uploaded_file($_FILES['img']['tmp_name'][$key],'../prd_media/'.$img);
            }
            $image.=$img." ";
        }
        //  video
        if($_FILES['video']['name']==''){
            $video=$old_video_file;
        }
        else{
            $video=$_FILES['video']['name'];
            move_uploaded_file($_FILES['video']['tmp_name'],'../prd_media/'.$video);
        }
        $res=mysqli_query($con,"update campaign set campaign_name='$prd_name',campaign_price='$prd_price',campaign_desc='$prd_desc',campaign_short_desc='$prd_short_desc',campaign_img='$image',campaign_video='$video',campaign_link='$prd_link',campaign_category='$prd_category',campaign_sub_category='$prd_sub_category',campaign_status='$campaign_status' where campaign_id='$campaign_id' ");
        if($res){
            $_SESSION['success']="Sucessfully Edit Campaign Details!";
            header("Location:../pages/examples/campaign.php");
        }
        else{
            header("Location:../pages/examples/500.html");
        }
    }
}
else{
    header("Location:../pages/examples/campaign.php");
    $_SESSION['error']="video length larger than 40 MB ";
}




// delete campaign
if(isset($_GET['d_id'])){
    $campaign_id=$_GET['d_id'];
    $res=mysqli_query($con,"delete campaign where campaign_id='$campaign_id'");
    if($res){
        $_SESSION['success']='Campaign Successfully Deleted!';
        header("Location:../pages/examples/campaign.php");
    }
}


?>






