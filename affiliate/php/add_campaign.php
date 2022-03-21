<?php
require("connection.php");
session_start();

if(isset($_POST['add_prd']))
{
    $prd_name=mysqli_real_escape_string($con,$_POST['prd_name']);
    $prd_desc=mysqli_real_escape_string($con,$_POST['prd_desc']);
    $prd_short_desc=mysqli_real_escape_string($con,$_POST['prd_short_desc']);
    $prd_price=mysqli_real_escape_string($con,$_POST['prd_price']);
    $prd_link=mysqli_real_escape_string($con,$_POST['prd_link']);
    $prd_category=mysqli_real_escape_string($con,$_POST['prd_category']); 
    $prd_sub_category=mysqli_real_escape_string($con,$_POST['prd_sub_category']);

    if( $prd_name=="" ||$_FILES['img']['size']=="" || empty($prd_category)||empty($prd_price))
    {   
        $_SESSION["error"]="Please enter * Field";
    }
    else{
        // image file
        foreach($_FILES['img']['name'] as $key=>$val){
            $file=$val;
            if(!file_exists('../prd_media/'.$file))
              {
            move_uploaded_file($_FILES['img']['tmp_name'][$key],'../prd_media/'.$file);
            // echo $_FILES['photo']['tmp_name'][$key];
            }
            else{
                $rand=rand('11','999999999999');
                $file=$rand."_".$file;
                move_uploaded_file($_FILES['img']['tmp_name'][$key],'../prd_media/'.$file);
            }
            $img=$file;
            // video file 
            $video=$_FILES['video']['name'] ;
                move_uploaded_file($_FILES['video']['tmp_name'],'../prd_media/'.$video);
        $insert=mysqli_query($con,"INSERT into campaign (campaign_name,campaign_price,campaign_desc,campaign_short_desc,campaign_img,campaign_video,campaign_link,campaign_category,campaign_sub_category) 
        VALUES('$prd_name','$prd_price','$prd_desc','$prd_short_desc','$img','$video','$prd_link','$prd_category','$prd_sub_category')");// or die(mysqli_error());
        if($insert){
            $_SESSION['sucess']="Sucessfully Add new Product";
            header("Location:../pages/examples/campaign.php");
        }
        else{
            header("Location:../pages/examples/500.html");
        }
    }
}
header("Location:../pages/examples/campaign.php");
}


?>