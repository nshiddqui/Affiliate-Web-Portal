<?php
session_start();
//connect to the database 
require "connection.php";

// check register form button clicked or not
    if(isset($_POST['login']))
    {
        // getting data from user
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $pwd=mysqli_real_escape_string($con,$_POST['pwd']);
        
        if(!empty($email)&&!empty($pwd))
        {
            $result=mysqli_query($con,"select * from users where email='$email'");
            if(mysqli_num_rows($result)>0)
            {
                $data=mysqli_fetch_array($result);
                $pwd_hash=$data['password'];
                // check pwd is correct or not
                $pwd=password_verify($pwd,$pwd_hash);
                if($pwd)
                {
                    // check user clicked on remember button
                    if(isset($_POST['remember']))
                    {
                        // set cookie for 1 year
                        setcookie('r_email',$email,time()+(60*60*24*365));
                        setcookie('r_pwd',$pwd,time()+(60*60*24*365));
                        
                        // checking type of user (admin,client ,customer)
                        $query=mysqli_query($con,"select * from users where email='$email' and password='$pwd_hash'");
                        if(mysqli_num_rows($query)>0)
                        {
                            $data=mysqli_fetch_array($query);
                            $user_type=$data['role'];
                            $_SESSION['user_email']=$email;
                            $_SESSION['role']=$user_type;
                            if($user_type==1){
                                // admin page   
                                header("Location:../pages/examples/admin.php");
                            }
                            else if($user_type==2){
                                // client
                                header("Location:../pages/examples/client.php");
                            }
                            else{
                                // customer
                                header("Location:../pages/examples/affiliate_user.php");
                            }
                        }
                        else{
                            header("Location:.500.html");
                        }
                    }
                    // when user not clicked on remember me checkbox
                    else{
                        // checking type of user (admin,client ,customer)
                        $query=mysqli_query($con,"select * from users where email='$email' and password='$pwd_hash'");
                        if(mysqli_num_rows($query)>0)
                        {
                            $data=mysqli_fetch_array($query);
                            $user_type=$data['role'];
                            $_SESSION['user_email']=$email;
                            $_SESSION['role']=$user_type;
                            if($user_type==1){
                                // admin page   
                                header("Location:../pages/examples/admin.php");
                            }
                            else if($user_type==2){
                                // client
                                header("Location:../pages/examples/client.php");
                            }
                            else if($user_type==3)
                            {
                                // customer
                                header("Location:../pages/examples/affiliate_user.php");
                            }
                         }
                         else{
                             header("Location:.500.html");
                         }
                    }
                    // end of else remember me checkbox
                    
                }
                else{
                    $_SESSION['error']="Incorrect Password!";  
                    header("Location:../pages/examples/login.php");  
                }
            }
            else{
                $_SESSION['error']="Invalid Email ID!";
                header("Location:../pages/examples/login.php");  
             }
        }
        else{
            $_SESSION['error']="All Field Are Mandetory !";
            header("Location:../pages/examples/login.php");  
        }
    }
?>  