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
            <tr >
            <th >ID</th>
            <th>Product Name</th>
            <th style='width:80px; text-wrap:wrap'>Product Price</th>
            <th style='width:100px;'>Status</th>
            <th style='width:100px;'>Product Description</th>
            <th style='width:100px;'>Product short description</th>
            <th style='width:100px;'>Product category</th>
            <th style='width:100px;'>Product sub category</th>
            <th style='width:100px;'>Product link</th>
            <th style='width:100px;'>Product image</th>
            <th style='width:100px;'>Product video</th>
            <th style='width:100px;'>Action</th>

            </tr>";
             $count=0;   
            while($data=mysqli_fetch_assoc($response)){
            //  print_r($data); 
            $count++;
            $html.="<tr>
            <td data-label='Id' >$count</td>
            <td data-label='campaign_name' >$data[campaign_name]</td>
            <td data-label='campaign_price' >$data[campaign_price]</td>
            <td data-label='status' >$data[campaign_status]</td>
            <td data-label='campaign_desc'  >$data[campaign_desc]</td>
            <td data-label='campaign_short_desc' >$data[campaign_short_desc]</td>
            <td data-label='campaign_category'  >$data[campaign_category]</td>
            <td data-label='campaign_sub_category'  >$data[campaign_sub_category]</td>
            <td data-label='campaign_link'  >$data[campaign_link]</td>
            <td data-label='campaign_img'  >$data[campaign_img]</td>
            <td data-label='campaign_video'  >$data[campaign_video]</td>


            <td data-label='Action' >
            <a href='../../php/activate_and_deactivate_campaign.php?a_id=$data[id]' class='btn-primary'>Activate</a>

              <a href='../../php/activate_and_deactivate_campaign.php?d_id=$data[id] 'class='btn-primary '>Deactivate</a></td> ";
            echo"</tr>";
            }
        $html.="</table>";
        // convert data into json formate 
        print json_encode( $html);
     }
    else{
        $html="<h4>No Record Found!</h4>";
        print json_encode($html);     
    }
    }
}
else{
header("Location:campaign.php");
}    
?>