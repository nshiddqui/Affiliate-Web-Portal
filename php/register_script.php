<?php
session_start();
//connect to the database 
require "connection.php";


// check register form button clicked or not

if(isset($_POST['register_index']))
{
    $first_name=mysqli_real_escape_string($con,$_POST['first_name']);
    $last_name=mysqli_real_escape_string($con,$_POST['last_name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $mobile=$_POST['mobile'];
    $otp=$_POST['otp'];
    $aadhar_no=mysqli_real_escape_string($con,$_POST['aadhar_no']);
    $pan_no=mysqli_real_escape_string($con,$_POST['pan_no']);
    $aadhar=$_FILES['aadhar_file'];
    $pan=$_FILES['pan_file'];
    //checking all field are not empty 
    if(!empty($first_name) &&!empty($last_name) &&!empty($email)&&!empty($mobile)&& !empty($pan_no)&&!empty($aadhar_no) && !empty($aadhar) && !empty($pan))
    {
        // checking email is valid or not
        $email=filter_var($email,FILTER_VALIDATE_EMAIL);
        if($email){
            // checking email is already register or not in the database
            $result=mysqli_query($con,"select * from users where email='$email'");
            if(mysqli_num_rows($result)>0){
                $_SESSION['error']="Your Email ID Already Register !";
            }
            
            else
            {
                //checking mobile is already register or not in the database
               $re=mysqli_query($con,"select * from users where mobile='$mobile'");
                if(mysqli_num_rows($re)>0){
                    $_SESSION['error']="Your Mobile Number Already Register !";
                }
                else
                {
                    // checking otp is correct or not 
                    
                    // aadhar document upload
                    $aadhar_file=$aadhar['name'];
                    if(!file_exists('../kyc_doc/'.$aadhar_file))
                    {
                    move_uploaded_file($aadhar['tmp_name'],'../kyc_doc/'.$aadhar_file);
                    }
                    else{
                    $rand=rand('11','999999999999');
                    $aadhar_file=$rand."_".$aadhar_file;
                    move_uploaded_file($aadhar['tmp_name'],'../kyc_doc/'.$aadhar_file);
                    }
                    // pan document upload
                    $pan_file=$pan['name'];
                    if(!file_exists('../kyc_doc/'.$pan_file))
                    {
                    move_uploaded_file($pan['tmp_name'],'../kyc_doc/'.$pan_file);
                    }
                    else{
                    $rand=rand('11','999999999999');
                    $pan_file=$rand."_".$pan_file;
                    move_uploaded_file($pan['tmp_name'],'../kyc_doc/'.$pan_file);
                    }
                    //stored data into database
                    $response=mysqli_query($con,"INSERT INTO USERS(first_name,last_name,email,mobile,otp,aadhar_no,pan_no,aadhar_file,pan_file) 
                    VALUES('$first_name','$last_name','$email','$mobile','$otp','$aadhar_no','$pan_no','$aadhar_file','$pan_file') ");
                    if($response)
                    {
                        $_SESSION['success']="Registeration Successfully Completed! Now You can Login!!";
                        header("Location:../pages/login.php");
                    }
                }
            }
        }
        else{
            $_SESSION['error']="Invalid Email ID!";
            header("Location:../pages/register.php");
            die();
        }
    }
    else{
        $_SESSION['error']="Please Fill All the Field !";
        header("Location:../pages/register.php");
        die();
    }
}   
?>
