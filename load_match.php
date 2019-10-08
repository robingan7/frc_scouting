<?php
error_reporting(E_ERROR | E_PARSE);
require 'lgs.inc.php';
$output='';

if(isset($_POST["con1"]) || isset($_POST["con2"]) || isset($_POST["con3"])){
$con1 = mysqli_real_escape_string($conn, $_POST["con1"]);
$con2 = mysqli_real_escape_string($conn, $_POST["con2"]);
$con3 = mysqli_real_escape_string($conn, $_POST["con3"]);
//$query = "SELECT * FROM matchperformance ";

//$query = "SELECT * FROM matchperformance WHERE teamnumber="$con1' AND region="$con2"";
if($con1=="nothing" and $con2=="nothing"){
    $query = "SELECT * FROM matchperformance WHERE matchnumber='$con3';";
}
else if($con1=="nothing" and $con3=="nothing"){
    $query = "SELECT * FROM matchperformance WHERE region='$con2';";
}
else if($con3=="nothing" and $con2=="nothing"){
    $query = "SELECT * FROM matchperformance WHERE teamnumber='$con1';";
}
else if($con3=="nothing"){
    $query = "SELECT * FROM matchperformance WHERE teamnumber='$con1' AND region='$con2';";
}
else if($con2=="nothing"){
    $query = "SELECT * FROM matchperformance WHERE teamnumber='$con1' AND matchnumber='$con3';";
}
else if($con1=="nothing"){
    $query = "SELECT * FROM matchperformance WHERE region='$con2' AND matchnumber='$con3';";
}
else{
    $query = "SELECT * FROM matchperformance WHERE teamnumber='$con1' AND region='$con2' AND matchnumber='$con3';";
}

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
$final=array();
array_push($final,"matchnumber", "teamnumber","region", "alliance", "numberOfHatch", "numberOfCargo", "autopoint","climbpoint", "cargolvl1", "cargolvl2", "cargolvl3", "hatchlvl1", "hatchlvl2", "hatchlvl3", "cargoship", "hatchship", "autohatch", "autocargo");
$output.='<tr>
<th class="lock2">---------Match Number</th>
<th class="lock2">----------Team Number</th>
<th class="lock2">--------------------Region</th>
<th>Alliance</th>
<th>Total Cargo Point</th>
<th>Total Hatch Point</th>
<th>Total Auto Point</th>
<th>Climb Point</th>
<th>Cargo Level 1(Point)</th>
<th>Cargo Level 2</th>
<th>Cargo Level 3</th>
<th>Hatch Level 1</th>
<th>Hatch Level 2</th>
<th>Hatch Level 3</th>
<th>Cargo Cargoship Point</th>
<th>Hatch Cargoship Point</th>
<th>Number of Auto-Hatch</th>
<th>Number of Auto-Cargo</th>
</tr>
';

 while($rows = mysqli_fetch_array($result))
 {
    $output.='<tr>';
    foreach ($final as $col_name){
    if($rows[$col_name]=="Orange_County"){
        $output .= ' 
    <th class="lock2">OC</th>
  ';
    }
    else if($col_name=="teamnumber" || $col_name=="matchnumber" || $col_name=="region"){
         $output .= ' 
    <th class="lock2">'.$rows[$col_name].'</th>
  ';
    }
    
    //echo $col_name;
    else{
    $output .= ' 
    <th>'.$rows[$col_name].'</th>
  ';
    }
    }
    $output.='</tr>';
 }
}
else
{
 echo '<h2>Match Not Found</h2>
 <style>
 h2{
     text-align:center;
 }
 </style>';
}
 //$output.= '<th>'.$con1.$con2.$con3.'</th>';
 echo $output;
}
?>
