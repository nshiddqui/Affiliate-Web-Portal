<?php
require"connection.php";
if(isset($_GET['search']))
{   
    $search=mysqli_real_escape_string($con,$_GET['search']);
    $result=mysqli_query($con,"select * from campaign where campaign_name  LIKE '%{$search}%' or campaign_category LIKE '%{$search}%' ") ;
    if($result){
        $count=mysqli_num_rows($result);
        if($count>0){
        $html="<table class='table striped table_notice highlight' >
        <tr>
        <th >ID</th>
        <th>Product Name</th>
        <th style='width:80px; text-wrap:wrap'>Product Price</th>
        <th style='width:100px;'>Status</th>
        <th style='width:200px;'>Product Description</th>
        <th style='width:100px;'>Product short description</th>
        <th style='width:100px;'>Product category</th>
        <th style='width:100px;'>Product sub category</th>
        <th style='width:100px;'>Product link</th>
        <th style='width:100px;'>Product image</th>
        <th style='width:100px;'>Product video</th>
        <th style='width:100px;'>Action</th>

        </tr>";
        $count=0;   
        while($data=mysqli_fetch_assoc($result)){
        //  print_r($data); 
        $count++;
        $html.= "<tr>
        <td id='allow_user'>
        <form method='GET' action='campaign.php' >
        <select name='allow_user' class='form-control'>";
        if($data['campaign_allow_user']){
        $html.="<option>$data[campaign_allow_user]</option> ";
        }
        else{
        $html.= "<option>Allow User</option> ";
        }
            $select=mysqli_query($con,"select email from users ");
            if($select)
            {
            foreach($select as $s ){
                $html.= "<option value='$s[email]'>$s[email]</option>";
            }
            }
            $html.="</select>
            <input type='hidden' name='id' value='$data[campaign_id]' >
            <input type='submit'class='mt-1 btn btn-info btn-sm' name='click_allow_user' value='Confirm'>
            
        </form>
        </td>
        <td data-label='Id' >$count</td>
        <td data-label='campaign_name' >$data[campaign_name]</td>
        <td data-label='campaign_price' >$data[campaign_price]</td>
        <td data-label='status' >$data[campaign_status]</td>
        <td data-label='campaign_desc'style='width:200px;text-wrap:wrap;' id='desc' >$data[campaign_desc]</td>
        <td data-label='campaign_short_desc' >$data[campaign_short_desc]</td>
        <td data-label='campaign_category'  >$data[campaign_category]</td>
        <td data-label='campaign_sub_category'  >$data[campaign_sub_category]</td>
        <td data-label='campaign_link'  >$data[campaign_link]</td>
        <td data-label='campaign_img' >";
        if($data['campaign_img']!=''){
            $html.="<img src='../../prd_media/$data[campaign_img]' widht='60px' height='60px' ></td>";
        }else{
           $html.="No Image uploaded </td>";
        }
        $html.="<td data-label='campaign_video'>";
        if($data['campaign_video']!=''){
            $html.="<video autoplay muted loop widht='100px' height='100px'><source src='../../prd_media/$data[campaign_video]' type='video/mp4'></video></td>";
        }else{
           $html.="No Video File </td>";
        }
        
        $html.="<td data-label='Action' >";
        if($data['campaign_status']!='complete'){
            $html.= "<a href='../../php/activate_and_deactivate_campaign.php?a_id=$data[campaign_id]' class='btn btn-primary btn-sm''>Activate</a>";
        }
        else{
           $html.="  <a href='../../php/activate_and_deactivate_campaign.php?d_id=$data[campaign_id] 'class='btn btn-info  btn-sm'>Deactivate</a>";
        }
          $html.="<a href='admin_edit_campaign.php?eid_id=$data[campaign_id]' ><i class='btn btn-primary btn-sm fas fa-edit text-white'></i></a>
          <a href='admin_edit_campaign.php?d_id=$data[campaign_id] '><i class='btn btn-danger btn-sm fas fa-trash-alt text-white'></i></a></td> ";
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