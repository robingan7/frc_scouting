<?php
require 'lgs.inc.php';
$output='';
if(isset($_POST["searchValue"])){
$search = mysqli_real_escape_string($conn, $_POST["searchValue"]);
$query = "SELECT * FROM teams WHERE teamnumber LIKE '%".$search."%'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  
    <tr>
        <th>Team Number</th>
        <th>Match Number</th>
        <th>Auto Points</th>
        <th>Tele Points</th>
        <th>Pick Up Speed</th>
        <!--<th><button name="alldetail" onclick="toggleDetail()">View Detail</button></th>-->
        <th>Image</th>
        <th>Speed</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Standing</th>
                    
    </tr>
 ';
 while($rows = mysqli_fetch_array($result))
 {
  $output .= '
   <tr >
    <th>'.$rows['teamnumber'].'</th>
    <th>'.$rows['matchnumber'].'</th>
    <th>'.$rows['autopoints'].'</th>
    <th>'.$rows['teleboxes'].'</th>
    <th>'.$rows['pickupspeed'].'</th>
    <th>'.$rows['image'].'</th>
    <th>'.$rows['speed'].'</th>
    <th>'.$rows['height'].'</th>
    <th>'.$rows['weight'].'</th>
    <th>'.$rows['standing'].'</th>    
</tr>
  ';
 }
 echo $output;
}
else
{
 echo '<h2>Team Not Found</h2>
 <style>
 h2{
     text-align:center;
 }
 </style>';
}
}
?>