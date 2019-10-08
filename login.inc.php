<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['signup-submit2'])) {
$mailuid = $_POST['username'];
$password = $_POST['password'];   
 
  require 'lgs.inc.php';
  //require 'periods.inc.php';
  

  if (empty($mailuid) || empty($password)) {
    header("Location: ../robotweb/index.php?error=emptyfields&mailuid");
    exit();
  }
  else {

    
    $sql = "SELECT * FROM users WHERE teamnumber=? OR password2=?;";
    
    $stmt = mysqli_stmt_init($conn);
   
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
      header("Location: ../robotweb/index.php?error=sqlerror");
      exit();
    }
    else {

      
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password);
      
      mysqli_stmt_execute($stmt);
     
      $result = mysqli_stmt_get_result($stmt);
      
      if ($row = mysqli_fetch_assoc($result)) {
        
        $pwdCheck = password_verify($password, $row['password2']);
        // $pwdCheck = true;
        if ($password==$row['password2']) {
        
          session_start();
          
          $_SESSION['username'] = $row['teamnumber'];
          $number = $row['teamnumber'];
          $_SESSION['username'] = $row['teamnumber'];

          $sql4="SELECT * FROM teams WHERE teamnumber='$number'";
          $result3 = mysqli_query($conn,$sql4);
        
          if (mysqli_num_rows($result3)>0){
            $row2 = mysqli_fetch_assoc($result3);
            //echo $row2['image'];
          }
          else{
              $sql6 = "INSERT INTO teams(teamnumber, image, speed, weight, height, matchnumber, autopoints, teleboxes, pickupspeed, standing, notes,imagetype) VALUES ('$mailuid',null,0,0,0,0,0,0,0,'','','');";
              $result4 = mysqli_query($conn,$sql6);
              $row2 = mysqli_fetch_assoc($result4);
          }
        
         require 'lgs.inc.php';
            $gene="SELECT * FROM teams ";
            $genere = mysqli_query($conn,$gene);

            $tele="SELECT * FROM `teams` ORDER BY `teams`.`teleboxes` DESC;";
            $telere = mysqli_query($conn,$tele);

            $auto="SELECT * FROM teams ORDER BY `autopoints` DESC";
            $autore = mysqli_query($conn,$auto);

            $spe="SELECT * FROM `teams` ORDER BY `teams`.`speed` DESC;";
            $spere = mysqli_query($conn,$spe);
            /*
          echo '<a href="loginpage.php" action="out.inc.php" class="buttonstyle3">
            <input type="submit" name="logout" value="Log Out">
            </a>';*/
            
          echo'
        <?php 
        echo "hello";
        ?>
        <html>
        <head>
    <title>HOME</title>
    <link rel="shortcut icon" href="ricon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="indexStyle.css">
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
    <style>
        img[alt="www.000webhost.com"] {
            display: none;
        }
    </style>

</head>
<script src="indexScript.js"></script>
<script src="pass_load_part.js"></script>';
require 'login_style.php';
echo'
<body>
    <a href="https://www.firstinspires.org/robotics/frc"><img src="media/robot.png"></a>
    <div class="blue"></div>
    <div class="scouticon">
        <img src="media/scouticon.png">
        <img src="media/redicon.png">
        <hh>EAGLES</hh>

        <div class="redlight">
            <img src="media/redlight.png">
        </div>

        <div class="bluelight">
            <img src="media/bluel.png">
        </div>

        <h1><strong>Scouting System</strong></h1>
        <h2>By 5805</h2>
    </div>

    <div class="update">
        <img src="media/update.png">
    </div>

    <div class="teams">
        <img src="media/twolights.png">
    </div>

    <div class="explore">
        <img src="media/explore.png">
    </div>

    <div class="yoda">
        <img src="media/yoda.png">
    </div>

    <ul>
        <li><a class="special1">Teams</a>
            <ul>
                <li class="list1" onclick="toggleMyteam()"><a>My Team</a></li>
                <li class="list2" onclick="toggleChoose()"><a>Compare Teams</a></li>
                <li class="list3" onclick="toggleChart()"><a>Chart Team</a></li>
            </ul>
        </li>
        <li class="special2" onclick="toggleExplore()"><a>Explore</a></li>
        <li><a class="special3" onclick="toggleEdit()">Update Info</a></li>
        <li><a href="https://smblyrequired.com/" class="special4">About us</a></li>
    </ul>

    <div id="sidebar">
        
        <div class="toggle-btn" onclick="toggleMyteam()">
            <i class="fas fa-times-circle"></i>
        </div>  
        <div class="" onclick="toggleEditTeam()">
            <i2 class="fas fa-edit"></i2>
        </div>
            <h2>Welcome </h2>'.$row2['teamnumber'].'
            <hr>
            <ul>
                <li2> Height: '.$row2['height'].'</li2><br>
                <li2> Weight: '.$row2['weight'].'</li2><br>
                <li2> Image: </li2><br>
                <li2> 
                <embed src="data:'.$row2['imagetype'].';base64,'.base64_encode($row2['image']).'"width="200"/><br>
                </li2><br>
                
                <li2>Autonomous Points: '.$row2['autopoints'].'</li2><br>
                <li2> Speed: '.$row2['speed'].'</li2><br>
                <li2> Total Climb Points: '.$row2['climbpoint'].'</li2><br>
                <li2> Total Cargo: '.$row2['totalcargo'].'</li2><br>
                <i4 onclick="toggleCargo()" class="fas fa-caret-square-down"></i4><br>
                <div id="drop_cargo">
                <br>
                    <li2> Level 1: '.$row2['cargolvl1'].'</li2><br>
                    <li2> Level 2: '.$row2['cargolvl2'].'</li2><br>
                    <li2> Level 3: '.$row2['cargolvl3'].'</li2><br>
                </div>
                
                <li2 id="totalhatch"> Total Hatch: '.$row2['totalhatch'].'</li2>
                <i5 onclick="toggleHatch()" class="fas fa-caret-square-down"></i5><br>
                <div id="drop_hatch">
                    <li2> Level 1: '.$row2['hatchlvl1'].'</li2><br>
                    <li2> Level 2: '.$row2['hatchlvl2'].'</li2><br>
                    <li2> Level 3: '.$row2['hatchlvl3'].'</li2><br>
                </div>
                <li2> Pickup Speed: '.$row2['pickupspeed'].'</li2><br>
                <li2> Platform Level: '.$row2['climbplatform'].'</li2><br>
                <li2> Cargo Level: '.$row2['cargolevel'].'</li2><br>
                <li2> Hatch Level: '.$row2['hatchlevel'].'</li2><br>
                <li2>Have automous?'.$row2['automous'].'</li2><br>
                <li2>Notes</li2><br>
                <li2><textarea name="notes" rows="5" cols="30" readonly>'.$row2['notes'].'</textarea></li2><br>
            </ul>
            <a href="index.php" action="out.inc.php">
                    <input type="submit" name="logout" value="Log Out">
                </a>
        
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
                    <h4>Can do autonomous?</h4>
                    <select name="autonomous">
                        <option value='.$row2['automous'].'>'.$row2['automous'].'</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Vision_System">Vision_System</option>
                    </select>
                    <hr>
                    <h4>Speed</h4>
                    <select name="speed">
                        <option value='.$row2['speed'].'>'.$row2['speed'].'</option>
                        <option value="Slow">Slow</option>
                        <option value="Medium">Medium</option>
                        <option value="Fast">Fast</option>
                    </select>
                    <hr>
                    <h4>Pickup Speed</h4>
                    <select name="pickupspeed">
                        <option value='.$row2['pickupspeed'].'>'.$row2['pickupspeed'].'</option>
                        ';
                        require 'speed_select.php';
                        echo'
                    </select>
                    <hr>
                     <h4>Climb Platform Level</h4>
                    <select name="platformlevel">
                        <option value='.$row2['climbplatform'].'>'.$row2['climbplatform'].'</option>
                        ';
                        require 'platlvl_select.php';
                        echo'
                    </select>
                    <hr>
                     <h4>Cargo Level</h4>
                    <select name="cargolevel">
                        <option value='.$row2['cargolevel'].'>'.$row2['cargolevel'].'</option>
                        ';
                        require 'lvl_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Hatch Level</h4>
                    <select name="hatchlevel">
                        <option value='.$row2['hatchlevel'].'>'.$row2['hatchlevel'].'</option>
                        ';
                        require 'lvl_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Password</h4>
                    <input type="text" name="password"  placeholder="Enter password for editing info"  value="">
                    <hr>
                    <input value="SAVE" type="submit" name="save">
                </form>
            </div>
    </div>
    <div id="chooseteam">
        <div class="toggle-btn" onclick="toggleChoose()">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="search-box">
         <form method="post">
                <input class="search-txt" type="text" name="searchValue" placeholder="Team Number">
                <a name="compareTeam" class="search-btn" href="#">
                    <i class="fas fa-plus"></i>
                </a>
            </form>  
            
        </div>
        <div id="result"></div>
        <div class="search-box">
         <form method="post">
                <input class="search-txt2" type="text" name="searchValue" placeholder="Team Number">
                <a name="compareTeam" class="search-btn" href="#">
                    <i class="fas fa-plus"></i>
                </a>
            </form>  
            
        </div>    
        
        <div id="result2"></div>
        </div>
      <div id="chartteam">
        <div class="toggle-btn" onclick="toggleChart()">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="rank2">
                <select id="chteamnumber">
                    <option value="nothing">Team Number</option>';
                    
                    require_once 'lgs.inc.php';
                    $query = "SELECT * FROM teams;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows['teamnumber'];
                        $judge=true;
                        foreach ($already as $num){
                            if($teamnum==$num){
                                $judge=false;
                            }
                        }
                        if($judge){
                            echo '<option value='.$teamnum.'>'.$teamnum.'</option>';
                        }
                    }
                    }

                    echo'
                </select>
            </div>

            <div class="rank2">
                <select id="chregion">
                    <option value="nothing">Region</option>
                    ';
                    require_once "lgs.inc.php";
                    $query = "SELECT * FROM matchperformance;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows["region"];
                        $judge=true;
                        foreach ($already as $num){
                            if($teamnum==$num){
                                $judge=false;
                            }
                        }
                        array_push($already,$teamnum);
                        if($judge){
                            echo '<option value='.$teamnum.'>'.$teamnum.'</option>';
                        }
                    }
                    }
                    echo'
                </select>
            </div>

             <div class="rank2">
                <select id="chfeature">
                    <option value="nothing">Feature</option>
                    <option value="autopoint">Total Autonmous Points</option>
                    <option value="autohatch">Hatch in Autonmous</option>
                    <option value="autocargo">Cargo in Autonmous</option>
                    <option value="numberOfCargo">Total Cargo</option>
                    <option value="numberOfHatch">Total Hatch</option>
                    <option value="cargolvl1">Cargo Level1</option>
                    <option value="cargolvl2">Cargo Level2</option>
                    <option value="cargolvl3">Cargo Level3</option>
                    <option value="hatchlvl1">Hatch Level1</option>
                    <option value="hatchlvl2">Hatch Level2</option>
                    <option value="hatchlvl3">Hatch Level3</option>
                    <option value="cargoship">Cargo Cargoship</option>
                    <option value="hatchship">Hatch Cargoship</option>
                    <option value="climbpoint">Climb Points</option>           
                </select>
            </div>
            <div id="graphresult"></div>  
                       
            <div class="rank3">
                <select id="chteamnumber2">
                    <option value="nothing">Team Number</option>';
                    
                    require_once 'lgs.inc.php';
                    $query = "SELECT * FROM teams;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows['teamnumber'];
                        $judge=true;
                        foreach ($already as $num){
                            if($teamnum==$num){
                                $judge=false;
                            }
                        }
                        if($judge){
                            echo '<option value='.$teamnum.'>'.$teamnum.'</option>';
                        }
                    }
                    }
                    echo'
                </select>
            </div>

            <div class="rank3">
                <select id="chregion2">
                    <option value="nothing">Region</option>';
                    
                    require_once 'lgs.inc.php';
                    $query = "SELECT * FROM matchperformance;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows['region'];
                        $judge=true;
                        foreach ($already as $num){
                            if($teamnum==$num){
                                $judge=false;
                            }
                        }
                        array_push($already,$teamnum);
                        if($judge){
                            echo '<option value='.$teamnum.'>'.$teamnum.'</option>';
                        }
                    }
                    }
                    echo'
                </select>
            </div>

             <div class="rank3">
                <select id="chfeature2">
                    <option value="nothing">Feature</option>
                    <option value="autopoint">Total Autonmous Points</option>
                    <option value="autohatch">Hatch in Autonmous</option>
                    <option value="autocargo">Cargo in Autonmous</option>
                    <option value="numberOfCargo">Total Cargo</option>
                    <option value="numberOfHatch">Total Hatch</option>
                    <option value="cargolvl1">Cargo Level1</option>
                    <option value="cargolvl2">Cargo Level2</option>
                    <option value="cargolvl3">Cargo Level3</option>
                    <option value="hatchlvl1">Hatch Level1</option>
                    <option value="hatchlvl2">Hatch Level2</option>
                    <option value="hatchlvl3">Hatch Level3</option>
                    <option value="cargoship">Cargo Cargoship</option>
                    <option value="hatchship">Hatch Cargoship</option>
                    <option value="climbpoint">Climb Points</option>           
                </select>
            </div>
            <div id="graphresult2"></div>                     
    </div>
    </body>
    </html>';

    require 'explorepage.inc.php';
    require 'use_fun.inc.php';       
    require 'editpage.php';  
          exit();
        }
        
        else if (!$pwdCheck) {

          header("Location: ../robotweb/index.php?error=wrongpwd=".$pwdCheck);
          exit();

        }
      }
      else {
        header("Location: ../robotweb/index.php?login=wronguidpwd");
        exit();
      }
    }
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
   // require 'use_fun.inc.php';
  require 'usefunlogin.inc.php';
  exit();
} 
