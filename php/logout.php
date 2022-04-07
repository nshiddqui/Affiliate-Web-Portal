<?php
session_start();
if(isset($_SESSION['role'] )&& isset($_SESSION['role'])== 1)
{
    session_destroy();
    session_unset();
    header("Location:../admin.php");
}
else{
    session_destroy();
    session_unset();
    header("Location:../pages/login.php");
}


?>