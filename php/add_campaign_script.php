<?php
session_start();
require("connection.php");

if(isset($_POST['add_prd']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $link=mysqli_real_escape_string($con,$_POST['link']);
    $category=mysqli_real_escape_string($con,$_POST['cat']); 
    if(empty($name) || empty($category)){
        $_SESSION['error']="Enter campaign name and choose category!";
        header("Location:../pages/new_campaign.php");
        die();
    }
    else{
        $video=$_FILES['video']['name'] ;
        move_uploaded_file($_FILES['video']['tmp_name'],'../prd_media/'.$video);
        $insert=mysqli_query($con,"INSERT into campaigns (name,video,link,category_id) VALUES('$name','$video','$link','$category')");
        if($insert){
            $_SESSION['success']="Sucessfully Add new campaign !";
            header("Location:../pages/new_campaign.php");
            die();
        }
        else{
            header("Location:../pages/500.html");
        }
    }
header("Location:../pages/new_campaign.php");
}


?>