<?php
    session_start();
    if(!isset($_SESSION['role'])!='1'){
        header("Location:login.php");
    }
    require "../../php/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../plugins/bootstrap/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password change</title>
</head>
<style>
    #name,#pwd,#email{
        background: rgb(207, 207, 32);     
    }
    .small{
        color:rgba(0,0,0,.4);
        font-size:11px;
    }
</style>
<body class="grey lighten-3">
    
    <div class="container mt-2 ">
        <h3>Change Password</h3>

        <?php
        // require("php/connection.php");
        $response=mysqli_query($con,"select * from users where role='1'");
        if(mysqli_num_rows($response)>0){
            $data=mysqli_fetch_assoc($response);
            $id=$data['id'];
        }
        ?>
             <!--  error message -->
             <?php 
                    if(isset($_SESSION['error'])){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                        <strong>Error </strong>
                        <?php
                            echo $_SESSION['error'];
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['error']);
                    }
                    // success message
                    if(isset($_SESSION['success'])){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                        <strong>Success </strong>
                        <?php
                            echo $_SESSION['success'];
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['success']);
                }
                ?>
        <br>
       <div class="container">
       <form action="../../php/change_admin_pwd.php" method="POST" class="form_btn " enctype="multipart/form-data">
       <label for="role">Role</label>
       <div class="input-group mb-3">
          <input type="text" class="form-control"readonly  id="role"value="<?php echo $data['role'];?>"name="role" placeholder="Role">
        </div>
        
        <label for="f">First Name</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="f"readonly value="<?php echo $data['first_name'];?>"name="u_first" placeholder="Admin Name">
        </div>
        
        <label for="l">Last Name</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="l"readonly value="<?php echo $data['last_name'];?>"name="u_last" placeholder="Last name">
        </div>

        <label for="email">Email</label>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email"readonly value="<?php echo $data['email'];?>"name="email" placeholder="Email">
        </div>
        
        <label for="tel">Mobile No.</label>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" id="tel"readonly value="<?php echo $data['mobile'];?>"name="tel" placeholder="Mobile No.">
        </div>
        
        <label for="pwd">Password</label>
        <small>password is stored in encrypted form</small>
        <div class="input-group mb-3">
            <input type="password" class="form-control btn btn-warning text-left"readonly  id="pwd"value="<?php echo $data['password'];?>"name="pwd" placeholder="Password">
        </div>
        <label for="pwdd">New Password</label>
        <div class="input-group mb-3">
            <input type="password" class="form-control " name="new_pwd" placeholder="New Password">
        </div>
        <?php
        if($data['img']!=""){
            ?>
            <img src="user/<?php echo $data['img'];?>" alt="" width='100' height='100'>
            <?php
        }
        ?>
       <input type="hidden" name="old_img" value="<?php echo $data['img'];?>" id="">
        <div class="input-group mb-3">
            Add Image
            <input type="file" class="form-control"id="file" name="img"/>
        </div>
       
        <input type="submit" name="change_pwd" class="btn btn-primary"value="Change Password" />
            </form>
       </div>
        </div>
    </div>
</body>
</html>
