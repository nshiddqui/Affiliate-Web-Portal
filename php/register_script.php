<?php
session_start();
//connect to the database 
require "connection.php";

// check register form button clicked or not

if(isset($_POST['register_index']))
{
    $ref_code=$_POST['ref_code'];
    $first_name=mysqli_real_escape_string($con,$_POST['first_name']);
        $last_name=mysqli_real_escape_string($con,$_POST['last_name']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $mobile=$_POST['mobile'];
        $pwd=mysqli_real_escape_string($con,$_POST['pwd']);
        $confirm_pwd=mysqli_real_escape_string($con,$_POST['confirm_pwd']);
        
        //checking all field are not empty 
        if(!empty($first_name) &&!empty($last_name) &&!empty($email)&&!empty($mobile)&& !empty($pwd)&&!empty($confirm_pwd))
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
                    // checking password is matching or not
                    if($pwd==$confirm_pwd)
                    {
                        // getting data from user
                        $pwd=password_hash($pwd,PASSWORD_BCRYPT);

                        //create random refer_code
                        $combination_str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890".time();
                        $user_code="";
                        // str to array
                        $combination_str=str_split($combination_str,1);
                        $max=count($combination_str);
                        for($i=0;$i<8;$i++){
                            $temp=rand(0,$max);
                            $user_code.=$combination_str[$temp];
                        }
                        //checking refer code is get or not through get request
                        if($ref_code !=""){
                            $result=mysqli_query($con,"select * from users where user_code='$ref_code'");
                            if(mysqli_num_rows($result)>0){
                                    
                                $data=mysqli_fetch_array($result);
                                $refer_points=$data['referral_points']+10;
                                // update data 
                                $update=mysqli_query($con,"update users set referral_points ='$refer_points' where user_code='$ref_code' ");
                                if($update)
                                {
                                    //stored data into database
                                    $response=mysqli_query($con,"INSERT INTO USERS(first_name,last_name,email,password,mobile,referal_code,user_code) 
                                    VALUES('$first_name','$last_name','$email','$pwd','$mobile','$ref_code','$user_code') ");
                                    if($response)
                                    {
                                        $_SESSION['success']="Registeration Successfully Completed! Now You can Login!!";
                                        header("Location:../pages/examples/login.php");
                                    }
                                }
                            }
                        }
                        else{
                            //stored data into database
                            $response=mysqli_query($con,"INSERT INTO USERS(first_name,last_name,email,password,mobile,user_code) 
                            VALUES('$first_name','$last_name','$email','$pwd','$mobile','$user_code') ");
                            if($response)
                            {
                                $_SESSION['success']="Registeration Successfully Completed! Now You can Login!!";
                                header("Location:../pages/examples/login.php");
                            }
                        }
                    }
                    else{
                        $_SESSION['error']="Password Doesn't Match!";
                        header("Location:../pages/examples/register.php");
                        die();    
                    }
                }
            }
            else{
                $_SESSION['error']="Invalid Email ID!";
                header("Location:../pages/examples/register.php");
                die();
            }
        }
        else{
            $_SESSION['error']="Please Fill All the Field !";
            header("Location:../pages/examples/register.php");
            die();
        }
    }   
?>
