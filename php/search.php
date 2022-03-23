<?php
require"connection.php";
if(isset($_GET['search']))
{   
    $search=mysqli_real_escape_string($con,$_GET['search']);
    $result=mysqli_query($con,"select * from users where first_name  LIKE '%{$search}%' or email LIKE '%{$search}%' ") ;
    if($result){
        $count=mysqli_num_rows($result);
        if($count>0){
        $html="<table class='table striped table_notice highlight' >
            <tr >
                <th >ID</th>
                <th>First Name</th>
                <th style='width:80px; text-wrap:wrap'>Last Name</th>
                <th style='width:100px;'>Email ID</th>
                <th style='width:100px;'>Status</th>
                <th style='width:100px;'>Referral Points</th>
                <th style='width:100px;'>User Code</th>
                <th style='width:100px;'>Referral Code</th>
                <th style='width:100px;'>Time</th>
                <th style='min-width:70px;'>Action</th>
                </tr>";
        while($data=mysqli_fetch_assoc($result)){
            $html.="<tr>
                        <td data-label='ID'  >$data[id]</td>
                        <td data-label='first_name' >$data[first_name]</td>
                        <td data-label='last_name' >$data[last_name]</td>
                        <td data-label='email'  >$data[email]</td>
                        <td data-label='Title' >$data[status]</td>
                        <td data-label='referral_points' >$data[referral_points]</td>
                        <td data-label='user_code'  >$data[user_code]</td>
                        <td data-label='refer_code'  >$data[referal_code]</td>
                        <td data-label='Time'>$data[created]</td>
                        <td data-label='Action'>
                        ";
                    if($data['status']!='complete'){
                        echo "<a href='../../php/activate_and_deactivate_user.php?a_id=$data[id]' class='btn btn-primary btn-sm'><i class='fas fa-person-circle-check'>Activate</i></a>";
                        }
                        else{
                        echo "<a href='../../php/activate_and_deactivate_user.php?d_id=$data[id] 'class='btn btn-danger btn-sm'><i class='fas fa-person-circle-xmark'></i>Deactivate</a></td> ";
                        }
                        echo"</tr>";
            }
        $html.="</table>";
         echo $html;
     }
    else{
        $html="<h4>No Record Found!</h4>";
        echo $html;     
        }
    }
}
else{
header("Location:admin_panel.php");
}    
?>