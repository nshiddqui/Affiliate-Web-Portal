<?php
session_start();
if(!isset($_COOKIE['vist'])){
    setcookie('vist','yes',time()+(60*60*24*30));
    require("php/connection.php");
    $count=5;
    echo $count;
    echo "djfskd";
    // die();
    $result=mysqli_query($con,"update visted set vist_count='$count' where vist_location='website'");
    if($result){
        setcookie('vist','yes',time()-60);
        echo "vist";
        die();
    }
    else{
        echo"error";
        die();
    }
}


if (isset($_GET['refer']) || isset($_SESSION['refer'])){
    $refer=$_GET['refer'];
    if($refer=="")
    {
        $refer=$_SESSION['refer'];
    }
    else
        $_SESSION['refer']=$refer;
    header("Location:pages/examples/register.php?refer=$refer");
    die();
}
?>