<?php
require"connection.php";
if(isset($_GET['search']))
{   
    $search=mysqli_real_escape_string($con,$_GET['search']);
    $result=mysqli_query($con,"select * from campaigns where name  LIKE '%{$search}%' or category_id LIKE '%{$search}%' ") ;
    if($result){
        $count=mysqli_num_rows($result);
        if($count>0){
        $html="<table class='table table-bordered highlight' >
        <tr>
        <th >SNO.</th>
        <th>Name</th>
        <th style='width:100px;'>Status</th>
        <th style='width:100px;'>Category</th>
        <th style='width:300px;'>Link</th>
        <th style='width:100px;'>Video</th>
        <th style='width:100px;'>Action</th>
        </tr>";
        $count=0;   
        
        while($data=mysqli_fetch_assoc($result)){
            $category_id=$data['category_id'];
            $catergory_res=mysqli_query($con,"select name from categories where id='$category_id'");
            $category_id_name="";
            if(mysqli_num_rows($catergory_res)>0){
            $category_data=mysqli_fetch_assoc($catergory_res);
            $category_id_name=$category_data['name'];
            }
        $count++;
        $html.="<tr>
        <td  >$count</td>
        <td  >$data[name]</td>
        <td class=''>$data[status]</td>
        <td  >$category_id_name</td>
        <td   >$data[link]</td>
        <td >";
        if($data['video']!=''){
            $html.="<video autoplay muted loop widht='100px' height='100px'><source src='../prd_media/$data[video]' type='video/mp4'></video></td>";
        }else{
           $html.="No Video File </td>";
        }
        
        $html.="<td data-label='Action' >";
        if($data['status']!='complete'){
            $html.= "<a href='../php/activate_and_deactivate_campaign.php?a_id=$data[id]' class='btn btn-primary btn-sm''>Activate</a>";
        }
        else{
           $html.="  <a href='../php/activate_and_deactivate_campaign.php?d_id=$data[id] 'class='btn btn-info  btn-sm'>Deactivate</a>";
        }
          $html.="<a href='edit_campaign.php?eid_id=$data[id]' ><i class='btn btn-primary btn-sm fas fa-edit text-white'></i></a>
          <a href='../php/edit_campaign_script.php?d_id=$data[id] '><i class='btn btn-danger btn-sm fas fa-trash-alt text-white'></i></a></td> ";
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
header("Location:campaign.php");
}    
?>