<?php
require"connection.php";
if(isset($_GET['search']))
{   
    $search=mysqli_real_escape_string($con,$_GET['search']);
    $result=mysqli_query($con,"select * from users where first_name  LIKE '%{$search}%' or email LIKE '%{$search}%' ") ;
    if($result){
        $count=mysqli_num_rows($result);
        if($count>0){
        $html="<table class='table table-bordered highlight mt-4' >
        <tr>
        <th >ID</th>
        <th>First Name</th>
        <th style='width:80px; text-wrap:wrap'>Last Name</th>
        <th style='width:100px;'>Email ID</th>
        <th style='width:100px;'>Status</th>
        <th style='width:100px;'>Total  Points</th>
        <th style='width:100px;'>Current Point</th>
        <th style='width:100px;'>Point Rate</th>
        <th style='width:200px;'>Created</th>
        <th style='width:100px;'>Action</th>
        </tr>";
         $count=0;   
        while($data=mysqli_fetch_assoc($result)){
        $count++;
        $html.="<tr>
        <td data-label='Id' >$data[id]</td>
        <td data-label='first_name' >$data[first_name]</td>
        <td data-label='last_name' >$data[last_name]</td>
        <td data-label='email'  >$data[email]</td>
        <td >$data[status]</td>
        <td data-label='referral_points' >$data[total_points]</td>
        <td data-label='user_code'  >$data[current_point]</td>
        <td data-label='refer_code'  >$data[point_rate]</td>
        <td data-label='Time'  >$data[created]</td>
        <td data-label='Action' >
            ";
        if($data['status']!='complete'){
            $html.= "<a href='../php/activate_and_deactivate_user.php?a_id=$data[id]' class='btn btn-primary btn-sm'><i class='fas fa-person-circle-check'>Activate</i></a>";
            }
            else{
                $html.= "<a href='../php/activate_and_deactivate_user.php?d_id=$data[id] 'class='btn btn-danger btn-sm'><i class='fas fa-person-circle-xmark'></i>Deactivate</a></td> ";
            }
            $html.="</tr>";
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
header("Location:../pages/admin_user.php");
}    
?>