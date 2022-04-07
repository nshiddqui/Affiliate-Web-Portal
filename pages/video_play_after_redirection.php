<?php
session_start();
if(!isset($_GET['video']) && !isset($_GET['user_id']) && !isset($_GET['campaign_id'])){
    $_SESSION['error']='Something Went Wrong!';
    header("Location:affiliate_home_user.php");
    die();
}

$video=$_GET['video'];
$user_id=$_GET['user_id'];
$campaign_id=$_GET['campaign_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Play</title>
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- bootstrap link -->
  <link rel="stylesheet" href="../plugins/bootstrap/css.css">
</head>
<body>
    <div class="container center">
        <div class="bg-info mt-4 p-2">
            <p id='info'>Your are redirected after video finished</p>
        </div>
        <video autoplay="autoplay"  unmuted controls width='100%' height='100%' id='video' onended="redirect()" ><source  src='../prd_media/<?php echo $video;?>' type='video/mp4'></video>
    </div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    // page redirection function
    function redirect(){

        window.location.href='campaign_form.php?user_id=<?php echo $user_id;?>&campaign_id=<?php echo $campaign_id;?>&video=<?php echo $video;?>';        
    }

    // logic for user not seek video time
    var v=document.querySelector('#video');
    // v.play();
    var vv=v.currentTime;
        // v.addEventListener('seeking',(e)=>{
        //     if(e['isTrusted']){
        //         if(vv < e['path'][0]['currentTime']){
        //             e['path'][0]['currentTime']=vv;
        //             e['isTrusted']=false;

        //         }
        //     }
        // })
</script>
</body>
</html>
