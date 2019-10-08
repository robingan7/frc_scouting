<?php
error_reporting(E_ERROR | E_PARSE);
require 'lgs.inc.php';
$output="";

if(isset($_POST["con1"]) || isset($_POST["con2"]) || isset($_POST["con3"])){
$con1 = mysqli_real_escape_string($conn, $_POST["con1"]);
$con2 = mysqli_real_escape_string($conn, $_POST["con2"]);
$con3 = mysqli_real_escape_string($conn, $_POST["con3"]);
$data1="";
$data2="";
if($con1=="nothing" && $con2=="nothing" && $con3=="nothing"){
    $output="Fill out all select";
}
else{
$query = "SELECT * FROM matchperformance WHERE teamnumber='$con1' and region='$con2' ORDER BY `matchperformance`.`matchnumber` ASC ;";
$result=mysqli_query($conn, $query);
$result2=mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
		$data1 = $data1 . '"'. $row[$con3].'",';
}

while ($row2 = mysqli_fetch_array($result2)) {
		$data2 = $data2 . '"Match '. $row2["matchnumber"].'",';
}

$data1 = trim($data1,",");   
$data2=trim($data2,","); 
//$output=$data2;
$output='

<div class="chart-container" style="height:80vh; width:50vw">    
<canvas id="myChart2"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart2").getContext("2d");
var myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: ['.$data2.'],
        datasets: [{
            label: "'.$con1." ".$con2." ".$con3.'",
            data: ['.$data1.'],
            backgroundColor:  "rgba(153, 102, 255, 1)",
            borderColor:"rgba(54, 162, 235, 1)",
            borderWidth: 2,
            pointBackgroundColor:"yellow"
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>';
}
echo $output;
}
?>