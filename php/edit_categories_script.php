<?php
session_start();
require("connection.php");

// delete categories
if(isset($_GET['d_id'])){
    $id=$_GET['d_id'];
    $res=mysqli_query($con,"DELETE FROM categories where id='$id'");
    if($res){
        $_SESSION['success']='Category Successfully Deleted!';
        header("Location:../pages/categories.php");
    }
}

// edit categories
if(isset($_POST['eid_id']))
{   $id=$_POST['id'];
    $name=mysqli_real_escape_string($con,$_POST['name']);
    if(empty($name)){
        $_SESSION['error']='Enter Field Data!';
        header("Location:../pages/edit_categories.php?eid_id=$id");
    }
    else{
        $res=mysqli_query($con,"UPDATE categories SET name='$name' WHERE id='$id'");
        if($res){
            $_SESSION['success']="Update Category Successfully!";
            header("Location:../pages/categories.php");
        }
        else{
            header("Location:../pages/500.html");
        }
    
    }
}
?>
