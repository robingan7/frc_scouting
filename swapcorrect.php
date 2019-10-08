<?php
 require 'lgs.inc.php';

$teamnumber = $_POST['editteam'];

$sql6 = "SELECT * FROM teams;";
//$stmt = mysqli_stmt_init($conn);
$result4 = mysqli_query($conn,$sql6);
$row2 = mysqli_fetch_assoc($result4);

$plaformlvl=$row2['pickupspeed'];
$hatchlvl=$row2['climbplatform'];
$pickupspeed=$row2['hatchlevel'];

$upda="UPDATE `teams` SET `pickupspeed`=$pickupspeed,`climbplatform`=$plaformlvl,`hatchlevel`=$hatchlvl;";

//pickupspeed, climbplatform, hatchlevel
//$platformlevel,$hatchlevel,$pickupspeed
?>