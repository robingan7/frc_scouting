<?php
//error_reporting(E_ERROR | E_PARSE);
include 'lgs.inc.php';
//$output='hhh';

$con1 = mysqli_real_escape_string($conn, $_POST["con1"]);
$con2 = mysqli_real_escape_string($conn, $_POST["con2"]);
$con3 = mysqli_real_escape_string($conn, $_POST["con3"]);

$delimiter = ",";
$filename = "rankby";
$f = fopen('php://memory', 'w');    
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
        $filename.=" ".$value;
    }
}
$filename.=".csv";
array_push($final,"teamnumber", "speed", "weight", "height", "autopoints", "pickupspeed","climbplatform", "cargolevel", "hatchlevel", "automous", "totalcargo", "totalhatch", "cargolvl1", "cargolvl2", "cargolvl3", "hatchlvl1", "hatchlvl2", "hatchlvl3", "climbpoint", "cargoship", "hatchship", "autohatch", "autocargo");
fputcsv($f, $final, $delimiter);

$linedata=array();

 while($rows = mysqli_fetch_array($result))
 {
    foreach ($final as $col_name){
    array_push($linedata,$rows[$col_name]);
    }
    fputcsv($f, $linedata, $delimiter);
    $linedata=array();
 }
fseek($f, 0);
header('goo');
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');
 fpassthru($f);
 //echo $output;
}
exit;
?>