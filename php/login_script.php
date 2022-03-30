<?php
session_start();
//connect to the database 
require "connection.php";
// for otp
if(isset($_GET['otp'])){
    $otp=$_GET['otp'];
    $mobile=$_GET['mobile'];
    $check=mysqli_query($con,"select * from users where mobile='$mobile'");
    if(mysqli_num_rows($check)>0){
            
        $result=mysqli_query($con,"update users set otp='$otp' where mobile='$mobile'");
        if($result){
        $data="OTP is send to your number!"; // echo "insert";
        $status=true;
        $html=['status'=>$status,'data'=>$data];
        }
    }
    else{
        $data="Invalid Mobile Number";
        $status=false;
        $html=['status'=>$status,'data'=>$data];

        // $html={'status':false,'data':$data};
    }
    // echo $status;
    echo json_encode($html);
    // print_r($html);
}



// check register form button clicked or not
    if(isset($_POST['login']))
    {
        // getting data from user
        $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
        $otp=mysqli_real_escape_string($con,$_POST['otp']);
        
        if(!empty($mobile) && !empty($otp) )
        {
            $result=mysqli_query($con,"select * from users where mobile='$mobile'");
            if(mysqli_num_rows($result)>0)
            {
                $data=mysqli_fetch_array($result);
                $user_otp=$data['otp'];
                if($user_otp == $otp){
                    $user_type=$data['role'];
                    $_SESSION['mobile']=$mobile;
                    $_SESSION['user_email']=$data['email'];
                    $_SESSION['role']=$user_type;
                    if($user_type==1){
                        // admin page   
                        header("Location:../pages/admin_user.php");
                    }
                    else{
                        // affiliate page
                        header("Location:../pages/affiliate_index.php");
                    }
                }
                else{
                    $_SESSION['error']="Invalid OTP !";  
                    header("Location:../pages/login.php"); 
                }
            }
            else{
                $_SESSION['error']="Invalid Mobile Number!";  
            header("Location:../pages/login.php");  
            }
         }
        else{
            $_SESSION['error']="Please enter data!";  
            header("Location:../pages/login.php");  
        }
    }
?>  