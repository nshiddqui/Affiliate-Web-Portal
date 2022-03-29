<?php

session_start();
require "connection.php";

if(isset($_POST['add_btn'])){
    $user_id=$_POST['user_id'];
    $campaign_id=$_POST['campaign_id'];
    $first_name=mysqli_real_escape_string($con,$_POST['first_name']);
    $last_name=mysqli_real_escape_string($con,$_POST['last_name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    
    if(empty($first_name) || empty($last_name) || empty($email) || empty($mobile)){
        $_SESSION['error']='Please fill all the field!';
        header('Location:../pages/campaign_form.php');
        die();

    }else{
        // store client ip in ip variable
        $ip=get_client_ip();
        $res=mysqli_query($con,"INSERT INTO campaign_form (first_name,last_name,email,mobile,ip,campaign_id,user_id) VALUES('$first_name','$last_name','$email','$mobile','$ip','$campaign_id','$user_id')");
        if($res){
            $_SESSION['success']='form submited!';
            $link=mysqli_query($con,"select link from campaigns where id='$campaign_id'");
            if(mysqli_num_rows($link)>0){
                $data=mysqli_fetch_assoc($link);
                header("Location:$data[link]");
                die();
            }
        }

    }

}



// function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}




?>