<?php
error_reporting(E_ERROR | E_PARSE);
require 'lgs.inc.php';
$output='';
$ros=2;
if(isset($_POST["con1"]) || isset($_POST["con2"]) || isset($_POST["con3"])){
$con1 = mysqli_real_escape_string($conn, $_POST["con1"]);
$con2 = mysqli_real_escape_string($conn, $_POST["con2"]);
$con3 = mysqli_real_escape_string($conn, $_POST["con3"]);

if($con1==""){
    $con1="nothing";
}
if($con2==""){
    $con2="nothing";
}
if($con3==""){
    $con3="nothing";
}
$query = "SELECT * FROM teams ORDER BY `teams`.`$con1` DESC, `$con2` DESC, `$con3` DESC;";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
$datas=array($con1,$con2,$con3);
$final=array();
foreach ($datas as $value){
    if($value!="nothing"){
        array_push($final,$value);
    }
}
array_push($final,"teamnumber", "speed", "weight", "height", "autopoints", "pickupspeed","climbplatform", "cargolevel", "hatchlevel", "automous", "totalcargo", "totalhatch", "cargolvl1", "cargolvl2", "cargolvl3", "hatchlvl1", "hatchlvl2", "hatchlvl3", "climbpoint", "cargoship", "hatchship", "autohatch", "autocargo");
$output.='<tr>';
foreach ($final as $value){
    if($value=="teamnumber"){
        $output.='
    <th class="lock">--------------- Team Number</th>';  
    }else if($value=="speed"){
         $output.='
    <th class="normal">Speed</th>';   
    }else if($value=="weight"){
         $output.='
    <th class="normal">Weight</th>';   
    }else if($value=="height"){
         $output.='
    <th class="normal">Height</th>';   
    }else if($value=="autopoints"){
         $output.='
    <th class="normal"> Total Autonomous Point</th>';   
    }else if($value=="pickupspeed"){
         $output.='
    <th class="normal">Pickup Speed</th>';   
    }
    else if($value=="climbplatform"){
         $output.='
    <th class="normal">Platform Able To Climb</th>';   
    }else if($value=="cargolevel"){
         $output.='
    <th class="normal">Cargo Level</th>';   
    }else if($value=="hatchlevel"){
         $output.='
    <th class="normal">Hatch Level</th>';   
    }else if($value=="automous"){
         $output.='
    <th class="normal">Automonous Ability</th>';   
    }else if($value=="totalcargo"){
         $output.='
    <th class="normal">Total Cargo Point</th>';   
    }else if($value=="totalhatch"){
         $output.='
    <th class="normal">Total Hatch Point</th>';   
    }else if($value=="cargolvl1"){
         $output.='
    <th class="normal">Cargo Level 1</th>';   
    }else if($value=="cargolvl2"){
         $output.='
    <th class="normal">Cargo Level 2</th>';   
    }else if($value=="cargolvl3"){
         $output.='
    <th class="normal">Cargo Level 3</th>';   
    }else if($value=="hatchlvl1"){
         $output.='
    <th class="normal">Hatch Level 1</th>';   
    }else if($value=="hatchlvl2"){
         $output.='
    <th class="normal">Hatch Level 2</th>';   
    }else if($value=="hatchlvl3"){
         $output.='
    <th class="normal">Hatch Level 3</th>';   
    }else if($value=="climbpoint"){
         $output.='
    <th class="normal">Climb Platform Point</th>';   
    }else if($value=="cargoship"){
         $output.='
    <th class="normal">Cargo Cargoship Point</th>';   
    }else if($value=="hatchship"){
         $output.='
    <th class="normal">Hatch Cargoship Point</th>';   
    }else if($value=="autohatch"){
         $output.='
    <th class="normal">Auto Hatch Point</th>';   
    }else if($value=="autocargo"){
         $output.='
    <th class="normal">Auto Cargo Point</th>';   
    }else if($value=="hatchship"){
         $output.='
    <th class="normal">Hatch Cargoship</th>';   
    }
    
}

$output.='</tr>';
 while($rows = mysqli_fetch_array($result))
 {
    $output.='<tr>';
    foreach ($final as $col_name){
    if($col_name=="teamnumber"){
        $output .= ' 
    <th class="lock">'.$rows[$col_name].'</th>
  ';
  $tnum=$rows[$col_name];

  $sq="SELECT * FROM matchperformance WHERE teamnumber='$tnum';";

  $sqresult=mysqli_query($conn,$sq);
  $ros=mysqli_num_rows($sqresult);
    }
    else{
     $in=(integer)$rows[$col_name]/$ros;
     //$in=$ros;
     //$in=$rows[$col_name]/1;
    $output .= ' 
    <th class="normal">'.$in.'</th>
  ';
    }
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
 }
 </style>';
}
}

?>