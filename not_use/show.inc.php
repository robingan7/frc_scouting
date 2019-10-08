<?php
if (isset($_POST['1'])) {
  header("Location: ../lunchweb/loginpage.php");
  exit();
}
if (isset($_POST['editteam'])) {

  
  //require 'periods.inc.php';
  require 'lgs.inc.php';

  
$teamnumber = $_POST['editteam'];

$sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    
      header("Location: ../lunchweb/robotweb/index.php?error=sqlerror");
      exit();
    }

      else {
$sql6="SELECT * FROM teams WHERE teamnumber=$teamnumber;";
$result4 = mysqli_query($conn,$sql6);
$row2 = mysqli_fetch_assoc($result4);
  echo '
  <style>
        #editteaminfo{
            top:50%; /*50%*/
    left:50%;
    background:rgb(179, 26, 158);
    position: absolute;
    width:70%;
    height:66%;
    border: 2px solid white;
    overflow-y: scroll;
    margin-left: -35%;/*-500px;*/
    transition:.2s;
    margin-top:-230px;
   
        }
        img[alt="www.000webhost.com"] {
            display: none;
        }
  </style>
  <head>
        <title>HOME</title>
    <link rel="shortcut icon" href="ricon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
  </head>
  <div id="editteaminfo">

                <div class="toggle-btn" onclick="toggleEditTeam()">
                    <i class="fas fa-times-circle"></i>
                </div>
                <form action="edit.inc.php" method="post" enctype="multipart/form-data">
                    <h4>Team Number</h4>
                   
                    <input type="text" name="teamnumber" value='.$row2['teamnumber'].' readonly><br>
                    <a href="mailto:gzt11111@gmail.com?subject=(old number) to (new number)">Click Here to Change Team Number</a>
                    <hr>
                    <h4>Height</h4>
                    <input type="text" name="height" value='.$row2['height'].'>
                    <hr>
                    <h4>Weight</h4>
                    <input type="text" name="weight" value='.$row2['weight'].'>
                    <hr>
                    <h4>Image</h4>
                    <input type="file" name="image">
                    <img src="data:'.$row2['imagetype'].';base64,'.base64_encode($row2["image"]).'"width="200"/>
                    <hr>
                    <h4>Speed</h4>
                    <input type="text" name="speed" value='.$row2['speed'].'>
                    <hr>
                    <h4>Match Number</h4>
                    <input type="text" name="matchnumber" value='.$row2['matchnumber'].'>
                    <hr>
                    <h4>Autopoints</h4>
                    <input type="text" id="autopoints" name="autopoints" value='.$row2['autopoints'].'> 
                    <br>
                    
                    <hr>
                    <h4>Tele points</h4>
                    <input type="text" name="teleboxes" value='.$row2['teleboxes'].'>
                    <hr>
                    <h4>Pickup Speed</h4>
                    <input type="text" name="pickupspeed" value='.$row2['pickupspeed'].'>
                    <hr>
                    <h4>Password</h4>
                    <input type="text" name="password"  placeholder="Enter password for editing info"  value="">
                    <hr>
                    <input value="SAVE" type="submit" name="save">
                    
                </form>
            </div>';
 }
}
 