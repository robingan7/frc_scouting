<?php
require 'lgs.inc.php';
$output='';
if(isset($_POST["query"])){
$search = mysqli_real_escape_string($conn, $_POST["query"]);
$query = "SELECT * FROM teams WHERE teamnumber LIKE '%".$search."%'";
$result = mysqli_query($conn, $query);
$final=array();
array_push($final,"teamnumber", "speed", "weight", "height", "autopoints", "pickupspeed","climbplatform", "cargolevel", "hatchlevel", "automous", "totalcargo", "totalhatch", "cargolvl1", "cargolvl2", "cargolvl3", "hatchlvl1", "hatchlvl2", "hatchlvl3", "climbpoint", "cargoship", "hatchship", "autohatch", "autocargo");
if($search==""){
    
}
else{
if(mysqli_num_rows($result) > 0)
{
$output.='
 <tr>
        <th>Team Number</th>
        <th>Speed</th>
        <th>Weight</th>
        <th>Height</th>       
        <th>Total Auto Points</th>
        <th>Pickup Speed</th>0000
        <th>Platform Able To Climb</th>
        <th>Cargo Level Ability</th>
        <th>Hatch Level Ability</th>
        <th>Autonomous Ability</th>
        <th>Total Cargo Point</th>
        <th>Total Hatch Point</th>
        <th>Cargo Level 1</th>
        <th>Cargo Level 2</th>
        <th>Cargo Level 3</th>
        <th>Hatch Level 1</th>
        <th>Hatch Level 2</th>
        <th>Hatch Level 3</th>
        <th>Climb Plalform Points</th>
        <th>Cargo Cargoship Point</th>
        <th>Hatch Cargoship Point</th>
        <th>Hatch Autonomous Point</th>
        <th>Cargo Autonomous Point</th>
    </tr>
    ';
 while($rows = mysqli_fetch_array($result))
 {
    $output.='<tr>';
    foreach ($final as $col_name){
    //echo $col_name;
    $output .= ' 
    <th>'.$rows[$col_name].'</th>
  ';
    }
    $output.='</tr>';
 }
 echo $output;
}
else
{
 echo '<h2>Team Not Found</h2>
 <style>
 h2{
     text-align:center;
     font-size: 80px;
 }
 </style>';
}
}
}
?>