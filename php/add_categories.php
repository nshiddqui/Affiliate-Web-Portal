<?php

?>
<?php
require("connection.php");
session_start();

if(isset($_POST['category']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
        $insert=mysqli_query($con,"INSERT into categories(name) VALUES('$name')");
        if($insert){
            $_SESSION['success']="Sucessfully Add new Category";
            header("Location:../pages/categories.php");
        }
header("Location:../pages/categories.php");
}


?>